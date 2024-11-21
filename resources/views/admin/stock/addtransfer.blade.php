
@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

   

        <div class="row">
            <form method="post" enctype="multipart/form-data">
                <div class="col-12">
                    <div class="card">

                        <div class="card-footer">
                            <h4 class="card-text d-inline"> Stock Transfer </h4>

                        </div>


                        <div class="card-body">

                            <input type="text" name="store_id" id="store_id" value="" hidden>
                            <div class="row">

                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Transfer Date<span class="required">*</span></label>
                                        <input type="date" name="transfer_date" class="form-control form-control-sm" value="">
                                    </div>
                                </div>



                            </div>


                            <div class="row">


                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">From Warehouse <span class="required">*</span></label>
                                        <select name="warehouse_from" id="from_warehouse_id" class="form-control selectpicker" data-live-search="true" required onchange="cleartable()">
                                            <option value="">-Select-</option>
                                    
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">To Warehouse <span class="required">*</span></label>
                                        <select name="warehouse_to" id="to_warehouse_id" class="form-control selectpicker" data-live-search="true" required>
                                            <option value="">-Select-</option>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12 mb-2" id="searchlab">
                                    <div class="form-group">

                                        <div class="input-group custom-select mb-3">
                                            <label class="input-group-text" for="inputGroupSelect01"><i class="bi bi-upc"></i></label>
                                            <input type="text" class="form-control" placeholder="Item name/Barcode/Itemcode" id="item_search" autocomplete="off" oninput="searchitem()" onkeypress="return (event.key!='Enter')">
                                        </div>
                                        <div class="dropdown-menu" id="search_rapper" style="min-width: 95%;">
                                        </div>
                                    </div>
                                </div>




                                <div class="col-lg-12 mb-2">
                                    <div class="table table-responsive" style="width: 100%; color: #fff;">
                                        <table class="table table-hover table-bordered" style="width:100%" id="item-table">
                                            <thead class="custom_thead">
                                                <tr class="bg-primary">
                                                    <th rowspan="2" style="width:15%; color: #fff !important;" class="itemRow">Item Name</th>
                                                    <th rowspan="2" style="width:15%;min-width: 180px;color: #fff !important;">Quantity</th>
                                                    <th rowspan="2" style="width:10%;color: #fff !important;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                            </tbody>
                                        </table>


                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" class="col-sm-4 control-label">Total Items</label>
                                                <div class="col-sm-4">
                                                    <label class="control-label total_quantity text-success" id="totalitemqty">0</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="" class="col-sm-12 control-label">Note</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <textarea name="note" class="form-control"></textarea>
                                        </div>

                                    </div>


                                </div>



                            </div>

                        </div>

                        <div class="card-header">



                            <button name="save" type="submit" class="btn btn-success payments_modal">Save</button>

                            <a href="dashboard">
                                <button type="button" class="btn btn-block btn-warning" title="Go Dashboard">Close</button>
                            </a>


                        </div>

                    </div>
                </div>

            </form>

        </div>




    </div>
</div>




<audio id="success">
    <source src="pos_assets/success.mp3" type="audio/mpeg" />
    <source src="pos_assets/success.ogg" type="audio/ogg" />
</audio>
<audio id="failed">
    <source src="pos_assets/failed.mp3" type="audio/mpeg" />
    <source src="pos_assets/failed.ogg" type="audio/ogg" />
</audio>

<script>
    function playsuccess() {
        document.getElementById("success").play();
    }

    function playfailed() {
        document.getElementById("failed").play();
    }
</script>


<script>
    function searchitem() {

        var search = document.getElementById("item_search").value;
        var from_warehouse_id = document.getElementById("from_warehouse_id").value;
        var to_warehouse_id = document.getElementById("to_warehouse_id").value;

        if (from_warehouse_id && to_warehouse_id) {
            if (from_warehouse_id == to_warehouse_id) {
                // alert("Destination Wareshouse should not be same!");
                swal("Destination Wareshouse should not be same!");
            } else {

                $.ajax({
                    type: "POST",
                    url: "controller/search-item-stockadjestment.php",
                    data: {
                        search: search,
                        warehouse_id: from_warehouse_id,
                    },
                    success: function(response) {
                        document.getElementById("search_rapper").style.display = "block";
                        document.getElementById("search_rapper").innerHTML = response;
                    },
                });
            }

        } else {
            // alert("Please select warehouses!");
            swal("Please select warehouses!");
        }


    }

    //clearing table by cahngeing from warehouse
    function cleartable() {
        $("#item-table > tbody").empty();
        document.getElementById("totalitemqty").innerHTML = 0;

    }

    function addtolabel(id) {
        document.getElementById("search_rapper").style.display = "none";
        document.getElementById("item_search").value = "";
        //  document.getElementById("searchlab").style.display = "none";
        $.ajax({
            type: "POST",
            url: "controller/add-item-label.php",
            data: {
                iteam_id: id
            },
            success: function(response) {
                var data = jQuery.parseJSON(response);

                document.getElementById("failed").play();

                var count = $(".itemRow").length;

                var htmlRows = "";
                htmlRows += "<tr >";
                htmlRows +=
                    '<td id="td_' +
                    count +
                    '"><input name="item_id[]" type="hidden" id="item_id_' +
                    count +
                    '" class="form-control form-control-sm itemRow" value="' +
                    data.item_id +
                    '">' +
                    data.item_name +
                    "</td>";
                htmlRows +=
                    '<td><div class="input-group input-group-sm mb-3"><button type="button" onclick="decrement_qty(1,' +
                    count +
                    ')" class="input-group-text">-</button><input name="qty[]" id="qty_' +
                    count +
                    '" type="text" class="form-control form-control-sm" value="1" oninput="update_calculation(' +
                    count +
                    ')"><button type="button" onclick="increment_qty(1,' +
                    count +
                    ')" class="input-group-text">+</button></div></td>';

                htmlRows +=
                    '<td> <button onclick="delete_row(' +
                    count +
                    ')" type="button" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>';
                htmlRows += '<input name="item_code[]" type="hidden" id="item_code_' +
                    count +
                    '" class="form-control form-control-sm " value="' +
                    data.item_code +
                    '">';
                htmlRows += '<input name="mrp[]" type="hidden" id="mrp_' +
                    count +
                    '" class="form-control form-control-sm " value="' +
                    data.mrp +
                    '">';
                htmlRows += '<input name="custom_barcode[]" type="hidden" id="custom_barcode_' +
                    count +
                    '" class="form-control form-control-sm " value="' +
                    data.custom_barcode +
                    '">';
                htmlRows += '<input name="sales_price[]" type="hidden" id="sales_price_' +
                    count +
                    '" class="form-control form-control-sm " value="' +
                    data.sales_price +
                    '">';

                htmlRows += '<input name="item_name[]" type="hidden" id="item_name_' +
                    count +
                    '" class="form-control form-control-sm " value="' +
                    data.item_name +
                    '">';

                htmlRows += "</tr>";

                $("#item-table").append(htmlRows);

                document.getElementById("totalitemqty").innerHTML = count;

            },
        });
    }

    //delecting a row in table
    function delete_row(count) {
        var newcount = count;
        document.getElementById("item-table").deleteRow(newcount);
        var count = $(".itemRow").length;
        var totalitemqty = parseFloat(count) - 1;
        document.getElementById("totalitemqty").innerHTML = totalitemqty;
        // document.getElementById("totalitemqty").value = totalitemqty;
        // document.getElementById("totalitemqty_1").value = totalitemqty;

    }
    //increacing quantity
    function increment_qty(value, count) {
        var qty = document.getElementById("qty_" + count).value;
        document.getElementById("qty_" + count).value = parseFloat(qty) + value;
        update_calculation(count);
    }
    //decrecing quantity
    function decrement_qty(value, count) {
        var qty = document.getElementById("qty_" + count).value;
        if (qty != 0) {
            document.getElementById("qty_" + count).value = parseFloat(qty) - value;
            update_calculation(count);
        }
    }
</script>



