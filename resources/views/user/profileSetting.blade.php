@extends('user.layouts.app')
@section('content')

@if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show successMsg" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
<div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card alert alert-success  changeProfileCard" style="display:none">
                        <form action="{{ url('/updateProfilePic/'.Auth::user()->id )}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-md-8">
                                <input type="file" class="form-control" name="profilePic">
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-primary ml-5">Change Profile Image</button>
                                </div>
                            </div>
                        </form>
                        <button type="button" class="close hideChangeProfilecard" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card">
                        <div class="profile-card">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <img src="{{ asset('uploads/profile_image/'.Auth::user()->image ) }}" alt="profile-image" style="height:120px; width:120px;border-radius:80px;">
                                    <button type="button" id="appearChangeProfilePic" class="btn btn-mute">Want to change it?</button></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/update-profile-info/'.Auth::user()->id ) }}" method="post">
                                @csrf
                               
                                <div class="form-group">
                                    <label for="fullname">Full Name:</label>
                                    <input type="text" class="form-control" name="fullname" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group confirmationForChangePassword">
                                    <span>Do you want to change password also? <button type="button" class="btn btn-primary btn-success" id="yesChangePassword">Yes</button><button type="button" class="btn btn-primary btn-danger ml-2" id="noChangePassword">No</button></span>
                                </div>
                                <div class="form-group current_password" style="display:none;">
                                    <label for="current_password">Current Password:</label>
                                    <input type="password" class="form-control" name="current_password" placeholder="Enter current password"  id="current_password">
                                    <span id="checkCurrentPasswordMsg"></span>
                                </div>
                                <div class="form-group new_password" style="display:none;">
                                    <label for="new_password">New Password:</label>
                                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter new password">
                                </div>
                                <div class="form-group confirm_new_password" style="display:none;">
                                    <label for="confirm_new_pass">Re-type New Password:</label>
                                    <input type="password" class="form-control" name="confirm_new_password" id="confirm_new_password" placeholder="Re-type new password">
                                    <span id="confirmPasswordMsg"></span>
                                </div>
                                <div class="card-footer float-right saveChangeBtn" style="display:none;">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#appearChangeProfilePic").click(function(){
                $(".changeProfileCard").show();
            });
            $(".hideChangeProfilecard").click(function(){
                $(".changeProfileCard").hide();
            });

            $("#current_password").keyup(function(){
                var current_password = $(this).val();
                $.ajax({
                    url:"/check-current-password/"+current_password,
                    data:{current_password:current_password},
                    type:"get",
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    success:function(data){
                        if(data=="true"){
                            $(".new_password").show();
                            $(".confirm_new_password").show();
                            $("#checkCurrentPasswordMsg").text("Current Password Matched. You can change password now.").css('color','green');
                        }else{
                            $("#checkCurrentPasswordMsg").text("Current Password did not match").css('color','red');
                        }
                    }
                });
            });

            $("#confirm_new_password").keyup(function(){
                var new_password = $("#new_password").val();
                var confirm_new_password = $("#confirm_new_password").val();
                if(new_password == confirm_new_password){
                    $("#confirmPasswordMsg").text("New Password is confirmed").css('color','green');
                    $(".saveChangeBtn").show();
                }else{
                    $("#confirmPasswordMsg").text("New Password is not confirmed").css('color','red');
                }
            });

            $("#noChangePassword").click(function(){
                $(".saveChangeBtn").show();
                $(".confirmationForChangePassword").hide();
            });

            $("#yesChangePassword").click(function(){
                $(".current_password").show();
                $(".confirmationForChangePassword").hide();
            });
        });
    </script>
@endsection