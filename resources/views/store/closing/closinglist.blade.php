@extends('store.layouts.app')
@section('content')
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">


    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-footer">
                            <h4 class="card-text d-inline"> Closing List </h4>
                            <div style="padding: 10px;">
                                <a href="{{ route('daily.closing.store') }}"
                                    class="card-link float-end btn btn-rounded btn-info btn-sm "
                                    style="margin-bottom:25px;"><span class="btn-icon-start text-info"><i
                                            class="fa fa-plus color-info"></i>
                                    </span>New Closing</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Date</th>
                                            <th style="text-align: center;">Invoice Count</th>
                                            <th style="text-align: center;">Total Sale</th>
                                            <th style="text-align: center;">Purchase Count</th>
                                            <th style="text-align: center;">Total Purchase</th>
                                            <th style="text-align: center;">Total Expense</th>
                                            <th style="text-align: center;">Closing Amount</th>
                                            <th style="text-align: center;">Action</th>
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
     $(document).ready(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: false,
        ajax: {
            url: '{{ route("closing.list.store") }}',
            type: 'GET',
            dataSrc: function (json) {
                console.log('AJAX Response:', json); // Log the entire response
                return json.data; // Ensure this matches your data structure
            }
        },
        columns: [
            { data: 'date', className: 'text-center' },
            { data: 'invoice_count', className: 'text-center' },
            { data: 'total_sale', className: 'text-center' },
            { data: 'purchase_count', className: 'text-center' },
            { data: 'total_purchase', className: 'text-center' },
            { data: 'total_expense', className: 'text-center' },
            { data: 'closing_amount', className: 'text-center' },
            {
                data: 'id',
                className: 'text-center',
                render: function(data, type, row) {
                    console.log('Row data:', row); // Log the row data
                    var url = "{{ route('closing.bill',[ ':id', ':store_id']) }}";
                    if (row.store_id) {
                        url = url.replace(':id', data).replace(':store_id', row.store_id);
                        return `<a href="${url}">
                            <i class="fas fa-eye" style="color: #007bff; font-size: 20px;"></i>
                        </a>`;
                    } else {
                        console.warn('Missing store_id for row:', row); // Log a warning
                        return `<span>No Store ID</span>`;
                    }
                }
            }
        ],
        dom: '<"dt-buttons"B><"clear">lfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        lengthChange: true,
        pageLength: 10,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });
});
    </script>
@endsection
