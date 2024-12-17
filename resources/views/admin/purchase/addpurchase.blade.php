@extends('admin/layouts/app')

@section('title', 'Home Page')

<!-- Add these CSS and JS files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="{{ asset('admin-assets/css/toast.css') }}" rel="stylesheet">
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Add after your existing CSS/JS includes at the top -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@section('content')

    @if ($errors->any())
        <script>
            swal({
                title: "Error!",
                text: "{!! implode('\n', $errors->all()) !!}",
                icon: "error",
                type: "error"
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            swal({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success",
                type: "success"
            });
        </script>
    @endif

    <div class="modal fade" id="additemModal" tabindex="-1">


        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form id="item_post">


                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-text d-inline">Add Items </h4>
                            <p>Add/Update Items</p>

                        </div>

                        <div class="card-body">

                            <div class="row">



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
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Category <span class="required">*</span></label>

                                        <div class="input-group mb-3">
                                            <select name="category" id="catSelect" class="form-control selectpicker"
                                                data-live-search="true" required onchange="setParentValue()">
                                                <option value="">-select-</option>
                                                @foreach ($category as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#categoryModal"> + </button>
                                        </div>
                                    </div>



                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Brand</label>
                                        <div class="input-group mb-3">

                                            <select name="brand" id="brand_id" class="form-control selectpicker"
                                                data-live-search="true" onchange="setbrandValue()">
                                                <option value="">-select-</option>
                                                @foreach ($brands as $name)
                                                    <option value="{{ $name->id }}">{{ $name->barndname }}</option>
                                                @endforeach

                                            </select>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#brandModal"> + </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Unit<span class="required">*</span></label>
                                        <div class="input-group mb-3">

                                            <select name="unit" class="form-control selectpicker" data-live-search="true"
                                                required id="unitSelect" onchange="setunitValue()">
                                                <option value="">-select-</option>
                                                @foreach ($unit as $u)
                                                    <option value="{{ $u->id }}">{{ $u->unit_name }}</option>
                                                @endforeach

                                            </select>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#unitModal"> + </button>
                                        </div>
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

                                        <!-- Make it readonly -->
                                        <div class="input-group mb-3">
                                            <select id="storeSelect" name="store_id" class="form-control selectpicker"
                                                data-live-search="true" required onchange="store()">
                                                <select id="storeSelect" name="store_id"
                                                    class="form-control selectpicker" data-live-search="true" required
                                                    onchange="store()">
                                                    <option value="">-Select-</option>
                                                    @foreach ($store as $s)
                                                        <option value="{{ $s->id }}"
                                                            data-name="{{ $s->id }}">
                                                            {{ $s->store_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                        </div>


                                    </div>
                                </div>


                            </div>
                            <hr class="solid">
                            <div class="row">
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label"> Discount Type</label>

                                        <select name="discount_type" class="form-control" id="typeSelect"
                                            onchange="settypeValue()" style="height:50px;">
                                            <option value="Percentage">Percentage(%)</option>
                                            <option value="Fixed">Fixed</option>
                                        </select>
                                    </div>

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
                                        <label class="form-label">Purchase Price<span class="required">*</span></label>
                                        <input type="text" name="purchase_value" id="purchase_price"
                                            class="form-control" placeholder="Total Price with Tax Amount" required=""
                                            onchange="purchaseprice()">
                                    </div>
                                </div>


                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Tax<span class="required">*</span></label>

                                        <div class="input-group mb-3">


                                            <select name="tax" id="tax_id" class="form-control selectpicker"
                                                data-live-search="true" required onchange="purchaseprice()">
                                                <option value="">Select Tax</option>
                                                @foreach ($tax as $t)
                                                    <option value="{{ $t->id }}"
                                                        data-percentage="{{ $t->per }}">
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
                                                data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                                data-bs-content="Based on Purchase Price." title="Info"><i
                                                    class="bi bi-info-circle"></i></span></label>
                                        <input type="text" name="profit_margin" id="profit_margin"
                                            class="form-control" placeholder="Profit in %" onchange="purchaseprice()">
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
                                        <label class="form-label">MRP <span class="required" data-bs-container="body"
                                                data-bs-toggle="popover" data-bs-placement="top"
                                                data-bs-content="Maximum Retail Price." title="Info"><i
                                                    class="bi bi-info-circle"></i></span></label>
                                        <input type="text" name="mrp" class="form-control"
                                            placeholder="Maximum Retail Price">
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Show on app? <span class="required"
                                                data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
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
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var apneed = document.getElementById('apneed');
                                        var toggle = document.getElementById('toggle-one');
                                        toggle.addEventListener('change', function() {
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
                                                data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                                data-bs-content="Price of the item in app." title="Info"><i
                                                    class="bi bi-info-circle"></i></span></label>
                                        <input type="text" name="pp_Price" class="form-control"
                                            placeholder="Price to show on app">
                                    </div>
                                </div>


                            </div>
                            <hr class="solid">
                            <div class="row">
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">

                                        <label class="form-label">Warehouse<span class="required">*</span></label>

                                        <select name="ware_house" class="form-control selectpicker"
                                            data-live-search="true" required onchange="warehousechange()"
                                            id="warehouseSelect">
                                            <option value="">-Select-</option>
                                            @foreach ($ware as $house)
                                                <option value="{{ $house->id }}" data-name="{{ $house->id }}">
                                                    {{ $house->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label"> Opening Stock </label>
                                        <input type="text" name="opening_stock" class="form-control" value="0">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr class="solid">
                        <div class="card-header">

                            <a></a>
                            <button name="save" type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </div>


                </form>


                <!-- edit customer -->


            </div>
            <!-- /.modal-content -->
        </div>
    </div>

    <div class="modal fade" id="supplierModel" tabindex="-1">


        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form id="supplier_post">

                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-text d-inline">Add Suppliers </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Supplier Name<span class="required">*</span></label>
                                        <input type="text" name="supplier_name" class="form-control" required="">
                                        <input type="text" name="supplier_code" class="form-control" readonly
                                            value="" hidden>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Mobile<span class="required">*</span></label>
                                        <input type="text" name="mobile" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">GST Number</label>
                                        <input type="text" name="gstin" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">TAX Number</label>
                                        <input type="text" name="tax_number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Opening Balance</label>
                                        <input type="text" name="opening_balance" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">City</label>
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Postcode</label>
                                        <input type="text" name="postcode" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">State</label>
                                        <input type="text" name="state" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <input type="hidden" name="country" id="countryInput">
                                        <label class="form-label">Store</label>

                                        <select onchange="countryselecting()" name="store_id"
                                            class="form-control selectpicker" data-live-search="true">
                                            <option value="">-Select-</option>
                                            @foreach ($store as $c)
                                                <option value="{{ $c->id }}">{{ $c->store_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <script>
                                        function countryselecting() {
                                            var countryInput = document.getElementById('countryInput');
                                            var countryselect = document.getElementById('countryselect');

                                            countryInput.value = countryselect.value;
                                        }
                                    </script>
                                    <div class="form-group">
                                        <input type="hidden" name="country" id="countryInput">
                                        <label class="form-label">Country</label>

                                        <select id="countryselect" onchange="countryselecting()" name="country_id"
                                            class="form-control selectpicker" data-live-search="true">
                                            <option value="">-Select-</option>
                                            @foreach ($country as $c)
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
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


                <!-- edit customer -->


            </div>
            <!-- /.modal-content -->
        </div>
    </div>

   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @foreach ($serialsGrouped as $itemId => $serials)
        <div class="custom-popup" id="popup-{{ $itemId }}">
            <div class="popup-content">
                <div class="popup-header bg-primary">
                    <h4 class="popup-title">Set Serial Number - Item {{ $itemId }}</h4>
                    <button type="button" class="popup-close" onclick="closePopup({{ $itemId }})">&times;</button>
                    </div>
                <div class="popup-body">
                                    <div class="form-group">
                                        <label for="discount_input">Sl Number</label>
                                        <div class="input-group" style="display: flex; align-items: center;">
                            <input type="hidden" name="item_id" id="item_id_{{ $itemId }}" value="{{ $itemId }}">
                                            <input name="slno" id="slno_{{ $itemId }}" type="text"
                                   class="form-control form-control-sm" value="0" 
                                   style="height:50px;" onkeypress="return (event.key!='Enter')">
                                            <button class="btn btn-primary form-control-sm"
                                                style="height:50px; margin-left: 8px;"
                                    onclick="addSerialNumber({{ $itemId }})" type="button">Add</button>
                                        </div>
                                    </div>

                                    <div id="serialList_{{ $itemId }}">
                        @foreach($serials as $serial)
                                            <div class="serial-item d-flex align-items-center mb-2">
                                                <div class="form-check me-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="serial_{{ $itemId }}_{{ $serial->id }}"
                                                        value="{{ $serial->id }}">
                                                </div>
                                                <input type="text" class="form-control form-control-sm"
                                                    value="{{ $serial->slno }}" readonly>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                <div class="popup-footer">
                    <button type="button" class="btn btn-warning" onclick="closePopup({{ $itemId }})">Close</button>
                    <button type="button" class="btn btn-primary" onclick="slupdate({{ $itemId }})">Save</button>
                </div>
            </div>
        </div>
    @endforeach

    <style>
        .item-serials {
            border: 1px solid #dee2e6;
            border-radius: 4px;
            height: 100%;
        }

        .item-serials .card-header {
            padding: 0.5rem 1rem;
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .item-serials .card-body {
            max-height: 250px;
            overflow-y: auto;
        }

        .serial-item {
            border-bottom: 1px solid #eee;
            padding: 5px;
        }

        .serial-item:last-child {
            border-bottom: none;
        }

        #serialList {
            margin: 0 -0.5rem;
        }

        .serial-item input[type="text"] {
            background-color: #f8f9fa;
        }

        .form-check-input {
            cursor: pointer;
        }
    </style>

    <script>
        $('#item_post').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('item_post') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    alert('Data updated successfully');
                    location.reload();
                },
                error: function(xhr) {
                    alert('An error occurred');
                    console.error(xhr.responseText);
                }
            });
        });
    </script>

    <script>
        $('#supplier_post').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('add.su') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {

                    alert('Data updated successfully');
                    location.reload();
                },
                error: function(xhr) {
                    alert('An error occurred');
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
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
        document.getElementById('tax-select').addEventListener('change', function() {
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
    <!-- Update your script order at the top -->


    <div>
        <div class="content-body">

            <div class="container-fluid">



                <div class="row">
                    <div class="col-12">

                        <form action="{{ route('add_purchase') }}" method="post" enctype="multipart/form-data">

                            @csrf

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-text d-inline"> Purchase </h4>
                                    <p>Add/Update Purchase</p>
                                </div>
                                <div class="card-body">


                                    <div class="row">
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label">Store Name<span
                                                        class="required">*</span></label>

                                                <!-- Make it readonly -->
                                                <div class="input-group mb-3">
                                                    <select id="store_id" name="store_id"
                                                        class="form-control selectpicker" data-live-search="true" required
                                                        onchange="storeselect()">
                                                        <option value="">-Select-</option>
                                                        @foreach ($store as $s)
                                                            <option value="{{ $s->id }}"
                                                                data-name="{{ $s->id }}">{{ $s->store_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>



                                            </div>
                                        </div><!--
                                            <script>
                                                /*   function selectall() {
                                                                                                                                  function storeselect();
                                                                                                                                  function supplierselect();
                                                                                                                              } */
                                                function supplierselect() {
                                                    var storeId = document.getElementById('store_id').value;


                                                    if (!storeId) {
                                                        alert('Please select a store.');
                                                        return;
                                                    }

                                                    $.ajax({
                                                        url: `{{ route('get.suppliers') }}`,
                                                        type: 'GET',
                                                        data: {
                                                            store_id: storeId
                                                        },
                                                        alert('dfs');
                                                        success: function(data) {
                                                            alert(data)
                                                            var data = jQuery.parseJSON(data);
                                                            let supplierSelect = $('#suppSelect');
                                                            supplierSelect.empty();
                                                            supplierSelect.append('<option value="">-Select-</option>');


                                                            $.each(data, function(key, supplier) {
                                                                supplierSelect.append(
                                                                    `<option value="${supplier.id}">${supplier.name}</option>`);
                                                            });

                                                            supplierSelect.selectpicker('refresh');
                                                        },
                                                        error: function(xhr) {
                                                            console.error("Error occurred:", xhr.responseText);
                                                            alert('An error occurred while fetching suppliers.');
                                                        }
                                                    });
                                                }
                                            </script> -->
                                        <script>
                                            function storeselect() {

                                                var store_id = document.getElementById('store_id').value;


                                                $.ajax({
                                                    type: "GET",
                                                    url: "{{ route('purchasecode') }}",
                                                    data: {
                                                        store_id: store_id
                                                    },
                                                    success: function(response) {

                                                        var data = jQuery.parseJSON(response);
                                                        // // var data = JSON.stringify(response);
                                                        // // alert(data.newSalescode);
                                                        if (data.newSalesCode == '') {
                                                            document.getElementById('purchase_code').value = '0001';
                                                        } else {
                                                            document.getElementById('purchase_code').value = data.newSalescode;
                                                        }

                                                        if (data.prefix == '') {
                                                            document.getElementById('prefix').value = ' ';
                                                        } else {
                                                            document.getElementById('prefix').value = data.prefix;
                                                        }

                                                        // document.getElementById('store_select').value = store_id;

                                                    },
                                                });




                                            }
                                        </script>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label">Supplier Name<span
                                                        class="required">*</span></label>
                                                <input type="hidden" name="" id="suppInput">

                                                <div class="input-group mb-3">
                                                    <select class="form-control selectpicker" data-live-search="true"
                                                        required id="suppSelect" name="supplier_id">
                                                        <option value="">-Select-</option>
                                                        @foreach ($supplier as $su)
                                                            <option value="{{ $su->id }}">{{ $su->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#supplierModel"> + </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--     <div class="col-lg-6 mb-2">
                                                <div class="form-group">
                                                    <label class="form-label">Purchase Code <span
                                                            class="required">*</span></label>
                                                    <div class="input-group mb-3" style="display:flex; gap:10px;">
                                                        <input type="text" name="prefix" id="prefix"
                                                            class="form-control form-control-sm" readonly>
                                                        <input type="text" name="purchase_code" id="purchase_code"
                                                            class="form-control form-control-sm" readonly>
                                                    </div>
                                                </div>
                                            </div>
         -->


                                        <script>
                                            function warehouseValue() {
                                                var selectElement = document.getElementById('wareSelect');
                                                var inputElement = document.getElementById('wareInput');
                                                var selectedValue = selectElement.options[selectElement.selectedIndex].value;

                                                // Set the selected warehouse ID into the input field
                                                inputElement.value = selectedValue;
                                            }
                                        </script>


                                        <script>
                                            function updateSupplierName() {
                                                var selectElement = document.getElementById('suppSelect'); // Select dropdown
                                                var inputElement = document.getElementById('suppInput'); // Input field

                                                var selectedValue = selectElement.options[selectElement.selectedIndex]
                                                    .value; // Get selected value (supplier name)

                                                // Set the selected supplier name into the input field
                                                inputElement.value = selectedValue;
                                            }
                                        </script>



                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label">Purchase Date<span
                                                        class="required">*</span></label>
                                                <input type="date" name="purchase_date"
                                                    class="form-control form-control-sm" value="">
                                            </div>
                                        </div>
                                        <style>

                                        </style>

                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label">Reference No</label>
                                                <input type="text" name="re_no"
                                                    class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label">Bill Number</label>
                                                <span style="display:flex;">
                                                    <input type="text" name="bill_no"
                                                        class="form-control form-control-sm"
                                                        style="  border-bottom-right-radius: 0px;border-top-right-radius: 0px;">
                                                    <button class=" btn-primary" id="bill_no"
                                                        style="color:white; padding:5px;  border-bottom-right-radius: 2px;border-top-right-radius: 2px; "><i
                                                            class="fa-solid fa-badge-check"></i></button>
                                                </span>
                                            </div>
                                            <p id="exist" style="display:none; color:red;">Already Existing Purchase
                                                Bill
                                            </p>
                                            <p id="not_exist" style="display:none; color:green;">Verification success</p>

                                            <script>
                                                $(document).ready(function() {
                                                    $('#bill_no').on('click', function(e) {
                                                        e.preventDefault(); // Prevent form submission

                                                        let bill_no = $('input[name="bill_no"]').val();

                                                        $.ajax({
                                                            url: "{{ route('billno_exist') }}",
                                                            type: "POST",
                                                            data: {
                                                                _token: "{{ csrf_token() }}",
                                                                bill_no: bill_no
                                                            },
                                                            success: function(response) {
                                                                if (response.exists) {
                                                                    document.getElementById('exist').style.display = "block";
                                                                    document.getElementById('not_exist').style.display = "none";
                                                                    document.getElementById('bill_no').style.background = "red";
                                                                    document.getElementById('start_billing').style.display = "none";
                                                                } else {
                                                                    document.getElementById('not_exist').style.display = "block";
                                                                    document.getElementById('exist').style.display = "none";
                                                                    document.getElementById('bill_no').style.background = "green";
                                                                    document.getElementById('start_billing').style.display = "block";
                                                                }
                                                            },
                                                            error: function() {
                                                                alert('An error occurred. Please try again.');
                                                            }
                                                        });
                                                    });
                                                });
                                            </script>

                                        </div>
                                    </div>


                                    <hr class="solid">
                                    <div id="start_billing" style="display:none;">
                                        <div class="row">
                                            <div class="col-lg-12 mb-2">
                                                <div class="form-group">

                                                    <div class="input-group custom-select mb-3">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i
                                                                class="bi bi-upc"></i></label>
                                                        <input id="search" type="text"
                                                            placeholder="Item name / Item code / Barcode"
                                                            class="form-control" autocomplete="off"
                                                            onkeypress="return (event.key!='Enter')"
                                                            oninput="searchitem()">
                                                        <button class="btn btn-primary" type="button"
                                                            data-bs-toggle="modal" data-bs-target="#additemModal"> +
                                                        </button>
                                                    </div>

                                                    <div class="dropdown-menu" id="search_rapper"
                                                        style="min-width: 95%;">

                                                    </div>


                                                </div>




                                                <div class="table table-responsive" style="width: 100%; color: #fff;">
                                                    <table class="table table-hover table-bordered" style="width:100%"
                                                        id="purchase_table">
                                                        <thead class="custom_thead">
                                                            <tr class="bg-primary">
                                                                <th rowspan="2"
                                                                    style="width:15%; color: #fff !important;"
                                                                    class="itemRow">Item Name</th>

                                                                @foreach ($logo as $lo)
                                                                    @if ($lo->slno == 1)
                                                                        <th rowspan="2"
                                                                            style="width:5%; color: #fff !important;"
                                                                           >SlNo</th>
                                                                    @endif
                                                                @endforeach
                                                                <th rowspan="2"
                                                                    style="width:15%;min-width: 180px;color: #fff !important;">
                                                                    Quantity</th>
                                                                <th rowspan="2"
                                                                    style="width:10%;color: #fff !important;">
                                                                    Price/Unit</th>
                                                                <th rowspan="2"
                                                                    style="width:10%;color: #fff !important;">
                                                                    Unit</th>
                                                                <th rowspan="2"
                                                                    style="width:10%;color: #fff !important;">
                                                                    Discount</th>
                                                                <th rowspan="2"
                                                                    style="width:7.5%;color: #fff !important;">
                                                                    Tax
                                                                </th>
                                                                <th rowspan="2"
                                                                    style="width:7.5%;color: #fff !important;">
                                                                    Tax Amount</th>
                                                                <th rowspan="2"
                                                                    style="width:7.5%;color: #fff !important;">
                                                                    Total
                                                                    Amount</th>
                                                                <!--     <th rowspan="2" style="width:10%;color: #fff !important;"> Bach
                                                                    No</th>
                                                                <th rowspan="2" style="width:7.5%;color: #fff !important;">
                                                                    Expire Date</th> -->
                                                                <th rowspan="2"
                                                                    style="width:5%;color: #fff !important;">
                                                                    Action
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="item-results">

                                                        </tbody>
                                                    </table>





                                                </div>
                                            </div>
                                        </div>
                                        <hr class="solid">
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="" class="col-sm-4 control-label">Total
                                                            Quantities</label>
                                                        <input class="control-label total_quantity text-success"
                                                            style="font-size: 15pt; border:none;" id="totalitemqty"
                                                            value="0" name="stock">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="" class="col-sm-12 control-label">Other
                                                                Charges</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input name="other_charges_input" id="other_charges_input"
                                                                type="text" class="form-control form-control-sm"
                                                                oninput="othercharge()" value="0">
                                                        </div>
                                                        <div class="col-sm-4 mt-2 mt-sm-0">
                                                            <input type="hidden" name="" id="taxInput">
                                                            <select name="othercharges_tax_id" id="othercharges_tax_id"
                                                                class="form-control selectpicker" data-live-search="true"
                                                                onchange="othercharge()">

                                                                <option value="">Select Tax</option>
                                                                @foreach ($tax as $t)
                                                                    <option value="{{ $t->id }}"
                                                                        data-percentage="{{ $t->per }}">
                                                                        {{ $t->taxname }}
                                                                    </option>
                                                                @endforeach
                                                                <input type="hidden" name="tax_amount"
                                                                    id="tax-percentage" placeholder="Tax Amount" readonly>
                                                            </select>

                                                            <input type="hidden" name="tax_type" id=""
                                                                value="inclusive">
                                                            <script>
                                                                function updateTaxPercentage() {

                                                                    var taxSelect = document.getElementById('tax_id');
                                                                    var selectedOption = taxSelect.options[taxSelect.selectedIndex];


                                                                    var taxName = selectedOption.text;
                                                                    var percentage = selectedOption.getAttribute('data-percentage');

                                                                    document.getElementById('taxInput').value = document.getElementById('tax_id').value;


                                                                    if (percentage) {
                                                                        var sumValue = 1000;
                                                                        var taxAmount = (sumValue * (percentage / 100)).toFixed(2);
                                                                        document.getElementById('tax-percentage').value = taxAmount;
                                                                    } else {
                                                                        document.getElementById('tax-percentage').value = '';
                                                                    }
                                                                }
                                                            </script>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="" class="col-sm-12 control-label">Discount
                                                                on
                                                                All</label>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input name="discount_to_all_input" id="discount_to_all_input"
                                                                type="text" class="form-control form-control-sm"
                                                                oninput="alldiscout()" value="0">
                                                        </div>

                                                        <div class="col-sm-4 mt-2 mt-sm-0">
                                                            <select name="discount_to_all_type"
                                                                class="form-control form-control-sm"
                                                                id="discount_to_all_type" onchange="alldiscouts()">
                                                                <option value="Percentage">Percentage(%)</option>
                                                                <option value="Fixed">Fixed</option>
                                                            </select>
                                                            <input type="hidden" name="discount_to_all_type"
                                                                id="discount_type_input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    function alldiscouts() {

                                                        document.getElementById('discount_type_input').value =
                                                            document.getElementById('discount_to_all_type').value;
                                                    }
                                                </script>




                                                <div class="col-lg-12 mb-2">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for=""
                                                                class="col-sm-12 control-label">Note</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <textarea name="purchase_note" class="form-control"></textarea>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">


                                                <table class="col-md-9">
                                                    <tbody>
                                                        <tr>
                                                            <th class="text-right" style="font-size: 15px;">Subtotal</th>
                                                            <th class="text-right"
                                                                style="padding-left:10%;font-size: 15px;">
                                                                <div class="mb-3 row">
                                                                    <label class="col-sm-2 col-form-label"></label>
                                                                    <div class="col-sm-10">

                                                                        <input type="text" id="subtotal_amt"
                                                                            name="subtotal"
                                                                            class="form-control form-control-sm"
                                                                            style="background-color: #ddd; font-size:18px !important;"
                                                                            oninput="totalamtsum()" value=""
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right" style="font-size: 15px;">Other Charges
                                                            </th>
                                                            <th class="text-right"
                                                                style="padding-left:10%;font-size: 15px;">
                                                                <div class="mb-3 row">
                                                                    <label class="col-sm-2 col-form-label"></label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" id="other_charges_amt"
                                                                            name="other_charges_amt"
                                                                            class="form-control form-control-sm"
                                                                            style="background-color: #ddd; font-size:18px !important;"
                                                                            oninput="totalamtsum()" readonly>
                                                                    </div>
                                                                </div>


                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right" style="font-size: 15px; width: 30%;">
                                                                Discount on All
                                                            </th>
                                                            <th class="text-right"
                                                                style="padding-left:10%;font-size: 15px;">
                                                                <div class="mb-2 row">
                                                                    <label class="col-sm-2 col-form-label"></label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" id="discount_to_all_amt"
                                                                            name="tot_discount_to_all_amt"
                                                                            class="form-control form-control-sm"
                                                                            style="background-color: #ddd;font-size:18px !important;"
                                                                            oninput="totalamtsum()" readonly>
                                                                    </div>
                                                                </div>

                                                            </th>
                                                        </tr>
                                                        <script>
                                                            function totalamtsum() {
                                                                alert();
                                                                var subtotal_amt = document.getElementById("subtotal_amt").value
                                                                var other_charges_amt = document.getElementById("other_charges_amt").value;
                                                                var discount_to_all_amt = document.getElementById("discount_to_all_amt").value;
                                                                var round_off_amt = document.getElementById("round_off_amt").value;



                                                                document.getElementById("total_amt").value = subtotal_amt;

                                                                alert(subtotal_amt);
                                                            }
                                                        </script>
                                                        <tr>
                                                            <th class="text-right" style="font-size: 15px;">GST
                                                            </th>
                                                            <th class="text-right"
                                                                style="padding-left:10%;font-size: 15px;">
                                                                <div class="mb-3 row">
                                                                    <label class="col-sm-2 col-form-label"></label>
                                                                    <div class="col-sm-10"
                                                                        style="display: flex; justify-content: space-between; gap: 2px;">


                                                                        <div class="col-sm-6">

                                                                            CGST
                                                                            <input type="text" id="cgst"
                                                                                name=""
                                                                                class="form-control form-control-sm"
                                                                                style="background-color: #ddd;font-size:18px !important;"
                                                                                readonly>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            SGST
                                                                            <input type="text" id="sgst"
                                                                                name=""
                                                                                class="form-control form-control-sm"
                                                                                style="background-color: #ddd;font-size:18px !important;"
                                                                                readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </th>
                                                        </tr>

                                                        <tr>
                                                            <th class="text-right" style="font-size: 15px;">Grand Total
                                                            </th>
                                                            <th class="text-right"
                                                                style="padding-left:10%;font-size: 15px;">
                                                                <div class="mb-3 row">
                                                                    <label class="col-sm-2 col-form-label"></label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" id="total_amt"
                                                                            name="grand_total"
                                                                            class="form-control form-control-sm" readonly
                                                                            style="background-color: #ddd;font-size:18px !important;"
                                                                            oninput="calculateRoundOff()">
                                                                    </div>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-right" style="font-size: 15px;">Round Off
                                                                <i class="hover-q " data-container="body"
                                                                    data-toggle="popover" data-placement="top"
                                                                    data-content="Go to Site Settings-> Site -> Disable the Round Off(Checkbox)."
                                                                    data-html="true" data-trigger="hover"
                                                                    data-original-title="Do you wants to Disable Round Off ?"
                                                                    title="">
                                                                    <i
                                                                        class="fa fa-info-circle text-maroon text-black hover-q"></i>
                                                                </i>
                                                            </th>
                                                            <th class="text-right"
                                                                style="padding-left:10%;font-size: 15px;">
                                                                <div class="mb-3 row">
                                                                    <label class="col-sm-2 col-form-label"></label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" id="round_off_amt"
                                                                            name="round_off"
                                                                            class="form-control form-control-sm"
                                                                            style="background-color: #ddd;font-size:18px !important;"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                        </tr>

                                                        <script>
                                                            function calculateRoundOff() {

                                                                const grandTotal = parseFloat(document.getElementById('total_amt').value) || 0;


                                                                const roundedTotal = Math.round(grandTotal);


                                                                const roundOff = (roundedTotal - grandTotal).toFixed(2);


                                                                $('#roundoff_amounts').text(roundOff);


                                                                // Update grand total to rounded value
                                                                $('#grand_total').text(roundedTotal.toFixed(2));
                                                            }

                                                            // Call this function whenever grand total is updated
                                                            $('#grand_total').on('DOMSubtreeModified', function() {
                                                                calculateRoundOff();
                                                            });
                                                        </script>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <script>
                                            function totalamtsum() {
                                                const totalAmt = parseFloat(document.getElementById('total_amt').value);

                                                if (!isNaN(totalAmt)) {
                                                    const roundedOffAmt = Math.round(totalAmt);
                                                    document.getElementById('round_off_amts').value = roundedOffAmt;
                                                } else {
                                                    document.getElementById('round_off_amts').value = '';
                                                }
                                            }


                                            function updateTotalAmt(newValue) {
                                                document.getElementById('total_amt').value = newValue;
                                                totalamtsum();
                                            }
                                        </script>
                                        <hr class="solid">

                                        <div class="row" style="background-color: #ddd;">
                                            <h4 style="margin-top: 5px; margin-bottom: 10px;">Make Payment : </h4>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label">Amount</label>
                                                <input type="text" name="paid_amount"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <input type="hidden" name="payment_type" id="accountInput">
                                                <label class="form-label"> Payment Type </label>
                                                <select name="paymenttypes" class="form-control selectpicker"
                                                    data-live-search="true" id="accountSelect" onchange="payselect()">
                                                    <option value="">-Select-</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Card">Card</option>

                                                </select>
                                            </div>
                                            <script>
                                                function payselect() {
                                                    var selectElement = document.getElementById('accountSelect');
                                                    var inputElement = document.getElementById('accountInput');
                                                    var selectedType = selectElement.options[selectElement.selectedIndex].value;

                                                    // Set the selected discount type into the input field
                                                    inputElement.value = selectedType;
                                                }
                                            </script>
                                            <div class="mb-3 col-md-4">
                                                <label class="form-label" for="accountInput">Account</label>

                                                <select name="account" class="form-control selectpicker"
                                                    id="accountsSelect" data-live-search="true"
                                                    onchange="accountsselect()">
                                                    <option value="0" data-ttokens="-CREATE ACCOUNT HEAD-">-None-
                                                    </option>
                                                    @foreach ($account as $a)
                                                        <option value="{{ $a->id }}">{{ $a->account_name }}
                                                        </option>
                                                    @endforeach


                                                </select>

                                            </div>


                                            <div class="mb-3 col-md-12">
                                                <label class="form-label">Payment Note</label>
                                                <textarea name="payment_note" class="form-control form-control-sm"></textarea>

                                            </div>

                                        </div>
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                      
                                        @foreach ($serialsGrouped as $itemId => $serials)
                                            <div class="modal fade" id="slno-modal-{{ $itemId }}" tabindex="-1">
                                                <div class="modal-dialog" style="max-width: 400px;">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h4 class="modal-title">Set Serial Number</h4>
                                                            <button type="button" class="close text-white"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="box-body">
                                                                        <div class="form-group">
                                                                            <label for="discount_input">Sl Number</label>
                                                                            <div class="input-group"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="hidden" name="item_id"
                                                                                    id="item_id_{{ $itemId }}"
                                                                                    value="{{ $itemId }}">
                                                                                <input name="slno"
                                                                                    id="slno_{{ $itemId }}"
                                                                                    type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    value="0" style="height:50px;"
                                                                                    onkeypress="return (event.key!='Enter')">
                                                                                <button
                                                                                    class="btn btn-primary form-control-sm"
                                                                                    style="height:50px; margin-left: 8px;"
                                                                                    onclick="addSerialNumber({{ $itemId }})"
                                                                                    type="button">Add</button>
                                                                            </div>
                                                                        </div>

                                                                        <div id="serialList_{{ $itemId }}">
                                                                            @foreach ($serials as $serial)
                                                                                <div
                                                                                    class="serial-item d-flex align-items-center mb-2">
                                                                                    <div class="form-check me-2">
                                                                                        <input class="form-check-input"
                                                                                            type="checkbox"
                                                                                            id="serial_{{ $itemId }}_{{ $serial->id }}"
                                                                                            value="{{ $serial->id }}">
                                                                                    </div>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        value="{{ $serial->slno }}"
                                                                                        readonly>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning"
                                                                onclick="closeModal({{ $itemId }})" 
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary discount_update"
                                                                onclick="slupdate({{ $itemId }})">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <script>
                                            function openSerialModal(itemId) {
                                                try {
                                                    console.log('Opening modal for item:', itemId);
                                                    const modalElement = document.getElementById(`slno-modal-${itemId}`);

                                                    if (!modalElement) {
                                                        console.error('Modal element not found for item:', itemId);
                                                        return;
                                                    }

                                                    // Make sure Bootstrap is available
                                                    if (typeof bootstrap === 'undefined') {
                                                        console.error('Bootstrap is not loaded');
                                                        return;
                                                    }

                                                    const modal = new bootstrap.Modal(modalElement);
                                                    modal.show();
                                                } catch (error) {
                                                    console.error('Error showing modal:', error);
                                                }
                                            }

                                            function addSerialNumber(itemId) {
                                                const slnoInput = document.getElementById(`slno_${itemId}`);
                                                const serialList = document.getElementById(`serialList_${itemId}`);

                                                const serialNumber = slnoInput.value;
                                                if (serialNumber) {
                                                    const serialDiv = document.createElement('div');
                                                    serialDiv.className = 'serial-item d-flex align-items-center mb-2';
                                                    serialDiv.innerHTML = `
            <div class="form-check me-2">
                <input class="form-check-input" type="checkbox" value="${serialNumber}">
            </div>
            <input type="text" class="form-control form-control-sm" value="${serialNumber}" readonly>
        `;
                                                    serialList.appendChild(serialDiv);
                                                    slnoInput.value = ''; // Clear input after adding
                                                }
                                            }

                                            function slupdate(itemId) {
                                                const selectedSerials = [];
                                                const checkboxes = document.querySelectorAll(`#serialList_${itemId} input[type="checkbox"]:checked`);

                                                checkboxes.forEach(checkbox => {
                                                    selectedSerials.push(checkbox.value);
                                                });

                                                console.log(`Selected serials for item ${itemId}:`, selectedSerials);

                                                // Close the modal
                                                const modal = bootstrap.Modal.getInstance(document.getElementById(`slno-modal-${itemId}`));
                                                modal.hide();
                                            }
                                        </script>
                                        <style>
                                            .serial-item {
                                                border-bottom: 1px solid #eee;
                                                padding: 5px 0;
                                            }

                                            .serial-item:last-child {
                                                border-bottom: none;
                                            }

                                            #serialList {
                                                max-height: 300px;
                                                overflow-y: auto;
                                                padding: 10px;
                                                border: 1px solid #ddd;
                                                border-radius: 4px;
                                                margin-top: 10px;
                                            }
                                        </style>
                                        <script>
                                            function unitvalue(count) {

                                                var unitInput = document.getElementById("unitInput_" + count);
                                                var unitselect = document.getElementById("unitselect_" + count);

                                                unitInput.value = unitselect.value;
                                            }
                                        </script>
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
    </div>

    </div>
    <script>
        function calculateTotal() {
            // Fetch values from the inputs
            var qty = document.getElementById('qty_').value;
            var unit_cost = document.getElementById('unit_cost_').value;
            var total = document.getElementById('total_amount_');




            total.value = Number(unit_cost) * Number(qty);
            totalamtsum();
            calculateTotal();
        }
    </script>



    <script>
        // searching the item
        function searchitem() {
            var search = document.getElementById("search").value;
            var store_id = document.getElementById("store_id").value;
            var searchWrapper = document.getElementById("search_rapper");

            // Check store selection
            if (!store_id) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Store Required',
                    text: 'Please select a store first'
                });
                return;
            }

            // Clear results if search is empty
            if (!search) {
                searchWrapper.style.display = "none";
                searchWrapper.innerHTML = "";
                return;
            }

            // Show loading state
            searchWrapper.style.display = "block";
            searchWrapper.innerHTML = `
            <div class="alert alert-info m-2" role="alert">
                <i class="fa fa-spinner fa-spin"></i> Searching...
            </div>
        `;

            // Make the AJAX request
            $.ajax({
                type: "GET",
                url: "{{ route('search-items') }}",
                data: {
                    search: search,
                    store_id: store_id
                },
                success: function(response) {
                    if (!response.length) {
                        // Show "No items found" message with item name
                        searchWrapper.innerHTML = `
                        <div class="alert alert-danger m-2" role="alert">
                            <i class="fa fa-exclamation-circle"></i> No items found matching "${search}"
                        </div>
                    `;
                        return;
                    }

                    // Build results HTML
                    const resultsHtml = response.map(item => `
                    <a class="dropdown-item" href="#" onclick="additem(${item.id}); return false;">
                        ${item.item_name}
                        ${item.item_code ? `<br><small class="text-muted">${item.item_code}</small>` : ''}
                    </a>
                `).join('');

                    searchWrapper.innerHTML = resultsHtml;
                },
                error: function(xhr) {
                    // Show error message
                    searchWrapper.innerHTML = `
                    <div class="alert alert-danger m-2" role="alert">
                        <i class="fa fa-exclamation-triangle"></i> Error searching for items. Please try again.
                    </div>
                `;
                }
            });
        }

        // Add these styles to improve the search results appearance
        const style = document.createElement('style');
        style.textContent = `
        #search_rapper {
            max-height: 300px;
            overflow-y: auto;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        #search_rapper .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        #search_rapper::-webkit-scrollbar {
            width: 8px;
        }

        #search_rapper::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        #search_rapper::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }
    `;
        document.head.appendChild(style);
    </script>

    <script>
        function additem(item_id) {
            document.getElementById("search_rapper").style.display = "none";
            document.getElementById("search").value = "";

            $.ajax({
                type: "GET",
                // url: "controller/add-item-purchase.php",
                url: "{{ route('add-item') }}",
                data: {
                    item_id: item_id,
                },
                success: function(response) {
                    // document.getElementById("iteamtable").innerHTML = response;
                    //var data = jQuery.parseJSON(response);
                    var data = JSON.stringify(response);

                    response.forEach(function(data) {

                        var count = $(".itemRow").length;
                        var htmlRows = "";
                        htmlRows += "<tr>";
                        htmlRows +=
                            '<td><input name="item_id[]" type="hidden" id="item_id_' +
                            count +
                            '" class="form-control form-control-sm itemRow" value="' +
                            data.id +
                            '" > <input type="hidden" value="' + data.item_name +
                            '" name="item_name[]">' +
                            data.item_name +
                            "</td>";

                      @foreach ($logo as $lo)
                            @if ($lo->slno == 1)
                                htmlRows +=
                                    '<td style="display:flex; justify-content:center; align-items:center; font-size:20px; cursor:pointer;">' +
                                    '<i class="bi bi-list-task" onclick="openPopup(' + data.id + ')" style="cursor:pointer;"></i>' +
                                    '</td>';
                            @endif
                        @endforeach
                      
                    htmlRows += 
                            '<td><div class="input-group input-group-sm mb-3"><button type="button" onclick="decrement_qty(1,' +
                            count +
                            ')" class="input-group-text">-</button><input name="purchase_qty[]" id="qty_' +
                            count +
                            '" type="text" class="form-control form-control-sm" value="1" oninput="update_calculation(' +
                            count +
                            ')"><button type="button" onclick="increment_qty(1,' +
                            count +
                            ')" class="input-group-text">+</button></div></td>';
                        htmlRows +=
                            '<td> <input name="purchase_price[]" id="purchase_price_' +
                            count +
                            '" type="text"  oninput="update_calculation(' +
                            count +
                            ')" class="form-control form-control-sm" value="' +
                            (data.purchase_price ? data.purchase_price : "00") +
                            '"></td>';
                        htmlRows += '<td>';

                        // Unit ID exists in the data, pre-select the option in the dropdown
                        htmlRows +=
                            '<select class="form-control form-control-sm" onchange="unitvalue(' +
                            count + ');" id="unitselect_' + count + '">';
                        htmlRows += '<option value="" >select</option>';
                        @foreach ($unit as $unitvalue)
                            htmlRows += '<option value="{{ $unitvalue->id }}" ' + (data['unit_id'] ==
                                    {{ $unitvalue->id }} ? 'selected' : '') +
                                '>{{ $unitvalue->unit_name }}</option>';
                        @endforeach
                        htmlRows += '</select>';
                        htmlRows += '<input type="hidden" name="unit_id[]" id="unitInput_' + count +
                            '" value="' + data['unit_id'] + '" >';

                        htmlRows += '</td>';

                        htmlRows += '<td>' +
                            '<div class="d-flex flex-column">' +
                            '<input name="discount_amt[]" id="discount_' + count +
                            '" type="text" class="form-control form-control-sm mb-1" value="' +
                            (data.discount ? data.discount : "00") + '" onchange="itemTotal(' + count +
                            ')">' +
                            '<select name="discount_type[]" id="item_discount_type_' + count +
                            '" class="" onchange="itemTotal(' + count + ')">' +
                            '<option value="">Select Type</option>' +
                            '<option value="percent">Percentage</option>' +
                            '<option value="fixed">Fixed</option>' +
                            '</select>' +
                            '</div>' +
                            '</td>';

                        htmlRows += '<td>';

                        // Tax ID does not exist, show the select dropdown
                        htmlRows += '<select name="taxid" id="taxid_' + count +
                            '" class="form-control form-control-sm" onchange="calculatetax(' + count +
                            ');">';
                        htmlRows += '<option value="">select</option>';
                        @foreach ($tax as $taxvalue)
                            htmlRows += '<option ';
                            if (data['tax_id'] == {{ $taxvalue->id }}) {
                                htmlRows += 'selected ';
                            }
                            htmlRows +=
                                'value="{{ $taxvalue->id }}" data-id="{{ $taxvalue->per }}">{{ $taxvalue->taxname }}</option>';
                        @endforeach
                        htmlRows += '</select>';
                        htmlRows += '<input type="text" name="tax_id[]" id="taxInput_' + count +
                            '"  value="' + data['tax_id'] + '" hidden>';

                        htmlRows += '</td>';



                        htmlRows +=
                            '<td> <input name="tax_amt[]" id="tax_amt_' +
                            count +
                            '" type="text" class="form-control form-control-sm" value="" readonly style="background-color: #ddd;" onchange="dividegst(' +
                            count + ')"></td>';

                        htmlRows +=
                            '<td> <input name="total_amount[]" id="total_amount_' +
                            count +
                            '" type="text" class="form-control form-control-sm total" value="' +
                            (data.purchase_price ? data.purchase_price : '00') +
                            '" readonly style="background-color: #ddd;" ></td>';
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
                            ')" type="button" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>';
                        htmlRows +=
                            '<input name="hsn_code[]" id="purchase_price_' +
                            count +
                            '" type="hidden"   class="form-control form-control-sm" value="' +
                            data.hsn_code +
                            '">';
                        htmlRows +=
                            '<input type="hidden" name="available_qty[]" id="available_qty_' +
                            count +
                            '" value="' +
                            data.available_qty +
                            '" hidden>';
                        htmlRows +=
                            '<input name="tax_type[]" type="hidden" id="tax_type_' +
                            count +
                            '" value="' +
                            data.tax_type +
                            '" hidden>';
                        htmlRows +=
                            '<input name="tax_id[]" type="hidden" id="tax_id_' +
                            count +
                            '" value="' +
                            data.tax_id +
                            ' ">';
                        htmlRows +=
                            '<input name="tax_value[]" type="hidden" id="tax_value_' +
                            count +
                            '" value="' +
                            data.tax_value +
                            '" hidden>';
                        htmlRows +=
                            '<input name="description[]" type="hidden" id="description_' +
                            count +
                            '" value="' +
                            data.description +
                            '" hidden >';
                        htmlRows +=
                            '<input name="service_bit[]" type="hidden" id="service_bit_' +
                            count +
                            '" value="' +
                            data.service_bit +
                            '" hidden>';
                        htmlRows +=
                            '<input name="discount_type[]" type="text" id="item_discount_type_' +
                            count +
                            '" value="' +
                            data.discount_type +
                            '" hidden>';
                        htmlRows +=
                            '<input name="" type="hidden" id="item_discount_input_' +
                            count +
                            '" value="' +
                            data.item_discount_input +
                            '" hidden>';
                        htmlRows +=
                            '<input name="profit_margin[]" type="hidden" id="profit_margin_' +
                            count +
                            '" value="' +
                            data.profit_margin +
                            '" hidden>';
                        htmlRows += '<input name="discount_input[]" id="discount_' + count +
                            '" type="text" class="form-control form-control-sm" value="' + data
                            .discount + '" hidden>';
                        htmlRows += "</td></tr>";

                        $("#purchase_table").append(htmlRows);
                        document.getElementById("totalitemqty").value = count;



                        //  alert(count);
                        calculatingtax(count);
                        itemTotal(count);
                        total_sum();

                    });
                },
            });

        }


        //delecting a row in table
        function delete_row(count) {
            var table = document.getElementById("purchase_table");
            var rows = table.getElementsByTagName("tr");
            var rowToDelete = null;

            // Find the row with the matching item ID
            for (var i = 1; i < rows.length; i++) {
                var itemIdInput = rows[i].querySelector(`#item_id_${count}`);
                if (itemIdInput) {
                    rowToDelete = rows[i];
                    break;
                }
            }

            if (rowToDelete) {
                // Remove the row
                rowToDelete.remove();

                // Reindex remaining rows
                reindexRows();

                // Update total item count
                var remainingRows = $(".itemRow").length;
                document.getElementById("totalitemqty").value = remainingRows;

                // Recalculate all totals
                total_sum();
                updateGSTTotals();

                // Update any other dependent calculations
                calculatingtax(count);
                itemTotal(count);
            }
        }
        //increacing quantity
        function increment_qty(value, count) {
            var qty = document.getElementById("qty_" + count).value;
            document.getElementById("qty_" + count).value = parseFloat(qty) + value;
            calculatingtax(count);
            itemTotal(count);
            update_calculation(count);
            total_sum();


        }
        //decrecing quantity
        function decrement_qty(value, count) {
            var qty = document.getElementById("qty_" + count).value;
            if (qty != 0) {
                document.getElementById("qty_" + count).value = parseFloat(qty) - value;

                calculatingtax(count);
                itemTotal(count);

                update_calculation(count);
                total_sum();

            }

        }

        function calculatetax(counts) {
            calculatingtax(counts);
            itemTotal(counts);
            total_sum();
        }

        function calculatingtax(counts) {
            var taxid = document.getElementById("taxid_" + counts);
            var taxoption = taxid.options[taxid.selectedIndex];
            var taxvalue = taxoption.getAttribute('data-id');

            var qty = document.getElementById("qty_" + counts).value;
            var purchase_price = document.getElementById("purchase_price_" + counts).value;

            var taxamt = ((parseFloat(purchase_price) * parseFloat(qty)) * parseFloat(taxvalue)) / 100;
            document.getElementById("tax_amt_" + counts).value = taxamt;

            // Call dividegst after calculating tax
            dividegst(counts);

            itemTotal(counts);
            total_sum();
        }

        function dividegst(count) {

            var taxAmount = parseFloat(document.getElementById("tax_amt_" + count).value) || 0;


            var halfTax = taxAmount / 2;

            updateGSTTotals();
        }

        function updateGSTTotals() {
            // Get all tax amount inputs
            var taxInputs = document.querySelectorAll('input[name="tax_amt[]"]');
            var totalTax = 0;

            // Sum up all tax amounts
            taxInputs.forEach(function(input) {
                totalTax += parseFloat(input.value) || 0;
            });

            // Divide total tax into CGST and SGST
            var cgstAmount = totalTax / 2;
            var sgstAmount = totalTax / 2;

            // Update CGST and SGST fields
            document.getElementById('cgst').value = cgstAmount.toFixed(2);
            document.getElementById('sgst').value = sgstAmount.toFixed(2);
        }

        function itemTotal(count) {

            // alert('haii');
            var qty = document.getElementById("qty_" + count).value;
            var purchase_price = document.getElementById("purchase_price_" + count).value;
            var taxamt = document.getElementById("tax_amt_" + count).value;
            var discount = document.getElementById("discount_" + count).value;


            var item_discount_type = document.getElementById("item_discount_type_" + count).value;

            if (item_discount_type == 'percent') {
                var discount_amt = ((parseFloat(purchase_price) * parseFloat(discount))) / 100;
            } else {
                var discount_amt = discount;
            }

            var itemtotalamt = (((parseFloat(purchase_price) * parseFloat(qty)) + parseFloat(taxamt) - parseFloat(
                discount_amt)));

            document.getElementById("total_amount_" + count).value = itemtotalamt.toFixed(3);

            total_sum();
        }
    </script>

    <script>
        function total_sum() {
            var subtotal = 0;
            var totalTax = 0;

            // Get all rows in the purchase table
            var rows = document.getElementById("purchase_table").getElementsByTagName("tr");

            // Start from index 1 to skip header row
            for (var i = 1; i < rows.length; i++) {
                // Get quantity and purchase price for each row
                var qty = parseFloat(document.getElementById("qty_" + i).value) || 0;
                var purchase_price = parseFloat(document.getElementById("purchase_price_" + i).value) || 0;
                var tax_amt = parseFloat(document.getElementById("tax_amt_" + i).value) || 0;

                // Add to subtotal (price × quantity)
                subtotal += (purchase_price * qty);
                // Add to total tax
                totalTax += tax_amt;
            }


            document.getElementById("subtotal_amt").value = subtotal;


            var othercharge = parseFloat(document.getElementById("other_charges_amt").value) || 0;
            var discount_to_all_amt = parseFloat(document.getElementById("discount_to_all_amt").value) || 0;


            var alltotal = (subtotal + parseFloat(othercharge) + totalTax) - parseFloat(discount_to_all_amt);


            var roundedTotal = Math.round(alltotal);


            var roundingAdjustment = roundedTotal - alltotal;


            document.getElementById("total_amt").value = roundedTotal;

            document.getElementById("round_off_amt").value = roundingAdjustment.toFixed(2);
        }
        totalamtsum();
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
            totalamtsum();
        }
    </script>


    <script>
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

                var subtotal_amt = document.getElementById("subtotal_amt").value;
                document.getElementById("total_amt").value = subtotal_amt;
                total_sum();
            }

            totalamtsum();
        }
    </script>
    <script>
        function alldiscout() {
            var discount_to_all_input = document.getElementById("discount_to_all_input").value;
            document.getElementById("discount_to_all_amt").value = discount_to_all_input;
            var discount_to_all_type = document.getElementById("discount_to_all_type").value;



            if (discount_to_all_type == 'Percentage') {
                var subtotal_amt = document.getElementById("subtotal_amt").value;
                var discount_peramt = ((subtotal_amt * discount_to_all_input) / 100);
                document.getElementById("discount_to_all_amt").value = parseFloat(discount_peramt);
                var subtotal_amt = document.getElementById("subtotal_amt").value;
                var other_charges_amt = document.getElementById("other_charges_amt").value;
                var total_amt = (parseFloat(subtotal_amt) + parseFloat(other_charges_amt)) - parseFloat(discount_peramt)
                document.getElementById("total_amt").value = total_amt;
            } else {
                document.getElementById("discount_to_all_amt").value = discount_to_all_input;
                var subtotal_amt = document.getElementById("subtotal_amt").value;
                var other_charges_amt = document.getElementById("other_charges_amt").value;
                var total_amt = (parseFloat(subtotal_amt) + parseFloat(other_charges_amt)) - parseFloat(
                    discount_to_all_input)
                document.getElementById("total_amt").value = total_amt;
            }
            total_sum();

        }
    </script>


    <script>
        function update_calculation(itemId) {
            // Your existing calculation logic
            unitcost(); // Call unitcost() as part of this function
        }

        function unitcost() {
            // Get all the purchase price and unit cost input elements
            var purchasePrices = document.querySelectorAll('input[name="purchase_price[]"]');
            var unitCosts = document.querySelectorAll('input[name="unit_cost[]"]');



            purchasePrices.forEach(function(priceInput, index) {
                var priceValue = parseFloat(priceInput.value) || 0; // Get the price value, or 0 if invalid
                var unitCostInput = unitCosts[index]; // Get the corresponding unit cost input

                // Perform your unit cost calculation (replace with actual formula if needed)
                var unitCostValue = priceValue; // Adjust this if there's a specific calculation needed

                // Set the unit cost value
                unitCostInput.value = unitCostValue.toFixed(2); // Ensures two decimal points
            });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize all modals
        var modals = document.querySelectorAll('.modal');
        modals.forEach(function(modal) {
            new bootstrap.Modal(modal);
        });
    });
</script>

<script>
    // Initialize modals when document is ready
    document.addEventListener('DOMContentLoaded', function() {
        try {
            // Make sure Bootstrap is loaded
            if (typeof bootstrap === 'undefined') {
                console.error('Bootstrap is not loaded');
                return;
            }

            // Initialize all modals
            var modals = document.querySelectorAll('.modal');
            modals.forEach(function(modalElement) {
                new bootstrap.Modal(modalElement, {
                    keyboard: true,
                    backdrop: true
                });
            });

            console.log('Modals initialized successfully');
        } catch (error) {
            console.error('Error initializing modals:', error);
        }
    });
</script>

<script>
function closeModal(itemId) {
    // Get the modal element
    const modalElement = document.getElementById(`slno-modal-${itemId}`);
    
    // Get the modal instance
    const modal = bootstrap.Modal.getInstance(modalElement);
    
    // Hide the modal
    if (modal) {
        modal.hide();
    }
    
    // Remove backdrop manually if it exists
    const backdrop = document.querySelector('.modal-backdrop');
    if (backdrop) {
        backdrop.remove();
    }
    
    // Remove modal-open class from body
    document.body.classList.remove('modal-open');
    document.body.style.overflow = '';
    document.body.style.paddingRight = '';
}

// Also update your slupdate function
function slupdate(itemId) {
    // Your existing logic here...
    
    // Close modal properly at the end
    closeModal(itemId);
}
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize modals with specific options
        var modals = document.querySelectorAll('.modal');
        modals.forEach(function(modalElement) {
            new bootstrap.Modal(modalElement, {
                backdrop: true,
                keyboard: true,
                focus: true
            });
        });
    });
</script>

<style>
.custom-popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

.custom-popup.show {
    opacity: 1;
}

.popup-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.7);
    background-color: white;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    max-width: 500px;
    width: 95%;
    opacity: 0;
    transition: all 0.3s ease-in-out;
}

.custom-popup.show .popup-content {
    transform: translate(-50%, -50%) scale(1);
    opacity: 1;
}

.popup-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
    margin: -25px -25px 20px;
    background: #4e73df;
    border-radius: 8px 8px 0 0;
}

.popup-title {
    margin: 0;
    color: white;
    font-size: 1.25rem;
    font-weight: 500;
}

.popup-close {
    cursor: pointer;
    background: none;
    border: none;
    font-size: 1.5rem;
    color: white;
    opacity: 0.8;
    transition: opacity 0.2s;
    padding: 0;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.popup-close:hover {
    opacity: 1;
}

.popup-body {
    max-height: 60vh;
    overflow-y: auto;
    padding: 0 5px;
}

.popup-body::-webkit-scrollbar {
    width: 6px;
}

.popup-body::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.popup-body::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 3px;
}

.popup-body::-webkit-scrollbar-thumb:hover {
    background: #555;
}

.popup-footer {
    display: flex;
    justify-content: flex-end;
    padding-top: 20px;
    border-top: 1px solid #eee;
    margin-top: 20px;
    gap: 10px;
}

.popup-footer button {
    padding: 8px 20px;
    border-radius: 5px;
    font-weight: 500;
    transition: all 0.2s;
}

.popup-footer .btn-warning {
    background-color: #f6c23e;
    border-color: #f6c23e;
    color: #fff;
}

.popup-footer .btn-primary {
    background-color: #4e73df;
    border-color: #4e73df;
}

.popup-footer button:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.serial-item {
    background: #f8f9fc;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 8px;
    transition: all 0.2s;
}

.serial-item:hover {
    background: #eaecf4;
}

.form-check-input {
    cursor: pointer;
    width: 18px;
    height: 18px;
}
</style>

<script>
function openPopup(itemId) {
    const popup = document.getElementById(`popup-${itemId}`);
    if (popup) {
        popup.style.display = 'block';
        document.body.style.overflow = 'hidden';
        // Trigger reflow
        popup.offsetHeight;
        // Add show class for animation
        popup.classList.add('show');
    }
}

function closePopup(itemId) {
    const popup = document.getElementById(`popup-${itemId}`);
    if (popup) {
        popup.classList.remove('show');
        // Wait for animation to finish
        setTimeout(() => {
        popup.style.display = 'none';
            document.body.style.overflow = '';
        }, 300);
    }
}

// Update click outside to close with animation
document.addEventListener('click', function(event) {
    const popups = document.querySelectorAll('.custom-popup');
    popups.forEach(popup => {
        if (event.target === popup) {
            const itemId = popup.id.split('-')[1];
            closePopup(itemId);
        }
    });
});

// Add escape key to close
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const popup = document.querySelector('.custom-popup.show');
        if (popup) {
            const itemId = popup.id.split('-')[1];
            closePopup(itemId);
        }
    }
});
</script>
