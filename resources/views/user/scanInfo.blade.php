@extends('user.layouts.app')
@section('content')


            <div class="alert alert-success alert-dismissible fade show successMsg" role="alert" style="display:none;">
                {{ Session::get('success') }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="alert alert-danger alert-dismissible fade show alertMsg" role="alert" style="display:none;">
                
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
        

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Scan Barcode for sale</h2>
                    <div class="row ">
                        <div class="col-md-6">
                            <label for="barcode">Scan Barcode:</label>
                            <input type="text" id="barcode" name="barcode" class="form-control">
                            <button type="submit" style="display:none;"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 bg-info productDetail" style="display:none;">
            <div class="container-fluid">
                <h4 class="text-center mt-3">Just Sold Product Details</h4>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jwelleryType">Jwellery Type</label>
                            <input type="text" id="jwelleryType" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product">Product</label>
                            <input type="text" id="product" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_code">Product Code</label>
                            <input type="text" id="product_code" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="net_wt">Net Weight</label>
                            <input type="text" id="net_wt" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stone_wt">Stone Weight</label>
                            <input type="text" id="stone_wt" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" id="price" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="quantity">Remaining Quantity</label>
                            <input type="text" id="quantity" class="form-control">
                        </div>
                    </div>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#barcode").change(function(){
            var barcode = $("#barcode").val();
            $.ajax({
                url:"/get-product-by-barcode/"+barcode,
                type:"get",
                dataType:"json",
                success:function(response){
                    console.log(response.data);
                    $(".productDetail").show();
                    $("#jwelleryType").val(response.data['jwellery_type']['jwellery_type_name']);
                    $("#product").val(response.data['product']['product_name']);
                    $("#net_wt").val(response.data['net_wt']);
                    $("#stone_wt").val(response.data['stone_wt']);
                    $("#price").val(response.data['price']);
                    $("#product_code").val(response.data['product_code']);
                    $("#quantity").val(response.data['quantity']);
                    $(".successMsg").show();
                    $(".successMsg").text(response.msg);

                    if($("#quantity").val() == 1){
                        $(".alertMsg").show();
                        $(".alertMsg").text("There is only one product in stock. If you want to add product through stock, you can add now. Otherwise product will be removed from stock and you won't be able to add product through barcode. Thank You!!!");
                    }
                    
                }

            });
        });
    });
</script>


@endsection