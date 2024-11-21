@extends('admin/layouts/app')

@section('title', 'Home Page')

@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <h4 class="p-3">Purchase Return Preview</h4>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary mb-3" onclick="printPreview()">Print Preview</button>
                        </div>
                        <div class="table-responsive" style="padding: 30px;" id="preview_data">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Item Name</th>
                                        <th>HSN Code</th>
                                        <th>Quantity</th>
                                        <th>Total Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchaseItems as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ optional($items->firstWhere('id', $item->item_id))->item_name ?? 'N/A' }}</td>
                                            <td>{{ $item->hsn_code ?? 'N/A' }}</td>
                                            <td>{{ is_numeric($item->purchase_qty) ? $item->purchase_qty : '00' }}</td>
                                            <td>{{ is_numeric($item->total_cost) ? $item->total_cost : '00' }}</td>
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
function printPreview() {
    var printContents = document.getElementById('preview_data').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>

@endsection