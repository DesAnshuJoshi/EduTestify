@extends('layouts/admin-layout')
@section('chart-head')
	<title>Update Profile | Admin EduTestify</title>
@endsection
@section('space-work')
<div class="container-fluid">
    <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <span class="fw-bold fs-20 text-primary">Update Profile</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6">
                                <form action="{{ route('editProfile') }}" id="profileUpdate" enctype="multipart/form-data">
								@csrf
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Profile Image</strong></label>
                                        <input type="file" name="profile_pic" id="profile_pic" class="form-file-input form-control pt-3" accept=".jpg, .jpeg, .png, .gif">
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Name</strong></label>
                                        <input type="text" name="name" placeholder="Enter Name" class="form-control" value="{{ $userData->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Email</strong></label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ $userData->email }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <span>Forgot Password? <a href="/forgot-password" class="text-primary fw-bold">Click Here</a> to reset</span>
                                    </div>
                                    <div class="">
                                        <button type="reset" class="btn btn-outline-dark me-3">Clear</button>
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xl-6">
                                <!-- You can add a preview of the profile image here if needed -->
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
</div>


<!--<script>
    $(document).ready(function(){
		$("#profileUpdate").submit(function(e){
			e.preventDefault();

			var formData = $(this).serialize();

			$.ajax({
				url:"{{ route('editProfile')}}",
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
</script>-->
<script>
    $(document).ready(function(){
        $("#profileUpdate").submit(function(e){
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('editProfile')}}",
                type: "POST",
                data: formData,
                processData: false, // Important: prevent jQuery from processing the data
                contentType: false, // Important: prevent jQuery from setting contentType
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