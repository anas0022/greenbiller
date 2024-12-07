@extends('store//layouts/app')

@section('title', 'Home Page')

@section('content')
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">


<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">

<style>
    /* Existing CSS */
</style>
</head>

<body>




    <div class="content-body">

        <div class="container-fluid" >
                
    <div class="row">
    @if($errors->any())
        <script>
            swal({
                title: "Error!",
                text: "{!! implode('\n', $errors->all()) !!}", 
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
    <div class="col-12">
    <div class="card" style="padding:20px;">
            <div >
                <div class="card-footer" style="margin-bottom:30px;">
                    <h4 class="card-text d-inline"> Purchase List</h4>

                    <a href="{{route('new_purchase')}}"
                                class="card-link float-end btn btn-rounded btn-info btn-sm "><span
                                    class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                                </span>New Purchase</a>
<!-- 
                    <button type="button" class="card-link float-end btn btn-rounded btn-info btn-sm "
                        data-bs-toggle="modal" data-bs-target="#import"><span class="btn-icon-start text-info"><i
                                class="fa fa-plus color-info"></i>
                        </span>Import</button> --></div>
                </div>


                <div class="modal fade" id="cash-payments-modal" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header header-custom">
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title text-center">Payments</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="row" action="{{route('makepayment.purchase.store')}}" method="post">
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

                <div class="modal fade" id="import">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Import</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            
                            <form action="{{route('item_bulkpost')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">

                                    <div class="form-group col-lg-6">
                                        <label class="form-label">Upload Your Excel File</label>
                                        <input type="file" name="excel_file" class="form-control">
                                        <span style="font-size: 10px;color: #B03838;">Max Width/Height: 1000px * 1000px
                                            & Size: 1MB</span>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light"
                                        data-bs-dismiss="modal">Close</button>
                                    <button  type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="button-container"></div>


          

                <table id="example" class="display" style="width:100%;">
                    <thead>
                        <th>#</th>
                        <th style="width: 5%;">Purchase Date</th>
                        <th style="width: 15%;">Purchase Code</th>
                        <th style="width: 15%;">Purchase Status</th>
                        <th style="width: 10%;">Reference No</th>
                        <th style="width: 15%;">Supplier Name</th>
                        <th style="width: 10%;">Total</th>
                        <th style="width: 10%;">Paid Payment</th>
                        <th style="width: 10%;">Payment Status</th>
                        <th style="text-align: center; width: 10%;"><i class="fas fa-arrow-circle-down"></i></th>
                    </thead>
                    <tbody>
                        @foreach($purchase as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }} </td>
                                <td>{{ $item->updated_at->format('Y-m-d') }}</td>
                                <td>{{ $item->prefix }}/{{ $item->purchase_code }}</td>
                                <td>{{ $item->purchase_status }}</td>
                                <td>{{ $item->reference_no }}</td>
                                <td>{{ $suppliers->firstWhere('id', $item->supplier_id)->name ?? 'N/A' }}</td>
                                <td>{{ $item->grand_total ?? '0.00' }}</td>
                                <td>{{ $item->paid_amount ?? '0.00' }}</td>
                                <td>
                                    @if($item->paid_amount === null || $item->paid_amount == 0)
                                        <p class="not-paid" style="background-color: red !important; color: white !important;  border-radius: 4px; text-align: center; ">Not Paid</p>
                                    @elseif($item->paid_amount < $purchaseItems->where('purchase_id', $item->id)->sum('grand_total'))
                                        <p class="partial" style="background-color: orange   !important; color: white !important;  border-radius: 4px; text-align: center; ">Partial</p>
                                    @else
                                        <p class="paid" >Paid</p>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp"
                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="fa-solid fa-computer-mouse-scrollwheel"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('invoice_purchase.view.store', ['purchase' => $item->id]) }}"><i class="fas fa-eye"></i> View Purchase</a>
                                            <a class="dropdown-item" href="{{ route('purchase.edit', ['id' => $item->id]) }}"><i class="fas fa-pencil-alt"></i> Edit</a>
                                            
                                            @if ($item->paid_amount == null || $item->paid_amount < $purchaseItems->where('purchase_id', $item->id)->sum('grand_total'))
                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#cash-payments-modal"
                                                    onclick="totals({{ $purchaseItems->where('purchase_id', $item->id)->first()->purchase_qty ?? 0 }}, {{ $item->grand_total ?? 0 }}, {{ $item->id }},{{ $item->paid_amount ?? 0 }})">
                                                    <i class="fas fa-money-check-dollar"></i> Make Payments
                                                </a>
                                            @else
                                                <a class="dropdown-item" href="{{ route('reciept.view.bill.store', ['id' => $payment_id]) }}"><i class="fas fa-money-check-dollar"></i> View Payments</a>
                                            @endif
                                            
                                            <a class="dropdown-item" href="{{ route('purchase.return.store', ['id' => $item->id]) }}" style="color:red;">
                                                <i class="fa-solid fa-rotate-left"></i> Purchase Return
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                </div>
            </div>
        </div>
        </form>
        </div></div>

     
        
        
        <script>
  
 
  function totals(totalQty, grandTotal,id,paid_amount) {

  document.getElementById('totalitemqty_1').value = totalQty;
  document.getElementById('total_amount_print').value = grandTotal-paid_amount;
  document.getElementById('id').value=id;
}
          
</script>

@endsection