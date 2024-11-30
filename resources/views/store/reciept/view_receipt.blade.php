@extends('store.layouts.app')
@section('content')
    <style>
        .receipt-content {
            padding: 20px;
            width: 100%;
        }

        /* Table Styles */
        .table {
            width: 100%;
            margin-bottom: 1.5rem;
            border: 1px solid #252424;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            border: 1px solid #313131;
        }

        .receipt-header-table {
            margin-bottom: 2rem;
        }

        /* Store Details */
        .store-name {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Footer Section */
        .row.mt-5 {
            margin-top: 4rem !important;
            padding-top: 2rem;
        }

        /* Print Buttons */
        .print-button {
            margin-top: 2rem;
            text-align: center;
        }



        .store-header {
            border: 1px solid #000 !important;
            text-align: center;
            padding: 15px !important;
            background-color: #fff;
        }

        .store-header p {
            margin: 0;
            font-weight: bold;
        }

        @media print {
            @page {
                size: portrait;
                margin: 10mm;
            }

            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
                print-color-adjust: exact !important;
                background-color: white !important;
                border-color: black !important;
            }

            /* Remove all default borders first */
            * {
                border: none !important;
            }

            /* Then specifically add borders only where needed */
            /*  .table {
                    border: 1px solid black !important;
                }

                .table th,
                .table td {
                    border: 1px solid black !important;
                } */

            .store-header {
                border: 1px solid black !important;
            }

            /* Remove specific borders where not needed */
            /*  tr[style*="border: none"] {
                    border: none !important;
                }

                td[style*="border-bottom: 1px solid white"] {
                    border-bottom: none !important;
                }
     */
            /* Hide print buttons */
            .print-button {
                display: none !important;
            }
        }
    </style>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="background-color: white  ;">
                        <div id="preview_data" style="background-color: #fff;">
                            <div class="card-header" style="display: flex; justify-content: center;">
                                <h4 class="card-title">Payment Receipt</h4>

                            </div>
                            <div class="card-body" id="receipt-content">
                                <div class="receipt-content">


                                    <!-- Receipt Header -->
                                    <div class="row mb-4">
                                        <div class="col-6">


                                        </div>
                                        <table class="table receipt-header-table" style="background-color: #fff;">
                                            <thead>
                                                <tr>
                                                    <th class="store-header" style="width:100%; text-align:start;"
                                                        colspan="2">
                                                        <p style="font-size: 28px; margin-bottom: 5px;">
                                                            {{ $store->store_name }}
                                                        </p>
                                                        {{ $store->address }}
                                                        <br>Contact No : {{ $store->mobile }}
                                                    </th>

                                                </tr>

                                                <tr>
                                                    <th class="store-header" style="width:50%; text-align:start;">Received
                                                        From
                                                    </th>
                                                    <th class="store-header" style="width:50%; text-align:start;">Receipt
                                                        Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="store-header" style="text-align:start;">
                                                        <strong>{{ $customer->customer_name }}</strong>
                                                        <br>
                                                        {{ $customer->address }}
                                                        <br>
                                                        <span class="contact-no">Contact No: {{ $customer->mobile }}</span>
                                                    </td>
                                                    <td class="store-header" style="text-align:start;">
                                                        <strong>No: {{ $ledger->invoice_purchase_no }}</strong>
                                                        <br>
                                                        <span class="receipt-date">Date: {{ $ledger->date }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="table receipt-header-table">

                                            <thead>
                                                <tr>
                                                    <th width="50%" style="text-align:start;" class="store-header">
                                                        Payment
                                                        Mode</th>
                                                    <th width="100%" style="border-right: 1px solid #000; border-bottom: 1px solid #000;">
                                                        <span>Received:</span>
                                                        <span style="float: right; position: relative;">
                                                            @if ($ledger->credit == 0)
                                                                ₹ {{ number_format($ledger->debit, 2) }}
                                                            @else
                                                                ₹ {{ number_format($ledger->credit, 2) }}
                                                            @endif
                                                        </span>
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>


                                                    <td class="store-header" style="text-align:start;">
                                                        {{ $store->store_name }}
                                                    </td>
                                                    <td style="border-right: 1px solid #000;">
                                                        <span>Amount In Words:</span>
                                                 
                                                        <strong style="float: right; position: relative;  padding-left: 1rem;">
                                                            @if ($ledger->credit == 0)
                                                                <span id="amount-in-words">{{ $ledger->debit }}</span>
                                                            @else
                                                                <span id="amount-in-words">{{ $ledger->credit }}</span>
                                                            @endif
                                                        </strong>
                                                    </td>






                                                </tr>

                                            </tbody>

                                        </table>
                                        <div style="border: 1px solid #000; width:50%; height:150px; border-top:none; top:-15px; left: 50%; position: relative; display: flex; justify-content: center; align-items: end;">

                                            Authorized Signature & Seal
                                        </div>

                                    </div>

                                    <!-- Receipt Details -->



                                    <!-- Footer -->


                                </div>

                            </div>

                        </div>
                        <div class="print-button" style="position: relative; z-index: 4000000000; margin-top: -5rem; width: 100%; display: flex; justify-content: end; padding:10px;">
                            <button id="print_Btn" class="btn btn-primary me-2">
                                <i class="fas fa-print"></i> Print Receipt
                            </button>
                            <button id="download_Btn" class="btn btn-secondary">
                                <i class="fas fa-file-pdf"></i> Download PDF
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function getIndianCurrency(number) {
                number = parseFloat(number);
                let decimal = Math.round((number - Math.floor(number)) * 100);
                let no = Math.floor(number);
                let words = {
                    0: '',
                    1: 'one',
                    2: 'two',
                    3: 'three',
                    4: 'four',
                    5: 'five',
                    6: 'six',
                    7: 'seven',
                    8: 'eight',
                    9: 'nine',
                    10: 'ten',
                    11: 'eleven',
                    12: 'twelve',
                    13: 'thirteen',
                    14: 'fourteen',
                    15: 'fifteen',
                    16: 'sixteen',
                    17: 'seventeen',
                    18: 'eighteen',
                    19: 'nineteen',
                    20: 'twenty',
                    30: 'thirty',
                    40: 'forty',
                    50: 'fifty',
                    60: 'sixty',
                    70: 'seventy',
                    80: 'eighty',
                    90: 'ninety'
                };
                let digits = ['', 'hundred', 'thousand', 'lakh', 'crore'];

                let result = [];
                let digitIndex = 0;

                while (no > 0) {
                    let chunk;
                    if (digitIndex === 0) {
                        chunk = no % 100;
                        no = Math.floor(no / 100);
                    } else if (digitIndex === 1) {
                        chunk = no % 10;
                        no = Math.floor(no / 10);
                    } else {
                        chunk = no % 100;
                        no = Math.floor(no / 100);
                    }

                    if (chunk) {
                        let chunkWords = '';
                        if (chunk < 20) {
                            chunkWords = words[chunk];
                        } else {
                            chunkWords = words[Math.floor(chunk / 10) * 10] + (chunk % 10 ? ' ' + words[chunk % 10] : '');
                        }
                        if (digitIndex > 0) {
                            chunkWords += ' ' + digits[digitIndex];
                        }
                        result.unshift(chunkWords);
                    }

                    digitIndex++;
                }

                let rupees = result.join(' ');
                let paise = '';

                if (decimal > 0) {
                    if (decimal < 20) {
                        paise = words[decimal];
                    } else {
                        paise = words[Math.floor(decimal / 10) * 10] + (decimal % 10 ? ' ' + words[decimal % 10] : '');
                    }
                    paise = ' and ' + paise + ' paise';
                }

                return (rupees ? rupees + ' rupees' : '') + paise;
            }

            // Convert amount to words when page loads
            document.addEventListener('DOMContentLoaded', function() {
                const amountElement = document.getElementById('amount-in-words');
                if (amountElement) {
                    const amount = parseFloat(amountElement.textContent);
                    amountElement.textContent = getIndianCurrency(amount) + ' Only';
                }
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
        <script>
            document.getElementById('print_Btn').addEventListener('click', () => {
                const printContent = document.getElementById('preview_data');
                const originalContents = document.body.innerHTML;

                // Force white background and black borders before printing
                const elements = printContent.getElementsByTagName('*');
                for (let el of elements) {
                    el.style.backgroundColor = 'white';
                    if (el.classList.contains('table') ||
                        el.tagName === 'TD' ||
                        el.tagName === 'TH' ||
                        el.classList.contains('store-header')) {
                        el.style.border = '1px solid black';
                    }
                }

                document.body.innerHTML = printContent.innerHTML;
                window.print();
                document.body.innerHTML = originalContents;
            });


          
        </script>
        <script>
              document.getElementById('download_Btn').addEventListener('click', () => {
                var buttonsElement = document.querySelector('.print-button');


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
                    }, 1000);
                });
            });
        </script>
    @endsection
