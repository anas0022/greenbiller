@extends('store//layouts/app')

@section('title', 'Home Page')

@section('content')
<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
<div class="content-body">

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
                        <h4 class="card-text d-inline"> Warehouse List</h4>

                        <a href="{{route('ware')}}" class="card-link float-end btn btn-rounded btn-info btn-sm "><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Add Warehouse</a>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="list" class="display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Warehouse Name</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Details</th>
                                        <th>Status</th>
                                        <th><i class="fas fa-arrow-circle-down"></i></th>
                                    </tr>
                                </thead>

                               
                        <tbody>

@foreach ($ware as $index => $brand)
                            <div class="form_update" id="form_update_{{ $index }}">
                                <form action="{{ route('store_updateStatus') }}" method="post"
                                    class="status-toggle-form">
                                    @csrf
                                    <i class="fa-thin fa-circle-exclamation" style=" font-size: 60px;
      margin-bottom: 2px;
      color: orange; "></i>
                                    <p style="font-size: 20px;">Are You Sure</p>
                                    <input type="hidden" name="id" value="{{ $brand->id }}">
                                    <p>Do you want to change this to
                                        {{ $brand->status === 'active' ? 'inactive' : 'active' }}?</p>
                                    <div class="buttons" style="width:100%; justify-content:end;">
                                        <button>
                                            <a href="{{ route('brand') }}">Cancel</a></button>
                                        <button type="submit" style="display:block;">Yes</button>
                                    </div>
                                </form>
                            </div>
                            <tr>
                                <td>{{ $index + 1 }}</td> <!-- Display row number -->
                                <td>
                                    {{$brand->name}}
                                </td>
                                <td>{{ $brand->address }}</td> <!-- Display Brand Name -->
                                <td>{{ $brand->mobile }}</td>
                                <td>{{ $brand->email }}</td>
                                <td>{{ $brand->details }}</td>
                                <td id="statuschange_{{ $index }}">
                                    <p class="status-cell {{ $brand->status === 'active' ? 'active-status' : 'inactive-status' }}"
                                        style="cursor: pointer;">
                                        {{ $brand->status }}
                                    </p>
                                </td> <!-- Display Mobile or N/A if not available -->
                                <td style="display: flex; justify-content:center; gap: 10px;">
                                    <form action="{{route('store_edit.warehoues')}}"
                                        style="width:auto; height:auto; box-shadow:none;" method="post">
                                        @csrf
                                        <input type="text" name="id" value="{{ $brand->id }}" hidden>

                                        <button id="update" style="display:block;"><i
                                                class="fa-solid fa-pencil"></i></button>
                                    </form>
                                    <form style="width:auto; height:auto; box-shadow:none;"
                                        action="{{ route('store_deleteware') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $brand->id }}">
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