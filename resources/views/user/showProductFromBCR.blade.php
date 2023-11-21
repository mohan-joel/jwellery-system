@extends('user.layouts.app')
@section('content')

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title"></h2>
            <div class="row">
                <div class="col-md-6">
                
                </div>

                <div class="col-md-6">
                    <p class="card-text"><strong>Price: {{ $products->total_cp }}</strong> </p>
                    <p class="card-text"><strong>Jwellery Type:{{ $products->jwelleryType->jwellery_type_name  }}</strong> </p>
                    <p class="card-text"><strong>Product Name:{{ $products->product->product_name }}</strong> </p>
                    <p class="card-text"><strong>Weight: {{ $products->weight }}</strong> </p>
                    <p class="card-text"><strong>Quantity: {{ $products->quantity }}</strong> </p>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<script>
        document.getElementById('barcode').addEventListener('change', function() {
            var barcode = this.value;

            // Redirect to the Laravel route with the scanned barcode
            window.location.href = '/show-by-barcode?barcode=' + barcode;
        });
    </script>

@endsection