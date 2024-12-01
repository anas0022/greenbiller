
@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')

<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">


<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        

        <div class="row">
            
    @if($errors->any())
    <script>
        swal({
            title: "Error!",
            text: "{!! implode('\n', $errors->all()) !!}", 
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
                        <h4 class="card-text d-inline"> Categories List</h4>

                        <button type="button" class="card-link float-end btn btn-rounded btn-info btn-sm " data-bs-toggle="modal" data-bs-target="#basicModal"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
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

                                    <form action="{{route('excategory.post')}}" method="POST" enctype="multipart/form-data">
                                     
                                        @csrf
                                        <div class="mb-3 row">

                                            <label class="col-sm-3 col-form-label">Category Name <span class="required">*</span>:</label>
                                            <div class="col-sm-9">
                                                <input name="name" type="text" class="form-control" placeholder="Enter Category Name" required>
                                        
                                            </div>
                                        </div>

                                        <div class="mb-3 row">

                                            <label class="col-sm-3 col-form-label">Parent Category <span class="required">*</span>:</label>
                                            <div class="col-sm-9">
                                                <select name="parent_id" id="parent_id" class="form-control selectpicker" data-live-search="true">
                                                    <option value="0">No Parent</option>
                                                    @foreach ($parent_cat as $parent)
                                                        <option value="{{$parent->id}}">{{$parent->category_name}}</option>
                                                    @endforeach
                                                
                                                </select>


                                            </div>
                                        </div>

                                        <div class="mb-3 row">

                                            <label class="col-sm-3 col-form-label"> Select Store <span class="required">*</span>:</label>
                                            <div class="col-sm-9">
                                                <select name="store_id" id="parent_id" class="form-control selectpicker" data-live-search="true">
                                                    <option value="0">-select-</option>
                                                    @foreach ($stores as $store)
                                                        <option value="{{$store->id}}">{{$store->store_name}}</option>
                                                    @endforeach
                                                
                                                </select>


                                            </div>
                                        </div>


                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Description:</label>
                                            <div class="col-sm-9">
                                                <textarea name="detail" class="form-control" cols="10" rows="3"></textarea>
                                            </div>
                                        </div>

                                       
                                     




                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                    <button  type="submit" class="btn btn-primary">Save</button>
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
                                 
                                        <th>Category Name</th>
                                        <th>Parent Category</th>
                                        <th>Description</th>
                                        {{-- <th>Status</th>
                                        <th><i class="fas fa-arrow-circle-down"></i></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                        
                                            @foreach ($expenses as $index => $expense)
                                                <tr>
                                                    <td>
                                                        {{$index+1}}
                                                    </td>
                                                    <td>
                                                        {{$expense->category_name}}
                                                    </td>
                                                    <td>
                                                        @if ($expense->parent_id != 0)
                                                        {{$parent_cat->firstWhere('id',$expense->parent_id)->category_name}} 
                                                        @else 
                                                        No Parent
                                                        @endif

                                                  
                                                    </td>
                                                    <td>
                                                        {{$expense->description}}
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