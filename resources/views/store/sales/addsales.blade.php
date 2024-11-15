@extends('store/layouts/app')

@section('title', 'Home Page')

<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
@section('content')

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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Invoice Terms and Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea name="" id="termText" class="form-control"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="terms()">save</button>

            </div>
        </div>
    </div>
</div>
<div>


    <script>
        function terms() {
            var termInput = document.getElementById('termInput');
            var termText = document.getElementById('termText');
            termInput.value = termText.value;
        }
    </script>
    <div class="content-body">

        <div class="container-fluid">


            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">

                    <form method="post" action="{{route('addsale')}}" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" id="termInput" name="term">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-text d-inline"> Sales </h4>
                                <p>Add/Update Sales</p>
                            </div>
                            <div class="card-body">


                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Store Name<span class="required">*</span></label>
                                            <!--   <input type="text" name="store_selectInput" id="store_select" oninput="storeSelect()" value="0"> -->
                                            <!-- Make it readonly -->
                                            <div class="input-group mb-3">
                                                <select id="store_id" name="store_id" class="form-control selectpicker"
                                                    data-live-search="true" required onchange="store()">
                                                    <option value="">-Select-</option>
                                                    @foreach ($store as $s)
                                                        <option value="{{$s->id}}" data-name="{{$s->id}}">
                                                            {{$s->store_name}}
                                                        </option>
                                                        <!-- Assuming you have an 'id' field -->
                                                    @endforeach
                                                </select>

                                                <select name="sales_type" id="sales_type" onchange="store()"
                                                    style="position:relative ; width:60px; border:none; dispay:flex; justify-content:center; align-items:center; color:gray;">
                                                    <option value="0">b2b</option>
                                                    <option value="1">b2c</option>
                                                    <option value="3">*</option>
                                                </select>
                                            </div>


                                            <script>
                                                function store() {

                                                    var store_id = document.getElementById('store_id').value;
                                                    var sales_type = document.getElementById('sales_type').value;

                                                    if (sales_type != '') {

                                                        $.ajax({
                                                            type: "GET",
                                                            url: "{{ route('salescode') }}",
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
                                            <label class="form-label">Sales Code<span class="required">*</span></label>

                                            <!-- Make it readonly -->
                                            <div class="input-group mb-3" style="dispay:flex; gap:10px;">
                                                <input type="text" name="prefix" id="prefix"
                                                    class="form-control form-control-sm">

                                                <input type="text" name="sale_code" id="sale_code"
                                                    class="form-control form-control-sm">


                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Customer Name<span
                                                    class="required">*</span></label>

                                            <!-- Make it readonly -->
                                            <div class="input-group mb-3">
                                                <select name="customer_id" class="form-control selectpicker"
                                                    data-live-search="true" required id="customer_id"
                                                    onchange="customercheck()">
                                                    <option value="">-Select-</option>
                                                    @foreach ($customers as $cu)
                                                        <option value="{{$cu->id}}" credit_limit="{{$cu->credit_limit}}">
                                                            {{$cu->customer_name}}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#supplierModal"> + </button>

                                            </div>
                                            <div class="row">
                                                <div class="col-6" style="color:red;" id="prevdue"></div>
                                                <div class="col-6" style="color:green;" id="creditlmt"> </div>
                                                <input type="text" name="customer_credit_limit"
                                                    id="customer_credit_limit" hidden>
                                            </div>
                                        </div>
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

                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Sales Date<span class="required">*</span></label>
                                            <input type="date" name="sales_date" class="form-control form-control-sm"
                                                id="dateInput">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Reference No</label>
                                            <input type="text" name="re_no" class="form-control form-control-sm">
                                        </div>
                                    </div>

                                </div>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function () {
                                        const dateInput = document.getElementById("dateInput");
                                        const today = new Date().toISOString().split("T")[0];
                                        dateInput.value = today;
                                    });
                                </script>

                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Tax Report</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="tax_report" name="tax_report" value="1" checked>

                                        </div>
                                    </div>
                                </div>

                                <hr class="solid">
                                <div class="row">
                                    <div class="col-lg-12 mb-2">
                                        <div class="form-group">

                                            <div class="input-group custom-select mb-3">
                                                <label class="input-group-text" for="inputGroupSelect01"><i
                                                        class="bi bi-upc"></i></label>
                                                <input id="search" type="text"
                                                    placeholder="Item name / Item code / Barcode" class="form-control"
                                                    autocomplete="off" onkeypress="return (event.key!='Enter')"
                                                    oninput="searchitem()">
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
                                                        <th rowspan="2" style="width:90px; color: #fff !important;"
                                                            class="itemRow">Item Name</th>
                                                        <th rowspan="2" style="width:15%;color: #fff !important;">
                                                            Quantity</th>
                                                        <th rowspan="2" style="width:10%;color: #fff !important;">
                                                            Unit</th>
                                                        <th rowspan="2" style="width:10%;color: #fff !important;">
                                                            Price/Unit</th>


                                                        <th rowspan="2" style="width:10%;color: #fff !important;">
                                                            Discount</th>
                                                        <th rowspan="2" style="width:10%;color: #fff !important;">Tax
                                                        </th>

                                                        <th rowspan="2" style="width:15%;color: #fff !important;">
                                                            Tax Amount</th>
                                                        <th rowspan="2" style="width:10%;color: #fff !important;">
                                                            Rate <br>
                                                            (Incl.of Tax)</th>
                                                        <th rowspan="2" style="width:40%;color: #fff !important;">
                                                            Mrp</th>
                                                        <th rowspan="2" style="width:20%;color: #fff !important;">Total
                                                            Amount</th>
                                                        <!--     <th rowspan="2" style="width:10%;color: #fff !important;"> Bach
                                                            No</th>
                                                        <th rowspan="2" style="width:7.5%;color: #fff !important;">
                                                            Expire Date</th> -->
                                                        <th rowspan="2" style="width:5%;color: #fff !important;">Action
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
                                                <label for="" class="col-sm-4 control-label">Total Quantities</label>
                                                <input class="control-label total_quantity text-success"
                                                    style="font-size: 15pt; border:none;" id="totalitemqty" value="0"
                                                    name="stock">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-2">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="" class="col-sm-12 control-label">Other Charges</label>
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
                                                        onchange="othercharge()">

                                                        <option value="">Select Tax</option>
                                                        @foreach ($tax as $t)
                                                            <option value="{{ $t->id }}" data-percentage="{{ $t->per }}">
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
                                                        class="form-control form-control-sm" id="discount_to_all_type"
                                                        onchange="alldiscouts()">
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
                                                    <th class="text-right" style="padding-left:10%;font-size: 15px;">
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-2 col-form-label"></label>
                                                            <div class="col-sm-10">

                                                                <input type="text" id="subtotal_amt" name="subtotal"
                                                                    class="form-control form-control-sm"
                                                                    style="background-color: #ddd; font-size:18px !important;"
                                                                    oninput="totalamtsum()" value="">
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="text-right" style="font-size: 15px;">Other Charges</th>
                                                    <th class="text-right" style="padding-left:10%;font-size: 15px;">
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
                                                    <th class="text-right" style="font-size: 15px;">Discount on All</th>
                                                    <th class="text-right" style="padding-left:10%;font-size: 15px;">
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
                                                        // alert();
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
                                                        <i class="hover-q " data-container="body" data-toggle="popover"
                                                            data-placement="top"
                                                            data-content="Go to Site Settings-> Site -> Disable the Round Off(Checkbox)."
                                                            data-html="true" data-trigger="hover"
                                                            data-original-title="Do you wants to Disable Round Off ?"
                                                            title="">
                                                            <i
                                                                class="fa fa-info-circle text-maroon text-black hover-q"></i>
                                                        </i>

                                                    </th>
                                                    <th class="text-right" style="padding-left:10%;font-size: 15px;">
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-2 col-form-label"></label>
                                                            <div class="col-sm-10">
                                                                <input type="text" id="round_off_amt" name="round_off"
                                                                    class="form-control form-control-sm"
                                                                    style="background-color: #ddd;font-size:18px !important;"
                                                                    oninput="totalamtsum()" readonly>
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="text-right" style="font-size: 15px;">Grand Total</th>
                                                    <th class="text-right" style="padding-left:10%;font-size: 15px;">
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

                                    <div class="col-md-12">

                                        <div class="card-header">
                                            <h4 class="card-text d-inline"> Invoice Terms and Conditions </h4>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn" data-toggle="modal"
                                                    data-target="#exampleModal"><i class="fa text-danger fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>




                                    </div>
                                </div>



                                <div class="row" style="background-color: #ddd;">
                                    <h4 style="margin-top: 5px; margin-bottom: 10px;">Make Payment : </h4>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">Amount</label>
                                        <input type="text" name="paid_amount" id="paid_amount"
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
                                        <input type="hidden" name="account" id="accountsInput" class="form-control"
                                            aria-describedby="accountHelp">
                                        <select name="account_id" class="form-control selectpicker" id="accountsSelect"
                                            data-live-search="true" onchange="accountsselect()">
                                            <option value="0" data-ttokens="-CREATE ACCOUNT HEAD-">-None-</option>
                                            @foreach ($account as $a)
                                                <option value="{{$a->id}}">{{$a->account_name}}</option>
                                            @endforeach


                                        </select>

                                    </div>

                                    <script>
                                        function accountsselect() {
                                            var selectElement = document.getElementById('accountsSelect');
                                            var inputElement = document.getElementById('accountsInput');
                                            var selectedType = selectElement.options[selectElement.selectedIndex].value;

                                            // Set the selected discount type into the input field
                                            inputElement.value = selectedType;
                                        }
                                    </script>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Payment Note</label>
                                        <textarea name="payment_note" class="form-control form-control-sm"></textarea>

                                    </div>

                                </div>

                                <hr class="solid">
                                <div class="card-header">

                                    <a href="dashboard" class="btn btn-danger ">Close</a>
                                    <div id="button">
                                        <button name="save" type="button" onclick="checkcredit()"
                                            class="btn btn-primary">Check Customer credit</button>
                                    </div>


                                    <!-- <button name="save" type="submit" class="btn btn-primary">Save</button> -->
                                </div>
                                <script>
                                    function checkcredit() {


                                        var total_amt = document.getElementById('total_amt').value;
                                        var paid_amount = document.getElementById('paid_amount').value;
                                        var customer_credit_limit = document.getElementById("customer_credit_limit").value;


                                        if (customer_credit_limit != '' && total_amt != '' ) {
                                            if (customer_credit_limit != 0) {

                                                if ((total_amt - $paid_amount) < customer_credit_limit) {

                                                    document.getElementById('button').innerHTML = '<button name="save" type="submit" class="btn btn-primary">Save</button>';

                                                } else {
                                                    alert('Customer Credit exeded');

                                                }

                                            } else {
                                                document.getElementById('button').innerHTML = '<button name="save" type="submit" class="btn btn-primary">Save</button>';
                                            }
                                        } else {
                                            alert('Please select the customer and enter the bill');
                                        }




                                    }
                                </script>

                            </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

</div>
<div class="modal fade" id="taxModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Tax</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('saleitem_edit')}}" method="post" enctype="multipart/form-data">



                    @csrf
                    <div class="card">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="card-header">
                            <h4 class="card-text d-inline">Edit Items </h4>
                            <p>Add/Update Items</p>

                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Item Code<span class="required">*</span></label>
                                        <input type="text" name="item_code" id="item_code" class="form-control"
                                            value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Part No<span class="required">*</span></label>
                                        <input type="text" name="part_no" id="part_no" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Item Name<span class="required
        ">*</span></label>

                                        <input type="text" name="item_name" id="item_name" class="form-control"
                                            required="" value="">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Category <span class="required">*</span></label>
                                        <input type="hidden" name="category" id="category_id" value="">
                                        <div class="input-group mb-3">
                                            <select name="catSelect" id="catSelect" class="form-control selectpicker"
                                                data-live-search="true" required onchange="setParentValue()">
                                                <option value="" id="category"></option>
                                                @foreach ($category as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>

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
                                            <input type="hidden" name="brand" id="brandInput" value="">
                                            <select name="brand_id" id="brand_id" class="form-control selectpicker"
                                                data-live-search="true" required onchange="setbrandValue()">
                                                <option value="" id="category"></option>
                                                @foreach ($brand as $name)
                                                    <option value="{{ $name->id }}">{{ $name->barndname }}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                        <script>
                                            function setbrandValue() {
                                                var selectElement = document.getElementById('brand_id');
                                                var inputElement = document.getElementById('brandInput');
                                                var selectedBrand = selectElement.options[selectElement.selectedIndex].value;


                                                inputElement.value = selectedBrand;
                                            }
                                        </script>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Unit<span class="required">*</span></label>
                                        <div class="input-group mb-3">
                                            <input type="hidden" name="unit" id="unitInput" value="">
                                            <select name="unit_id" class="form-control selectpicker"
                                                data-live-search="true" required id="unitSelect"
                                                onchange="setunitValue()">
                                                <option value="" id="category"></option>
                                                @foreach ($unit as $u)
                                                    <option value="{{ $u->id }}">{{ $u->unit_name }}</option>
                                                @endforeach

                                            </select>

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
                                        <input type="text" name="sku" id="sku" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">HSN Code</label>
                                        <input type="text" name="hsn_code" id="hsn_code" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Alert Quantity</label>
                                        <input type="number" name="alert_quantity" id="alert_quantity"
                                            class="form-control" min="0" value="">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Seller Points</label>
                                        <input type="text" name="sellerpoint" id="sellerpoint" class="form-control"
                                            value="">
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Barcode</label>
                                        <input type="text" name="bar_code" id="bar_code" class="form-control"
                                            onkeypress="return (event.key!='Enter')" value="">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Expire Date</label>

                                        <div class="input-group mb-3">
                                            <!-- <span class="input-group-text"><i class="bi bi-calendar-date"></i></span> -->
                                            <input type="date" name="expiry_date" id="expiry_date" class="form-control"
                                                value="">
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea name="dis" class="form-control" id="dis"></textarea>

                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Store Name<span class="required">*</span></label>

                                        <!-- Make it readonly -->
                                        <div class="input-group mb-3">
                                            <select id="storeSelect" name="store_id" class="form-control selectpicker"
                                                data-live-search="true" required onchange="store()">
                                                <option value="" id="category"></option>
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
                                <hr class="solid">
                                <div class="row">

                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="form-label"> Discount Type</label>

                                            <select name="discount_type" class="form-control" id="typeSelect"
                                                onchange="settypeValue()" style="height:50px;">
                                                <option value="" id="category"></option>
                                                <option value="Percentage">Percentage(%)</option>
                                                <option value="Fixed">Fixed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Discount</label>
                                            <input type="text" name="discount" id="account" class="form-control"
                                                value="">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">

                                            <img src="" alt="" srcset="" style="width: 60px; height: 60px;">
                                            <input type="file" name="picture" class="form-control" value="">
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
                                                required="" onchange="purchaseprice()" value="">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Tax<span class="required">*</span></label>

                                            <div class="input-group mb-3">


                                                <select name="tax_id" id="tax_id" class="form-control selectpicker"
                                                    data-live-search="true" required onchange="purchaseprice()">
                                                    <option value="" id="category"></option>
                                                    @foreach ($tax as $t)
                                                        <option value="{{ $t->id }}" data-percentage="{{ $t->per }}">
                                                            {{ $t->taxname }}
                                                        </option>
                                                    @endforeach
                                                </select>



                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">

                                            <label class="form-label"> Tax Type<span class="required">*</span></label>

                                            <select name="tax_type" id="tax_type" class="form-control"
                                                onchange="purchaseprice()" style="height:50px;" required>
                                                <option value=""></option>
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
                                                style="background-color: #ddd;" value="">
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
                                                onchange="purchaseprice()" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Sales Price</label>
                                            <input type="text" name="sales_price" id="sales_price" class="form-control"
                                                placeholder="Sales Price" required="" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">MRP <span class="required"
                                                    data-bs-container="body" data-bs-toggle="popover"
                                                    data-bs-placement="top" data-bs-content="Maximum Retail Price."
                                                    title="Info"><i class="bi bi-info-circle"></i></span></label>
                                            <input type="text" name="mrp" class="form-control"
                                                placeholder="Maximum Retail Price" value="" id="mrp">
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
                                            <input type="text" name="app_price" class="form-control"
                                                placeholder="Price to show on app" id="app_price">
                                        </div>
                                    </div>


                                </div>
                                <hr class="solid">
                                <div class="row">
                                    <div class="col-lg-4 mb-2">
                                        <div class="form-group">
                                            <input type="hidden" name="ware_house" id="warehouseInput" value="">
                                            <label class="form-label">Warehouse<span class="required">*</span></label>

                                            <select name="warehouse_id" class="form-control selectpicker"
                                                data-live-search="true" required onchange="warehousechange()"
                                                id="warehouseSelect">
                                                <option value="" id="category"></option>
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

                            </div>
                            <hr class="solid">
                            <div class="card-header">

                                <a></a>
                                <button name="save" type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </div>
                    </div>
            </div>


            </form>
        </div>
    </div>
</div>


</div>

</div>
</div>

<div class="modal fade" id="supplierModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('add.cu')}}" method="post" enctype="multipart/form-data">
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
                                        <a class="nav-link active" data-bs-toggle="tab" href="#general"
                                            aria-selected="true" role="tab" tabindex="-1"><i class="bi bi-person-plus"
                                                style="margin-right: 6px;"></i> ADD/Edit</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#advance" aria-selected="false"
                                            role="tab" tabindex="-1"><i class="bi bi-cpu"
                                                style="margin-right: 6px;"></i> Advanced</a>
                                    </li>

                                </ul>

                                <div class="tab-content" style="margin-top: 15px !important;">
                                    <div class="tab-pane fade active show" id="general" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Customer Name<span
                                                                class="required">*</span></label>
                                                        <input type="text" name="customer_name"
                                                            class="form-control form-control-sm" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Mobile<span
                                                                class="required">*</span></label>
                                                        <input type="text" name="mobile"
                                                            class="form-control form-control-sm" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Email</label>
                                                        <input name="email" type="email"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">GST Number</label>
                                                        <input type="text" name="gstin"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">TAX Number</label>
                                                        <input type="text" name="tax_number"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Credit Limit</label>
                                                        <input type="text" name="credit_limit"
                                                            class="form-control form-control-sm" value="-1.000">
                                                    </div>
                                                </div>


                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Previous Due</label>
                                                        <input type="text" name="opening_balance"
                                                            class="form-control form-control-sm" value="0.000">
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
                                                        <textarea name="address" id="address"
                                                            class=" form-control form-control-sm-sm"></textarea>
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
                                                        <script>
                                                            function countryname() {
                                                                var countryInput = document.getElementById('countryInput');
                                                                var countrySelect = document.getElementById('countrySelect');
                                                                countryInput.value = countrySelect.value;
                                                            }
                                                        </script>
                                                        <input type="hidden" name="country_name" id="countryInput">
                                                        <label class="form-label">Country</label>
                                                        <select name="country_id" id="countrySelect"
                                                            class="form-control form-control-sm selectpicker"
                                                            data-live-search="true" onchange="countryname()">
                                                            <option>-SELECT COUNTRY-</option>
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
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="same" name="same"
                                                                onchange="sameasabove()">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Address</label>
                                                        <textarea name="address_shipping" id="address_shipping"
                                                            class=" form-control form-control-sm-sm"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">City</label>
                                                        <input type="text" name="city_shipping" id="city_shipping"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">State</label>
                                                        <input type="text" name="state_shipping" id="state_shipping"
                                                            class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Postcode</label>
                                                        <input type="text" name="postcode_shipping"
                                                            id="postcode_shiping" class="form-control form-control-sm">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <script>
                                                            function countrychange2() {
                                                                var scountryInput = document.getElementById('scountryInput');
                                                                var scountrySelect = document.getElementById('scountrySelect');
                                                                scountryInput.value = scountrySelect.value;
                                                            }
                                                        </script>
                                                        <input type="hidden" name="shipping_country" id="scountryInput">
                                                        <label class="form-label">Country</label>
                                                        <select name="country_id_shipping" id="scountrySelect"
                                                            class="form-control form-control-sm selectpicker"
                                                            data-live-search="true" onchange="countrychange2()">
                                                            <option>-SELECT COUNTRY-</option>
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
                                                            function pricelevel() {
                                                                var pricelevelInput = document.getElementById("pricelevelInput");
                                                                var pricelevelSelect = document.getElementById('pricelevelSelect');
                                                                pricelevelInput.value = pricelevelSelect.value;
                                                            }
                                                        </script>
                                                        <input type="text" name="price_level" id="pricelevelInput">
                                                        <select name="price_level_type" id="pricelevelSelect"
                                                            class="form-control form-control-sm selectpicker"
                                                            data-live-search="true" onchange="pricelevel()">
                                                            <option value="Increase" data-tokens="0" value="Increase">
                                                                Increase</option>
                                                            <option value="Decrease" data-tokens="1" value="Decrease">
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
                            </div>
                        </div>


                        <div class="card-footer">
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

<!--   <script>
        
        function edititem(id, item_code,item_name,category,sku,hsn_code,alert_quantity,seller_point,mrp,part_no,purchase_price) {
            document.getElementById('id').value = id;
            document.getElementById('item_code').value = item_code;
            document.getElementById('item_name').value=item_name;
            document.getElementById('category').value=category;
    
            document.getElementById('sku').value = sku;
            document.getElementById('hsn_code').value=hsn_code;
            document.getElementById('alert_quantity').value=alert_quantity;
            document.getElementById('part_no').value=part_no;
            document.getElementById('mrp').value=mrp;
            document.getElementById('purchase_price').value=purchase_price;
            document.getElementById('sellerpoint').value=seller_point;
      
            if()
        }
    </script> -->

<script>
    function calculateTotal() {
        // Fetch values from the inputs
        var qty = document.getElementById('qty_').value;
        var unit_cost = document.getElementById('unit_cost_').value;
        var total = document.getElementById('total_amount_');

        // Perform calculation (convert to numbers before multiplying)
        total.value = Number(unit_cost) * Number(qty);
    }

    totalamtsum()
    calculateTotal();
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function storeSelect() {
        let store_selectInput = document.getElementById("store_select").value;

        /*     if (store_selectInput === '') {
                alert('Please select the store');
                return; // Stop if no input is provided
            } */

        $.ajax({
            type: "GET",
            url: "{{ route('getCustomers') }}",
            data: {
                store_selectInput: store_selectInput
            },
            success: function (response) {
                response.forEach(function (customer) {
                    console.log(customer.customer_name)
                    var searchs = document.getElementById("customer_id").value = customer.customer_name;

                    document.getElementById("customer_id").innerHTML = searchs + '<option class="dropdown-item"  >' + cust.item_name + '</option>';
                });


            },

        }
        )
    };

</script>

<script>

    function edititem(id, item_code, item_name, category, sku, hsn_code, alert_quantity, seller_point, mrp, part_no, purchase_price, price, profit_margin, app_price) {
        document.getElementById('id').value = id;
        document.getElementById('item_code').value = item_code;
        document.getElementById('item_name').value = item_name;
        document.getElementById('category').value = category;

        document.getElementById('sku').value = sku;
        document.getElementById('hsn_code').value = hsn_code;
        document.getElementById('alert_quantity').value = alert_quantity;
        document.getElementById('part_no').value = part_no;
        document.getElementById('mrp').value = mrp;
        document.getElementById('purchase_price').value = purchase_price;
        document.getElementById('price').value = price;
        document.getElementById('profit_margin').value = profit_margin;

        var app_price = document.getElementById('app_price').value = app_price;
        document.getElementById('sellerpoint').value = seller_point;
        document.getElementById('barcode').value = barcode;


    }
</script>

<script>
    // searching the item
    function searchitem() {
        alert('store_id')
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
                        '" ><button type="button" style="background-color:white; color:blue;" onclick="edititem(' + data.id + ', \'' + data.item_code + '\', \'' + data.item_name + '\',\'' + data.category_id + '\',\'' + data.sku + '\',\'' + data.hsn_code + '\',\'' + data.alert_quantity + '\',\'' + data.seller_point + '\',\'' + data.mrp + '\',\'' + data.part_no + '\',\'' + data.purchase_price + '\',\'' + data.price + '\',\'' + data.profit_margin + '\',\'' + data.app_price + '\')" data-bs-toggle="modal" data-bs-target="#taxModal"> <i class="fa-solid fa-pencil"></i></button> <input type="hidden" value="' + data.item_name + '" name="item_name[]">' +
                        data.item_name +

                        "</td>";
                    htmlRows +=
                        '<td ><div class="input-group input-group-sm mb-3" style="width:100px;"><button type="button" onclick="decrement_qty(1,' +
                        count +
                        ')" class="input-group-text" style="">-</button><input name="sales_qty[]" id="qty_' +
                        count +
                        '" type="text" class="form-control form-control-sm" value="1" oninput="update_calculation(' +
                        count +
                        ')"><button type="button" onclick="increment_qty(1,' +
                        count +
                        ')" class="input-group-text" style="width:10px">+</button></div></td>';

                    htmlRows += '<td>';
                    if (data.hasOwnProperty('unit_id') && data['unit_id'] != null) {
                        // Unit ID exists in the data, pre-select the option in the dropdown
                        htmlRows += '<select class="form-control form-control-sm" onchange="unitvalue(' + count + ');" id="unitselect_' + count + '">';
                        htmlRows += '<option value="" >select</option>';
                        @foreach ($unit as $unitvalue)
                            htmlRows += '<option value="{{$unitvalue->id}}" ' + (data['unit_id'] == {{$unitvalue->id}} ? 'selected' : '') + '>{{$unitvalue->unit_name}}</option>';
                        @endforeach
                        htmlRows += '</select>';
                        htmlRows += '<input type="hidden" name="unit_id[]" id="unitInput_' + count + '" value="' + data['unit_id'] + '" >';
                    } else {
                        // Unit ID does not exist, show the unit name in a hidden input
                        htmlRows += '<input type="text" class="form-control form-control-sm" value="' + data['unit_name'] + '" readonly>';
                        htmlRows += '<input type="hidden" name="unit_id[]" id="unitInput_' + count + '" value="' + data['unit_id'] + '" >';
                    }
                    htmlRows += '</td>';

                    htmlRows +=
                        '<td> <input name="purchase_price[]" id="purchase_price_' +
                        count +
                        '" type="text"  oninput="update_calculation(' +
                        count +
                        ')" class="form-control form-control-sm" value="' +
                        (data.purchase_price ? data.purchase_price : "00") +
                        '"></td>';



                    htmlRows += '<td> <input name="discount_amt[]" id="discount_' + count + '" type="text" class="form-control form-control-sm" value="' + (data.discount ? data.discount : "00") + '"></td>';

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
                        '<td> <input name="rate_inc_tax[]" id="rate_inc_tax_' +
                        count +
                        '" type="text" class="form-control form-control-sm" value="" oninput="cal_division(' + count + ')"></td>';

                    htmlRows +=
                        '<td><input type="text" id="mrp_' +
                        count +
                        '" value="' +
                        data.mrp +
                        '" name="mrp[]" class="form-control form-control-sm"></td>'

                    htmlRows +=
                        '<td> <input name="total_amount[]" id="total_amount_' +
                        count +
                        '" type="text" class="form-control form-control-sm total" value="' +
                        data.purchase_price +
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

                        '<input name="tax_type[]" type="hidden" id="tax_type_' +
                        count +
                        '" value="' +
                        data.tax_type +
                        '" hidden>';
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



                    totalamtsum()
                    calculatingtax(count);
                    itemTotal(count);
                    total_sum();

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


    function cal_division(counts) {

        var amt_inc_tax = document.getElementById("rate_inc_tax_" + counts).value;


        var taxid = document.getElementById("taxid_" + counts);

        var taxoption = taxid.options[taxid.selectedIndex];
        var taxvalue = taxoption.getAttribute('data-id');

        var qty = document.getElementById("qty_" + counts).value;

        // var purchase_price = document.getElementById("purchase_price_" + counts).value;


        // var taxamt = ((parseFloat(purchase_price) * parseFloat(qty)) * parseFloat(taxvalue)) / 100


        //Base Price = GST Inclusive Amount * 100 / (100 + Value of an applicable GST Rate)

        var purchase_price = (parseFloat(amt_inc_tax) * 100) / (100 + parseFloat(taxvalue));

        document.getElementById("purchase_price_" + counts).value = purchase_price;
        document.getElementById("total_amount_" + counts).value = (purchase_price * qty)

    }

    function calculatetax(counts) {
        calculatingtax(counts);
        itemTotal(counts);
        total_sum();
        totalamtsum()
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
        totalamtsum()

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
        totalamtsum()
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

        totalamtsum()
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

        totalamtsum()

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