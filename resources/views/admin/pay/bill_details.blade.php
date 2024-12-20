@extends('admin.layouts.app')
@section('content')
    <style>
        .receipt-content {
            padding: 20px;
            width: 100%;
            background: #fff;
        }

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
            margin-bottom: 1rem;
            background: #fff;
        }

        .store-name {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 5px;
            text-align: center;
        }

        .store-header {
            border: 1px solid #000 !important;
            text-align: left;
            padding: 15px !important;
            background-color: #fff;
        }

        .store-header p {
            margin: 0;
            font-weight: bold;
        }

        .store-info {
            text-align: center;
            margin-bottom: 10px;
        }

        .amount-section {
            border: 1px solid #000;
            padding: 10px;
            margin-bottom: 1rem;
        }

        .amount-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }

        .signature-box {
            border: 1px solid #000;
            width: 200px;
            float: right;
            margin-top: 20px;
            text-align: center;
            padding: 40px 20px 10px;
        }

        @media print {
            @page {
                size: portrait;
                margin: 10mm;
            }

            body * {
                visibility: hidden;
            }

            #preview_data, #preview_data * {
                visibility: visible;
            }

            #preview_data {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }

            .card-header, .card-footer {
                display: none !important;
            }

            .store-header, .table {
                border: 1px solid black !important;
            }

            .table th, .table td {
                border: 1px solid black !important;
            }

            .amount-section, .signature-box {
                border: 1px solid black !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div id="preview_data">
                            <div class="card-header">
                                <h4 class="card-title text-center">Payment Receipt</h4>
                            </div>
                            <div class="card-body">
                                <div class="receipt-content">
                                    <!-- Store Info -->
                                    <div class="store-info">
                                        @if($logo->isNotEmpty() && $logo->first()->logo)
                                            <img src="{{ asset('storage/'.$logo->first()->logo) }}" alt="Store Logo" style="max-height: 80px; margin-bottom: 10px;">
                                        @endif
                                        <div class="store-name">{{ $store->store_name }}</div>
                                        <div>{{ $store->address }}</div>
                                        <div>Contact No : {{ $store->mobile }}</div>
                                    </div>

                                    <!-- Customer and Receipt Details -->
                                    <table class="table receipt-header-table">
                                        <tr>
                                            <th class="store-header" width="50%">Received From</th>
                                            <th class="store-header" width="50%">Receipt Details</th>
                                        </tr>
                                        <tr>
                                            <td class="store-header">
                                                <strong>{{ $customer->customer_name }}</strong>
                                                <br>
                                                {{ $customer->address }}
                                                <br>
                                                Contact No: {{ $customer->mobile }}
                                            </td>
                                            <td class="store-header">
                                                <strong>Receipt No: {{ $ledger->payment_code ?? 'Not Available' }}</strong>
                                                <br>
                                                Date: {{ $ledger->date }}
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Bill Details -->
                                    <table class="table receipt-header-table">
                                        <tr>
                                            <th class="store-header">Bill No.</th>
                                            <th class="store-header text-end">Amount</th>
                                        </tr>
                                        @foreach($billDetails as $detail)
                                            <tr>
                                                <td class="store-header">{{ $detail['bill_no'] }}</td>
                                                <td class="store-header text-end">₹{{ number_format($detail['amount'], 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </table>

                                    <!-- Amount Section -->
                                    <div class="amount-section">
                                        <div class="amount-row">
                                            <strong>Total Amount:</strong>
                                            <strong>₹{{ number_format($totalPaid, 2) }}</strong>
                                        </div>
                                        <div>
                                            <strong>Amount in Words:</strong>
                                            <span id="amount-in-words">{{ $totalPaid }}</span>
                                        </div>
                                    </div>

                                    <!-- Signature -->
                                    <div class="signature-box">
                                        Authorized Signature & Seal
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
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
    </div>

    <script>
        function getIndianCurrency(number) {
            number = parseFloat(number);
            let decimal = Math.round((number - Math.floor(number)) * 100);
            let no = Math.floor(number);
            let words = {
                0: '', 1: 'one', 2: 'two', 3: 'three', 4: 'four', 5: 'five',
                6: 'six', 7: 'seven', 8: 'eight', 9: 'nine', 10: 'ten',
                11: 'eleven', 12: 'twelve', 13: 'thirteen', 14: 'fourteen', 15: 'fifteen',
                16: 'sixteen', 17: 'seventeen', 18: 'eighteen', 19: 'nineteen', 20: 'twenty',
                30: 'thirty', 40: 'forty', 50: 'fifty', 60: 'sixty',
                70: 'seventy', 80: 'eighty', 90: 'ninety'
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

            return (rupees ? rupees + ' rupees' : '') + paise + ' only';
        }

        document.addEventListener('DOMContentLoaded', function() {
            const amountElement = document.getElementById('amount-in-words');
            if (amountElement) {
                const amount = parseFloat(amountElement.textContent);
                amountElement.textContent = getIndianCurrency(amount);
            }
        });

        document.getElementById('print_Btn').addEventListener('click', () => {
            window.print();
        });

        document.getElementById('download_Btn').addEventListener('click', () => {
            const receiptContent = document.getElementById('preview_data');
            const buttons = document.querySelector('.card-footer');
            buttons.style.display = 'none';

            html2canvas(receiptContent).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jspdf.jsPDF('p', 'mm', 'a4');
                const imgWidth = 190;
                const imgHeight = (canvas.height * imgWidth) / canvas.width;

                pdf.addImage(imgData, 'PNG', 10, 10, imgWidth, imgHeight);
                pdf.save('payment_receipt.pdf');

                buttons.style.display = 'block';
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
@endsection
