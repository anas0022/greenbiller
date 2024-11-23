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
                    </div>
                    <form action="{{route('daily.closing.post')}}" method="post">
                        @csrf
                        <div class="card-body" >
                            <div style="display: flex; justify-content: space-between;">
                                <p>Today Date: {{date('d-m-Y')}}</p>
                                <p>Opening Balance: {{$opening_balance->closing_amount ?? 0 }}</p>
                                <input type="hidden" name="opening" value="{{$opening_balance->closing_amount ?? 0 }}">
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
                                    <td class="text-center" >
                                        @foreach ($sale as $item)
                                            {{$item->prefix}}<br>
                                        @endforeach
                                    </td>
                                    <td class="text-center" >
                                        @foreach ($sale_amount as $item)
                                            ₹{{number_format($item->payment, 2)}}<br>
                                        @endforeach
                                    </td>
                                    <td class="text-center" >
                                        @foreach ($expense as $item)
                                            ₹{{number_format($item->amount, 2)}}<br>
                                        @endforeach
                                    </td>
                                </tr>
                                
                                <!-- Totals Row -->
                                <tr class="table-info">
                                    <th class="text-center">
                                        Total Invoices: {{number_format($total_invoice_count, 0)}}
                                        <input type="hidden" name="invoice_count" value="{{$total_invoice_count}}">
                                    </th>
                                    <th class="text-center">
                                        Total Sales: ₹{{number_format($sale_payment, 2)}}
                                        <input type="hidden" name="total_sale" value="{{$sale_payment}}">
                                    </th>
                                    <th class="text-center">
                                        Total Expenses: ₹{{number_format($expense_amount, 2)}}
                                        <input type="hidden" name="total_expense" value="{{$expense_amount}}">
                                    </th>
                                </tr>
                                
                                <!-- Final Closing Row -->
                                <tr class="table-success">
                                    <th colspan="2" class="text-center">Total Closing Balance</th>
                                    <td class="text-center font-weight-bold">
                                        ₹{{number_format($sale_payment - $expense_amount, 2)}}
                                        <input type="hidden" name="closing_amount" value="{{$sale_payment - $expense_amount}}">
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
@endsection
