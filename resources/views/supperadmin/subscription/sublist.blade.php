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

                    <div class="card-footer">
                        <h4 class="card-text d-inline"> Users List </h4>
                        <div>
                        
                            <a href="{{route('subsciptionadd')}}" class="card-link float-end btn btn-rounded btn-info btn-sm "><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Make Subscription</a>
                          
                        </div>
                     
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                  
                                    
                                        <th>Method</th>
                                        <th>Duration</th>
                                        <th>Rate</th>
                                       
                                        <th>Created on</th>                                                                          
                                   <!--      <th>Status</th>     -->                                    
                                        <th><i class="fas fa-arrow-circle-down"></i></th>
                                    </tr>
                                </thead>
                              
                        <tbody style="width:100%; overflow-x:scroll;">

@foreach ($sublist as $index => $item
)
                         
                            <tr>
                                <td>{{ $index + 1 }}</td>
                               
                        
                         
                                
                 
                                <td>{{$method->firstWhere('id', $item->type)->method}}</td>
                                <td>{{$item->duration}} Months</td>
                                <td>₹ {{$item->rate}}</td>
                               
                                
                                <td>{{ $item->updated_at->format('Y-m-d') }}</td>

                      
                                <td style="display: flex; justify-content:center; gap: 10px;">
                                    <form action="{{route('store_useredit')}}"
                                        style="width:auto; height:auto; box-shadow:none;" method="post">
                                        @csrf
                                        <input type="text" name="id" value="{{$item->id}}" hidden>

                                        <button id="update" style="display:block;" type="submit"><i
                                                class="fa-solid fa-pencil"></i></button>
                                    </form>
                                    <button onclick="deleteUser({{$item->id}})" id="delete" style="display:block;"><i class="fa-solid fa-trash"></i></button>
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

@endsection
