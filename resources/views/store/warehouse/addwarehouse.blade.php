@extends('store//layouts/app')

@section('title', 'Home Page')

@section('content')
<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
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
                    <form action="{{route('store_warepost')}}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-text d-inline"> Warehouse </h4>
                                <p>Enter Valid Information</p>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Warehouse Name <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input name="name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <textarea name="address" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-9">
                                        <input name="mobile" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input name="email" type="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                          
                                <button name="save" type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </div>
                    </form>
                </div>
        

        </div>

    </div>
    

<!-- <script>
      
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
      
          </script> -->


</div>


