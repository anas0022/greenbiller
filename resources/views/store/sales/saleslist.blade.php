@extends('store//layouts/app')

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

    @if(session('error'))
        <div class="toast error active" id="errorToast">
            <div class="toast-content">
                <i class="fas fa-solid fa-times error-icon"></i>
                <div class="message">
                    <span class="text text-1">Error</span>
                    <span class="text text-2">{{session('error')}}</span>
                </div>
            </div>
            <i class="fa-solid fa-xmark close" id="closeErrorToast"></i>
            <div class="progress error-progress active"></div>
        </div>
    @endif


    @if(session('success'))
        <div class="toast active" id="toast">
            <div class="toast-content">
                <i class="fas fa-solid fa-check check"></i>
                <div class="message">
                    <span class="text text-1">Success</span>
                    <span class="text text-2">{{session('success')}}</span>
                </div>
            </div>
            <i class="fa-solid fa-xmark close" id="closeToast"></i>
            <div class="progress active"></div>
        </div>
    @endif

    @if(session('warning'))
    <div class="alert alert-warning">
        {{ session('warning') }}
    </div>
@endif


    <div class="content-body">

        <div class="container-fluid" >
                
    <div class="row">
    <div class="col-12">
    <div class="card" style="padding:20px;">
            <div >
            <div class="card-footer">
                        <h4 class="card-text d-inline"> Sales List </h4>
                        <div>

                            <a href="{{route('add_sales_biller')}}"
                                class="card-link float-end btn btn-rounded btn-info btn-sm "><span
                                    class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                                </span>New Sales</a>

                        </div>

                    </div>



                <!-- Modal Unit -->

               
              


          

          
                    <table id="tableID" class="display" style="width:100%;">
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

                        @foreach($purchase as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{$item->prefix .'/'. $item->sales_code }}</td>
                                            <td>
                                                {{$item->purchase_status}}
                                             
                                            </td>
                                            <td>{{ $item->reference_no }}</td>
                                            <td>{{ $suppliers->firstWhere('id', $item->customer_id)->customer_name ?? 'N/A' }}</td>
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
                                                        <form action="{{route('invoice_sale.view')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{$item->count_id}}"
                                                                name="purchase_id">
                                                            <button class="dropdown-item"
                                                               type="submit"><i
                                                                    class="fas fa-eye"></i> View Sale</button>
                                                     </form>
                                                  
    <a class="dropdown-item" href="{{ route('saleitem_edit', ['id' => $item->count_id]) }}">
        <i class="fas fa-pencil-alt"></i> Edit
    </a>


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