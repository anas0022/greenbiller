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
                        <h4 class="card-text d-inline"> Advance Payments List</h4>
                        <div>

                            <a href="{{route('advanceadd')}}" class="card-link float-end btn btn-rounded btn-info btn-sm "><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                                </span>Add Advance</a>

                        </div>

                    </div>


                    <div class="card-body">
                        <div class="table-responsive" style="min-height: 300px !important;">
                            <table id="example" class="display" style="width:100%;" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                      
                                        <th>Date</th>
                                        <th>Eploy Name</th>
                                        <th>Amount</th>
                                        <th>Payment Type</th>
                                        <th><i class="fas fa-arrow-circle-down"></i></th>
                                    </tr>
                                </thead>
                                    @foreach ($advance as $index=> $ad)
                                    <tr>
                                        <td>
                                            {{$index+1}}
                                        </td>
                                        <td>
                                            {{$ad->date}}
                                        </td>
                                        <td>
                                            {{$user->firstWhere('id',$ad->employ_id)->name}}
                                        </td>
                                        <td>
                                            {{$ad->amount}}
                                        </td>
                                        <td>
                                            {{$ad->type}}
                                        </td>
                                        <td style="display: flex; justify-content:center; gap: 10px;">
                                            <form action="{{route('edit.advance')}}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{$ad->id}}" name="id">
                                            
                                                <button type="submit" id="update" style="display:block;"><a href=""></a><i
                                                        class="fa-solid fa-pencil"></i></button>
                                                    </form>
                                               
                                                <button type="submit" id="delete" style="display:block;" onclick="deleteItem({{$ad->id}})"><i
                                                        class="fa-solid fa-trash"></i></button>
                                      
                                        </td>
                                    </tr>
                                        
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>




<script>
    function deleteItem(id) {
        swal({
                title: "Are you sure?",
                text: "Do you want to delete this?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "{{ route('deleteadvance') }}",
                        method: 'POST',
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'id': id
                        },
                        success: function(response) {
                            swal({
                                title: "Deleted!",
                                text: "Warehouse deleted successfully",
                                type: "success",
                                confirmButtonText: "Done",
                                confirmButtonColor: "#1dbf73"
                            }, function(isConfirm) {
                                if (isConfirm) {
                                    location.reload();
                                }
                            });
                        },
                        error: function(xhr, status, error) {
                            swal("Error!", "Failed to delete warehouse", "error");
                        }
                    });
                }
            });
    }
</script>
<script>
    function statuschange(id, currentStatus) {
        swal({
                title: "Are you sure?",
                text: "Do you want to change this to " + (currentStatus === 'active' ? 'inactive' : 'active') + "?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "{{ route('updateStatus.brand') }}",
                        method: 'POST',
                        data: {
                            '_token': "{{ csrf_token() }}",
                            'id': id
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response && response.status === 200) {
                                swal({
                                    title: "Status Changed!",
                                    text: response.message,
                                    type: "success",
                                    confirmButtonText: "Done",
                                    confirmButtonColor: "#1dbf73"
                                }, function(isConfirm) {
                                    if (isConfirm) {
                                        location.reload();
                                    }
                                });
                            } else {
                                swal("Warning!", "Status changed but response was unexpected",
                                    "warning");
                                setTimeout(() => {
                                    location.reload();
                                }, 1500);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Error details:', xhr.responseText);
                            swal("Warning!", "Status might have changed. Please refresh the page.",
                                "warning");
                            setTimeout(() => {
                                location.reload();
                            }, 1500);
                        }
                    });
                }
            });
    }
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
@endsection