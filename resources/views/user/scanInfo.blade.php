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

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Scan Barcode for sale</h2>
            <div class="row ">
                <div class="col-md-6">
                    <label for="barcode">Scan Barcode:</label>
                    <input type="text" id="barcode" name="barcode" class="form-control">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4"><a href="{{ url('/add-product-in-stock') }}">Click Here To Add Product</a></div>
    </div>
</div>



<script>
        document.getElementById('barcode').addEventListener('change', function() {
            var barcode = this.value;

            // Redirect to the Laravel route with the scanned barcode
            window.location.href = '/show-by-barcode/'+barcode;
            document.getElementById('barcode').focus();
        });
    </script>

@endsection