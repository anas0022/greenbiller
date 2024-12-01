@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')
<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">

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
            <form action="{{route('storepost')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$store->id}}">
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
                                                        <input type="text" name="store_code" class="form-control form-control-sm" readonly value="{{$store->store_code}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Store Name<span class="required">*</span></label>
                                                        <input type="text" name="store_name" class="form-control form-control-sm" value="{{$store->store_name}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Mobile<span class="required">*</span></label>
                                                        <input type="text" name="mobile" class="form-control form-control-sm"  value="{{$store->mobile}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Google Pay Number<span class="required">*</span></label>
                                                        <input type="text" name="google_pay" class="form-control form-control-sm"  value="{{$store->google_pay_no}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Email<span class="required">*</span></label>
                                                        <input name="email" type="email" class="form-control form-control-sm" value="{{$store->email}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Phone</label>
                                                        <input type="text" name="phone" class="form-control form-control-sm" value="{{$store->phone}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">GST Number</label>
                                                        <input type="text" name="gst_no" class="form-control form-control-sm" value="{{$store->gst_no}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">VAT Number</label>
                                                        <input type="text" name="vat_no" class="form-control form-control-sm" value="{{$store->vat_no}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">PAN Number</label>
                                                        <input type="text" name="pan_no" class="form-control form-control-sm" value="{{$store->pan_no}}">
                                                    </div>
                                                </div>


                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Store Website</label>
                                                        <input type="text" name="website" class="form-control form-control-sm" value="{{$store->store_website}}">
                                                    </div>
                                                </div>



                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Bank Details</label>
                                                        <textarea name="bank_details" class="form-control form-control-sm">{{$store->bank_details}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Address</label>
                                                        <textarea name="address" class=" form-control form-control-sm-sm">{{$store-> address }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">City</label>
                                                        <input type="text" name="city" class="form-control form-control-sm" value="{{$store-> city }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">State</label>
                                                        <input type="text" name="state" class="form-control form-control-sm" value="{{$store-> state }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Postcode</label>
                                                        <input type="text" name="postcode" class="form-control form-control-sm" value="{{$store-> postcode }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Country</label>
                                                        <select name="country" class="form-control form-control-sm selectpicker" data-live-search="true">
                                                            <option>{{$store->country}}</option>
                                                           
                                                        </select>



                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Show Signature on Invoice</label>
                                                        <div class="form-check form-switch">
                                                            @if ($store->show_signature=="")
                                                            <input name="show_signature" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="1">
                                                            @else
                                                            <input name="show_signature" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="1" checked>
                                                            @endif
                                                            
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
                                                      
                                                        </div>
                                                        <span>Max Width/Height: 1000px * 1000px & Size: 1024kb</span>
                                                       

                                                    </div>
                                                    <img src="{{asset('storage/'.$store->signature)}}" alt="" srcset="" style="border:3px solid #d2d6de; width: 30%; height:30%;">
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Store Logo</label>
                                                        <div class="input-group mb-3">
                                                            <input type="file" name="logo" class="form-control form-control-sm">
                                                         
                                                        </div>
                                                        <span>Max Width/Height: 1000px * 1000px & Size: 1024kb</span>
                                                    </div>
                                                    <img src="{{asset('storage/'.$store->logo)}}" style="border:3px solid #d2d6de; width: 30%;">
                                                </div>





                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="system" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Timezone<span class="required">*</span></label>
                                                        <select name="timezone" class="form-control form-control-sm selectpicker" data-live-search="true">
                                                            <option value="{{ $store->timezone}}">     {{ $timezone->firstWhere('id', $store->timezone)->timezone ?? 'N/A' }}</option>
                                                           @foreach ($timezone as $times )
                                                           <option value="{{$times->id}}">{{$times->timezone}}</option>
                                                           
                                                           @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Currency <span class="required">*</span></label>
                                                        <select name="currency_id" class="form-control form-control-sm selectpicker" data-live-search="true">
                                                            <option value="{{ $store->currency_id}}">{{ $currency->firstWhere('id', $store->currency_id)->currency ?? 'N/A' }}  ({{ $currency->firstWhere('id', $store->currency_id)->symbol ?? 'N/A' }})</option>
                                                            @foreach ($currency as $currencies )
                                                            <option value="{{$currencies->id}}">{{$currencies->country}} ({{$currencies->symbol}})</option>
                                                            
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Decimals</label>
                                                        <select name="decimals" class="form-control form-control-sm selectpicker" data-live-search="true">
                                                            <option value="{{$store->decimals}}">{{$store->decimals}}</option>
                                                            <option value="0"  data-tokens="0">0</option>
                                                            <option value="1"  data-tokens="1">1</option>
                                                            <option value="2" data-tokens="2">2</option>
                                                            <option value="3"  data-tokens="3">3</option>
                                                            <option value="4"  data-tokens="4">4</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Decimals for Quantity</label>
                                                        <select name="qty_decimals" class="form-control form-control-sm selectpicker" data-live-search="true">
                                                        <option value="{{$store->qty_decimals}}">{{$store->qty_decimals}}</option>
                                                            <option value="0"   data-tokens="0">0</option>
                                                            <option value="1"   data-tokens="1">1</option>
                                                            <option value="2"   data-tokens="2">2</option>
                                                            <option value="3"   data-tokens="3">3</option>
                                                            <option value="4"  data-tokens="4">4</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Language</label>
                                                        <select name="language_id" class="form-control form-control-sm selectpicker" data-live-search="true">
    <option>{{ $languages->firstWhere('id', $store->language_id)->language ?? 'N/A' }}</option>
    @foreach ($languages as $language)
        <option value="{{ $language->id }}">{{ $language->language }}</option>
    @endforeach
</select>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Enable Round Off ?</label>
                                                        <div class="form-check form-switch">
                                                            @if ($store->round_off=="")
                                                            <input name="round_off" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"   value="1">
                                                        
                                                            @else 
                                                            <input name="round_off" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"   value="1" checked>
                                                            @endif
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
                                                            <option value="{{$store->default_account_id}}"></option>
                                                           @foreach ($accounts as $account )

                                                           <option value="{{$account->id}}"></option>
                                                           
                                                           @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Default Sales Discount(%)</label>
                                                        <input type="text" name="default_sales_discount" class="form-control form-control-sm" value="{{$store->default_sales_discount}}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Sales Invoice Formats</label>
                                                        <select name="sales_invoice_format_id" class="form-control form-control-sm">
                                                        <option value="{{$store->sales_invoice_format_id}}">@if ($store->sales_invoice_format_id==1)
                                                        Default
                                                        @else
                                                        Indian GST
                                                        @endif

                                                    </option>
                                                            <option value="1" >Default</option>
                                                            <option value="2" >Indian GST</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">POS Invoice Formats</label>
                                                        <select name="pos_invoice_format_id" class="form-control form-control-sm">
                                                        <option value="{{$store->pos_invoice_format_id}}">@if ($store->pos_invoice_format_id==1)
                                                        Default
                                                        @else
                                                        Indian GST
                                                        @endif

                                                    </option>
                                                            <option value="1" >Default</option>
                                                            <option value="2" >Indian GST</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Show MRP Column on POS Invoice ?</label>
                                                        <div class="form-check form-switch">
                                                            @if ($store->mrp_column=="")
                                                            <input name="mrp_column" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1">
                                                            @else
                                                            <input name="mrp_column" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1" checked>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Show Paid Amount and Change Return (in POS) ?</label>
                                                        <div class="form-check form-switch">
                                                        @if ($store->change_return=="")
                                                        <input name="change_return" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1">
                                                            @else
                                                            <input name="change_return" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1" checked>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Show Previous Balance on Invoice ?</label>
                                                        <div class="form-check form-switch">
                                                        @if ($store->previous_balance_bit=="")
                                                        <input name="previous_balance_bit" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1">
                                                            @else
                                                            <input name="previous_balance_bit" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1" checked>
                                                            @endif
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Number to Words Format</label>

                                                        <select name="number_to_words" class="form-control form-control-sm">
                                                            <option value="{{$store->number_to_words}}">{{$store->number_to_words}}</option>
                                                            <option value="Default" >Default</option>
                                                            <option value="Indian" >Indian GST</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Sales Invoice Footer Text</label>
                                                        <textarea name="sales_invoice_footer_text" class="form-control form-control-sm" placeholder="This is footer text. It is in Store Management.">
                                                            {{$store->sales_invoice_footer_text}}
                                                        </textarea>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Invoice Terms and Conditions</label>
                                                        <div class="form-check form-switch">
                                                            Show on Invoice
                                                            @if ($store->t_and_c_status=="")
                                                            <input name="t_and_c_status" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="1">
                                                            @else
                                                            <input name="t_and_c_status" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="1" checked>
                                                            @endif
                                                            
                                                        </div>
                                                        <div class="form-check form-switch">
                                                            Show on POS Invoice
                                                            @if ($store->t_and_c_status=="")
                                                            <input name="t_and_c_status_pos" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1">
                                                            @else
                                                            <input name="t_and_c_status_pos" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1" checked >
                                                            @endif
                                                            
                                                        </div>
                                                        <textarea name="invoice_terms" class="form-control form-control-sm" placeholder="Terms and Conditions">{{$store->invoice_terms}}</textarea>
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
                                                        <input type="text" name="category_init" class="form-control form-control-sm" value="{{$store->category_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Item<span class="required">*</span></label>
                                                        <input type="text" name="item_init" class="form-control form-control-sm" value="{{$store->item_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Supplier<span class="required">*</span></label>
                                                        <input type="text" name="supplier_init" class="form-control form-control-sm" value="{{$store->supplier_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Purchase<span class="required">*</span></label>
                                                        <input type="text" name="purchase_init" class="form-control form-control-sm" value="{{$store->purchase_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Purchase Return<span class="required">*</span></label>
                                                        <input type="text" name="purchase_return_init" class="form-control form-control-sm" value="{{$store->purchase_return_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Customer<span class="required">*</span></label>
                                                        <input type="text" name="customer_init" class="form-control form-control-sm" value="{{$store->customer_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Sales<span class="required">*</span></label>
                                                        <input type="text" name="sales_init" class="form-control form-control-sm" value="{{$store->sales_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Sales Return<span class="required">*</span></label>
                                                        <input type="text" name="sales_return_init" class="form-control form-control-sm" value="{{$store->sales_return_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Expense<span class="required">*</span></label>
                                                        <input type="text" name="expense_init" class="form-control form-control-sm" value="{{$store->expense_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Accounts<span class="required">*</span></label>
                                                        <input type="text" name="accounts_init" class="form-control form-control-sm" value="{{$store->accounts_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Quotation<span class="required">*</span></label>
                                                        <input type="text" name="quotation_init" class="form-control form-control-sm" value="{{$store->quotation_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Money Transfer<span class="required">*</span></label>
                                                        <input type="text" name="money_transfer_init" class="form-control form-control-sm" value="{{$store->money_transfer_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Sales Payment<span class="required">*</span></label>
                                                        <input type="text" name="sales_payment_init" class="form-control form-control-sm" value="{{$store->sales_payment_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Sales Return Payment<span class="required">*</span></label>
                                                        <input type="text" name="sales_return_payment_init" class="form-control form-control-sm" value="{{$store->sales_return_payment_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Purchase Payment<span class="required">*</span></label>
                                                        <input type="text" name="purchase_payment_init" class="form-control form-control-sm" value="{{$store->purchase_payment_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Purchase Return Payment<span class="required">*</span></label>
                                                        <input type="text" name="purchase_return_payment_init" class="form-control form-control-sm" value="{{$store->purchase_return_payment_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Expense Payment<span class="required">*</span></label>
                                                        <input type="text" name="expense_payment_init" class="form-control form-control-sm" value="{{$store->expense_payment_init}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Customers Advance Payments<span class="required">*</span></label>
                                                        <input type="text" name="cust_advance_init" class="form-control form-control-sm" value="{{$store->cust_advance_init}}">
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
                                                            @if ($store->if_customerapp=="")
                                                            <input name="if_customerapp" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1">
                                                            @else
                                                            <input name="if_customerapp" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1" checked>
                                                            @endif
                                                           
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">If have Delivery App ?</label>
                                                        <div class="form-check form-switch">
                                                            @if ($store->if_deliveryapp=="")
                                                            <input name="if_deliveryapp" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1">
                                                            @else
                                                            <input name="if_deliveryapp" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1" checked>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Fixed App Delivery Charge ?</label>
                                                        <div class="form-check form-switch">
                                                            @if ($store->if_fixeddelivery=="")
                                                            <input name="if_fixeddelivery" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1">
                                                            @else
                                                            <input name="if_fixeddelivery" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1" checked>
                                                            
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Delivery Charge </label>
                                                        <input type="text" name="delivery_charge" class="form-control form-control-sm" value="{{$store->delivery_charge}}">

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Have Handling Charge ?</label>
                                                        <div class="form-check form-switch">
                                                            @if ($store->if_handlingcharge=="")
                                                            <input name="if_handlingcharge" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1">
                                                            @else
                                                            <input name="if_handlingcharge" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1" checked>
                                                            @endif
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Handling Charge </label>
                                                        <input type="text" name="handling_charge" class="form-control form-control-sm" value="{{$store->handling_charge}}">

                                                    </div>
                                                </div>

                                                <h4 class="card-title">Onesignal Settings <i class="flaticon-381-fast-forward"></i> </h4>
                                                <br>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01"> Onsignal ON/OFF
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <div class="form-check form-switch">
                                                            @if ($store->if_onesignal=="")
                                                            <input name="if_onesignal" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                            @else
                                                            <input name="if_onesignal" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                                            
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01"> App ID
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input name="onesignal_id" type="text" class="form-control" value="{{$store->onesignal_id}}">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01"> Rest API Key
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input name="onesignal_key" type="text" class="form-control" value="{{$store->onesignal_key}}">
                                                    </div>
                                                </div>



                                                <h4 class="card-title">OTP Settings <i class="flaticon-381-fast-forward"></i> </h4>
                                                <br>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01"> Turn ON/OFF OTP
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <div class="form-check form-switch">
                                                            @if ($store->if_otp=="")
                                                            <input name="if_otp" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                            @else
                                                            <input name="if_otp" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                                            @endif
                                                           
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">  SMS Sender ID 
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input name="sms_senderid" type="text" class="form-control" value="{{$store->sms_senderid}}">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">  SMS DLT ID 
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input name="sms_dltid" type="text" class="form-control" value="{{$store->sms_dltid}}">
                                                    </div>
                                                </div>


                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">  SMS Content 
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <code>Replace the verable content to {code} that is otp code</code>
                                                        <textarea name="sms_msg" class="form-control">{{$store->sms_msg}}</textarea>

                                                    </div>
                                                </div>




                                                <h4 class="card-title">OTP Provider Msg91 <i class="flaticon-381-fast-forward"></i> </h4>
                                                <br>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01"> Msg91 ON/OFF
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <div class="form-check form-switch">
                                                            @if ($store->if_msg91=="")
                                                            <input name="if_msg91" class="form-check-input" value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                            @else
                                                            <input name="if_msg91" class="form-check-input" value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01"> App Key
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input name="msg91_apikey" type="text" class="form-control" value="{{$store->msg91_apikey}}">
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
                                                            @if ($store->if_cod=="")
                                                            <input name="if_cod" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1">
                                                            @else
                                                            <input name="if_cod" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1" checked>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Enable Pickup @ Store?</label>
                                                        <div class="form-check form-switch">
                                                            @if ($store->if_pickupatstore=="")
                                                            <input name="if_pickupatstore" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1">
                                                            @else
                                                            <input name="if_pickupatstore" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1" checked>
                                                            @endif
                                                          
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
                                                        @if ($store->if_model_no=="")
                                                        <input name="if_model_no" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1">
                                                        @else
                                                        <input name="if_model_no" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1" checked>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Item Serial number Mapping </label>
                                                    <div class="form-check form-switch">
                                                        @if ($store->if_serialno=="")
                                                        <input name="if_serialno" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1">
                                                        @else
                                                        <input name="if_serialno" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"  value="1" checked>
                                                        @endif
                                                       
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
                                                            <button name="reset" type="submit" class="btn btn-primary">Reset</button>
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
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>
                </form>


            </div>


        </div>
    </div>
</div>
</div>

@endsection




