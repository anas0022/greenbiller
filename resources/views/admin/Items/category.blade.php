@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')


<div class="content-body">
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
    <div class="container-fluid" >
            
<div class="row">
@if($errors->any())
    <script>
        swal({
            title: "Error!",
            text: "{!! implode('\n', $errors->all()) !!}", // Join errors with line breaks
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



    <!-- row -->
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

                                <form action="{{route('category.post')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Brand Name <span class="required">*</span>:</label>
                                            <div class="col-sm-9">
                                                <input name="name" type="text" class="form-control" placeholder="Enter Category Name" required>
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
                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
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

                                            <div class="form_update" id="form_update_{{ $index }}">
                                                            <form action="{{ route('updateStatus.cat') }}" method="post"
                                                                class="status-toggle-form" style="background-color:white; padding:20px  ">
                                                                @csrf
                                                                <i class="fa-thin fa-circle-exclamation" style=" font-size: 60px;
                                  margin-bottom: 2px;
                                  color: orange; "></i>
                                                                <p style="font-size: 20px;">Are You Sure</p>
                                                                <input type="hidden" name="id" value="{{ $cat->id }}">
                                                                <p>Do you want to change this to
                                                                    {{ $cat->status === 'active' ? 'inactive' : 'active' }}?</p>
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
                                                            <div 
                                                                style="width:auto; height:auto; box-shadow:none;" >
                                                                @csrf
                                                                <input type="text" name="id" value="{{$cat->id}}" hidden>

                                                                <button id="update" data-bs-toggle="modal" data-bs-target="#editModal"  onclick="update('{{$cat->category_name}}', '{{$cat->parent}}', '{{$cat->discription}}', '{{$cat->id}}','{{$cat->image}}')">

        <i class="fas fa-pencil-alt"></i>
    
</button>


                                                            </div>
                                                            <form style="width:auto; height:auto; box-shadow:none;"
                                                                action="{{ route('category.delete') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$cat->id}}">
                                                                <button type="submit" id="delete"
                                                                   ><i
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
    

    document.getElementById('image').src = 'storage/' . image;

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
                                                        <form action="{{route('category.edit')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label">Name:</label>
                                                                <div class="col-sm-9">
                                                                    <input name="name" type="text"
                                                                        class="form-control"
                                                                        placeholder="Enter Category Name" value="" id="name">
                                                                    <input type="hidden" name="id" id="id" value="">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label
                                                                    class="col-sm-3 col-form-label">Description:</label>
                                                                <div class="col-sm-9">
                                                                    <textarea name="dis" class="form-control"
                                                                        cols="10" rows="3" id="dis"></textarea>

                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label">Current Image:
                                                                </label>
                                                                <div class="col-sm-9">
                                                                <img src="{{ asset('') }}" 
     alt="" 
     style="width: 60px; height: 60px;" 
     id="image">

                                                                </div>
                                                            </div>

                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label">Update Image:
                                                                </label>
                                                                <div class="col-sm-9">
                                                                    <input name="image" type="file"
                                                                        class="form-file-input form-control">
                                                                    Image dimension 486x355
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label">Show on mobile
                                                                    app: </label>
                                                                <div class="col-sm-9">
                                                                    <div class="form-check form-switch">
                                                                        <input name="u_inapp_view"
                                                                            class="form-check-input" type="checkbox"
                                                                            role="switch" id="flexSwitchCheckDefault"
                                                                            value="1" <?php  ?>>
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
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
</script>

@endsection









