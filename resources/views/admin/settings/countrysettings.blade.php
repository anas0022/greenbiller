@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
<style>
    td{
        text-align: center;
    }
</style>
<div class="content-body">

    <!-- row -->
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-footer">
                        <h4 class="card-text d-inline">Country Settings
                        </h4>

                        <button type="button" class="card-link float-end btn btn-rounded btn-info btn-sm " data-bs-toggle="modal" data-bs-target="#basicModal"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Add Country Settings</button>
                    </div>
                    <!-- Modal start -->
                    <!-- Modal start -->
<!-- Modal start -->
<div class="modal fade" id="basicModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Country Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('country_post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Country Name <span class="required">*</span>:</label>
                        <div class="col-sm-9">
                            <!-- Empty select dropdown for country selection -->
                            <div class="mb-3 row">
    
    
        <input type="text" name="country_name" id="" class="form-control" required>
    </div>

                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Country Code <span class="required">*</span>:</label>
                        <div class="col-sm-9">
                            <!-- Country code input, automatically filled based on country selection -->
                            <input id="countryCode" name="country_code" type="text" class="form-control"  required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Currency Code <span class="required">*</span>:</label>
                        <div class="col-sm-9">
                            <!-- Country code input, automatically filled based on country selection -->
                            <input id="countryCode" name="currency_code" type="text" class="form-control"  required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Currency Symbol <span class="required">*</span>:</label>
                        <div class="col-sm-9">
                            <!-- Currency symbol input, automatically filled based on country selection -->
                            <input id="currencySymbol" name="currency_symbol" type="text" class="form-control"  required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button name="add" type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal end -->




                                
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="list" class="display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">#</th>
                                        <th style="text-align:center;">Country Name</th>
                                        <th style="text-align:center;">Country Code</th>
                                        <th style="text-align:center;">Country Symble</th>
                                        
                                        <th style="text-align:center;">Status</th>
                                        <th style="text-align:center;"><i class="fas fa-arrow-circle-down"></i></th>
                                    </tr>
                                </thead>
                                <tbody style="width:100%; overflow-x:scroll;">

                            @foreach ($countrysettings as $index => $item
                            )
                                                        <div class="form_update" id="form_update_{{ $index }}">
                                                            <form action="{{ route('updateStatus.tax') }}" method="post"
                                                                class="status-toggle-form" style="background-color:white; padding:20px  ">
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
                                                                        <a href="">Cancel</a></button>
                                                                    <button type="submit" style="display:block;">Yes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td> 
                                                           
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->mobile_code}}</td>
                                                            
                                                           
                                                            <td>{{$item->currency_symble}}</td>
                                                            <td id="statuschange_{{ $index }}">
                                                            <p class="status-cell {{ $item->status === 'active' ? 'active-status' : 'inactive-status' }}"
                                                                    style="cursor: pointer;">
                                                                    {{ $item->status }}
                                                                </p>
                                                            </td>
                                                            <td style="display: flex; justify-content:center; gap: 10px;">
                                                                <div action="{{route('edit.item')}}"
                                                                    style="width:auto; height:auto; box-shadow:none;" method="post">
                                                                    @csrf
                                                                    <input type="text" name="id" value="{{$item->id}}" hidden>

                                                                    <button id="update" style="display:block;" data-bs-target="#basicModal" ><a href=""></a><i
                                                                            class="fa-solid fa-pencil"></i></button>
                                                                </div>
                                                                <form style="width:auto; height:auto; box-shadow:none;"
                                                                    action="{{ route('deletecountry') }}" method="post">
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
@endsection