@extends('user.layouts.app')
@section('content')

<!-- Button trigger modal for adding Suppliers  -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddSupplierModal">
  Add Suppliers
</button>

 <!-- ui code to search jwellery type -->
 <div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <div class="search-field d-none d-md-block">
            <form class="d-flex h-100" action="{{ route('searchSupplier') }}" method="get">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search Suppliers" name="supplier">
              </div>
            </form>
          </div>
        </div>
    </div>
</div>

@if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show successMsg" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

<!-- Modal for adding jwellery type-->
<div class="modal fade" id="AddSupplierModal" tabindex="-1" role="dialog" aria-labelledby="AddSupplierModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="{{ route('add-suppliers') }}">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="jwelleryType">Supplier's Name:</label>
                <input type="text" class="form-control" placeholder="Enter Supplier's Name "  name="supplier_name">
                <span class="text-danger">
                    @error('supplier_name')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="jwelleryType">Supplier's Email:</label>
                <input type="email" class="form-control" placeholder="Enter Supplier's Email "  name="supplier_email">
                <span class="text-danger">
                    @error('supplier_email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="jwelleryType">Supplier's Contact:</label>
                <input type="text" class="form-control" placeholder="Enter Supplier's Contact "  name="supplier_contact">
                <span class="text-danger">
                    @error('supplier_contact')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="jwelleryType">Supplier's Address:</label>
                <input type="text" class="form-control" placeholder="Enter Supplier's Address "  name="supplier_address">
                <span class="text-danger">
                    @error('supplier_address')
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

<!-- Modal for editing suppliers-->
<div class="modal fade" id="editSupplierModal" tabindex="-1" role="dialog" aria-labelledby="editSupplierModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="{{ route('update-supplier') }}">
        @csrf
        @method('PUT')
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="sid" name="sid">
            <div class="form-group">
                <label for="jwelleryType">Supplier's Name:</label>
                <input type="text" class="form-control" id="supplier_name"  name="supplier_name">
                <span class="text-danger">
                    @error('supplier_name')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="jwelleryType">Supplier's Email:</label>
                <input type="email" class="form-control" id="supplier_email"  name="supplier_email">
                <span class="text-danger">
                    @error('supplier_email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="jwelleryType">Supplier's Contact:</label>
                <input type="text" class="form-control" id="supplier_contact"  name="supplier_contact">
                <span class="text-danger">
                    @error('supplier_contact')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="jwelleryType">Supplier's Address:</label>
                <input type="text" class="form-control" id="supplier_address"  name="supplier_address">
                <span class="text-danger">
                    @error('supplier_address')
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


<!-- Modal for deleting suppliers-->
<div class="modal fade" id="deleteSupplierModal" tabindex="-1" role="dialog" aria-labelledby="deleteSupplierModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="{{ route('delete-supplier') }}">
        @csrf
        @method('PUT')
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Do you want to delete below Supplier?</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="supplier_id" name="sid">
            <div class="form-group">
                <label for="jwelleryType">Supplier's Name:</label>
                <input type="text" class="form-control" id="fullname"  name="supplier_name">
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


<hr>
<div class="container">
    <div class="col-md-12">
        <table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Supplier's Name</th>
                    <th>Supplier's Email</th>
                    <th>Supplier's Contact</th>
                    <th>Supplier's Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               @if(count($suppliers) > 0)
               @foreach($suppliers as $supplier)
               <tr>
                    <td>{{ $a++ }}</td>
                    <td>{{ $supplier->fullname }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>{{ $supplier->contact }}</td>
                    <td>{{ $supplier->address }}</td>
                    <td><button type="button" class="btn btn-success editSupplier" data-id="{{ $supplier->id }}"  data-bs-toggle="modal" data-bs-target="#editSupplierModal">Update</button><button type="button" class="btn btn-danger deleteSupplier" data-id="{{ $supplier->id }}" data-name="{{ $supplier->fullname }}" data-bs-toggle="modal" data-bs-target="#deleteSupplierModal">Delete</button></td>
                </tr>
               @endforeach
               @else
                <tr>
                    <td colspan="6" class="text-danger text-center">No Suppliers Found</td>
                </tr>
               @endif
            </tbody>
        </table>

        {{ $suppliers->links()}}
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $(document).on("click",".editSupplier",function(){
                    var sid = $(this).attr("data-id");
                    $.ajax({
                        type:"get",
                        url: "/edit-supplier/"+sid,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(response){
                           console.log(response.data);
                           $("#supplier_name").val(response.data['fullname']);
                           $("#supplier_email").val(response.data['email']);
                           $("#supplier_contact").val(response.data['contact']);
                           $("#supplier_address").val(response.data['address']);
                           $("#sid").val(sid);
                        }
                    });
                });
            
            $(document).on("click",".deleteSupplier",function(){
                    var sid = $(this).attr("data-id");
                    var supplier_name = $(this).attr("data-name");
                    $("#supplier_id").val(sid);
                    $("#fullname").val(supplier_name);
            });

           
            });
        </script>
@endsection