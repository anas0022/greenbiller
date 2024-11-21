@extends('store//layouts/app')

@section('title', 'Home Page')
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
@section('content')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">



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

            <div class="col-12">
                <div class="card">

                    <div class="card-footer">
                        <h4 class="card-text d-inline"> Advance Payments List</h4>
                        <div>

                            <a href="add-customer-advance" class="card-link float-end btn btn-rounded btn-info btn-sm "><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                                </span>Add Advance</a>

                        </div>

                    </div>


                    <div class="card-body">
                        <div class="table-responsive" style="min-height: 300px !important;">
                            <table id="customeradvance" class="display" style="width:100%;" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                       
                                        <th>Date</th>
                                        <th>Customer Name</th>
                                        <th>Amount</th>
                                        <th>Payment Type</th>
                                        <th><i class="fas fa-arrow-circle-down"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($advance as $index=> $a)
                                    
                                 
                                    <tr>
                                    <td>{{$index+1}}</td>
                                 
                                    <td>{{$a->date}}</td>
                                    <td>{{$customer->customer_name}}</td>
                                    <td>{{$a->amount}}</td>
                                    <td>{{$a->type}}</td>
                                    <td style="display: flex; justify-content:center; gap: 10px;">
                                                                <form action="{{route('store_edit.advance')}}"
                                                                    style="width:auto; height:auto; box-shadow:none;" method="post">
                                                                    @csrf
                                                                    <input type="text" name="id" value="{{$a->id}}" hidden>

                                                                    <button id="update" style="display:block;"><a href=""></a><i
                                                                            class="fa-solid fa-pencil"></i></button>
                                                                </form>
                                                                <form style="width:auto; height:auto; box-shadow:none;"
                                                                    action="{{ route('store.deleteadvance') }}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$a->id}}">
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


