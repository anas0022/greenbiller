@extends('store//layouts/app')

@section('title', 'Home Page')

@section('content')



   
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <form action="{{route('store_edit.supplierpost')}}" method="post" enctype="multipart/form-data">
@csrf
                   
<input type="hidden" name="id" value="{{$supplier->id}}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-text d-inline">Add Suppliers </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Supplier Name<span class="required">*</span></label>
                                        <input type="text" name="supplier_name" class="form-control" required="" value="{{$supplier->name}}">
                                        <input type="text" name="supplier_code" class="form-control" readonly value="" hidden>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Mobile<span class="required">*</span></label>
                                        <input type="text" name="mobile" class="form-control" required="" value="{{$supplier->mobile}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"  value="{{$supplier->email}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control"  value="{{$supplier->phone}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">GST Number</label>
                                        <input type="text" name="gstin" class="form-control"  value="{{$supplier->gst}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">TAX Number</label>
                                        <input type="text" name="tax_number" class="form-control"  value="{{$supplier->tax}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Opening Balance</label>
                                        <input type="text" name="opening_balance" class="form-control"  value="{{$supplier->balance}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control"> {{$supplier->address}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">City</label>
                                        <input type="text" name="city" class="form-control"  value="{{$supplier->city}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Postcode</label>
                                        <input type="text" name="postcode" class="form-control"  value="{{$supplier->postcode}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">State</label>
                                        <input type="text" name="state" class="form-control"  value="{{$supplier->state}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
<script>
    function countryselecting(){
        var countryInput =document.getElementById('countryInput');
        var countryselect =document.getElementById('countryselect');

        countryInput.value = countryselect.value;
    }
</script>
                                    <div class="form-group">
                                        <input type="hidden" name="country" id="countryInput" value="{{$supplier->country}}">
                                        <label class="form-label">Country</label>

                                        <select name="country_id" id="countrySelect" class="form-control form-control-sm selectpicker" data-live-search="true" onchange="countryname()">
   
    <option value="{{ $supplier->country }}">
        {{ $country_name ? $country_name->name : 'Country not found' }}
    </option>

    <!-- Loop through countries, skipping the selected country -->
    @foreach ($country as $c)
        @if ($c->id !==$supplier->country)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endif
    @endforeach
</select>

                                    </div>
                                </div>




                            </div>



                        </div>
                        <hr class="solid">
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


