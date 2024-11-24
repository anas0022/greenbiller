@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')


 
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">


<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
    

@if($errors->any())
<script>
    swal({
        title: "Error!",
        text: "{!! implode('\n', $errors->all()) !!}", // Join errors with line breaks
        icon: "error",
        type: "error"
    });
</script>
@endif

@if(session('success'))
<script>
    swal({
        title: "Success!",
        text: "{{ session('success') }}",
        icon: "success",
        type: "success"
    });
</script>
@endif

</head>

<body>

   
@if($errors->any())
        <script>
            swal({
                title: "Error!",
                text: "{!! implode('\n', $errors->all()) !!}", // Join errors with line breaks
                icon: "error",
                type: "error"
            });
        </script>
    @endif

    @if(session('success'))
        <script>
            swal({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success",
                type: "success"
            });
        </script>
    @endif


    <div class="content-body">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card" style="padding: 10px;">
                        <div>
                            <div class="card-footer" >
                                <h4 class="card-text d-inline"> Sales List </h4>
                                <div style="padding: 10px;">

                                    <a href="{{route('add_sales_biller')}}"
                                        class="card-link float-end btn btn-rounded btn-info btn-sm " style="margin-bottom:25px;"><span
                                            class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                                        </span>New Sales</a>

                                </div>

                            </div>



                            <div class="modal fade" id="cash-payments-modal" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header header-custom">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title text-center">Payments</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="row" action="{{route('makepayment')}}" method="post">
                                                            @csrf
                                                                <div class="col-md-8" >
                                                              

                                                                    <div>
                                                                       
                                                                        <input type="hidden" name="id" id="id">
                                                                    

                                                                        <div class="col-md-12 payments_div">
                                                                            <div class="box box-solid bg-gray">
                                                                                <div class="box-body">
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <div class="">
                                                                                                <label
                                                                                                    for="amount_1">Amount</label>
                                                                                                <input type="text"
                                                                                                    class="form-control text-right payment"
                                                                                                    id="pay_amount"
                                                                                                    name="paid_amount"
                                                                                                    placeholder=""
                                                                                                    onkeyup="paymet_given()" />
                                                                                                <span id="amount_1_msg"
                                                                                                    style="display: none"
                                                                                                    class="text-danger"></span>
                                                                                            </div>
                                                                                        </div>


                                                                                        <div class="col-md-6">
                                                                                            <div class="">
                                                                                                <label
                                                                                                    for="payment_type_1">Payment
                                                                                                    Type</label>
                                                                                                <select
                                                                                                    name="paymenttypes"
                                                                                                    class="form-control selectpicker"
                                                                                                    data-live-search="true">
                                                                                                    <option value="">
                                                                                                        -Select-
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="card">
                                                                                                        card
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="cash">
                                                                                                        cash
                                                                                                    </option>

                                                                                                </select>
                                                                                          
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="clearfix"></div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <div class="">
                                                                                                <label
                                                                                                    for="account_id_1">Account</label>
                                                                                                <select
                                                                                                    name="account_id"
                                                                                                    class="form-control selectpicker"
                                                                                                    data-live-search="true">
                                                                                                    <option value="0">
                                                                                                        -None-
                                                                                                    </option>
                                                                                                    @foreach ($account as $acc)
                                                                                                        <option
                                                                                                            value="{{$acc->id}}">
                                                                                                            {{$acc->account_name}}
                                                                                                        </option>
                                                                                                    @endforeach

                                                                                                </select>
                                                                                           
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="clearfix"></div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12">
                                                                                            <div class="">
                                                                                                <label
                                                                                                    for="payment_note_1">Payment
                                                                                                    Note</label>
                                                                                                <textarea type="text"
                                                                                                    class="form-control"
                                                                                                    id="payment_note_1"
                                                                                                    name="payment_note_1"
                                                                                                    placeholder=""></textarea>
                                                                                                <span
                                                                                                    id="payment_note_1_msg"
                                                                                                    style="display: none"
                                                                                                    class="text-danger"></span>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="clearfix"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- col-md-12 -->
                                                                    </div>

                                                                  
                                                                </div>
                                                                <!-- col-md-9 -->
                                                                <style>
                                                                    .diaplaylabel {
                                                                        background-color: #0073b7 !important;
                                                                        font-size: 18px !important;
                                                                        text-align: right;
                                                                        border: 0;
                                                                        color: #fff !important;
                                                                    }
                                                                </style>
                                                                <!-- RIGHT HAND -->
                                                                <div class="col-md-4">
                                                                    <div class="col-md-12">
                                                                        <div class="box box-solid bg-blue">
                                                                            <div class="box-body">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-md-12 border-custom-bottom">
                                                                                        <span
                                                                                            class="col-md-6 text-right text-bold">Total
                                                                                            Items:</span>
                                                                                        <span
                                                                                            class="col-md-6 text-right text-bold custom-font-size sales_div_tot_qty">
                                                                                            <input type="text"
                                                                                                id="totalitemqty_1"
                                                                                                name="totalitemqty_1"
                                                                                                class="form-control form-control-sm diaplaylabel"
                                                                                                readonly value="0">

                                                                                        </span>


                                                                                    </div>
                                                                                    <div
                                                                                        class="col-md-12 border-custom-bottom">
                                                                                        <span
                                                                                            class="col-md-6 text-right text-bold">Total
                                                                                            Amount:</span>
                                                                                        <span
                                                                                            class="col-md-6 text-right text-bold custom-font-size sales_div_tot_amt">
                                                                                            <input type="text"
                                                                                                id="total_amount_print"
                                                                                                name="subtotal_amt_1"
                                                                                                class="form-control form-control-sm diaplaylabel"
                                                                                                readonly value="0">
                                                                                        </span>


                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                        
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer"
                                                                        style="display:flex; gap:5px;">
                                                                        <button type="button"
                                                                            class="btn btn-default btn-lg"
                                                                            data-dismiss="modal">
                                                                            Close
                                                                        </button>

                                                                        <button type="submit" name="saveprint"
                                                                            class="btn btn-success btn-lg make_sale btn-lg">
                                                                            <i class="fa fa-print"></i> Save &amp; Print
                                                                        </button>
                                                                    </div>
                                                                </div>
</form>



</div></div></div></div>
                        </div>


                            <table id="example" class="display" style="width:100%; ">
                                <thead style="">
                                    <th>#</th>
                                    <th>Sale Date</th>
                                    <th>Sale Code</th>
                                    <th>Sale Status</th>
                                    <th>Reference No</th>
                                    <th>Customer Name</th>
                                    <th>Total</th>
                                    <th>Paid Payment</th>

                                    <th>Payment Status</th>
                                    <th>Created by</th>
                                    <!-- <th>Created by</th>                                       -->
                                    <th><i class="fas fa-arrow-circle-down"></i></th>
                                </thead>
                                <tbody style="width:100%; overflow-x:scroll;">

                                    @foreach($sales as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->sales_date }}</td>
                                            <td>{{$item->prefix . '/' . $item->sales_code }}</td>
                                            <td>
                                                {{$item->purchase_status}}

                                            </td>
                                            <td>{{ $item->reference_no }}</td>
                                            <td>{{ $suppliers->firstWhere('id', $item->customer_id)->customer_name ?? 'N/A' }}
                                            </td>
                                            <!-- Accessing the supplier's name -->
                                            <td>{{ $item->grand_total }}</td>
                                            <td>
                                                @if($item->paid_amount == Null)
                                                    0.00
                                                @else
                                                    {{ $item->paid_amount }}
                                                @endif
                                            </td>

                                            <td>
                                                @if($item->paid_amount == null)
                                                    <p class=" Not-paid"> Un Paid </p>
                                                @elseif($item->paid_amount < $item->grand_total)
                                                    <p class=" Partial Paid" style="color:white; background-color:orange; border-radius: 5px; text-align:center;"> Partial Paid </p>
                                                @else
                                                    <p class=" paid"> Paid </p>
                                                @endif
                                               

                                            </td>
                                            <td>{{ $user->firstWhere('id', $item->created_by)->role ?? 'N/A' }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-success light sharp"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="fa-solid fa-computer-mouse-scrollwheel"></i></button>
                                                    <div class="dropdown-menu" style="z-">
                                                        <a href="{{ route('invoice_sale.main', ['id'=>$item->id,'sale_type'=>$item->sales_type]) }}"
                                                            class="dropdown-item" type="submit">
                                                            <i class="fas fa-eye"></i> View Sale
                                                        </a>

                                                        <a class="dropdown-item" href="{{route('admin_saleitem_edit',['id'=>$item->id])}}">
                                                            <i class="fas fa-pencil-alt"></i> Edit
                                                        </a>
                                                        
                                                        @if($item->paid_amount == Null)
                                                            <a class="dropdown-item" data-toggle="modal"
                                                                data-target="#cash-payments-modal" 
                                                                onclick="totals({{$item->total_qty}},{{$item->grand_total}},{{$item->id}},{{$item->paid_amount}})">
                                                                <i class="fas fa-money-check-dollar"></i> Make Payments
                                                            </a>
                                                            @elseif($item->paid_amount < $item->grand_total)
                                                            <a class="dropdown-item" data-toggle="modal"
                                                                data-target="#cash-payments-modal" 
                                                                onclick="totals({{$item->total_qty}},{{$item->grand_total}},{{$item->id}},{{$item->paid_amount}})">
                                                                <i class="fas fa-money-check-dollar"></i> Make Payments
                                                            </a>
                                                            <a class="dropdown-item" href="{{route('reciept.view', ['id' => $ledger->where('sale_id', $item->id)->first()->id ?? ''])}}">
                                                                <i class="fas fa-money-check-dollar"></i> View Payments
                                                            </a>
                                                        @else
                                                        <a class="dropdown-item" href="{{route('reciept.view', ['id' => $ledger->where('sale_id', $item->id)->first()->id ?? ''])}}">
                                                            <i class="fas fa-money-check-dollar"></i> View Payments
                                                        </a>
                                                        @endif

                                                        
                                                        <a class="dropdown-item" href="{{route('sale.return',['id'=>$item->id])}}" style="color:red;">
                                                            <i class="fa-solid fa-rotate-left"></i> Sale Return
                                                        </a>
                                                    </div>
                                                </div>
                                        </tr>

                                    @endforeach

                                </tbody>
                           
                            </table>
               



                        </div>
                    </div>
                </div>
                </form>
            </div></div></div></div>
<script>
  
 
    function totals(totalQty, grandTotal,id,paid_amount) {
    document.getElementById('totalitemqty_1').value = totalQty;
    document.getElementById('total_amount_print').value = grandTotal - (paid_amount || 0);
    document.getElementById('id').value=id;

}
            
</script>

               
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>
<script>
    new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
</script>


                @endsection