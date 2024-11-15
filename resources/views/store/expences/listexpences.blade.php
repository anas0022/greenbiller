
@extends('store//layouts/app')

@section('title', 'Home Page')

@section('content')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">



        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-footer">
                        <h4 class="card-text d-inline"> Expence List</h4>

                        <a href="{{route('store_expensepost')}}" class="card-link float-end btn btn-rounded btn-info btn-sm " ><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Add Expense</a>
                    </div>
                

                    <div class="card-body">
                        <div class="table-responsive">


                            <table id="expenseslist" class="display" style="100%;">
                                <thead>
                                    <tr>
                                       
                                        <th>Date</th>
                                        <th>Category</th>
                                        <th>Reference No</th>
                                        <th>Expense for</th>
                                        <th>Amount</th>
                                        <th>Account</th>
                                        <th>Note</th>
                                        <th>Created by</th>
                                        <th><i class="fas fa-arrow-circle-down"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>




