@extends('admin.layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-footer" >
                            <h4 class="card-text d-inline"> Closing List </h4>
                            <div style="padding: 10px;">

                                <a href="{{route('daily.closing')}}"
                                    class="card-link float-end btn btn-rounded btn-info btn-sm " style="margin-bottom:25px;"><span
                                        class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                                    </span>New Closing</a>

                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                               
                              
                                <table class="table table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Invoice Count</th>
                                            <th>Total Sale</th>
                                            <th>Total Expense</th>
                                            <th>Closing Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        @foreach ($closing as $item)
                                        <tr>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->invoice_count}}</td>
                                            <td>{{$item->total_sale}}</td>
                                            <td>{{$item->total_expense}}</td>
                                            <td>{{$item->closing_amount}}</td>
                                            <td>
                                                <a href="{{route('closing.bill',['id'=>$item->id])}}" >
                                                    <i class="fas fa-eye" style="color: #007bff; font-size: 20px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
             
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