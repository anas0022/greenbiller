@extends('store//layouts/app')

@section('title', 'Home Page')

@section('content')
<div class="content-body">
    

    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">


    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">

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
            <div class="col-12">
                <div class="card">

                    <div class="card-footer">
                        <h4 class="card-text d-inline"> Item List </h4>
                        <div>
                            <a href="{{route('store_new_item')}}" class="card-link float-end btn btn-rounded btn-info btn-sm "><span
                                class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Add Item</a>
                          
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
                       <td>{{ $tax->firstWhere('id', $item->tax_id)->id ?? '' }}</td>
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