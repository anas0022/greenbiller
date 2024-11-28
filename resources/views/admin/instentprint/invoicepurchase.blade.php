@extends('admin/layouts/app')

@section('title', 'Purchase Preview')

@section('content')



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

            #buttons {
                display: none !important;
            }
        }

        @media print and (orientation: portrait) {
            td {
     
                font-size: 2px !important;
               
            }

            p {
                font-size: 2px !important;
            }

            div {
                font-size: 2px !important;
                gap: 10px !important;
            }

            h5 {
                font-size: 4px !important;
            }
            .text-bold {
                font-weight: lighter;
                font-size: 10px !important;
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

        .Not-paid {
            background-color: #ffebee !important;
            color: #c62828 !important;
            border: 1px solid #c62828 !important;
            border-radius: 4px;
            padding: 2px 8px !important;
            display: inline-block !important;
        }

        .paid {
            background-color: #e8f5e9 !important;
            color: #2e7d32 !important;
            border: 1px solid #2e7d32 !important;
            border-radius: 4px;
            padding: 2px 8px !important;
            display: inline-block !important;
        }
        .partially-paid{
            background-color: #fff3e0 !important;
            color: #ffa726 !important;
            border: 1px solid #ffa726 !important;
            border-radius: 4px;
        }
    </style>


    <div class="content-body" id="body_all">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="preview_data" style="background-color: white;">

                        <div style="padding:10px;">
                            <h3 style="width: 100%; display:flex; justify-content:center;"> Purchase Preview</h3>
                            <div style=" width:100%; display:flex; gap:20px; justify-content:end; ;">
                                <div style="left:2% ; position:absolute;  width:100%;">
                                    @if ($sale->paid_amount == null)
                                        <p class="Not-paid"
                                            style="padding:2px 8px; width:auto; display:inline-block; margin:0;">
                                            <strong>Un Paid</strong>
                                        </p>
                                    @elseif($sale->paid_amount < $sale->total_cost)
                                        <p class="partially-paid"
                                            style="padding:2px 8px; width:auto; display:inline-block; margin:0;">
                                            <strong>Partially Paid</strong>
                                        </p>
                                    @else
                                        <p class="paid"
                                            style="padding:2px 8px; width:auto; display:inline-block; margin:0;">
                                            <strong>Paid</strong>
                                        </p>
                                    @endif
                                    <p style="font-size: 12px;">
                                        Created By :
                                        {{ $user->firstWhere('id', $userids)->name }}({{ $user->firstWhere('id', $userids)->role }})
                                    </p>
                                </div>
                                <p style="font-size:15px;"><b>Bill No : {{ $sale->prefix }} /{{ $sale->purchase_code }}
                                    </b>
                                </p>
                                <span style="display:flex; gap:10px;">

                                    <p style="font-size:15px;"><b>Reference No : {{ $sale->reference_no }}</b>
                                    </p>
                                    <br>
                                    <p style="right:0%; position:relative; font-size:15px;"><b>Date :
                                            {{ $sale->purchase_date }}
                                        </b>
                                    </p>
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
                                                            Name :
                                                            {{ $customer->firstWhere('id', $sale->supplier_id)->name ?? 'N/A' }}<br>
                                                            Gst :
                                                            {{ $customer->firstWhere('id', $sale->supplier_id)->gst ?? 'N/A' }}<br>



                                                        </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </table>

                                <table cellspacing="0px" cellpadding="2px">
                                    <thead style="width:100%;">
                                        <tr class="bg-sky text-bold" style="width:100%;">
                                            <td style="font-size:12px; text-align:center; width:5%;">SL NO</td>
                                            <td style="font-size:12px; text-align:center; width:15%;"> Part No</td>
                                            <td style="font-size:12px; text-align:center; width:25%;">ITEM</td>
                                            <td style="font-size:12px; text-align:center; width:12%;"> PRICE/UNIT</td>
                                            <td style="font-size:12px; text-align:center; width:12%;"> HSN/ SAC</td>

                                            <td style="font-size:12px; text-align:center; width:12%;"> Quantity</td>
                                            <td style="font-size:12px; text-align:center; width:12%;"> Liters</td>



                                            <td style="font-size:12px; text-align:center; width:12%;">GST (INR) </td>
                                            <td style="font-size:12px; text-align:center; width:12%;"> Amount (INR) </td>
                                        </tr>
                                    </thead>
                                    <tbody style="width:100%;">
                                        @php
                                            $totalQuantity = 0;
                                            $totalAmount = 0;
                                            $totalLiter = 0;
                                        @endphp
                                        @foreach ($purchase_itemdata as $index => $item)
                                            @php
                                                $quantity = $item->purchase_qty;
                                                $amount = $item->total_cost;

                                                $totalQuantity += $quantity;
                                                $totalAmount += $amount;

                                            @endphp
                                            <tr class="item" style="border-bottom:1px solid gray; width:5%;">
                                                <td style="font-size:10px; text-align:center; border-right:1px solid; ">
                                                    {{ $index + 1 }}
                                                </td>
                                                <td
                                                    style="font-size:10px; text-align:center; border-right:1px solid; width:10%;">
                                                    @if (is_null($items->firstWhere('id', $item->item_id)->part_no))
                                                        <form id="part_no">
                                                            @csrf
                                                            <input type="hidden" id="item_id" name="id"
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
                                                        {{ $items->firstWhere('id', $item->item_id)->part_no }}
                                                    @endif
                                                </td>
                                                <td
                                                    style="font-size:10px; border-right:1px solid;width:15%; text-align:center;">
                                                    {{ $items->firstWhere('id', $item->item_id)->item_name }}
                                                </td>
                                                <td
                                                    style="font-size:10px; border-right:1px solid;width:15%; text-align:center;">
                                                    {{ $item->price_per_unit }}
                                                </td>
                                                <td
                                                    style="font-size:10px; text-align:center; border-right:1px solid; width:10%;">
                                                    {{ $item->hsn_code }}
                                                </td>

                                                <td
                                                    style="font-size:10px; text-align:center; border-right:1px solid; width:10%;">
                                                    {{ $item->purchase_qty }}
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
                                                            {{ number_format(optional($item_alqty->firstWhere('id', $item->item_id))->alt_unit * $item->purchase_qty) }}
                                                            @php
                                                                $liter = number_format(
                                                                    optional(
                                                                        $item_alqty->firstWhere('id', $item->item_id),
                                                                    )->alt_unit * $item->purchase_qty,
                                                                );
                                                                // Accumulate totals

                                                                $totalLiter += $liter;
                                                            @endphp
                                                        @endif
                                                    @endif
                                                </td>


                                                <td
                                                    style="font-size:10px; text-align:center; border-right:1px solid; width:10%;">
                                                    {{ $item->tax_amt }}
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



                                        <td style="width:10%; text-align:center; border-right: 1px solid; ">
                                        </td>
                                        <td style="width:10%; text-align:center; border-right: 1px solid; ">
                                        </td>
                                        <td style="font-size:12px; text-align:center; border-right: 1px solid; ">

                                        </td>
                                        <td
                                            style="width:10%; text-align:center; border-right: 1px solid; font-size: 12px; ">

                                        </td>
                                        <td
                                            style="width:10%; text-align:center; border-right: 1px solid;  font-size: 12px; ">
                                            {{ $totalQuantity }}
                                        </td>
                                        <td
                                            style="width:10%; text-align:center; border-right: 1px solid;  font-size: 12px;">
                                            {{ $totalLiter }}
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
                                <table style="width:100%;">
                                    <tr class="item">
                                        <td style="width:60%;" colspan="4">

                                            <div class="gsttable">
                                                <table style="border:0px !important;">
                                                    <!-- Tax Summary Header -->

                                                    <td colspan="15" style="font-size:12px; padding:5px;">Tax Summary
                                                    </td>


                                                    <!-- Column Headers Row 1 -->
                                                    <tr class="bg-sky text-bold">
                                                        <td rowspan="2"
                                                            style="font-size:12px; padding-right:12px; width:15%; height:60px;"
                                                            class="text-center">
                                                            HSN/SAC
                                                        </td>
                                                        <td rowspan="2" style="font-size:12px; width:15%;"
                                                            class="text-center">
                                                            Taxable amount
                                                        </td>
                                                        <td colspan="2" style="font-size:12px; width:20%;"
                                                            class="text-center">
                                                            CGST
                                                        </td>
                                                        <td colspan="2" style="font-size:12px; width:20%;"
                                                            class="text-center">
                                                            SGST
                                                        </td>
                                                        <td rowspan="2" style="font-size:12px; width:15%;"
                                                            class="text-center">
                                                            Total Tax
                                                        </td>
                                                    </tr>

                                                    <!-- Column Headers Row 2 -->
                                                    <tr class="bg-sky text-bold">
                                                        <td style="font-size:12px; width:10%;" class="text-center">Rate
                                                            (%)</td>
                                                        <td style="font-size:12px; width:10%;" class="text-center">Amt
                                                            (INR)</td>
                                                        <td style="font-size:12px; width:10%;" class="text-center">Rate
                                                            (%)</td>
                                                        <td style="font-size:12px; width:10%;" class="text-center">Amt
                                                            (INR)</td>
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
                                                                {{ number_format($item['price_per_unit'] * $item['purchase_qty'], 2) }}
                                                            </td>
                                                            <td style="font-size:12px;" class="text-center">
                                                                {{ number_format($item['total_tax_percentage'] / 2, 2) }}
                                                            </td>
                                                            <td style="font-size:12px;" class="text-center">
                                                                {{ number_format($item['tax_amt'] / 2, 2) }}
                                                            </td>
                                                            <td style="font-size:12px;" class="text-center">
                                                                {{ number_format($item['total_tax_percentage'] / 2, 2) }}
                                                            </td>
                                                            <td style="font-size:12px;" class="text-center">

                                                                {{ number_format($item['tax_amt'] / 2, 2) }}
                                                            </td>
                                                            <td style="font-size:12px;" class="text-center">
                                                                {{ number_format($item['tax_amt'], 2) }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                  
                                                </table>
                                            </div>

                                        </td>

                                        <td class="col-xs-6"
                                            style="width:100%; text-align:right; position:relative; height: 100%; display:flex; justify-content:center; ">

                                            <table style="width:100%;  position:relative; left:30%; ">
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
                                                            style="font-size:12px; padding: 5px; text-align:left;"><b>Round Off</b>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div colspan="7" class="bg-sky text-bold"
                                                            style="font-size:12px; padding: 5px;">
                                                            <b>
                                                                
                                                                {{ $sale->round_off}}
                                                            </b>
                                                        </div>
                                      
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div colspan="7" class="bg-sky text-bold"
                                                            style="font-size:12px; padding: 5px; text-align:left;"><b>Other Charges</b>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div colspan="7" class="bg-sky text-bold"
                                                            style="font-size:12px; padding: 5px;">
                                                            <b>
                                                               {{ $sale->other_charges_amt ?? '00'}}
                                                            </b>
                                                        </div>
                                      
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <tr>
                                                        <td>
                                                            <div colspan="7" class="bg-sky text-bold"
                                                                style="font-size:12px; padding: 5px; text-align:left;"><b>Total Discount</b>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div colspan="7" class="bg-sky text-bold"
                                                                style="font-size:12px; padding: 5px;">
                                                                <b>
                                                                   {{$sale->discount_to_all_input ?? '00'}}
                                                                </b>
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
                                                            style="font-size:12px; padding: 5px; ">
                                                            <b>

                                                                <span
                                                                    id="amountNumeric">{{ $sale->grand_total}}</span>

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

                                                </div>


                                            </div>

                                        </td>
                                    </tr>

                                </table>
                            </div>

                            <div
                                style="width:100%;  border-top:1px solid; margin-top: :20px; display:flex;  justify-content:center; align-items:center; gap:5px;">
                                <table cellspacing="0px" cellpadding="2px" style="width:100%; height:auto;" class="terms_seal">
                                    <tr style=" border-bottom:1px solid; display:flex; border-right:1px solid;" id="terms_seal">
                                        <td style="font-size:12px;  width:60%; border-right:1px solid;" id="terms">
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
                                            style="width:50%; display:flex; position:relative; justify-content:end; font-size:13px; height:100%; ">
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


                        <div class="card-header" id="buttons" style="display: flex; gap: 10px;">
                            <div class="col-xs-6">
                                <button class="btn btn-primary" id="download_Btn">
                                    <i class="fa-solid fa-file-pdf"></i> Download Pdf
                                </button>
                            </div>
                            <div class="col-xs-6">
                                <button class="btn btn-primary" onclick="printPreview()" id="print-button">
                                    <i class="fa fa-print"></i> Print
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script>
        function printPreview() {
            // Store buttons element and its original display style
            var buttonsElement = document.getElementById('buttons');
            var originalButtonDisplay = buttonsElement.style.display;

            // Hide buttons
            buttonsElement.style.display = 'none';

            var printContents = document.getElementById('preview_data').innerHTML;
            var originalContents = document.body.innerHTML;

            // Add print styles
            var style = document.createElement('style');
            style.type = 'text/css';
            style.media = 'print';
            style.innerHTML = `
                @page {
            size: A4 portrait !important;
            margin: 10mm 10mm 10mm 10mm;
        }
        
        body {
            -webkit-print-color-adjust: exact;
            color-adjust: exact;
            print-color-adjust: exact;
            width: 100% !important;
            height: 100% !important;
            font-size: 8pt !important;
            background: white !important;  /* Force white background */
        }

        /* Remove grey backgrounds */
        .card, 
        .card-body,
        .container-fluid,
        .content-body {
            background: white !important;
            box-shadow: none !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        /* Rest of your existing styles... */
        
        /* Ensure only specific elements have background colors */
        .bg-sky {
            background-color: #E8F3FD !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        /* Remove any other unwanted backgrounds */
        * {
            background-color: transparent !important;
        }
        
        /* Exception for elements that need background */
        .bg-sky, 
        thead tr,
        .gsttable thead tr {
            background-color: #E8F3FD !important;
        }

        @media print {
            .Not-paid {
                background-color: #ffebee !important;
                color: #c62828 !important;
                border: 1px solid #c62828 !important;
              
                display: inline-block !important;
                font-weight: bold !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            
            .paid {
                background-color: #e8f5e9 !important;
                color: #2e7d32 !important;
                border: 1px solid #2e7d32 !important;
          
                display: inline-block !important;
                font-weight: bold !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            
            /* Ensure parent containers don't hide the status */
            div[style*="position"] {
                position: relative !important;
                display: block !important;
                page-break-inside: avoid !important;
            }
        }
    }
            `;

            document.getElementsByTagName('head')[0].appendChild(style);
            document.body.innerHTML = printContents;

            window.print();

            // Restore original content
            document.body.innerHTML = originalContents;

            // Re-get the buttons element since we replaced the body content
            buttonsElement = document.getElementById('buttons');
            // Restore the buttons display to flex
            buttonsElement.style.display = 'flex';

            // Add a fallback in case the display isn't restored
            setTimeout(() => {
                if (buttonsElement.style.display === 'none') {
                    buttonsElement.style.display = 'flex';
                }
            }, 100);
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
        document.getElementById('download_Btn').addEventListener('click', function() {
         
            const buttonsElement = document.getElementById('buttons');
         
            buttonsElement.style.display = 'none';
    
            const element = document.getElementById('preview_data');
    
            // Configure the PDF options
            const opt = {
                margin: 1,
                filename: 'purchase_invoice.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { 
                    scale: 3,
                    useCORS: true,
                    letterRendering: true
                },
                jsPDF: { 
                    unit: 'mm', 
                    format: 'a4', 
                    orientation: 'portrait' 
                }
            };
    
            // Generate PDF
            html2pdf().from(element).set(opt).save()
                .then(() => {
                    // Show buttons after PDF is generated
                    buttonsElement.style.display = 'flex';
                  
                    
                })
                .catch(error => {
                    console.error('Error generating PDF:', error);
                    buttonsElement.style.display = 'flex';
                   
                    
                });
        });
    </script>
    

@endsection
