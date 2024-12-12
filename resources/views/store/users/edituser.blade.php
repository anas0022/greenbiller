@extends('store//layouts/app')

@section('title', 'Home Page')

@section('content')

<div class="content-body">

    <div class="container-fluid">

      
        <div class="col-12">
            <form action="{{route('store_userediting')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="" value="{{$items->id}}">
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
                                        <input name="name" type="text" class="form-control form-control-sm"
                                            value="{{$items->name}}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-4">
                                                <select name="country_code" id="country_code"
                                                    class="form-control form-control-sm selectpicker"
                                                    data-live-search="true">
                                                    
                                                    @foreach ($country as $a)
                                                        <option value="{{ $a->id }}" {{ $a->id == $items->mobile_code ? 'selected' : '' }}>
                                                            {{ $a->mobile_code }}
                                                        </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                            <div class="col-8">
                                                <input name="mobile" type="text" class="form-control form-control-sm"
                                                    value="{{$items->mobile}}">
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input name="email" type="email" class="form-control form-control-sm"
                                            value="{{$items->email}}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Role</label>
                                    <div class="col-sm-9">


                                        <select name="role" id="role" class="form-control form-control-sm selectpicker"
                                            data-live-search="true">
                                            @foreach ($roles as $a)
                                                <option value="{{ $a->id }}" {{ $a->id == $items->role_id ? 'selected' : '' }}>
                                                    {{ $a->role }}
                                                </option>
                                            @endforeach
                                 
                                        </select>


                                    </div>
                                </div>

                                <!-- 
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Default warehouse</label>
                                    <div class="col-sm-9">

                                        <select name="warehouse_id" id="warehouse_id" class="form-control selectpicker"
                                            data-live-search="true" required>
                                            <option value="">-Select-</option>

                                        </select>
                                    </div>
                                </div> -->


                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input name="password" type="password" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input name="password_confirmation" type="password"
                                            class="form-control form-control-sm" required>
                                    </div>
                                </div>





                            </div>
                            <div class="col-6">


                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Profile Picture</label>
                                    <div class="col-sm-9">
                                        <input name="image" type="file" class="form-control">
                                        <span id="logo_msg" style="display:block;" class="text-danger">Max Width/Height:
                                            500px * 500px </span>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <img width="200px" height="200px" class="img-responsive"
                                            style="border:3px solid #d2d6de;"
                                            src="{{ asset('storage/' . $items->image) }}">


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
    </div>
</div>
@endsection