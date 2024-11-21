
@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row"></div>
<div class="col-12">
                    <form method="post">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-text d-inline"> Edit Expense </h4>
                                <p> Please Enter Valid Data </p>
                            </div>

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
                                          =
                                        </select>
                                    </div>
                                </div>


                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Expense For</label>
                                    <div class="col-sm-9">
                                        <input name="expense_for" type="text" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Payment Type </label>
                                    <div class="col-sm-9">
                                        <select name="payment_type" class="form-control selectpicker" data-live-search="true">
                                            <option value="">-Select-</option>
                                          
                                        </select>
                                    </div>
                                </div>





                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Account<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="account_id" class="form-control selectpicker" data-live-search="true">
                                            <option value="0">-None-</option>
                                           
                                        </select>


                                    </div>
                                </div>



                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Amount<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="expense_amt" type="text" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Reference No</label>
                                    <div class="col-sm-9">
                                        <input name="reference_no" type="text" class="form-control" value="">
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
                                <button name="update" type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </div>
                    </form>
                </div>