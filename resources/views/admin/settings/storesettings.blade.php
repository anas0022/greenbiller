@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <!-- <div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Form</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Validation</a></li>
					</ol>
                </div> -->

        <div class="row">
            <div class="col-xl-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">

                            <h4 class="card-title"> Store Settings <i class="flaticon-381-fast-forward"></i> </h4>
                            <code>Wrong configuration may stop working of application</code>
                        </div>


                        <div class="card-body">
                            <!-- Nav tabs -->
                            <div class="default-tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#general" aria-selected="true" role="tab" tabindex="-1"><i class="bi bi-sliders" style="margin-right: 6px;"></i> General</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#system" aria-selected="false" role="tab" tabindex="-1"><i class="bi bi-cpu" style="margin-right: 6px;"></i> System</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#sale" aria-selected="false" role="tab" tabindex="-1"><i class="bi bi-cart-check" style="margin-right: 6px;"></i> Sales</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="tab" href="#prefix" aria-selected="false" role="tab"><i class="bi bi-receipt" style="margin-right: 6px;"></i> Prefixes</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="tab" href="#app" aria-selected="false" role="tab"><i class="bi bi-phone" style="margin-right: 6px;"></i> App</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="tab" href="#payment" aria-selected="false" role="tab"><i class="bi bi-credit-card" style="margin-right: 6px;"></i> Payment Gateway</a>
                                    </li>

                                    <!-- <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="tab" href="#other" aria-selected="false" role="tab"><i class="bi bi-credit-card" style="margin-right: 6px;"></i>Other</a>
                                    </li> -->
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="tab" href="#reset" aria-selected="false" role="tab"><i class="bi bi-credit-card" style="margin-right: 6px;"></i>Rest all Data</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="general" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Store Code<span class="required">*</span></label>
                                                        <input type="text" name="store_code" class="form-control form-control-sm" readonly value="<?php echo $store_data['store_code']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Store Name<span class="required">*</span></label>
                                                        <input type="text" name="store_name" class="form-control form-control-sm" value="<?php echo $store_data['store_name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Mobile<span class="required">*</span></label>
                                                        <input type="text" name="mobile" class="form-control form-control-sm" value="<?php echo $store_data['mobile'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Email<span class="required">*</span></label>
                                                        <input name="email" type="email" class="form-control form-control-sm" value="<?php echo $store_data['email'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Phone</label>
                                                        <input type="text" name="phone" class="form-control form-control-sm" value="<?php echo $store_data['phone'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">GST Number</label>
                                                        <input type="text" name="gst_no" class="form-control form-control-sm" value="<?php echo $store_data['gst_no'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">VAT Number</label>
                                                        <input type="text" name="vat_no" class="form-control form-control-sm" value="<?php echo $store_data['vat_no'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">PAN Number</label>
                                                        <input type="text" name="pan_no" class="form-control form-control-sm" value="<?php echo $store_data['pan_no'] ?>">
                                                    </div>
                                                </div>


                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Store Website</label>
                                                        <input type="text" name="website" class="form-control form-control-sm" value="<?php echo $store_data['website'] ?>">
                                                    </div>
                                                </div>



                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Bank Details</label>
                                                        <textarea name="bank_details" class="form-control form-control-sm"><?php echo $store_data['bank_details'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Address</label>
                                                        <textarea name="address" class=" form-control form-control-sm-sm"><?php echo $store_data['address'] ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">City</label>
                                                        <input type="text" name="city" class="form-control form-control-sm" value="<?php echo $store_data['city'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">State</label>
                                                        <input type="text" name="state" class="form-control form-control-sm" value="<?php echo $store_data['state'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Postcode</label>
                                                        <input type="text" name="postcode" class="form-control form-control-sm" value="<?php echo $store_data['postcode'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Country</label>
                                                        <select name="country" class="form-control form-control-sm selectpicker" data-live-search="true">
                                                            <option>-SELECT COUNTRY-</option>
                                                            
                                                        </select>



                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Show Signature on Invoice</label>
                                                        <div class="form-check form-switch">
                                                            <input name="show_signature" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?php if ($store_data['show_signature'] == 1) {
                                                                                                                                                                                echo 'checked';
                                                                                                                                                                            } ?> value="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-lg-6 mb-2">
                                                </div> -->
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Signature</label>

                                                        <div class="input-group mb-3">
                                                            <input type="file" name="signature" class="form-control form-control-sm">
                                                            <button name="upload_sign" type="submit" class="btn btn-primary">Upload</button>
                                                        </div>
                                                        <span>Max Width/Height: 1000px * 1000px & Size: 1024kb</span>
                                                       

                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Store Logo</label>
                                                        <div class="input-group mb-3">
                                                            <input type="file" name="logo" class="form-control form-control-sm">
                                                            <button name="upload_logo" type="submit" class="btn btn-primary">Upload</button>
                                                        </div>
                                                        <span>Max Width/Height: 1000px * 1000px & Size: 1024kb</span>
                                                    </div>
                                                    <img src="admin/" style="border:3px solid #d2d6de; width: 50%;">
                                                </div>





                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="system" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Timezone<span class="required">*</span><?php echo $store_data['timezone']; ?></label>
                                                        <select name="timezone" class="form-control form-control-sm selectpicker" data-live-search="true">
                                                            <option>-SELECT-</option>
                                                           
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Currency <span class="required">*</span></label>
                                                        <select name="currency_id" class="form-control form-control-sm selectpicker" data-live-search="true">
                                                            <option>-SELECT-</option>
                                                          
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Decimals</label>
                                                        <select name="decimals" class="form-control form-control-sm selectpicker" data-live-search="true">


                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Decimals for Quantity</label>
                                                        <select name="qty_decimals" class="form-control form-control-sm selectpicker" data-live-search="true">

                                                       

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Language</label>
                                                        <select name="language_id" class="form-control form-control-sm selectpicker" data-live-search="true">
                                                            <option>-SELECT-</option>
                                                          
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Enable Round Off ?</label>
                                                        <div class="form-check form-switch">
                                                            <input name="round_off" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?php if ($store_data['round_off'] == 1) {
                                                                                                                                                                            echo 'checked';
                                                                                                                                                                        } ?> value="1">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="sale" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Default Account</label>
                                                        <select name="default_account_id" class="form-control selectpicker" data-live-search="true">
                                                            <option value="">-SELECT-</option>
                                                           
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Default Sales Discount(%)</label>
                                                        <input type="text" name="default_sales_discount" class="form-control form-control-sm" value="<?php echo $store_data['default_sales_discount']; ?>">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Sales Invoice Formats</label>
                                                        <select name="sales_invoice_format_id" class="form-control form-control-sm">
                                                    
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">POS Invoice Formats</label>
                                                        <select name="pos_invoice_format_id" class="form-control form-control-sm">
                                                             
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Show MRP Column on POS Invoice ?</label>
                                                        <div class="form-check form-switch">
                                                            <input name="mrp_column" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?php if ($store_data['mrp_column'] == 1) {
                                                                                                                                                                            echo 'checked';
                                                                                                                                                                        } ?> value="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Show Paid Amount and Change Return (in POS) ?</label>
                                                        <div class="form-check form-switch">
                                                            <input name="change_return" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?php if ($store_data['change_return'] == 1) {
                                                                                                                                                                                echo 'checked';
                                                                                                                                                                            } ?> value="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Show Previous Balance on Invoice ?</label>
                                                        <div class="form-check form-switch">
                                                            <input name="previous_balance_bit" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?php if ($store_data['previous_balance_bit'] == 1) {
                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                    } ?> value="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Number to Words Format</label>

                                                        <select name="number_to_words" class="form-control form-control-sm">
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Sales Invoice Footer Text</label>
                                                        <textarea name="sales_invoice_footer_text" class="form-control form-control-sm" placeholder="This is footer text. It is in Store Management."><?php echo $store_data['sales_invoice_footer_text'] ?></textarea>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Invoice Terms and Conditions</label>
                                                        <div class="form-check form-switch">
                                                            Show on Invoice

                                                            <input name="t_and_c_status" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?php if ($store_data['t_and_c_status'] == 1) {
                                                                                                                                                                                echo 'checked';
                                                                                                                                                                            } ?> value="1">
                                                        </div>
                                                        <div class="form-check form-switch">
                                                            Show on POS Invoice

                                                            <input name="t_and_c_status_pos" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?php if ($store_data['t_and_c_status_pos'] == 1) {
                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                } ?> value="1">
                                                        </div>
                                                        <textarea name="invoice_terms" class="form-control form-control-sm" placeholder="Terms and Conditions"><?php echo $store_data['invoice_terms'] ?></textarea>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="prefix" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Category<span class="required">*</span></label>
                                                        <input type="text" name="category_init" class="form-control form-control-sm" value="<?php echo $store_data['category_init']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Item<span class="required">*</span></label>
                                                        <input type="text" name="item_init" class="form-control form-control-sm" value="<?php echo $store_data['item_init'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Supplier<span class="required">*</span></label>
                                                        <input type="text" name="supplier_init" class="form-control form-control-sm" value="<?php echo $store_data['supplier_init'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Purchase<span class="required">*</span></label>
                                                        <input type="text" name="purchase_init" class="form-control form-control-sm" value="<?php echo $store_data['purchase_init'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Purchase Return<span class="required">*</span></label>
                                                        <input type="text" name="purchase_return_init" class="form-control form-control-sm" value="<?php echo $store_data['purchase_return_init'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Customer<span class="required">*</span></label>
                                                        <input type="text" name="customer_init" class="form-control form-control-sm" value="<?php echo $store_data['customer_init'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Sales<span class="required">*</span></label>
                                                        <input type="text" name="sales_init" class="form-control form-control-sm" value="<?php echo $store_data['sales_init'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Sales Return<span class="required">*</span></label>
                                                        <input type="text" name="sales_return_init" class="form-control form-control-sm" value="<?php echo $store_data['sales_return_init'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Expense<span class="required">*</span></label>
                                                        <input type="text" name="expense_init" class="form-control form-control-sm" value="<?php echo $store_data['expense_init'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Accounts<span class="required">*</span></label>
                                                        <input type="text" name="accounts_init" class="form-control form-control-sm" value="<?php echo $store_data['accounts_init'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Quotation<span class="required">*</span></label>
                                                        <input type="text" name="quotation_init" class="form-control form-control-sm" value="<?php echo $store_data['quotation_init'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Money Transfer<span class="required">*</span></label>
                                                        <input type="text" name="money_transfer_init" class="form-control form-control-sm" value="<?php echo $store_data['money_transfer_init'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Sales Payment<span class="required">*</span></label>
                                                        <input type="text" name="sales_payment_init" class="form-control form-control-sm" value="<?php echo $store_data['sales_payment_init'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Sales Return Payment<span class="required">*</span></label>
                                                        <input type="text" name="sales_return_payment_init" class="form-control form-control-sm" value="<?php echo $store_data['sales_return_payment_init'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Purchase Payment<span class="required">*</span></label>
                                                        <input type="text" name="purchase_payment_init" class="form-control form-control-sm" value="<?php echo $store_data['purchase_payment_init'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Purchase Return Payment<span class="required">*</span></label>
                                                        <input type="text" name="purchase_return_payment_init" class="form-control form-control-sm" value="<?php echo $store_data['purchase_return_payment_init'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Expense Payment<span class="required">*</span></label>
                                                        <input type="text" name="expense_payment_init" class="form-control form-control-sm" value="<?php echo $store_data['expense_payment_init'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Customers Advance Payments<span class="required">*</span></label>
                                                        <input type="text" name="cust_advance_init" class="form-control form-control-sm" value="<?php echo $store_data['cust_advance_init'] ?>">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="app" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">If have Customer App ?</label>
                                                        <div class="form-check form-switch">
                                                            <input name="if_customerapp" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?php if ($store_data['if_customerapp'] == 1) {
                                                                                                                                                                                echo 'checked';
                                                                                                                                                                            } ?> value="1">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">If have Delivery App ?</label>
                                                        <div class="form-check form-switch">
                                                            <input name="if_deliveryapp" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?php if ($store_data['if_deliveryapp'] == 1) {
                                                                                                                                                                                echo 'checked';
                                                                                                                                                                            } ?> value="1">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Fixed App Delivery Charge ?</label>
                                                        <div class="form-check form-switch">
                                                            <input name="if_fixeddelivery" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?php if ($store_data['if_fixeddelivery'] == 1) {
                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                } ?> value="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Delivery Charge </label>
                                                        <input type="text" name="delivery_charge" class="form-control form-control-sm" value="<?php echo $store_data['delivery_charge'] ?>">

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Have Handling Charge ?</label>
                                                        <div class="form-check form-switch">
                                                            <input name="if_handlingcharge" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" <?php if ($store_data['if_handlingcharge'] == 1) {
                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                } ?> value="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Handling Charge </label>
                                                        <input type="text" name="handling_charge" class="form-control form-control-sm" value="<?php echo $store_data['handling_charge'] ?>">

                                                    </div>
                                                </div>

                                                <h4 class="card-title">Onesignal Settings <i class="flaticon-381-fast-forward"></i> </h4>
                                                <br>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01"> Onsignal ON/OFF
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <div class="form-check form-switch">
                                                            <input name="if_onesignal" class="form-check-input" <?php if ($store_data['if_onesignal'] == 1) {
                                                                                                                    echo 'checked';
                                                                                                                } else {
                                                                                                                } ?> value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01"> App ID
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input name="onesignal_id" type="text" class="form-control" value="<?php echo $store_data['onesignal_id'] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01"> Rest API Key
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input name="onesignal_key" type="text" class="form-control" value="<?php echo $store_data['onesignal_key'] ?>">
                                                    </div>
                                                </div>



                                                <h4 class="card-title">OTP Settings <i class="flaticon-381-fast-forward"></i> </h4>
                                                <br>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01"> Turn ON/OFF OTP
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <div class="form-check form-switch">
                                                            <input name="if_otp" class="form-check-input" value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">  SMS Sender ID 
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input name="sms_senderid" type="text" class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">  SMS DLT ID 
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input name="sms_dltid" type="text" class="form-control" value="">
                                                    </div>
                                                </div>


                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">  SMS Content 
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <code>Replace the verable content to {code} that is otp code</code>
                                                        <textarea name="sms_msg" class="form-control"></textarea>

                                                    </div>
                                                </div>




                                                <h4 class="card-title">OTP Provider Msg91 <i class="flaticon-381-fast-forward"></i> </h4>
                                                <br>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01"> Msg91 ON/OFF
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <div class="form-check form-switch">
                                                            <input name="if_msg91" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01"> App Key
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input name="msg91_apikey" type="text" class="form-control" value="">
                                                    </div>
                                                </div>                                              

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="payment" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Enable COD ?</label>
                                                        <div class="form-check form-switch">
                                                            <input name="if_cod" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Enable Pickup @ Store?</label>
                                                        <div class="form-check form-switch">
                                                            <input name="if_pickupatstore" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade " id="other" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="form-label">Item Model number Mapping </label>
                                                    <div class="form-check form-switch">
                                                        <input name="if_model_no" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="1">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Item Serial number Mapping </label>
                                                    <div class="form-check form-switch">
                                                        <input name="if_serialno" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane fade " id="reset" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="row">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <label class="form-label">Reset all Data </label>
                                                        <div class="form-check form-switch">
                                                            <button onclick="reset()" name="reset" type="submit" class="btn btn-primary">Reset</button>
                                                        </div>
                                                    </div>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-footer">
                            <a href="dashboard" class="btn btn-danger ">Close</a>
                            <button name="update" type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>
                </form>


            </div>


        </div>
    </div>
</div>
</div>







