@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')
<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
<div class="content-body">
    <!-- row -->
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

       

        <div class="row">

     
                <div class="col-12">
                    <form action="{{route('warepost')}}" method="post">
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


