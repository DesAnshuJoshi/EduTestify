@extends('layouts.student-layout')
@section('chart-head')
<title>Results | Student EduTestify</title>
@endsection
@section('space-work')

<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <!-- Modal -->
        <div class="modal fade" id="reviewQnaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="reviewQnaModalLabel" aria-hidden="true"> <!--Implement first line in each modals-->
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    
                        <div class="modal-header">
                            <h5 class="modal-title" id="reviewQnaModalLabel">Review Qna</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body review-qna">
                            Loading...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger primary" data-bs-dismiss="modal">Close</button>
                        </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="explainationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="explainationModalLabel" aria-hidden="true"> <!--Implement first line in each modals-->
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    
                        <div class="modal-header">
                            <h5 class="modal-title" id="explainationModalLabel">Explaination</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body review-qna">
                            <p id="explaination"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        </div>
                </div>
            </div>
        </div>
       {{-- Data Table --}}
       <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Results</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Exam</th>
                                <th>Marks Got</th>
                                <th>Pass Marks</th>
                                <th>Result</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($attempts) > 0)
                                @php $x = 1; @endphp
                                @foreach($attempts as $attempt)
                                    <tr>
                                        <td>{{ $x++ }}</td>
                                        <td>{{ $attempt->exam->exam_name }}</td>
                                        <td>{{ $attempt->marks }} / {{ count($attempt->exam->getQnaExam) * $attempt->exam->marks }}</td>
                                        <td>{{ $attempt->exam->pass_marks }}</td>
                                        <td>
                                            @if($attempt->status == 0)
                                            <span class="badge badge-xl badge-dark">Not Declared</span>
                                            @else

                                                @if( $attempt->marks >= $attempt->exam->pass_marks )
                                                    <span class="badge badge-xl badge-success">Passed</span>
                                                @else
                                                    <span class="badge badge-xl badge-danger">Failed</span>
                                                @endif

                                            @endif
                                        </td>
                                        <td>
                                            @if($attempt->status == 0)
                                                <span class="badge badge-xl badge-dark">Pending</span>
                                            @else
                                                <a href="#" data-id="{{ $attempt->id }}" class="reviewExam badge badge-xl light badge-primary" data-bs-toggle="modal" data-bs-target="#reviewQnaModal">Review Q&A</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">You not attemped any Exam!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
       
   </div>
</div>

<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
<script>
    $(document).ready(function(){

        $('[data-toggle="tooltip"]').tooltip();
        $(document).on('click', '.reviewExam', function () {
        // $('.reviewExam').click(function(){

            var id = $(this).attr('data-id');

            $.ajax({
                url:"{{ route('resultStudentQna') }}",
                type:"GET",
                data:{ attempt_id:id },
                success:function(data){
                    var html = ``;

                    if (data.success == true) {
                        var data = data.data;
                        if (data.length > 0) {
                            
                            for (let i = 0; i < data.length; i++) {

                                let isCorrectClass = data[i].answers.is_correct === 1 ? 'text-success' : 'text-danger';

                                let answer = data[i].answers.answer;
                                var accordionID = 'accordionItem' + i;

                                html += `
                                    <div class="accordion accordion-primary" id="accordion-one">
                                        <div class="accordion-item">
                                            <div class="accordion-header rounded-lg collapsed" id="heading${accordionID}" data-bs-toggle="collapse" data-bs-target="#${accordionID}" aria-controls="${accordionID}" aria-expanded="true" role="button">
                                                <span class="accordion-header-icon"></span>
                                                <span class="accordion-header-text">Q(${i + 1}). ${data[i].question.question}</span>
                                                <span class="accordion-header-indicator"></span>
                                            </div>
                                            <div id="${accordionID}" class="collapse" aria-labelledby="heading${accordionID}" data-bs-parent="#accordion-one">
                                                <div class="accordion-body-text">
                                                    Ans: <span class="${isCorrectClass} fw-bold">${answer}</span>
                                                    <i class="fa fa-info-circle explaination-icon" data-explaination="${data[i].question.explaination}"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                            
                            }

                        } else {
                            html += '<h6>You did not attempt any Questions!</h6>';
                            html += '<p>If you approve this Exam, the student will fail!</p>';
                        }
                    } else {
                        html += '<p>Having some server issue!';
                    }


                    $('.review-qna').html(html);
                    
                    
                }
            });

        });
        
        $(document).ready(function () {
            $(document).on('mouseover', '.explaination-icon', function () {
                var explaination = $(this).data('explaination');
                $(this).tooltip({
                    title: explaination,
                    placement: 'right',
                    trigger: 'manual',
                }).tooltip('show');
            });

            $(document).on('mouseout', '.explaination-icon', function () {
                $(this).tooltip('hide');
            });
        });

    });
</script>
@endsection