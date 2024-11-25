@extends('store//layouts/app')

@section('title', 'Home Page')

@section('content')

    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">


    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
    <div class="content-body">

        <div class="container-fluid">




            <div class="row">
                @if (session('error'))
                    <script>
                        swal({
                            title: "Error!",
                            text: "{{ session('error') }}",
                            type: "error",
                            timer: 2000,
                            showConfirmButton: false
                        });
                    </script>
                @endif
                @if (session('success'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "{{ session('success') }}",
                            type: "success",
                            showConfirmButton: true,
                            confirmButtonText: "Done",
                            confirmButtonColor: "#1dbf73"
                        });
                    </script>
                @endif
                <div class="col-12">
                    <div class="card">

                        <div class="card-footer">
                            <h4 class="card-text d-inline"> Warehouse List</h4>

                            <a href="{{ route('ware') }}" class="card-link float-end btn btn-rounded btn-info btn-sm "><span
                                    class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                                </span>Add Warehouse</a>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Warehouse Name</th>
                                            <th>Address</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Details</th>
                                            <th>Status</th>
                                            <th><i class="fas fa-arrow-circle-down"></i></th>
                                        </tr>
                                    </thead>


                                    <tbody>

                                        @foreach ($ware as $index => $brand)
                                            <tr>
                                                <td>{{ $index + 1 }}</td> <!-- Display row number -->
                                                <td>
                                                    {{ $brand->name }}
                                                </td>
                                                <td>{{ $brand->address }}</td> <!-- Display Brand Name -->
                                                <td>{{ $brand->mobile }}</td>
                                                <td>{{ $brand->email }}</td>
                                                <td>{{ $brand->details }}</td>
                                                <td id="statuschange_{{ $index }}">
                                                    <p class="status-cell {{ $brand->status === 'active' ? 'active-status' : 'inactive-status' }}"
                                                        style="cursor: pointer;"
                                                        onclick="statuschange({{ $brand->id }}, '{{ $brand->status }}')">
                                                        {{ $brand->status }}
                                                    </p>
                                                </td> <!-- Display Mobile or N/A if not available -->
                                                <td style="display: flex; justify-content:center; gap: 10px;">
                                                    <form action="{{ route('store_edit.warehoues') }}"
                                                        style="width:auto; height:auto; box-shadow:none;" method="post">
                                                        @csrf
                                                        <input type="text" name="id" value="{{ $brand->id }}"
                                                            hidden>

                                                        <button id="update" style="display:block;"><i
                                                                class="fa-solid fa-pencil"></i></button>
                                                    </form>
                                                    <a href="javascript:void(0)" onclick="deleteWare({{ $brand->id }})"
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
        function deleteWare(id) {
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
                            url: "{{ route('store_deleteware') }}",
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
                            url: "{{ route('store_updateStatus') }}",
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
                                        text: "Warehouse status changed successfully",
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