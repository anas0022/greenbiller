@extends('admin/layouts/app')

@section('title', 'Home Page')

@section('content')
    <link href="{{ asset('admin-assets/css/toast.css') }}" rel="stylesheet">

    <style type="text/css">
        @media print {
            @page {
            size: portrait;
        }
            body {
                -webkit-print-color-adjust: exact;
                /* Adjusts color to match screen */
                color-adjust: exact;
                /* For Firefox */
                print-color-adjust: exact;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            }

            .item {
                border-bottom: 1px solid gray !important;
                /* Forces the border to appear */
            }

            table {
                border-collapse: collapse;
                /* Ensures borders are continuous */
            }
        }

        @media print and (orientation: portrait) {
            td {
                /* Replace with your desired font */
                font-size: 8px !important;
                /* Adjust the size as needed */
            }
            p {
                font-size: 8px !important;
            }
            div{
                font-size: 8px !important;
                gap: 10px !important;
            }
            h5{
                font-size: 10px !important;
            }
            #buttons{
                display: none !important;
            }
        }

        .text-bold {
            font-weight: bold;
        }

        .bg-sky {
            background-color: #E8F3FD;
        }

        .text-center {
            text-align: center;
        }
    </style>

    <div class="content-body" id="body_all">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="preview_data">
                        <div style="padding:10px;">
                            <h3 style="width: 100%; display:flex; justify-content:center;"> Extimate Invoice</h3>
                            <div style=" width:100%; display:flex; gap:20px; justify-content:end;">
                                <div style="left: 10px; position: absolute;">
                                    
                                    <p style="font-size: 12px;">
                                    Created By : {{$user->firstWhere('id',$userids)->name}}({{$user->firstWhere('id',$userids)->role}})</p>
                                </div>
                               
                                </span>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="invoice-box">
                                <table cellpadding="0" cellspacing="0">
                                    <div style="width:100%; display:flex; justify-content:center; ">
                                        <div style="width:100%; display:flex;  gap:30px">
                                            <div style="width:40% font-size:10px;">
                                                <h5 style="font-size:15px;">
                                                    {{ $store->firstWhere('id', $sale->store_id)->store_name }}
                                                </h5>
                                                <div style="font-size:12px; max-width: 200px; "> Address:
                                                    {{ $store->firstWhere('id', $sale->store_id)->address }}
                                                </div>
                                                <div style="font-size:12px;"> Google Pay:
                                                    {{ $store->firstWhere('id', $sale->store_id)->google_pay_no }}
                                                </div>
                                                <div style="font-size:12px;"> Gst:
                                                    {{ $store->firstWhere('id', $sale->store_id)->gst_no }}
                                                </div>
                                                <div style="font-size:12px;"> Phone:
                                                    {{ $store->firstWhere('id', $sale->store_id)->mobile }}
                                                </div>
                                            </div>
                                          
                                            <div>

                                                <div colspan="3">
                                                    <h5 style="font-size:15px;">
                                                        Bill To:</h4>
                                                        <div style="font-size:12px;">
                                                            {{ $customer->firstWhere('id', $sale->customer_id)->customer_name ?? 'N/A' }}<br>
                                                            @php
                                                                $customerData = $customer->firstWhere(
                                                                    'id',
                                                                    $sale->customer_id,
                                                                );
                                                            @endphp
                                                            @if (!empty($customerData->mobile))
                                                                Mobile : {{ $customerData->mobile }}<br>
                                                            @else
                                                                <form id="mobile">
                                                                    @csrf
                                                                    <input type="hidden" type="hidden"
                                                                        value=" {{ $customer->firstWhere('id', $sale->customer_id)->id ?? 'N/A' }}"
                                                                        name="id">
                                                                    <input type="text" name="mobile" id=""
                                                                        placeholder="Enter Mobile Number">
                                                                    <button type="submit">Submit</button>
                                                                </form>
                                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                                <script>
                                                                    $('#mobile').on('submit', function(e) {
                                                                        e.preventDefault(); // Prevent the default form submission

                                                                        $.ajax({
                                                                            url: "{{ route('customer.mobile') }}",
                                                                            type: "PUT", // Use POST method
                                                                            data: $(this).serialize(),
                                                                            success: function(response) {
                                                                                alert('Data updated successfully');
                                                                                location.reload();
                                                                            },
                                                                            error: function(xhr) {
                                                                                alert('An error occurred');
                                                                                console.error(xhr.responseText); // Log the error for debugging
                                                                            }
                                                                        });
                                                                    });
                                                                </script>
                                                                <br>
                                                            @endif
                                                            <!--   @if (!empty($customerData->email))
    Email : {{ $customerData->email }}<br>
@else
    <form id="email">
                                                                                    @csrf
                                                                                    <input type="hidden" type="hidden"
                                                                                        value=" {{ $customer->firstWhere('id', $sale->customer_id)->id ?? 'N/A' }}"
                                                                                        name="id">
                                                                                    <input type="text" name="email" id=""
                                                                                        placeholder="Enter Email Number">
                                                                                    <button type="submit">Submit</button>
                                                                                </form>
                                                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                                                <script>
                                                                                    $('#email').on('submit', function(e) {
                                                                                        e.preventDefault(); // Prevent the default form submission

                                                                                        $.ajax({
                                                                                            url: "{{ route('customer.email') }}",
                                                                                            type: "PUT", // Use POST method
                                                                                            data: $(this).serialize(),
                                                                                            success: function(response) {
                                                                                                alert('Data updated successfully');
                                                                                                location.reload();
                                                                                            },
                                                                                            error: function(xhr) {
                                                                                                alert('An error occurred');
                                                                                                console.error(xhr.responseText); // Log the error for debugging
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                </script> <br>
    @endif -->
                                                            @if (!empty($customerData->address))
                                                                <div style="max-width:200px;"> Address :
                                                                    {{ $customerData->address }}
                                                                </div>
                                                            @else
                                                                <form id="address">
                                                                    @csrf
                                                                    <input type="hidden" type="hidden"
                                                                        value=" {{ $customer->firstWhere('id', $sale->customer_id)->id ?? 'N/A' }}"
                                                                        name="id">
                                                                    <textarea name="address" id="" placeholder="please enter your address"></textarea>
                                                                    <button type="submit">Submit</button>
                                                                </form>
                                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                                <script>
                                                                    $('#address').on('submit', function(e) {
                                                                        e.preventDefault(); // Prevent the default form submission

                                                                        $.ajax({
                                                                            url: "{{ route('customer.address') }}",
                                                                            type: "PUT", // Use POST method
                                                                            data: $(this).serialize(),
                                                                            success: function(response) {
                                                                                alert('Data updated successfully');
                                                                                location.reload();
                                                                            },
                                                                            error: function(xhr) {
                                                                                alert('An error occurred');
                                                                                console.error(xhr.responseText); // Log the error for debugging
                                                                            }
                                                                        });
                                                                    });
                                                                </script>
                                                                <br>
                                                            @endif
                                                            @if (!empty($customerData->gst_number))
                                                                GST : {{ $customerData->gst_number }}<br>
                                                            @else
                                                                <form id="gst">
                                                                    @csrf
                                                                    <input type="hidden" type="hidden"
                                                                        value=" {{ $customer->firstWhere('id', $sale->customer_id)->id ?? 'N/A' }}"
                                                                        name="id">
                                                                    <input type="text" name="gst" id=""
                                                                        placeholder="enter gst number">
                                                                    <button type="submit">Submit</button>
                                                                </form>
                                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                                <script>
                                                                    $('#gst').on('submit', function(e) {
                                                                        e.preventDefault(); // Prevent the default form submission

                                                                        $.ajax({
                                                                            url: "{{ route('customer.gst') }}",
                                                                            type: "PUT", // Use POST method
                                                                            data: $(this).serialize(),
                                                                            success: function(response) {
                                                                                alert('Data updated successfully');
                                                                                location.reload();
                                                                            },
                                                                            error: function(xhr) {
                                                                                alert('An error occurred');
                                                                                console.error(xhr.responseText); // Log the error for debugging
                                                                            }
                                                                        });
                                                                    });
                                                                </script>
                                                                <br>
                                                            @endif
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div style="width: 100%; display:flex; gap:10px; jsutify-content:end;">
                                            <p style="font-size:15px;"><b>Bill No : {{ $sale->prefix }} /{{ $sale->sales_code }}
                                            </b>
                                        </p>
                                        <span style="display:flex; gap:10px;">
        
                                            <p style="font-size:15px;"><b>Reference No : {{ $sale->reference_no }}</b>
                                            </p>
                                            <br>
                                            <p style="right:0%; position:relative; font-size:15px;"><b>Date :
                                                    {{ $sale->sales_date }}
                                                </b>
                                            </p>
                                        </div>
                                    </div>
                                </table>

                                <table cellspacing="0px" cellpadding="2px">
                                    <thead style="width:100%;">
                                        <tr class="bg-sky text-bold" style="width:100%;">
                                            <td style="font-size:12px; text-align:center; width:5%;">SL NO</td>
                                            <td style="font-size:12px; text-align:center; width:10%;"> Part No</td>
                                            <td style="font-size:12px; text-align:center; width:19%;">ITEM</td>
                                            <td style="font-size:12px; text-align:center; width:8%;"> HSN/ SAC</td>

                                            <td style="font-size:12px; text-align:center; width:5%;"> Quantity</td>
                                            <td style="font-size:12px; text-align:center; width:5%;"> Liters</td>

                                            <td style="font-size:12px; text-align:center; width:8%;"> Rate <br> (Incl. of
                                                Tax) </td>
                                            <td style="font-size:12px; text-align:center; width:8%; "> MRP</td>
                                            <td style="font-size:12px; text-align:center; width:8%;">GST (INR) </td>
                                            <td style="font-size:12px; text-align:center; width:8%;"> Amount (INR) </td>
                                        </tr>
                                    </thead>
                                    <tbody style="width:100%;">
                                        @php
                                            $totalQuantity = 0;
                                            $totalAmount = 0;
                                            $totalLiter = 0;
                                        @endphp
                                        @foreach ($sales_itemdata as $index => $item)
                                            @php
                                                $quantity = $item->sales_qty;
                                                $amount = $item->total_cost;
                                                // $liter = number_format(optional($item_alqty->firstWhere('id', $item->item_id))->alt_unit * $item->sales_qty);
                                                // Accumulate totals
                                                $totalQuantity += $quantity;
                                                $totalAmount += $amount;
                                                //$totalLiter += $liter;
                                            @endphp
                                            <tr class="item" style="border-bottom:1px solid gray; width:5%;">
                                                <td style="font-size:10px; text-align:center; border-right:1px solid; ">
                                                    {{ $index + 1 }}
                                                </td>
                                                <td
                                                    style="font-size:10px; text-align:center; border-right:1px solid; width:10%;">
                                                    @if (is_null($item->part_no))
                                                        <form id="part_no">
                                                            @csrf
                                                            <input type="text" id="item_id" name="id"
                                                                value="{{ $item->item_id }}">
                                                            <input type="text" name="part_no"
                                                                placeholder="Enter part number here" value=""
                                                                id="part_no_input">
                                                            <button type="submit">Done</button>
                                                        </form>
                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                        <script>
                                                            $('#part_no').on('submit', function(e) {
                                                                e.preventDefault(); // Prevent the default form submission

                                                                $.ajax({
                                                                    url: "{{ route('part.noedit') }}",
                                                                    type: "PUT", // Use POST method
                                                                    data: $(this).serialize(),
                                                                    success: function(response) {
                                                                        alert('Data updated successfully');
                                                                        location.reload();
                                                                    },
                                                                    error: function(xhr) {
                                                                        alert('An error occurred');
                                                                        console.error(xhr.responseText); // Log the error for debugging
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                    @else
                                                        {{ str_replace(['(', ')'], '', $item->part_no) }}
                                                    @endif
                                                </td>
                                                <td
                                                    style="font-size:10px; border-right:1px solid;width:15%; text-align:center;">
                                                    {{ preg_replace('/\s*\(.*?\)/', '', $item->item_name) }}
                                                </td>
                                                <td
                                                    style="font-size:10px; text-align:center; border-right:1px solid; width:10%;">
                                                    {{ $item->hsn_code }}
                                                </td>

                                                <td
                                                    style="font-size:10px; text-align:center; border-right:1px solid; width:10%;">
                                                    {{ $item->sales_qty }}
                                                    @if ($unit_id->firstWhere('id', $item->unit_id)->unit_name == 'Ltr')
                                                    @endif
                                                    @if ($unit_id->firstWhere('id', $item->unit_id)->unit_name == 'Ltr')
                                                        Bottle
                                                    @else
                                                        {{ $unit_id->firstWhere('id', $item->unit_id)->unit_name ?? 'NA' }}
                                                    @endif
                                                </td>
                                                <td
                                                    style="font-size:10px; text-align:center; border-right:1px solid; width:10%;">
                                                    @if ($unit_id->firstWhere('id', $item->unit_id)->unit_name == 'Ltr')
                                                        @if (is_null($item_alqty->firstWhere('id', $item->item_id)->alt_unit))
                                                            <!-- Edit Form -->
                                                            <form id="altQtyForm">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $item->item_id }}">
                                                                <input type="text" name="alt_unit"
                                                                    placeholder="Enter alt unit here"
                                                                    value="{{ $item->alt_unit }}">
                                                                <button type="submit">Done</button>
                                                            </form>
                                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                            <script>
                                                                $('#altQtyForm').on('submit', function(e) {
                                                                    e.preventDefault(); // Prevent the default form submission

                                                                    $.ajax({
                                                                        url: "{{ route('alt.qtywdit') }}",
                                                                        type: "PUT", // Use the PUT method
                                                                        data: $(this).serialize(),
                                                                        success: function(response) {
                                                                            alert('Data updated successfully');
                                                                            location.reload();
                                                                        },
                                                                        error: function(xhr) {
                                                                            alert('An error occurred');
                                                                            console.error(xhr.responseText); // Log the error for debugging
                                                                        }
                                                                    });
                                                                });
                                                            </script>
                                                        @else
                                                            {{ number_format(optional($item_alqty->firstWhere('id', $item->item_id))->alt_unit * $item->sales_qty) }}
                                                            @php
                                                                $liter = number_format(
                                                                    optional(
                                                                        $item_alqty->firstWhere('id', $item->item_id),
                                                                    )->alt_unit * $item->sales_qty,
                                                                );
                                                                // Accumulate totals

                                                                $totalLiter += $liter;
                                                            @endphp
                                                        @endif
                                                    @endif
                                                </td>

                                                <td
                                                    style="font-size:10px; text-align:center; border-right:1px solid; width:10%;">
                                                    {{ $item->rate_inclusive_tax }}
                                                </td>
                                                <td
                                                    style="font-size:10px; text-align:center; border-right:1px solid; width:10%;">
                                                    {{ $item->mrp }}
                                                </td>
                                                <td
                                                    style="font-size:10px; text-align:center; border-right:1px solid; width:10%;">
                                                    <?php
                                                    // Clean up the value to ensure it is numeric
                                                    $pricePerUnit = preg_replace('/[^0-9.]/', '', $item->price_per_unit);
                                                    $taxPercentage = preg_replace('/[^0-9.]/', '', $tax->firstWhere('id', (int) $item->tax_id)->per);
                                                    
                                                    // Calculate the tax amount
                                                    $taxAmount = number_format(((float) $pricePerUnit * (float) $taxPercentage) / 100, 2);
                                                    
                                                    echo $taxAmount;
                                                    ?>
                                                </td>
                                                <td
                                                    style="font-size:10px; text-align:center; border-right:1px solid; width:10%;">
                                                    {{ $item->total_cost }}
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tr class="bg-sky text-bold" style="border-bottom:1px solid;">
                                        <td style="font-size:12px; text-align:center; border-right: 1px solid; ">
                                            Total
                                        </td>
                                        <td style="text-align:right; font-weight:bold; border-right: 1px solid; "></td>
                                        <td style="width:10%; text-align:center; border-right: 1px solid; ">
                                        </td>
                                        <td style="width:10%; text-align:center; border-right: 1px solid; ">
                                        </td>
                                        <td style="font-size:12px; text-align:center; border-right: 1px solid; ">
                                            {{ $totalQuantity }}
                                        </td>
                                        <td
                                            style="width:10%; text-align:center; border-right: 1px solid; font-size: 12px; ">
                                            {{ $totalLiter }}
                                        </td>
                                        <td style="width:10%; text-align:right; border-right: 1px solid; ">
                                        </td>
                                        <td style="width:10%; text-align:right; border-right: 1px solid; ">
                                        </td>
                                        <td style="width:10%; text-align:right; border-right: 1px solid; ">
                                        </td>
                                        <td
                                            style=" width:10%; font-size:12px; text-align:center; border-right: 1px solid; ">
                                            {{ $totalAmount }}
                                        </td>
                                    </tr>
                                    <td style="width:90%;" colspan="5"></td>
                                </table>
                                <table>
                                    <tr class="item">
                                        <td style="width:60%;" colspan="4">

                                            <div class="gsttable">
                                                <table style="border:0px !important;">
                                                    <!-- Tax Summary Header -->
                                                 
                                                        <td colspan="15" style="font-size:12px; padding:5px;">Tax Summary</td>
                                           
                                                    
                                                    <!-- Column Headers Row 1 -->
                                                    <tr class="bg-sky text-bold">
                                                        <td rowspan="2" style="font-size:12px; padding-right:12px; width:15%; height:60px;" class="text-center">
                                                            HSN/SAC
                                                        </td>
                                                        <td rowspan="2" style="font-size:12px; width:15%;" class="text-center">
                                                            Taxable amount
                                                        </td>
                                                        <td colspan="2" style="font-size:12px; width:20%;" class="text-center">
                                                            CGST
                                                        </td>
                                                        <td colspan="2" style="font-size:12px; width:20%;" class="text-center">
                                                            SGST
                                                        </td>
                                                        <td rowspan="2" style="font-size:12px; width:15%;" class="text-center">
                                                            Total Tax
                                                        </td>
                                                    </tr>
                                                    
                                                    <!-- Column Headers Row 2 -->
                                                    <tr class="bg-sky text-bold">
                                                        <td style="font-size:12px; width:10%;" class="text-center">Rate (%)</td>
                                                        <td style="font-size:12px; width:10%;" class="text-center">Amt (INR)</td>
                                                        <td style="font-size:12px; width:10%;" class="text-center">Rate (%)</td>
                                                        <td style="font-size:12px; width:10%;" class="text-center">Amt (INR)</td>
                                                    </tr>
                                            
                                                    <!-- Data Rows -->
                                                    @php
                                                    $totalTaxAmount = array_sum(array_column($response_data, 'tax_amt'));
                                                    $centralTax = $totalTaxAmount / 2;
                                                    $stateTax = $totalTaxAmount / 2;
                                                @endphp
                                                    @foreach ($response_data as $item)
                                                    <tr>
                                                        <td style="font-size:12px;" class="text-center">
                                                            {{ $item['hsn_code'] }}
                                                        </td>
                                                        <td style="font-size:12px;" class="text-center">
                                                            {{ number_format($item['sales_qty'] * $item['price_per_unit'], 2) }}


                                                        </td>
                                                        <td style="font-size:12px;" class="text-center">
                                                            {{ number_format($item['total_tax_percentage'] / 2, 2) }}
                                                        </td>
                                                        <td style="font-size:12px;" class="text-center">
                                                            
                                                            {{ number_format($item['tax_amt'] / 2, 1) }}
                                                        </td>
                                                        <td style="font-size:12px;" class="text-center">
                                                            {{ number_format($item['total_tax_percentage'] / 2, 2) }}
                                                        </td>
                                                        <td style="font-size:12px;" class="text-center">
                                                            {{ number_format($item['tax_amt'] / 2, 2) }}
                                                        </td>
                                                        <td style="font-size:12px;" class="text-center">
                                                            {{ number_format($item['tax_amt']) }}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            </div>

                                        </td>
                                        <td class="gsttable"
                                            style="margin-top:50px; position:relative; top:20%; width:100%;  ">
                                            <table style="border:0px !important; margin-top:20px;  margin-left: 20px; ">
                                                <tr class="text-bold" style="width:100%;">
                                                    <td colspan="2" style="font-size:12px;">Total Outsatnding Amount
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size:12px;" colspan="2">Previous Balance</td>
                                                    <td style="font-size:12px;">
                                                        {{ round($old = $customer->firstWhere('id', $sale->customer_id)->previous_due ?? '0', 2) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size:12px;" colspan="2">Current Bill</td>
                                                    <td style="font-size:12px; border-bottom:1px solid;">
                                                        {{ $gg = round( $totalAmount) }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size:12px;" colspan="2">Total</td>
                                                    <td style="font-size:12px;">{{ round($old + $gg, 2) }}</td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td style="width:100%; text-align:right;  height: 100%;  ">

                                            <table style="width:100%;  ">
                                                <tr style="width:100%;">
                                                    <td>
                                                        <div class="bg-sky text-bold"
                                                            style="width:100%; font-size:12px; text-align:left; padding: 5px;">Sub total

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="bg-sky text-bold" style="font-size:12px; padding: 5px;"
                                                            id="subtotal">


                                                            {{ $sale->subtotal }}

                                                        </div>
                                                        <script>
                                                            var subtotal = document.getElementById('subtotal').value;
                                                        </script>
                                                    </td>
                                                </tr>
                                            
                                                <tr>
                                                    <td>
                                                        <div colspan="7" class="bg-sky text-bold"
                                                            style="font-size:12px; padding: 5px; text-align:left;"><b>CGST </b>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div colspan="7" class="bg-sky text-bold"
                                                            style="font-size:12px; padding: 5px;">
                                                            <b>{{ number_format($centralTax, 2) }}</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div colspan="7" class="bg-sky text-bold"
                                                            style="font-size:12px; padding: 5px; text-align:left;"><b>SGST</b>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div colspan="7" class="bg-sky text-bold"
                                                            style="font-size:12px; padding: 5px; ">
                                                            <b>{{ number_format($stateTax, 2) }}</b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div colspan="7" class="bg-sky text-bold"
                                                            style="font-size:12px; padding: 5px; text-align:left;"><b>Total</b>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div colspan="7" class="bg-sky text-bold"
                                                            style="font-size:12px; padding: 5px;">
                                                            <b>
                                                                <span id="amountNumeric">{{ $sale->grand_total }}</span>
                                                            </b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div colspan="7" class="bg-sky text-bold"
                                                            style="font-size:12px; padding: 5px; text-align:left;"><b>Round Off</b>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div colspan="7" class="bg-sky text-bold"
                                                            style="font-size:12px; padding: 5px;">
                                                            <b>
                                                                {{ round($sale->grand_total, 0) }}
                                                            </b>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                             
                                                
                                               
                                                <tr>
                                                    <td colspan="2" style="font-size:12px;">(<b
                                                            id="amountInWords"></b>)</td>
                                                </tr>

                                            </table>

                                            <div class="subtotalarea"
                                                style="width:200px; height:100%; display:flex;  justify-content:center; ">
                                                <div style="border:0px !important;">
                                                    <script>
                                                        // Get the element by its ID
                                                        var subtotalElement = document.getElementById('subtotal');
                                                        // Parse the subtotal as a float
                                                        var subtotal = parseFloat(subtotalElement.textContent);
                                                        // Round the subtotal to two decimal places
                                                        var roundedSubtotal = subtotal.toFixed(2);
                                                        // Update the element's text with the rounded subtotal
                                                        subtotalElement.textContent = roundedSubtotal;
                                                    </script>
                                                    <div style="font-size: 12px; text-align:start">
                                                        <b> Bank Details </b> <br>
                                                        Bank Name : State Bank Of India <br>
                                                        Account No : 4856792354 <br>
                                                        Ifsc : Ifsc1234<br>
                                                        Branch : Thrissur
                                                    </div>
                                                </div>


                                            </div>

                                        </td>
                                    </tr>

                                </table>
                            </div>

                            <div
                                style="width:100%; border-top:1px solid; margin-top: :20px; display:flex; flex-direction:column; justify-content:center; align-items:center; gap:5px;">
                                <table cellspacing="0px" cellpadding="2px" style="width:100%; ">
                                    <tr style=" border-bottom:1px solid;">
                                        <td style="font-size:12px; margin-top:12px; width:60%;">
                                            <b> Terms & Conditions: </b> <br>
                                            (1) There will be no warranty or replacement for physical or external damages
                                            like:- Lightning,Mishandling,Electric shortcircuit,Warranty seal broken and
                                            cover
                                            broken,damages caused by the courier service.(2) After the payment due date,
                                            interest @24% per month will be charged on
                                            the amount overdue .(3) Rs.500 will be charged per cheque if it is bounced.(4)
                                            The cheque has to be given within 5 days of purchase. If the cheque is not
                                            given, the
                                            account will be blocked by the accounts section.(5) Items sold will not be taken
                                            back or exchanged.(6) It is the responsibility of the customer to check whether
                                            the
                                            item is damaged or not.(7) Only the warranty as per manufactures warranty policy
                                            will be applicable for the items sold.
                                        </td>
                                        <td
                                            style="width:100%; display:flex; justify-content:end; font-size:13px; height:150px; border:1px solid;">
                                            <b>Seal & Signature</b>
                                        </td>

                                    </tr>

                                </table>
                            </div>

                            <!-- T&C & Bank Details & signatories End -->

                            <td colspan="16" style="text-align: center;font-size: 11px; margin-top:60px;    ">
                                <center>

                                    <span style="font-size: 11px;text-transform: uppercase;">
                                        Thank You For Choosing Our Services
                                    </span>
                                </center>
                            </td>

                        </div>


                        <div class="card-header" id="buttons">
                            <div class="col-xs-6">
                                <button class="btn btn-primary" id="download_Btn"><i class="fa-solid fa-file-pdf"></i>
                                    Download
                                    Pdf</button>
                            </div>
                            <div class="col-xs-6">
                                <button class="btn btn-primary" onclick="printPreview()" id="print-button"><i
                                        class="fa  fa-print"></i>
                                    Print</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

 


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script>
        function printPreview() {

            var buttonsElement = document.getElementById('buttons');


            var printContents = document.getElementById('preview_data').innerHTML;

            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();
           

            document.body.innerHTML = originalContents;



        }
    </script>

    <script>
        function numberToWords(num) {
            const ones = [
                '', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten',
                'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'
            ];
            const tens = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
            const scales = ['', 'Thousand', 'Million', 'Billion'];

            if (num === 0) return 'Zero';

            let words = '';

            function toWords(n, scaleIndex) {
                if (n === 0) return '';

                let currentWords = '';

                if (n >= 100) {
                    currentWords += ones[Math.floor(n / 100)] + ' Hundred ';
                    n %= 100;
                }

                if (n >= 20) {
                    currentWords += tens[Math.floor(n / 10)] + ' ';
                    n %= 10;
                }

                if (n > 0) {
                    currentWords += ones[n] + ' ';
                }

                if (scaleIndex > 0 && currentWords.trim() !== '') {
                    currentWords += scales[scaleIndex] + ' ';
                }

                return currentWords;
            }

            let scaleIndex = 0;
            while (num > 0) {
                let part = num % 1000;
                if (part > 0) {
                    words = toWords(part, scaleIndex) + words;
                }
                num = Math.floor(num / 1000);
                scaleIndex++;
            }

            return words.trim();
        }

        // Get the numeric amount
        const amountElement = document.getElementById('amountNumeric');
        const amountNumeric = parseFloat(amountElement.innerText);

        // Convert to words and display
        if (!isNaN(amountNumeric)) {
            const amountInWords = numberToWords(amountNumeric);
            document.getElementById('amountInWords').innerText = amountInWords;
        }
    </script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        document.getElementById('download_Btn').addEventListener('click', () => {
var buttonsElement = document.getElementById('buttons');
            buttonsElement.style.display = "none";
            const previewData = document.getElementById('preview_data');

            html2canvas(previewData).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jspdf.jsPDF();


                const imgWidth = 190;
                const imgHeight = (canvas.height * imgWidth) / canvas.width;

                pdf.addImage(imgData, 'PNG', 10, 10, imgWidth, imgHeight);
                pdf.save('preview.pdf');
                setTimeout(() => {

buttonsElement.style.display = "flex";

}, 200);
            });
        });
    </script>
@endsection