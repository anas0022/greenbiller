@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')
<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
<div class="content-body">

@if ($errors->any())
@foreach ($errors->all() as $error)
    <script>
        swal("Warning!", "{{ $error }}", "warning");
    </script>
        @endforeach
@endif

   
   <!--  
   
    <div class="toast error active" id="errorToast">
            <div class="toast-content">
                <i class="fas fa-solid fa-times error-icon"></i>
               
                <div class="message">
                    <span class="text text-1">Error</span>
                    <span class="text text-2"></span>
                </div>
            
            </div>
            <i class="fa-solid fa-xmark close" id="closeErrorToast"></i>
            <div class="progress error-progress active"></div>
        </div>
-->


@if(session('success'))
    <script>
        swal("Success!", {{ json_encode(session('success')) }}, "success");
    </script>
@endif

    <div class="container-fluid">


        <div class="row">

          
                <div class="col-12">
                    <form action="{{route('useradd')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-text d-inline"> Create User </h4>
                                <p>Enter User Information</p>
                            </div>
                            <div class="card-body">


                                <div class="row">
                                    <div class="col-6">

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input name="name" type="text" class="form-control form-control-sm" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Mobile</label>
                                            <div class="col-sm-9">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <select name="country_code" id="country_code" class="form-control form-control-sm selectpicker" data-live-search="true">

                                                            @foreach ($country as $a)
                                                            <option value="{{$a->mobile_code}}">{{$a->mobile_code}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-8">
                                                        <input name="mobile" type="text" class="form-control form-control-sm" required>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input name="email" type="email" class="form-control form-control-sm" required>
                                            </div>
                                        </div>
                                      
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Role</label>
                                            <input type="hidden" name="role" id="roleinput">
                                            <div class="col-sm-9">
                                                <select name="user_level" class="form-control form-control-sm" required id="roleselect" onchange="rolechange()">
                                                <option value="">-SELECT-</option>
                                <option value="cashier">Cashier</option>
                                <option value="manager">Manager</option>
                                <option value="Executive">Executive</option>
                                                                            </select>
                                            </div>
                                        </div>
                                        <script>
    function rolechange() {
        var roleinput = document.getElementById('roleinput');
        var roleselect = document.getElementById('roleselect');
       
        roleinput.value = roleselect.value;
    }
</script>


                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-9">
                                                <input name="password" type="password" class="form-control form-control-sm" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Confirm Password</label>
                                            <div class="col-sm-9">
                                                <input name="password_confirmation" type="password" class="form-control form-control-sm" required>
                                            </div>
                                        </div>


                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Default Store</label>
                                            <div class="col-sm-9">

                                           
    <select name="store" class="form-control form-control-sm" id="wareselect" onchange="updateWarehouse()">
        <option value="">-SELECT-</option>
      @foreach ($stores as $store )

      <option value="{{$store->id}}">{{$store->store_name}}</option>
      
      @endforeach
    </select>
    
    
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-6">


                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Profile Picture</label>
                                            <div class="col-sm-9">
                                                <input name="image" type="file" class="form-control">
                                                <span id="logo_msg" style="display:block;" class="text-danger">Max Width/Height: 500px * 500px </span>
                                            </div>
                                        </div>

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
</div>


<script src="{{ asset('pos_assets/js/sweetalert.min.js') }}"></script>

