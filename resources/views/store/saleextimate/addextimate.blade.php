<!DOCTYPE html>

<html style="--animate-duration: 0.5s; --animate-delay: 0.1s; height: auto">

<head>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <!-- TABLES CSS CODE -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>POS | </title>
    <link rel="icon" type="image/png" href="">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/bootstrap.min.css') }}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/font-awesome.min.css') }}" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/ionicons.min.css') }}" />
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/select2.min.css') }}" />

    <!-- end -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/AdminLTE.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('pos_assets/css/newcustom.css') }}" />

    <!-- bootstrap date-range-picker -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/daterangepicker.css') }}" />
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/datepicker3.css') }}" />
    <!--Toastr notification -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/toastr.css') }}" />
    <!--Toastr notification end-->
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/orange.css') }}" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--Custom Css File-->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/custom.css') }}" />


    <!-- Autocomplete -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/autocomplete.css') }}" />
    <!-- Pace Loader -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/pace.min.css') }}" />
    <!-- Theme color finder -->

    <!-- jQuery 2.2.3 -->
    <!-- <script src="{{ asset('pos_assets/js/jquery-2.2.3.min.js') }}"></script> -->
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/blue.css') }}" />
    <link rel="stylesheet" href="{{ asset('pos_assets/css/pos.css') }}" />
    <!-- bootstrapicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

    <!-- sweetalert2 -->
    <!-- <script src="{{ asset('admin_assets/js/sweetalert.min.js') }}"></script>
    <link href="{{ asset('admin_assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet"> -->

    <!-- font-awesome -->
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>


</head>

<body class="skin-blue layout-top-nav " style="height: auto" cz-shortcut-listen="true">





    @if($errors->any())
        <script>
            swal({
                title: "Error!",
                text: "{!! implode('\n', $errors->all()) !!}", // Join errors with line breaks
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


    <style>
        .underselect {
            height: 17px;
            width: 100%;
            font-size: 10px;
        }
    </style>


<div class="modal fade" id="add-item-model" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header header-custom">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title text-center">Payments</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <!-- LEFT HAND -->
                                                                <div class="modal fade" id="customer-modal" tabindex="-1">

                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header header-custom">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <label aria-hidden="true">×</label>
                                                                                </button>
                                                                                <h4 class="modal-title text-center">Edit Customer</h4>
                                                                            </div>
                                    
                                                                            <form id="customerEditForm">
                                                                                @csrf
                                                                                <input type="hidden" id="id" name="id">
                                                                                <div class="modal-body" style="padding: 80px;">
                                                                                    <div>
                                                                                        <div class="pt-4">
                                                                                            <div class="row">
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">Customer Name<span
                                                                                                                class="required">*</span></label>
                                                                                                        <input type="text" name="customer_name"
                                                                                                            class="form-control form-control-sm" required
                                                                                                            id="customer_name">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">Mobile<span
                                                                                                                class="required">*</span></label>
                                                                                                        <input type="text" name="mobile"
                                                                                                            class="form-control form-control-sm" required
                                                                                                            id="mobile">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">Email</label>
                                                                                                        <input name="email" type="email"
                                                                                                            class="form-control form-control-sm" id="email">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">GST Number</label>
                                                                                                        <input type="text" name="gstin"
                                                                                                            class="form-control form-control-sm"
                                                                                                            id="gst_no">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">TAX Number</label>
                                                                                                        <input type="text" name="tax_number"
                                                                                                            class="form-control form-control-sm"
                                                                                                            id="tax_number">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">Credit Limit</label>
                                                                                                        <input type="text" name="credit_limit"
                                                                                                            class="form-control form-control-sm"
                                                                                                            value="-1.000" id="credit">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">Previous Due</label>
                                                                                                        <input type="text" name="opening_balance"
                                                                                                            class="form-control form-control-sm"
                                                                                                            value="0.000" id="previous_due">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <h4 class="card-title"
                                                                                                    style="margin-bottom: 20px !important;">
                                                                                                    <i class="flaticon-381-fast-forward"></i> Address
                                                                                                    Details
                                                                                                </h4>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">Address</label>
                                                                                                        <textarea name="address" id="address"
                                                                                                            class="form-control form-control-sm"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">City</label>
                                                                                                        <input type="text" name="city" id="city"
                                                                                                            class="form-control form-control-sm">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">State</label>
                                                                                                        <input type="text" name="state" id="state"
                                                                                                            class="form-control form-control-sm">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">Postcode</label>
                                                                                                        <input type="text" name="postcode" id="postcode"
                                                                                                            class="form-control form-control-sm">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <input type="hidden" name="country_name"
                                                                                                            id="countryInput">
                                                                                                        <label class="form-label">Country</label>
                                                                                                        <select name="country_id" id="countrySelect"
                                                                                                            class="form-control form-control-sm selectpicker"
                                                                                                            data-live-search="true"
                                                                                                            onchange="document.getElementById('countryInput').value = this.value;">
                                                                                                            <option id="country">-SELECT COUNTRY -</option>
                                                                                                            @foreach ($country as $c)
                                                                                                                <option value="{{ $c->id }}">{{ $c->name }}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <h4 class="card-title"
                                                                                                    style="margin-bottom: 20px !important;">
                                                                                                    <i class="flaticon-381-fast-forward"></i> Shipping
                                                                                                    Address
                                                                                                </h4>
                                                                                                <div class="col-lg-12 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">Copy Address ?</label>
                                                                                                        <div class="form-check form-switch">
                                                                                                            <input class="form-check-input" type="checkbox"
                                                                                                                role="switch" id="same" name="same"
                                                                                                                onchange="sameasabove()">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">Address</label>
                                                                                                        <textarea name="address_shipping"
                                                                                                            id="address_shipping"
                                                                                                            class="form-control form-control-sm"></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">City</label>
                                                                                                        <input type="text" name="city_shipping"
                                                                                                            id="city_shipping"
                                                                                                            class="form-control form-control-sm">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">State</label>
                                                                                                        <input type="text" name="state_shipping"
                                                                                                            id="state_shipping"
                                                                                                            class="form-control form-control-sm">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">Postcode</label>
                                                                                                        <input type="text" name="postcode_shipping"
                                                                                                            id="postcode_shipping"
                                                                                                            class="form-control form-control-sm">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <input type="hidden" name="shipping_country"
                                                                                                            id="scountryInput">
                                                                                                        <label class="form-label">Country</label>
                                                                                                        <select name="country_id_shipping"
                                                                                                            id="scountrySelect"
                                                                                                            class="form-control form-control-sm selectpicker"
                                                                                                            data-live-search="true"
                                                                                                            onchange="document.getElementById('scountryInput').value = this.value;">
                                                                                                            <option id="ship_country">-SELECT COUNTRY-
                                                                                                            </option>
                                                                                                            @foreach ($country as $c)
                                                                                                                <option value="{{ $c->id }}">{{ $c->name }}
                                                                                                                </option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <script>
                                                                                                function sameasabove() {
                                                                                                    if (document.getElementById("same").checked) {
                                                                                                        document.getElementById("address_shipping").value = document.getElementById("address").value;
                                                                                                        document.getElementById("city_shipping").value = document.getElementById("city").value;
                                                                                                        document.getElementById("state_shipping").value = document.getElementById("state").value;
                                                                                                        document.getElementById("postcode_shipping").value = document.getElementById("postcode").value;
                                                                                                        document.getElementById("scountryInput").value = document.getElementById("countryInput").value;
                                                                                                    } else {
                                                                                                        document.getElementById("address_shipping").value = "";
                                                                                                        document.getElementById("city_shipping").value = "";
                                                                                                        document.getElementById("state_shipping").value = "";
                                                                                                        document.getElementById("postcode_shipping").value = "";
                                                                                                        document.getElementById("scountryInput").value = "";
                                                                                                    }
                                                                                                }
                                                                                            </script>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div>
                                                                                        <div class="pt-4">
                                                                                            <div class="row">
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">Price Level Type</label>
                                                                                                        <script>
                                                                                                            function pricelevel() {
                                                                                                                document.getElementById("pricelevelInput").value = document.getElementById('pricelevelSelect').value;
                                                                                                            }
                                                                                                        </script>
                                                                                                        <input type="hidden" name="price_level_type_value"
                                                                                                            id="pricelevelInput">
                                                                                                        <select name="price_level_type"
                                                                                                            id="pricelevelSelect"
                                                                                                            class="form-control form-control-sm selectpicker"
                                                                                                            data-live-search="true" onchange="pricelevel()">
                                                                                                            <option value="" id="price_level"></option>
                                                                                                            <option value="Increase" data-tokens="0">
                                                                                                                Increase</option>
                                                                                                            <option value="Decrease" data-tokens="1">
                                                                                                                Decrease</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-lg-6 mb-2">
                                                                                                    <div class="form-group">
                                                                                                        <label class="form-label">Price Level</label>
                                                                                                        <input type="text" name="price_level"
                                                                                                            class="form-control form-control-sm">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                    
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-warning"
                                                                                        data-dismiss="modal">Close</button>
                                                                                    <button type="submit" id="" class="btn btn-primary">Save</button>
                                                                                </div>
                                    
                                                                            </form>
                                                                            <script>
                                                                                $(document).ready(function() {
                                                                                    $('#customerEditForm').on('submit', function(e) {
                                                                                   
                                                                                        e.preventDefault();
                                                                                        
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: "{{ route('customer_edit') }}",
                                                                                            data: $(this).serialize(),
                                                                                            success: function(response) {
                                                                                                if(response.success) {
                                                                                                    // Show success message
                                                                                                    swal({
                                                                                                        title: "Success!",
                                                                                                        text: response.message,
                                                                                                        icon: "success",
                                                                                                        type: "success"
                                                                                                    });
                                                                                                    
                                                                                                    // Close modal
                                                                                                    $('#customer-modal').modal('hide');
                                                                                                    
                                                                                                    // Optionally refresh the customer select if needed
                                                                                                    if (typeof refreshCustomerSelect === 'function') {
                                                                                                        refreshCustomerSelect(response.customer);
                                                                                                    }
                                                                                                }
                                                                                            },
                                                                                            error: function(xhr) {
                                                                                                let errorMessage = 'Something went wrong!';
                                                                                                
                                                                                                if (xhr.responseJSON && xhr.responseJSON.message) {
                                                                                                    errorMessage = xhr.responseJSON.message;
                                                                                                }
                                                                                                
                                                                                                swal({
                                                                                                    title: "Error!",
                                                                                                    text: errorMessage,
                                                                                                    icon: "error",
                                                                                                    type: "error"
                                                                                                });
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                });
                                                                                
                                                                                // Optional: Function to refresh customer select if needed
                                                                                function refreshCustomerSelect(customer) {
                                                                                    var select = $('#customer_id'); // Adjust selector as needed
                                                                                    var option = select.find('option[value="' + customer.id + '"]');
                                                                                    
                                                                                    if (option.length) {
                                                                                        option.text(customer.customer_name);
                                                                                    }
                                                                                    
                                                                                    // If using bootstrap-select, refresh it
                                                                                    if (select.hasClass('selectpicker')) {
                                                                                        select.selectpicker('refresh');
                                                                                    }
                                                                                }
                                                                                </script>
                                                                                <!-- edit customer -->
                                        
                                        
                                                                            </div>
                                                                            <!-- /.modal-content -->
                                                                        </div>
                                                                        <!-- /.modal-dialog -->
                                        
                                                                    </div>
                                        
                                                                            


                                                                <form action="{{route('item_post')}}" method="post" enctype="multipart/form-data">


@csrf


            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Item Code<span class="required">*</span></label>
                    <input type="text" name="item_code" class="form-control" value="IT-1-0000">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Item Name<span class="required
        ">*</span></label>

                    <input type="text" name="item_name" class="form-control" required="">
                </div>
            </div>
            <div class="col-lg-4 mb-2" style="display:flex;">
                <div class="form-group" >
                    <label class="form-label">Category <span class="required">*</span></label>
                    <input type="hidden" name="category" id="category_id">
                    <div class="input-group mb-3">
                        <select name="catSelect" id="catSelect"
                            class="form-control selectpicker" data-live-search="true" required
                            onchange="setParentValue()">
                            <option value="">-select-</option>
                            @foreach ($category as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#categoryModal"> + </button>
                    </div>
                </div>

                <script>
                    function setParentValue() {
                        var selectedValue = document.getElementById('catSelect').value;
                        document.getElementById('category_id').value = selectedValue;
                    }
                </script>

            </div>
            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Brand</label>
                    <div class="input-group mb-3">
                        <input type="hidden" name="brand" id="brandInput">
                        <select name="brand_id" id="brand_id" class="form-control selectpicker"
                            data-live-search="true" onchange="setbrandValue()">
                            <option value="">-select-</option>
                            @foreach ($brands as $name)
                                <option value="{{ $name->id }}">{{ $name->barndname }}</option>
                            @endforeach

                        </select>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#brandModal"> + </button>
                    </div>
                    <script>
                        function setbrandValue() {
                            var selectElement = document.getElementById('brand_id');
                            var inputElement = document.getElementById('brandInput');
                            var selectedBrand = selectElement.options[selectElement.selectedIndex].value;

                            // Set the selected brand into the input field
                            inputElement.value = selectedBrand;
                        }
                    </script>
                </div>
            </div>
            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Unit<span class="required">*</span></label>
                    <div class="input-group mb-3">
                        <input type="hidden" name="unit" id="unitInput">
                        <select name="unit_id" class="form-control selectpicker"
                            data-live-search="true" required id="unitSelect"
                            onchange="setunitValue()">
                            <option value="">-select-</option>
                            @foreach ($unit as $u)
                                <option value="{{ $u->id }}">{{ $u->unit_name }}</option>
                            @endforeach

                        </select>
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#unitModal"> + </button>
                    </div>
                    <script>
                        function setunitValue() {
                            var selectElement = document.getElementById('unitSelect');
                            var inputElement = document.getElementById('unitInput');
                            var selectedUnit = selectElement.options[selectElement.selectedIndex].value;

                            // Set the selected unit into the input field
                            inputElement.value = selectedUnit;
                        }
                    </script>
                </div>
            </div>


            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">SKU</label>
                    <input type="text" name="sku" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">HSN Code</label>
                    <input type="text" name="hsn_code" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Alert Quantity</label>
                    <input type="number" name="alert_quantity" class="form-control" min="0">
                </div>
            </div>
            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Seller Points</label>
                    <input type="text" name="sellerpoint" class="form-control">
                </div>
            </div>

            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Barcode</label>
                    <input type="text" name="bar_code" class="form-control"
                        onkeypress="return (event.key!='Enter')">
                </div>
            </div>
            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Expire Date</label>

                    <div class="input-group mb-3">
                        <!-- <span class="input-group-text"><i class="bi bi-calendar-date"></i></span> -->
                        <input type="date" name="expiry_date" class="form-control">
                    </div>


                </div>
            </div>
            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="dis" class="form-control"></textarea>

                </div>
            </div>

            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Store Name<span class="required">*</span></label>
                    <input type="hidden" name="store_id" id="storeInput" readonly>
                    <!-- Make it readonly -->
                    <div class="input-group mb-3">
                        <select id="storeSelect" name="" class="form-control selectpicker"
                            data-live-search="true" required onchange="store()">
                            <option value="">-Select-</option>
                            @foreach ($store as $s)
                                <option value="{{$s->id}}" data-name="{{$s->id}}">
                                    {{$s->store_name}}
                                </option>
                                <!-- Assuming you have an 'id' field -->
                            @endforeach
                        </select>
                    </div>

                    <script>
                        function store() {
                            var selectElement = document.getElementById('storeSelect');
                            var inputElement = document.getElementById('storeInput');
                            var storeIdElement = document.getElementById('storeId');

                            var selectedOption = selectElement.options[selectElement.selectedIndex];
                            var selectedId = selectedOption.value; // Store ID
                            var selectedName = selectedOption.getAttribute('data-name'); // Store Name

                            // Set the selected store name and ID into the respective input fields
                            inputElement.value = selectedName;
                            storeIdElement.value = selectedId;
                        }
                    </script>

                    <input type="hidden" id="storeId" class="form-control" readonly>
                </div>
            </div>


        </div>
        <hr class="solid">
        <div class="row">
            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label"> Discount Type</label>
                    <input type="hidden" name="discount_type" id="typeInput">
                    <select name="discount_type" class="form-control" id="typeSelect"
                        onchange="settypeValue()" style="height:50px;">
                        <option value="Percentage">Percentage(%)</option>
                        <option value="Fixed">Fixed</option>
                    </select>
                </div>
                <script>
                    function settypeValue() {
                        var selectElement = document.getElementById('typeSelect');
                        var inputElement = document.getElementById('typeInput');
                        var selectedType = selectElement.options[selectElement.selectedIndex].value;

                        // Set the selected discount type into the input field
                        inputElement.value = selectedType;
                    }
                </script>
            </div>
            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Discount</label>
                    <input type="text" name="discount" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Image</label>
                    <input type="file" name="picture" class="form-control">
                    <span style="font-size: 10px;color: #B03838;">Max Width/Height: 1000px *
                        1000px
                        & Size: 1MB</span>
                </div>
            </div>
        </div>

        <hr class="solid">
        <div class="row">



            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Purchase Price<span
                            class="required">*</span></label>
                    <input type="text" name="purchase_value" id="purchase_price"
                        class="form-control" placeholder="Total Price with Tax Amount"
                        required="" onchange="purchaseprice()">
                </div>
            </div>


            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Tax<span class="required">*</span></label>

                    <div class="input-group mb-3">
                        <input type="hidden" name="tax" id="taxInput">

                        <select name="tax_id" id="tax_id" class="form-control selectpicker"
                            data-live-search="true" required onchange="purchaseprice()">
                            <option value="">Select Tax</option>
                            @foreach ($tax as $t)
                                <option value="{{ $t->id }}" data-percentage="{{ $t->per }}">
                                    {{ $t->taxname }}
                                </option>
                            @endforeach
                        </select>


                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#taxModal"> + </button>
                    </div>
                </div>
            </div>





            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label"> Tax Type<span class="required">*</span></label>

                    <select name="tax_type" id="tax_type" class="form-control"
                        onchange="purchaseprice()" style="height:50px;">
                        <option value="Inclusive">Inclusive</option>
                        <option value="Exclusive">Exclusive</option>
                    </select>
                </div>
            </div>



            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Price<span class="required">*</span></label>
                    <input type="text" name="price" id="price" class="form-control"
                        placeholder="Price of the Item without Tax" required="" readonly
                        style="background-color: #ddd;">
                </div>
            </div>



            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Profit Margin(%) <span class="required"
                            data-bs-container="body" data-bs-toggle="popover"
                            data-bs-placement="top" data-bs-content="Based on Purchase Price."
                            title="Info"><i class="bi bi-info-circle"></i></span></label>
                    <input type="text" name="profit_margin" id="profit_margin"
                        class="form-control" placeholder="Profit in %"
                        onchange="purchaseprice()">
                </div>
            </div>
            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Sales Price</label>
                    <input type="text" name="sales_price" id="sales_price" class="form-control"
                        placeholder="Sales Price" required="">
                </div>
            </div>



            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">MRP <span class="required"
                            data-bs-container="body" data-bs-toggle="popover"
                            data-bs-placement="top" data-bs-content="Maximum Retail Price."
                            title="Info"><i class="bi bi-info-circle"></i></span></label>
                    <input type="text" name="mrp" class="form-control"
                        placeholder="Maximum Retail Price">
                </div>
            </div>

            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label">Show on app? <span class="required"
                            data-bs-container="body" data-bs-toggle="popover"
                            data-bs-placement="top"
                            data-bs-content="On this togle to show this product in mobile app."
                            title="Info"><i class="bi bi-info-circle"></i></span></label>
                    <div class="form-check form-switch">
                        <input type="hidden" name="app" id="apneed" value="none_app">
                        <input class="form-check-input" type="checkbox" role="switch"
                            id="inapp_view" name="inapp_view" value="1"
                            onchange="showappprice()">

                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var apneed = document.getElementById('apneed');
                    var toggle = document.getElementById('toggle-one');
                    toggle.addEventListener('change', function () {
                        if (toggle.checked) {
                            apneed.value = "app";
                        }
                    });
                });
            </script>
            <script>
                function showappprice() {

                    var x = document.getElementById("fixed");
                    if (x.style.display === "none") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }

                }

            </script>

            <div id="fixed" class="col-lg-4 mb-2" style="display:none">
                <div class="form-group">
                    <label class="form-label">App Price <span class="required"
                            data-bs-container="body" data-bs-toggle="popover"
                            data-bs-placement="top" data-bs-content="Price of the item in app."
                            title="Info"><i class="bi bi-info-circle"></i></span></label>
                    <input type="text" name="pp_Price" class="form-control"
                        placeholder="Price to show on app">
                </div>
            </div>


        </div>
        <hr class="solid">
        <div class="row">
            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <input type="hidden" name="ware_house" id="warehouseInput">
                    <label class="form-label">Warehouse<span class="required">*</span></label>

                    <select name="warehouse_id" class="form-control selectpicker"
                        data-live-search="true" required onchange="warehousechange()"
                        id="warehouseSelect">
                        <option value="">-Select-</option>
                        @foreach ($ware as $house)
                            <option value="{{ $house->id }}" data-name="{{$house->id}}">
                                {{ $house->name }}
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>
            <script>
                function warehousechange() {
                    var selectElement = document.getElementById('warehouseSelect');
                    var inputElement = document.getElementById('warehouseInput');
                    inputElement.value = selectElement.value;
                }
            </script>
            <div class="col-lg-4 mb-2">
                <div class="form-group">
                    <label class="form-label"> Opening Stock </label>
                    <input type="text" name="opening_stock" class="form-control" value="0">
                </div>
            </div>
        </div>
        <button name="save" type="submit" class="btn btn-primary">Save</button>
    </div>
    <hr class="solid">
    <div class="card-header">

        <a></a>

    </div>

</div>

</form>

<script>
        function updatePrice() {
            // Get the purchase price and tax percentage
            var purchasePrice = parseFloat(document.getElementById('purchasePrice').value) || 0;
            var taxPercentage = parseFloat(document.getElementById('tax-percentage').value) || 0;

            // Calculate the price without tax
            var priceWithoutTax = purchasePrice / (1 + (taxPercentage / 100));

            // Update the price field
            document.getElementById('price').value = priceWithoutTax.toFixed(2); // Format to two decimal places

            // Set the sales price equal to the purchase price
            document.getElementById('sales_price').value = purchasePrice.toFixed(2); // Set sales price
        }

        // Update the price when the purchase price changes
        document.getElementById('purchasePrice').addEventListener('input', updatePrice);
        document.getElementById('tax-select').addEventListener('change', function () {
            // Update the tax percentage input when the tax select changes
            var selectedOption = this.options[this.selectedIndex];
            var percentage = selectedOption.getAttribute('data-percentage') || 0;
            document.getElementById('tax-percentage').value = percentage;
            updatePrice(); // Recalculate the price whenever tax percentage changes
        });



        function purchaseprice() {
            var price = document.getElementById("price").value;
            // var tax_id = document.getElementById("tax_id").value;



            var taxid = document.getElementById("tax_id");
            var taxoption = taxid.options[taxid.selectedIndex];
            var taxvalue = taxoption.getAttribute('data-percentage');



            var purchase_price = document.getElementById("purchase_price").value;
            var tax_type = document.getElementById("tax_type").value;
            var profit_margin = document.getElementById("profit_margin").value;

            //alert(profit_margin);
            var sales_price = document.getElementById("sales_price").value;

            var tax_percentage = taxvalue;

            if (tax_type == "Exclusive") {

                var taxamount = (parseFloat(purchase_price) * (parseFloat(taxvalue) / 100));
                var pricewithouttax = parseFloat(purchase_price) + parseFloat(taxamount);
                document.getElementById("price").value = pricewithouttax;
                var profit_margin = document.getElementById("profit_margin").value;

                if (profit_margin) {
                    var marginvalue = (purchase_price * profit_margin) / 100;
                    var salePrice = parseFloat(purchase_price) + parseFloat(marginvalue);
                } else {
                    var salePrice = purchase_price;
                }
                document.getElementById("sales_price").value = salePrice;


            } else {

                // GST Amount = Amount Including GST - (Amount Including GST / (1 + (Tax Rate/100)))
                // Amount Excluding GST = Amount Including GST - GST Amount
                var taxamount = parseFloat(purchase_price) - (parseFloat(purchase_price) / (1 + tax_percentage / 100));
                var pricewithouttax = parseFloat(purchase_price) - parseFloat(taxamount);
                document.getElementById("price").value = pricewithouttax;
                var profit_margin = document.getElementById("profit_margin").value;

                if (profit_margin) {
                    var marginvalue = (purchase_price * profit_margin) / 100;
                    var salePrice = parseFloat(purchase_price) + parseFloat(marginvalue);
                } else {
                    var salePrice = purchase_price;
                }
                document.getElementById("sales_price").value = salePrice;
            }


        }


    </script>
   
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- **********************MODALS***************** -->

                                                        <!-- <div class="col-sm-3">
                                        <button type="button" id="pay_all" name="" class="btn bg-purple btnhold btn-block btn-flat btn-lg Alt_a" title="By Cash &amp; Save [Alt+A]">
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            Pay All
                                        </button>
                                    </div> -->




                                                    </div>
                                                </div>
                                            </div>

                                            
    <div class="content-wrapper" style="min-height: 602px">

        <div class="wrapper" style="height: auto">
            <header class="main-header">
                <nav class="navbar navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="dashboard" class="navbar-brand"><b class="hidden-xs">GreenBiller</b></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">

                            <ul class="nav navbar-nav">

                                <li class="">
                                    <a href="{{route('add_sales_biller')}}"><i
                                            class="fa fa-calculator text-yellow"></i><span> New
                                            Invoice</span></a>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav">
                                <li class="">
                                    <a href="{{route('saleslist')}}"><i class="fa fa-list text-yellow"></i> <span>Sales
                                            List</span></a>
                                </li>


                            </ul>


                        </div>
                        <!-- /.navbar-collapse -->
                        <!-- Navbar Right Menu -->
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <!-- User Account Menu -->
                                <li class="dropdown user user-menu">
                                    <a href="javavoid:main();" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="">Hold List</span>
                                        4
                                        <span class="label label-danger hold_invoice_list_count">4</span>
                                    </a>

                                    <ul class="dropdown-menu dropdown-width-lg">
                                        <!-- Menu Body -->
                                        <li class="user-body">
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <table class="table table-bordered" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Date</th>
                                                                <th>Ref.ID</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody id="hold_invoice_list">

                                                            <tr>
                                                                <td colspan="4" class="text-danger text-center">
                                                                    No Records Found
                                                                </td>
                                                            </tr>


                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                            <!--</li>-->
                                        </li>
                                    </ul>
                                </li>

                                <!-- Messages: style can be found in dropdown.less-->
                                <li class="hidden-xs" id="fullscreen">
                                    <a><i class="fa fa-tv text-white"></i>
                                    </a>
                                </li>
                                <li class="text-center">
                                    <a href="dashboard"><i class="fa fa-dashboard text-yellow"></i><b
                                            class="hidden-xs">Dashboard</b></a>
                                </li>

                                <!-- User Account Menu -->
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ asset('pos_assets/avatar1.png') }}" class="user-image"
                                            alt="User Image" />
                                        <span class="hidden-xs">{{Auth::user()->name}}</span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <!-- User image -->
                                        <li class="user-header">
                                            <img src="{{ asset('pos_assets/avatar1.png') }}" class="img-circle"
                                                alt="User Image" />
                                            <p>
                                                {{Auth::user()->name}}
                                                <!-- <small>Year 2023</small> -->
                                                <small class="text-uppercase text-bold">Role:
                                                    {{Auth::user()->role}}</small>
                                            </p>
                                        </li>
                                        <!-- Menu Body -->
                                        <!-- Menu Footer-->
                                        <!-- <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="logout" class="btn btn-default btn-flat">Sign out</a>
                                            </div>
                                        </li> -->
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-custom-menu -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
            </header>


            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <!-- form start -->
                            <div class="modal fade" id="customer-modal" tabindex="-1">

                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header header-custom">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <label aria-hidden="true">×</label>
                                            </button>
                                            <h4 class="modal-title text-center">Edit Customer</h4>
                                        </div>

                                        <form id="customer_edit">
                                            @csrf
                                            <input type="hidden" id="id" name="id">
                                            <div class="modal-body" style="padding: 80px;">
                                                <div>
                                                    <div class="pt-4">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Customer Name<span
                                                                            class="required">*</span></label>
                                                                    <input type="text" name="customer_name"
                                                                        class="form-control form-control-sm" required
                                                                        id="customer_name">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Mobile<span
                                                                            class="required">*</span></label>
                                                                    <input type="text" name="mobile"
                                                                        class="form-control form-control-sm" required
                                                                        id="mobile">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Email</label>
                                                                    <input name="email" type="email"
                                                                        class="form-control form-control-sm" id="email">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">GST Number</label>
                                                                    <input type="text" name="gstin"
                                                                        class="form-control form-control-sm"
                                                                        id="gst_no">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">TAX Number</label>
                                                                    <input type="text" name="tax_number"
                                                                        class="form-control form-control-sm"
                                                                        id="tax_number">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Credit Limit</label>
                                                                    <input type="text" name="credit_limit"
                                                                        class="form-control form-control-sm"
                                                                        value="-1.000" id="credit">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Previous Due</label>
                                                                    <input type="text" name="opening_balance"
                                                                        class="form-control form-control-sm"
                                                                        value="0.000" id="previous_due">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <h4 class="card-title"
                                                                style="margin-bottom: 20px !important;">
                                                                <i class="flaticon-381-fast-forward"></i> Address
                                                                Details
                                                            </h4>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Address</label>
                                                                    <textarea name="address" id="address"
                                                                        class="form-control form-control-sm"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">City</label>
                                                                    <input type="text" name="city" id="city"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">State</label>
                                                                    <input type="text" name="state" id="state"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Postcode</label>
                                                                    <input type="text" name="postcode" id="postcode"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="country_name"
                                                                        id="countryInput">
                                                                    <label class="form-label">Country</label>
                                                                    <select name="country_id" id="countrySelect"
                                                                        class="form-control form-control-sm selectpicker"
                                                                        data-live-search="true"
                                                                        onchange="document.getElementById('countryInput').value = this.value;">
                                                                        <option id="country">-SELECT COUNTRY -</option>
                                                                        @foreach ($country as $c)
                                                                            <option value="{{ $c->id }}">{{ $c->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <h4 class="card-title"
                                                                style="margin-bottom: 20px !important;">
                                                                <i class="flaticon-381-fast-forward"></i> Shipping
                                                                Address
                                                            </h4>
                                                            <div class="col-lg-12 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Copy Address ?</label>
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            role="switch" id="same" name="same"
                                                                            onchange="sameasabove()">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Address</label>
                                                                    <textarea name="address_shipping"
                                                                        id="address_shipping"
                                                                        class="form-control form-control-sm"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">City</label>
                                                                    <input type="text" name="city_shipping"
                                                                        id="city_shipping"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">State</label>
                                                                    <input type="text" name="state_shipping"
                                                                        id="state_shipping"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Postcode</label>
                                                                    <input type="text" name="postcode_shipping"
                                                                        id="postcode_shipping"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="shipping_country"
                                                                        id="scountryInput">
                                                                    <label class="form-label">Country</label>
                                                                    <select name="country_id_shipping"
                                                                        id="scountrySelect"
                                                                        class="form-control form-control-sm selectpicker"
                                                                        data-live-search="true"
                                                                        onchange="document.getElementById('scountryInput').value = this.value;">
                                                                        <option id="ship_country">-SELECT COUNTRY-
                                                                        </option>
                                                                        @foreach ($country as $c)
                                                                            <option value="{{ $c->id }}">{{ $c->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            function sameasabove() {
                                                                if (document.getElementById("same").checked) {
                                                                    document.getElementById("address_shipping").value = document.getElementById("address").value;
                                                                    document.getElementById("city_shipping").value = document.getElementById("city").value;
                                                                    document.getElementById("state_shipping").value = document.getElementById("state").value;
                                                                    document.getElementById("postcode_shipping").value = document.getElementById("postcode").value;
                                                                    document.getElementById("scountryInput").value = document.getElementById("countryInput").value;
                                                                } else {
                                                                    document.getElementById("address_shipping").value = "";
                                                                    document.getElementById("city_shipping").value = "";
                                                                    document.getElementById("state_shipping").value = "";
                                                                    document.getElementById("postcode_shipping").value = "";
                                                                    document.getElementById("scountryInput").value = "";
                                                                }
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="pt-4">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Price Level Type</label>
                                                                    <script>
                                                                        function pricelevel() {
                                                                            document.getElementById("pricelevelInput").value = document.getElementById('pricelevelSelect').value;
                                                                        }
                                                                    </script>
                                                                    <input type="text" name="price_level_type_value"
                                                                        id="pricelevelInput">
                                                                    <select name="price_level_type"
                                                                        id="pricelevelSelect"
                                                                        class="form-control form-control-sm selectpicker"
                                                                        data-live-search="true" onchange="pricelevel()">
                                                                        <option value="" id="price_level"></option>
                                                                        <option value="Increase" data-tokens="0">
                                                                            Increase</option>
                                                                        <option value="Decrease" data-tokens="1">
                                                                            Decrease</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Price Level</label>
                                                                    <input type="text" name="price_level"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>

                                        </form>

                                        <!-- edit customer -->


                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->

                            </div>






                            <form  method="POST" action="{{ route('extimate_create.store') }}" class="form-horizontal" >


                                @csrf
                                <!-- models -->
                                <!-- customer model start-->






                                <!-- customer model end-->
                                <!-- discount model start-->

                                <!-- **********************MODALS***************** -->
                                <div class="modal fade" id="discount-modal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title">Set Discount on All</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="discount_to_all_input">Discount</label>
                                                                <input type="text" class="form-control"
                                                                    id="discount_to_all_amt" name="discount_to_all_amt"
                                                                    placeholder="" value="0" oninput="alldiscout()" />


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="discount_type">Discount Type</label>
                                                                <select class="form-control" id="discount_to_all_type"
                                                                    name="discount_to_all_type" onchange="alldiscout()">
                                                                    <option value="Percentage" selected="selected">
                                                                        Percentage%
                                                                    </option>
                                                                    <option value="in_fixed">Fixed</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary discount_update"
                                                    data-dismiss="modal">
                                                    Apply
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                <!-- **********************MODALS END***************** -->

                                <!-- discount model End-->




                                <!-- Cash model END-->

                                <!-- Invoice terms start-->
                                <div class="modal fade" id="terms-modal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title">Terms &amp; Conditions</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <textarea class="form-control" id="invoice_terms"
                                                                    name="invoice_terms"
                                                                    placeholder="Enter Invoice Terms and Conditions"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                    Add
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                                <!-- Invoice terms End -->




                                <!-- **********************MODALS END***************** -->



                                <!-- Expire check model END -->




                                <!-- Hold invoice start-->
                                <div class="modal fade" id="hold-modal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title">Hold Invoice ?</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h1>Same Reference will replace the old list if exist!!</h1>
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    name="hold_reference_no" id="hold_reference_no"
                                                                    placeholder="Please Enter Reference Number!">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="submit" name="hold_pos" class="btn btn-danger">
                                                    OK
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                                <!-- Hold invoice End -->
                                <!-- models end -->


                                <div class="box-body">
                                    <!-- Store Code -->

                                    <!-- Store Code end -->

                                    <div class="row">



                                        <div class="col-md-6">

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="input-group" data-toggle="tooltip" title=""
                                                        data-original-title="Warehouse">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-building text-red"></i></span>
                                                        <select class="form-control select2 select2-hidden-accessible"
                                                            id="store_id" name="store_id" style="width: 100%"
                                                            tabindex="-1" aria-hidden="true" onchange="store()">
                                                            <option value="">-Select-</option>
                                                         
                                                                <option value="{{$stores->id}}">{{$stores->store_name}}
                                                                </option>
                                                  
                                                        </select>


                                                    </div>

                                                </div>
                                                <div class="col-md-4">

                                                    <div class="input-group" data-toggle="tooltip" title=""
                                                        data-original-title="Warehouse">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-building text-red"></i></span>
                                                        <select name="sales_type" id="sales_type" class="form-control"
                                                            onchange="store(); notax(this.value)">
                                                            <option value="0">B2B</option>
                                                            <option value="1">B2C</option>
                                                            <option value="2">*</option>
                                                        </select>


                                                    </div>


                                                </div>
                                            </div>




                                        </div>




                                        <div class="col-md-2">
                                            <div class="input-group" data-toggle="tooltip" title=""
                                                data-original-title="Invoice Initial Code">
                                                <span class="input-group-addon"><i class="fa fa-th-list"></i></span>
                                                <input type="text" class="form-control"
                                                    placeholder="Invioce Initial Code" id="prefix" name="prefix"
                                                    value="" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" data-toggle="tooltip" title=""
                                                placeholder="Invioce Number" id="sale_code" name="sale_code" value="" />
                                        </div>
                                    </div>
                                    <script>
                                        function handleSelectChange(value) {
                                            store();
                                            notax(value);
                                        }

                                    </script>

                                    <script>
                                        function notax(value) {
                                            const checkbox = document.getElementById('tax_report');
                                            if (value === "2") {
                                                checkbox.checked = false; // Checked when value is 2
                                            } else {
                                                checkbox.checked = true; // Unchecked otherwise
                                            }
                                        }

                                    </script>
                                    <script>
                                        function store() {

                                            var store_id = document.getElementById('store_id').value;
                                            var sales_type = document.getElementById('sales_type').value;
                                            /*   var tax_report =document.getElementById('tax_report'); */

                                            if (sales_type != '') {
                                                $.ajax({
                                                    type: "GET",
                                                    url: "{{ route('salescode.store') }}",
                                                    data: {
                                                        store_id: store_id,
                                                        sales_type: sales_type
                                                    },
                                                    success: function (response) {
                                                        var data = jQuery.parseJSON(response);
                                                        // var data = JSON.stringify(response);
                                                        // alert(data.newSalescode);
                                                        if (data.newSalesCode == '') {
                                                            document.getElementById('sale_code').value = '0001';
                                                        } else {
                                                            document.getElementById('sale_code').value = data.newSalescode;
                                                        }

                                                        if (data.prefix == '') {
                                                            document.getElementById('prefix').value = ' ';
                                                        } else {
                                                            document.getElementById('prefix').value = data.prefix;
                                                        }

                                                        document.getElementById('store_select').value = store_id;

                                                    },
                                                });



                                            } else {
                                                alert('select  bill type');
                                            }
                                            //alert(store_id);
                                        }
                                    </script>

                                    <!-- row end -->
                                    <br />

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group" data-toggle="tooltip" title=""
                                                data-original-title="Customer">
                                                <span class="input-group-addon pointer" data-toggle="modal"
                                                    data-target=""><i
                                                        class="fa fa-user-plus text-primary fa-lg"></i></span>
                                                <select class="form-control select2 select2-hidden-accessible"
                                                    id="customer_id" name="customer_id" style="width: 100%"
                                                    tabindex="-1" aria-hidden="true" onchange="customercheck()">
                                                    <option value="">-Select-</option>
                                                    @foreach ($customers as $cu)
                                                        <option value="{{$cu->id}}" data-name="{{$cu->customer_name}}"
                                                            data-mobile="{{$cu->mobile}}" data-email="{{$cu->email}}"
                                                            data-gst_number="{{$cu->gst_number}}"
                                                            data-credit="{{$cu->credit_limit}}"
                                                            data-previous_due="{{$cu->previous_due}}"
                                                            data-address="{{$cu->address}}" data-city="{{$cu->city}}"
                                                            data-state="{{$cu->state}}" data-postcode="{{$cu->postcode}}"
                                                            data-country="{{$cu->country}}"
                                                            data-data-ship_country="{{$cu->ship_address}}"
                                                            data-ship_state="{{$cu->ship_state}}"
                                                            data-ship_postcode="{{$cu->ship_postcode}}"
                                                            data-pricelevel_type="{{$cu->price_leveltype}}"
                                                            data-price_level="{{$cu->price_level}}"
                                                            data-tax_number="{{$cu->tax_number}}">{{$cu->customer_name}}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <span id="customer_edit_modal" class="input-group-addon pointer"
                                                    data-toggle="modal" data-target="#customer-modal"><i
                                                        class="fa fa-user-edit text-primary fa-lg"></i></span>
                                            </div>

                                            <script>
                                                function showedit() {
                                                    // Get the selected option element
                                                    var selectElement = document.getElementById('customer_id');
                                                    var customer_id = selectElement.value;


                                                    var customer_name = selectElement.options[selectElement.selectedIndex].getAttribute('data-name');
                                                    var mobile = selectElement.options[selectElement.selectedIndex].getAttribute('data-mobile');
                                                    var email = selectElement.options[selectElement.selectedIndex].getAttribute('data-email');
                                                    var gst_no = selectElement.options[selectElement.selectedIndex].getAttribute('data-gst_number');

                                                    var credit = selectElement.options[selectElement.selectedIndex].getAttribute('data-credit');
                                                    var pre_due = selectElement.options[selectElement.selectedIndex].getAttribute('data-previous_due');
                                                    var address = selectElement.options[selectElement.selectedIndex].getAttribute('data-address');
                                                    var city = selectElement.options[selectElement.selectedIndex].getAttribute('data-city');
                                                    var state = selectElement.options[selectElement.selectedIndex].getAttribute('data-state');
                                                    var country = selectElement.options[selectElement.selectedIndex].getAttribute('data-country');
                                                    var ship_country = selectElement.options[selectElement.selectedIndex].getAttribute('data-ship_country');
                                                    var ship_state = selectElement.options[selectElement.selectedIndex].getAttribute('data-ship_state');
                                                    var ship_postcode = selectElement.options[selectElement.selectedIndex].getAttribute('data-ship_postcode');
                                                    var tax_number = selectElement.options[selectElement.selectedIndex].getAttribute('data-tax_number');
                                                    var price_level_type = selectElement.options[selectElement.selectedIndex].getAttribute('data-pricelevel_type');
                                                    var price_level = selectElement.options[selectElement.selectedIndex].getAttribute('data-price_level');


                                                    if (customer_id === '') {
                                                        swal("Warning!", "Please select a customer", "warning");
                                                    } else {
                                                        $("#customer-modal").modal();
                                                    }
                                                    document.getElementById('id').value = customer_id;
                                                    document.getElementById('customer_name').value = customer_name;
                                                    document.getElementById('mobile').value = mobile;
                                                    document.getElementById('email').value = email;
                                                    document.getElementById('gst_no').value = gst_no;
                                                    document.getElementById('tax_number').value = tax_number;
                                                    document.getElementById('credit').value = credit;
                                                    document.getElementById('previous_due').value = pre_due;
                                                    document.getElementById('address').value = address;
                                                    document.getElementById('state').value = state;
                                                    document.getElementById('country').innerText = country;
                                                    document.getElementById('ship_address').value = ship_country;
                                                    document.getElementById('ship_state').value = ship_state;
                                                    document.getElementById('ship_postcode').value = ship_postcode;
                                                    document.getElementById('price_level_type').value = price_level_type;
                                                    document.getElementById('price_level').value = price_level;

                                                }

                                            </script>
                                            <div class="form-group" style="margin-bottom:0px !important;">

                                                <label for="staticEmail" class="col-sm-4 col-form-label"
                                                    style="padding-top: 6px; color:red;" id="prevdue"></label>

                                                <label for="staticEmail" class="col-sm-4 col-form-label"
                                                    style="padding-top: 6px; color:green;" id="creditlmt"></label>

                                                <input type="text" name="customer_credit_limit"
                                                    id="customer_credit_limit" hidden>
                                            </div>


                                            <script>
                                                function customercheck() {
                                                    var customer_id = document.getElementById('customer_id').value;
                                                    $.ajax({
                                                        type: "GET",
                                                        url: "{{ route('findCustomer') }}",
                                                        data: {
                                                            customer_id: customer_id
                                                        },
                                                        success: function (response) {
                                                            var customerdata = JSON.stringify(response);
                                                            response.forEach(function (customerdata) {
                                                                //alert(customerdata.id);
                                                                document.getElementById('prevdue').innerHTML = 'Previous Due : ' + customerdata.previous_due;
                                                                document.getElementById('creditlmt').innerHTML = 'Credit Limit : ' + customerdata.credit_limit;
                                                                document.getElementById('customer_credit_limit').value = customerdata.credit_limit;


                                                            });


                                                        },
                                                    });


                                                }

                                            </script>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group" data-toggle="tooltip" title=""
                                                data-original-title="Select Items">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="date" class="form-control ui-autocomplete-input"
                                                    name="sales_date" id="dateInput" value="{{ date('Y-m-d') }}" />

                                            </div>
                                        </div>



                                    </div>
                                    <br />
                                    <!-- row end -->
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="input-group" data-toggle="tooltip" title=""
                                                data-original-title="Select Items">
                                                <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                                <span role="status" aria-live="polite"
                                                    class="ui-helper-hidden-accessible"></span>
                                                <input type="text" class="form-control ui-autocomplete-input"
                                                    placeholder="Item name/Barcode/Itemcode" id="search"
                                                    autocomplete="off" oninput="searchitem()"
                                                    onkeypress="return (event.key!='Enter')" />
                                                <span class="input-group-addon pointer show_item_service"
                                                    title="New Item?" data-toggle="modal"
                                                    data-target="#add-item-model"><i
                                                        class="fa fa-plus text-primary fa-lg" ></i></span>
                                            </div>



                                            <div class="dropdown-menu" id="search_rapper" style="min-width: 95%;">
                                            </div>
                                            <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content ui-corner-all"
                                                id="ui-id-1" tabindex="0"
                                                style="display: none; top: 40%; left: 3%;  width: 95%;">
                                            </ul>

                                            <div class="form-group">
                                                <br>
                                                <label class="form-label">Tax Report</label>

                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="tax_report" name="tax_report" value="1" checked>
                                                <label class="form-label">Show Part</label>

                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="show_part" name="show_part" value="1" checked>

                                            </div>
                                            <script>
                                                function notax() {
                                                    if
}


                                            </script>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-group" data-toggle="tooltip" title=""
                                                data-original-title="Customer">
                                                <span class="input-group-addon"><i class="fa fa-info"></i></span>
                                                <input type="text" class="form-control ui-autocomplete-input"
                                                    placeholder=" Reference No " id="item_search" name="re_no" />

                                                </select>


                                            </div>
                                            <!-- <span class="customer_points text-success" style="display: none"></span>
                                    <lable>Previous Due :</lable>
                                    <input type="text" id="totalitemqty_1" name="totalitemqty_1" class="form-control form-control-sm diaplaylabel" readonly value="0"> -->

                                        </div>




                                    </div>
                                    <!-- row end -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-sm-12"
                                                    style="overflow-y: auto;height: 270.4px;border: 1px solid rgb(51, 122, 183);">
                                                    <table
                                                        class="table table-condensed table-bordered table-responsive items_table"
                                                        id="purchase_table">
                                                        <thead class="bg-gray">
                                                            <tr>
                                                                <th width="20%">Item Name</th>
                                                                <th width="10%">Quantity</th>
                                                                <th width="8%">Unit</th>
                                                                <th width="10%">Rate(inc.of.tax)</th>
                                                                <th width="10%">Price/Unit</th>
                                                                <th width="8%">Discount</th>
                                                                <th width="8%">Tax</th>
                                                                <th width="8%">TaxAmount</th>
                                                                <th width="8%">MRP</th>
                                                                <th width="15%">TotalAmount</th>
                                                                <th width="8%">
                                                                    Action
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody
                                                            style=" font-size: 16px;font-weight: bold;overflow: scroll;"
                                                            id="item-results">

                                                     

                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- SMS Sender while saving -->



                                        <div class="col-md-2">

                                            <label class="fa fa-pencil-square-o cursor-pointer"
                                                title="Edit Invoice T&amp;C" data-toggle="modal"
                                                data-target="#terms-modal"></label>



                                            T&amp;C
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer bg-gray">
                                    <div class="row">
                                        <div class="col-md-2 text-right">
                                            <label> Quantity:</label><br />

                                            <input type="text" id="totalitemqty" name="total_qty"
                                                class="form-control form-control-sm" readonly
                                                style="background-color: #ddd; font-size:18px !important; text-align:right"
                                                value="0">

                                        </div>
                                        <div class="col-md-2 text-right">
                                            <label>Subtotal Amount:</label> <br />

                                            <span style="font-size: 19px" class="tot_amt text-bold"
                                                id="subtotal_amt-s"></span>
                                            <input type="text" id="subtotal_amt" name="subtotal"
                                                class="form-control form-control-sm" readonly
                                                style="background-color: #ddd; font-size:18px !important; text-align:right"
                                                oninput="totalamtsum()" value="0">

                                        </div>

                                        <div class="col-md-2 text-right">
                                            <label>Other Charges: <a class="fa fa-pencil-square-o cursor-pointer"
                                                    data-toggle="modal" data-target="#othercharge-modal"></a></label>
                                            <br />

                                            <input type="text" id="other_charges_amt" name="other_charge"
                                                class="form-control form-control-sm" readonly
                                                style="background-color: #ddd; font-size:18px !important; text-align:right"
                                                oninput="totalamtsum()" value="0">


                                        </div>

                                        <div class="modal fade" id="othercharge-modal" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true"></span>
                                                        </button>
                                                        <h4 class="modal-title">Set Other Charges</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="box-body">
                                                                    <div class="form-group">
                                                                        <label for="discount_input">Other Charge</label>
                                                                        <input name="other_charges_input"
                                                                            id="other_charges_input" type="text"
                                                                            class="form-control form-control-sm"
                                                                            oninput="othercharge()" value="0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="box-body">
                                                                    <div class="form-group">
                                                                        <label for="discount_type">Tax</label>
                                                                        <input type="hidden" name="tax" id="taxInput">
                                                                        <select name="othercharges_tax_id"
                                                                            id="othercharges_tax_id"
                                                                            class="form-control selectpicker"
                                                                            data-live-search="true"
                                                                            onchange="othercharge()">

                                                                            <option value="">No Tax</option>
                                                                            @foreach ($tax as $t)
                                                                                <option value="{{ $t->id }}"
                                                                                    data-percentage="{{ $t->per }}">
                                                                                    {{ $t->taxname }}
                                                                                </option>
                                                                            @endforeach
                                                                            <input type="hidden" name="tax_amount"
                                                                                id="tax-percentage"
                                                                                placeholder="Tax Amount" readonly>
                                                                        </select>

                                                                        <input type="hidden" name="tax_type" id=""
                                                                            value="inclusive">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="button" class="btn btn-primary discount_update"
                                                            data-dismiss="modal">
                                                            Update
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                        <div class="col-md-3 text-right">
                                            <label>Total Discount: <a class="fa fa-pencil-square-o cursor-pointer"
                                                    data-toggle="modal" data-target="#discount-modal"></a>
                                            </label><br />

                                            <span style="font-size: 19px" class="tot_disc text-bold"></span>

                                            <input type="text" id="total_discount_amt" name="total_discount_amt"
                                                class="form-control form-control-sm" readonly
                                                style="background-color: #ddd; font-size:18px !important; text-align:right"
                                                value="0">
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <label> Total Amount:</label> <br />

                                            <span style="font-size: 19px" class="tot_grand text-bold"></span>

                                            <input type="text" id="grand_total" name="grand_total"
                                                class="form-control form-control-sm" readonly
                                                style="background-color: #ddd; font-size:18px !important; text-align:right"
                                                value="0">

                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 10px !important;">
                                        <div class="col-md-12 text-right">
                                          
                                            <div class="col-sm-3" style="float: right;">
                                                <button type="submit"
                                                    class="btn btnhold btn-success btn-block btn-flat btn-lg Alt_c"
                                                    title="By Cash &amp; Save [Alt+C]" data-toggle="modal"
                                                    data-target="#cash-payments-modal">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                    Add Extimate
                                                </button>
                                            </div>

                                            <!-- cash model Cash-->

                                            <!-- **********************MODALS***************** -->

                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->









        <!-- SOUND CODE -->
        <!-- Notification sound -->





        <audio id="success">
            <source src="pos_assets/success.mp3" type="audio/mpeg" />
            <source src="pos_assets/success.ogg" type="audio/ogg" />
        </audio>
        <audio id="failed">
            <source src="pos_assets/failed.mp3" type="audio/mpeg" />
            <source src="pos_assets/failed.ogg" type="audio/ogg" />
        </audio>

        <script>
            function playsuccess() {
                document.getElementById("success").play();
            }

            function playfailed() {
                document.getElementById("failed").play();
            }
        </script>



        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>POWERED BY <a href="https://greencreon.com">GREENCREON</a> </b>
            </div>
            <strong>Copyright © Green Biller</strong>
        </footer>
        <!-- Control Sidebar -->
    </div>
    <!-- ./wrapper -->



  

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // AJAX form submission
        $('#saleform').on('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission
            var formData = $(this).serialize(); // Get form data

            $.ajax({
                url: '{{ route('addsale.store') }}',
                method: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                },
                success: function(response) {
                    if (response.success) {
                        $('html').html(response.view); // Replace body content with the new view
                    }
                },
                error: function(xhr) {
                    alert('Something went wrong');
                }
            });
        });
    });
</script>



<script>
    let debounceTimer;
    function searchitem() {
        clearTimeout(debounceTimer);
        
        debounceTimer = setTimeout(() => {
            const search = document.getElementById("search").value;
            const store_id = document.getElementById("store_id").value;
    
            if (!store_id) {
                swal("Warning!", "Please select a store", "warning");
                return;
            }
    
            if (search === '') {
                document.getElementById("ui-id-1").style.display = "none";
                return;
            }
    
            document.getElementById("ui-id-1").style.display = "block";
            document.getElementById("ui-id-1").innerHTML = `<div class="alert alert-info m-2" role="alert">
        <i class="fa fa-spinner fa-spin"></i> Searching...
    </div>`;
    
       
            $.ajax({
                type: "GET",
                url: "{{ route('search-items.store') }}",
                data: {
                    search: search,
                    store_id: store_id
                },
                success: function (response) {
                    const results = response.map(test => {
                        const stockColor = (test.opening_stock < 10) ? 'red' : 'green';
                        return `
                            <li class="ui-menu-item" role="presentation">
                                <a href="javascript:void(0)" onclick="additem(${test.id})" class="ui-corner-all" tabindex="-1" style="display:flex;">
                                    ${test.item_name} [ ${test.part_no} ] 
                                    <p style="color:${stockColor};">( Stock ${test.opening_stock} )</p>
                                </a>
                            </li>`;
                    }).join('');
    
                    document.getElementById("ui-id-1").innerHTML = results || '<li>No results found</li>';
                },
                error: function () {
                    document.getElementById("ui-id-1").innerHTML = "Error loading items.";
                }
            });
        }, 300); // Adjust the delay as necessary
    }
    
    function additem(item_id) {
        document.getElementById("ui-id-1").style.display = "none";
        document.getElementById("search").value = "";
    
        $.ajax({
            type: "GET",
            url: "{{ route('add-item.store') }}",
            data: {
                item_id: item_id,
            },
            success: function (response) {
                const count = $(".itemRow").length;
                let htmlRows = "";
    
                response.forEach(data => {
                            var count = $(".itemRow").length;
                            var htmlRows = "";
                            htmlRows += "<tr>";
    
                            htmlRows += '<td><input name="item_id[]" type="hidden" id="item_id_' +
    
                                count +
                                '" class="form-control form-control-sm itemRow" value="' +
                                data.id +
                                '"> ' +
                                data.item_name + ' <input type="hidden" value="' + data.item_name + '" name="item_name[]"> <input type="hidden" value="' + data.hsn_code + '" name="hsn_code[]"> <input type="hidden" value="' + data.part_no + '" name="part_no[]"> </td>';
    
                            htmlRows += '<td> <div class="input-group input-group-sm"><span class="input-group-btn"> <button type="button" onclick="decrement_qty(1,' + count + ')" class="btn btn-default btn-flat"><i class="fa fa-minus text-danger"></i></button></span> <input name="sales_qty[]" type="text" id="qty_' + count + '" class="form-control no-padding text-center min_width" value="1"  >  <span class="input-group-btn">  <button type="button" onclick="increment_qty(1,' + count + ')" class="btn btn-default btn-flat"><i class="fa fa-plus text-success"></i> </button>  </span> </div> </td>';
                            htmlRows += '<td>';
    
                            // Unit ID exists in the data, pre-select the option in the dropdown
                            htmlRows += '<select class="form-control form-control-sm"  name="unit_id[]" >';
                            htmlRows += '<option value="">select</option>';
                            @if($unit->isNotEmpty())
                                @foreach ($unit as $unitvalue)
                                    htmlRows += '<option value="{{ $unitvalue->id }}" data-name="{{ $unitvalue->unit_name }}">{{ $unitvalue->unit_name }}</option>';
                                @endforeach
                            @else
                                htmlRows += '<option value="">No units available</option>';
                            @endif
                               
                            htmlRows +=
                    '<td> <input name="rate_inc_tax[]" id="rate_inc_tax_' +
                    count +
                    '" type="text" class="form-control form-control-sm" value="" oninput="cal_division(' + count + ')"></td>';
    
                htmlRows +=
                    '<td> <input name="purchase_price[]" id="purchase_price_' +
                    count +
                    '" type="text"  oninput="update_calculation(' +
                    count +
                    ')" class="form-control form-control-sm" value="' +
                    (data.purchase_price ? data.purchase_price : "00") +
                    '"></td>';
                htmlRows += '<td> <input name="discount_amt[]" id="discount_' + count + '" type="text" oninput="cal_division(' + count + ')" class="form-control form-control-sm" value="' + (data.discount ? data.discount : "00") + '"><select class="underselect" name="item_discount_type[]" id="item_discount_type_' + count + '" onchange="cal_division(' + count + ')"><option value="percent">Percent</option><option value="fixed">Fixed</option></select></td>';
                htmlRows += '<td>';
    
                // Tax ID does not exist, show the select dropdown
                htmlRows += '<select name="tax_id[]" id="taxid_' + count + '" class="form-control form-control-sm" onchange="calculatetax(' + count + ');">';
                htmlRows += '<option value="">select</option>';
                @foreach ($tax as $taxvalue)
                    htmlRows += '<option ';
                    if (data['tax_id'] == {{$taxvalue->id}}) {
                        htmlRows += 'selected ';
                    }
                    htmlRows += 'value="{{$taxvalue->id}}" data-id="{{$taxvalue->per}}">{{$taxvalue->taxname}}</option>';
                @endforeach
                htmlRows += '</select>';
                htmlRows += '<input type="text"  id="taxInput_' + count + '"  value="' + data['tax_id'] + '" hidden>';
    
                htmlRows += '</td>';
                htmlRows +=
                    '<td> <input name="tax_amt[]" id="tax_amt_' +
                    count +
                    '" type="text" class="form-control form-control-sm" value="00" readonly style="background-color: #ddd;"></td>';
    
                htmlRows +=
                    '<td><input type="text" id="mrp_' +
                    count +
                    '" value="' +
                    (data.mrp ? data.mrp : "00") +
                    '" name="mrp[]" class="form-control form-control-sm"></td>'
    
                htmlRows +=
                    '<td> <input name="total_amount[]" id="total_amount_' +
                    count +
                    '" type="text" class="form-control form-control-sm total" value="' +
                    (data.purchase_price ? data.purchase_price : '000') +
                    '" readonly style="background-color: #ddd;" oninput="total_sum()" ></td>';
                // htmlRows +=
                //     '<td> <input name="bach_no[]" id="bach_no_' +
                //     count +
                //     '" type="text" class="form-control form-control-sm" ></td>';
                // htmlRows +=
                //     '<td> <input name="expire_date[]" id="expiry_date_' +
                //     count +
                //     '" type="date" class="form-control form-control-sm"></td>';
                htmlRows +=
                    '<td> <button onclick="delete_row(' +
                    count +
                    ')" type="button" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button></td></tr>';
    
                $("#purchase_table").append(htmlRows);
                document.getElementById("totalitemqty").value = (parseFloat(count) + 1);
                document.getElementById('totalitemqty_1').value = (parseFloat(count) + 1);
                totalamtsum()
                calculatingtax(count);
                itemTotal(count);
                total_sum();
                alldiscout();
                
    
            });
                    },
                });
    
            }
    
    
    
            //delecting a row in table
            function delete_row(count) {
    
                var delcol = (parseFloat(count) + 1)
                document.getElementById("purchase_table").deleteRow(delcol);
                var count = $(".itemRow").length;
                var totalitemqty = parseFloat(count) - 1;
                document.getElementById("totalitemqty").innerHTML = totalitemqty;
                document.getElementById("totalitemqty").innerHTML = totalitemqty;
                cal_division(count);
                total_sum();
                alldiscout();
            }
            //increacing quantity
            function increment_qty(value, count) {
                var qty = document.getElementById("qty_" + count).value;
                document.getElementById("qty_" + count).value = parseFloat(qty) + value;
                cal_division(count);
                calculatingtax(count);
                itemTotal(count);
                update_calculation(count);
                total_sum();
                alldiscout();
            }
            //decrecing quantity
            function decrement_qty(value, count) {
                var qty = document.getElementById("qty_" + count).value;
                if (qty != 0) {
                    document.getElementById("qty_" + count).value = parseFloat(qty) - value;
                    cal_division(count);
                    calculatingtax(count);
                    itemTotal(count);
                    update_calculation(count);
                    total_sum();
                    alldiscout();
                }
    
            }
    
            function cal_division(counts) {
                var amt_inc_tax = document.getElementById("rate_inc_tax_" + counts).value;
                var taxid = document.getElementById("taxid_" + counts);
                var taxoption = taxid.options[taxid.selectedIndex];
                var taxvalue = taxoption.getAttribute('data-id');
                var qty = document.getElementById("qty_" + counts).value;
                var purchase_price = (parseFloat(amt_inc_tax) * 100) / (100 + parseFloat(taxvalue));
                document.getElementById("purchase_price_" + counts).value = purchase_price;
                calculatingtax(counts);
                itemTotal(counts);
                total_sum();
                totalamtsum();
                alldiscout();
    
            }
    
            function calculatetax(counts) {
                calculatingtax(counts);
                itemTotal(counts);
                total_sum();
                totalamtsum();
                alldiscout();
            }
    
            function calculatingtax(counts) {
                var taxid = document.getElementById("taxid_" + counts);
                var taxoption = taxid.options[taxid.selectedIndex];
                var taxvalue = taxoption.getAttribute('data-id');
                var qty = document.getElementById("qty_" + counts).value;
                var purchase_price = document.getElementById("purchase_price_" + counts).value;
                var taxamt = ((parseFloat(purchase_price) * parseFloat(qty)) * parseFloat(taxvalue)) / 100
                document.getElementById("tax_amt_" + counts).value = taxamt;
                itemTotal(counts);
                alldiscout();
                total_sum();
                totalamtsum();
    
            }
    
    
            function itemTotal(count) {
    
                // alert('haii');
                var qty = document.getElementById("qty_" + count).value;
                var purchase_price = document.getElementById("purchase_price_" + count).value;
                var taxamt = document.getElementById("tax_amt_" + count).value;
                var discount = document.getElementById("discount_" + count).value;
                var item_discount_type = document.getElementById("item_discount_type_" + count).value;
                if (item_discount_type == 'percent') {
                    var discount_amt = ((parseFloat(purchase_price) * parseFloat(discount)) / 100);
                } else {
                    var discount_amt = discount;
                }
                var itemtotalamt = (((parseFloat(purchase_price) * parseFloat(qty)) + parseFloat(taxamt))) - parseFloat(discount_amt);
                document.getElementById("total_amount_" + count).value = itemtotalamt.toFixed(3);
                total_sum();
                alldiscout();
                totalamtsum();
            }
    
    
            // geting total sum
            function total_sum() {
                // alert('haii');
                var result = document.getElementById("subtotal_amt");
                var item_total,
                    i = 0,
                    total = 0;
                while ((item_total = document.getElementById("total_amount_" + i++))) {
                    item_total.value = item_total.value.replace(/\\D/, "");
                    total = total + parseFloat(item_total.value);
                }
                result.value = total;
                //alert(total);
                document.getElementById("grand_total").value = total;
                //document.getElementById("subtotal_amt-s").innerHTML = total;
                document.getElementById("subtotal_amt").value = total;
                //totaldicount();
                alldiscout();
            }
    
    
    
            function othercharge() {
    
                var other_charges_input = document.getElementById("other_charges_input").value;
                document.getElementById("other_charges_amt").value = other_charges_input;
                var othercharges_tax_id = document.getElementById("othercharges_tax_id").value;
                var othercharges_tax_id = document.getElementById("othercharges_tax_id");
                var otherchargeoption = othercharges_tax_id.options[othercharges_tax_id.selectedIndex];
                var othertaxvalue = otherchargeoption.getAttribute('data-percentage');
    
                if (other_charges_input != "") {
                    var tax_amt = ((other_charges_input * othertaxvalue) / 100);
                    var other_charges_amt = parseFloat(other_charges_input) + parseFloat(tax_amt);
                    document.getElementById("other_charges_amt").value = other_charges_amt;
    
                    total_sum();
    
                } else {
                    //document.getElementById("total_amt").value = 0;
                    var subtotal_amt = document.getElementById("subtotal_amt").value;
                    document.getElementById("total_amt").value = subtotal_amt;
                    total_sum();
                }
    
                alldiscout();
                totalamtsum();
            }
    
    
            function alldiscout() {
    
    
    
                var discount_to_all_input = document.getElementById("discount_to_all_amt").value;
                document.getElementById("total_discount_amt").value = discount_to_all_input;
                var discount_to_all_type = document.getElementById("discount_to_all_type").value;
    
                // alert(discount_to_all_type);
    
                if (discount_to_all_type == 'Percentage') {
                    var subtotal_amt = document.getElementById("subtotal_amt").value;
                    var discount_peramt = ((subtotal_amt * discount_to_all_input) / 100);
                    document.getElementById("total_discount_amt").value = parseFloat(discount_peramt);
                    var subtotal_amt = document.getElementById("subtotal_amt").value;
                    var other_charges_amt = document.getElementById("other_charges_amt").value;
                    var total_amt = (parseFloat(subtotal_amt) + parseFloat(other_charges_amt)) - parseFloat(discount_peramt)
                    document.getElementById("grand_total").value = total_amt;
                } else {
                    document.getElementById("total_discount_amt").value = discount_to_all_input;
                    var subtotal_amt = document.getElementById("subtotal_amt").value;
                    var other_charges_amt = document.getElementById("other_charges_amt").value;
                    var total_amt = (parseFloat(subtotal_amt) + parseFloat(other_charges_amt)) - parseFloat(discount_to_all_input)
                    document.getElementById("grand_total").value = total_amt;
                }
    
                document.getElementById('total_amount_print').value = document.getElementById('grand_total').value;
                totalamtsum()
    
            }
    
    
    
        </script>
    
    
        <script>
            function update_calculation(count) {
                var qty = document.getElementById("qty_" + count).value;
                var purchase_price = document.getElementById("purchase_price_" + count).value;
                var total = parseFloat(purchase_price) * parseFloat(qty);
                document.getElementById("unit_cost_" + count).value = purchase_price;
                document.getElementById("total_amount_" + count).value = total;
                var no = $(".total").length;
                //alert(no);
                total_sum();
                totalamtsum()
            }
        </script>
    
    
    
        <script>
            function totalamtsum() {
    
            }
        </script>
    
        <script>
    
            function unitvalue(count) {
    
                var unitSelect = document.getElementById('unitselect_' + count);
    
                var selectedOption = unitSelect.options[unitSelect.selectedIndex];
    
    
                var gotAttri = selectedOption.getAttribute('data-name');
    
    
                if (gotAttri === 'Ltr') {
                    document.getElementById('totallitters_' + count + '').style.display = "block";
                    document.getElementById('totalnos_' + count + '').style.display = "none";
                }
                else if (gotAttri === 'Nos') {
                    document.getElementById('totalnos_' + count + '').style.display = "block";
                    document.getElementById('totallitters_' + count + '').style.display = "none";
                }
                else {
                    document.getElementById('totalnos_' + count + '').style.display = "none";
                    document.getElementById('totallitters_' + count + '').style.display = "none";
                }
            }
    
        </script>
        <!-- <script>
            function totalamtsum() {
                // alert();
                var subtotal_amt = document.getElementById("subtotal_amt").value
                var other_charges_amt = document.getElementById("other_charges_amt").value;
                var discount_to_all_amt = document.getElementById("discount_to_all_amt").value;
                var round_off_amt = document.getElementById("round_off_amt").value;
    
    
    
                document.getElementById("total_amt").value = subtotal_amt;
    
                alert(subtotal_amt);
            }
        </script> -->
        <script>
            function calculateTotalLiters() {
                const quantity = parseFloat(document.getElementById("quantity").value);
                const litersPerItem = parseFloat(document.getElementById("litersPerItem").value);
    
                if (!isNaN(quantity) && !isNaN(litersPerItem)) {
                    const totalLiters = quantity * litersPerItem;
                    document.getElementById("totalLiters").value = totalLiters.toFixed(2);
                } else {
                    document.getElementById("totalLiters").value = "";
                }
            }
    
            document.getElementById("quantity").addEventListener("input", calculateTotalLiters);
            document.getElementById("litersPerItem").addEventListener("input", calculateTotalLiters);
        </script>
        <script>
            function payselect() {
                var selectElement = document.getElementById('accountSelect');
                var inputElement = document.getElementById('accountInput');
                var selectedType = selectElement.options[selectElement.selectedIndex].value;
    
                // Set the selected discount type into the input field
                inputElement.value = selectedType;
            }
        </script>
    
        <script>
            function accountsselect() {
                var selectElement = document.getElementById('accountsSelect');
                var inputElement = document.getElementById('accountsInput');
                var selectedType = selectElement.options[selectElement.selectedIndex].value;
    
                // Set the selected discount type into the input field
                inputElement.value = selectedType;
            }
        </script>
    
        <script>
            document.getElementById('total_amount_print').value =
                document.getElementById('grand_total').value;
        </script>
    
        <!-- Bootstrap 3.3.6 -->
        <script src="{{ asset('pos_assets/js/bootstrap.min.js') }}"></script>
    
    
        <!-- SlimScroll -->
        <script src="{{ asset('pos_assets/js/jquery.slimscroll.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('pos_assets/js/fastclick.js') }}"></script>
        <!-- Shortcut Keys -->
        <script src="{{ asset('pos_assets/js/shortcuts.js') }}"></script>
        <!-- Select2 -->
        <script src="{{ asset('pos_assets/js/select2.full.min.js') }}"></script>
    
    
        <!-- <script src="pos_assets/js/app.js"></script>  -->
    
        <!--Toastr notification -->
        <script src="{{ asset('pos_assets/js/toastr.js') }}"></script>
        <script src="{{ asset('pos_assets/js/toastr_custom.js') }}"></script>
        <!--Toastr notification end-->
        <!-- bootstrap datepicker -->
        <script src="{{ asset('pos_assets/js/moment.min.js') }}"></script>
        <script src="{{ asset('pos_assets/js/daterangepicker.js') }}"></script>
        <!-- bootstrap datepicker -->
        <script src="{{ asset('pos_assets/js/bootstrap-datepicker.js') }}"></script>
        <!-- Autocomplete -->
        <script src="{{ asset('pos_assets/js/autocomplete.js') }}"></script>
        <!-- Custom JS -->
        <script src="{{ asset('pos_assets/js/special_char_check.js') }}"></script>
        <script src="{{ asset('pos_assets/js/custom.js') }}"></script>
    
        <!-- Pace Loader -->
        <script src="{{ asset('pos_assets/js/pace.min.js') }}"></script>
        <!-- <script type="text/javascript">
            $(document).ajaxStart(function () {
                Pace.restart();
            });
        </script> -->
        <!-- Sweet alert -->
        <script src="{{ asset('pos_assets/js/sweetalert.min.js') }}"></script>
    
        <!-- iCheck -->
        <script src="{{ asset('pos_assets/js/icheck.min.js') }}"></script>
    
        <!-- Initialize Select2 Elements -->
        <script type="text/javascript">
            $(".select2").select2();
        </script>
        <!-- Initialize toggler -->
    
        <!-- Initialize date with its Format -->
    
    
    
        <!-- iCheck -->
        <script src="{{ asset('pos_assets/js/icheck.min.js') }}"></script>
    
        <script src="{{ asset('pos_assets/js/fullscreen.js') }}"></script>
        <script src="{{ asset('pos_assets/js/modals.js') }}"></script>
        <script src="{{ asset('pos_assets/js/modal_item.js') }}"></script>
        <!-- <script src="{{ asset('pos_assets/js/customer_select_ajax.js') }}"></script> -->
    
        <!-- DROP DOWN -->
        <script src="{{ asset('pos_assets/js/bootstrap3-typeahead.min.js') }}"></script>
        <!-- DROP DOWN END-->
    
        <script type="text/javascript">
            var warehouse_module = false;
            warehouse_module = true;
            var store_module = false;
        </script>
        <!-- <script src="pos_assets/js/pos.js"></script> -->
        <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content ui-corner-all" id="ui-id-1" tabindex="0"
            style="display: none"></ul>
    
    </body>
    
    </html>