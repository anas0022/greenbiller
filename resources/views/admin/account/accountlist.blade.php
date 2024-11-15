@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')

<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">



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
<div class="content-body">
    <!-- row -->
    <div class="container-fluid" style="width:100%; ">
            <div  style="background-color:white;  width:100%;">
            <div class="col-12">
                <div class="card">

                    <div class="card-footer">
                        <h4 class="card-text d-inline"> Accounts List</h4>
                        <div>
                        
                            <a href="{{route('account')}}" class="card-link float-end btn btn-rounded btn-info btn-sm "><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Create Account</a>
                          
                        </div>
                     
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="accountlist" class="display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Account Number</th>
                                        <th>Account Name</th>
                                        <th>Parent Account Name</th>
                                        <th>Balance</th>
                                        <th>Created By</th>                                                                           
                                        <th>Status</th>                                        
                                        <th><i class="fas fa-arrow-circle-down"></i></th>
                                    </tr>
                                </thead>
                              <tbody>
                                @if (!empty($account))

                                @foreach ($account as $index=>$a )
                                <div class="form_update" id="form_update_{{ $index }}">
                                                            <form action="{{ route('account.status') }}" method="post"
                                                                class="status-toggle-form" >
                                                                @csrf
                                                                <i class="fa-thin fa-circle-exclamation" style=" font-size: 60px;
                                  margin-bottom: 2px;
                                  color: orange; "></i>
                                                                <p style="font-size: 20px;">Are You Sure</p>
                                                                <input type="hidden" name="id" value="{{ $a->id }}">
                                                                <p>Do you want to change this to
                                                                    {{ $a->status === 'active' ? 'inactive' : 'active' }}?</p>
                                                                <div class="buttons" style="width:100%; justify-content:end;">
                                                                    <button>
                                                                        <a href="">Cancel</a></button>
                                                                    <button type="submit" style="display:block;">Yes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$a -> account_number}}</td>
                                <td>{{$a -> account_name}}</td>
                                <td>{{$a-> parent_accont}}</td>
                                <td>{{$a->opening_balance}}</td>
                                <td>{{ $user_select->role ?? 'N/A' }}</td>

                                <td id="statuschange_{{ $index }}">
                                                            <p class="status-cell {{ $a->status === 'active' ? 'active-status' : 'inactive-status' }}"
                                                                    style="cursor: pointer;">
                                                                    {{ $a->status }}
                                                                </p>
                                                            </td>
                                                            <td style="display: flex; justify-content:center; gap: 10px;">
                                                                <form action="{{route('edit_account')}}"
                                                                   method="post">
                                                                    @csrf
                                                                    <input type="text" name="id" value="{{$a->id}}" hidden>

                                                                    <button id="update" ><a href=""></a><i
                                                                            class="fa-solid fa-pencil"></i></button>
                                                                </form>
                                                                <form 
                                                                    action="{{ route('account_delete') }}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$a->id}}">
                                                                    <button type="submit" id="delete" style="display:block;"><i
                                                                            class="fa-solid fa-trash"></i></button>
                                                                </form>
                                                            </td>
                         
                                </tr>

                                @endforeach
                                
                                @endif
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
