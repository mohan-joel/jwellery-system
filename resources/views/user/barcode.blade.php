<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/barcodePrint.css')}}">
    <title>KG Jweller's Shop</title>
</head>
<body>
<div class="container">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header hide">
                        <h4 style="float:left">Product Barcodes</h4>
                    </div>
                    <div class="card-body">
                        <div id="print">
                            <div class="row mt-3">
                                @forelse($products as $product)
                                    <div class="col-md-3 p-0 rectangle mt-2">
                                        <div class="card barcode-card">
                                            <div class="card-body editBarcode">
                                               <div class="container">
                                                    <div class="row justify-content-center">
                                                        {!! $product->barcode !!}
                                                    </div>
                                                    <div class="row">
                                                        <p>{{ substr($product->product->product_name,0,3) }}{{ substr($product->jwelleryType->jwellery_type_name,0,3) }}-{{ $product->product_code }}</p><p class="ml-3">Stone wt.{{ $product->stone_wt}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">Net wt.{{ $product->net_wt }}</div>
                                                        <div class="col-md-6">Gross wt.{{ $product->gross_wt }}</div>
                                                    </div>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h2 class="text-danger text-center">No Product Added Till Now</h2>
                                @endforelse
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="container">
       <div class="row justify-content-end align-content-end">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body bg-dark no-print">
                        <button type="button" class="btn btn-md btn-secondary ml-2" onclick="window.print()" id="print_btn">Print</button>
                        <button type="button" class="btn btn-md btn-primary ml-2" onclick="goBack()" id="print_btn">Go Back</button>
                    </div>
                </div>
            </div>
        </div>
       </div>
    </div>
</div>

<script>
    function goBack(){
        window.location.href="/stocks";
    }
</script>
</body>
</html>

