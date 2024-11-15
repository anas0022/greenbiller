@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">


<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
</head>

<body>


  
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
                <div class="card" style="padding:10px;">
            
                <div class="card-footer">
                        <h4 class="card-text d-inline"> Store List</h4>

                        <button type="button" class="card-link float-end btn btn-rounded btn-info btn-sm " data-bs-toggle="modal" data-bs-target="#basicModal"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span><a href="{{route('store')}}" style="color:white;">Add Unit</a></button>
                    </div>

                

                <div style="width:100%; overflow-x:scroll;">
                    <table id="example" class="display">
                        <thead>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Store Code</th>
                            <th>Store Name</th>
                          
                            <th>Store Website</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            
                            <th>Country</th>
                            <th>State</th>
                            <th>city</th>
                            <th>Status</th>
                            <th><i class="fa-solid fa-circle-arrow-down"></i></th>
                        </thead>
                        <tbody >

                            @foreach ($store as $index => $item
                            )
                                                        <div class="form_update" id="form_update_{{ $index }}">
                                                            <form action="{{ route('updateStatus.store') }}" method="post"
                                                                class="status-toggle-form" style="background-color:white; padding:20px ; ">
                                                                @csrf
                                                                <i class="fa-thin fa-circle-exclamation" style=" font-size: 60px;
                                  margin-bottom: 2px;
                                  color: orange; "></i>
                                                                <p style="font-size: 20px;">Are You Sure</p>
                                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                                <p>Do you want to change this to
                                                                    {{ $item->store_status === 'active' ? 'inactive' : 'active' }}?</p>
                                                                <div class="buttons" style="width:100%; justify-content:end;">
                                                                    <button>
                                                                        <a href="">Cancel</a></button>
                                                                    <button type="submit" style="display:block;">Yes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td> 
                                                           
                                                            <td>
                                                                <img src="{{asset('storage/'.$item->logo)}}" alt="" srcset="" style="width:20px; height:20px;"></td>
                                                            <td>{{$item->store_code}}</td>
                                                            <td>{{$item->store_name}}</td>
                                                            <td>{{$item->store_website}}</td>
                                                            <td>{{$item->mobile}}</td>
                                                            <td>{{$item->email}}</td>
                                                            <td>{{$item->country}}</td> 
                                                            <td>{{$item->state}}</td>
                                                            <td>{{$item->city}}</td>
                                                            <td id="statuschange_{{ $index }}">
                                                            <p class="status-cell {{ $item->store_status === 'active' ? 'active-status' : 'inactive-status' }}"
                                                                    style="cursor: pointer;">
                                                                    {{ $item->store_status }}
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <form action="{{route('storeedit')}}"
                                                                  method="post">
                                                                    @csrf
                                                                    <input type="text" name="id" value="{{$item->id}}" hidden>

                                                                    <button id="update" ><a href=""></a><i
                                                                            class="fa-solid fa-pencil"></i></button>
                                                                </form>
                                                                <form 
                                                                    action="{{ route('store_delete') }}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                                    <button type="submit" id="delete" ><i
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
        </form>
        </div></div></div>
        
       
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