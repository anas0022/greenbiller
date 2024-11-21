@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">


<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="row">
            
    @if($errors->any())
    <script>
        swal({
            title: "Error!",
            text: "{!! implode('\n', $errors->all()) !!}", // Join errors with line breaks
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
                        <h4 class="card-text d-inline"> Customers List </h4>
                        <div style="width:100%; display:flex; gap: 10px; justify-content:end">
                        
                            <a href="{{route('customer')}}" class="card-link float-end btn btn-rounded btn-info btn-sm "><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Create Customer</a>
                       
                    <button type="button" class="card-link float-end btn btn-rounded btn-info btn-sm "
                        data-bs-toggle="modal" data-bs-target="#import"><span class="btn-icon-start text-info"><i
                                class="fa fa-plus color-info"></i>
                        </span>Import</button></div>
                        
                        
                     
                    </div>


                    <div class="modal fade" id="import">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Import</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            
                            <form action="{{route('customers.import')}}" method="post" enctype="multipart/form-data">
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
                    <div class="card-body">
                        <div class="table-responsive" style="min-height: 500px !important;">
                            <table id="example" class="display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer ID</th>
                                        <th>Customer Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Credit Limit</th>
                                        <th>Previos Due</th>
                                   
                                                                         
                                        <th>Status</th>                                        
                                        <th><i class="fas fa-arrow-circle-down"></i></th>
                                    </tr>
                                </thead>
                              <tbody>
                                @foreach ($customer as $index=>$c )

                                <div class="form_update" id="form_update_{{ $index }}">
                                                            <form action="{{ route('customer.status') }}" method="post"
                                                                class="status-toggle-form" style="background-color:white; padding:20px  ">
                                                                @csrf
                                                                <i class="fa-thin fa-circle-exclamation" style=" font-size: 60px;
                                  margin-bottom: 2px;
                                  color: orange; "></i>
                                                                <p style="font-size: 20px;">Are You Sure</p>
                                                                <input type="hidden" name="id" value="{{ $c->id }}">
                                                                <p>Do you want to change this to
                                                                    {{ $c->status === 'active' ? 'inactive' : 'active' }}?</p>
                                                                <div class="buttons" style="width:100%; justify-content:end;">
                                                                    <button>
                                                                        <a href="">Cancel</a></button>
                                                                    <button type="submit" style="display:block;">Yes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$c->customer_id}}</td>
                                    <td>{{$c->customer_name}}</td>
                                    <td>{{$c->mobile}}</td>
                                    <td>{{$c->email}}</td>
                                    @if ($c->credit_limit<0 || $c->credit_limit>0)
                                    <td>{{$c->credit_limit}}</td>
                                    @else
                                    <td>{{00.00}}</td>
                                    @endif
                           
                                    <td>{{$c->previous_due}}</td>
                                    <td id="statuschange_{{ $index }}">
                                                            <p class="status-cell {{ $c->status === 'active' ? 'active-status' : 'inactive-status' }}"
                                                                    style="cursor: pointer;">
                                                                    {{ $c->status }}
                                                                </p>
                                                            </td>
                                                            <td style="display: flex; justify-content:center; gap: 10px;">
                                                                <form action="{{route('edit.customer')}}"
                                                                    style="width:auto; height:auto; box-shadow:none;" method="post">
                                                                    @csrf
                                                                    <input type="text" name="id" value="{{$c->id}}" hidden>

                                                                    <button id="update" style="display:block;"><a href=""></a><i
                                                                            class="fa-solid fa-pencil"></i></button>
                                                                </form>
                                                                <form style="width:auto; height:auto; box-shadow:none;"
                                                                    action="{{ route('deletecu') }}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$c->id}}">
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
    new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
</script>