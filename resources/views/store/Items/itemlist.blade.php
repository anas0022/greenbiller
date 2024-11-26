@extends('store//layouts/app')

@section('title', 'Home Page')

@section('content')
<div class="content-body">
    

    

    <div class="container-fluid">



        <div class="row">
            
@if(session('error'))
            <script>
                swal({
                    title: "error!",
                    text: "{{ session('error') }}",
                    icon: "error",
                    type: "error"
                });
            </script>
        @endif
        @if(session('success'))
            <script>
                swal({
                    title: "Success!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    type: "success"
                });
            </script>
        @endif
        <div class="modal fade" id="import">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Import</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    
                    <form action="{{route('item_bulkpost')}}" method="post" enctype="multipart/form-data">
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
            <div class="col-12">
                <div class="card">

                    <div class="card-footer">
                        <h4 class="card-text d-inline"> Item List </h4>
                        <div>
                            <a href="{{route('store_new_item')}}" class="card-link float-end btn btn-rounded btn-info btn-sm "><span
                                class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Add Item</a>
                          
                    <button type="button" class="card-link float-end btn btn-rounded btn-info btn-sm "
                    data-bs-toggle="modal" data-bs-target="#import"><span class="btn-icon-start text-info"><i
                            class="fa fa-plus color-info"></i>
                    </span>Import</button>
                        </div>
                     
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                           
                    <table id="example" class="display" style="width:100%;">
                        <thead style="">
                            <th>#</th>
                            <th>Item Name</th>
                            <th>Item Code</th>
                        
                            <th>Brand</th>
                            <th>Category / Item Type</th>
                            <th>Unit</th>
                            <th>Stock</th>
                <!-- <th>Alert Quantity</th> -->
                           <!--  <th>Sales Price</th> -->
                            <th>Tax</th>
                            <th>Status</th>
                            <th><i class="fa-solid fa-circle-arrow-down"></i></th>
                        </thead>
                        <tbody style="width:100%; overflow-x:scroll;">

                            @foreach ($items as $index => $item)
                                
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>{{$item->item_name}}</td>
                                    <td>{{$item->item_code}}</td>
                       
                                    <td>{{ $brand->firstWhere('id', $item->brand_id)->barndname ?? '' }}</td>
                              
                                    
                               
                       <td>{{ $categories->firstWhere('id', $item->category_id)->category_name ?? '' }}</td>
                       <td>{{ $unites->firstWhere('id', $item->unit_id)->unit_name ?? '' }}</td>
                       <td>{{$item->alert_quantity}}</td>
                       <td>{{ $tax->firstWhere('id', $item->tax_id)->taxname ?? '' }}</td>
                                    <td id="statuschange_{{ $index }}">
                                        <p class="status-cell {{ $item->status === 'active' ? 'active-status' : 'inactive-status' }}"
                                            style="cursor: pointer;"  onclick="statuschange({{ $item->id }}, '{{ $item->status }}')">
                                            {{ $item->status }}
                                        </p>
                                    </td>
                                    <td style="display: flex; justify-content:center; gap: 10px;">
                                        <form action="{{route('store_edit.item')}}"
                                            style="width:auto; height:auto; box-shadow:none;" method="post">
                                            @csrf
                                            <input type="text" name="id" value="{{$item->id}}" hidden>

                                            <button id="update" style="display:block;"><a href=""></a><i
                                                    class="fa-solid fa-pencil"></i></button>
                                        </form>
                               
                                         

                                            <a href="javascript:void(0)" onclick="deleteItem({{ $item->id }})"
                                                class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                              
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
                        url: "{{ route('store_deleteitem') }}",
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
                        url: "{{ route('store_updateStatus.items') }}",
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