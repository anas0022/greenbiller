
@extends('store//layouts/app')

@section('title', 'Home Page')

@section('content')
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
                            .top_rw {
                                background-color: #f4f4f4;
                            }
                            @media print {
    body {
        -webkit-print-color-adjust: exact; /* Chrome */
        print-color-adjust: exact; /* Firefox */
    }
}@media print {
    table,
                            th,
                            td {
                                border: 1px solid black !important;
                                padding: 5px;
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
                                /*padding: 2px;*/
                                vertical-align: middle;
                            }

                            .invoice-box table tr td:nth-child(2) {
                                text-align: right;
                            }

                            .invoice-box table tr.top table td {
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

                            .invoice-box table tr.details td {
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
                            th,
                            td {
                                border: 1px solid black !important;
                                padding: 5px;
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

                        <div class="invoice-box" id="formpdf">
                            <table cellpadding="0" cellspacing="0" id="formdisplay">
                            <tr style="border: 0px !important; display: flex; justify-content: start; padding:15px; align-items: center; gap:10px;" id="logo_property">

<td style="text-align: left; width:20%; border: 0px !important;">
<img src="{{asset('storage/'.$store->logo)}}" alt="" srcset=""  style="width:120px; height:120px;">

</td>
<td style="width:70%; float: left; text-align: left; border: 0px !important; ">
<h3>{{$store->store_name}}</h3>
    Address: {{$store->country}} , {{$store->state}}<br>
    Phone: {{$store->mobile}}<br>
</td>
</tr>
</tr>

                                <tr class="information">
                                    <td colspan="3">
                                        <table>
                                            <tr>
                                                <td colspan="2">
                                                    <b> Bill From:</b>
                                                    
                                                </td>
                                                
                                                <td style="text-align: left;"> <b> Invoice Details </b>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">

                                                {{ $suppliers->firstWhere('id', $purchase->supplier_id)->name ?? 'N/A' }}<br>
                                                {{ $suppliers->firstWhere('id', $purchase->supplier_id)->mobile ?? 'N/A' }}<br>
                                                {{ $suppliers->firstWhere('id', $purchase->supplier_id)->email ?? 'N/A' }}
                                                </td>
                                                <td style="text-align: left;">
                                                    No: <b>{{$purchase->purchase_code}}</b><br>
                                                    Date: <b>{{$purchase->created_on}}</b><br>

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <td colspan="3">
                                    <table cellspacing="0px" cellpadding="2px">
                               
                                        <tr class="heading">
                                            <td style="width:25%;">
                                                ITEM
                                            </td>
                                            <td style="width:10%; text-align:center;">
                                                HSN/ SAC
                                            </td>
                                            <td style="width:10%; text-align:right;">
                                                Quantity
                                            </td>
                                            <td style="width:15%; text-align:right;">
                                                Price/Unit (INR)
                                            </td>
                                            <td style="width:15%; text-align:right;">
                                                GST (INR)
                                            </td>
                                            <td style="width:15%; text-align:right;">
                                                Amount (INR)
                                            </td>
                                        </tr>
                                        @foreach ($items as  $p)
                                        <tr class="item">
                                            <td style="width:25%;">
                                            {{ $p->item_name }}
                                            </td>
                                            <td style="width:10%; text-align:center;">
                                            {{$p->hsn_code}}
                                            </td>
                                            <td style="width:10%; text-align:right;">
                                            {{ $p->purchase_qty }}
                                            </td>
                                            <td style="width:15%; text-align:right;">
                                            {{$p->price_per_unit}}
                                            </td>
                                            <td style="width:15%; text-align:right;">
                                            {{ $tax->firstWhere('id', $p->tax_id)->per ?? 'N/A' }}
                                            </td>
                                            <td style="width:15%; text-align:right;">
                                            {{$p->total_cost}}
                                            </td>
                                        </tr>
@endforeach



                                </td>

                            </table>

                            <tr>
                                <td colspan="3">
                                    <table cellspacing="0px" cellpadding="2px">
                                        <tr>
                                            <td width="50%">
                                                <b> Terms & Conditions: </b> <br>
                                                We declare that this invoice shows the actual price of the goods
                                                described above and that all particulars are true and correct. The
                                                goods sold are intended for end user consumption and not for resale.
                                            </td>
                                            <td>

                                                <b> Authorized Signature </b>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
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

<div class="col-xs-6">
<button class="btn btn-primary" onclick="downloadPDF()"><i class="fa-solid fa-file-pdf"></i> Download Pdf</button>

</div>
<div class="col-xs-6">
    <button class="btn btn-primary" onclick="printlabels()"><i class="fa  fa-print"></i> Print</button>

</div>

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
    disp_setting += "scrollbars=yes,width=800, height=600, left=100, top=25";
    
    var content_value = document.getElementById(DivID).innerHTML;
    var docprint = window.open("", "_blank", disp_setting);
    
    docprint.document.open();
    docprint.document.write('<html><head><style type="text/css">');
    docprint.document.write('body { margin:0px; font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#000; }');
    docprint.document.write('a { color:#000; text-decoration:none; }');
    docprint.document.write('button { display:none; }'); // Hide buttons
    docprint.document.write('.top_rw { background-color: #f4f4f4; }');
    docprint.document.write('.invoice-box { margin: auto; padding: 10px; font-size: 14px; line-height: 24px; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; color: #555; }');
    docprint.document.write('table { width: 100%; line-height: inherit; text-align: left; border-bottom: solid 1px #ccc; }');
    docprint.document.write('table td { vertical-align: middle; }');
    docprint.document.write('table tr td:nth-child(2) { text-align: right; }');
    docprint.document.write('table tr.top table td { padding-bottom: 20px; }');
    docprint.document.write('table tr.top table td.title { font-size: 45px; line-height: 45px; color: #333; }');
    docprint.document.write('table tr.heading td { background: #eee; border-bottom: 1px solid #ddd; font-weight: bold; font-size: 12px; }');
    docprint.document.write('table tr.details td { padding-bottom: 20px; }');
    docprint.document.write('table tr.item td { border-bottom: 1px solid #eee; }');
    docprint.document.write('table tr.item.last td { border-bottom: none; }');
    docprint.document.write('table tr.total td:nth-child(2) { border-top: 2px solid #eee; font-weight: bold; }');
    docprint.document.write('@media print { body { -webkit-print-color-adjust: exact; } }'); // Ensure colors print correctly
    docprint.document.write('@media print { button { display: none; } }'); // Hide buttons in print
    docprint.document.write('</style></head><body onload="window.print(); window.close();">');
    docprint.document.write(content_value);
    docprint.document.write('</body></html>');
    
    docprint.document.close();
    docprint.focus();
}

    // Function to download the content as PDF
    function downloadPDF() {
        var formpdf =document.getElementById('formpdf');
        var formdisplay =document.getElementById('formdisplay');
        var element = document.getElementById('preview_data'); // The section to convert
        var opt = {
            margin:       0,
            filename:     'purchase_invoice.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        
       document.getElementById('logo_property').style.gap="30px";
        html2pdf().from(element).set(opt).save();
    }
 
</script>




<!-- 





                    <div class="card-header"> Sale Invoice
                       <strong>01/01/01/2018</strong>
                        <span class="float-right">
                            <strong>Date: {{$purchase->created_on}}</strong> </span>
                    </div>
                    <div class="card-body">


                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Supplier Details <address>
                                    <strong>{{ $suppliers->firstWhere('id', $purchase->supplier_id)->name ?? 'N/A' }} </strong><br>
                                </address>
                            </div>
                            <!-- /.col 
                            <div class="col-sm-4 invoice-col">
                                Purchase Details <address>
                                    <b>Invoice # {{$purchase->purchase_code}}</b><br>
                                    <b>Date : {{$purchase->purchase_at}}</b><br>
                                    <b>Grand Total : {{$purchase->grand_total}}</b><br>
                                </address>
                            </div>
                            <!-- /.col
                            <div class="col-sm-4 invoice-col">
                                <b>Paid Payment : {{$purchase->grand_total}}<span></span></b><br>
                                <b>Due Amount :<span id="due_amount_temp"></span></b><br>

                            </div>
                            <!-- /.col
                        </div>


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Item</th>
                                        <th class="center">Purchase Price</th>
                                        <th class="center">Quantity</th>
                                        <th class="center">Price</th>
                                        <th class="center">Tax</th>
                                        <th class="center">Tax Amount</th>
                                        <th class="center">Discount</th>
                                        <th class="center">Discount Amount</th>
                                        <th class="center">Unit Cost</th>
                                        <th class="center">Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                              
                        
                                @foreach ($purchaseitems as $index => $p)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td class="left strong">{{ $items->firstWhere('id', $p->item_id)->item_name ?? 'N/A' }}</td>
        <td class="center">{{ $p->total_cost }}</td>
        <td class="center">{{ $p->purchase_qty }}</td>
        <td class="center">{{ $p->price_per_unit }}</td>
        <td class="center">{{ $tax->firstWhere('id', $p->tax_id)->taxname ?? 'N/A' }}</td>
        
        <td class="center">{{$p->tax_amt}}</td>
        <td class="center">{{ $p->discount_amt }}</td>
        <td class="center">{{ $p->discount_amt }}</td>
        <td class="center">{{ $p->unit_total_cost }}</td>
        <td class="center">{{ $p->total_cost }}</td>
        
    </tr>
@endforeach





                                     
                            
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <table class="table table-clear">
                                    <tbody>
                                        <!-- <tr>
                                            <td class="left"><strong>Discount Coupon :</strong></td>
                                            <td class="right"></td>
                                        </tr> 
                                        <tr>
                                            <td class="left"><strong>Discount on All :</strong></td>
                                            <td class="right"></td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Note: {{$purchase->note}}</strong></td>
                                            <td class="right"></td>
                                        </tr>

                                    </tbody>
                                </table>

                                <div class="form-group" id="formdisplay">
                                    <h4 class="box-title text-info">Payments Information : </h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered" style="width:100%" id="">
                                            <thead>
                                                <tr style="background-color: #2781d5;">
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Payment Type</th>
                                                    <th>Account</th>
                                                    <th>Payment Note</th>
                                                    <th>Payment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                          

                                       
                                                            @if ($purchase->payment_amount== Null)
                                                            
                                                    <tr>
                                                        <td colspan="6" class="text-center text-bold">No Previous Payments Found!!</td>
                                                    </tr>
                                                    @else
                                                     
                                                            <tr>
                                                            <td></td>
                                                            <td>{{$purchase->created_at->format('Y:M:D')}}</td>

                                                            <td class="text-left">{{$purchase->payment_type}}</td>
                                                            <td>{{$purchase->account}}</td>
                                                            <td>{{$purchase->payment_note}}</td>
                                                            <td class="text-right">{{$purchase->payment_amount}}</td>
                                                           
                                                        </tr>
                                              
                                                        @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
</div>
                            <div class="col-lg-6 col-sm-6 ms-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left"><strong>Subtotal</strong></td>
                                            <td class="right">{{$purchase->subtotal}}</td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Other Charges</strong></td>
                                            <td class="right">{{$purchase->other_charges}}</td>
                                        </tr>
                                        <!-- <tr>
                                            <td class="left"><strong>Coupon Discount 0[Fixed]</strong></td>
                                            <td class="right">$679,76</td>
                                        </tr> 
                                        <tr>
                                            <td class="left"><strong>Discount on All</strong></td>
                                            <td class="right"></td>
                                        </tr>
                                     <tr>
                                            <td class="left"><strong>Round Off </strong></td>
                                            <td class="right">$679,76</td>
                                        </tr> 
                                        <tr>
                                            <td class="left"><strong>Grand Total</strong></td>
                                            <td class="right"><strong>{{$purchase->grand_total}}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                 

                    <div class="form-group" style="width:100%; display: none;" id="formpdf">
                                    <h4 class="box-title text-info">Payments Information : </h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered" style="width:100%" id="">
                                            <thead>
                                                <tr style="background-color: #2781d5;">
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Payment Type</th>
                                                    <th>Account</th>
                                                    <th>Payment Note</th>
                                                    <th>Payment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                          

            
          <tr>
            <td>{{ $purchase->created_at }}</td>
            <td class="text-left">{{ $purchase->payment_type }}</td>
            <td>{{ $purchase->account }}</td>
            <td>{{ $purchase->payment_note  }}</td>
            <td class="text-right">{{ $purchase->payment_amount}}</td>
        </tr>


                                                        
                                                           
                                           
                                              
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    <div class="card-header" id="buttons">

                        <div class="col-xs-6">
                        <button class="btn btn-primary" onclick="downloadPDF()"><i class="fa-solid fa-file-pdf"></i> Download Pdf</button>

                        </div>
                        <div class="col-xs-6">
                            <button class="btn btn-primary" onclick="printlabels()"><i class="fa  fa-print"></i> Print</button>
            
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
    /*Print Div label

    function printlabels() {
        PrintMe("preview_data");
    }

    function PrintMe(DivID) {
        var disp_setting = "toolbar=yes,location=no,";
        disp_setting += "directories=yes,menubar=yes,";
        disp_setting += "scrollbars=yes,width=800, height=600, left=100, top=25";
        var content_vlue = document.getElementById(DivID).innerHTML;
        var docprint = window.open("", "", disp_setting);
        docprint.document.open();
        docprint.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"');
        docprint.document.write('"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
        docprint.document.write('<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">');
        docprint.document.write('<head><title>My Title</title>');
        docprint.document.write('<style type="text/css">body{ margin:0px;');            
        docprint.document.write('font-family:verdana,Arial;color:#000;');
        docprint.document.write('font-family:Verdana, Geneva, sans-serif; font-size:12px;}');
        docprint.document.write('a{color:#000;text-decoration:none;} </style>');        
        docprint.document.write('</head><body onLoad="self.print()">');
        docprint.document.write(content_vlue);        
        docprint.document.write('</body></html>');
        docprint.document.close();
        docprint.focus();
    }

    // Function to download the content as PDF
    function downloadPDF() {
        var formpdf =document.getElementById('formpdf');
        var formdisplay =document.getElementById('formdisplay');
        var element = document.getElementById('preview_data'); // The section to convert
        var opt = {
            margin:       1,
            filename:     'purchase_invoice.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        document.getElementById('buttons').style.display="none";
formdisplay.style.display="none";
formpdf.style.display="block";
 
        html2pdf().from(element).set(opt).save();
    }
</script>



 -->