@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <!-- <div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Form</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Validation</a></li>
					</ol>
                </div> -->

        <div class="row">

            

            <div class="col-xl-12">
                <form action="{{route('customer_edit')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="" value="{{$customer->id}}">
                    @csrf
                    <div class="card">
                        <div class="card-header">

                            <h4 class="card-title"> Store Settings <i class="flaticon-381-fast-forward"></i> </h4>
                            <code>Wrong configuration may stop working of application</code>
                        </div>



                        <div class="card-body">
                            <!-- Nav tabs -->
                            <div class="default-tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#general" aria-selected="true" role="tab" tabindex="-1"><i class="bi bi-person-plus" style="margin-right: 6px;"></i> ADD/Edit</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#advance" aria-selected="false" role="tab" tabindex="-1"><i class="bi bi-cpu" style="margin-right: 6px;"></i> Advanced</a>
                                    </li>

                                </ul>

                                <div class="tab-content" style="margin-top: 15px !important;">
                                    <div class="tab-pane fade active show" id="general" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Customer Name<span class="required">*</span></label>
                                                        <input type="text" name="customer_name" class="form-control form-control-sm" required value="{{$customer->customer_name}}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Mobile<span class="required">*</span></label>
                                                        <input type="text" name="mobile" class="form-control form-control-sm" required value="{{$customer->mobile}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input name="email" type="email" class="form-control form-control-sm" value="{{$customer->email}}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">GST Number</label>
                                                        <input type="text" name="gstin" class="form-control form-control-sm" value="{{$customer->gst_number}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">TAX Number</label>
                                                        <input type="text" name="tax_number" class="form-control form-control-sm" value="{{$customer->tax_number}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Credit Limit</label>
                                                        <input type="text" name="credit_limit" class="form-control form-control-sm" value="{{$customer->credit_limit}}">
                                                    </div>
                                                </div>


                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Previous Due</label>
                                                        <input type="text" name="opening_balance" class="form-control form-control-sm" value="{{$customer->previous_due}}">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">

                                                <h4 class="card-title" style="margin-bottom: 20px !important;">
                                                    <i class="flaticon-381-fast-forward"></i> Address Details
                                                </h4>


                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Address</label>
                                                        <textarea name="address" id="address" class=" form-control form-control-sm-sm">{{$customer->address}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">City</label>
                                                        <input type="text" name="city" id="city" class="form-control form-control-sm" value="{{$customer->city}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">State</label>
                                                        <input type="text" name="state" id="state" class="form-control form-control-sm" value="{{$customer->state}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Postcode</label>
                                                        <input type="text" name="postcode" id="postcode" class="form-control form-control-sm" value="{{$customer->postcode}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <script>
                                                            function countryname(){
                                                                var countryInput =document.getElementById('countryInput');
                                                                var countrySelect =document.getElementById('countrySelect');
                                                                countryInput.value =countrySelect.value;
                                                            }
                                                        </script>
                                                        <input type="hidden" name="country_name" id="countryInput" value="{{$customer->country}}">
                                                        <label class="form-label">Country</label>
                                                        <select name="country_id" id="countrySelect" class="form-control form-control-sm selectpicker" data-live-search="true" onchange="countryname()">
                                                        <option>{{ $country_select->firstWhere('id', $customer->country)->name ?? 'N/A' }}</option>

                                                            @foreach ($country as $c)
                                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                                            
                                                            @endforeach
                                                            
                                                        </select>



                                                    </div>
                                                </div>






                                            </div>
                                            <div class="row">

                                                <h4 class="card-title" style="margin-bottom: 20px !important;">
                                                    <i class="flaticon-381-fast-forward"></i> Shipping Address
                                                </h4>

                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Copy Address ?</label>
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="same" name="same" onchange="sameasabove()">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Address</label>
                                                        <textarea name="address_shipping" id="address_shipping" class=" form-control form-control-sm-sm">{{$customer->ship_address}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">City</label>
                                                        <input type="text" name="city_shipping" id="city_shipping" class="form-control form-control-sm" value="{{$customer->ship_city}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">State</label>
                                                        <input type="text" name="state_shipping" id="state_shipping" class="form-control form-control-sm"  value="{{$customer->ship_state}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Postcode</label>
                                                        <input type="text" name="postcode_shipping" id="postcode_shiping" class="form-control form-control-sm" value="{{$customer->ship_postcode}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <script>
                                                            function countrychange2(){
                                                                var scountryInput =document.getElementById('scountryInput');
                                                                var scountrySelect =document.getElementById('scountrySelect');
                                                                scountryInput.value =scountrySelect.value;
                                                            }
                                                        </script>
                                                        <input type="hidden" name="shipping_country" id="scountryInput" value="{{$customer->ship_country}}">
                                                        <label class="form-label">Country</label>
                                                        <select name="country_id_shipping" id="scountrySelect" class="form-control form-control-sm selectpicker" data-live-search="true" onchange="countrychange2()">
                                                        <option>{{ $country_select->firstWhere('id', $customer->country)->name ?? 'N/A' }}</option>
                                                            @foreach ($country as $c)
                                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                                            
                                                            @endforeach
                                                        </select>



                                                    </div>
                                                </div>
                                                <script>
                                                    function sameasabove() {

                                                        if (document.getElementById("same").checked) {
                                                            var address = document.getElementById("address").value;
                                                            var city = document.getElementById("city").value;
                                                            var state = document.getElementById("state").value;
                                                            var postcode = document.getElementById("postcode").value;
                                                            var country_id = document.getElementById("country_id").value;

                                                            document.getElementById("address_shipping").value = address;
                                                            document.getElementById("city_shipping").value = city;
                                                            document.getElementById("state_shipping").value = state;
                                                            document.getElementById("postcode_shipping").value = postcode;
                                                            document.getElementById("country_id_shipping").value = country_id;

                                                        } else {
                                                            document.getElementById("address_shipping").value = "";
                                                            document.getElementById("address_shipping").value = "";
                                                            document.getElementById("city_shipping").value = "";
                                                            document.getElementById("state_shipping").value = "";
                                                            document.getElementById("postcode_shipping").value = "";
                                                        }
                                                    }
                                                </script>





                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="advance" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="row">

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Price Level Type</label>
                                                        <script>
function pricelevel(){
    var pricelevelInput =document.getElementById("pricelevelInput");
    var pricelevelSelect =document.getElementById('pricelevelSelect');
    pricelevelInput.value = pricelevelSelect.value;
}
                                                        </script>
                                                        <input type="hidden" name="price_type" id="pricelevelInput" value="{{$customer->price_leveltype}}">
                                                        <select name="price_level_type" id="pricelevelSelect" class="form-control form-control-sm selectpicker" data-live-search="true" onchange="pricelevel()">
                                                            <option value="">{{$customer->price_leveltype}}</option>
                                                            <option value="Increase" data-tokens="0" value="Increase">Increase</option>
                                                            <option value="Decrease" data-tokens="1" value="Decrease">Decrease</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Price Level</label>
                                                        <input type="text" name="price_level" class="form-control form-control-sm" value="{{$customer->price_level}}">
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="card-footer">
                            <a href="dashboard" class="btn btn-danger ">Close</a>
                            <button name="save" type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>
                </form>


            </div>


        </div>
    </div>
</div>
</div>
@endsection

<!--**********************************
            Content body end-->




