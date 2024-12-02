@extends('store/layouts/app')

@section('title', 'Home Page')

<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('content')

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





<div>
    <div class="content-body">

        <div class="container-fluid">



            <div class="row">
                <div class="col-12">

                    <form  >


                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-text d-inline"> Sales Report </h4>
                         
                            </div>
                            <div class="card-body">


                                <div class="row">
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Store Name<span class="required">*</span></label>

                                            <!-- Make it readonly -->
                                            <div class="input-group mb-3">
                                                <select id="store_select" name="store_id" class="form-control selectpicker"
                                                    data-live-search="true" required >
                                                   
                                                   
                                                    <option value="{{$store->id}}">{{$store->store_name}}</option>
                                             
                                                </select>
                                            </div>



                                        </div>
                                    </div>
                                  

                                 
                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Customer Name<span
                                                    class="required">*</span></label>
                                      

                                            <div class="input-group mb-3">
                                                <select class="form-control selectpicker" data-live-search="true" required id="customer_select" name="supplier_id">
                                                    <option value="">-Select-</option>
                                                    @foreach ($customers as $customer)

                                                    <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                                                        
                                                    @endforeach
                                                </select>
                                             
                                            </div>
                                        </div>
                                    </div>
                              

                              

                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">From Date<span
                                                    class="required">*</span></label>
                                            <input type="date" id="from_date" name="from_date" class="form-control form-control-sm"
                                                value="">
                                        </div>
                                    </div>
                                    <style>

                                    </style>

                                    <div class="col-lg-6 mb-2">
                                        <div class="form-group">
                                            <label class="form-label">To Date</label>
                                            <input type="date" id="to_date" name="to_date" class="form-control form-control-sm">
                                        </div>
                                    </div>
                               
                                </div>


                                <hr class="solid">
                                <div id="start_billing">
                                    <div class="row">
                                        
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


                                            <div class="table table-responsive" style="width: 100%; color: #fff;" id="print_div">
                                                <div class="dropdown" style="float: right;">
                                                    <button class="btn btn-primary btn-o dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-fw fa-bars"></i> Export <span class="caret"></span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <button id="download_Btn" class="dropdown-item" type="button">Download pdf</button>
                                                        <button id="print_Btn" onclick="printPreview()" class="dropdown-item" type="button">Print</button>
                                                    </div>
                                                </div>
                                                
                                               
                                                <table class="table table-hover table-bordered" style="width:100%" id="preview_data">
                                                    <thead class="custom_thead">
                                                        <tr class="bg-primary">
                                                            <th rowspan="2" style="width:5%; color: #fff !important;" class="itemRow">Sl No</th>
                                                            <th rowspan="2" style="width:20%; color: #fff !important;" class="itemRow">Store Name</th>
                                                            <th rowspan="2" style="width:15%;min-width: 180px;color: #fff !important;">Date</th>
                                                            <th rowspan="2" style="width:15%;min-width: 180px;color: #fff !important;">Bill No</th>
                                                            <th rowspan="2" style="width:15%;min-width: 180px;color: #fff !important;">Quantity</th>
                                                            <th rowspan="2" style="width:10%;color: #fff !important;">Paid Amount</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="ledger-results">
                                                 
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                  
<script>
    $(document).ready(function() {
        // Existing code for store and customer selection...

        // Fetch ledger data when a customer is selected
        $('#customer_select').on('change', function() {
            fetchLedgerData();
        });

        // Fetch ledger data when dates are changed
        $('#from_date, #to_date').on('change', function() {
            fetchLedgerData();
        });

        function fetchLedgerData() {
            var customerId = $('#customer_select').val();
            var fromDate = $('#from_date').val();
            var toDate = $('#to_date').val();

            if (customerId) {
                $.ajax({
                    url: '{{ route('get.sales.by.customer.store') }}', // Update with your route
                    type: 'GET',
                    data: {
                        customer_id: customerId,
                        from_date: fromDate,
                        to_date: toDate
                    },
                    success: function(data) {
                        console.log('Ledger data:', data); // Log the data received
                        $('#ledger-results').empty(); // Clear previous results

                        if (data.success) {
                            $.each(data.sale, function(index, item) {
                                $('#ledger-results').append('<tr>' +
                                    '<td>' + (index + 1) + '</td>' + // Serial number
                                    '<td>' + (item.store ? item.store.store_name : 'N/A') + '</td>' + 
                                    '<td>' + item.sales_date + '</td>' + // Accessing store name safely
                                    '<td>' + item.prefix + '/' + item.sales_code + '</td>' + 
                                    '<td>' + item.total_qty +  '</td>' +// Ensure this matches your data structure
                                  // Ensure this matches your data structure
                                    '<td>' + item.paid_amount + '</td>' + // Ensure this matches your data structure
                                    '</tr>');
                            });
                        } else {
                            $('#ledger-results').append('<tr><td colspan="5">No sale data found.</td></tr>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching ledger data:', error);
                        $('#ledger-results').append('<tr><td colspan="5">Error fetching ledger data.</td></tr>');
                    }
                });
            } else {
                $('#ledger-results').empty(); 
            }
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>

function printPreview() {
    // Get the table element to print
    const previewData = document.getElementById('preview_data');

    // Create a new window for printing
    const printWindow = window.open('', '', 'height=600,width=800');
    printWindow.document.write('<html><head><title>Print</title>');
    printWindow.document.write('<link rel="stylesheet" href="https://path/to/your/styles.css">'); // Include your styles
    printWindow.document.write('<style>'); // Add any additional styles if needed
    printWindow.document.write('table { width: 100%; border-collapse: collapse; }'); // Ensure the table uses border-collapse
    printWindow.document.write('th, td { border: 1px solid #000; padding: 8px; text-align: left; color: #000 !important;}'); // Add borders to th and td
    printWindow.document.write('th { background-color: blue; color: #fff !important;}'); // Optional: Add background color to headers
    printWindow.document.write('</style>');
    printWindow.document.write('</head><body>');
    
    // Write the entire table HTML to the new window
    printWindow.document.write('<h1>Ledger Report</h1>'); // Optional: Add a title
    printWindow.document.write(previewData.outerHTML); // Write the table HTML to the new window
    
    printWindow.document.write('</body></html>');
    printWindow.document.close(); // Close the document
    printWindow.print(); // Trigger the print dialog
}

 document.getElementById('download_Btn').addEventListener('click', () => {

     
     const previewData = document.getElementById('preview_data');

     html2canvas(previewData).then(canvas => {
         const imgData = canvas.toDataURL('image/png');
         const pdf = new jspdf.jsPDF();

         const imgWidth = 190;
         const imgHeight = (canvas.height * imgWidth) / canvas.width;

         pdf.addImage(imgData, 'PNG', 10, 10, imgWidth, imgHeight);
         pdf.save('preview.pdf');
         
        
     });
 });
</script>
                                            </div>
                        </div>
                    </form></div></div></div></div></div>


@endsection