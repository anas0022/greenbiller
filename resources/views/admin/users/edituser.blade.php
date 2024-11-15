
@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')
<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
<div class="content-body">

@if(session('error'))
        <div class="toast error active" id="errorToast">
            <div class="toast-content">
                <i class="fas fa-solid fa-times error-icon"></i>
                <div class="message">
                    <span class="text text-1">Error</span>
                    <span class="text text-2">{{session('error')}}</span>
                </div>
            </div>
            <i class="fa-solid fa-xmark close" id="closeErrorToast"></i>
            <div class="progress error-progress active"></div>
        </div>
    @endif
    @if ($errors->any())
   
    <div class="toast error active" id="errorToast">
            <div class="toast-content">
                <i class="fas fa-solid fa-times error-icon"></i>
                @foreach ($errors->all() as $error)
                <div class="message">
                    <span class="text text-1">Error</span>
                    <span class="text text-2">{{ $error }}</span>
                </div>
                @endforeach
            </div>
            <i class="fa-solid fa-xmark close" id="closeErrorToast"></i>
            <div class="progress error-progress active"></div>
        </div>
@endif


    @if(session('success'))
        <div class="toast active" id="toast">
            <div class="toast-content">
                <i class="fas fa-solid fa-check check"></i>
                <div class="message">
                    <span class="text text-1">Success</span>
                    <span class="text text-2">{{session('success')}}</span>
                </div>
            </div>
            <i class="fa-solid fa-xmark close" id="closeToast"></i>
            <div class="progress active"></div>
        </div>
    @endif
    <div class="container-fluid">

<div class="col-12">
                    <form method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-text d-inline"> Edit User</h4>
                                <p>Enter User Information</p>
                            </div>
                            <div class="card-body">


                                <div class="row">
                                    <div class="col-6">

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input name="name" type="text" class="form-control form-control-sm" value="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Mobile</label>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <select name="country_code" id="country_code" class="form-control form-control-sm selectpicker" data-live-search="true">

                                                         
                                                        </select>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="mobile" type="text" class="form-control form-control-sm" value="">
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input name="email" type="email" class="form-control form-control-sm" value="">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Role</label>
                                            <div class="col-sm-9">
                                                <select name="user_level" class="form-control form-control-sm" required>
                                                    <option>--Select--</option>
                                                   
                                                </select>
                                            </div>
                                        </div>


                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Default warehouse</label>
                                            <div class="col-sm-9">

                                                <select name="warehouse_id" id="warehouse_id" class="form-control selectpicker" data-live-search="true" required>
                                                    <option value="">-Select-</option>
                                               
                                                </select>
                                            </div>
                                        </div>


                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-9">
                                                <input name="password" type="password" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <!-- <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                                            <div class="col-sm-9">
                                                <input name="repassword" type="password" class="form-control form-control-sm">
                                            </div>
                                        </div> -->





                                    </div>
                                    <div class="col-6">


                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Profile Picture</label>
                                            <div class="col-sm-9">
                                                <input name="image" type="file" class="form-control">
                                                <span id="logo_msg" style="display:block;" class="text-danger">Max Width/Height: 500px * 500px </span>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <img width="200px" height="200px" class="img-responsive" style="border:3px solid #d2d6de;" src="admin">
                                            </div>
                                        </div>


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
     