@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">


<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">
    </script> 

<style>
.buttons{
    background: black;
}
</style>
</head>

<body>




    <div class="content-body">

        <div class="container-fluid" >
                
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


          

          
                    <table id="example" class="display" style="width:100%;">
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
                                    <form action="{{ route('updateStatus.items') }}" method="post"
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
                                    <td> {{ $item->brand->barndname ?? '' }}</td>
                                    <td>{{ $item->category->category_name ?? '' }}</td>
                                    <td>{{ $item->unit->unit_name ?? '' }}</td>
                                    <td>{{$item->opening_stock}}</td>
                                  <!--   @if (!empty($item->alert_quantity))
                                    <td>{{$item->alert_quantity}}</td>
                                    @endif
                                    
                               
                                    <td>{{$item->sales_price}}</td> -->
                                    <td>{{ $item->tax->taxname ?? '' }}</td>
                                    <td id="statuschange_{{ $index }}">
                                        <p class="status-cell {{ $item->status === 'active' ? 'active-status' : 'inactive-status' }}"
                                            style="cursor: pointer;">
                                            {{ $item->status }}
                                        </p>
                                    </td>
                                    <td style="display: flex; justify-content:center; gap: 10px;">
                                        <form action="{{route('edit.item')}}"
                                            style="width:auto; height:auto; box-shadow:none;" method="post">
                                            @csrf
                                            <input type="text" name="id" value="{{$item->id}}" hidden>

                                            <button id="update" style="display:block;"><a href=""></a><i
                                                    class="fa-solid fa-pencil"></i></button>
                                        </form>
                                        <form style="width:auto; height:auto; box-shadow:none;"
                                            action="{{ route('deleteitem') }}" method="post">
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
        @endsection