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
                        <h4 class="card-text d-inline"> Purchase Returns List </h4>
                        <div>
                        
                            <a href="add-purchase-return" class="card-link float-end btn btn-rounded btn-info btn-sm "><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Create New</a>
                          
                        </div>
                     
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="purchasereturnlist" class="display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Purchase Code</th>
                                        <th>Return Code</th>
                                        <th>Return Status</th>
                                        <th>Reference No</th>
                                        <th>Supplier Name</th>
                                        <th>Total</th>
                                        <th>Paid Payment</th>                                      
                                        <th>Payment Status</th>   
                                        <!-- <th>Created by</th>                                       -->
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



