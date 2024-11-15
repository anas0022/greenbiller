@extends('store/layouts/app')

@section('title', 'Home Page')

@section('content')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js">
</script>
<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">

<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
<div class="content-body" style="">

    <!-- row --> @if(session('error'))
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


    <div class="container-fluid" style=" display:flex; justify-content:start;;">
        <div style=" padding:20px;  position:relative; width:100%;">
            <div class="col-12">
                <div class="card">

                    <div class="card-footer">
                        <h4 class="card-text d-inline"> Categories List</h4>

                        <button type="button" class="card-link float-end btn btn-rounded btn-info btn-sm "
                            data-bs-toggle="modal" data-bs-target="#basicModal"><span
                                class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Add Category</button>
                    </div>
                    <!-- Modal start -->
                    <div class="modal fade" id="basicModal">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{route('store_category.post')}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">category Name <span
                                                    class="required">*</span>:</label>
                                            <div class="col-sm-9">
                                                <input name="name" type="text" class="form-control"
                                                    placeholder="Enter Category Name" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Description:</label>
                                            <div class="col-sm-9">
                                                <textarea name="dis" class="form-control" cols="10" rows="3"
                                                    required></textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Image: </label>
                                            <div class="col-sm-9">
                                                <input name="image" type="file" class="form-file-input form-control"
                                                    required>
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
                                        <th>Category Name</th>
                                        <th>Parent Category</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th><i class="fas fa-arrow-circle-down"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($category))
                                            @foreach ($category as $index => $cat)

                                                    <div class="form_update" id="form_update_{{ $index }}">
                                                        <form action="{{ route('store_updateStatus.cat') }}" method="post"
                                                            class="status-toggle-form" style="background-color:white; padding:20px  ">
                                                            @csrf
                                                            <i class="fa-thin fa-circle-exclamation" style=" font-size: 60px;
                                                  margin-bottom: 2px;
                                                  color: orange; "></i>
                                                            <p style="font-size: 20px;">Are You Sure</p>
                                                            <input type="hidden" name="id" value="{{ $cat->id }}">
                                                            <p>Do you want to change this to
                                                                {{ $cat->status === 'active' ? 'inactive' : 'active' }}?
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
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <img src="{{ asset('storage/' . $cat->image) }}"
                                                                alt="{{ $cat->category_name }}" srcset=""
                                                                style="width: 60px; height: 60px;">
                                                        </td>
                                                        <td>{{$cat->category_name}}</td>
                                                        <td>{{$cat->parent}}</td>
                                                        <td>{{$cat->discription}}</td>
                                                        <td id="statuschange_{{ $index }}">

                                                            <p class="status-cell {{ $cat->status === 'active' ? 'active-status' : 'inactive-status' }}"
                                                                style="cursor: pointer;">
                                                                {{ $cat->status }}
                                                            </p>
                                                        </td>
                                                        <td style="display: flex; justify-content:center; gap: 10px;">
                                                            <div style="width:auto; height:auto; box-shadow:none;">
                                                                @csrf
                                                                <input type="text" name="id" value="{{$cat->id}}" hidden>

                                                                <button id="update" data-bs-toggle="modal" data-bs-target="#editModal"
                                                                    onclick="update('{{$cat->category_name}}', '{{$cat->parent}}', '{{$cat->discription}}', '{{$cat->id}}','{{$cat->image}}')">

                                                                    <i class="fas fa-pencil-alt"></i>

                                                                </button>


                                                            </div>
                                                            <form style="width:auto; height:auto; box-shadow:none;"
                                                                action="{{ route('store_category.delete') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$cat->id}}">
                                                                <button type="submit" id="delete"><i
                                                                        class="fa-solid fa-trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                            @endforeach
                                    @endif


                                    <script>
                                        function update(category_name, parent, description, id, image) {
                                            document.getElementById('id').value = id;
                                            document.getElementById('name').value = category_name;
                                            document.getElementById('dis').value = description;



                                            document.getElementById('catimage').value = image;

                                        }
                                    </script>
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

                                    <td>

                                        <!-- Modal start -->
                                        <div class="modal fade" id="editModal">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content"
                                                    style="background-color:red display:flex; width:100%;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Category</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="display: block;">
                                                        <form action="{{ route('store_category.edit') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="id" id="id" value="">

                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label">Name:</label>
                                                                <div class="col-sm-9">
                                                                    <input name="name" type="text" class="form-control"
                                                                        placeholder="Enter Category Name" id="name">
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 row">
                                                                <label
                                                                    class="col-sm-3 col-form-label">Description:</label>
                                                                <div class="col-sm-9">
                                                                    <textarea name="dis" class="form-control" cols="10"
                                                                        rows="3" id="dis"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label">Update
                                                                    Image:</label>
                                                                <div class="col-sm-9">
                                                                    <input name="image" type="file"
                                                                        class="form-file-input form-control"
                                                                        id="catimage">
                                                                    <small>Image dimension 486x355</small>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger light"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button name="update" type="submit"
                                                                    class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>


                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal end -->
                                    </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

</div>

<script>
    $(document).ready(function () {
        // Initialize DataTable with options
        var table = $('#tableID').DataTable({
            dom: 'Bfrtip', // Default position
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    exportOptions: {
                        modifier: {
                            page: 'current' // Only print the current page
                        }
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    exportOptions: {
                        modifier: {
                            page: 'current' // Only print the current page
                        }
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    exportOptions: {
                        modifier: {
                            page: 'current' // Only print the current page
                        }
                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    exportOptions: {
                        modifier: {
                            page: 'current' // Only print the current page
                        }
                    }
                }
            ],
            paging: true,
            ordering: true,
            searching: true,
            pageLength: 10,
            lengthChange: true,
            pagingType: 'full',
            info: true,
            initComplete: function () {
                // Move the buttons to the button container
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