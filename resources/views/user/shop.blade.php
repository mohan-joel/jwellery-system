@extends('user.layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        /* Custom CSS for Facebook-like profile settings page */
        body {
            background-color: #f0f2f5;
        }
        .profile-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }
        .profile-picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-image: url('your-profile-image.jpg');
            background-size: cover;
            background-position: center;
            margin: 0 auto 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show successMsg" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="profile-card">
                        @if($shopDetails)
                        <div class="profile-picture">
                            <img src="{{ asset('uploads/shop_logo/'.$logo ) }}" alt="shop_logo" style="height:100px; width:100px; border-radius:100px;">
                        </div>
                        @else
                        <h2 class="text-center">Add Shop Details</h2>
                        @endif
                    <hr>
                    <form  action="{{ $shopDetails ? route('update-shop-details',$shopDetails->id ): route('add-shop-details') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                            <label for="fullName" class="form-label">Shop Name</label>
                            <input type="text" class="form-control" name="name" id="shop_name" @if($shopDetails) value="{{ $shopDetails->shop_name }}" @else  placeholder="Enter Shop's Name" @endif >
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Shop Address</label>
                            <input type="text" class="form-control" id="shop_address"  name="address" @if($shopDetails) value="{{ $shopDetails->shop_address }}" @else  placeholder="Enter Shop's Address" @endif>
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Shop Contact</label>
                            <input type="text" class="form-control" id="shop_contact"  name="contact" @if($shopDetails) value="{{ $shopDetails->shop_contact }}" @else  placeholder="Enter Shop's Contact" @endif >
                            <span class="text-danger">
                                @error('contact')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="mb-3">
                            @if($shopDetails)
                            <input type="file" name="shop_logo" class="form-control">
                            @else
                            <input type="file" class="form-control" name="shop_logo">
                            <span class="text-danger">
                                @error('shop_logo')
                                    {{ $message }}
                                @enderror
                            </span>
                            @endif
                        </div>
                        @if($shopDetails) <button type="submit" class="btn btn-primary">Update</button> @else <button type="submit" class="btn btn-primary">Save</button> @endif
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <!-- Add Bootstrap JS and Popper.js scripts at the end of your HTML body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    
</script>
@endsection
