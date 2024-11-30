@extends('store//layouts/app')

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
                                <h4 class="card-text d-inline"> Return List </h4>
                                <div style="padding: 10px;">

                                    <a href="{{route('Sale.return.mass.store')}}"
                                        class="card-link float-end btn btn-rounded btn-info btn-sm " style="margin-bottom:25px;"><span
                                            class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                                        </span>Return Product</a>

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



                            <table id="example" class="display" style="width:100%; ">
                                <thead style="">
                                    <th>#</th>
                                    <th>Return Date</th>
                                    <th>Return Bill</th>
                                    <th>Return Status</th>
                           
                                    <th>Customer Name</th>
                              
                                   
                                    <th>Created by</th>
                                                             
                                    <th><i class="fas fa-arrow-circle-down"></i></th>
                                </thead>
                                <tbody style="width:100%; overflow-x:scroll;">

                                    @foreach($sales as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->sales_date }}</td>
                                            <td>{{$item->prefix . '/' . $item->sales_code }}</td>
                                            <td>
                                                {{$item->sales_status}}

                                            </td>
                                           
                                            <td>{{ $suppliers->firstWhere('id', $item->customer_id)->customer_name ?? 'N/A' }}
                                            </td>
                         
                                            <td>{{ $user->firstWhere('id', $item->created_by)->role ?? 'N/A' }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-success light sharp"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="fa-solid fa-computer-mouse-scrollwheel"></i></button>
                                                    <div class="dropdown-menu" >
                                                        <a href="{{ route('invoice_sale.view.store', [
                                                            'id' => $item->id,
                                                            'sale_type' => $item->sales_type ?? 0,
                                                            'sale_id' => $item->sale_id
                                                        ]) }}" class="dropdown-item">
                                                            <i class="fas fa-eye"></i> Credit Note
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
  
 
    function totals(totalQty, grandTotal,id) {
    document.getElementById('totalitemqty_1').value = totalQty;
    document.getElementById('total_amount_print').value = grandTotal;
    document.getElementById('id').value=id;
}
            
</script>
 @endsection