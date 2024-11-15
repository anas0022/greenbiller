@extends('admin/layouts/app')

@section('title', 'Home Page')

@section('content')
<link href="{{ asset('admin-assets/css/toast.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card" >
                    <h4 class="p-3">Payment Bill</h4>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary mb-3" onclick="printPreview()">Print Preview</button>
                        </div>
                        <div class="table-responsive" style="padding: 30px;" id="preview_data">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>payment date</th>
                                        <th>Ipayment code</th>
                                  
                                        <th>customer Name</th>
                                        <th>payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{$payment_details->payment_date}}
                                        </td>
                                        <td>
                                            {{$payment_details->payment_code}}
                                        </td>
                                        <td>
                                            {{$customer->firstWhere('id',$payment_details->customer_id)->customer_name}}
                                        </td>
                                        <td>
                                            {{$payment_details->payment}}
                                        </td>
                                    </tr>
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
function printPreview() {
    var printContents = document.getElementById('preview_data').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>

@endsection
