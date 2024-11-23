@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

       

        <div class="row">
            <div class="col-12">
                <div class="card">
        <div class="card-body" id="print_area">
            <!-- Header with Logo -->
            <div class="text-center mb-4" style="display: flex; justify-content: space-between;">
            
                <h4>Daily Closing Statement</h4>
                <p>Date: {{ date('d-m-Y', strtotime($closing->date)) }}</p>
            </div>

            <!-- Closing Details -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Opening Balance</th>
                            <td>{{ number_format($closing->opening_balance, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Total Sales</th>
                            <td>{{ number_format($closing->total_sale, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Total Expenses</th>
                            <td>{{ number_format($closing->total_expense, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Total Invoices</th>
                            <td>{{ $closing->invoice_count }}</td>
                        </tr>
                        <tr>
                            <th>Closing Amount</th>
                            <td>{{ number_format($closing->closing_amount, 2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Print Button (hidden during print) -->
            <div class="text-center mt-4 print-hide">
                <button onclick="printDiv('print_area')" class="btn btn-primary">
                    <i class="fas fa-print"></i> Print
                </button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<!-- Print JavaScript -->
<script>
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>

<!-- Print Styles -->
<style>
@media print {
    .print-hide {
        display: none;
    }
    .card {
        border: none !important;
    }
    .table {
        border: 1px solid black !important;
    }
    .table th,
    .table td {
        border: 1px solid black !important;
    }
}
</style>
@endsection 