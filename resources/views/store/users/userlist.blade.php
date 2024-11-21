@extends('store//layouts/app')

@section('title', 'Home Page')

@section('content')

<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
<style>
        /* Existing CSS */
th{
    text-align: center;
}
        .dataTables_wrapper .dataTables_paginate {
            display: flex;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5em 1em;
            margin: 0 0.2em;
            border-radius: 4px;
            background-color: gray;
            color: white;
            border: none;
            position: relative;
            left: -40%;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #0056b3;
            cursor: pointer;
        }

        .dt {
            background-color: black;
        }

        /* Style for DataTable buttons */
        .dt-button {
            width: auto;
            height: auto;
            background-color: black;
            /* Black background */
            color: white;
            /* White text */
            border: none;
            /* Remove border */
        }

        .dt-button:hover {
            background-color: #444;
            /* Darker gray on hover */
            cursor: pointer;
            /* Pointer cursor on hover */
        }

        .dt-button.buttons-csv,
        .dt-button.buttons-print,
        .dt-button.buttons-pdf,
        .dt-button.buttons-excel {
            background-color: black;
            color: white;
        }

        .dt-button.buttons-csv:hover,
        .dt-button.buttons-print:hover,
        .dt-button.buttons-pdf:hover,
        .dt-button.buttons-excel:hover {
            background-color: black;
        }

        /* Style for the button container and filter */
        .button-filter-container {
            display: flex;
            justify-content: space-between;
            /* Space between left and right sections */

            padding: 10px;
            /* Padding around the buttons */
            margin-bottom: 15px;
            /* Space below the buttons */
            border-radius: 10px;
            width: 100%;
            /* Full width */
        }

        @media(max-width:600px) {
            .button-filter-container {
                flex-direction: column;
                width: 100%;
            }
        }

        .row-count-filter {
            display: flex;
            align-items: center;
            margin-right: 10px;
            /* Space between dropdown and buttons */
        }

        .row-count-filter label {
            margin-right: 5px;
            /* Space between label and select */

        }

        .search-container {
            display: flex;
            align-items: center;
            margin-left: auto;
            /* Pushes the search to the right */
        }

        .search-container input {
            padding: 5px;
            border: 1px solid #ccc;
            /* Border for search input */
            border-radius: 4px;
            /* Rounded corners */
            margin-left: 5px;
            /* Space between label and input */
        }

        .search-container label {

            margin-right: 5px;
            /* Space between label and input */
        }

        .butt {
            width: 30%;
        }

        .button-container {
            display: flex;
            justify-content: center;
            /* Align buttons to the start */
            flex-grow: 1;
            /* Allow this area to take available space */
            gap: 4px;
            /* Space between buttons */
            background-color: black;
            position: relative;
            border-radius: 10px;
            /* Change this value to your desired width */
        }
    </style>
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">



        <div class="row">
            
@if(session('error'))
            <script>
                swal({
                    title: "error!",
                    text: "{{ session('error') }}",
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
            <div class="col-12">
                <div class="card">

                    <div class="card-footer">
                        <h4 class="card-text d-inline"> Users List </h4>
                        <div>
                        
                            <a href="{{route('store_Userpost')}}" class="card-link float-end btn btn-rounded btn-info btn-sm "><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Create User</a>
                          
                        </div>
                     
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="userslist" class="display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                  
                                        <th>User Name</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Created on</th>                                                                          
                                   <!--      <th>Status</th>     -->                                    
                                        <th><i class="fas fa-arrow-circle-down"></i></th>
                                    </tr>
                                </thead>
                              
                        <tbody style="width:100%; overflow-x:scroll;">

@foreach ($userlist as $index => $item
)
                            <div class="form_update" id="form_update_{{ $index }}">
                                <form action="{{ route('updateStatus.user') }}" method="post"
                                    class="status-toggle-form">
                                    @csrf
                                    <i class="fa-thin fa-circle-exclamation" style=" font-size: 60px;
      margin-bottom: 2px;
      color: orange; "></i>
                                    <p style="font-size: 20px;">Are You Sure</p>
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <p>Do you want to change this to
                                        {{ $item->status === 'active' ? 'inactive' : 'active' }}?</p>
                                    <div class="buttons" style="width:100%; justify-content:end;">
                                        <button>
                                            <a href="{{ route('userlist') }}">Cancel</a></button>
                                        <button type="submit" style="display:block;">Yes</button>
                                    </div>
                                </form>
                            </div>
                            <tr>
                                <td>{{ $index + 1 }}</td> <!-- Display row number -->
                               
                        
                         
                                
                                <td>{{$item->username}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->mobile}}</td>
                                <td>{{$item->email}}</td> <!-- Display Brand Name -->
                                <td>{{$item->role}}</td>
                                
                                <td>{{ $item->updated_at->format('Y-m-d') }}</td>

                            <!--     <td id="statuschange_{{ $index }}">
                                <p class="status-cell {{ $item->status === 'active' ? 'active-status' : 'inactive-status' }}"
                                        style="cursor: pointer;">
                                        {{ $item->status }}
                                    </p>
                                </td> --> <!-- Display Mobile or N/A if not available -->
                                <td style="display: flex; justify-content:center; gap: 10px;">
                                    <form action="{{route('store_useredit')}}"
                                        style="width:auto; height:auto; box-shadow:none;" method="post">
                                        @csrf
                                        <input type="text" name="id" value="{{$item->id}}" hidden>

                                        <button id="update" style="display:block;" type="submit"><i
                                                class="fa-solid fa-pencil"></i></button>
                                    </form>
                                    <form style="width:auto; height:auto; box-shadow:none;"
                                        action="{{ route('store_deleteuser') }}" method="post">
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
            </div>

        </div>

    </div>
</div>


<script>

// Check if there is an error toast and set timeout
if (document.getElementById('errorToast')) {
    setTimeout(() => {
        document.getElementById('errorToast').classList.remove('active');
    }, 5000); // Adjust the duration as needed

    document.getElementById('closeErrorToast').addEventListener('click', () => {
        document.getElementById('errorToast').classList.remove('active');
    });
}

// Toast timeout for success
setTimeout(() => {
    document.getElementById('toast').classList.remove('active');
}, 5000);

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script>
            $(document).ready(function () {
             
                var table = $('table').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'csvHtml5',
                            text: 'CSV',
                            exportOptions: {
                                modifier: {
                                    page: 'current' 
                                }
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            text: 'Excel',
                            exportOptions: {
                                modifier: {
                                    page: 'current'
                                }
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            text: 'PDF',
                            exportOptions: {
                                modifier: {
                                    page: 'current'
                                }
                            }
                        },
                        {
                            extend: 'print',
                            text: 'Print',
                            exportOptions: {
                                modifier: {
                                    page: 'current'
                                }
                            }
                        }
                    ],
                    paging: true,
                    ordering: true,
                    searching: false,
                    pageLength: 10,
                    lengthChange: true, 
                    pagingType: 'simple',
                    info: true,
                    initComplete: function () {
                      
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