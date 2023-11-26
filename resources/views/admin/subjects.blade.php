@extends('layouts/admin-layout')
@section('chart-head')
	<title>Subjects | Admin EduTestify</title>
@endsection
@section('space-work')
    <div class="container-fluid">
         <!-- row -->
         <div class="row">
            {{-- Modal Button & Box --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="bootstrap-modal">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addSubjectModal">Add Subjects</button>
                            <!-- Modal Add Subject -->
                            <div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="" id="addSubject">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addSubjectModalLabel">Add Subject</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" name="subject" class="form-control input-default" id="subject" placeholder="Enter Subject Name" required><br>
                                                <input type="text" name="subject_code" class="form-control input-default" id="subject_code" placeholder="Enter Subject Code" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add Subject</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Data Table --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Subjects</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Subject Code</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($subjects) > 0)
                                    @foreach ($subjects as $subject)
                                        <tr>
                                            <td>{{ $subject->id }}</td>
                                            <td>{{ $subject->subject }}</td>
                                            <td>{{ $subject->sub_code }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-primary shadow btn-xs sharp me-1 editButton" data-bs-toggle="modal" data-bs-target="#editSubjectModal" data-id="{{ $subject->id }}" data-subject="{{ $subject->subject}}" data-subject-code="{{ $subject->sub_code}}"><i class="fas fa-pencil-alt"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-danger shadow btn-xs sharp deleteButton" data-bs-toggle="modal" data-bs-target="#deleteSubjectModal" data-id="{{ $subject->id }}" data-subject="{{ $subject->subject}}"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>  
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="text-muted">No Subjects Found!</td>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- Modal Edit Subject -->
                    <div class="modal fade" id="editSubjectModal" tabindex="-1" aria-labelledby="editSubjectModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="" id="editSubject">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addSubjectModalLabel">Edit Subject</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="subject">Subject</label>
                                        <input type="text" name="subject" class="form-control input-default" id="edit_subject" placeholder="Enter Subject Name" required><br>
                                        <input type="text" name="subject_code" class="form-control input-default" id="edit_subject_code" placeholder="Enter Subject Code" required>
                                        <input type="hidden" name="id" id="edit_subject_id">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Delete Subject -->
                    <div class="modal fade" id="deleteSubjectModal" tabindex="-1" aria-labelledby="deleteSubjectModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="" id="deleteSubject">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addSubjectModalLabel">Delete Subject</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p id="subjectToDeleteText">Are you sure to delete <span id="subjectToDelete"></span>?</p>
                                        <input type="hidden" name="id" id="delete_subject_id">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
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
            $("#addSubject").submit(function(e){
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url:"{{ route('addSubject')}}",
                    type:"POST",
                    data: formData,
                    success: function(data){
                        if(data.success == true)
                        {
                            location.reload();
                        }
                        else
                        {
                            alert(data.msg);
                        }
                    }
                });
            });
            
            //Edit
            $('#editSubjectModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var sid = button.data('id');
                var sub = button.data('subject');
                var subc = button.data('subject-code');
                
                // Update the modal content with the new values
                $('#edit_subject').val(sub);
                $('#edit_subject_id').val(sid);
                $('#edit_subject_code').val(subc);
            });

            // Clear the modal content when the modal is hidden
            $('#editSubjectModal').on('hidden.bs.modal', function () {
                $('#edit_subject').val('');
                $('#edit_subject_id').val('');
                $('#edit_subject_code').val('');
            });

            $("#editSubject").submit(function(e){
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url:"{{ route('editSubject')}}",
                    type:"POST",
                    data: formData,
                    success: function(data){
                        if(data.success == true)
                        {
                            location.reload();
                        }
                        else
                        {
                            alert(data.msg);
                        }
                    }
                });
            });

            //Delete
            $('#deleteSubjectModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var sub = button.data('subject');
                
                // Update the text content of the <p> element with the selected subject
                $('#subjectToDeleteText').text('Are you sure to delete "' + sub + '" ?');
                
                // Store the subject ID in a hidden field for further processing
                $('#delete_subject_id').val(button.data('id'));
            });

            // Clear the modal content when the delete modal is hidden
            $('#deleteSubjectModal').on('hidden.bs.modal', function () {
                $('#subjectToDeleteText').text('Are you sure to delete ?'); // Reset the <p> text
                $('#delete_subject_id').val(''); // Clear the subject ID
            });

            // Handle the delete action
            $("#deleteSubjectButton").click(function(){
                var sid = $('#delete_subject_id').val();

                // Add your delete logic here, for example, send an AJAX request to delete the subject with ID 'sid'
                // Then, close the modal if the delete is successful

                // Close the modal
                $('#deleteSubjectModal').modal('hide');
            });
            
            $("#deleteSubject").submit(function(e){
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url:"{{ route('deleteSubject')}}",
                    type:"POST",
                    data: formData,
                    success: function(data){
                        if(data.success == true)
                        {
                            location.reload();
                        }
                        else
                        {
                            alert(data.msg);
                        }
                    }
                });
            });
        });
    </script>
    
@endsection