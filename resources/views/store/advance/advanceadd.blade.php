
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

                <form action="{{route('store.advancepost')}}" method="post">
                    @csrf   
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-text d-inline"> New Advance </h4>
                            <p> Please Enter Valid Data </p>
                        </div>
                       
                        <div class="card-body">
                            <div class="col-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Date<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="payment_code" type="text" value="" hidden>
                                        <input name="payment_date" type="date" class="form-control form-control-sm" required value="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Customer Name<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="customer_id" class="form-control form-control-sm selectpicker" data-live-search="true">
                                          <option value="">-Select-</option>

                                          @foreach ($customers as  $customer)
                     <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                                          
                                          @endforeach
                                          
                                        </select>


                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Amount<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="amount" type="text" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Payment Type<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="payment_type" class="form-control form-control-sm selectpicker" data-live-search="true" required>
                                            <option value="">-Select-</option>
                                            <option value="cash">cash</option>
                                            <option value="card">card</option>
                                           
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Note</label>
                                    <div class="col-sm-9">
                                        <textarea name="note" class="form-control form-control-sm"></textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <a href="dashboard" class="btn btn-danger ">Close</a>
                                <button name="save" type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>




