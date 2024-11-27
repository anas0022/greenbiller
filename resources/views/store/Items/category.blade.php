@extends('store/layouts/app')

@section('title', 'Home Page')

@section('content')






<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
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

                    <div class="modal fade" id="editcategory">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{route('store_category.edit')}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" id="id" value="">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">category Name <span
                                                    class="required">*</span>:</label>
                                            <div class="col-sm-9">
                                                <input name="name" type="text" class="form-control"
                                                    placeholder="Enter Category Name" required id="category_name_edit">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Description:</label>
                                            <div class="col-sm-9">
                                                <textarea name="dis" class="form-control" cols="10" rows="3"
                                                    required id="description_edit"></textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Image: </label>
                                            <div class="col-sm-9">
                                                <input name="image" type="file" class="form-file-input form-control"
                                                     id="catimage">
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
                                                    >
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
                                                                style="cursor: pointer;" onclick="statuschange({{$cat->id}}, '{{$cat->status}}')">
                                                                {{ $cat->status }}
                                                            </p>
                                                        </td>
                                                        <td style="display: flex; justify-content:center; gap: 10px;">
                                                            <div style="width:auto; height:auto; box-shadow:none;">
                                                                @csrf
                                                                <input type="text" name="id" value="{{$cat->id}}" hidden>

                                                                <button id="update" data-bs-toggle="modal" data-bs-target="#editcategory"
                                                                    onclick="update('{{$cat->category_name}}', '{{$cat->parent}}', '{{$cat->discription}}', '{{$cat->id}}','{{$cat->image}}')">

                                                                    <i class="fas fa-pencil-alt"></i>

                                                                </button>


                                                            </div>
                                                          
                                                             
                                                                <button type="button" id="delete" onclick="deletecat({{$cat->id}})"><i
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
        function update(category_name, parent, description, id, image){
            document.getElementById('category_name_edit').value = category_name;
            document.getElementById('id').value = id;
        
            document.getElementById('description_edit').value = description;
            document.getElementById('catimage_edit').value = image;
        }
    </script>

    
<script>
    function deletecat(id) {
        swal({
                title: "Are you sure?",
                text: "Do you want to delete this category?",
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
                        url: "{{ route('store_category.delete') }}",
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            'Accept': 'application/json'
                        },
                        data: {
                            'id': id
                        },
                        success: function(response) {
                            if (response.success) {
                                swal({
                                    title: "Deleted!",
                                    text: "Category deleted successfully",
                                    type: "success",
                                    confirmButtonText: "Done",
                                    confirmButtonColor: "#1dbf73"
                                }, function(isConfirm) {
                                    if (isConfirm) {
                                        // Reload categories instead of full page refresh
                                        loadCategories();
                                    }
                                });
                            } else {
                                swal("Error!", response.message || "Failed to delete category", "error");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Status:', status);
                            console.error('Error:', error);
                            console.error('Response:', xhr.responseText);
                            
                            let errorMessage = "Failed to delete category";
                            try {
                                const response = JSON.parse(xhr.responseText);
                                errorMessage = response.message || errorMessage;
                            } catch(e) {
                                errorMessage += ": " + error;
                            }
                            
                            swal("Error!", errorMessage, "error");
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
                        url: "{{ route('store_updateStatus.cat') }}",
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