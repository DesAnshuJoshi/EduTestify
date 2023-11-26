@extends('layouts/admin-layout')
@section('chart-head')
	<title>Marks | Admin EduTestify</title>
@endsection
@section('space-work')
<div class="container-fluid">
    <!-- row -->
        <div class="row">
            <div class="bootstrap-modal">
                            <!-- Modal Add Exam -->
                            <div class="modal fade" id="editMarksModal" tabindex="-1" aria-labelledby="editMarksModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="" id="editMarks">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editMarksModalLabel">Edit Marks</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="mt-3">Marks/Q</label>
                                                    </div> 
                                                    <div class="col-sm-6">
                                                        <input type="hidden" name="exam_id" id="exam_id">
                                                        <input type="text" 
                                                            onkeypress="return event.charCode >=48 && event.charCode<=57 || event.charCode == 46"
                                                        name="marks" placeholder="Enter Marks/Q" id="marks" class="form-control input-default" required>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-4">
                                                        <label class="mt-3">Total Marks</label>
                                                    </div> 
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control input-default" disabled placeholder="Total Marks" id="tmarks">
                                                    </div>
                                                </div>
                                
                                                <div class="row mt-2">
                                                    <div class="col-sm-4">
                                                        <label class="mt-3">Passing Marks</label>
                                                    </div> 
                                                    <div class="col-sm-6">
                                                    <input type="text" 
                                                            onkeypress="return event.charCode >=48 && event.charCode<=57 || event.charCode == 46"
                                                        name="pass_marks" placeholder="Enter Passing Marks" id="pass_marks" class="form-control input-default" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
            {{-- Data Table --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Marks</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- Data Table for displaying questions and answers --}}
                            <table id="example" class="table-responsive-md" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Exam Name</th>
                                        <th>Marks / Q</th>
                                        <th>Total Marks</th>
                                        <th>Passing Marks</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($exams) > 0)
                                    @php $x = 1; @endphp
                                    @foreach ($exams as $exam)
                                        <tr>
                                            <td>{{ $x++ }}</td>
                                            <td>{{ $exam->exam_name }}</td>
                                            <td>{{ $exam->marks }}</td>
                                            <td>{{ count($exam->getQnaExam) * $exam->marks }}</td>
                                            <td>{{ $exam->pass_marks }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-primary shadow btn-xs sharp me-1 editMarks" data-bs-toggle="modal" data-bs-target="#editMarksModal" data-id="{{ $exam->id }}" data-pass-marks="{{ $exam->pass_marks }}" data-marks="{{ $exam->marks }}" data-totalq="{{ count($exam->getQnaExam) }}"><i class="fas fa-pencil-alt"></i></button>
                                                </div>
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
            var totalQna = 0;

            $(document).on('click', '.editMarks', function () {
            // $('.editMarks').click(function(){

                var exam_id = $(this).data('id');
                var marks = $(this).data('marks');
                var totalq = $(this).data('totalq');

                $('#marks').val(marks);
                $('#exam_id').val(exam_id);
                $('#tmarks').val((marks*totalq).toFixed(1));

                totalQna = totalq;

                $('#pass_marks').val($(this).data('pass-marks'));
            });

            $('#marks').keyup(function(){
                $('#tmarks').val( ($(this).val()*totalQna).toFixed(1) );
            });

            $('#pass_marks').keyup(function(){

                $('.pass-error').remove();
                var tmarks = $('#tmarks').val();
                var pmarks = $(this).val();

                if(parseFloat(pmarks) >= parseFloat(tmarks)){

                    $(this).parent().append('<p class="pass-error text-danger">Passing Marks will be less than total marks!</p>');
                    setTimeout(() => {
                        $('.pass-error').remove();
                    }, 2000);

                }

            });

            $('#editMarks').submit(function(event){
                event.preventDefault();

                $('.pass-error').remove();
                var tmarks = $('#tmarks').val();
                var pmarks = $('#pass_marks').val();

                if(parseFloat(pmarks) >= parseFloat(tmarks)){

                    $('#pass_marks').parent().append('<p class="pass-error text-danger">Passing Marks will be less than total marks!</p>');
                    setTimeout(() => {
                        $('.pass-error').remove();
                    }, 2000);

                    return false;

                }

                var formData = $(this).serialize();

                $.ajax({
                    url:"{{ route('updateMarks') }}",
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