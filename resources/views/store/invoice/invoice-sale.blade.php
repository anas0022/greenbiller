@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')
<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">

                <div class="card" id="preview_data">

                    <div class="card-header">
                    <div style=" width:100%; display:flex; gap:20px; justify-content:end;">
                                        <p style="font-size:15px;"><b>Bill No :
                                                {{$sale->prefix}}/{{$sale->sales_code}}</b></p>
                                        <span style="display:flex; gap:10px;">
                                            <p style="font-size:15px;"><b>Reference No : {{$sale->reference_no }}</b>
                                            </p><br>
                                            <p style="right:0%; position:relative; font-size:15px;"><b>Date :
                                                    {{$sale->created_on}}</b></p>
                                        </span>
                                    </div>
                    </div>

                    <div class="card-body" id="invoicebox">



                        <style type="text/css">
                              @media print {
    body {
        -webkit-print-color-adjust: exact; /* Adjusts color to match screen */
        color-adjust: exact; /* For Firefox */
        print-color-adjust: exact; 
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
      
    }
    .item {
        border-bottom: 1px solid gray !important; /* Forces the border to appear */
    }
    table {
        border-collapse: collapse; /* Ensures borders are continuous */
    }
}
@media print and (orientation: portrait) {
    td {
        /* Replace with your desired font */
        font-size: 12px !important; /* Adjust the size as needed */
    }
}


                           /*  td{
                                font-size: 10px;
                                text-align: center;
                            }
                            .top_rw {
                                background-color: #f4f4f4;
                            }

                         

                                /* Add specific border styles to ensure they are printed 
                                table,
                                th,
                                td {
                                    border: 1px solid black;
                                    /* Define border styles 
                                    border-collapse: collapse;
                                }

                                /* Ensure padding and layout are print-friendly 
                                table {
                                    width: 100%;
                                }

                                .invoice-box table tr.heading td {
                                    background: #eee;
                                    border-bottom: 1px solid #ddd;
                                    font-weight: bold;
                                    font-size: 12px;
                                }

                              /*   .invoice-box table tr.details td {
                                    padding-bottom: 10px;
                                } 

                                .invoice-box table tr.item td {
                                    border-bottom: 1px solid #eee;
                                }

                                .invoice-box table tr.item.last td {
                                    border-bottom: none;
                                }

                                .invoice-box table tr.total td:nth-child(2) {
                                    border-top: 2px solid #eee;
                                    font-weight: bold;
                                }
                            }



                            button {
                                padding: 5px 10px;
                                font-size: 14px;
                            }

                            .invoice-box {

                                margin: auto;
                                padding: 10px;
                                font-size: 14px;
                                line-height: 24px;
                                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                                color: #555;
                            }



                            .invoice-box table {
                                width: 100%;
                                line-height: inherit;
                                text-align: left;
                                border-bottom: solid 1px #ccc;
                            }

                            .invoice-box table td {
                                /*padding: 2px;
                                vertical-align: middle;
                            }

                            .invoice-box table tr td:nth-child(2) {
                                text-align: right;
                            }

                            /* .invoice-box table tr.top table td {
                                padding-bottom: 20px;
                            } 

                            .invoice-box table tr.top table td.title {
                                font-size: 45px;
                                line-height: 45px;
                                color: #333;
                            }

                            .invoice-box table tr.heading td {
                                background: #eee;
                                border-bottom: 1px solid #ddd;
                                font-weight: bold;
                                font-size: 12px;
                            }

                           /*  .invoice-box table tr.details td {
                                padding-bottom: 20px;
                            } 

                            .invoice-box table tr.item td {
                                border-bottom: 1px solid #eee;
                            }

                            .invoice-box table tr.item.last td {
                                border-bottom: none;
                            }

                            .invoice-box table tr.total td:nth-child(2) {
                                border-top: 2px solid #eee;
                                font-weight: bold;
                            }

                            @media only screen and (max-width: 600px) {
                                .invoice-box table tr.top table td {
                                    width: 100%;
                                    display: block;
                                    text-align: center;
                                }

                                .invoice-box table tr.information table td {
                                    width: 100%;
                                    display: block;
                                    text-align: center;
                                }

                                table,
                                th,
                                td {
                                    border: 1px solid black !important;
                                 /*    padding: 5px;
                                }
                            }

                            #invoicebox {
                                page-break-inside: avoid;
                            }

                            /** RTL 
                            .rtl {
                                direction: rtl;
                                font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                            }

                            .rtl table {
                                text-align: right;
                            }

                            .rtl table tr td:nth-child(2) {
                                text-align: left;
                            }

                            table,
                            th,
                            td {
                                border: 1px solid black !important;
                                padding: 2px;
                            }

                            .gsttable {
                                font-size: 10px;
                            }

                            .page-break {
                                page-break-before: always;
                            }

                            .page-break {
                                page-break-before: always;
                            }

                            .invoice-articles-table {
                                padding-bottom: 50px;

                            } */
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


                        <div class="invoice-box" >
                            
                            <table cellpadding="0" cellspacing="0">
                             
                               

                               
                            <div style="width:100%; display:flex; justify-content:center; ">
                                <div style="width:100%; display:flex;  gap:30px">
                                    <div style="width:40% font-size:10px;">
                                        <h5 style="font-size:15px;">
                                            {{$store->firstWhere('id', $sale->store_id)->store_name}}</h5>
                                        <div style="font-size:12px; max-width: 200px; "> Address:
                                            {{$store->firstWhere('id', $sale->store_id)->address}}</div>
                                        <div style="font-size:12px;"> Google Pay:
                                            {{$store->firstWhere('id', $sale->store_id)->google_pay_no}}</div>
                                        <div style="font-size:12px;"> Gst:
                                            {{$store->firstWhere('id', $sale->store_id)->gst_no}}</div>
                                        <div style="font-size:12px;"> Phone:
                                            {{$store->firstWhere('id', $sale->store_id)->mobile}}</div>
                                    </div>
                                    <div>
                                        <div colspan="3">
                                            <h5 style="font-size:15px;">Bill To:</h4>
                                                <div style="font-size:12px;">
                                                    {{ $customer->firstWhere('id', $sale->customer_id)->customer_name ?? 'N/A' }}<br>
                                                    @php
                                                        $customerData = $customer->firstWhere('id', $sale->customer_id);
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
                                                        <script
                                                            src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                        <script>
                                                            $('#mobile').on('submit', function (e) {
                                                                e.preventDefault(); // Prevent the default form submission

                                                                $.ajax({
                                                                    url: "{{ route('customer.mobile') }}",
                                                                    type: "PUT", // Use POST method
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
                                                        <script
                                                            src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                        <script>
                                                            $('#email').on('submit', function (e) {
                                                                e.preventDefault(); // Prevent the default form submission

                                                                $.ajax({
                                                                    url: "{{ route('customer.email') }}",
                                                                    type: "PUT", // Use POST method
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
                                                        </script> <br>
                                                    @endif -->
                                                    @if (!empty($customerData->address))
                                                        <div style="max-width:200px;"> Address :
                                                            {{ $customerData->address }} </div>
                                                    @else
                                                        <form id="address">
                                                            @csrf
                                                            <input type="hidden" type="hidden"
                                                                value=" {{ $customer->firstWhere('id', $sale->customer_id)->id ?? 'N/A' }}"
                                                                name="id">
                                                            <textarea name="address" id=""
                                                                placeholder="please enter your address"></textarea>
                                                            <button type="submit">Submit</button>
                                                        </form>
                                                        <script
                                                            src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                        <script>
                                                            $('#address').on('submit', function (e) {
                                                                e.preventDefault(); // Prevent the default form submission

                                                                $.ajax({
                                                                    url: "{{ route('customer.address') }}",
                                                                    type: "PUT", // Use POST method
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
                                                        <br>
                                                    @endif
                                                    @if (!empty($customerData->gst_number))
                                                        GST : {{ $customerData->gst_number  }}<br>
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
                                                        <script
                                                            src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                        <script>
                                                            $('#gst').on('submit', function (e) {
                                                                e.preventDefault(); // Prevent the default form submission

                                                                $.ajax({
                                                                    url: "{{ route('customer.gst') }}",
                                                                    type: "PUT", // Use POST method
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
                                                        <br>
                                                    @endif


                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <div
                                    style="display:flex; margin-top:10px; float:right; width:60%; flex-direction: column;  justify-content:cente;">
                                    
                                    <div style=" width:100%; display:flex; gap:30px; justify-content:center;">
                                        <p style="font-size:15px;">{!! $pay !!} <br> Scan To pay</p>



                                        <p style="font-size:15px;"> {!! $qrCode !!} <br> Preview</p>
                                        <p style="font-size:15px;"> {!! $storeurlstore !!} <br> Store Items</p>
                                    </div>
                                    
                                </div>

                            </div>


</table>

                                    </td>
                                </tr>

                                <td colspan="3">
                                    <table cellspacing="0px" cellpadding="2px">



                                        <tr class="bg-sky text-bold">
                                            <td  style="font-size:12px; text-align:center;">
                                                SL NO
                                            </td>
                                            <td  style="font-size:12px; text-align:center;">
                                                ITEM
                                            </td>
                                            <td  style="font-size:12px; text-align:center;">
                                                HSN/ SAC
                                            </td>
                                            <td  style="font-size:12px; text-align:center;">
                                               Part_no
                                            </td>
                                            <td  style="font-size:12px; text-align:center;">
                                                Quantity
                                            </td>
                                            <td  style="font-size:12px; text-align:center;">
                                                Rate <br>
                                                (Incl. of Tax)
                                            </td>
                                            <td  style="font-size:12px; text-align:center;">
                                                MRP
                                            </td>



                                            <td  style="font-size:12px; text-align:center;">
                                                GST (INR)
                                            </td>
                                            <td  style="font-size:12px; text-align:center;">
                                                Amount (INR)
                                            </td>
                                        </tr>
                                        @php
                                            $totalQuantity = 0;
                                            $totalAmount = 0;
                                        @endphp
                                        @foreach ($sales_itemdata as $index => $item)
                                                                                @php
                                                                                    $quantity = $item->sales_qty;
                                                                                    $amount = $item->total_cost;

                                                                                    // Accumulate totals
                                                                                    $totalQuantity += $quantity;
                                                                                    $totalAmount += $amount;
                                                                                @endphp

                                                                                <tr class="item" style="border-bottom:1px solid gray;">
                                                                                <td  style="font-size:10px; text-align:center; ">
                                                                                        {{$index + 1}}
                                                                                    </td>

                                                                                    <td  style="font-size:10px;">
                                                                                        {{ preg_replace('/\s*\(.*?\)/', '', $item->item_name) }}

                                                                                      

                                                                                    </td>
                                                                                    <td style="font-size:10px; text-align:center;">
                                                                                         
                                                                                        {{ $item->hsn_code }}
                                                                                    </td>
                                                                                    <td  style="font-size:10px; text-align:center;">
                                                                                    @if(is_null($item->part_no))  
                                                                                            <form id="part_no" > 
    @csrf
    <input type="text" id="item_id" name="id" value="{{ $item->item_id }}"> 
    <input type="text" name="part_no" placeholder="Enter part number here" value="" id="part_no_input">
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
                                                                             
                                                                                    <td  style="font-size:10px; text-align:center;">
                                                                                        {{ $item->sales_qty }} 
                                                                                        @if ($unit_id->firstWhere('id',  $item->unit_id)->unit_name =="Ltr")
                                                                                        Bottle 
                                                                                        @else
                                                                                        {{$unit_id->firstWhere('id',$item->unit_id)->unit_name ?? 'NA'}}
                                                                                        @endif
                                                                                       <br>
                                                                                      


                                                                                    
                                                                                        
                                                                                    </td>
                                                                                    <td style="font-size:10px; text-align:center;">
                                                                                        {{ $item->rate_inclusive_tax }}
                                                                                    </td>
                                                                                    <td  style="font-size:10px; text-align:center;">

                                                                                        {{ $item->mrp }}
                                                                                    </td>
                                                                                    <td  style="font-size:10px; text-align:center;">
                                                                                        <?php
                                            // Clean up the value to ensure it is numeric
                                            $pricePerUnit = preg_replace('/[^0-9.]/', '', $item->price_per_unit);
                                            $taxPercentage = preg_replace('/[^0-9.]/', '', $tax->firstWhere('id', (int) $item->tax_id)->per);

                                            // Calculate the tax amount
                                            $taxAmount = number_format(((float) $pricePerUnit * (float) $taxPercentage) / 100, 2);

                                            echo $taxAmount;
                                                                                    ?>


                                                                                    </td>


                                                                                    <td  style="font-size:10px; text-align:center;">
                                                                                        {{ $item->total_cost }}
                                                                                    </td>
                                                                                </tr>
                                        @endforeach
                                        <tr  class="bg-sky text-bold" style="border-bottom:1px solid;">
                                            <td style="font-size:12px; text-align:center;">
                                                Total
                                            </td>
                                            <td style="text-align:right; font-weight:bold;"></td>
                                            <td style="width:10%; text-align:center;">

                                            </td>
                                            <td style="width:15%; text-align:center;">

                                            </td>
                                            <td style="font-size:12px; text-align:center;">
                                                {{ $totalQuantity }}
                                            </td>
                                            
                                            <td style="width:15%; text-align:center;">

                                            </td>
                                            <td style="width:15%; text-align:right;">

                                            </td>
                                            <td style="width:15%; text-align:right;">

                                            </td>
                                            <td style="font-size:12px; text-align:center;">
                                                {{ $totalAmount }}
                                            </td>
                                        </tr>
                                        <tr class="item">
                                            <td style="width:90%;" colspan="5"> 
<p   style="font-size:12px; " >Tax Summery</p>
                                                <div class="gsttable">
                                                    <table style="border:0px !important;">
                                                    <tr class="bg-sky text-bold">
                                                            <td rowspan="2" colspan="5" style="font-size:12px; padding-right:12px; height:60px;" class="text-center">HSN/SAC</td>
                                                            <td rowspan="2" colspan="5" style="font-size:12px;" class="text-center">Taxable amount</td>
                                                            <td colspan="2" colspan="5" style="font-size:12px;" class="text-center">CGST</td>
                                                            <td colspan="2" colspan="5" style="font-size:12px;" class="text-center">SGST</td>
                                                            <td rowspan="2"style="font-size:12px;" class="text-center" >Total Tax</td>
                                                        </tr>
                                                        <tr class="bg-sky text-bold">

                                                            <td colspan="1" style="font-size:12px; margin-right:8px;" class="text-center">Rate (%)</td>
                                                            <td colspan="1" style="font-size:12px;padding-left:8px;" class="text-center">Amt (INR)</td>
                                                            <td  style="font-size:12px; padding-left:8px;" class="text-center">Rate (%)</td>
                                                            <td  style="font-size:12px; padding-left:8px;" class="text-center">Amt (INR)</td>

                                                        </tr>

                                                        @foreach ($sales_itemdata as $index => $item)
                                                        <tr >
                                                                                                                    <td style="font-size:12px;" class="text-center" colspan="5">{{$item->hsn_code}}</td>
                                                                                                                    <td style="font-size:12px;" class="text-center"  colspan="5">{{$item->rate_inclusive_tax}}</td>
                                                                                                                    <td style="font-size:12px;" class="text-center" >{{ number_format($tax->firstWhere('id', $item->tax_id)->per / 2, 2) }}
                                                                                                                    </td>
                                                                                                                    <?php
// Clean up the value to ensure it is numeric
$pricePerUnit = preg_replace('/[^0-9.]/', '', $item->price_per_unit);
$taxPercentage = preg_replace('/[^0-9.]/', '', $tax->firstWhere('id', (int) $item->tax_id)->per);

// Calculate the tax amount
$taxAmount = ((float) $pricePerUnit * (float) $taxPercentage) / 100;

// Divide the tax amount by 2 and format it to two decimal places
$halfTaxAmount1 = number_format($taxAmount / 2, 2);
$halfTaxAmount2 = number_format($taxAmount / 2, 2);
                                                                                                                    ?>

                                                                                                                    <td style="font-size:12px;" class="text-center">
                                                                                                                        <?php    echo $halfTaxAmount1; ?>
                                                                                                                    </td>

                                                                                                                    <td style="font-size:12px;" class="text-center">{{ number_format($tax->firstWhere('id', $item->tax_id)->per / 2, 2) }}
                                                                                                                    </td>

                                                                                                                    <td style="font-size:12px;" class="text-center">
                                                                                                                        <?php    echo $halfTaxAmount2; ?>
                                                                                                                    </td>

                                                                                                                    <td style="font-size:12px;" class="text-center">
                                                                                                                        <?php
// Calculate the total of the two half-tax amounts
$totalHalfTax = floatval(str_replace(',', '', $halfTaxAmount1)) + floatval(str_replace(',', '', $halfTaxAmount2));

echo number_format($totalHalfTax, 2);
                                                                                                                        ?>
                                                                                                                    </td>


   </tr>
@endforeach

                                                    </table>
                                                </div>


                                            </td>
                                            <td style="width:20%; text-align:right;  height: 100%;  " colspan="4">
                                                <div class="subtotalarea" style="width:100%; height:100%; display:flex;  justify-content:center; ">
                                                    <table style="border:0px !important;">
                                                        <tr colspan="2">
                                                            <td colspan="2" class="bg-sky text-bold" style="font-size:12px; padding: 5px;">Subtaotal</td>
                                                            <td colspan="2" class="bg-sky text-bold" style="font-size:12px; padding: 5px;">{{ $sale->subtotal }}</td>
                                                        </tr>
                                                        <tr colspan="2">
                                                            <td colspan="1.8" class="bg-sky text-bold" style="font-size:12px; padding: 5px;"><b>Total</b></td>
                                                            <td colspan="2" class="bg-sky text-bold" style="font-size:12px; padding: 5px;"><b>{{ round($sale->grand_total) }}  (<b id="amountInWords"></b>)</b></td>
                                                        </tr>
                                                       
                                                      
                                       

                                        <tr >
                                            <td colspan="2" style="font-size:12px; padding: 5px;" class="bg-sky text-bold">Received </td>
                                            <td colspan="2" style="font-size:12px; padding: 5px;" class="bg-sky text-bold"><input type="text" value="00" style="border:none;" class="bg-sky text-bold"></td>
                                        </tr>
                                        <tr colspan="2" class="bg-sky text-bold">
                                            <td style="font-size:12px; padding: 5px;" class="bg-sky text-bold">Balance </td>
                                            <td  colspan="2" style="width:100%; text-align:end; font-size:12px; padding: 5px;" class="bg-sky text-bold"><input type="text" value="{{ round($sale->grand_total) }}"
                                                    style="border:none; " class="bg-sky text-bold"></td>
                                        </tr>
                                        <tr>
                            
                        </tr>

                        </table></div></td>
                        </td>


                                       
                                    </table>
                        </div>
                        </td>

                        </tr>
                        </td>

                        </table>

                        <div colspan="3" style="width:100%; ">
                                <table cellspacing="0px" cellpadding="2px" style="width:100%;">
                                    <tr style="width:100%;">
                                        <td width="50%">
                                            <b> Terms & Conditions: </b> <br>
                                            {{ $sale->invoice_terms }}
                                        </td>
                                        <td style="width:100%; display:flex; flex-direction:column; align-items:end;justify-content:end; " >

                                            <b> Authorized Signature </b>
                                            <br>
                                            <img src="{{asset('storage/' . $store->firstWhere('id', $sale->store_id)->signature)}}"
                                                style="width: 150px; height: 100px;">

                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td width="100%" colspan="2">
                                            * This is a computer generated invoice and does not
                                            require a physical signature
                                        </td>

                                    </tr>
                                  
                                </table>
                               
                            </div>
                        

                                                </span>
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <!-- T&C & Bank Details & signatories End -->


                            <tr>
                                <td colspan="16" style="text-align: center;font-size: 11px;">

                                </td>
                            </tr>

                            <tr>
                                <td colspan="16" style="text-align: center;font-size: 11px;">
                                    <center>
                                        <span style="font-size: 11px;text-transform;">
                                            <!--span style="font-size: 11px;text-transform: uppercase;">
          This is Computer Generated Invoice-->
                                            <span style="font-size: 11px;text-transform: uppercase;">
                                                Thank You For Choosing Our Services
                                            </span>
                                    </center>
                                </td>
                            </tr>
                        </tfoot>
                        <div class="card-header" id="buttons">

<div class="col-xs-6">
    <button class="btn btn-primary" id="download_Btn"><i class="fa-solid fa-file-pdf"></i> Download
        Pdf</button>

</div>
<div class="col-xs-6">
    <button class="btn btn-primary" onclick="printlabels()" id="print-button"><i class="fa  fa-print"></i>
        Print</button>

</div>

</div>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
function printlabels() {
        PrintMe("preview_data");
    }
    function PrintMe(DivID) {
        var disp_setting = "toolbar=no,location=no,";
        disp_setting += "directories=no,menubar=no,";
        disp_setting += "scrollbars=yes,width=800, height=600, left=100";

        var content_value = document.getElementById(DivID).innerHTML;
        var docprint = window.open("", "_blank", disp_setting);

        docprint.document.open();
        docprint.document.write('<html><head><style type="text/css">');
        

        docprint.document.write('</style></head><body onload="window.print(); window.close();">');
        docprint.document.write('<html><head><style>table.td { border-bottom:1px solid }</style></head><body>');  
        docprint.document.write('<html><head><style>button { display: none; }</style></head><body>');
        docprint.document.write(content_value);
        docprint.document.write('</body></html>');

        docprint.document.close();
        docprint.focus();
    }
    // Function to download the content as PDF


</script>
<script>
    function numberToWords(number) {
        const ones = ["", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine"];
        const teens = ["", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen"];
        const tens = ["", "ten", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety"];
        const thousands = ["", "thousand", "million", "billion", "trillion"];

        if (number === 0) return "zero";

        let integerPart = Math.floor(number);
        let decimalPart = Math.round((number - integerPart) * 100); // Two decimal places

        let word = "";
        let i = 0;

        // Convert integer part
        while (integerPart > 0) {
            let chunk = integerPart % 1000;

            if (chunk) {
                let chunkWords = "";
                if (chunk > 99) {
                    chunkWords += ones[Math.floor(chunk / 100)] + " hundred ";
                    chunk %= 100;
                }

                if (chunk > 10 && chunk < 20) {
                    chunkWords += teens[chunk - 10] + " ";
                } else {
                    chunkWords += tens[Math.floor(chunk / 10)] + " ";
                    chunkWords += ones[chunk % 10] + " ";
                }

                word = chunkWords + thousands[i] + " " + word;
            }

            integerPart = Math.floor(integerPart / 1000);
            i++;
        }

        // Convert decimal part if it exists
        if (decimalPart > 0) {
            word += "and " + decimalPart + "/100";
        }

        return word.trim();
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Round the totalAmount to the nearest integer
        const totalAmount = Math.round({{ $sale->grand_total }});
        document.getElementById('amountInWords').textContent = numberToWords(totalAmount);
    });
</script><script>
    const download_button = document.getElementById('download_Btn');
    const content = document.getElementById('invoicebox');

    download_button.addEventListener('click', async function () {
        // Scroll to the top to capture content properly
        window.scrollTo({ top: 0, behavior: 'smooth' });

        setTimeout(async () => {
            const filename = 'table_data.pdf';

            const opt = {
                margin: 0.2,  // Small margin to prevent cutoff
                filename: filename,
                image: { type: 'jpeg', quality: 1.0 },
                html2canvas: { scale: 5, letterRendering: true },  // Higher scale for better quality
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'landscape'
                }
            };

            console.log('Generating PDF...');
            try {
                await html2pdf().set(opt).from(content).save();
                console.log('PDF generated successfully');
            } catch (error) {
                console.error('Error:', error.message);
            }
        }, 500);
    });
</script>