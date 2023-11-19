@extends('user.layouts.app')
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCustomersModal">
  Add Customers
</button>
<br>
@if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show successMsg" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

<!-- Modal -->
<div class="modal fade" id="addCustomersModal" tabindex="-1" role="dialog" aria-labelledby="addCustomersModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customers</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="customer_name">Customer's Name</label>
                        <input type="text" name="name" id="customer_name" class="form-control" placeholder="Enter Customer's Name">
                    </div>
                    <div class="col-md-6">
                    <label for="customer_email">Customer's Email</label>
                        <input type="email" name="email" id="customer_email" class="form-control" placeholder="Enter Customer's Email">
                    </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                        <label for="customer_contact">Customer's Contact</label>
                        <input type="text" name="contact" id="customer_contact" class="form-control" placeholder="Enter Customer's Contact">
                    </div>
                    <div class="col-md-6">
                    <label for="customer_address">Customer's Address</label>
                        <input type="text" name="address" id="customer_address" class="form-control" placeholder="Enter Customer's Address">
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

<br><br><br>
        <hr>
        <div class="container">
            <div class="col-md-12">
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer's Name</th>
                            <th>Customer's Email</th>
                            <th>Customer's Contact</th>
                            <th>Customer's Address</th>
                           <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($customers) > 0)
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{ $a++ }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->contact }}</td>
                                <td>{{ $customer->address }}</td>
                                <td><button class="btn btn-success editCustomer" data-id="{{ $customer->id }}" data-bs-toggle="modal" data-bs-target="#editCustomerModal">Update</button><button class="btn btn-danger deleteCustomer" data-id="{{ $customer->id }}" data-prod="{{ $customer->product_name }}" data-bs-toggle="modal" data-bs-target="#deleteCustomerModal">Delete</button></td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-danger text-center">No Products Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

@endsection