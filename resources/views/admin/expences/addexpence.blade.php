
@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
<div class="content-body">
    


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
                    <form  action="{{route('addexpense')}}" method="post">
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
                                        <select name="expense_category" class="form-control selectpicker" data-live-search="true">
                                            <option value="">-Select-</option>
                                            @foreach ($expense_category as $ec)
                                            <option value="{{$ec->id}}">{{$ec->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Store</label>
                                    <div class="col-sm-9">
                                        <select name="store_id" class="form-control selectpicker" data-live-search="true">
                                            <option value="">-Select-</option>
                                            @foreach ($store as $st)
                                            <option value="{{$st->id}}">{{$st->store_name}}</option>
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
                                    <label class="col-sm-3 col-form-label">Expense By</label>
                                    <div class="col-sm-9">

              <select name="expense_by" id="" class="form-control">
                    <option value="">-select</option>
                    @foreach ($user as $u)
                    <option value="{{$u->id}}">{{$u->name}}  ({{$u->role}})</option>
                        
                    @endforeach
              </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Payment Type </label>
                                    <div class="col-sm-9">
                                        <select name="payment_type" class="form-control selectpicker" data-live-search="true">
                                            <option value="">-Select-</option>
                                            <option value="cash">Cash</option>
                                            <option value="card">Card</option>
                                        </select>
                                    </div>
                                </div>





                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Account<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="account" class="form-control selectpicker" data-live-search="true">
                                            <option value="0">-None-</option>
                                            @foreach ($account as $a)
                                            <option value="{{$a->id}}">{{$a->account_name}}</option>
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
@endsection