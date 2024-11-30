@extends('admin//layouts/app')

@section('title', 'Home Page')


<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">


<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
@section('content')

    @if ($errors->any())
        <script>
            swal({
                title: "Error!",
                text: "{!! implode('\n', $errors->all()) !!}", // Join errors with line breaks
                icon: "error",
                type: "error"
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            swal({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success",
                type: "success"
            });
        </script>
    @endif
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="modal fade" id="editModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('brandupdate') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Name:</label>
                                    <div class="col-sm-9">
                                        <input name="name" id="name" type="text" class="form-control"
                                            placeholder="Enter Category Name">
                                        <input type="text" name="id" id="id" hidden>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Description:</label>
                                    <div class="col-sm-9">
                                        <textarea name="dis" id="dis" class="form-control" cols="10" rows="3"></textarea>

                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Current Image: </label>
                                    <div class="col-sm-9">
                                        <img src="{{ asset('storage/') }}" id="image">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Update Image: </label>
                                    <div class="col-sm-9">
                                        <input name="image" type="file" class="form-file-input form-control">
                                        Image dimension 486x355
                                    </div>
                                </div>



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                            <button name="update" type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-footer">
                            <h4 class="card-text d-inline"> Brand List</h4>

                            <button type="button" class="card-link float-end btn btn-rounded btn-info btn-sm "
                                data-bs-toggle="modal" data-bs-target="#basicModal"><span
                                    class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                                </span>Add Brand</button>
                        </div>
                        <!-- Modal start -->
                        <div class="modal fade" id="basicModal">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Brand</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('brandpost') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Brand Name <span
                                                        class="required">*</span>:</label>
                                                <div class="col-sm-9">
                                                    <input name="name" type="text" class="form-control"
                                                        placeholder="Enter Category Name" required>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Description:</label>
                                                <div class="col-sm-9">
                                                    <textarea name="dis" class="form-control" cols="10" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Image: </label>
                                                <div class="col-sm-9">
                                                    <input name="image" type="file"
                                                        class="form-file-input form-control">
                                                    Image dimension 486x355
                                                </div>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light"
                                            data-bs-dismiss="modal">Close</button>
                                        <button name="add" type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal end -->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Brand Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th><i class="fas fa-arrow-circle-down"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($brands))
                                            @foreach ($brands as $index => $b)
                                                
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $b->image) }}"
                                                            alt="{{ $b->category_name }}" srcset=""
                                                            style="width: 60px; height: 60px;">
                                                    </td>
                                                    <td>
                                                        {{ $b->barndname }}
                                                    </td>
                                                    <td>
                                                        {{ $b->discription }}
                                                    </td>
                                                    <td id="statuschange_{{ $index }}">

                                                        <p class="status-cell {{ $b->status === 'active' ? 'active-status' : 'inactive-status' }}"
                                                            style="cursor: pointer;" onclick="statuschange('{{$b->id}}','{{$b->status}}')">
                                                            {{ $b->status }}
                                                        </p>
                                                    </td>
                                                    <td style="display: flex; justify-content:center; gap: 10px;">
                                                        <div style="width:auto; height:auto; box-shadow:none;">
                                                            @csrf
                                                            <input type="text" name="id"
                                                                value="{{ $b->id }}" hidden>

                                                            <button id="update" data-bs-toggle="modal"
                                                                data-bs-target="#editModal"
                                                                onclick="update('{{ $b->image }}', '{{ $b->barndname }}', '{{ $b->discription }}', '{{ $b->id }}')">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </button>





                                                        </div>


                                                        <button type="submit" id="delete"><i
                                                                class="fa-solid fa-trash"
                                                                onclick="deleteItem({{ $b->id }})"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        @endif



                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function update(image, barndname, discription, id) {
                        document.getElementById('id').value = id;
                        document.getElementById('name').value = barndname;
                        document.getElementById('dis').value = discription;


                        document.getElementById('image').src = 'storage/'.image;

                    }
                </script>

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
                            url: "{{ route('deletebrand') }}",
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
                            url: "{{ route('updateStatus.brand') }}",
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>
    <script>
        new DataTable('#example', {
            layout: {
                topStart: {
                    buttons: ['csv', 'excel', 'pdf', 'print']
                }
            },


        });
    </script>

@endsection
