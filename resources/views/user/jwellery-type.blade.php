@extends('user.layouts.app')
@section('content')

<!-- Button trigger modal for adding jwellery type -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddJwelleryTpeModal">
  Add Jwellery Type
</button>

<!-- Modal for adding jwellery type-->
<div class="modal fade" id="AddJwelleryTpeModal" tabindex="-1" role="dialog" aria-labelledby="AddJwelleryTpeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="{{ route('add-jwellery-type') }}">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Jwellery Type</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <label for="jwelleryType">Jwellery Type:</label>
            <input type="text" class="form-control" placeholder="Enter Jwellery Type"  name="jwellery_type_name">
            <span class="text-danger">
                @error('jwellery_type_name')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>



 <!-- ui code to search jwellery type -->
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <div class="search-field d-none d-md-block">
            <form class="d-flex h-100" action="{{ route('searchJwelleryType') }}" method="get">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search Jwellery Type" name="jwelleryType">
              </div>
            </form>
          </div>
        </div>
    </div>
</div>


<!-- Modal for editing jwellery type-->
<div class="modal fade" id="editJwelleryTypeNameModal" tabindex="-1" role="dialog" aria-labelledby="editJwelleryTypeNameModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="edit-jwellery-type">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Jwellery Type</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id" class="id" name="id">
            <label for="jwelleryType">Jwellery Type:</label>
            <input type="text" class="form-control"  id="jwelleryType" name="jwellery_type_name">
            <span class="text-danger">
                @error('jwellery_type_name')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for deleting jwellery type-->
<div class="modal fade" id="deleteJwelleryTypeModal" tabindex="-1" role="dialog" aria-labelledby="deleteJwelleryTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" action="{{ route('delete-jwelleryType') }}">
        @csrf
        @method('PUT')
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Do you want to delete below jwellery type?</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="jid" class="id" name="jid">
            <label for="jwelleryType">Jwellery Type:</label>
            <input type="text" class="form-control"  id="jname" name="jwellery_type_name">
            <span class="text-danger">
                @error('jwellery_type_name')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger">Yes</button>
        </div>
      </form>
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
        <hr>

<div class="container">
    <div class="col-md-12">
        <table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Jwellery Type Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               @if(count($jwelleryTypes) > 0)
               @foreach($jwelleryTypes as $jwelleryType)
               <tr>
                    <td>{{ $a++ }}</td>
                    <td>{{ $jwelleryType->jwellery_type_name }}</td>
                    <td><button type="button" class="btn btn-success editJwelleryType" data-id="{{ $jwelleryType->id }}" data-jwelleryType="{{ $jwelleryType->jwellery_type_name }}" data-bs-toggle="modal" data-bs-target="#editJwelleryTypeNameModal">Update</button><button type="button" class="btn btn-danger deleteJwelleryType" data-id="{{ $jwelleryType->id }}" data-name="{{ $jwelleryType->jwellery_type_name }}" data-bs-toggle="modal" data-bs-target="#deleteJwelleryTypeModal">Delete</button></td>
                </tr>
               @endforeach
               @else
                <tr>
                    <td colspan="3" class="text-danger text-center">No Jwellery Type Found</td>
                </tr>
               @endif
            </tbody>
        </table>
    </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    
    $(document).ready(function(){
        $(".editJwelleryType").click(function(){
            var id = $(this).attr("data-id");
            var jwellery_type_name = $(this).attr("data-jwelleryType");
            $(".id").val(id);
            $("#jwelleryType").val(jwellery_type_name);
        });

        $("#edit-jwellery-type").on("submit",function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ route('edit-jwellery-type') }}",
                type: "post",
                data: $(this).serialize(),
                dataType: "json",
                success:function(response){
                    location.reload();
                }
            })
        });


        $(document).on("click",".deleteJwelleryType",function(){
            var jid = $(this).attr("data-id");
            var jname = $(this).attr("data-name");
            $("#jid").val(jid);
            $("#jname").val(jname);
            
        })
    });
</script>

@endsection