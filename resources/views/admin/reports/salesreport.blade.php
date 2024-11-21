
@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">



        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-footer">
                        <h4 class="card-text d-inline"> Sales List </h4>

                    </div>

                    <div class="card-body">
                        <div style="margin-bottom: 10px;">
                            <button onclick="showfilter()" type="button" class="btn btn-secondary btn-sm"><i class="flaticon-381-funnel"></i> | Filter</button>
                            <button onclick="refresh()" type="button" class="btn btn-secondary btn-sm"><i class="flaticon-381-repeat-1"></i> | Reset</button>
                        </div>
                        <script type="text/javascript">
                            function showfilter(select) {
                                var x = document.getElementById("calcu");
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                } else {
                                    x.style.display = "none";
                                }
                            }

                            function refresh() {
                                window.location.reload();
                            }
                        </script>

                        <div id="calcu" style="display: none;">
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">From Date</label>
                                    <input type="date" class="form-control form-control-sm input-limit-datepicker" id="search_fromdate" placeholder='From date'>

                                    <!-- <input type='text' id='search_fromdate' class="form-control form-control-sm datepicker" placeholder='From date'> -->

                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">To Date</label>

                                    <input type="date" class="form-control form-control-sm input-limit-datepicker" id="search_todate" placeholder='To date'>

                                    <!-- <input type='text' id='search_todate' class=" form-control form-control-smdatepicker" placeholder='To date'> -->
                                </div>

                                <div class="mb-3 col-md-3">
                                    <!-- <input type='button' id="btn_search" value="Search"> -->
                                    <label class="form-label">Warehouse</label>
                                    <select name="warehouse" id="warehouse_id" class="form-control selectpicker" data-live-search="true">
                                      
                                            <option value="">-Select-</option>
                                           
                                        
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="salesreport" class="display" style="width:100%;">
                                <thead>
                                    <tr>
                                         <th>#</th>
                                        <th>Sales Date</th>
                                        <th>Invoice No</th>
                                        <th>Reference No</th>
                                        <th>Customer Name</th>
                                        <th>Item Qty</th>
                                        <th>Bill Amt</th>
                                        <th>Receive</th>
                                        <th>Payment Status</th>
                                        <th>Type of Billing</th>
                                        <th>Created by</th>

                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<script>
    function printpos(id) {
        window.open('print/pos-print/' + id, '_blank', 'scrollbars=1,resizable=1,height=500,width=500');
    }
</script>


