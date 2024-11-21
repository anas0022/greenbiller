@extends('store//layouts/app')

@section('title', 'Home Page')


<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
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

        <div class="modal fade" id="editModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Brand</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('store_brandupdate')}}" method="post" enctype="multipart/form-data">
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
                                    <form action="{{route('store_brandpost')}}" method="POST"
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
                                                <input name="image" type="file" class="form-file-input form-control">
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
                            <table id="list" class="display" style="width:100%;">
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

                                                    <div class="form_update" id="form_update_{{ $index }}">
                                                        <form action="{{ route('store_updateStatus.brand') }}" method="post"
                                                            class="status-toggle-form" style="background-color:white; padding:20px  ">
                                                            @csrf
                                                            <i class="fa-thin fa-circle-exclamation" style=" font-size: 60px;
                                                  margin-bottom: 2px;
                                                  color: orange; "></i>
                                                            <p style="font-size: 20px;">Are You Sure</p>
                                                            <input type="hidden" name="id" value="{{ $b->id }}">
                                                            <p>Do you want to change this to
                                                                {{ $b->status === 'active' ? 'inactive' : 'active' }}?
                                                            </p>
                                                            <div class="buttons" style="width:100%; justify-content:end;">
                                                                <button>
                                                                    <a href="
                                                                                        ">Cancel</a></button>
                                                                <button type="submit" style="display:block;">Yes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <tr>
                                                        <td>{{$index + 1}}</td>
                                                        <td>
                                                            <img src="{{ asset('storage/' . $b->image) }}" alt="{{ $b->category_name }}"
                                                                srcset="" style="width: 60px; height: 60px;">
                                                        </td>
                                                        <td>
                                                            {{$b->barndname}}
                                                        </td>
                                                        <td>
                                                            {{$b->discription}}
                                                        </td>
                                                        <td id="statuschange_{{ $index }}">

                                                            <p class="status-cell {{ $b->status === 'active' ? 'active-status' : 'inactive-status' }}"
                                                                style="cursor: pointer;">
                                                                {{ $b->status }}
                                                            </p>
                                                        </td>
                                                        <td style="display: flex; justify-content:center; gap: 10px;">
                                                            <div style="width:auto; height:auto; box-shadow:none;">
                                                                @csrf
                                                                <input type="text" name="id" value="{{$b->id}}" hidden>

                                                                <button id="update" data-bs-toggle="modal" data-bs-target="#editModal"
                                                                    onclick="update('{{$b->image}}', '{{$b->barndname}}', '{{$b->discription}}', '{{$b->id}}')">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </button>





                                                            </div>
                                                            <form style="width:auto; height:auto; box-shadow:none;"
                                                                action="{{ route('store_deletebrand') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$b->id}}">
                                                                <button type="submit" id="delete"><i
                                                                        class="fa-solid fa-trash"></i></button>
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



                }
            </script>

        </div>

    </div>
</div>
<script>
    // Get all elements with the class 'status-cell'
    document.querySelectorAll('.status-cell').forEach(function (cell, index) {
        cell.addEventListener('click', function () {
            // Find the corresponding form for the current row
            var formUpdate = document.getElementById('form_update_' + index);
            if (formUpdate) {
                formUpdate.style.display = (formUpdate.style.display === 'none' || formUpdate.style.display === '') ? 'flex' : 'none';
            }
        });
    });

</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script>
    $(document).ready(function () {

        var table = $('table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    }
                }
            ],
            paging: true,
            ordering: true,
            searching: false,
            pageLength: 10,
            lengthChange: true,
            pagingType: 'simple',
            info: true,
            initComplete: function () {

                this.api().buttons().container().appendTo('.button-container');
            }
        });

        // Handling row count change
        $('#rowCount').on('change', function () {
            var newLength = $(this).val();
            table.page.len(newLength).draw();
        });

        // Handling search input
        $('#searchInput').on('keyup', function () {
            table.search($(this).val()).draw();
        });
    });
</script>
@endsection