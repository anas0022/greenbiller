@extends('supperadmin//layouts/app')

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
                    <div class="modal fade" id="add-item-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <h5 class="modal-title" id="exampleModalLabel">Add Method</h5>
                                <div class="modal-header header-custom">
                                  
                                    <div class="modal-body">
                                        <form id="add-method-form" action="{{route('method.post')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="methodName">Method Name</label>
                                                <input type="text" class="form-control" id="methodName" name="methodName" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="methodDescription">Description</label>
                                                <textarea class="form-control" id="methodDescription" name="methodDescription" rows="3"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Add your form or content here -->
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <h4 class="card-text d-inline"> Method List </h4>
                        <div>
                        
                            <a  class="card-link float-end btn btn-rounded btn-info btn-sm " data-toggle="modal"
                            data-target="#add-item-model"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Add Method</a>
                          
                        </div>
                     
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">#</th>
                                  
                                        <th style="text-align: center;">Method</th>
                                                                                                              
                                                              
                                        <th style="text-align: center;"><i class="fas fa-arrow-circle-down"></i></th>
                                    </tr>
                                </thead>
                              
                        <tbody style="width:100%; overflow-x:scroll;">
                            @foreach ($method as $index=>$m)
                                
                          
                  
                            <tr>
                             
                        
                         
                                
                                <td style="text-align: center;">{{$index+1}}</td>
                                <td style="text-align: center;">{{$m->method}}</td>
                               

                      
                                <td style="display: flex; justify-content:center; gap: 10px;">
                                    <form action="{{route('store_useredit')}}"
                                        style="width:auto; height:auto; box-shadow:none;" method="post">
                                        @csrf
                                        <input type="text" name="id" value="" hidden>

                                        <button id="update" style="display:block;" type="submit"><i
                                                class="fa-solid fa-pencil"></i></button>
                                    </form>
                                    <button onclick="deleteUser()" id="delete" style="display:block;"><i class="fa-solid fa-trash"></i></button>
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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

@endsection
