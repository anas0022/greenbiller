
@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')



<div class="content-body">
    <!-- row -->
    <div class="container-fluid">



        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-footer">
                        <h4 class="card-text d-inline">Stock Transfer List </h4>
                        <div>
                     
                        <a href="{{route('addtransfer')}}" class="card-link float-end btn btn-rounded btn-info btn-sm "><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                                </span> New Transfer</a>
                        </div>
                     
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="transferstock" class="display" style="width:100%;">
                                <thead>
                                    <tr>                                        
                                        <th>Transfer Date</th>
                                        <th>From Warehouse</th>
                                        <th>To Warehouse</th>
                                        <th>Details</th>   
                                        <th>Note</th>                                                                      
                                        <th>Created by</th>
                                        <th><i class="fas fa-arrow-circle-down"></i></th>
                                    </tr>
                                </thead>
                              
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>



