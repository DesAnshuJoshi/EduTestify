@extends('layouts/admin-layout')
@section('chart-head')
	<title>Students | Admin EduTestify</title>
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
                            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addStudentModal">Add Students</button>
                            <a href="{{ route('exportStudents') }}" class="btn btn-primary mb-2 float-end">Export Students</a>
                            <!-- Modal Add Student -->
                            <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="" id="addStudent">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" name="name" placeholder="Enter Student Name" class="form-control input-default" required><br>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="email" name="email" placeholder="Enter Student Email" class="form-control input-default" required><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add Student</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Edit Student -->
                            <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="" id="editStudent">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addStudentModalLabel">Edit Student</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="hidden" name="id" id="id">
                                                        <input type="text" name="name" id="name" placeholder="Enter Student Name" class="form-control input-default" required><br>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="email" name="email" id="email" placeholder="Enter Student Email" class="form-control input-default" required><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" id="updateButton" disabled>Edit Student</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Delete Student -->
                            <div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="" id="deleteStudent">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteStudentModalLabel">Delete Student</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p id="studentToDeleteText"><span id="studentToDelete"></span></p>
                                                <input type="hidden" name="id" id="deleteStudentId">
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
            {{-- Data Table --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Students</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- Data Table for displaying questions and answers --}}
                            <table id="example" class="table-responsive-md" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($student) > 0)
                                    @foreach ($student as $stud)
                                        <tr>
                                            <td>{{ $stud->id }}</td>
                                            <td>{{ $stud->name }}</td>
                                            <td>{{ $stud->email }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-primary shadow btn-xs sharp me-1 editButton" data-bs-toggle="modal" data-bs-target="#editStudentModal" data-id="{{ $stud->id }}" data-name="{{ $stud->name }}" data-email="{{ $stud->email }}"><i class="fas fa-pencil-alt"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-danger shadow btn-xs sharp deleteButton" data-bs-toggle="modal" data-bs-target="#deleteStudentModal" data-id="{{ $stud->id }}" data-name="{{ $stud->name }}"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>  
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="text-muted">No Students Found!</td>
                                    </tr>
                                    @endif
                                </tfoot>
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
        $("#addStudent").submit(function(e){
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url:"{{ route('addStudent') }}",
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

        //Edit Show Val
        $(document).on('click', '.editButton', function() {
            $("#id").val( $(this).data('id') );
            $("#name").val( $(this).data('name') );
            $("#email").val( $(this).data('email') );
        }); 

        // Store the initial values of name and email
        var initialName = $("#name").val();
        var initialEmail = $("#email").val();

        // Listen for changes in the form fields
        $("#name, #email").on("input", function () {
            // Get the current values of name and email
            var currentName = $("#name").val();
            var currentEmail = $("#email").val();

            // Check if the values have changed
            if (currentName !== initialName || currentEmail !== initialEmail) {
                // Data has changed, enable the button
                $("#updateButton").prop("disabled", false);
            } else {
                // Data is unchanged, keep the button disabled
                $("#updateButton").prop("disabled", true);
            }
        });

        $("#editStudent").submit(function(e){
            e.preventDefault();

            // Get the current values of name and email
            var currentName = $("#name").val();
            var currentEmail = $("#email").val();

            // Disable the button by default
            $('#updateStudent').prop('disabled', true);

            // Check if the values have changed
            if (currentName !== initialName || currentEmail !== initialEmail) {
                // Data has changed, enable the button
                $('#updateStudent').prop('disabled', false);

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('editStudent') }}",
                    type: "POST",
                    data: formData,
                    success: function(data) {
                        if (data.success == true) {
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }
                });
            } else {
                alert("No changes detected.");
            }
        });

        $('#deleteStudentModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var StudId = button.data('id');
            var StudName = button.data('name'); // Get the question's name
            // Update the text content of the <p> element with the selected question's name
            $('#studentToDeleteText').text('Do you want to delete "' + StudName + '" ?');

            // Store the question ID in a hidden field for further processing
            $('#deleteStudentId').val(StudId);
        });

        // Clear the modal content when the delete modal is hidden
        $('#deleteStudentModal').on('hidden.bs.modal', function () {
            $('#studentToDeleteText').text('Are you sure to delete ?'); // Reset the <p> text
            $('#deleteStudentId').val(''); // Clear the question ID
        });

        $("#deleteStudent").submit(function(e){
            e.preventDefault();

            var formData = $(this).serialize();
            
            $.ajax({
                url:"{{ route('deleteStudent')}}",
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