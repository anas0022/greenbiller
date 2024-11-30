@extends('admin.layouts.app')

@section('content')


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">



<div class="content-body">
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card ">
                    <div class="card-header  text-white">
                        <h4 class="mb-0"><i class="fas fa-receipt me-2"></i>Add Receipt</h4>
                    </div>
                    <div class="card-body ">
                        <form action="" method="post">
                            @csrf
                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold">
                                            <i class="fas fa-store me-1"></i>Select Store
                                        </label>
                                        <select id="store_select" name="store_id" class="form-select selectpicker" data-live-search="true" required onchange="store()">
                                            <option value="">Select Store</option>
                                            @foreach ($stores as $store)
                                                <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold">
                                            <i class="fas fa-user me-1"></i>Select Customer
                                        </label>
                                        <select id="customer_select" name="customer_id" class="form-select selectpicker" data-live-search="true" onchange="customercheck()">
                                            <option value="">Select Customer</option>
                                            @if ($customers)
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->id }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function customercheck() {
                              
                                    var customer_id = document.getElementById('customer_select').value;
                                    $.ajax({
                                        type: "GET",
                                        url: "{{ route('findCustomer') }}",
                                        data: {
                                            customer_id: customer_id
                                        },
                                        success: function(response) {
                                            var customerdata = JSON.stringify(response);
                                            response.forEach(function(customerdata) {
                                                //alert(customerdata.id);
                                                document.getElementById('prevdue').innerHTML = 'Previous Due : ' + customerdata
                                                    .previous_due;
                                                document.getElementById('creditlmt').innerHTML = 'Credit Limit : ' +
                                                    customerdata.credit_limit;
                                                document.getElementById('customer_credit_limit').value = customerdata
                                                    .credit_limit;


                                            });


                                        },
                                    });


                                }
                            </script>
                            <div class="card mb-4 border-info">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 ms-auto text-end">
                                            <div class="d-inline-block me-4">
                                                <p id="prevdue" class="text-danger mb-0 fw-bold"></p>
                                            </div>
                                            <div class="d-inline-block">
                                                <p id="creditlmt" class="text-success mb-0 fw-bold"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold">
                                            <i class="fas fa-file-invoice me-1"></i>Select Bill
                                        </label>
                                        <select name="sale_prefix" id="bill_no" class="form-select selectpicker" onchange="billcheck()">
                                            <option value="">-Select Bill-</option>
                                            @foreach ($prefix as $bill)
                                                <option value="{{ $bill }}">{{ $bill }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                             
                                <div class="col-md-6">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="card bg-light">
                                                <div class="card-body p-3">
                                                    <label class="form-label fw-bold">Total Bill</label>
                                                    <input type="text" name="yet_to_pay" id="grand_total" class="form-control bg-white" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card bg-success bg-opacity-10">
                                                <div class="card-body p-3">
                                                    <label class="form-label text-success fw-bold">Paid Amount</label>
                                                    <input type="text" name="paid_amount" id="paid_amount" class="form-control border-success" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card bg-danger bg-opacity-10">
                                                <div class="card-body p-3">
                                                    <label class="form-label text-danger fw-bold">Yet To Pay</label>
                                                    <input type="text" name="yet_to_pay" id="yet_to_pay" class="form-control border-danger" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="prefix-input-template" style="display: none;">
                                <div class="form-group prefix-group-wrapper"
                                    style="
                                    flex: 0 0 calc(33.333% - 10px); 
                                    min-width: 200px;
                                       margin-top: 5px;
                                    margin-bottom: 5px;
                                    margin-left: 20px;
                                ">
                                    <div class="prefix-group"
                                        style="
                                        display: flex;
                                        width: 100%;
                                        align-items: center;
                                        padding: 5px;
                                        background-color: #f9f9f9;
                                        border: 1px solid #ddd;
                                        border-radius: 4px;
                                    ">
                                        <input type="text" name="prefixs[]"
                                            class="form-control prefix-input" readonly
                                            style="flex: 1; margin-right: 5px;"
                                            value="{{ old('prefixs.0') }}">
                                        <button type="button"
                                            class="btn btn-danger shadow btn-xs sharp delete-prefix">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    // Create container if it doesn't exist
                                    if ($('.prefix-container').length === 0) {
                                        $('#bill_no').parent().after(
                                            '<div class="prefix-container" style="display: grid; grid-template-columns: repeat(3, 1fr); "></div>'
                                        );
                                    }

                                    $('#bill_no').on('change', function() {

                                        var selectedOption = $(this).find('option:selected');
                                        var prefix = selectedOption.text();
                                        var saleId = selectedOption.data('sale-id');

                                        if (prefix && prefix !== '-Select Bill-') {
                                            // Check if this prefix already exists
                                            var existingPrefix = false;
                                            $('.prefix-input').each(function() {
                                                if ($(this).val() === prefix) {
                                                    existingPrefix = true;
                                                    swal({
                                                        title: "Already Selected!",
                                                        text: "This bill is already in your selection.",
                                                        icon: "warning",
                                                        button: "OK",
                                                    });
                                                    return false; // Break the loop
                                                }
                                            });

                                            // Only proceed if prefix doesn't exist
                                            if (!existingPrefix) {
                                                var inputCount = $('.prefix-input').length + 1;

                                                // Clone the template
                                                var newInput = $('#prefix-input-template').children().first().clone();

                                         
                                                newInput.find('.prefix-group').attr('id', 'prefix-group-' + inputCount);
                                                newInput.find('.prefix-input')
                                                    .attr('id', 'prefix_' + inputCount)
                                                    .val(prefix)
                                                    .attr('data-sale-id', saleId); // Store sale ID with the input
                                                newInput.find('.delete-prefix').attr('onclick', 'removePrefix(' + inputCount + ')');

                                    
                                                $('.prefix-container').append(newInput);

                                           
                                                if ($('#selected_sale_ids').length === 0) {
                                                    $('.prefix-container').after(
                                                        '<input type="hidden" id="selected_sale_ids" name="selected_sale_ids">');
                                                }
                                                updateSelectedSaleIds();
                                            }


                                        }
                                    });
                                });

                                function updateSelectedSaleIds() {
                                    var saleIds = [];
                                    $('.prefix-input').each(function() {
                                        var saleId = $(this).data('sale-id');
                                        if (saleId) {
                                            saleIds.push(saleId);
                                        }
                                    });
                                    $('#selected_sale_ids').val(saleIds.join(','));
                                }

                                function removePrefix(id) {
                                    const prefixGroup = $(`#prefix-group-${id}`);
                                    const removedPrefix = prefixGroup.find('.prefix-input').val();
                                    
                                    // Find the paid amount of the removed bill
                                    var removedAmount = 0;
                                    $('#bill_no option').each(function() {
                                        if ($(this).text() === removedPrefix) {
                                            removedAmount = parseFloat($(this).attr('data-pay-amount')) || 0;
                                            return false; // Break the loop
                                        }
                                    });
                                    
                                    // Subtract the removed amount from total
                                    var currentTotal = parseFloat($('#paid_amount').val()) || 0;
                                    var newTotal = currentTotal - removedAmount;
                                    $('#paid_amount').val(newTotal.toFixed(2));
                                    
                                    if (prefixGroup.length) {
                                        prefixGroup.closest('.prefix-group-wrapper').remove();
                                    }
                                    
                                    $('#purchase_table tr.item-row').each(function() {
                                        if ($(this).data('prefix') === removedPrefix) {
                                            $(this).remove();
                                        }
                                    });
                                    
                                    let totalQty = 0;
                                    let totalAmount = 0;
                                    
                                    $('input[name="sales_qty[]"]').each(function() {
                                        totalQty += parseFloat($(this).val()) || 0;
                                    });
                                    
                                    $('input[name="total_amount[]"]').each(function() {
                                        totalAmount += parseFloat($(this).val()) || 0;
                                    });
                                    
                                    $('#totalitemqty').val(totalQty);
                                    $('#subtotal_amt').val(totalAmount.toFixed(3));
                                    
                                    total_sum();
                                    alldiscout();
                                    totalamtsum();
                                }
                            </script>

                                 <script>
                                        $(document).ready(function() {
                                            // Initialize selectpicker
                                            $('.selectpicker').selectpicker();

                                            // Use event delegation for customer select change
                                            $(document).on('change', '#customer_select', function() {
                                                var customerId = $(this).val();
                                                if (customerId) {
                                                    $.ajax({
                                                        url: '{{ route('get.prefix.by.customer') }}',
                                                        type: 'GET',
                                                        data: {
                                                            customer_id: customerId
                                                        },
                                                        success: function(response) {
                                                            $('#bill_no').empty();
                                                            $('#bill_no').append('<option value="">-select-</option>');

                                                            if (response.success && response.sales && response.sales.length > 0) {
                                                                $.each(response.sales, function(key, sale) {
                                                                    // Add console.log to verify the data
                                                                    console.log('Sale Data:', sale);
                                                                    
                                                                    $('#bill_no').append(
                                                                        '<option value="' + sale.prefix + '/' + sale.sales_code + '" ' +
                                                                        'data-prefix="' + sale.prefix + '" ' +
                                                                        'data-sales-code="' + sale.sales_code + '" ' +
                                                                        'data-sales-type="' + sale.sales_type + '" ' +
                                                                        'data-sale-id="' + sale.id + '" ' +
                                                                        'data-pay-amount="' + sale.paid_amount + '" ' +
                                                                        'data-grand-total="' + sale.grand_total + '">' +
                                                                        sale.prefix + '/' + sale.sales_code +
                                                                        '</option>'
                                                                    );
                                                                });
                                                                // Refresh selectpicker after adding options
                                                                $('#bill_no').selectpicker('refresh');
                                                            }
                                                        }
                                                    });
                                                }
                                            });
                                        });
                                    </script>


                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg px-5">
                                        <i class="fas fa-save me-2"></i>Save Receipt
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Initialize selectpicker
        $('.selectpicker').selectpicker();

        $('#customer_select').on('focus', function(e) {
            var storeId = $('#store_select').val();
            if (!storeId) {
                e.preventDefault();
                $(this).blur();
                swal({
                    title: "Warning!",
                    text: "Please select a store first",
                    icon: "warning",
                    button: "OK",
                });
            }
        });

        $('#store_select').on('change', function() {
            var storeId = $(this).val();
            if (storeId) {
                $.ajax({
                    url: '{{ route('get.customers.by.store') }}',
                    type: 'GET',
                    data: { store_id: storeId },
                    success: function(data) {
                        $('#customer_select').empty();
                        if (data.length === 0) {
                            swal({
                                title: "No Customers Found!",
                                text: "There are no customers associated with this store.",
                                icon: "warning",
                                button: "OK",
                            });
                            $('#customer_select').append('<option value="">No customers available</option>');
                        } else {
                            $('#customer_select').append('<option value="">Select Customer</option>');
                            $.each(data, function(key, value) {
                                $('#customer_select').append('<option value="' + value.id + '">' + value.customer_name + '</option>');
                            });
                            // Refresh selectpicker after updating options
                            $('#customer_select').selectpicker('refresh');
                        }
                    },
                    error: function() {
                        swal({
                            title: "Error!",
                            text: "Failed to fetch customers. Please try again.",
                            icon: "error",
                            button: "OK",
                        });
                    }
                });
            } else {
                $('#customer_select').empty();
                $('#customer_select').append('<option value="">Select Customer</option>');
                $('#customer_select').selectpicker('refresh');
            }
        });
    });
</script>

<script>
function billcheck() {
    var selectedOption = $('#bill_no option:selected');
    var grandTotal = parseFloat(selectedOption.attr('data-grand-total')) || 0;
    var paidAmount = parseFloat(selectedOption.attr('data-pay-amount')) || 0;
    
    // Get current totals
    var currentGrandTotal = parseFloat($('#grand_total').val()) || 0;
    var currentPaidAmount = parseFloat($('#paid_amount').val()) || 0;
    
    // Add new values to current totals
    var newGrandTotal = currentGrandTotal + grandTotal;
    var newPaidAmount = currentPaidAmount + paidAmount;
    
    // Update the input fields
    $('#grand_total').val(newGrandTotal.toFixed(2));
    $('#paid_amount').val(newPaidAmount.toFixed(2));
    
    // Calculate and set Yet To Pay
    var yetToPay = newGrandTotal - newPaidAmount;
    $('#yet_to_pay').val(yetToPay.toFixed(2));
    
    console.log('Added Grand Total:', grandTotal);
    console.log('New Total:', newGrandTotal);
    console.log('Added Paid Amount:', paidAmount);
    console.log('New Paid Amount:', newPaidAmount);
    console.log('Yet To Pay:', yetToPay);
}

// Add this function to handle removal of bills
function removePrefix(id) {
    const prefixGroup = $(`#prefix-group-${id}`);
    const removedPrefix = prefixGroup.find('.prefix-input').val();
    
    // Find the paid amount and grand total of the removed bill
    var removedPaidAmount = 0;
    var removedGrandTotal = 0;
    $('#bill_no option').each(function() {
        if ($(this).text() === removedPrefix) {
            removedPaidAmount = parseFloat($(this).attr('data-pay-amount')) || 0;
            removedGrandTotal = parseFloat($(this).attr('data-grand-total')) || 0;
            return false; // Break the loop
        }
    });
    
    // Subtract the removed amounts from totals
    var currentGrandTotal = parseFloat($('#grand_total').val()) || 0;
    var currentPaidAmount = parseFloat($('#paid_amount').val()) || 0;
    
    var newGrandTotal = currentGrandTotal - removedGrandTotal;
    var newPaidAmount = currentPaidAmount - removedPaidAmount;
    
    // Update the input fields
    $('#grand_total').val(newGrandTotal.toFixed(2));
    $('#paid_amount').val(newPaidAmount.toFixed(2));
    
    // Update Yet To Pay
    var yetToPay = newGrandTotal - newPaidAmount;
    $('#yet_to_pay').val(yetToPay.toFixed(2));
    
    if (prefixGroup.length) {
        prefixGroup.closest('.prefix-group-wrapper').remove();
    }
    
    updateSelectedSaleIds();
}
</script>
@endsection
