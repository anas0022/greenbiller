@extends('store//layouts/app')

@section('title', 'Home Page')
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
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
    @if(session('error'))
                    <script>
                        swal({
                            title: "error!",
                            text: "{{ session('error') }}",
                            icon: "error",  // For SweetAlert version 1, use `type` instead of `icon`
                            type: "error"
                        });
                    </script>
                @endif
                @if(session('success'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "{{ session('success') }}",
                            icon: "success",  // For SweetAlert version 1, use `type` instead of `icon`
                            type: "success"
                        });
                    </script>
                @endif

    <div class="col-12">
    <div class="card" style="padding:20px;">
            <div >
                <div class="card-footer" style="margin-bottom:30px;">
                    <h4 class="card-text d-inline"> Items List</h4>

                    <a href="{{route('new_item')}}" class="card-link float-end btn btn-rounded btn-info btn-sm "><span
                            class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                        </span>Add Item</a>

                    <button type="button" class="card-link float-end btn btn-rounded btn-info btn-sm "
                        data-bs-toggle="modal" data-bs-target="#import"><span class="btn-icon-start text-info"><i
                                class="fa fa-plus color-info"></i>
                        </span>Import</button></div>
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
                            <th>Item Name</th>
                            <th>Item Code</th>
                        
                            <th>Brand</th>
                            <th>Category / Item Type</th>
                            <th>Unit</th>
                            <th>Stock</th>
                <!-- <th>Alert Quantity</th> -->
                           <!--  <th>Sales Price</th> -->
                            <th>Tax</th>
                            <th>Status</th>
                            <th><i class="fa-solid fa-circle-arrow-down"></i></th>
                        </thead>
                        <tbody style="width:100%; overflow-x:scroll;">

                            @foreach ($items as $index => $item)
                                <div class="form_update" id="form_update_{{ $index }}">
                                    <form action="{{ route('store_updateStatus.items') }}" method="post"
                                        class="status-toggle-form" style="background-color:white; padding:20px  ">
                                        @csrf
                                        <i class="fa-thin fa-circle-exclamation" style=" font-size: 60px;
                                                  margin-bottom: 2px;
                                                  color: orange; "></i>
                                        <p style="font-size: 20px;">Are You Sure</p>
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <p>Do you want to change this to
                                            {{ $item->status === 'active' ? 'inactive' : 'active' }}?
                                        </p>
                                        <div class="buttons" style="width:100%; justify-content:end;">
                                            <button>
                                                <a href="{{ route('brand') }}">Cancel</a></button>
                                            <button type="submit" style="display:block;">Yes</button>
                                        </div>
                                    </form>
                                </div>
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>{{$item->item_name}}</td>
                                    <td>{{$item->item_code}}</td>
                       
                                    <td>{{ $brand->firstWhere('id', $item->brand_id)->barndname ?? '' }}</td>
                              
                                    
                               
                       <td>{{ $categories->firstWhere('id', $item->category_id)->category_name ?? '' }}</td>
                       <td>{{ $unites->firstWhere('id', $item->unit_id)->unit_name ?? '' }}</td>
                       <td>{{$item->alert_quantity}}</td>
                       <td>{{ $tax->firstWhere('id', $item->tax_id)->id ?? '' }}</td>
                                    <td id="statuschange_{{ $index }}">
                                        <p class="status-cell {{ $item->status === 'active' ? 'active-status' : 'inactive-status' }}"
                                            style="cursor: pointer;">
                                            {{ $item->status }}
                                        </p>
                                    </td>
                                    <td style="display: flex; justify-content:center; gap: 10px;">
                                        <form action="{{route('store_edit.item')}}"
                                            style="width:auto; height:auto; box-shadow:none;" method="post">
                                            @csrf
                                            <input type="text" name="id" value="{{$item->id}}" hidden>

                                            <button id="update" style="display:block;"><a href=""></a><i
                                                    class="fa-solid fa-pencil"></i></button>
                                        </form>
                                        <form style="width:auto; height:auto; box-shadow:none;"
                                            action="{{ route('store_deleteitem') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <button type="submit" id="delete" style="display:block;"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
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