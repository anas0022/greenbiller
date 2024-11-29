@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card" id="print_area">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="font-weight-bold mb-1" id="store_name"></h4>
                                <p class="text-muted mb-1" id="store_address" style="font-size: 10px;"></p>
                                <p class="text-muted mb-1" id="store_phone" style="font-size: 10px;"></p>
                            </div>
                            <div class="col-md-6">
                                <div class="text-right">
                                    <h4 class="font-weight-bold">Daily Closing Statement</h4>
                                    <p class="text-muted mb-1" style="font-size: 10px;">Date: <span id="closing_date"></span></p>
                                    <p class="text-muted mb-1" style="font-size: 10px;">Statement #: <span id="statement_number"></span></p>
                                </div>
                            </div>
                        </div>

             

                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th class="bg-light" style="width: 50%; font-size: 12px;">Opening Balance</th>
                                            <td class="text-right" id="opening_balance" style="font-size: 12px;">0.00</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light" style="font-size: 12px;">Total Sales</th>
                                                <td class="text-right" id="total_sale" style="font-size: 12px;">0.00</td>
                                        </tr>
                                        <tr>
                                            <th  class="bg-light" style="font-size: 12px;">Total Purchase</th>
                                            <td class="text-right" id="total_purchase" style="font-size: 12px;">0.00</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light" style="font-size: 12px;">Total Expenses</th>
                                            <td class="text-right" id="total_expense" style="font-size: 12px;">0.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th class="bg-light" style="width: 50%; font-size: 12px;">Total Invoices</th>
                                            <td class="text-right" id="invoice_count" style="font-size: 12px;">0</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light" style="width: 50%; font-size: 12px;">Total Purchase</th>
                                            <td class="text-right" id="purchase_count" style="font-size: 12px;">0</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light" style="font-size: 12px;">Cash Payments</th>
                                                <td class="text-right" id="cash_payments" style="font-size: 15px;">0</td>
                                        </tr>
                                        <tr class="table-active font-weight-bold">
                                            <th class="bg-light" style="font-size: 12px;">Closing Amount</th>
                                            <td class="text-right" id="closing_amount" style="font-size: 15px;">0.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        

                        <div class="row mt-5">
                            <div class="col-md-4">
                                <div class="border-top pt-2">
                                    <p class="mb-1">Prepared By: _________________</p>
                                    <p class="text-muted small">Cashier Signature</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="border-top pt-2">
                                    <p class="mb-1">Verified By: _________________</p>
                                    <p class="text-muted small">Manager Signature</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="border-top pt-2">
                                    <p class="mb-1">Approved By: _________________</p>
                                    <p class="text-muted small">Supervisor Signature</p>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4 print-hide">
                            <button  class="btn btn-primary btn-lg" id="print">
                                <i class="fas fa-print mr-2"></i> Print Statement
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @media print {
        @page {
            size: A4;
            margin: 10mm;
        }

        body {
            visibility: hidden;
            margin: 0;
            padding: 0;
            height: 100%;
            background: white !important;
        }

        #print_area {
            visibility: visible;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: auto;
            margin: 0;
            padding: 15px;
            background-color: white !important;
        }

        .card {
            background-color: white !important;
            box-shadow: none !important;
        }

        .card-body {
            background-color: white !important;
        }

        .print-hide {
            display: none !important;
        }

        /* Force background colors to print */
        .bg-light {
            background-color: #f8f9fa !important;
        }

        * {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
            color-adjust: exact !important;
        }
    }
</style>


<script>
    $(document).ready(function () {
       
        $('#print').on('click', function () {
            // Save current body classes
            var originalBodyClasses = $('body').attr('class');
            
            // Add print-specific class
            $('body').addClass('printing');
            

            setTimeout(function() {
                window.print();
                // Restore original body classes
                $('body').attr('class', originalBodyClasses);
            }, 300);
        });
    });
</script>


<script>

// Add AJAX functionality
$(document).ready(function() {
    loadClosingBill();

    function loadClosingBill() {
        $.ajax({
            url: '{{ route("closing.bill", ["id" => request()->id]) }}',
            type: 'GET',
            success: function(response) {
                const closing = response.data;
                const store = response.store;
            
                // Format date
                const formattedDate = new Date(closing.date).toLocaleDateString('en-GB');
         
                $('#closing_date').text(formattedDate);
                $('#store_name').text(store.store_name);
                $('#store_address').text('Address : '+store.address);
                $('#store_phone').text('Phone : '+store.mobile);
                $('#opening_balance').text(formatNumber(closing.opening_balance));
                $('#statement_number').text(closing.prefix+closing.closing_code);
                $('#total_sale').text(formatNumber(closing.total_sale));
                $('#total_purchase').text(formatNumber(closing.total_purchase));
                $('#purchase_count').text(formatNumber(closing.purchase_count));
                $('#cash_payments').text(formatNumber(closing.total_sale));
                $('#total_expense').text(formatNumber(closing.total_expense));
                $('#invoice_count').text(closing.invoice_count);
                $('#closing_amount').text(formatNumber(closing.closing_amount));
            },
            error: function(xhr, status, error) {
                console.error('Error loading closing bill:', error);
            }
        });
    }

    // Helper function to format numbers
    function formatNumber(number) {
        return parseFloat(number).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
});
</script>
@endsection 