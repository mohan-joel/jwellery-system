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
        <div class="row">
           <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Sell with Serial Number</h2>
                        <form action="{{ route('sellByUsingSerialNum') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="serial_num">Serial Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Serial Number" name="serial_num">
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ml-5 mt-2">
                                        <input type="submit" value="Sell" class="btn btn-sm btn-info">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
           </div>
        </div>
    </div>

    <div class="container">
    <div class="row">
        <div class="col-md-4"><a href="{{ url('/scan-info') }}">Click Here To Sale by Barcode</a></div>
    </div>
</div>
@endsection