
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

                <form action="{{route('store_aadvanceedit')}}" method="post">
                    @csrf   
                    <input type="text" name="id" value="{{$advance->id}}" hidden>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-text d-inline"> Edit Advance </h4>
                            <p> Please Enter Valid Data </p>
                        </div>
                       
                        <div class="card-body">
                            <div class="col-6">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Date<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        
                                        <input name="date" type="date" class="form-control form-control-sm" required value="{{$advance->date}}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Customer Name<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="customer_id" class="form-control form-control-sm selectpicker" data-live-search="true">
                                          <option value="{{$advance->id}}">{{$advance->name}}</option>

                                          @foreach ($customers as  $customer)
                                          @if ($customer->id !== $advance->id)
                     <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                                          @endif
                                          @endforeach
                                          
                                        </select>


                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Amount<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="amount" type="text" class="form-control form-control-sm" required value="{{$advance->amount}}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Payment Type<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                    <select name="type" class="form-control form-control-sm selectpicker" data-live-search="true" required>
    <!-- Display the currently selected payment type -->
    <option value="{{ $advance->type }}">{{ $advance->type }}</option>

    <!-- Only show 'cash' and 'card' options if they are different from the selected type -->
    @if ($advance->type !== 'cash')
        <option value="cash">cash</option>
    @endif
    @if ($advance->type !== 'card')
        <option value="card">card</option>
    @endif
</select>

                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Note</label>
                                    <div class="col-sm-9">
                                        <textarea name="note" class="form-control form-control-sm">{{$advance->note}}</textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <a href="dashboard" class="btn btn-danger ">Close</a>
                                <button name="save" type="submit" class="btn btn-primary">Upadte</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>




