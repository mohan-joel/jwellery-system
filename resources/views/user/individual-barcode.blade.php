<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Barcode</title>
    <link rel="stylesheet" href="{{ asset('assets/css/individualBarcode.css') }}" >
</head>
<body>
   <div class="container">
            <div class="box">
                <div class="barcode">
                    {!! $product->barcode !!}
                    <p>{{ substr($product->product->product_name,0,3) }}{{ substr($product->jwelleryType->jwellery_type_name,0,3) }}-{{ $product->product_code }}</p>
                </div>
                <div class="row1">
                    <p>Net wt.{{ $product->net_wt }}</p><p>Stone wt.{{ $product->stone_wt}}</p><p>Gross wt.{{ $product->gross_wt }}</p>
                </div>
            </div>
   </div>

    <div class="button-container">
        <button onclick="window.print()" id="print_btn" >Print</button>
        <button id="goBack_btn" onclick="goBack()">Go Back</button>
    </div>


    <script>
        function goBack(){
            window.location.href="/stocks";
        }
    </script>
</body>
</html>