@extends('layouts/admin-layout')
@section('chart-head')
	<title>Review Exams | Admin EduTestify</title>
@endsection
@section('space-work')
<div class="container-fluid">
    <!-- row -->
        <div class="row">
            <!-- Modal -->
            <div class="modal fade" id="reviewExamModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="reviewExamModalLabel" aria-hidden="true"> <!--Implement first line in each modals-->
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        
                            <div class="modal-header">
                                <h5 class="modal-title" id="reviewExamModalLabel">Review Exams</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" id="reviewForm">
                                @csrf
                                <input type="hidden" name="attempt_id" id="attempt_id">
                            <div class="modal-body review-exam">
                                Loading...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary approved-btn">Approve Exam</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Data Table --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Review Exams</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- Data Table for displaying questions and answers --}}
                            <table id="example" class="table-responsive-md" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Exam</th>
                                        <th>Status</th>
                                        <th>Review</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($attempts) > 0)
                                    @php $x = 1; @endphp
                                    @foreach ($attempts as $attempt)
                                        <tr>
                                            <td>{{ $x++ }}</td>
                                            <td>{{ $attempt->user->name }}</td>
                                            <td>{{ $attempt->exam->exam_name }}</td>
                                            <td>
                                                @if($attempt->status == 0)
                                                    <span style="color:red">Pending</span>
                                                @else
                                                    <span style="color:green">Approved</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($attempt->status == 0)
                                                    <a href="#" class="reviewExam" data-id="{{ $attempt->id }}" data-bs-toggle="modal" data-bs-target="#reviewExamModal">Review & Approved</a>
                                                @else
                                                    Completed
                                                @endif
                                            </td>
                                        </tr>  
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="text-muted">No Students Found!</td>
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

        $(document).on('click', '.reviewExam', function () {
        // $('.reviewExam').click(function(){
            
            var id = $(this).data('id');
            $('#attempt_id').val(id);

            $.ajax({
                url:"{{ route('reviewQna') }}",
                type:"GET",
                data:{attempt_id: id},
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                            
                            }

                        } else {
                            html += '<h6>Student not attempt any Questions!</h6>';
                            html += '<p>If you approve this Exam, the student will fail!</p>';
                        }
                    } else {
                        html += '<p>Having some server issue!';
                    }


                    $('.review-exam').html(html);
                }

            });
        });

        $('#reviewForm').submit(function(event){
            event.preventDefault();

            $('.approved-btn').html('Please Wait <i class="fa fa-spinner fa-spin"></i>');

            var formData = $(this).serialize();

            $.ajax({
                url:"{{ route('approvedQna') }}",
                type:"POST",
                data:formData,
                success:function(data){
                    if(data.success == true){
                        location.reload();
                    }
                    else{
                        alert(data.msg);
                    }
                }
            });

        });
        

    });
</script>
@endsection