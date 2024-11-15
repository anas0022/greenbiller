@extends('store/layouts/app')

@section('title', 'Home Page')

@section('content')


<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
<script type="text/javascript" src= 
        "https://code.jquery.com/jquery-3.5.1.js"> 
    </script> 
  
    <!-- DataTables CSS -->
    <link rel="stylesheet" href= 
"https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"> 
  
    <!-- DataTables JS -->
    <script src= 
"https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"> 
    </script> 

<style>
    /* Existing CSS */
</style>
</head>

<body>

 


    <div class="content-body">

        <div class="container-fluid" >
                
    <div class="row">
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


                <!-- Modal Unit -->

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


          

          
                    <table id="tableID" class="display" style="width:100%;">
                        <thead style="">
                        <th>#</th>
                                        <th>Purchase Date</th>
                                        <th>Purchase Code</th>
                                        <th>Purchase Status</th>
                                        <th>Reference No</th>
                                        <th>Supplier Name</th>
                                        <th>Total</th>
                                        <th>Paid Payment</th>
                                        <th>Payment Status</th>
                                        <!-- <th>Created by</th>                                       -->
                                        <th><i class="fas fa-arrow-circle-down"></i></th>
                        </thead>
                        <tbody style="width:100%; overflow-x:scroll;">

                        @foreach($purchase as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->created_on }}</td>
                                            <td>{{ $item->purchase_code }}</td>
                                            <td>
                                                {{$item->purchase_status}}
                                             
                                            </td>
                                            <td>{{ $item->reference_no }}</td>
                                            <td>{{ $suppliers->firstWhere('id', $item->supplier_id)->name ?? 'N/A' }}</td>
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
                                                    <p class=" Not-paid"> Partial </p>
                                                @else
                                                    <p class=" paid"> Paid </p>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-success light sharp"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="fa-solid fa-computer-mouse-scrollwheel"></i></button>
                                                    <div class="dropdown-menu" style="">
                                                        <form action="{{route('invoice_purchase')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{$item->count_id}}"
                                                                name="purchase_id">
                                                            <a class="dropdown-item"
                                                                href="{{route('store_invoice_purchase', ['id' => $item->count_id])}}"><i
                                                                    class="fas fa-eye"></i> View Purchase</a>
                                                      
                                                        <a class="dropdown-item" href="edit-purchase/' . $row_item . '"><i
                                                                class="fas fa-pencil-alt"></i> Edit</a>
                                                        <a class="dropdown-item"
                                                            href="purchase-payment/' . $row_item . '"><i
                                                                class="fas fa-money-check-dollar"></i> View Payments</a>
                                                        @if ($item->paid_amount == Null)
                                                            <a class="dropdown-item"
                                                                href="purchase-payment/' . $row_item . '"><i
                                                                    class="fas fa-money-check-dollar"></i> Make Payments</a>
                                                        @endif

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


        <script>

            // Check if there is an error toast and set timeout
            if (document.getElementById('errorToast')) {
                setTimeout(() => {
                    document.getElementById('errorToast').classList.remove('active');
                }, 50000); // Adjust the duration as needed

                document.getElementById('closeErrorToast').addEventListener('click', () => {
                    document.getElementById('errorToast').classList.remove('active');
                });
            }

            // Toast timeout for success
            setTimeout(() => {
                document.getElementById('toast').classList.remove('active');
            }, 50000);

            document.getElementById('closeToast').addEventListener('click', () => {
                document.getElementById('toast').classList.remove('active');
            });
        </script>
        <script>
            // Get all elements with the class 'status-cell'
            document.querySelectorAll('.status-cell').forEach(function (cell, index) {
                cell.addEventListener('click', function () {
                    // Find the corresponding form for the current row
                    var formUpdate = document.getElementById('form_update_' + index);
                    if (formUpdate) {
                        formUpdate.style.display = (formUpdate.style.display === 'none' || formUpdate.style.display === '') ? 'flex' : 'none';
                    }
                });
            });

        </script>
        
      
       
        <script>
            $(document).ready(function () {
                // Initialize DataTable with options
                var table = $('#tableID').DataTable({
                    dom: 'Bfrtip', // Default position
                    buttons: [
                        {
                            extend: 'csvHtml5',
                            text: 'CSV',
                            exportOptions: {
                                modifier: {
                                    page: 'current' // Only print the current page
                                }
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            text: 'Excel',
                            exportOptions: {
                                modifier: {
                                    page: 'current' // Only print the current page
                                }
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            text: 'PDF',
                            exportOptions: {
                                modifier: {
                                    page: 'current' // Only print the current page
                                }
                            }
                        },
                        {
                            extend: 'print',
                            text: 'Print',
                            exportOptions: {
                                modifier: {
                                    page: 'current' // Only print the current page
                                }
                            }
                        }
                    ],
                    paging: true,
                    ordering: true,
                    searching: true,
                    pageLength: 10,
                    lengthChange: true,
                    pagingType: 'full',
                    info: true,
                    initComplete: function () {
                        // Move the buttons to the button container
                        this.api().buttons().container().appendTo('.button-container');
                    }
                });

                // Handling row count change
                $('#rowCount').on('change', function () {
                    var newLength = $(this).val();
                    table.page.len(newLength).draw();
                });

                // Handling search input
                $('#searchInput').on('keyup', function () {
                    table.search($(this).val()).draw();
                });
            });
        </script>



        @endsection