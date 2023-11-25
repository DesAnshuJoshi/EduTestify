@extends('layouts/admin-layout')
@section('space-head')
<style>
.parent-class .default-select.pointer-events-none {
    pointer-events: none !important;
}
</style>
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
                            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addExamModal">Add Exam</button>
                            <!-- Modal Add Exam -->
                            <div class="modal fade" id="addExamModal" tabindex="-1" aria-labelledby="addExamModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="" id="addExam">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addExamModalLabel">Add Exam</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" name="exam_name" class="form-control input-default" id="exam_name" placeholder="Enter Exam Name" required><br>
                                                <select class="default-select form-control wide mb-3" name="subject_id" required>
                                                    <option>Select Subject</option>
                                                    @if(count($subjects) > 0)
                                                        @foreach($subjects as $subject)
                                                            <option value="{{ $subject->id}}">{{ $subject->subject}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <input type="date" name="date" class="form-control input-default" required min="@php echo date('Y-m-d'); @endphp"><br>
                                                <input type="time" name="time" class="form-control input-default" required><br>
                                                <input type="number" min="1" name="attempt" placeholder="Enter Exam Attempt Time" class="form-control input-default" required><br>
                                                <select name="plan" required class="default-select form-control wide mb-3">
                                                    <option value="">Select Plan</option>
                                                    <option value="0">Free</option>
                                                    <option value="1">Paid</option>
                                                </select>
                                                <input type="number" class="form-control input-default mb-3" placeholder="In INR" name="inr" disabled>
                                                <input type="number" class="form-control input-default" placeholder="In USD" name="usd" disabled>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add Exam</button>
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
                        <h4 class="card-title">Exams</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Exam Name</th>
                                        <th>Subject</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Attempt</th>
                                        <th>Plan</th>
                                        <th>Prices</th>
                                        <th>Add Questions</th>
                                        <th>See Questions</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($exams) > 0)
                                    @foreach ($exams as $exam)
                                        <tr>
                                            <td>{{ $exam->id }}</td>
                                            <td>{{ $exam->exam_name }}</td>
                                            <td>{{ $exam->subjects[0]['subject'] }}</td>
                                            <td>{{ $exam->date }}</td>
                                            <td>{{ $exam->time }} Hrs</td>
                                            <td>{{ $exam->attempt }} Time(s)</td>
                                            <td>
                                                @if($exam->plan != 0)
                                                    <span class="badge badge-pill badge-danger">PAID</span>
                                                @else
                                                    @php 
                                                        $package = json_decode(json_encode($exam->package), true);
                                                        $expires = '';
                                                        foreach($package as $data){
                                                            $expires = $data['expiry'];
                                                        }
                                                    @endphp
                                                    @if($exam->is_package_exam && date('Y-m-d') <= $expires)
                                                        <span class="badge badge-pill badge-success">Package Exam(FREE)</span>
                                                    @else
                                                        <span class="badge badge-pill badge-success">FREE</span>
                                                    @endif                                                
                                                @endif
                                            </td>
                                            <td>
                                                @if($exam->prices != null)
                                                    @php $planPrices = json_decode($exam->prices); @endphp
                                                    @foreach($planPrices as $key => $price)
                                                        <span>{{ $key }} {{ $price }},</span>
                                                    @endforeach
                                                @else
                                                    <span>N / A</span>
                                                @endif</td>
                                            <td>
                                                <a href="#" class="addQuestions" data-id="{{ $exam->id }}" data-bs-toggle="modal" data-bs-target="#addQnaModal">Add Questions</a>
                                            </td>
                                            <td>
                                                <a href="#" class="seeQuestions" data-id="{{ $exam->id }}" data-bs-toggle="modal" data-bs-target="#seeQnaModal">See Questions</a>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-primary shadow btn-xs sharp me-1 editButton" data-bs-toggle="modal" data-bs-target="#editExamModal" data-id="{{ $exam->id }}" data-exam="{{ $exam->exam_name}}" data-disabled="@if($exam->is_package_exam && date('Y-m-d') <= $expires) 1 @else 0 @endif"><i class="fas fa-pencil-alt"></i></button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <button class="btn btn-danger shadow btn-xs sharp deleteButton" data-bs-toggle="modal" data-bs-target="#deleteExamModal" data-id="{{ $exam->id }}" data-exam="{{ $exam->exam_name}}"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>  
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="text-muted">No Exams Found!</td>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- Modal Edit Exam -->
                    <div class="modal fade" id="editExamModal" tabindex="-1" aria-labelledby="editExamModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="" id="editExam">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editExamModalLabel">Edit Exam</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="exam_id" id="exam_id">
                                        <input type="text" name="examName" class="form-control input-default" id="examName" placeholder="Enter Exam Name" required><br>
                                        <select class="default-select form-control wide mb-3" name="subject_id" id="subject_id" required class=w-100>
                                            <option value="">Select Subject</option>
                                            @if(count($subjects) > 0)
                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                                                @endforeach
                                            @endif
                                        </select><br>
                                        <input type="date" name="date" id="date" class="form-control input-default" required min="@php echo date('Y-m-d'); @endphp"><br>
                                        <input type="time" name="time" id="time" class="form-control input-default" required><br>
                                        <input type="number" min="1" name="attempt" id="attempt" placeholder="Enter Exam Attempt Time" class="form-control input-default" required><br>
                                        <!-- <select name="plan" id="plan" required class=" form-control wide mb-3 plan">
                                            <option value="">Select Plan</option>
                                            <option value="0">Free</option>
                                            <option value="1">Paid</option>
                                        </select> -->
                                        <select name="plan" id="plan" data-select-type="custom" required class="plan-nice-select default-select form-control wide mb-3 plan">
                                            <option value="">Select Plan</option>
                                            <option value="0">Free</option>
                                            <option value="1">Paid</option>
                                        </select>
                                        <input type="number" class="form-control input-default mb-3" placeholder="In INR" name="inr" id="inr" disabled>
                                        <input type="number" class="form-control input-default" placeholder="In USD" name="usd" id="usd" disabled>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="inr" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="usd" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Delete Subject -->
                    <div class="modal fade" id="deleteExamModal" tabindex="-1" aria-labelledby="deleteExamModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="" id="deleteExam">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteExamModalLabel">Delete Exam</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p id="examToDeleteText"><span id="examToDelete"></span></p>
                                        <input type="hidden" name="id" id="deleteExamId">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Add Exam Questions -->
                    <div class="modal fade" id="addQnaModal" tabindex="-1" aria-labelledby="addQnaModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="" id="addQna">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addQnaModalLabel">Assign Questions</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="exam_id" id="addExamId">
                                        <input type="search" name="search" id="search" onkeyup="searchTable()" class="form-control input-default" placeholder="Search here">
                                        <br>
                                        <div style="max-height: 300px; overflow-y: auto;">
                                            <table class="table table-responsive-sm" id="questionsTable">
                                                <thead>
                                                    <th class="fw-bold">Select</th>
                                                    <th class="fw-bold">Question</th>
                                                </thead>
                                                <tbody class="addBody">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add Q&A</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal See Assigned Questions -->
                    <div class="modal fade" id="seeQnaModal" tabindex="-1" aria-labelledby="seeQnaModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="seeQnaModalLabel">See Questions</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div style="max-height: 300px; overflow-y: auto;">
                                            <table class="table table-responsive-sm" id="questionsTable">
                                                <thead>
                                                    <th class="fw-bold">#</th>
                                                    <th class="fw-bold">Question</th>
                                                    <th class="fw-bold">Delete</th>
                                                </thead>
                                                <tbody class="seeBody">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
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

        // Define a function to reset the select and textboxes
        function resetModalState() {
            $('#plan').val('0'); // Set it to 'Free' by default
            $('#inr').val('').prop('disabled', true).removeAttr('required');
            $('#usd').val('').prop('disabled', true).removeAttr('required');
        }

        $("#addExam").submit(function(e){
            e.preventDefault();

            var formData = $(this).serialize();

                $.ajax({
                    url:"{{ route('addExam')}}",
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

        // Handle the edit button click
        $('#example tbody').on('click', '.editButton', function () {

            var isDisabled = parseInt($(this).data('disabled'));
            
            var id = $(this).data('id');
            $("#exam_id").val(id);

            var url = '{{ route("getExamDetail", ":id") }}';
            url = url.replace(':id', id);

            // Reset the values in prices textboxes
            $('#inr').val('');
            $('#usd').val('');

            // Reset the select box value to the default option
            $('#plan').val('0'); // Set it to 'Free' by default

            if (isDisabled == 1) {
                // If the exam is in a package, disable pointer events for the specific .nice-select element associated with #plan also value will be set to ''
                $('#plan').val('');
                $('.plan-nice-select').css('pointer-events', 'none');
            } else {
                // If the exam is not in a package, enable pointer events for the specific .nice-select element associated with #plan
                $('.plan-nice-select').css('pointer-events', 'auto');
            }


            $.ajax({
                url: url,
                type: "GET",
                success: function (data) {
                    if (data.success == true) {
                        var exam = data.data;
                        $('#examName').val(exam[0].exam_name);
                        $('#subject_id').val(exam[0].subject_id);
                        $('#date').val(exam[0].date);
                        $('#time').val(exam[0].time);
                        $('#attempt').val(exam[0].attempt);

                        // Enable or disable the price textboxes based on the plan
                        var inrTextBox = $('#inr');
                        var usdTextBox = $('#usd');
                        if (exam[0].plan == 1) {
                            let prices = JSON.parse(exam[0].prices);
                            inrTextBox.val(prices.INR);
                            usdTextBox.val(prices.USD);
                            inrTextBox.prop('disabled', false);
                            usdTextBox.prop('disabled', false);
                            inrTextBox.attr('required', 'required');
                            usdTextBox.attr('required', 'required');
                        } else {
                            inrTextBox.prop('disabled', true);
                            usdTextBox.prop('disabled', true);
                            inrTextBox.removeAttr('required');
                            usdTextBox.removeAttr('required');
                        }
                    } else {
                        alert(data.msg);
                    }
                }
            });
        });





        $("#editExam").submit(function(e){
            e.preventDefault();

            var formData = $(this).serialize();

                $.ajax({
                    url:"{{ route('updateExam')}}",
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
            resetModalState();
        });

        //Delete
        $('#deleteExamModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var exam = button.data('exam');
                // Update the text content of the <p> element with the selected subject
                $('#examToDeleteText').text('Are you sure to delete "' + exam + '" Exam?');
                
                // Store the subject ID in a hidden field for further processing
                $('#deleteExamId').val(button.data('id'));
            });

            // Clear the modal content when the delete modal is hidden
            $('#deleteExamModal').on('hidden.bs.modal', function () {
                $('#examToDeleteText').text('Are you sure to delete ?'); // Reset the <p> text
                $('#deleteExamId').val(''); // Clear the subject ID
            });
       
        
        $("#deleteExam").submit(function(e){
            e.preventDefault();

            var formData = $(this).serialize();
            
            $.ajax({
                url:"{{ route('deleteExam')}}",
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


        // Qna Exam Question Section
        $(document).on('click', '.addQuestions', function () {
            var id = $(this).data('id');
            $('#addExamId').val(id);

            $.ajax({
                url: "{{ route('getQuestions') }}",
                type: "GET",
                data: { exam_id: id },
                success: function (data) {
                    if (data.success == true) {
                        var questions = data.data;
                        var html = '';
                        if (questions.length > 0) {
                            for (let i = 0; i < questions.length; i++) {
                                html += `
                                    <tr>
                                        <td><input type="checkbox" value="` + questions[i]['id'] + `" name="questions_ids[]"></td>
                                        <td>` + questions[i]['questions'] + `</td>
                                    </tr>
                                `;
                            }
                        } else {
                            html += `
                                <tr>
                                    <td colspan="2">Questions not Available!</td>
                                </tr>`;
                        }

                        $('.addBody').html(html);
                    } else {
                        alert(data.msg);
                    }
                }
            });
        });


        $("#addQna").submit(function(e){
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url:"{{ route('addQuestions') }}",
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
        
        //see questions
        $(document).on('click', '.seeQuestions', function () {
        // $('.seeQuestions').click(function(){
            var id = $(this).data('id');

            $.ajax({
                url:"{{ route('getExamQuestions') }}",
                type:"GET",
                data:{exam_id:id},
                success:function(data){
                    console.log(data);

                    var html = '';
                    var questions = data.data;
                    if(questions.length > 0){

                        for(let i = 0; i < questions.length; i++){
                            html +=`
                                <tr>
                                    <td>`+(i+1)+`</td>
                                    <td>`+questions[i]['question'][0]['question']+`</td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-danger shadow btn-xs sharp deleteQuestion" data-id="`+questions[i]['id']+`"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            `;
                        }

                    }
                    else{
                        html +=`
                            <tr>
                                <td colspan="1">Questions not available!</td>
                            </tr>
                        `;
                    }
                    $('.seeBody').html(html);
                }
            });
        });

        //delete question
        $(document).on('click','.deleteQuestion',function(){
            var id = $(this).data('id');
            var obj = $(this);
            $.ajax({
                url:"{{ route('deleteExamQuestions') }}",
                type:"GET",
                data:{id:id},
                success:function(data){
                    if(data.success == true){
                        // obj.parent().parent().remove();
                        location.reload();
                    }
                    else{
                        alert(data.msg);
                    }
                }
            })

        });

        //plan js
        $('.default-select[name="plan"]').change(function () {
            var plan = $(this).val();
            var inrInput = $('input[name="inr"]');
            var usdInput = $('input[name="usd"]');

            if (plan == "1") { // Use "1" as the value for Paid
                inrInput.attr('required', 'required');
                usdInput.attr('required', 'required');

                inrInput.prop('disabled', false);
                usdInput.prop('disabled', false);
            } else {
                inrInput.removeAttr('required');
                usdInput.removeAttr('required');

                inrInput.prop('disabled', true);
                usdInput.prop('disabled', true);
            }
        });

    });
</script>
<script>
    function searchTable()
    {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById('search');
        filter = input.value.toUpperCase();
        table = document.getElementById('questionsTable');
        tr = table.getElementsByTagName("tr");
        for(i = 0; i < tr.length; i++){
            td = tr[i].getElementsByTagName("td")[1];
            if(td){
                txtValue = td.textContent || td.innerText;
                if(txtValue.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                }
                else{
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection