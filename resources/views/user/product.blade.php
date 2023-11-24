@extends('user.layouts.app')
@section('content')
<!-- Button trigger modal for adding products -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddProductModal">
  Add Products
</button>



 <!-- ui code to search product -->
 <div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <div class="search-field d-none d-md-block">
            <form class="d-flex h-100" action="{{ route('searchProduct') }}" method="get">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search product" name="product">
              </div>
            </form>
          </div>
        </div>
    </div>
</div>

<!-- Modal for adding product -->
<div class="modal fade" id="AddProductModal" tabindex="-1" role="dialog" aria-labelledby="AddProductModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="{{ route('add-products') }}">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="jwelleryType">Jwellery Type:</label>
                <select name="jwellery_type" class="form-control">
                    <option value="">--Select Jwellery Type--</option>
                    @foreach($jwelleryTypes as $jwelleryType)
                    <option value="{{ $jwelleryType->id }}">{{ $jwelleryType->jwellery_type_name }}</option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('jwellery_type')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="jwelleryType">Product Name:</label>
                <input type="text" class="form-control" placeholder="Enter Product Name"  name="product_name">
                <span class="text-danger">
                    @error('product_name')
                        {{ $message }}
                    @enderror
                </span>
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


<!-- Modal for editing product -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="{{ url('update-product') }}">
        @csrf
        @method('PUT')

        <input type="hidden" id="product_id" name="product_id">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Products</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="form-group">
                <label for="jwelleryType">Jwellery Type:</label>
                <select name="jwellery_type" id="jwellery_type" class="form-control">
                    <option value="">--Select Jwellery Type--</option>
                    @foreach($jwelleryTypes as $jwelleryType)
                    <option value="{{ $jwelleryType->id }}">{{ $jwelleryType->jwellery_type_name }}</option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('jwellery_type')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="jwelleryType">Product Name:</label>
                <input type="text" class="form-control"   name="product_name" id="product_name">
                <span class="text-danger">
                    @error('product_name')
                        {{ $message }}
                    @enderror
                </span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal for deleting product -->
<div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="{{ route('delete-product') }}">
        @csrf
        @method('PUT')

        <input type="hidden" id="pId" name="pId">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this product?</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="jwelleryType">Product Name:</label>
                <input type="text" class="form-control" placeholder="Enter Product Name"  name="productName" id="productName">
                <span class="text-danger">
                    @error('product_name')
                        {{ $message }}
                    @enderror
                </span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger">Yes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<br>

@if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show successMsg" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <hr>
        <div class="container">
            <div class="col-md-12">
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Jwellery Type</th>
                           <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($products) > 0)
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $a++ }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->jwelleryType->jwellery_type_name }}</td>
                                <td><button class="btn btn-success editProduct" data-id="{{ $product->id }}" data-bs-toggle="modal" data-bs-target="#editProductModal">Update</button><button class="btn btn-danger deleteProduct" data-id="{{ $product->id }}" data-prod="{{ $product->product_name }}" data-bs-toggle="modal" data-bs-target="#deleteProductModal">Delete</button></td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-danger text-center">No Products Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                {{ $products->links()}}
            </div>
        </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $(document).on("click",".editProduct",function(){
                    var pid = $(this).attr("data-id");
                    $.ajax({
                        type:"get",
                        url: "/edit-product/"+pid,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(response){
                            console.log(response.data);
                            $("#product_name").val(response.data['product_name']);
                            $("#jwellery_type").val(response.data['jwelleryType_id']);
                            $("#product_cp").val(response.data['product_cp']);
                            $("#product_sp").val(response.data['product_sp']);
                            $("#description").val(response.data['description']);
                            $("#product_id").val(pid);
                            $("#quantity").val(response.data['quantity']);
                            $(".weight").val(response.data['weight']);
                        }
                    });
                });


              $(document).on("click",".deleteProduct",function(){
                    var pid = $(this).attr("data-id");
                    var pname = $(this).attr("data-prod");
                    $("#pId").val(pid);
                    $("#productName").val(pname);
                    
              });
            });
        </script>

@endsection