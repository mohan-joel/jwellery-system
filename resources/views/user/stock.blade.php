@extends('user.layouts.app')
@section('content')
<!-- bootstrap modal button to add stock -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Add Stocks</button>

<a href="{{ route('show-barcodes') }}" class="btn btn-secondary" >
  Show all Barcodes
</a>


@if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show successMsg" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


<!-- bootstrap modal to add stock -->
<div class="modal fade bd-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form method="post" action="{{ route('add-stock-details') }}">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Stock</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">  
                <div class="row">
                    <div class="container alert alert-primary alert-dismissible fade show">
                        <div class="row">
                            <div class="col-md-6">
                            <button type="button" class="btn btn-warning" id="add_supplier">New Suppliers</button><button type="button" class="btn btn-secondary" id="select_supplier">Old Supplier</button>
                                <select name="supplier_id" id="input_select_supplier" class="form-control supplier_id"  style="display:none;">
                                <option value="">Select Supplier</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->fullname }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="supplier_name" class="form-control" id="input_add_supplier" placeholder="Enter Supplier's Name" style="display:none;">
                            </div>
                            <div class="col-md-6">
                                <label for="supplier_email">Supplier's Email</label>
                                <input type="email" name="supplier_email" id="supplier_email" class="form-control" placeholder="Enter Supplier's Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="supplier_contact">Supplier's Contact</label>
                                <input type="text" class="form-control" name="supplier_contact" id="supplier_contact" placeholder="Enter Supplier's Contact">
                            </div>
                            <div class="col-md-6">
                                <label for="supplier_address">Supplier's Address</label>
                                <input type="text" class="form-control" name="supplier_address" id="supplier_address" placeholder="Enter Supplier's Address">
                            </div>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>
                    <div class="col-md-3">
                        <label for="jwelleryType">Jwellery Type</label>
                        <select name="jwellery_type_id" id="jwellery_type" class="form-control">
                                <option value="">Select Jwellery Type</option>
                            @foreach($jwelleryTypes as $jwelleryType)
                                <option value="{{ $jwelleryType->id }}">{{ $jwelleryType->jwellery_type_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="product">Product</label>
                        <select name="product_id" id="product" class="form-control">
                        <option value="">Select Product</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control" name="quantity" placeholder="Enter Quantity">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="net_wt">Net Weight (in gm)</label>
                        <input type="text" class="form-control" id="weight" name="net_wt" placeholder=" Enter Net Weight">
                    </div>
                    <div class="col-md-3">
                        <label for="net_wt">Gross Weight (in gm)</label>
                        <input type="text" class="form-control" id="weight" name="gross_wt" placeholder="Enter Gross Weight">
                    </div>
                    <div class="col-md-3">
                        <label for="net_wt">Stone Weight (in gm)</label>
                        <input type="text" class="form-control" id="weight" name="stone_wt" placeholder="Enter Stone Weight">
                    </div>
                    <div class="col-md-3">
                        <label for="net_wt">Price (in Rs)</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price">
                    </div>
                </div>
                
            
           
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>



 <!-- ui code to search stock by product name -->
 <div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <div class="search-field d-none d-md-block">
            <form class="d-flex h-100" action="{{ route('searchStock') }}" method="get">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search Stock by date" name="date">
              </div>
            </form>
          </div>
        </div>
    </div>
</div>




<!-- bootstrap modal to edit stock -->
<div class="modal fade editStockModal"  tabindex="-1" role="dialog" aria-labelledby="editStockModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form method="post" action="{{ route('update-stock-details') }}">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Stock</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">  
                <div class="row">
                    <div class="container alert alert-primary alert-dismissible fade show">
                        <div class="row">
                            <div class="col-md-6">
                            <button type="button" class="btn btn-warning" id="editadd_supplier">New Suppliers</button><button type="button" class="btn btn-secondary" id="editselect_supplier">Old Supplier</button>
                                <select name="supplier_id" id="editinput_select_supplier" class="form-control editsupplier_id"  style="display:none;">
                                <option value="">Select Supplier</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->fullname }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="=supplier_name" class="form-control" id="editinput_add_supplier" placeholder="Enter Supplier's Name" style="display:none;">
                            </div>
                            <div class="col-md-6">
                                <label for="supplier_email">Supplier's Email</label>
                                <input type="email" name="supplier_email" id="editsupplier_email" class="form-control" placeholder="Enter Supplier's Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="supplier_contact">Supplier's Contact</label>
                                <input type="text" class="form-control" name="supplier_contact" id="editsupplier_contact" placeholder="Enter Supplier's Contact">
                            </div>
                            <div class="col-md-6">
                                <label for="supplier_address">Supplier's Address</label>
                                <input type="text" class="form-control" name="supplier_address" id="editsupplier_address" placeholder="Enter Supplier's Address">
                            </div>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-light">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jwellery Type</th>
                                    <th>Product</th>
                                    <th>Weight(in tola)</th>
                                    <th>Quantity</th>
                                    <th>CP(per tola)</th>
                                    <th>Total</th> 
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                    <td></td>
                                    <td>
                                        <select name="jwellery_type_id" id="editJwellery_type" class="form-control">
                                            <option value="">Select Jwellery Type</option>
                                            @foreach($jwelleryTypes as $jwelleryType)
                                                <option value="{{ $jwelleryType->id }}">{{ $jwelleryType->jwellery_type_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    <select name="product_id" id="editProduct" class="form-control">
                                            <option value="">Select Product</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="editWeight" name="weight" placeholder="Enter Weight">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="added_qty" id="editQuantity" placeholder="Enter Quantity">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="cp" id="cp" placeholder="Enter CP">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="total" id="total">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-light">
                            <tr>
                                <th colspan="4">TAX:</th>
                                <td colspan="3"><input type="text" name="tax" id="tax" class="form-control">
                            </td>
                            </tr>
                            <tr>
                                <th colspan="4">Discount:</th>
                                <td colspan="3"><input type="text" name="discount" id="discount" class="form-control"></td>
                            </tr>
                            <tr>
                                <th colspan="4">Grand Total:</th>
                                <td colspan="3"><input type="text" name="g_total" id="g_total" class="form-control"></td>      
                            </tr>
                        </table>
                    </div>
                </div>
            
           
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for deleting stock -->
<div class="modal fade" id="deleteStockModal" tabindex="-1" role="dialog" aria-labelledby="deleteStockModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this stock?</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form action="{{ url('delete-stock') }}" method="post" >
        @csrf
        @method('PUT')
            <input type="hidden" id="stockId" name="stockId">
      
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger">Yes</button>
        </div>
     </form>
    </div>
  </div>
</div>


<!-- Modal to show each barcode-->
<div class="modal fade" id="eachBarcode" tabindex="-1" aria-labelledby="eachBarcodeLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Barcode of <span id="product_code"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <div class="card">
            <div class="card-body">
                <div class="row showEachbarcode"></div>
                <p style="letter-spacing:0.5em;">KGJ- <span id="eachProductCode"></span></p>
            </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="window.print()">Print</button>
      </div>
    </div>
  </div>
</div>



        <hr>
        <div class="container">
            <div class="col-md-12">
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Jwellery Type</th>
                            <th>Product </th>
                            <th>Supplier's Name</th>
                            <th>Quantity</th>
                            <th>Price (in Rs)</th>
                           <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($stocks) > 0)
                            @foreach($stocks as $stock)
                            <tr>
                                <td>{{ $a++ }}</td>
                                <td>{{ $stock->date }}</td>
                                <td>{{ $stock->jwelleryType->jwellery_type_name }}</td>
                                <td>{{ $stock->product->product_name }}</td>
                                <td>@if(empty($stock->supplier_email)) {{ "No Supplier" }} @else {{ $stock->supplier->fullname }} @endif</td>
                                <td>{{ $stock->quantity }}</td>
                                <td>{{ $stock->price }}</td>
                                <td><button class="btn btn-sm btn-success" id="editStock" data-id="{{ $stock->id }}" data-bs-toggle="modal" data-bs-target=".editStockModal">Update</button><button type="button" class="btn btn-sm btn-danger deleteStock" data-bs-toggle="modal" data-bs-target="#deleteStockModal" >Delete</button><button class="btn btn-sm btn-warning showBarcode" data-id="{{ $stock->id }}" data-bs-toggle="modal" data-bs-target="#eachBarcode">Barcode</button></td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="text-danger text-center">No Products Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{ $stocks->links()}}
                
            </div>
        </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                //code to select supplier and show their respective email and contact in input type for adding
              $("#supplier_name").click(function(){
                    var sid = $(this).val();
                    $.ajax({
                        url: "/get-suppliers-details/"+sid,
                        type: "get",
                        success:function(response){
                            $("#email").val(response.data['email']);
                            $("#supplier_contact").val(response.data['contact']);
                        }
                    });
               });

                //code to changing jwellery type and show their respective products details in select field for adding
                $(document).on("change","#jwellery_type",function(){
                    var jid = $(this).val();
                    if(jid==''){
                        $("#product").html("<option value=''>Select Product</option>")
                    }
                    $.ajax({
                        url: "/get-products-details/"+jid,
                        type: "get",
                        success:function(response){
                           var products = response.data;
                           var html = "<option value=''>Select Products</option>";
                           for(let i=0; i < products.length ; i++)
                           {
                              html +=`
                                    <option value="`+products[i]['id']+`" >`+products[i]['product_name']+`</option>
                              `;
                           }
                           $("#product").html(html);
                        }
                    });
               });



              



               //code to find amount by  adding tax and display in grand total input field for adding
               $(document).on("keyup","#tax",function(){
                    var tax = parseFloat($(this).val());
                    var total = parseFloat($("#total").val());
                    var tax_amt = parseFloat(tax/100*total);
                    var g_total = parseFloat(tax_amt + total);
                    $("#g_total").val(g_total);
               });


                //code to find grand total after adding vat and decreasing discount and showing in input field of grand total for adding
                $(document).on("keyup","#discount",function(){
                   var discount = parseFloat($("#discount").val());
                   var tax = parseFloat($("#tax").val());
                   var total = parseFloat($("#total").val());
                   var amt_with_vat = (100+tax)/100*total;
                   var amt_deducting_discount = (100-discount)/100*amt_with_vat;
                   var amt_deducting_discount= amt_deducting_discount.toFixed(2);
                   $("#g_total").val(amt_deducting_discount);
                   
                   
               });

              $(document).on("click","#editStock",function(){
                    var stock_id = $(this).attr("data-id");
                    // alert(stock_id);
                    $.ajax({
                        url: "/get-stocks-details/"+stock_id,
                        type: "get",
                        success: function(response){
                            console.log(response.data);
                            $("#editinput_select_supplier").val(response.data['supplier_id']);
                            $("#editJwellery_type").val(response.data['jwelleryType_id']);
                            $("#editProduct").val(response.data['product_id']);
                            $("#editWeight").val(response.data['weight']);
                            $("#editQuantity").val(response.data['quantity']);
                            $("#editTax").val(response.data['tax']);
                            $("#editDiscount").val(response.data['discount']);
                            $("#editG_total").val(response.data['grand_total']);
                            $("#editDate").val(response.data['date']);
                            $("#stock_id").val(stock_id);
                        }
                    });
              });

               //code to select supplier and show their respective email and contact in input type for editing
               $("#editSupplier_name").click(function(){
                    var sid = $(this).val();
                    $.ajax({
                        url: "/get-suppliers-details/"+sid,
                        type: "get",
                        success:function(response){
                            $("#editEmail").val(response.data['email']);
                            $("#editContact").val(response.data['contact']);
                        }
                    });
               });


                //code to changing jwellery type and show their respective products details in select field for editing
                $(document).on("click","#editJwellery_type",function(){
                    var jid = $(this).val();
                    if(jid==''){
                        $("#editProduct").html("<option value=''>Select Product</option>")
                    }
                    $.ajax({
                        url: "/get-products-details/"+jid,
                        type: "get",
                        success:function(response){
                           var products = response.data;
                           var html = "<option value=''>Select Products</option>";
                           for(let i=0; i < products.length ; i++)
                           {
                              html +=`
                                    <option value="`+products[i]['id']+`" >`+products[i]['product_name']+`</option>
                              `;
                           }
                           $("#editProduct").html(html);
                        }
                    });
               });

              

                //code to find total and show in respective input field for editing
                $(document).on("keyup","#editRq_qty",function(){
                    var rq_qty = $(this).val();
                    var cp = $("#editCp").val();
                    var total = rq_qty*cp;
                    $("#editTotal").val(total);
               });


               //code to find amount by  adding tax and display in grand total input field for editing
               $(document).on("keyup","#editTax",function(){
                    var tax = parseInt($(this).val());
                    var total = parseInt($("#editTotal").val());
                    var tax_amt = tax/100*total;
                    var g_total = tax_amt + total;
                    $("#editG_total").val(g_total);
               });


                //code to find grand total after adding vat and decreasing discount and showing in input field of grand total for editing
                $(document).on("keyup",".editDiscount",function(){
                        var discount = parseInt($(this).val());
                        var tax = parseInt($("#editTax").val());
                        var total = parseInt($("#editTotal").val());
                        var amt_with_tax = (100+tax)/100*total;
                        var amt_with_discount = Math.round((100-discount)/100*amt_with_tax);
                        $("#editG_total").val(amt_with_discount);
                });

                $("#add_supplier").click(function(){
                    if($("#input_select_supplier").show()){
                        $("#input_select_supplier").hide();
                    }
                    $("#input_add_supplier").show();
                });


                $("#editadd_supplier").click(function(){
                    if($("#editinput_select_supplier").show()){
                        $("#editinput_select_supplier").hide();
                    }
                    $("#editinput_add_supplier").show();
                });


                $("#select_supplier").click(function(){
                    if($("#input_add_supplier").show()){
                        $("#input_add_supplier").hide();
                    }

                    $("#input_select_supplier").show();
                });



                $("#editselect_supplier").click(function(){
                    if($("#editinput_add_supplier").show()){
                        $("#editinput_add_supplier").hide();
                    }

                    $("#editinput_select_supplier").show();
                });





                $(".supplier_id").change(function(){
                    var supplier_id = $(this).val();
                    $.ajax({
                        url: "/get-supplier-info/"+supplier_id,
                        type: "get",
                        success: function(response){
                            console.log(response.data);
                            $("#supplier_email").val(response.data['email']);
                            $("#supplier_contact").val(response.data['contact']);
                            $("#supplier_address").val(response.data['address']);
                        }
                    });
                });




                $(".editsupplier_id").change(function(){
                    var supplier_id = $(this).val();
                    $.ajax({
                        url: "/get-supplier-info/"+supplier_id,
                        type: "get",
                        success: function(response){
                            console.log(response.data);
                            $("#editsupplier_email").val(response.data['email']);
                            $("#editsupplier_contact").val(response.data['contact']);
                            $("#editsupplier_address").val(response.data['address']);
                        }
                    });
                });




              
              $(".showBarcode").click(function(){
                 var stock_id = $(this).attr("data-id");
                 $.ajax({
                    url: "/grave-all-stock-details/"+stock_id,
                    type: "get",
                    success: function(response){
                        console.log(response.data);
                        barcodeInfo = response.data;
                        $("#product_code").text(barcodeInfo['product_code']);
                        $(".showEachbarcode").html(barcodeInfo['barcode']);
                        $("#eachProductCode").text(barcodeInfo['product_code']);
                    }
                 });
                 
              });  
                
                   
            });

           
        </script>
        

@endsection