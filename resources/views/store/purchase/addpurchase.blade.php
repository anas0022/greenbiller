@extends('store/layouts/app')

@section('title', 'Home Page')

<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
@section('content')



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
                                            <option value="">-Select-</option>
                                            @foreach ($store as $s)
                                                <option value="{{$s->id}}" data-name="{{$s->id}}">
                                                    {{$s->store_name}}
                                                </option>
                                                <!-- Assuming you have an 'id' field -->
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
                                    <input type="text" name="purchase_value" id="purchase_price" class="form-control"
                                        placeholder="Total Price with Tax Amount" required=""
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
                                            data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                            data-bs-content="Based on Purchase Price." title="Info"><i
                                                class="bi bi-info-circle"></i></span></label>
                                    <input type="text" name="profit_margin" id="profit_margin" class="form-control"
                                        placeholder="Profit in %" onchange="purchaseprice()">
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
                                        <input class="form-check-input" type="checkbox" role="switch" id="inapp_view"
                                            name="inapp_view" value="1" onchange="showappprice()">

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
                                    <label class="form-label">App Price <span class="required" data-bs-container="body"
                                            data-bs-toggle="popover" data-bs-placement="top"
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

                                    <select name="ware_house" class="form-control selectpicker" data-live-search="true"
                                        required onchange="warehousechange()" id="warehouseSelect">
                                        <option value="">-Select-</option>
                                        @foreach ($ware as $house)
                                            <option value="{{ $house->id }}" data-name="{{$house->id}}">
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $('#item_post').on('submit', function (e) {
        e.preventDefault(); // Prevent the default form submission

        $.ajax({
            url: "{{ route('item_post') }}",
            type: "POST", // Use POST method
            data: $(this).serialize(),
            success: function (response) {
                alert('Data updated successfully');
                location.reload();
            },
            error: function (xhr) {
                alert('An error occurred');
                console.error(xhr.responseText); // Log the error for debugging
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

<div>
    <div class="content-body">

        <div class="container-fluid">



            <div class="row">
                <div class="col-12">

                    <form action="{{route('store_add_purchase')}}" method="post" enctype="multipart/form-data">

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
                                            <label class="form-label">Store Name<span class="required">*</span></label>

                                            <!-- Make it readonly -->
                                            <div class="input-group mb-3">
                                                <select id="store_id" name="store_id" class="form-control "
                                                    required onchange="storeselect()">
                                                   
                                                    @foreach ($store as $s)
                                                        <option value="{{$s->id}}" data-name="{{$s->id}}">
                                                            {{$s->store_name}}
                                                        </option>
                                                        <!-- Assuming you have an 'id' field -->
                                                    @endforeach
                                                </select>
                                            </div>




                                        </div>
                                    </div>
                                    <script>
                                        function storeselect() {

                                            var store_id = document.getElementById('store_id').value;

                                       
                                            $.ajax({
                                                type: "GET",
                                                url: "{{ route('store.purchasecode') }}",
                                                data: {
                                                    store_id: store_id
                                                },
                                                success: function (response) {
                                                
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
                                                    required id="suppSelect" onchange="updateSupplierName()"
                                                    name="supplier_id">
                                                    <option value="">-Select-</option>
                                                    @foreach ($supplier as $s)
                                                        <option value="{{$s->id}}">{{$s->name}}</option>

                                                    @endforeach
                                                </select>

                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#supplierModal"> + </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-2">
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
                                            var inputElement = document.getElementById('suppInput');   // Input field

                                            var selectedValue = selectElement.options[selectElement.selectedIndex].value; // Get selected value (supplier name)

                                            // Set the selected supplier name into the input field
                                            inputElement.value = selectedValue;
                                        }
                                    </script>



                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Purchase Date<span class="required">*</span></label>
                                            <input type="date" name="purchase_date" class="form-control form-control-sm"
                                            value="<?php echo date("Y-m-d"); ?>">
                                        </div>
                                    </div>
                                    <style>

                                    </style>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Bill Number</label>
                                            <span style="display:flex;">
                                                <input type="text" name="bill_no" class="form-control form-control-sm"
                                                    style="  border-bottom-right-radius: 0px;border-top-right-radius: 0px;">
                                                <button class=" btn-primary" id="bill_no"
                                                    style="color:white; padding:5px;  border-bottom-right-radius: 2px;border-top-right-radius: 2px; "><i
                                                        class="fa-solid fa-badge-check"></i></button>
                                            </span>
                                        </div>
                                        <p id="exist" style="display:none; color:red;">Already Existing Purchase Bill
                                        </p>
                                        <p id="not_exist" style="display:none; color:green;">Verification success</p>

                                        <script>
                                            $(document).ready(function () {
                                                $('#bill_no').on('click', function (e) {
                                                    e.preventDefault(); // Prevent form submission

                                                    let bill_no = $('input[name="bill_no"]').val();

                                                    $.ajax({
                                                        url: "{{ route('billno_exist') }}",
                                                        type: "POST",
                                                        data: {
                                                            _token: "{{ csrf_token() }}",
                                                            bill_no: bill_no
                                                        },
                                                        success: function (response) {
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
                                                        error: function () {
                                                            alert('An error occurred. Please try again.');
                                                        }
                                                    });
                                                });
                                            });
                                        </script>

                                    </div>
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Reference No</label>
                                            <input type="text" name="re_no" class="form-control form-control-sm">
                                        </div>
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
                                                        onkeypress="return (event.key!='Enter')" oninput="searchitem()">
                                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#additemModal"> + </button>
                                                </div>

                                                <div class="dropdown-menu" id="search_rapper" style="min-width: 95%;">

                                                </div>


                                            </div>




                                            <div class="table table-responsive" style="width: 100%; color: #fff;">
                                                <table class="table table-hover table-bordered" style="width:100%"
                                                    id="purchase_table">
                                                    <thead class="custom_thead">
                                                        <tr class="bg-primary">
                                                            <th rowspan="2" style="width:15%; color: #fff !important;"
                                                                class="itemRow">Item Name</th>
                                                            <th rowspan="2"
                                                                style="width:15%;min-width: 180px;color: #fff !important;">
                                                                Quantity</th>
                                                            <th rowspan="2" style="width:10%;color: #fff !important;">
                                                                Price/Unit</th>
                                                            <th rowspan="2" style="width:10%;color: #fff !important;">
                                                                Unit</th>
                                                            <th rowspan="2" style="width:10%;color: #fff !important;">
                                                                Discount</th>
                                                            <th rowspan="2" style="width:7.5%;color: #fff !important;">
                                                                Tax
                                                            </th>
                                                            <th rowspan="2" style="width:7.5%;color: #fff !important;">
                                                                Tax Amount</th>
                                                            <th rowspan="2" style="width:7.5%;color: #fff !important;">
                                                                Total
                                                                Amount</th>
                                                            <!--     <th rowspan="2" style="width:10%;color: #fff !important;"> Bach
                                                            No</th>
                                                        <th rowspan="2" style="width:7.5%;color: #fff !important;">
                                                            Expire Date</th> -->
                                                            <th rowspan="2" style="width:5%;color: #fff !important;">
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
                                                        <input type="hidden" name="tax" id="taxInput">
                                                        <select name="othercharges_tax_id" id="othercharges_tax_id"
                                                            class="form-control selectpicker" data-live-search="true"
                                                            required onchange="othercharge()">

                                                            <option value="">Select Tax</option>
                                                            @foreach ($tax as $t)
                                                                <option value="{{ $t->id }}"
                                                                    data-percentage="{{ $t->per }}">
                                                                    {{ $t->taxname }}
                                                                </option>
                                                            @endforeach
                                                            <input type="hidden" name="tax_amount" id="tax-percentage"
                                                                placeholder="Tax Amount" readonly>
                                                        </select>

                                                        <input type="hidden" name="tax_type" id="" value="inclusive">
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
                                                        <label for="" class="col-sm-12 control-label">Discount on
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
                                                        <label for="" class="col-sm-12 control-label">Note</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <textarea name="purchase_note" class="form-control"></textarea>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <script>
                                                function calculateSubtotal() {
                                                    // Select all input fields with the class 'purchase_total'
                                                    var purchaseTotals = document.querySelectorAll('.purchase_total');
                                                    var subtotalInput = document.getElementById('subtotal_amt'); // Select the subtotal input
                                                    let subtotal = 0;

                                                    // Loop through each input field to calculate the subtotal
                                                    purchaseTotals.forEach(function (item) {
                                                        // Parse the value as a float and add to subtotal
                                                        subtotal += parseFloat(item.value) || 0; // Use || 0 to handle NaN cases
                                                    });

                                                    // Update the value of the subtotal input field with the calculated subtotal
                                                    subtotalInput.value = subtotal.toFixed(2); // Format to two decimal places
                                                }
                                            </script>


                                            <table class="col-md-9">
                                                <tbody>
                                                    <tr>
                                                        <th class="text-right" style="font-size: 15px;">Subtotal</th>
                                                        <th class="text-right"
                                                            style="padding-left:10%;font-size: 15px;">
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-2 col-form-label"></label>
                                                                <div class="col-sm-10">

                                                                    <input type="text" id="subtotal_amt" name="subtotal"
                                                                        class="form-control form-control-sm"
                                                                        style="background-color: #ddd; font-size:18px !important;"
                                                                        oninput="totalamtsum()" value="" readonly>
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
                                                                        oninput="totalamtsum()" name="other_charge"
                                                                        readonly>
                                                                </div>
                                                            </div>


                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-right" style="font-size: 15px;">Discount on All
                                                        </th>
                                                        <th class="text-right"
                                                            style="padding-left:10%;font-size: 15px;">
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-2 col-form-label"></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" id="discount_to_all_amt"
                                                                        name="tot_discount_to_all_amt"
                                                                        class="form-control form-control-sm"
                                                                        style="background-color: #ddd;font-size:18px !important;"
                                                                        oninput="totalamtsum()" name="all_discount"
                                                                        readonly>
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
                                                                        oninput="totalamtsum()" readonly>
                                                                </div>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-right" style="font-size: 15px;">Grand Total</th>
                                                        <th class="text-right"
                                                            style="padding-left:10%;font-size: 15px;">
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-2 col-form-label"></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" id="total_amt" name="grand_total"
                                                                        class="form-control form-control-sm" readonly
                                                                        style="background-color: #ddd;font-size:18px !important;">
                                                                </div>
                                                            </div>

                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <script>
                                        function totalamtsum() {
                                            const totalAmt = parseFloat(document.getElementById('total_amt').value);

                                            if (!isNaN(totalAmt)) {
                                                const roundedOffAmt = Math.round(totalAmt);
                                                document.getElementById('round_off_amt').value = roundedOffAmt;
                                            } else {
                                                document.getElementById('round_off_amt').value = '';
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
                                            <input type="text" name="paid_amount" class="form-control form-control-sm">
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
                                                id="accountsSelect" data-live-search="true" onchange="accountsselect()">
                                                <option value="0" data-ttokens="-CREATE ACCOUNT HEAD-">-None-</option>
                                                @foreach ($account as $a)
                                                <option value="{{$a->id}}">{{$a->account_name}}</option>
                                                @endforeach
                                                

                                            </select>

                                        </div>

                                     
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Payment Note</label>
                                            <textarea name="payment_note"
                                                class="form-control form-control-sm"></textarea>

                                        </div>

                                    </div>

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

        // Perform calculation (convert to numbers before multiplying)
        total.value = Number(unit_cost) * Number(qty);
        totalamtsum();
        calculateTotal();
    }

   
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    // searching the item
    function searchitem() {
        var search = document.getElementById("search").value;
        var store_id = document.getElementById("store_id").value;
        //alert(store_id);
        if (store_id == '') {
            alert('Please select the store');
        }
        if (search == '') {
            document.getElementById("search_rapper").style.display = "none";
            document.getElementById("search_rapper").innerHTML = "";
        }

        $.ajax({
            type: "GET",
            url: "{{ route('search-items') }}",
            data: {
                search: search,
                store_id: store_id
            },
            success: function (response) {
                //  var data = jQuery.parseJSON(response)
                // var json_obj = JSON.parse(response);
                var test = JSON.stringify(response);
                //  var data = JSON.parse(response);
                //  alert(test);

                document.getElementById("search_rapper").style.display = "block";
                document.getElementById("search_rapper").innerHTML = "";
                response.forEach(function (test) {
                    var searchs = document.getElementById("search_rapper").innerHTML;
                    //console.log("ID: " + test.id);  // Accessing the `id` field                 
                    document.getElementById("search_rapper").innerHTML = searchs + '<a class="dropdown-item" onclick="additem(' + test.id + ')" href="javascript:void(0)" >' + test.item_name + '</a>';
                });

            },
        });
    }
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
            success: function (response) {
                // document.getElementById("iteamtable").innerHTML = response;
                //var data = jQuery.parseJSON(response);
                var data = JSON.stringify(response);

                response.forEach(function (data) {

                    var count = $(".itemRow").length;
                    var htmlRows = "";
                    htmlRows += "<tr>";
                    htmlRows +=
                        '<td><input name="item_id[]" type="hidden" id="item_id_' +
                        count +
                        '" class="form-control form-control-sm itemRow" value="' +
                        data.id +
                        '" > <input type="hidden" value="' + data.item_name + '" name="item_name[]">' +
                        data.item_name +
                        "</td>";
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
                        (data.purchase_price ? data.purchase_price : "00")+
                        '"></td>';
                    htmlRows += '<td>';
                  
                        // Unit ID exists in the data, pre-select the option in the dropdown
                        htmlRows += '<select class="form-control form-control-sm" onchange="unitvalue(' + count + ');" id="unitselect_' + count + '">';
                        htmlRows += '<option value="" >select</option>';
                        @foreach ($unit as $unitvalue)
                            htmlRows += '<option value="{{$unitvalue->id}}" ' + (data['unit_id'] == {{$unitvalue->id}} ? 'selected' : '') + '>{{$unitvalue->unit_name}}</option>';
                        @endforeach
                        htmlRows += '</select>';
                        htmlRows += '<input type="hidden" name="unit_id[]" id="unitInput_' + count + '" value="' + data['unit_id'] + '" >';
                   
                    htmlRows += '</td>';

                    htmlRows += '<td> <input name="discount_amt[]" id="discount_' + count + '" type="text" class="form-control form-control-sm" value="' + (data.discount ? data.discount : "00")  + '"></td>';

                    htmlRows += '<td>';

                    // Tax ID does not exist, show the select dropdown
                    htmlRows += '<select name="taxid" id="taxid_' + count + '" class="form-control form-control-sm" onchange="calculatetax(' + count + ');">';
                    htmlRows += '<option value="">select</option>';
                    @foreach ($tax as $taxvalue)
                        htmlRows += '<option ';
                        if (data['tax_id'] == {{$taxvalue->id}}) {
                            htmlRows += 'selected ';
                        }
                        htmlRows += 'value="{{$taxvalue->id}}" data-id="{{$taxvalue->per}}">{{$taxvalue->taxname}}</option>';
                    @endforeach
                    htmlRows += '</select>';
                    htmlRows += '<input type="text" name="tax_id[]" id="taxInput_' + count + '"  value="' + data['tax_id'] + '" hidden>';

                    htmlRows += '</td>';



                    htmlRows +=
                        '<td> <input name="tax_amt[]" id="tax_amt_' +
                        count +
                        '" type="text" class="form-control form-control-sm" value="" readonly style="background-color: #ddd;"></td>';
                    //htmlRows +=
                    // '<td> <input name="unit_cost[]" id="unit_cost_' +
                    // count +
                    // '" type="text" class="form-control form-control-sm" value="' +
                    // data.purchase_price +
                    // '" readonly style="background-color: #ddd;" oninput="total_sum()"></td>';
                    htmlRows +=
                        '<td> <input name="total_amount[]" id="total_amount_' +
                        count +
                        '" type="text" class="form-control form-control-sm total" value="' +
                        (data.purchase_price ? data.purchase_price : '00')+
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
                    htmlRows += '<input name="discount_input[]" id="discount_' + count + '" type="text" class="form-control form-control-sm" value="' + data.discount + '" hidden>';
                    htmlRows += "</td></tr>";

                    $("#purchase_table").append(htmlRows);
                    document.getElementById("totalitemqty").value = count;



                    //  alert(count);
                    calculatingtax(count);
                    itemTotal(count);
                    total_sum();
                    totalamtsum();

                });
            },
        });

    }


    //delecting a row in table
    function delete_row(count) {
        document.getElementById("purchase_table").deleteRow(count);
        var count = $(".itemRow").length;
        var totalitemqty = parseFloat(count) - 1;
        document.getElementById("totalitemqty").innerHTML = totalitemqty;

        total_sum();
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


        var taxamt = ((parseFloat(purchase_price) * parseFloat(qty)) * parseFloat(taxvalue)) / 100
        document.getElementById("tax_amt_" + counts).value = taxamt;

        itemTotal(counts);
        total_sum();

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
    }


</script>

<script>
    function total_sum() {
        var othercharge = document.getElementById("other_charges_amt").value;
        var discount_to_all_amt = document.getElementById("discount_to_all_amt").value;

        var result = document.getElementById("subtotal_amt");

        var item_total,
            i = 1,
            total = 0;
        while ((item_total = document.getElementById("total_amount_" + i++))) {
            item_total.value = item_total.value.replace(/\\D/, "");
            total = total + parseFloat(item_total.value);
        }
        result.value = total;
        // alert(total);


        if (othercharge == '') {
            otherchargeamt = 0;
        } else {
            otherchargeamt = othercharge;
        }
        if (discount_to_all_amt == '') {
            discount_to_all_amt1 = 0;
        } else {
            discount_to_all_amt1 = discount_to_all_amt
        }
        var alltotal = (parseFloat(total) + parseFloat(otherchargeamt)) - parseFloat(discount_to_all_amt1)
        document.getElementById("total_amt").value = alltotal;
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
            //document.getElementById("total_amt").value = 0;
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
            var total_amt = (parseFloat(subtotal_amt) + parseFloat(other_charges_amt)) - parseFloat(discount_to_all_input)
            document.getElementById("total_amt").value = total_amt;
        }

        totalamtsum();

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

        // Loop through each purchase price input and calculate the unit cost
        purchasePrices.forEach(function (priceInput, index) {
            var priceValue = parseFloat(priceInput.value) || 0; // Get the price value, or 0 if invalid
            var unitCostInput = unitCosts[index]; // Get the corresponding unit cost input

            // Perform your unit cost calculation (replace with actual formula if needed)
            var unitCostValue = priceValue; // Adjust this if there's a specific calculation needed

            // Set the unit cost value
            unitCostInput.value = unitCostValue.toFixed(2); // Ensures two decimal points
        });
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>