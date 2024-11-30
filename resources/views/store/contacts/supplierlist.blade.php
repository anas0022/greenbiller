@extends('store//layouts/app')

@section('title', 'Home Page')

@section('content')

<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">

    <!-- row -->



<div class="content-body">


    <div class="container-fluid">



        <div class="row">
            
    @if(session('error'))
<script>
    swal({
            title: "error!",
            text: "{{ session('error') }}",
            icon: "error",  // For SweetAlert version 1, use `type` instead of `icon`
            type: "error"
        });
</script>
@endif
@if(session('success'))
    <script>
        swal({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success",  // For SweetAlert version 1, use `type` instead of `icon`
            type: "success"
        });
    </script>
@endif
            <div class="col-12">
                <div class="card">

                    <div class="card-footer">
                        <h4 class="card-text d-inline"> Suppliers List </h4>
                        <div style="width:100%; display:flex; gap: 10px; justify-content:end">
                        
                            <a href="add-supplier" class="card-link float-end btn btn-rounded btn-info btn-sm "><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Create Supplier</a>
                            <button type="button" class="card-link float-end btn btn-rounded btn-info btn-sm "
                        data-bs-toggle="modal" data-bs-target="#import"><span class="btn-icon-start text-info"><i
                                class="fa fa-plus color-info"></i>
                        </span>Import</button>
                          
                        </div>
                     
                    </div>

                    <div class="modal fade" id="import">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Import</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            
                            <form action="{{route('supplier.import.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">

                                    <div class="form-group col-lg-6">
                                        <label class="form-label">Upload Your Excel File</label>
                                        <input type="file" name="excel_file" class="form-control">
                                        <span style="font-size: 10px;color: #B03838;">Max Width/Height: 1000px * 1000px
                                            & Size: 1MB</span>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light"
                                        data-bs-dismiss="modal">Close</button>
                                    <button  type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Supplier ID</th>
                                        <th>Supplier Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Previous Balance</th>
                                        
                                                                       
                                        <th>Status</th>                                        
                                        <th><i class="fas fa-arrow-circle-down"></i></th>
                                    </tr>
                                </thead>
                              <tbody>
                                @foreach ($supplier as $index=>$s )
                                
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$s->supplier_id}}</td>
                                    <td>{{$s->name}}</td>
                                    <td>{{$s->mobile}}</td>
                                    <td>{{$s->email}}</td>
                                    <td>{{$s->balance}}</td>
                                    <td id="statuschange_{{ $index }}">
                                        <p class="status-cell {{ $s->status === 'active' ? 'active-status' : 'inactive-status' }}"
                                            style="cursor: pointer;" onclick="statuschange({{ $s->id }}, '{{ $s->status }}')">
                                            {{ $s->status }}
                                        </p>
                                    </td>
                                    <td style="display: flex; justify-content:center; gap: 10px;">
                                        <form action="{{route('store_edit.supplier')}}"
                                            style="width:auto; height:auto; box-shadow:none;" method="post">
                                            @csrf
                                            <input type="text" name="id" value="{{$s->id}}" hidden>

                                            <button id="update" style="display:block;"><a href=""></a><i
                                                    class="fa-solid fa-pencil"></i></button>
                                        </form>
                                       
                                       
                                            <button type="button" id="delete" style="display:block;" onclick="deleteItem({{$s->id}})"><i
                                                    class="fa-solid fa-trash"></i></button>
                                         
                                        </td>
                                </tr>
                                
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

  

<script>
    function deleteItem(id) {

        swal({
                title: "Are you sure?",
                text: "Do you want to delete this?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "{{ route('deletesupplier.store') }}",
                        method: 'POST',
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'id': id
                        },
                        success: function(response) {
                            swal({
                                title: "Deleted!",
                                text: "Warehouse deleted successfully",
                                type: "success",
                                confirmButtonText: "Done",
                                confirmButtonColor: "#1dbf73"
                            }, function(isConfirm) {
                                if (isConfirm) {
                                    location.reload();
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            swal("Error!", "Failed to delete warehouse", "error");
                        }
                    });
                }
            });
    }
</script>
<script>
    function statuschange(id, currentStatus) {
        swal({
                title: "Are you sure?",
                text: "Do you want to change this to " + (currentStatus === 'active' ? 'inactive' : 'active') + "?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "{{ route('updateStatus.supplier.store') }}",
                        method: 'POST',
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'id': id
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response && response.status === 200) {
                                swal({
                                    title: "Status Changed!",
                                    text: response.message,
                                    type: "success",
                                    confirmButtonText: "Done",
                                    confirmButtonColor: "#1dbf73"
                                }, function(isConfirm) {
                                    if (isConfirm) {
                                        location.reload();
                                    }
                                });
                            } else {
                                swal("Warning!", "Status changed but response was unexpected",
                                    "warning");
                                setTimeout(() => {
                                    location.reload();
                                }, 1500);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Error details:', xhr.responseText);
                            swal("Warning!", "Status might have changed. Please refresh the page.",
                                "warning");
                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        }
                    });
                }
            });
    }
</script>

@endsection
