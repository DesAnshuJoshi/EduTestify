@extends('layouts/admin-layout')
@section('chart-head')
	<title>Questions | Admin EduTestify</title>
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
                            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addQnaModal">Add Questions</button>
                            <button type="button" class="btn btn-primary mb-2 float-end" data-bs-toggle="modal" data-bs-target="#importQnaModal">Import Questions</button>
                            <!-- Modal Add Qna -->
                            <div class="modal fade" id="addQnaModal" tabindex="-1" aria-labelledby="addQnaModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="" id="addQna">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addExamModalLabel">Add Question</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body add-qna-modal">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" name="question" placeholder="Enter Question" class="form-control input-default" required><br><br>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <div class="col">
                                                        <textarea name="explaination" class="form-control" rows="4" id="" placeholder="Enter Explaination (Optional)"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-between align-items-center">
                                                <button type="button" class="btn btn-primary" id="addAnswers">Add Answers</button>
                                                <span class="error text-danger"></span>
                                                <div class="d-flex gap-2">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Question</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Import Question -->
                            <div class="modal fade" id="importQnaModal" tabindex="-1" aria-labelledby="importQnaModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="" id="importQna" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="importQnaModalLabel">Import Question</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group">
                                                    <div class="form-file">
                                                        <input type="file" class="form-file-input form-control" name="file" id="fileupload" required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet ,application/vnd.ms.excel">\
                                                        {{-- Add Option to download template and use it to add question. --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Import</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Edit Qna -->
                            <div class="modal fade" id="editQnaModal" tabindex="-1" aria-labelledby="editQnaModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="" id="editQna">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editQnaModalLabel">Edit Question</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body editModalAnswers">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="hidden" name="question_id" id="question_id">
                                                        <input type="text" name="question" id="question" placeholder="Enter Question" class="form-control input-default" required><br><br>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <textarea name="explaination" class="form-control" rows="4" id="explaination" placeholder="Enter Explaination (Optional)"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-between align-items-center">
                                                <button type="button" class="btn btn-primary" id="addEditAnswers">Add Answers</button>
                                                <span class="Editerror text-danger"></span>
                                                <div class="d-flex gap-2">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- See Answers Modal -->
                            <div class="modal fade" id="seeAnswersModal" tabindex="-1" aria-labelledby="seeAnswersModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">See Answers</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table table-responsive-md">
                                                    <thead>
                                                        <tr>
                                                            <th class="fw-bold">#</th>
                                                            <th class="fw-bold">Answers</th>
                                                            <th class="fw-bold">Correct One</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="showAnswers">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Delete Question -->
                            <div class="modal fade" id="deleteQnaModal" tabindex="-1" aria-labelledby="deleteQnaModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="" id="deleteQna">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteQnaModalLabel">Delete Question</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p id="questionToDeleteText"><span id="questionToDelete"></span></p>
                                                <input type="hidden" name="id" id="deleteQnaId">
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
                        <h4 class="card-title">Questions and Answers</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {{-- Data Table for displaying questions and answers --}}
                            <table id="example" class="table-responsive-md" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($questions) > 0)
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td>{{ $question->id }}</td>
                                            <td>{{ $question->question }}</td>
                                            <td>
                                                <a href="#" class="buttonAnswer" data-id="{{ $question->id }}" data-bs-toggle="modal" data-bs-target="#seeAnswersModal">See Answer</a>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-primary shadow btn-xs sharp me-1 editButton" data-bs-toggle="modal" data-bs-target="#editQnaModal" data-id="{{ $question->id }}" data-exam="{{ $question->question}}"><i class="fas fa-pencil-alt"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-danger shadow btn-xs sharp deleteButton" data-bs-toggle="modal" data-bs-target="#deleteQnaModal" data-id="{{ $question->id }}" data-name="{{ $question->question}}"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>  
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="text-muted">No Questions Found!</td>
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
    $(document).ready(function() {
        
        // Add QNA Form Submit
        $("#addQna").submit(function (e) {
            e.preventDefault();
            
            if ($(".ans").length < 2) 
            {
                $(".error").text("Please add at least 2 answers!");
                setTimeout(function () 
                {
                    $(".error").text("");
                }, 2000);
            }
            else 
            {
                var checkIsCorrect = false;
                var selectedValue = null; // Initialize to null
            
                // Loop through radio buttons with class "is_correct"
                $(".is_correct").each(function () 
                {
                    if ($(this).is(":checked")) 
                    {
                        checkIsCorrect = true;
                        // Find the associated text input using closest and next
                        selectedValue = $(this).closest(".ans").find(".input-default").val();
                    }
                });

                if (checkIsCorrect) 
                {
                    var formData = $(this).serialize();
                
                    // Add the selected value to the form data
                    formData += "&is_correct=" + selectedValue;
                    $.ajax({
                        url: "{{ route('addQna') }}",
                        type: "POST",
                        data: formData,
                        success: function (data) 
                        {
                            console.log(data);
                            console.log("Response from server:", data);
                            if (data.success == true) 
                            {
                                location.reload();
                            } else 
                            {
                                alert(data.msg);
                            }
                        }
                    });
                } else 
                {
                    $(".error").text("Please select an answer!");
                    setTimeout(function () 
                    {
                        $(".error").text("");
                    }, 2000);
                }
            }
        });
    
        // Dynamically Add Answers
        $("#addAnswers").click(function() 
        {
            // Count the number of answers with class "answers"
            var answerCount = $(".ans").length;
            if (answerCount >= 6) 
            {
                $(".error").text("You have added the maximum number of answers!");
                setTimeout(function() 
                {
                    $(".error").text("");
                }, 2000);
            } else 
            {
                var html = `<div class="row ans align-items-center mb-2">` +
                                `<div class="col-auto pe-0">` +
                                    `<input class="form-check-input is_correct" type="radio" value="option1" name="is_correct">` +
                                `</div>` +
                                `<div class="col">` +
                                    `<input type="text" class="form-control input-default" style="width: 80%;" name="answers[]" placeholder="Enter Answer" required>` +
                                `</div>` +
                                `<div class="col-auto">` +
                                    `<button class="btn btn-danger shadow btn-xs sharp remove-answer"><i class="fa fa-times"></i></button>` +
                                `</div>` +
                            `</div>`;
                $(".add-qna-modal").append(html);
            }
        });

        // Remove dynamically added answers
        $(document).on("click", ".remove-answer", function() 
        {
            $(this).closest(".ans").remove();
        });



        //See Answers
        $(document).on('click', '.buttonAnswer', function () {
            var qid = $(this).data('id');
            var html = '';

            var questions = @json($questions);

            for (let i = 0; i < questions.length; i++) 
            {
                if (questions[i]['id'] == qid) 
                {
                    var answersLength = questions[i]['answers'].length;
                    for (let j = 0; j < answersLength; j++) 
                    {
                        let is_correct = questions[i]['answers'][j]['is_correct'] == 1;

                        // Add Bootstrap badge classes dynamically
                        let badgeClass = is_correct ? 'badge badge-success badge-rounded' : 'badge badge-danger badge-rounded';
                        let badgeText = is_correct ? 'Yes' : 'No';

                        html += `<tr>
                                    <td>` + (j + 1) + `</td>
                                    <td>` + questions[i]['answers'][j]['answer'] + `</td>
                                    <td><span class="${badgeClass}">${badgeText}</span></td>
                                </tr>`;
                    }
                    break;
                }
            }
            $('.showAnswers').html(html);
        });
        


        // Dynamically Edit and add New Answers
        $("#addEditAnswers").click(function() 
        {
            // Count the number of answers with class "answers"
            var answerCount = $(".eAns").length;
            if (answerCount >= 6) 
            {
                $(".Editerror").text("You have added the maximum number of answers!");
                setTimeout(function() 
                {
                    $(".Editerror").text("");
                }, 2000);
            } else 
            {
                var html = `<div class="row eAns align-items-center mb-2">` +
                                `<div class="col-auto pe-0">` +
                                    `<input class="form-check-input edit_is_correct" type="radio" value="option1" name="is_correct">` +
                                `</div>` +
                                `<div class="col">` +
                                    `<input type="text" class="form-control input-default" style="width: 80%;" name="new_answers[]" placeholder="Enter Answer" required>` +
                                `</div>` +
                                `<div class="col-auto">` +
                                    `<button class="btn btn-danger shadow btn-xs sharp remove-answer"><i class="fa fa-times"></i></button>` +
                                `</div>` +
                            `</div>`;
                $(".editModalAnswers").append(html);
            }
        });

        // Get Question details in the modal
        $(document).on('click', '.editButton', function() {
            var qid = $(this).data('id');
            $.ajax({
                url: "{{ route('editQnaInfo') }}",
                type: "GET",
                data: { qid: qid }, // Pass the data as an object
                success: function(data){
                    console.log(data);
                    var qna = data.data[0];
                    $("#question_id").val(qna['id']);
                    $("#question").val(qna['question']);
                    $("#explaination").val(qna['explaination']);
                    $(".eAns").remove();
                    var html = '';
                    for(let i=0; i<qna['answers'].length; i++)
                    {
                        var checked = '';
                        if(qna['answers'][i]['is_correct'] == 1)
                        {
                            checked = 'checked';
                        }

                        html += `<div class="row eAns align-items-center mb-2">` +
                                    `<div class="col-auto pe-0">` +
                                        `<input class="form-check-input edit_is_correct" type="radio" value="option1" name="is_correct" `+ checked +`>` +
                                    `</div>` +
                                    `<div class="col">` +
                                        `<input type="text" class="form-control input-default" style="width: 80%;" name="answers[`+ qna['answers'][i]['id'] +`]" placeholder="Enter Answer" value="`+ qna['answers'][i]['answer'] +`" required>` +
                                    `</div>` +
                                    `<div class="col-auto">` +
                                        `<button class="btn btn-danger shadow btn-xs sharp remove-answer" data-id="`+ qna['answers'][i]['id'] +`"><i class="fa fa-times"></i></button>` +
                                    `</div>` +
                                `</div>`;
                    }
                    $(".editModalAnswers").append(html);
                }
            });
        });



        // Remove dynamically new added answers (Edit)
        $(document).on("click", ".remove-answer", function() 
        {
            $(this).closest(".eAns").remove();
        });



        // Edit Form submit
        $("#editQna").submit(function (e) 
        {
            e.preventDefault();
            if ($(".eAns").length < 2) 
            {
                $(".Editerror").text("Please add at least 2 answers!");
                setTimeout(function () 
                {
                    $(".Editerror").text("");
                }, 2000);
            }
            else 
            {
                var checkIsCorrect = false;
                var selectedValue = null; // Initialize to null
            
                // Loop through radio buttons with class "is_correct"
                $(".edit_is_correct").each(function () 
                {
                    if ($(this).is(":checked")) 
                    {
                        checkIsCorrect = true;
                        // Find the associated text input using closest and next
                        selectedValue = $(this).closest(".eAns").find(".input-default").val();
                    }
                });

                if (checkIsCorrect) 
                {
                    var formData = $(this).serialize();

                    
                    formData += "&edit_is_correct=" + selectedValue;
                    $.ajax({
                        url:"{{ route('updateQna') }}",
                        type:"POST",
                        data:formData,
                        success:function(data){
                            console.log(data);
                            if(data.success == true){
                                location.reload();
                            }
                            else{
                                alert(data.msg);
                            }
                        }
                    });
                } else 
                {
                    $(".Editerror").text("Please select an answer!");
                    setTimeout(function () 
                    {
                        $(".Editerror").text("");
                    }, 2000);
                }
            }
        });

        //remove Answers
        $(document).on('click','.remove-answer',function(){           
            
            var ansId = $(this).attr('data-id');

            $.ajax({
                url:"{{ route('deleteAns') }}",
                type:"GET",
                data:{ id:ansId },
                success:function(data){
                    if(data.success == true){
                        console.log(data.msg);
                    }
                    else{
                        alert(data.msg);
                    }
                }
            });

        });


        
        //Delete Qna
        $('#deleteQnaModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var qnaId = button.data('id');
            var qnaName = button.data('name'); // Get the question's name
            // Update the text content of the <p> element with the selected question's name
            $('#questionToDeleteText').text('Do you want to delete "' + qnaName + '" ?');

            // Store the question ID in a hidden field for further processing
            $('#deleteQnaId').val(qnaId);
        });

        // Clear the modal content when the delete modal is hidden
        $('#deleteQnaModal').on('hidden.bs.modal', function () {
            $('#questionToDeleteText').text('Are you sure to delete ?'); // Reset the <p> text
            $('#deleteQnaId').val(''); // Clear the question ID
        });

        $("#deleteQna").submit(function(e){
            e.preventDefault();

            var formData = $(this).serialize();
            
            $.ajax({
                url:"{{ route('deleteQna')}}",
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


        //import Q&A

        $('#importQna').submit(function(e){
            e.preventDefault();
            
            let formData = new FormData();

            formData.append("file",fileupload.files[0]);

            $.ajaxSetup({
                headers:{
                    "X-CSRF-TOKEN":"{{ csrf_token() }}"
                }
            });

            $.ajax({
                url:"{{ route('importQna') }}",
                type:"POST",
                data:formData,
                processData:false,
                contentType:false,
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