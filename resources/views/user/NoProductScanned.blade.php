@extends('user.layouts.app')
@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
        <div class="alert alert-success alert-dismissible fade show successMsg" role="alert">
                <div class="text-danger">Product is not Scanned by BCR machine. Please scan barcode of product by BCR machine and come to this route again.</div>
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>


@endsection