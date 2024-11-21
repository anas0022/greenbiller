@extends('store//layouts/app')

@section('title', 'Home Page')
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
@section('content')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

<style>
    th{
        text-align: center;
    }
</style>


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
            <div class="modal fade" id="editModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('store_excategory.edit')}}" method="post" enctype="multipart/form-data">
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
                           

                        


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button name="update" type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
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

                                    <form action="{{ route('store_excategory.post') }}" method="POST"
                                        enctype="multipart/form-data">

                                        @csrf

                                        <div class="mb-3 row">

                                            <label class="col-sm-3 col-form-label">Category Name <span
                                                    class="required">*</span>:</label>
                                            <div class="col-sm-9">
                                                <input name="name" type="text" class="form-control"
                                                    placeholder="Enter Category Name" required>

                                            </div>
                                        </div>

                                        <!-- <div class="mb-3 row">

                                            <label class="col-sm-3 col-form-label">Parent Category <span class="required">*</span>:</label>
                                            <div class="col-sm-9">
                                                <select name="parent_id" id="parent_id" class="form-control selectpicker" data-live-search="true">
                                                    <option value="0">No Parent</option>
                                                    @foreach ($parent_cat as $parent )
                                                    <option value="{{$parent->id}}">{{$parent->category_name}}</option>
                                                    @endforeach
                                                
                                                </select>


                                            </div>
                                        </div> -->


                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Description:</label>
                                            <div class="col-sm-9">
                                                <textarea name="detail" class="form-control" cols="10"
                                                    rows="3"></textarea>
                                            </div>
                                        </div>

                                        <!--   <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Image: </label>
                                            <div class="col-sm-9">
                                                <input name="image" type="file" class="form-file-input form-control">
                                                Image dimension 486x355
                                            </div>
                                        </div> -->
                                        <!--    <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Show on mobile app: </label>
                                            <div class="col-sm-9">
                                                <div class="form-check form-switch">
                                                    <input name="inapp_view" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="1">
                                                </div>
                                            </div>
                                        </div> -->



                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
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
                                        <!--  <th>Image</th> -->
                                        <th>Category Name</th>
                                        <!-- <th>Parent Category</th> -->
                                        <th>Description</th>
                                        <!--   <th>Status</th> -->
                                        <th><i class="fas fa-arrow-circle-down"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <script>
                function update(category_name, description, id) {
                    document.getElementById('id').value = id;
                    document.getElementById('name').value = category_name;
                    document.getElementById('dis').value = description;



                }
            </script>

                                    @foreach ($expenses as $index => $expense)
                                        <tr>
                                            <td>{{$index + 1}}</td>
                                            <td>{{$expense->category_name}}</td>
                                            <td>{{$expense->description}}</td>
                                            <td style="display: flex; justify-content:center; gap: 10px;">
                                                <!--  <form action="{{route('store_excategory.edit')}}"
                                                                        style="width:auto; height:auto; box-shadow:none;" method="post">
                                                                        @csrf
                                                                        <input type="text" name="id" value="{{$expense->id}}" hidden> -->
                                                <button id="update" data-bs-toggle="modal" data-bs-target="#editModal"
                                                    onclick="update('{{$expense->category_name}}', '{{$expense->description}}', '{{$expense->id}}')">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <!--  </form> -->
                                                <form style="width:auto; height:auto; box-shadow:none;"
                                                    action="{{ route('store_excategory.delete') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$expense->id}}">
                                                    <button type="submit" id="delete" style="display:block;"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                </form>
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