@extends('store//layouts/app')

@section('title', 'Home Page')

@section('content')

<div class="content-body">

    <!-- row -->
    <div class="container-fluid" style="width:100%; ">



        <div class="tab-pane fade active show" id="general" role="tabpanel"
            style="background-color:white; padding:20px; position:relative;">

            <div class="row">
                @if(session('error'))
                    <script>
                        swal({
                            title: "error!",
                            text: "{{ session('error') }}",
                            icon: "error",  // For SweetAlert version 1, use `type` instead of `icon`
                            type: "error"
                        });
                    </script>
                @endif
                @if(session('success'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "{{ session('success') }}",
                            icon: "success",  // For SweetAlert version 1, use `type` instead of `icon`
                            type: "success"
                        });
                    </script>
                @endif


                <div class="col-12">
                    <form action="{{route('store_item_post')}}" method="post" enctype="multipart/form-data">


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
                                                    @if ($house->type == "system")
                                                        <option value="{{ $house->id }}" data-name="{{ $house->id }}">
                                                            {{ $house->name }}
                                                        </option>
                                                    @endif
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

                            </div>
                            <hr class="solid">
                            <div class="card-header">

                                <a></a>
                                <button name="save" type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </div>

                    </form>
                </div>









                <!-- Modal Unit -->

                <div class="modal fade" id="unitModal">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Unit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('unit.post')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Unit Name <span
                                                class="required">*</span>:</label>
                                        <div class="col-sm-9">
                                            <input name="name" type="text" class="form-control"
                                                placeholder="Enter Category Name" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Description:</label>
                                        <div class="col-sm-9">
                                            <textarea name="dis" class="form-control" cols="10" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light"
                                            data-bs-dismiss="modal">Close</button>
                                        <button name="addunit" type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal brand -->
                <div class="modal fade" id="brandModal">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Brand</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('brandpost')}}" method="POST" enctype="multipart/form-data">

                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Brand Name <span
                                                class="required">*</span>:</label>
                                        <div class="col-sm-9">
                                            <input name="name" type="text" class="form-control"
                                                placeholder="Enter Category Name" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Description:</label>
                                        <div class="col-sm-9">
                                            <textarea name="dis" class="form-control" cols="10" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Image: </label>
                                        <div class="col-sm-9">
                                            <input name="image" type="file" class="form-file-input form-control">
                                            Image dimension 486x355
                                        </div>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light"
                                    data-bs-dismiss="modal">Close</button>
                                <button name="addbrand" type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- end -->
                <!-- Modal category -->
                <div class="modal fade" id="categoryModal">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Brand</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('category.post')}}" method="POST" enctype="multipart/form-data">

                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Category Name <span
                                                class="required">*</span>:</label>
                                        <div class="col-sm-9">
                                            <input name="name" type="text" class="form-control"
                                                placeholder="Enter Category Name" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Description:</label>
                                        <div class="col-sm-9">
                                            <textarea name="dis" class="form-control" cols="10" rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Image: </label>
                                        <div class="col-sm-9">
                                            <input name="image" type="file" class="form-file-input form-control">
                                            Image dimension 486x355
                                        </div>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light"
                                    data-bs-dismiss="modal">Close</button>
                                <button name="addbrand" type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- end -->
                <!-- Modal tax -->
                <div class="modal fade" id="taxModal">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Tax</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('taxpost')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tax Name <span
                                                class="required">*</span>:</label>
                                        <div class="col-sm-9">
                                            <input name="name" type="text" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Tax Percentage <span
                                                class="required">*</span>:</label>
                                        <div class="col-sm-9">
                                            <input name="per" type="text" class="form-control" placeholder="" required>
                                        </div>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light"
                                    data-bs-dismiss="modal">Close</button>
                                <button name="addtax" type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>

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
    <script>

        // Check if there is an error toast and set timeout
        if (document.getElementById('errorToast')) {
            setTimeout(() => {
                document.getElementById('errorToast').classList.remove('active');
            }, 5000); // Adjust the duration as needed

            document.getElementById('closeErrorToast').addEventListener('click', () => {
                document.getElementById('errorToast').classList.remove('active');
            });
        }

        // Toast timeout for success
        setTimeout(() => {
            document.getElementById('toast').classList.remove('active');
        }, 5000);

        document.getElementById('closeToast').addEventListener('click', () => {
            document.getElementById('toast').classList.remove('active');
        });
    </script>
    @endsection