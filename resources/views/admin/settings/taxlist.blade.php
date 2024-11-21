

@extends('admin//layouts/app')

@section('title', 'Home Page')


<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">


<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
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
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

    <div class="modal fade" id="editModal">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Tax</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('tax.edit')}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="text" name="id" id="id" hidden>
                                                                    <div class="mb-3 row">
                                                                        <label class="col-sm-3 col-form-label"> Tax Name:</label>
                                                                        <div class="col-sm-9">
                                                                            <input name="name" id="name" type="text" class="form-control" placeholder="Enter Category Name" >
                                                                       
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label class="col-sm-3 col-form-label">Tax Percentage </label>
                                                                        <div class="col-sm-9">
                                                                            
                                                                        
                                                                            <input type="text" name="per" id="dis"  class="form-control">
                                                                        </div>
                                                                    </div>
                                                                   

                                                                


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                                <button name="update" type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
        

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-footer">
                        <h4 class="card-text d-inline"> Tax List</h4>

                        <button type="button" class="card-link float-end btn btn-rounded btn-info btn-sm " data-bs-toggle="modal" data-bs-target="#basicModal"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Add Tax</button>
                    </div>
                    <!-- Modal start -->
                    <div class="modal fade" id="basicModal">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Tax</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('taxpost')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tax Name <span class="required">*</span>:</label>
                                            <div class="col-sm-9">
                                                <input name="name" type="text" class="form-control" placeholder="Enter Tax Name" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tax Percentage  </label>
                                            <div class="col-sm-9">
                                               <input type="text" name="per" id="" class="form-control">
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
                            <table id="example" class="display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tax Name</th>
                                        <th>Tax(%)</th>
                                        <th>Status</th>
                                      
                                        <th><i class="fas fa-arrow-circle-down"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @if (!empty($tax))
                                   @foreach ($tax as $index=>$b)

                                   <div class="form_update" id="form_update_{{ $index }}">
                                                            <form action="{{ route('updateStatus.tax') }}" method="post"
                                                                class="status-toggle-form" style="background-color:white; padding:20px  ">
                                                                @csrf
                                                                <i class="fa-thin fa-circle-exclamation" style=" font-size: 60px;
                                  margin-bottom: 2px;
                                  color: orange; "></i>
                                                                <p style="font-size: 20px;">Are You Sure</p>
                                                                <input type="hidden" name="id" value="{{ $b->id }}">
                                                                <p>Do you want to change this to
                                                                    {{ $b->status === 'active' ? 'inactive' : 'active' }}?</p>
                                                                <div class="buttons" style="width:100%; justify-content:end;">
                                                                    <button>
                                                                        <a href="
                                                                        ">Cancel</a></button>
                                                                    <button type="submit" style="display:block;">Yes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                   <tr>
                                   <td>{{$index+1}}</td>
                                   <td>
                                   {{$b->taxname}}
                                   </td>
                                           <td>
                                           {{$b->per}}
                                           </td>
                                           
                                           <td id="statuschange_{{ $index }}">

                                                            <p class="status-cell {{ $b->status === 'active' ? 'active-status' : 'inactive-status' }}"
                                                                style="cursor: pointer;">
                                                                {{ $b->status }}
                                                            </p>
                                                        </td>
                                           <td style="display: flex; justify-content:center; gap: 10px;">
                                                            <div 
                                                                style="width:auto; height:auto; box-shadow:none;" >
                                                                @csrf
                                                                <input type="text" name="id" value="{{$b->id}}" hidden>

                                                                <button id="update" data-bs-toggle="modal" data-bs-target="#editModal" 
    onclick="update('{{$b->image}}', '{{$b->taxname}}', '{{$b->per}}', '{{$b->id}}')">
    <i class="fas fa-pencil-alt"></i>
</button>
                             




                                                            </div>
                                                            <form style="width:auto; height:auto; box-shadow:none;"
                                                                action="{{ route('deletetax') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{$b->id}}">
                                                                <button type="submit" id="delete"
                                                                   ><i
                                                                        class="fa-solid fa-trash"></i></button>
                                                            </form>
                                                        </td>
                                           </tr>
                                   @endforeach
                                   
                                   @endif
                                           
                                           
                                            
                                        </tr>
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <script>
function update(image, barndname, discription, id) {
    document.getElementById('id').value = id;
    document.getElementById('name').value = barndname;
    document.getElementById('dis').value = discription;
    

    document.getElementById('image').src = 'storage/' . image;

}
</script>
         
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