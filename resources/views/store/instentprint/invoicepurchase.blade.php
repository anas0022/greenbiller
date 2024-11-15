@extends('store/layouts/app')

@section('title', 'Home Page')

@section('content')
<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">

<div class="content-body">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">

                <div class="card" id="preview_data">
            
    <!--*******************
        Preloader end
    ********************-->







                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                               
                                <h4 class="card-title">purchase preview </h4>
                                <a href="{{route('store_new_purchase')}}"
                                class="card-link float-end btn btn-rounded btn-info btn-sm "><span
                                    class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                                </span>New purchase</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="padding: 30px !important; ">
                                    <table id="example" class="display" style="min-width: 845px ;border: 1px solid #12453 !important;">
                                        <thead>
                                           
                                            
                                           
                                            <tr>
                                                <th>
                                                    Sl No
                                                    
                                                </th>
                                                <th>
                                                    Item Name
                                                </th>
                                                <th>
                                                    Hsn Code
                                                </th>
                                                <th>
                                                    part no
                                                </th>
                                                <th>
                                                    Quantity
                                                </th>
                                                <th>
                                                    Total
                                                </th>
                                            </tr>
                                           
                                        </thead>
                                        <tbody>
                                        @foreach ($sales_itemdata as $index=> $purchase)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{ $items->firstWhere('id', $purchase->id)->item_name ?? 'N/A' }}</td>

                <td>{{ $items->firstWhere('id', $purchase->id)->hsn_code ?? 'N/A' }}</td>
                <td>{{$purchase->part_no}}</td>
                <td>{{$purchase->purchase_qty ?? '00'}}</td>
                <td>{{$purchase->total_cost ?? "00"}}</td>
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
                </div></div></div></div>
    <script src="{{ asset('admin-assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('admin-assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/deznav-init.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('admin-assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/plugins-init/datatables.init.js') }}"></script>
