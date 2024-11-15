
@extends('store//layouts/app')

@section('title', 'Home Page')

@section('content')
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
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
                    <form action="{{route('store_addexpense')}}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-text d-inline"> Expense </h4>
                                <p> Please Enter Valid Data </p>
                            </div>
                            <input type="text" name="store_id" id="store_id" value="" hidden>
                            <input type="text" name="code" id="code" value="" hidden>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Expense Date</label>
                                    <div class="col-sm-9">
                                        <input name="expense_date" type="date" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select name="category_id" class="form-control selectpicker" data-live-search="true">
                                            <option value="">-Select-</option>
                                            @foreach ($category as $cat )
                                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                            
                                            @endforeach
                                          
                                        </select>
                                    </div>
                                </div>


                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Expense For</label>
                                    <div class="col-sm-9">
                                        <input name="expense_for" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Payment Type </label>
                                    <div class="col-sm-9">
                                        <select name="payment_type" class="form-control selectpicker" data-live-search="true">
                                            <option value="">-Select-</option>
                                            <option value="card">card</option>
                                            <option value="cash">cash</option>
                                          
                                        </select>
                                    </div>
                                </div>





                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Account<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="account_id" class="form-control selectpicker" data-live-search="true">
                                            <option value="0">-None-</option>
                                            @foreach ($account as $acc )
                                            <option value="{{$acc->id}}">{{$acc->account_name}}</option>
                                            
                                            @endforeach
                                        </select>


                                    </div>
                                </div>



                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Amount<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="expense_amt" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Reference No</label>
                                    <div class="col-sm-9">
                                        <input name="reference_no" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Note</label>
                                    <div class="col-sm-9">
                                        <textarea name="note" class="form-control"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="card-header">
                                <a href="dashboard" class="btn btn-danger ">Close</a>
                                <button name="save" type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </div>
                    </form>
                </div>


        


        </div>
    </div>
</div>





