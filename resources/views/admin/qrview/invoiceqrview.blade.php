
<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">

                <div class="card" id="preview_data">

                    <div class="card-header">
                    </div>

                    <div class="card-body">



                        <style type="text/css">
                            td{
                                font-size: 10px;
                                text-align: center;
                            }
                            .top_rw {
                                background-color: #f4f4f4;
                            }

                            @media print {
                                body {
                                    -webkit-print-color-adjust: exact;
                                    color-adjust: exact;
                                    /* For newer browsers */
                                    print-color-adjust: exact;
                                }

                                /* Add specific border styles to ensure they are printed */
                             /*    table,
                                th,
                                td {
                                    border: 1px solid black;
                                    border-collapse: collapse;
                                } */

                                /* Ensure padding and layout are print-friendly */
                                table {
                                    width: 100%;
                                }

                                /* .invoice-box table tr.heading td {
                                    background: #eee;
                                    border-bottom: 1px solid #ddd;
                                    font-weight: bold;
                                    font-size: 12px;
                                } */

                              /*   .invoice-box table tr.details td {
                                    padding-bottom: 10px;
                                } */

                              /*   .invoice-box table tr.item td {
                                    border-bottom: 1px solid #eee;
                                }

                                .invoice-box table tr.item.last td {
                                    border-bottom: none;
                                }

                                .invoice-box table tr.total td:nth-child(2) {
                                    border-top: 2px solid #eee;
                                    font-weight: bold;
                                } */
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
                          
                            }

                            .invoice-box table td {
                                /*padding: 2px;*/
                                vertical-align: middle;
                            }

                            .invoice-box table tr td:nth-child(2) {
                                text-align: right;
                            }

                            /* .invoice-box table tr.top table td {
                                padding-bottom: 20px;
                            } */

                            .invoice-box table tr.top table td.title {
                                font-size: 45px;
                                line-height: 45px;
                                color: #333;
                            }

                           

                           /*  .invoice-box table tr.details td {
                                padding-bottom: 20px;
                            } */

                        /*     .invoice-box table tr.item td {
                                border-bottom: 1px solid #eee;
                            }

                            .invoice-box table tr.item.last td {
                                border-bottom: none;
                            }

                            .invoice-box table tr.total td:nth-child(2) {
                                border-top: 2px solid #eee;
                                font-weight: bold;
                            } */

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

                                
                            }

                            #invoicebox {
                                page-break-inside: avoid;
                            }

                            /** RTL **/
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
                            td
                       {
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

                            }
                        </style>

                        <div class="invoice-box" id="invoicebox">
                            <table cellpadding="0" cellspacing="0">
                                <tr style="border: 0px !important; display: flex; justify-content: start; padding:15px; align-items: center; gap:10px;"
                                    id="logo_property">

                                    <td style="text-align: left; width:20%; border: 0px !important;">
                                    <img src="{{asset('storage/' . $store->firstWhere('id', $sale->store_id)->logo)}}"
                                    style="width: 150px; height: 100px;">

                                    </td>
                                    <td style="width:70%; float: left; text-align: left; border: 0px !important; ">
                                        <h3>{{ $store->store_name }}
                                        </h3>
                                        Address:  {{$store->address}}
                                         <br>
                                        Phone: {{$store->mobile}}
                                    </td>
                                  
                             
                                </tr>
                               
                                </tr>

                                <tr class="information" style="border:0px">
                                    <td colspan="3">
                                        <table>
                                            <tr>
                                                <td colspan="2" style="text-align:start;">
                                                    <b> Bill To:</b>
                                                </td>
                                                <td style="text-align: left;"> <b> Invoice Details </b>

                                                </td>
                                            </tr>
                                            <tr>
                                            <td colspan="2" style="text-align:start;">
      <!-- Include CSRF token for security -->

        

      

  
           Mobile : {{$customer->mobile}} <br>
    
         
         

           Email : {{$customer->mobile}} <br>
      
      
            <br>
    


          Address :  {{$customer->address}}   <br>

            <br>

    GST : {{$customer->gst_number}}<br>




</td>

                                                </td>
                                                <td style="text-align: left;">
                                                    No: {{$sale->prefix}}<br>
                                                    Date: {{$sale->created_on}}<br>

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <td colspan="3">
                                    <table cellspacing="0px" cellpadding="2px">



                                        <tr class="heading">
                                            <td style="width:5px; text-align:center;">
                                                SL NO
                                            </td>
                                            <td style="width:25%; text-align:center;">
                                                ITEM
                                            </td>
                                            <td style="width:10%; text-align:center;">
                                                HSN/ SAC
                                            </td>
                                            <td style="width:10%; text-align:center;">
                                               Part_no
                                            </td>
                                            <td style="width:10%; text-align:center;">
                                                Quantity
                                            </td>
                                            <td style="width:15%; text-align:center;">
                                                Rate <br>
                                                (Incl. of Tax)
                                            </td>
                                            <td style="width:25%; text-align:center;">
                                                MRP
                                            </td>



                                            <td style="width:15%; text-align:right;">
                                                GST (INR)
                                            </td>
                                            <td style="width:15%; text-align:right;">
                                                Amount (INR)
                                            </td>
                                        </tr>           
                                        @php
                                            $totalQuantity = 0;
                                            $totalAmount = 0;
                                        @endphp
                                        @foreach ($sale_items as $index=>$sales)


@php
                                                                                    $quantity = $sales->sales_qty;
                                                                                    $amount = $sales->total_cost;

                                                                                    // Accumulate totals
                                                                                    $totalQuantity += $quantity;
                                                                                    $totalAmount += $amount;
                                                                                @endphp
                                    
                                      

                                                                                <tr class="item">
                                                                                    <td style="width:5px;">
                                                                                   {{$index+1}}
                                                                                    </td>

                                                                                    <td style="width:25%; text-align:center;" >
                                                                                       
{{$sales->item_name}}                       {{ preg_replace('/\s*\(.*?\)/', '', $sales->item_name) }}
                                                                                      

                                                                                    </td>
                                                                                    <td style="width:15%; text-align:center;">
                                                                                    {{$sales->hsn_code}}
                                                                                    </td>
                                                                                    <td style="width:15%; text-align:center;">  
                                                                                    {{ str_replace(['(', ')'], '', $sales->part_no) }}

                                                                                        
                                                                                    </td>
                                                                                    <td style="width:16%; text-align:center;">
                                                                                    {{ $sales->sales_qty }} 
                                                                                    {{$unit_id->firstWhere('id',  $sales->unit_id)->unit_name }}
                                                                                    </td>
                                                                                    <td style="width:16%; text-align:center;">
                                                                                    {{$sales->rate_inclusive_tax}}
                                                                                    </td>
                                                                                    <td style="width:16%; text-align:center;">
                                                                                    {{$sales->mrp}}
                                                                                  
                                                                                    </td>
                                                                                    <td style="width:16%; text-align:center;">
                                                                                       
                                                                                    <?php
                                            // Clean up the value to ensure it is numeric
                                            $pricePerUnit = preg_replace('/[^0-9.]/', '', $sales->price_per_unit);
                                            $taxPercentage = preg_replace('/[^0-9.]/', '', $tax->firstWhere('id', (int) $sales->tax_id)->per);

                                            // Calculate the tax amount
                                            $taxAmount = number_format(((float) $pricePerUnit * (float) $taxPercentage) / 100, 2);

                                            echo $taxAmount;
                                                                                    ?>


                                                                                    </td>


                                                                                    <td style="width:16%; text-align:right;">
                                                                                    {{ $sales->total_cost }}
                                                                                    </td>
                                                                                </tr>
                                                                  @endforeach
                              
                                        <tr class="heading">
                                            <td style="width:15%;">
                                                Total
                                            </td>
                                            <td style="text-align:right; font-weight:bold;"></td>
                                            <td style="width:10%; text-align:center;">

                                            </td>
                                            <td style="width:15%; text-align:center;">

                                            </td>
                                            <td style="width:10%; text-align:center;">
                                            {{ $totalQuantity }}
                                            </td>
                                            
                                            <td style="width:15%; text-align:center;">

                                            </td>
                                            <td style="width:15%; text-align:right;">

                                            </td>
                                            <td style="width:15%; text-align:right;">

                                            </td>
                                            <td style="width:15%; text-align:right;">
                                            {{ $totalAmount }}
                                            </td>
                                        </tr>



                                        <tr class="item">
                                            <td style="width:90%;" colspan="5"> 
<p  style="width:100%; text-align:start;">Tax Summery</p>
                                                <div class="gsttable">
                                                    <table style="border:0px !important;">
                                                        <tr>
                                                            <td rowspan="2">HSN/SAC</td>
                                                            <td rowspan="2">Taxable amount</td>
                                                            <td colspan="2" style="text-align: center;">CGST</td>
                                                            <td colspan="2" style="text-align: center;">SGST</td>
                                                            <td rowspan="2">Total Tax</td>
                                                        </tr>
                                                        <tr>

                                                            <td>Rate (%)</td>
                                                            <td>Amt (INR)</td>
                                                            <td>Rate (%)</td>
                                                            <td>Amt (INR)</td>

                                                        </tr>
                                                        @foreach ($sale_items as $index=>$sales)
                                                    
                                                                                                                <tr>
                                                                                                                <td>{{$sales->hsn_code}}</td>
                                                                                                                    <td>{{$sales->rate_inclusive_tax}}</td>
                                                                                                                    <td>{{ number_format($tax->firstWhere('id', $sales->tax_id)->per / 2, 2) }}
                                                                                                                  </td>
                                                                                                                   <?php
                                                            // Clean up the value to ensure it is numeric
                                                            $pricePerUnit = preg_replace('/[^0-9.]/', '', $sales->price_per_unit);
                                                            $taxPercentage = preg_replace('/[^0-9.]/', '', $tax->firstWhere('id', (int) $sales->tax_id)->per);

                                                            // Calculate the tax amount
                                                            $taxAmount = ((float) $pricePerUnit * (float) $taxPercentage) / 100;

                                                            // Divide the tax amount by 2 and format it to two decimal places
                                                            $halfTaxAmount1 = number_format($taxAmount / 2, 2);
                                                            $halfTaxAmount2 = number_format($taxAmount / 2, 2);
                                                                                                                    ?>

                                                                                                                    <td>
                                                                                                                    <?php    echo $halfTaxAmount1; ?>
                                                                                                                    </td>

                                                                                                                    <td>
                                                                                                                    {{ number_format($tax->firstWhere('id', $sales->tax_id)->per / 2, 2) }}
                                                                                                                    </td>

                                                                                                                    <td>
                                                                                                                    <?php    echo $halfTaxAmount2; ?>
                                                                                                                    </td>

                                                                                                                    <td style="text-align:right;">
                                                                                                                    <?php
                                                            // Calculate the total of the two half-tax amounts
                                                            $totalHalfTax = floatval(str_replace(',', '', $halfTaxAmount1)) + floatval(str_replace(',', '', $halfTaxAmount2));

                                                            echo number_format($totalHalfTax, 2);
                                                                                                                        ?>
                                                                                                                    </td>

@endforeach

                                            
                                                        </tr>
                                                    </table>
                                                </div>


                                            </td>
                                            <td style="width:20%; text-align:right; " colspan="4">
                                                <div class="subtotalarea">
                                                    <table style="border:0px !important;">
                                                        <tr>
                                                            <td>Subtaotal</td>
                                                            <td>{{ $sale->subtotal }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Total</b></td>
                                                            <td><b>{{ round($totalAmount) }}</b></td>
                                                        </tr>
                                                        <tr>
                                                        <tr>
                                                            <td colspan="2"><b id="amountInWords"></b></td>

                                                        </tr>

                                        </tr>

                                        <tr>
                                            <td>Received :</td>
                                            <td><input type="text" value="00" style="border:none;"></td>
                                        </tr>
                                        <tr>
                                            <td>Balance :</td>
                                            <td><input type="text" value="{{ round($totalAmount) }}"
                                                    style="border:none;"></td>
                                        </tr>
                                    </table>
                        </div>
                        </td>

                        </tr>
                        </td>

                        </table>

                        <tr>
                            <td colspan="3">
                                <table cellspacing="0px" cellpadding="2px">
                                    <tr>
                                        <td width="50%">
                                            <b> Terms & Conditions: </b> <br>
                                            {{ $sale->invoice_terms }}
                                        </td>
                                        <td>

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
                               
                            </td>
                        
                        </tr>
                     
                        </table>
                    </div>


                </div>
            

                <div class="card-header" id="buttons">

                    <div class="col-xs-7" style="width:100%; display:flex; justify-content:end;">
                        <button class="btn btn-primary" id="download_Btn" style="background-color:blue; color:white;"><i class="fa-solid fa-file-pdf"></i> Download
                            Pdf</button>

                    </div>
                   

                </div>
            </div>
        </div>
    </div>
</div>
</div>



</div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Round the totalAmount to the nearest integer
        const totalAmount = Math.round({{ $totalAmount }});
        document.getElementById('amountInWords').textContent = numberToWords(totalAmount);
    });
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<script>
    const download_button = document.getElementById('download_Btn');
    const content = document.getElementById('invoicebox');

    download_button.addEventListener('click', async function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });

        setTimeout(async () => {
            const filename = 'table_data.pdf';

            const opt = {
                margin: 0,
                filename: filename,
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 4, letterRendering: true },
                jsPDF: {
                    unit: 'in',
                    format: [7, 9], // Custom page size: 11.69 inches width, 8.33 inches height
                    orientation: 'landscape'
                }
            };

            try {
                await html2pdf().set(opt).from(content).save();
            } catch (error) {
                console.error('Error:', error.message);
            }
        }, 500);
    });
</script>