@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

       

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-text d-inline">Daily Closing</h4>
                        <input type="date" id="closing_date" class="form-control" style="width: 200px; float: right;" value="{{ date('Y-m-d') }}">
                    </div>
                    <form action="{{route('daily.closing.post')}}" method="post">
                        @csrf
                        <div class="card-body" >
                            <div style="display: flex; justify-content: space-between;">
                                <p>Today Date: <span id="display_date">{{date('d-m-Y')}}</span></p>
                                <p>Opening Balance: <span id="opening_balance">{{$opening_balance->closing_amount ?? 0 }}</span></p>
                                <input type="hidden" name="opening" id="opening_input" value="{{$opening_balance->closing_amount ?? 0 }}">
                            </div>
                          
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Today's Invoices</th>
                                    <th class="text-center">Today's Sales</th>
                                    <th class="text-center">Today's Expenses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Details Row -->
                                <tr>
                                    <td class="text-center" id="invoice_list">
                                        @foreach ($sale as $item)
                                            {{$item->prefix}}/{{$item->sales_code}}<br>
                                        @endforeach
                                    </td>
                                    <td class="text-center" id="sale_list">
                                        @foreach ($sale_amount as $item)
                                            ₹{{number_format($item->payment, 2)}}<br>
                                        @endforeach
                                    </td>
                                    <td class="text-center" id="expense_list">
                                        @foreach ($expense as $item)
                                            ₹{{number_format($item->amount, 2)}}<br>
                                        @endforeach
                                    </td>
                                </tr>
                                
                                <!-- Totals Row -->
                                <tr class="table-info">
                                    <th class="text-center">
                                        Total Invoices: <span id="total_invoices">{{number_format($total_invoice_count, 0)}}</span>
                                        <input type="hidden" name="invoice_count" id="invoice_count_input" value="{{$total_invoice_count}}">
                                    </th>
                                    <th class="text-center">
                                        Total Sales: ₹<span id="total_sales">{{number_format($sale_payment, 2)}}</span>
                                        <input type="hidden" name="total_sale" id="total_sale_input" value="{{$sale_payment}}">
                                    </th>
                                    <th class="text-center">
                                        Total Expenses: ₹<span id="total_expenses">{{number_format($expense_amount, 2)}}</span>
                                        <input type="hidden" name="total_expense" id="total_expense_input" value="{{$expense_amount}}">
                                    </th>
                                </tr>
                                
                                <!-- Final Closing Row -->
                                <tr class="table-success">
                                    <th colspan="2" class="text-center">Total Closing Balance</th>
                                    <td class="text-center font-weight-bold">
                                        ₹<span id="closing_balance">{{number_format($sale_payment - $expense_amount, 2)}}</span>
                                        <input type="hidden" name="closing_amount" id="closing_amount_input" value="{{$sale_payment - $expense_amount}}">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Make Closing</button>
                    </div>

                </div>
           
                </form>

            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Initial load
    loadClosingData();

    // Date change event
    $('#closing_date').change(function() {
        loadClosingData();
    });

    // Function to fetch data every 2 seconds
    function startLiveUpdate() {
        setInterval(function() {
            loadClosingData();
        }, 2000);
    }

    function loadClosingData() {
        let date = $('#closing_date').val();
        
        $.ajax({
            url: '{{ route("daily.closing") }}',
            type: 'GET',
            data: {
                date: date,
                _: new Date().getTime() // Prevent caching
            },
            headers: {
                'Cache-Control': 'no-cache',
                'Pragma': 'no-cache'
            },
            success: function(response) {
                updateDisplayWithAnimation(response);
            },
            error: function(xhr, status, error) {
                console.error('Error loading closing data:', error);
            }
        });
    }

    function updateDisplayWithAnimation(response) {
        // Update display date
        let displayDate = new Date($('#closing_date').val()).toLocaleDateString('en-GB');
        updateElementWithAnimation('#display_date', displayDate);

        // Update opening balance
        let openingBalance = response.opening_balance ? response.opening_balance.closing_amount : '0';
        updateElementWithAnimation('#opening_balance', openingBalance);
        $('#opening_input').val(openingBalance);

        // Update invoice list
        let invoiceHtml = '';
        response.sale.forEach(function(item) {
            invoiceHtml += `${item.prefix}/ ${item.sales_code}<br>`;
        });
        updateElementWithAnimation('#invoice_list', invoiceHtml);

        // Update sale list
        let saleHtml = '';
        response.sale_amount.forEach(function(item) {
            saleHtml += `₹${numberFormat(item.payment)}<br>`;
        });
        updateElementWithAnimation('#sale_list', saleHtml);

        // Update expense list
        let expenseHtml = '';
        response.expense.forEach(function(item) {
            expenseHtml += `₹${numberFormat(item.amount)}<br>`;
        });
        updateElementWithAnimation('#expense_list', expenseHtml);

        // Update totals
        updateElementWithAnimation('#total_invoices', numberFormat(response.total_invoice_count, 0));
        $('#invoice_count_input').val(response.total_invoice_count);

        updateElementWithAnimation('#total_sales', numberFormat(response.sale_payment));
        $('#total_sale_input').val(response.sale_payment);

        updateElementWithAnimation('#total_expenses', numberFormat(response.expense_amount));
        $('#total_expense_input').val(response.expense_amount);

        // Update closing balance
        let closingBalance = response.sale_payment - response.expense_amount;
        updateElementWithAnimation('#closing_balance', numberFormat(closingBalance));
        $('#closing_amount_input').val(closingBalance);
    }

    function updateElementWithAnimation(selector, newValue) {
        const element = $(selector);
        const currentValue = element.html();
        if (currentValue !== newValue) {
            element.fadeOut(100, function() {
                $(this).html(newValue).fadeIn(100)
                    .css('background-color', '#fff3cd')
                    .animate({ backgroundColor: 'transparent' }, 1000);
            });
        }
    }

    function numberFormat(number, decimals = 2) {
        return parseFloat(number || 0).toFixed(decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Start live updates
    startLiveUpdate();
});
</script>

<!-- Add this CSS for animations -->
<style>
.highlight {
    transition: background-color 1s ease-out;
}

td, th {
    transition: background-color 0.5s ease-out;
}

.table-bordered td, .table-bordered th {
    position: relative;
}

.flash {
    animation: flash-animation 1s ease-out;
}

@keyframes flash-animation {
    0% { background-color: #fff3cd; }
    100% { background-color: transparent; }
}
</style>
@endsection
