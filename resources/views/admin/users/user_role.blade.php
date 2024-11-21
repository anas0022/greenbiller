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


<div class="modal fade" id="userrole" tabindex="-1">


    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form action="{{route('add_user_role')}}" method="POST">

                @csrf

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-text d-inline">Add User Role </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          
                            <div class="col-lg-10 mb-3">
                                <div class="form-group">
                                    <label class="form-label">Role</label>
                                    <input type="text" name="role" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-10 mb-3">
                                <div class="form-group">
                               
                                    <label class="form-label">Description</label>
                                    <textarea name="description" id="" class="form-control"></textarea>
                                   
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                               
                             


                            </div>




                        </div>



                    </div>
                    <hr class="solid">
                    <div class="card-header">

                        <a href="dashboard" class="btn btn-danger ">Close</a>
                        <button name="save" type="submit" class="btn btn-primary">Save</button>
                    </div>

                </div>

            </form>


            <!-- edit customer -->


        </div>
        <!-- /.modal-content -->
    </div>
</div>
            <div class="col-12">
                <div class="card">

                    <div class="card-footer">
                        <h4 class="card-text d-inline"> Users Role </h4>
                        <div>
                        
                            <a class="card-link float-end btn btn-rounded btn-info btn-sm " data-bs-toggle="modal"
                            data-bs-target="#userrole"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Create User Role</a>
                          
                        </div>
                     
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">#</th>
                                        <th style="text-align: center;">Role</th>
                                        <th style="text-align: center;">Discription</th>
                                        <th style="text-align: center;">Created At</th>                   
                                        
                                    </tr>
                                </thead>
                              
                        <tbody style="width:100%; overflow-x:scroll;">
                            @foreach ($user_role as $index=> $role )

                                <tr>
                                    <td style="text-align: center;">{{$index+1}}</td>
                                    <td style="text-align: center;">{{$role->role}}</td>
                                    <td style="text-align: center;">{{$role->description}}</td>
                                    <td style="text-align: center;">{{ $role->created_at->format('Y-m-d') }}</td>

                                  
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