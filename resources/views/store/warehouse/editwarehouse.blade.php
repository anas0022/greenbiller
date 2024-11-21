@extends('store//layouts/app')

@section('title', 'Home Page')

@section('content')
<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
<div class="content-body">
   
    <div class="container-fluid">

       

        <div class="row">

     
        

                <div class="col-12">
                <form  action="{{route('store_update.ware')}}" method="post" >
                    @csrf   
                        <input type="hidden" name="id" id="" value="{{$ware->id}}">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-text d-inline"> Edit Warehouse </h4>
                                <p>Enter Valid Information</p>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Warehouse Name <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="name" type="text" class="form-control" required value="{{$ware->name}}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <textarea name="address" class="form-control">{{$ware->address}}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-9">
                                        <input name="mobile" type="text" class="form-control" value="{{$ware->mobile}}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input name="email" type="email" class="form-control" value="{{$ware->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                               
                                <button name="update" type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
           
        </div>

    </div>
</div>





<script>
      
      setTimeout(() => {
          document.getElementById('toast').classList.remove('active');
      }, 5000);
      
      
      document.getElementById('closeToast').addEventListener('click', () => {
          document.getElementById('toast').classList.remove('active');
      });
      
      
      setTimeout(() => {
          document.getElementById('errorToast').classList.remove('active');
      }, 5000);
      
      
      document.getElementById('closeErrorToast').addEventListener('click', () => {
          document.getElementById('errorToast').classList.remove('active');
      });
      
          </script>