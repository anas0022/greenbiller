
@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

       

        <div class="row">
            <div class="col-12">

                <form action="{{route('advancepost')}}" method="post">
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
                                  
                                        <input name="payment_date" type="date" class="form-control form-control-sm" required value="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Select Employ<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="customer_id" class="form-control form-control-sm selectpicker" data-live-search="true">
                                            <option value="">- select -</option>
                                         @foreach ($user as $u)

                                         <option value="{{$u->id}}">{{$u->name}}({{$u->role}})</option>
                                             
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
                                    <label class="col-sm-3 col-form-label">Select Store<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="store_id" class="form-control form-control-sm selectpicker" data-live-search="true" required>
                                            <option value="">-Select-</option>
                                          @foreach ($stores as $store )
                                          <option value="{{$store->id}}">{{$store->store_name}}</option>
                                              
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Payment Type<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="payment_type" class="form-control form-control-sm selectpicker" data-live-search="true" required>
                                            <option value="">-Select-</option>
                                            <option value="card">Card</option>
                                            <option value="cash">Cash</option>
                                           
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




@endsection