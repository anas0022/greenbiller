@extends('supperadmin//layouts/app')

@section('title', 'Home Page')

@section('content')


<div class="content-body">
 <div class="container-fluid">
 <div class="row">
    <form action="{{route('subsciption.post')}}" method="post">
        @csrf   
        <div class="card">
            <div class="card-header">
                <h4 class="card-text d-inline"> New Subscription </h4>
                <p> Please Enter Valid Data </p>
            </div>
           
            <div class="card-body">
                <div class="col-6">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Subscription Type<span class="required">*</span></label>
                        <div class="col-sm-9">
                     
                            <select name="type" id="" class="form-control">
                                <option value="">-select-</option>
                                @foreach ($method as $m)
                                    <option value="{{$m->id}}">{{$m->method}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Duration (Monthly)<span class="required">*</span></label>
                        <div class="col-sm-9">
                          <input type="text" name="duration" id="" class="form-control">


                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Store Count<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input name="store_count" type="number" class="form-control form-control-sm" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Rate<span class="required">*</span></label>
                        <div class="col-sm-9">
                            <input name="rate" type="number" class="form-control form-control-sm" required>
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

        </div></div></div>
@endsection