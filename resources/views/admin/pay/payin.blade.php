@extends('admin.layouts.app')

@section('content')


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">


    @if ($errors->any())
        <script>
            swal({
                title: "Error!",
                text: "{!! implode('\n', $errors->all()) !!}",
                icon: "error",
                type: "error"
            });
        </script>
    @endif

    @if (session('success'))
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
        <div class="container-fluid ">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header  text-white bg-primary">
                            <h4 class="mb-0"><i class="fas fa-receipt me-2"></i>Payment In</h4>
                            <button class="btn bg-primary "style="color:white;">Transactions</button>
                        </div>
                        <div class="card-body ">
                            <form action="{{ route('payin.post') }}" method="post">
                                @csrf
                                <div class="row g-4 mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold  text-primary">
                                                <i class="fas fa-store me-1 text-primary" ></i>Select Store
                                            </label>
                                            <select id="store_select" name="store_id" class="form-select selectpicker"
                                                data-live-search="true" required onchange="store()">
                                                <option value="">Select Store</option>
                                                @foreach ($stores as $store)
                                                    <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label fw-bold text-primary">
                                                <i class="fas fa-user me-1 text-primary"></i>Select Customer
                                            </label>
                                            <select id="customer_select" name="customer_id" class="form-select selectpicker"
                                                data-live-search="true" onchange="customercheck()">
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
                                                    document.getElementById('prevdue').innerHTML = 'Previous Due : ' + customerdata
                                                        .previous_due;
                                                    document.getElementById('creditlmt').innerHTML = 'Credit Limit : ' +
                                                        customerdata.credit_limit;
                                                    document.getElementById('total_credit').value = Math.round(customerdata
                                                        .previous_due - customerdata.credit_limit);
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


                                <div class="col-md-12">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="card bg-danger bg-opacity-10">
                                                <div class="card-body p-3">
                                                    <label class="form-label fw-bold">Total Credit</label>
                                                    <input type="text" name="yet_to_pay" id="total_credit"
                                                        class="form-control bg-white" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card bg-light bg-opacity-10">
                                                <div class="card-body p-3">
                                                    <label class="form-label text-success fw-bold">Recieved <button
                                                            style="padding: 5px; border-radius:3px;" data-bs-toggle="modal"
                                                            data-bs-target="#linkpayment" type="button" onclick="asssignpay()">₹
                                                            Link</button></label>
                                                    <input type="text" name="paid_amount" id="paid_amount"
                                                        class="form-control border-success" value="00">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                               
                                <div class="modal fade" id="linkpayment" tabindex="-1">


                                    <div class="modal-dialog">
                                        <div class="modal-content">


                                            <div class="card">
                                                <div class="card-header  bg-primary">
                                                    <h4 class="card-text d-inline">Link Payment</h4>
                                                    <button type="button" class="popup-close"  data-bs-dismiss="#linkpayment">&times;</button>
                                                </div>
                                                <div class="card-body">
                                                    <label for="">Recieved : </label>
                                                    <input type="text" id="takepay" value="0" style="border:none;">
                                                    <div class="row ">


                                                        <div class="col-lg-12 mb-2" id="salepay">

                                                            <div class="card">
                                                                <div class="card-header bg-primary ">
                                                                    <h5 class="mb-0 text-white">Sales Details</h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div id="sales-list">
                                                                        <!-- Sales items will be appended here -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>







                                                    </div>



                                                </div>
                                                <hr class="solid">
                                                <div class="card-header bg-primary">

                                                    <a class="btn btn-danger ">Close</a>
                                                    <button name="save" type="button"
                                                        class="btn btn-primary">Save</button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                              <script>
                              $(document).ready(function() {
                                  // Add click handler for save button
                                  $(document).on('click', 'button[name="save"]', function(e) {
                                      e.preventDefault();
                                      console.log('Save button clicked'); // Debug log
                                      
                                      // Get all active sale items
                                      var selectedItems = [];
                                      $('#salepay .sale-item.active').each(function() {
                                          var item = $(this);
                                          selectedItems.push({
                                              billNo: item.find('.sale-details:first').text().trim(),
                                              totalAmount: item.find('.sale-details:eq(1)').text().trim(),
                                              currentBalance: item.find('#current').text().trim(),
                                              linkAmount: item.find('.link-amount').val().trim()
                                          });
                                      });
                              
                                      console.log('Selected items:', selectedItems); // Debug log
                              
                                      // Create the selected bills HTML
                                      var selectedBillsHtml = `
                                          <div class="col-md-12 mb-4">
                                              <div class="card">
                                                  <div class="card-header bg-primary text-white">
                                                      <h5 class="mb-0"><i class="fas fa-list me-2"></i>Selected Bills</h5>
                                                  </div>
                                                  <div class="card-body">
                                                      <div id="selected-bills-container">
                                      `;
                              
                                      if (selectedItems.length > 0) {
                                          selectedBillsHtml += '<div class="row g-3">';
                                          selectedItems.forEach(function(item) {
                                              selectedBillsHtml += `
                                                  <div class="col-md-4">
                                                      <div class="card border-primary h-100">
                                                          <div class="card-body">
                                                              <div class="d-flex justify-content-between align-items-center mb-2">
                                                                  <h6 class="text-primary mb-0">${item.billNo}</h6>
                                                                  <span class="badge bg-primary">₹${item.linkAmount}</span>
                                                                  
                                                              </div>
                                                              <div class="small">
                                                                  <div class="mb-1">${item.totalAmount}</div>
                                                                  <div class="text-muted">Balance: ₹${item.currentBalance}</div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              `;
                                          });
                                          selectedBillsHtml += '</div>';
                                      } else {
                                          selectedBillsHtml += '<p class="text-muted text-center">No bills selected</p>';
                                      }
                              
                                      selectedBillsHtml += `
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      `;
                              
                                      // Update the selected bills wrapper
                                      $('#selected-bills-wrapper').html(selectedBillsHtml);
                              
                                      // Show success message
                                      swal({
                                          title: "Success!",
                                          text: "Bills have been selected successfully",
                                          icon: "success"
                                      });
                              
                                      // Close the modal
                                      $('#linkpayment').modal('hide');
                                  });
                              });
                              </script>
                                <script>
                                    function asssignpay(){
                                        
                                        var paid_amount = document.getElementById("paid_amount").value;
                                 
                                        var takepay = document.getElementById('takepay').value= paid_amount;
                             
                                        
                                    }
                                </script>
                                <div id="prefix-input-template" style="display: none;">
                                    <div class="form-group prefix-group-wrapper"
                                        style="
                                    flex: 0 0 calc(50% - 10px);
                                    min-width: 200px;
                                    margin-top: 5px;
                                    margin-bottom: 5px;
                                    margin-left: 20px;
                                    display: inline-block;
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
                                            <input type="text" name="prefixs[]" class="form-control prefix-input"
                                                readonly style="flex: 1; margin-right: 5px;"
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
                                                '<div class="prefix-container" style="display: grid; grid-template-columns: repeat(2, 1fr); "></div>'
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
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script>
                                    // Listen for the change event on the dropdown
                                    $('#bill_no').on('change', function() {
                                        // Get the selected option
                                        var selectedOption = $(this).find(':selected');

                                        // Loop through all the `data-*` attributes of the selected option
                                        $.each(selectedOption[0].attributes, function(index, attribute) {
                                            if (attribute.name.startsWith('data-sale-id')) {
                                                // Remove "data-" prefix to get input name
                                                var inputName = attribute.name.replace('data-sale-id', '');

                                                // Append input fields for each data-* attribute
                                                $('#sale_id').append(
                                                    '<input type="hidden" name="sale_id[]" value="' + attribute.value + '">'
                                                );
                                            }
                                        });
                                    });
                                </script>
                                <div id="sale_id">

                                </div>
                                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
                                <script>
                            $(document).ready(function() {
    // Initialize selectpicker
    $('.selectpicker').selectpicker();

    $(document).on('change', '#customer_select', function() {
        var customerId = $(this).val();
        $.ajax({
            url: '{{ route('get.bill') }}',
            type: 'GET',
            data: { customer_id: customerId },
            success: function(response) {
                $('#salepay').empty();
                if (response.success && response.sales && response.sales.length > 0) {
                    $.each(response.sales, function(key, sale) {
                        // Calculate current balance
                        var currentBalance = Math.round(sale.grand_total) - Math.round(sale.paid_amount);

                        // Append sale details
                        $('#salepay').append(
                            '<div class="sale-item">' +
                                '<i class="bi bi-check2-circle sale-icon select-bill"></i>' +
                                '<div class="sale-header">' +
                                    '<h4>Sale</h4>' +
                                    '<div>' + sale.sales_date + '</div>' +
                                '</div>' +
                                '<div class="sale-details">' +
                                    '<div class="bill-no">Bill No: ' + sale.prefix + '/' + sale.sales_code + '</div>' +
                                    '<div class="total-amount">Total Amount: ₹' + Math.round(sale.grand_total) + '</div>' +
                                    '<input type="hidden" name="sale_id[]" value="' + sale.id + '" class="sale-id">' +
                                '</div>' +
                                '<div class="sale-details">' +
                                    '<div style="display:flex; justify-content:center; align-items:center text-align:center;">Current Balance: ₹' +'<p id="current">' + currentBalance + '</p>' +'</div>' +
                                    '<div>Link Amount: <input type="text" class="link-amount" name="link_amount" placeholder="Enter Amount"></div>' +
                                '</div>' +
                            '</div>'
                        );
                    });

                    // Attach click event to dynamically generated icons
                    attachSelectBillEvent();
                } else {
                    $('#salepay').append('<div class="no-sales">No sales found for this customer.</div>');
                }
            }
        });
    });

    // Function to attach click event to dynamically created .select-bill icons
    function attachSelectBillEvent() {
    $('.select-bill').off('click').on('click', function() {
        // Toggle classes
        $(this).closest('.sale-item').toggleClass('active');
        $(this).closest('.sale-icon').toggleClass('active');
        
        // Get the total amount to pay (from takepay input)
        var takepay = parseFloat($('#takepay').val()) || 0;
        
        // Get all active sale items and calculate total selected amount
        var totalSelectedAmount = 0;
        $('.sale-item.active').each(function() {
            // Get the link amount input value for this sale item
            var linkAmount = parseFloat($(this).find('.link-amount').val()) || 0;
            totalSelectedAmount += linkAmount;
        });
        
        // Calculate remaining balance
        var remainingBalance = takepay - totalSelectedAmount;
        
        // Update current balance for this sale item
        $(this).closest('.sale-item').find('#current').text(remainingBalance.toFixed(2));
        
        // Update the paid_amount field with total selected amount
        $('#paid_amount').val(totalSelectedAmount.toFixed(2));
        
        // Show balance information
        if (remainingBalance >= 0) {
            swal({
                title: "Balance Information",
                text: "Remaining Balance: ₹" + remainingBalance.toFixed(2),
                icon: "info"
            });
        } else {
            swal({
                title: "Warning",
                text: "Overpayment: ₹" + Math.abs(remainingBalance).toFixed(2),
                icon: "warning"
            });
        }
    });
    
    // Add event listener for link amount changes
    $('.link-amount').on('input', function() {
        var saleItem = $(this).closest('.sale-item');
        if (saleItem.hasClass('active')) {
            // Trigger click event to recalculate
            saleItem.find('.select-bill').click();
        }
    });
}

function attachSelectBillEvent() {
    $('.select-bill').off('click').on('click', function() {
        // Toggle classes
        $(this).closest('.sale-item').toggleClass('active');
        $(this).closest('.sale-icon').toggleClass('active');
        
        // Get the total received amount (from takepay input)
        var takepay = parseFloat($('#takepay').val()) || 0;
        var currentSaleItem = $(this).closest('.sale-item');
        
        if (currentSaleItem.hasClass('active')) {
            // When activating a sale item, get its current balance
            var currentBalance = parseFloat(currentSaleItem.find('#current').text()) || 0;
            
            // Get or set the link amount
            var linkAmountInput = currentSaleItem.find('.link-amount');
            var linkAmount = parseFloat(linkAmountInput.val()) || 0;
            
            // If no link amount is set, calculate it
            if (linkAmount === 0) {
                if (currentBalance <= takepay) {
                    // If current balance is less than received amount, use entire current balance
                    linkAmount = currentBalance;
                } else {
                    // If current balance is more than received amount, use available takepay
                    linkAmount = takepay;
                }
                linkAmountInput.val(linkAmount.toFixed(2));
            }
            
            // Calculate new current balance
            var newCurrentBalance = currentBalance - linkAmount;
            currentSaleItem.find('#current').text(newCurrentBalance.toFixed(2));
            
            // Subtract this link amount from takepay
            takepay -= linkAmount;
            
            // If there's remaining balance and takepay is available
            if (newCurrentBalance > 0 && takepay > 0) {
                // Use remaining takepay for the remaining balance
                var additionalPayment = Math.min(newCurrentBalance, takepay);
                linkAmount += additionalPayment;
                linkAmountInput.val(linkAmount.toFixed(2));
                newCurrentBalance -= additionalPayment;
                takepay -= additionalPayment;
                currentSaleItem.find('#current').text(newCurrentBalance.toFixed(2));
            }
        } else {
            // When deactivating, restore the original current balance
            var linkAmount = parseFloat(currentSaleItem.find('.link-amount').val()) || 0;
            var currentBalance = parseFloat(currentSaleItem.find('#current').text()) || 0;
            
            // Restore current balance
            var originalBalance = currentBalance + linkAmount;
            currentSaleItem.find('#current').text(originalBalance.toFixed(2));
            
            // Add back the link amount to takepay
            takepay += linkAmount;
            
            // Clear the link amount
            currentSaleItem.find('.link-amount').val('');
        }
        
        // Update takepay input
        $('#takepay').val(takepay.toFixed(2));
        
        // Show balance information
        if (takepay >= 0) {
            swal({
                title: "Balance Information",
                text: "Remaining Amount: ₹" + takepay.toFixed(2) + 
                      "\nCurrent Balance: ₹" + currentSaleItem.find('#current').text(),
                icon: "info"
            });
        } else {
            swal({
                title: "Warning",
                text: "Exceeded Available Amount by: ₹" + Math.abs(takepay).toFixed(2),
                icon: "warning"
            });
        }
    });
    
    // Add event listener for link amount changes
    $('.link-amount').on('input', function() {
        var saleItem = $(this).closest('.sale-item');
        var newLinkAmount = parseFloat($(this).val()) || 0;
        var oldLinkAmount = parseFloat($(this).data('previous-amount')) || 0;
        var takepay = parseFloat($('#takepay').val()) || 0;
        var currentBalance = parseFloat(saleItem.find('#current').text()) || 0;
        
        // Calculate the difference
        var difference = oldLinkAmount - newLinkAmount;
        
        // Update current balance
        var newCurrentBalance = currentBalance + difference;
        saleItem.find('#current').text(newCurrentBalance.toFixed(2));
        
        // Update takepay
        var newTakepay = takepay + difference;
        $('#takepay').val(newTakepay.toFixed(2));
        
        // Store the new amount as previous for next change
        $(this).data('previous-amount', newLinkAmount);
        
        if (newTakepay < 0 || newCurrentBalance < 0) {
            swal({
                title: "Warning",
                text: "Invalid Amount!",
                icon: "warning"
            });
            // Revert the changes
            $(this).val(oldLinkAmount.toFixed(2));
            saleItem.find('#current').text((currentBalance).toFixed(2));
            $('#takepay').val((takepay).toFixed(2));
        }
    });
}function attachSelectBillEvent() {
    $('.select-bill').off('click').on('click', function() {
        // Toggle classes
        $(this).closest('.sale-item').toggleClass('active');
        $(this).closest('.sale-icon').toggleClass('active');
        
        // Get the total received amount (from takepay input)
        var takepay = parseFloat($('#takepay').val()) || 0;
        var currentSaleItem = $(this).closest('.sale-item');
        
        // Check if takepay is zero at the start
        if (function attachSelectBillEvent() {
            $('.select-bill').off('click').on('click', function() {
                // Toggle classes first
                $(this).closest('.sale-item').toggleClass('active');
                $(this).closest('.sale-icon').toggleClass('active');
                
                // Get the total received amount (from takepay input)
                var takepay = parseFloat($('#takepay').val()) || 0;
                var currentSaleItem = $(this).closest('.sale-item');
                
                if (currentSaleItem.hasClass('active')) {
                    // Only check takepay if we're activating and trying to allocate new amount
                    if (takepay === 0) {
                        swal({
                            title: "Warning",
                            text: "Received amount is zero! No more amount to allocate.",
                            icon: "warning"
                        });
                        // Still allow toggling but don't try to allocate amount
                        return;
                    }
                    
                    var currentBalance = parseFloat(currentSaleItem.find('#current').text()) || 0;
                    var linkAmountInput = currentSaleItem.find('.link-amount');
                    var linkAmount = parseFloat(linkAmountInput.val()) || 0;
                    
                    if (linkAmount === 0) {
                        if (currentBalance <= takepay) {
                            linkAmount = currentBalance;
                        } else {
                            linkAmount = takepay;
                        }
                        linkAmountInput.val(linkAmount.toFixed(2));
                    }
                    
                    var newCurrentBalance = currentBalance - linkAmount;
                    currentSaleItem.find('#current').text(newCurrentBalance.toFixed(2));
                    
                    takepay -= linkAmount;
                    
                    if (newCurrentBalance > 0 && takepay > 0) {
                        var additionalPayment = Math.min(newCurrentBalance, takepay);
                        linkAmount += additionalPayment;
                        linkAmountInput.val(linkAmount.toFixed(2));
                        newCurrentBalance -= additionalPayment;
                        takepay -= additionalPayment;
                        currentSaleItem.find('#current').text(newCurrentBalance.toFixed(2));
                    }
                } else {
                    // Deactivating - always allow this regardless of takepay
                    var linkAmount = parseFloat(currentSaleItem.find('.link-amount').val()) || 0;
                    var currentBalance = parseFloat(currentSaleItem.find('#current').text()) || 0;
                    
                    var originalBalance = currentBalance + linkAmount;
                    currentSaleItem.find('#current').text(originalBalance.toFixed(2));
                    
                    // Add back the link amount to takepay
                    takepay += linkAmount;
                    currentSaleItem.find('.link-amount').val('');
                }
                
                // Update takepay input
                $('#takepay').val(takepay.toFixed(2));
                
                // Only show message when takepay becomes zero
                if (takepay === 0) {
                    swal({
                        title: "Information",
                        text: "Received amount is fully allocated!" +
                              "\nCurrent Balance: ₹" + currentSaleItem.find('#current').text(),
                        icon: "success"
                    });
                }
            });
            
            // Modified link amount input handler
            $('.link-amount').on('input', function() {
                var saleItem = $(this).closest('.sale-item');
                var newLinkAmount = parseFloat($(this).val()) || 0;
                var oldLinkAmount = parseFloat($(this).data('previous-amount')) || 0;
                var takepay = parseFloat($('#takepay').val()) || 0;
                var currentBalance = parseFloat(saleItem.find('#current').text()) || 0;
                
                var difference = oldLinkAmount - newLinkAmount;
                var newCurrentBalance = currentBalance + difference;
                var newTakepay = takepay + difference;
                
                if (newTakepay < 0 || newCurrentBalance < 0) {
                    swal({
                        title: "Warning",
                        text: "Invalid Amount!",
                        icon: "warning"
                    });
                    // Revert the changes
                    $(this).val(oldLinkAmount.toFixed(2));
                    saleItem.find('#current').text((currentBalance).toFixed(2));
                    $('#takepay').val((takepay).toFixed(2));
                    return;
                }
                
                // Update values if validation passes
                saleItem.find('#current').text(newCurrentBalance.toFixed(2));
                $('#takepay').val(newTakepay.toFixed(2));
                $(this).data('previous-amount', newLinkAmount);
            });
        } === 0) {
            swal({
                title: "Warning",
                text: "Received amount is zero! Cannot proceed with payment.",
                icon: "warning"
            });
            // Revert the selection
            $(this).closest('.sale-item').toggleClass('active');
            $(this).closest('.sale-icon').toggleClass('active');
            return;
        }
        
        if (currentSaleItem.hasClass('active')) {
            // Rest of your existing active state code...
            var currentBalance = parseFloat(currentSaleItem.find('#current').text()) || 0;
            var linkAmountInput = currentSaleItem.find('.link-amount');
            var linkAmount = parseFloat(linkAmountInput.val()) || 0;
            
            if (linkAmount === 0) {
                if (currentBalance <= takepay) {
                    linkAmount = currentBalance;
                } else {
                    linkAmount = takepay;
                }
                linkAmountInput.val(linkAmount.toFixed(2));
            }
            
            var newCurrentBalance = currentBalance - linkAmount;
            currentSaleItem.find('#current').text(newCurrentBalance.toFixed(2));
            
            takepay -= linkAmount;
            
            // Check if takepay becomes zero after calculation
            if (takepay === 0) {
                swal({
                    title: "Information",
                    text: "Received amount is now fully allocated!",
                    icon: "info"
                });
            }
            
            if (newCurrentBalance > 0 && takepay > 0) {
                var additionalPayment = Math.min(newCurrentBalance, takepay);
                linkAmount += additionalPayment;
                linkAmountInput.val(linkAmount.toFixed(2));
                newCurrentBalance -= additionalPayment;
                takepay -= additionalPayment;
                currentSaleItem.find('#current').text(newCurrentBalance.toFixed(2));
                
                // Check again after additional payment
                if (takepay === 0) {
                    swal({
                        title: "Information",
                        text: "Received amount is now fully allocated!",
                        icon: "info"
                    });
                }
            }
        } else {
            // Your existing deactivate state code...
            var linkAmount = parseFloat(currentSaleItem.find('.link-amount').val()) || 0;
            var currentBalance = parseFloat(currentSaleItem.find('#current').text()) || 0;
            
            var originalBalance = currentBalance + linkAmount;
            currentSaleItem.find('#current').text(originalBalance.toFixed(2));
            
            takepay += linkAmount;
            currentSaleItem.find('.link-amount').val('');
        }
        
        // Update takepay input
        $('#takepay').val(takepay.toFixed(2));
        
        // Modified balance information display
        if (takepay === 0) {
            swal({
                title: "Information",
                text: "Received amount is fully allocated!" +
                      "\nCurrent Balance: ₹" + currentSaleItem.find('#current').text(),
                icon: "success"
            });
        } 
    });
    
    // Modified link amount input handler
    $('.link-amount').on('input', function() {
        var saleItem = $(this).closest('.sale-item');
        var newLinkAmount = parseFloat($(this).val()) || 0;
        var oldLinkAmount = parseFloat($(this).data('previous-amount')) || 0;
        var takepay = parseFloat($('#takepay').val()) || 0;
        var currentBalance = parseFloat(saleItem.find('#current').text()) || 0;
        
        var difference = oldLinkAmount - newLinkAmount;
        var newCurrentBalance = currentBalance + difference;
        var newTakepay = takepay + difference;
        
        // Check if new takepay would be zero
        if (newTakepay === 0) {
            swal({
                title: "Information",
                text: "This will allocate all remaining received amount!",
                icon: "info"
            });
        }
        
        if (newTakepay < 0 || newCurrentBalance < 0) {
            swal({
                title: "Warning",
                text: "Invalid Amount!",
                icon: "warning"
            });
            // Revert the changes
            $(this).val(oldLinkAmount.toFixed(2));
            saleItem.find('#current').text((currentBalance).toFixed(2));
            $('#takepay').val((takepay).toFixed(2));
            return;
        }
        
        // Update values if validation passes
        saleItem.find('#current').text(newCurrentBalance.toFixed(2));
        $('#takepay').val(newTakepay.toFixed(2));
        $(this).data('previous-amount', newLinkAmount);
    });
}

});
</script>
                                <style>
                                    /* Selected Bills Styling */
#selected-bills-container .card {
    transition: all 0.3s ease;
    border: 1px solid #e0e0e0;
    background: #fff;
}

#selected-bills-container .card:hover {
    box-shadow: 0 2px 8px rgba(13, 71, 161, 0.1);
}

#selected-bills-container .card-body {
    padding: 15px;
}

#selected-bills-container .badge {
    font-size: 0.9rem;
    padding: 5px 10px;
}

#selected-bills-container .small {
    font-size: 0.85rem;
}

#selected-bills-container .border-primary {
    border-color: #E3F2FD !important;
}

#selected-bills-container .text-primary {
    color: #0D47A1 !important;
}
                                    /* Form Label Styling */
.form-label {
    font-size: 1.1rem;
    color: #1976D2;
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.form-label i {
    font-size: 1rem;
    background: #E3F2FD;
    padding: 8px;
    border-radius: 50%;
    color: #2196F3;
}

/* Store and Customer Selection Section */
.form-group {
    margin-bottom: 20px;
    background: #fff;
    padding: 15px;
    border-radius: 8px;
    border: 1px solid #e0e0e0;
    transition: all 0.3s ease;
}

.form-group:hover {
    box-shadow: 0 2px 8px rgba(33, 150, 243, 0.1);
}

/* Total Credit and Received Section */
.card.bg-danger.bg-opacity-10,
.card.bg-light.bg-opacity-10 {
    background: #fff !important;
    border: 1px solid #e0e0e0;
    transition: all 0.3s ease;
}

.card.bg-danger.bg-opacity-10 .form-label {
    color: #d32f2f;
}

.card.bg-danger.bg-opacity-10:hover {
    border-color: #ef5350;
    box-shadow: 0 2px 8px rgba(239, 83, 80, 0.1);
}

.card.bg-light.bg-opacity-10 .form-label {
    color: #2196F3;
}

.card.bg-light.bg-opacity-10:hover {
    border-color: #2196F3;
    box-shadow: 0 2px 8px rgba(33, 150, 243, 0.1);
}

/* Input fields in these sections */
.card.bg-danger.bg-opacity-10 .form-control,
.card.bg-light.bg-opacity-10 .form-control {
    background: #fff;
    border: 1px solid #e0e0e0;
    font-size: 1.1rem;
    font-weight: 500;
    height: 45px;
}

/* Total Credit specific */
#total_credit {
    color: #d32f2f;
    font-weight: 600;
    background: #fff;
}

/* Received amount specific */
#paid_amount {
    color: #2196F3;
    font-weight: 600;
    background: #fff;
}

/* Link button in Received section */
.text-success .btn {
    background: #2196F3;
    color: white;
    border: none;
    padding: 5px 12px;
    border-radius: 4px;
    font-size: 0.9rem;
    margin-left: 10px;
    transition: all 0.3s ease;
}

.text-success .btn:hover {
    background: #1976D2;
    box-shadow: 0 2px 4px rgba(33, 150, 243, 0.2);
}

/* Selectpicker customization */
.bootstrap-select .dropdown-toggle {
    background: #fff;
    border: 1px solid #e0e0e0;
    padding: 10px 15px;
    font-size: 1rem;
}

.bootstrap-select .dropdown-toggle:focus,
.bootstrap-select .dropdown-toggle:hover {
    border-color: #2196F3;
    box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);
}

/* Section spacing */
.row.g-4.mb-4 {
    margin-bottom: 30px;
}

.col-md-6 {
    padding: 10px;
}
/* Updated header styling */
.card-header {
 
    padding: 15px 20px;
    border-bottom: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
}

.card-header h4 {
    color: white;
    margin: 0;
    font-size: 1.4rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.card-header h4 i {
    font-size: 1.2rem;
    background: rgba(255, 255, 255, 0.2);
    padding: 8px;
    border-radius: 50%;
}

/* Add a subtle highlight effect */
.card-header::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 3px;
    background: rgba(255, 255, 255, 0.2);
}

/* Style the Transactions button */
.card-header .btn.bg-primary {
    background-color: rgba(255, 255, 255, 0.1) !important;
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white !important;
    font-weight: 500;
    padding: 8px 16px;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.card-header .btn.bg-primary:hover {
    background-color: rgba(255, 255, 255, 0.2) !important;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Card styles */
.card {
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    border: none;
    margin-bottom: 20px;
    background-color: #fff;
}

.card-header {

    padding: 15px 20px;
    border-bottom: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header h4 {
    color: white;
    margin: 0;
    font-size: 1.2rem;
}

.card-body {
    padding: 20px;
    background-color: #fff;
}

/* Form elements styling */
.form-select, .form-control {
    border: 1px solid #e0e0e0;
    padding: 8px 12px;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.form-select:focus, .form-control:focus {
    border-color: #2196F3;  /* Changed to blue */
    box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);  /* Changed to blue */
}

/* Sales list styling */
#salepay .sale-item {
    background-color: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 15px;
    transition: all 0.3s ease;
}

#salepay .sale-item:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

#salepay .sale-item.active {
    background-color: #E3F2FD;  /* Light blue background */
    border-color: #2196F3;  /* Blue border */
}

#salepay .sale-icon {
    font-size: 20px;
    color: #757575;
    cursor: pointer;
    transition: color 0.3s ease;
}

#salepay .sale-icon.active {
    color: #2196F3;  /* Changed to blue */
}

/* Sale details styling */
.sale-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
    padding-bottom: 8px;
    border-bottom: 1px solid #f0f0f0;
}

.sale-details {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
    font-size: 0.9rem;
    color: #666;
}

/* Link amount input styling */
.link-amount {
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    padding: 6px 10px;
    width: 120px;
    transition: all 0.3s ease;
}

.link-amount:focus {
    border-color: #2196F3;  /* Changed to blue */
    box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);  /* Changed to blue */
    outline: none;
}

/* Credit info card styling */
.card.bg-danger.bg-opacity-10 {
    background-color: #fff !important;
    border: 1px solid #e0e0e0;
}

.card.bg-light.bg-opacity-10 {
    background-color: #fff !important;
    border: 1px solid #e0e0e0;
}

/* Button styling */
.btn-primary {
    background-color: #2196F3;  /* Changed to blue */
    border-color: #2196F3;  /* Changed to blue */
    padding: 10px 24px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #1976D2;  /* Darker blue */
    border-color: #1976D2;  /* Darker blue */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Modal styling */
.modal-content {
    border: none;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    background-color: #fff;
}

.modal-header {
    background-color: #2196F3;  /* Changed to blue */
    color: white;
    border-bottom: none;
    border-radius: 8px 8px 0 0;
}

.popup-close {
    background: none;
    border: none;
    color: white;
    font-size: 24px;
    cursor: pointer;
}

/* Status indicators */
#prevdue {
    color: #f44336;
    font-weight: 500;
}

#creditlmt {
    color: #2196F3;  /* Changed to blue */
    font-weight: 500;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .card-header {
        flex-direction: column;
        text-align: center;
    }
    
    .card-header button {
        margin-top: 10px;
    }
    
    .sale-details {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .link-amount {
        width: 100%;
        margin-top: 8px;
    }
}
                                    .sale-details{
                                        margin-bottom: 10px;
                                    }
                                    .link-amount {
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100px;
}
#salepay .sale-item.active{
    background-color: #f9f9f9;
}
                                    #salepay .sale-item {
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    font-size: 15px;
    padding: 10px;
    margin-bottom: 15px;
    display: flex;
    flex-direction: column;
    width: 100%;
    border-radius: 5px;
    /*  */
    background-color: #fff;
}

#salepay .sale-item h4 {
    margin: 0;
    color: #333;
    font-weight: bold;
}

#salepay .sale-item .sale-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

#salepay .sale-item .sale-details {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    color: #555;
}
#salepay .sale-item .sale-icon.active{
    color: rgb(11, 214, 11);
}

#salepay .sale-item .sale-icon {
    font-size: 18px;
    cursor: pointer;
    margin-bottom: 10px;
 
    align-self: flex-start;
}

#salepay .no-sales {
    text-align: center;
    font-size: 16px;
    color: #888;
    margin-top: 20px;
}

                                </style>
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

                                                        if (response.success && response.sales && response.sales.length >
                                                            0) {
                                                            $.each(response.sales, function(key, sale) {


                                                                $('#bill_no').append(
                                                                    '<option value="' + sale.prefix + '/' + sale
                                                                    .sales_code + '" ' +
                                                                    'data-prefix="' + sale.prefix + '" ' +
                                                                    'data-sales-code="' + sale.sales_code +
                                                                    '" ' +
                                                                    'data-sales-type="' + sale.sales_type +
                                                                    '" ' +
                                                                    'data-sale-id="' + sale.id + '" ' +
                                                                    'data-pay-amount="' + sale.paid_amount +
                                                                    '" ' +
                                                                    'data-grand-total="' + sale.grand_total +
                                                                    '">' +
                                                                    sale.prefix + '/' + sale.sales_code +
                                                                    '</option>'
                                                                );



                                                            });

                                                            $('#bill_no').selectpicker('refresh');
                                                        }
                                                    }
                                                });
                                            }
                                        });
                                    });
                                </script>
<div class="row">
    <div id="selected-bills-wrapper"></div>
</div><script>

$(document).ready(function() {
    $(document).on('click', 'button[name="save"]', function(e) {
        e.preventDefault();
        
        var selectedItems = [];
        $('#salepay .sale-item.active').each(function() {
    var item = $(this);
    // Get only the bill number part
    var billNo = item.find('.sale-details div:first').text().replace('Bill No:', '').trim();
    // Get only the amount part
    var totalAmount = item.find('.sale-details div:eq(1)').text().replace('Total Amount:', '').trim();
    
    selectedItems.push({
        billNo: billNo,
        totalAmount: totalAmount,
        currentBalance: item.find('#current').text().trim(),
        linkAmount: item.find('.link-amount').val().trim(),
        saleid: item.find('.sale-id').val().trim()
    });
});

        if (selectedItems.length > 0) {
            let totalLinkAmount = 0;
            selectedItems.forEach(item => {
                totalLinkAmount += parseFloat(item.linkAmount) || 0;
            });

            var selectedBillsHtml = `
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="fas fa-file-invoice-dollar me-2"></i>Selected Bills Summary
                            </h5>
                            <div>
                                <span class="badge bg-light text-primary me-2">Total Bills: ${selectedItems.length}</span>
                                <span class="badge bg-light text-primary">Total Amount: ₹${totalLinkAmount.toFixed(2)}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
            `;

            selectedItems.forEach(function(item) {
                selectedBillsHtml += `
    <div class="col-lg-4 col-md-6">
        <div class="card h-100 bill-card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <div class="bill-header">
                        <div class="d-flex align-items-start mb-2">
                            <div class="bill-icon me-3">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                            <div class="bill-number">
                                <span class="text-muted small d-block mb-1">Bill Number</span>
                                <h6 class="mb-0 text-primary">${item.billNo}</h6>
                            </div>
                        </div>
                    </div>
                    <span class="badge bg-primary ms-2">₹${item.linkAmount}</span>
                    <input type="hidden" class="sale-id" value="${item.saleid}" name="sale_ids[]">
                </div>
                <div class="bill-details">
                    <div class="mb-3">
                        <label class="text-muted d-block mb-2">Previous Balance</label>
                        <span class="fw-bold fs-5">${item.totalAmount}</span>
                    </div>
                    <div>
                        <label class="text-muted d-block mb-2">Balance</label>
                        ${parseFloat(item.currentBalance) === 0 || item.currentBalance === '0' || item.currentBalance === '0.00' ? 
                            `<span class="fw-bold fs-5 text-success">PAID</span>` :
                            `<span class="fw-bold fs-5 text-warning">₹${item.currentBalance}</span>`
                        }
                    </div>
                </div>
            </div>
        </div>
    </div>
`;
            });

            selectedBillsHtml += `
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $('#selected-bills-wrapper').html(selectedBillsHtml);

            swal({
                title: "Success!",
                text: "Bills have been selected successfully",
                icon: "success"
            });
        } else {
            $('#selected-bills-wrapper').html(`
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-file-invoice-dollar me-2"></i>Selected Bills</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center py-4">
                                <i class="fas fa-file-invoice text-muted mb-3" style="font-size: 2rem;"></i>
                                <p class="text-muted mb-0">No bills selected</p>
                            </div>
                        </div>
                    </div>
                </div>
            `);
        }

        $('#linkpayment').modal('hide');
    });
});
</script>

<style>
    /* Selected Bills Card Styling */
#selected-bills-wrapper .card {
    border: none;
    border-radius: 8px;
    overflow: hidden;
}

#selected-bills-wrapper .bill-card {
    border: 1px solid #e0e0e0;
    transition: all 0.3s ease;
    background: #fff;
}

#selected-bills-wrapper .bill-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

#selected-bills-wrapper .bill-icon {
    width: 45px;
    height: 45px;
    background: rgba(13, 71, 161, 0.1);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

#selected-bills-wrapper .bill-icon i {
    color: #0D47A1;
    font-size: 1.2rem;
}

#selected-bills-wrapper .badge {
    font-weight: 500;
    padding: 0.6rem 1rem;
    font-size: 1rem;
}

#selected-bills-wrapper .bill-details {
    padding-top: 1rem;
    margin-top: 1rem;
    border-top: 1px solid #f0f0f0;
}

#selected-bills-wrapper .card-header {
    padding: 1.25rem 1.5rem;
}

#selected-bills-wrapper .row.g-3 {
    padding: 0.75rem;
}

#selected-bills-wrapper .card-body {
    height: 100%;
}

#selected-bills-wrapper .text-muted {
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    #selected-bills-wrapper .col-md-4 {
        margin-bottom: 1rem;
    }
}
</style>

                                <div class="row mt-4">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg px-5 bg-primary">
                                            Make Payment
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
                        data: {
                            store_id: storeId
                        },
                        success: function(data) {
                            $('#customer_select').empty();
                            if (data.length === 0) {
                                swal({
                                    title: "No Customers Found!",
                                    text: "There are no customers associated with this store.",
                                    icon: "warning",
                                    button: "OK",
                                });
                                $('#customer_select').append(
                                    '<option value="">No customers available</option>');
                            } else {
                                $('#customer_select').append(
                                    '<option value="">Select Customer</option>');
                                $.each(data, function(key, value) {
                                    $('#customer_select').append('<option value="' +
                                        value.id + '">' + value.customer_name +
                                        '</option>');
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

            // Create a hidden input for the selected sale ID
            var saleId = selectedOption.data('sale-id');
            if (saleId) {
                // Check if the input already exists to avoid duplicates
                if ($('#sale_ids_' + saleId).length === 0) {
                    $('#bill_no').after('<input type="hidden" id="sale_ids_' + saleId + '" name="sale_ids[]" value="' +
                        saleId + '">');
                }
            }

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
