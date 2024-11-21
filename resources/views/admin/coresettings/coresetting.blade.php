
@extends('admin//layouts/app')

@section('title', 'Home Page')
<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
@section('content')

<div class="content-body">


@if(session('error'))
        <div class="toast error active" id="errorToast">
            <div class="toast-content">
                <i class="fas fa-solid fa-times error-icon"></i>
                <div class="message">
                    <span class="text text-1">Error</span>
                    <span class="text text-2">{{session('error')}}</span>
                </div>
            </div>
            <i class="fa-solid fa-xmark close" id="closeErrorToast"></i>
            <div class="progress error-progress active"></div>
        </div>
    @endif


    @if(session('success'))
        <div class="toast active" id="toast">
            <div class="toast-content">
                <i class="fas fa-solid fa-check check"></i>
                <div class="message">
                    <span class="text text-1">Success</span>
                    <span class="text text-2">{{session('success')}}</span>
                </div>
            </div>
            <i class="fa-solid fa-xmark close" id="closeToast"></i>
            <div class="progress active"></div>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
           

          <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">

                        <h4 class="card-title"> Core Settings <i class="flaticon-381-fast-forward"></i> </h4>
                        <code>Wrong configuration may stop working of application</code>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" action="{{route('corepost')}}" method="POST" enctype="multipart/form-data">

                 
                            
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="nav flex-column nav-pills mb-3">
                                        <a href="#v-pills-home" data-bs-toggle="pill" class="nav-link show active">General</a>
                                        <a href="#v-pills-seo" data-bs-toggle="pill" class="nav-link">SEO</a>
                                        <a href="#v-pills-logo" data-bs-toggle="pill" class="nav-link">Logo </a>
                                        <a href="#v-pills-google" data-bs-toggle="pill" class="nav-link ">Google API</a>
                                        <a href="#v-pills-smtp" data-bs-toggle="pill" class="nav-link ">SMTP Settings </a>
                                        <a href="#v-pills-sms" data-bs-toggle="pill" class="nav-link ">SMS / OTP </a>
                                        <a href="#v-pills-payment" data-bs-toggle="pill" class="nav-link ">Payment Gateway </a>
                                        <a href="#v-pills-charge" data-bs-toggle="pill" class="nav-link ">Extra Charges</a>
                                        <a href="#v-pills-notification" data-bs-toggle="pill" class="nav-link ">Notification Settings </a>
                                        

                                    </div>
                                </div>
                             
                                
                            
                                <div class="col-sm-9">
                                    <div class="tab-content">

                                        <div id="v-pills-home" class="tab-pane fade active show">

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> App Name
                                                </label>
                                                <div class="col-lg-6">
                                                @foreach ($logo as $c )
                                                    <input name="site_title" type="text" class="form-control" value="{{$c->site_title}}">
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> App Version
                                                </label>
                                                <div class="col-lg-6">
                                                @foreach ($logo as $c )
                                                    <input name="version" type="text" class="form-control" value="{{$c->version}}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> App Description
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="site_description" type="text" class="form-control" value="{{$c->site_description}}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> App Url
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="siteurl" type="text" class="form-control" value="{{$c->siteurl}}">
                                                    <code>Dont uses '/' at the end </code>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> App Email
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="site_email" type="text" class="form-control" value="{{$c->site_email}}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Contact / Whatsapp no
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="whatsapp_no" type="text" class="form-control" value="{{$c->whatsapp_no}}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Address
                                                </label>
                                                <div class="col-lg-6">
                                                    <textarea name="address" class="form-control" cols="30" rows="10">{{$c->address}}</textarea>
                                                </div>
                                            </div>




                                        </div>


                                        <div id="v-pills-seo" class="tab-pane fade">

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Meta Keyword
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="meta_keyword" type="text" class="form-control" value="{{$c->meta_keyword}}">
                                                    <code>Uses ',' separate keywords </code>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Meta Details
                                                </label>
                                                <div class="col-lg-6">
                                                    <textarea name="meta_details" class="form-control" cols="30" rows="10">{{$c->meta_details}}</textarea>
                                                </div>
                                            </div>


                                        </div>

                                        <div id="v-pills-logo" class="tab-pane fade">

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Logo icon
                                                </label>
                                                <div class="col-lg-6">

                                                    <img class="logo-abbr" src="{{asset('storage/'. $c->min_logo)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">
                                                </label>

                                                <div class="col-lg-6">
                                                    <input name="min_logo" type="file" class="form-control">
                                                    <button name="upload_min" type="submit" class="btn btn-success btn-sm">Upload logo icon</button>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Fav icon
                                                </label>
                                                <div class="col-lg-6">
                                                    <img class="logo-compact" src="{{asset('storage/'. $c->fav_icon)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">
                                                </label>

                                                <div class="col-lg-6">
                                                    <input name="fav_icon" type="file" class="form-control">
                                                    <button name="upload_fav" type="submit" class="btn btn-success btn-sm">Upload Fav</button>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Logo
                                                </label>
                                                <div class="col-lg-6">
                                                    <img class="logo-compact" src="{{asset('storage/'. $c->logo)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">
                                                </label>

                                                <div class="col-lg-6">
                                                    <input name="logo" type="file" class="form-control">
                                                    <button name="upload_logo" type="submit" class="btn btn-success btn-sm">Upload logo</button>
                                                </div>
                                            </div>


                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> App logo
                                                </label>
                                                <div class="col-lg-6">
                                                    <img class="logo-compact" src="{{asset('storage/'. $c->app_logo)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">
                                                </label>

                                                <div class="col-lg-6">
                                                    <input name="app_logo" type="file" class="form-control">
                                                    <button name="upload_app_logo" type="submit" class="btn btn-success btn-sm">Upload App logo</button>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Web logo
                                                </label>
                                                <div class="col-lg-6">
                                                    <img class="logo-compact" src="{{asset('storage/'. $c->web_logo)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">
                                                </label>

                                                <div class="col-lg-6">
                                                    <input name="web_logo" type="file" class="form-control">
                                                    <button name="upload_web_logo" type="submit" class="btn btn-success btn-sm">Upload Web logo</button>
                                                </div>
                                            </div>





                                        </div>
                                        <div id="v-pills-google" class="tab-pane fade ">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Google Map ON/OFF
                                                </label>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-switch">
                                                        @if ($c->if_googlemap=="")
                                                        <input name="if_googlemap" class="form-check-input" value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        @else
                                                        <input name="if_googlemap" class="form-check-input" value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Google Map API Key
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="googlemap_API" type="text" class="form-control" value="{{$c->googlemap_API}}">
                                                </div>
                                            </div>


                                        </div>
                                        <div id="v-pills-smtp" class="tab-pane fade ">

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> SMTP Host
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="smtp_host" type="text" class="form-control" value="{{$c->smtp_host}}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> SMTP Port
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="smtp_port" type="text" class="form-control" value="{{$c->smtp_port}}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> SMTP Username
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="smtp_username" type="email" class="form-control" value="{{$c->smtp_username}}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> SMTP Password
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="smtp_password" type="password" class="form-control" value="{{$c->smtp_password}}">
                                                </div>
                                            </div>
               
                                        </div>
                                        <div id="v-pills-sms" class="tab-pane fade ">
                                            <code>For the better perfomance please enable any one of the sms Api once</code>
                                            <br>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Msg91 ON/OFF
                                                </label>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-switch">
                                                        @if ($c->if_msg91=="")
                                                        <input name="if_msg91" class="form-check-input" value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        @else
                                                        <input name="if_msg91" class="form-check-input" value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                                        @endif
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Msg91 API Key
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="msg91_apikey" type="text" class="form-control" value="{{$c->msg91_apikey}}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Textlocal ON/OFF
                                                </label>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-switch">
                                                        @if ($c->if_textlocal=="")
                                                        <input name="if_textlocal" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        @else
                                                        <input name="if_textlocal" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                                        @endif
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Textlocal API Key
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="textlocal_apikey" type="text" class="form-control" value="{{$c->textlocal_apikey}}">
                                                </div>
                                            </div>


                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> GreenSMS for International ON/OFF
                                                </label>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-switch">
                                                        @if ($c->if_greensms=="")
                                                        <input name="if_greensms" class="form-check-input" value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        @else
                                                        <input name="if_greensms" class="form-check-input" value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                                        @endif
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> GreenSMS API Key
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="greensms_apikey" type="text" class="form-control" value="{{$c->greensms_apikey}}">
                                                </div>
                                            </div>


                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> SMS Sender ID
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="sms_senderid" type="text" class="form-control" value="{{$c->sms_senderid}}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> SMS DLT ID
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="sms_dltid" type="text" class="form-control" value="{{$c->sms_dltid}}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> SMS Content
                                                </label>

                                                <div class="col-lg-6">
                                                    <code>Replace the verable content to {code} that is otp code</code>
                                                    <br>
                                                    <textarea name="sms_msg" id="" cols="30" rows="5" class="form-control">{{$c->sms_msg}}</textarea>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="v-pills-payment" class="tab-pane fade ">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> COD ON/OFF
                                                </label>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-switch">
                                                        @if ($c->cod_status=="")
                                                        <input name="cod_status" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        @else
                                                        <input name="cod_status" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                                        
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <br>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Bank Transter ON/OFF
                                                </label>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-switch">
                                                        @if ($c->bank_transfer_status=="")
                                                        <input name="bank_transfer_status" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        @else
                                                        <input name="bank_transfer_status" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                                        @endif
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <h4 class="card-title"> Razorpay Payment Gateway <i class="flaticon-381-fast-forward"></i> </h4>

                                            <br>
                                            <br>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Razorpay ON/OFF
                                                </label>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-switch">
                                                        @if ($c->razorpay_status=="")
                                                        <input name="razorpay_status" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        @else
                                                        <input name="razorpay_status" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                                        
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> API Key
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="razo_key_id" type="text" class="form-control" value="{{$c->razo_key_id}}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> API Secret Key
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="razo_key_secret" type="text" class="form-control" value="{{$c->razo_key_secret}}">
                                                </div>
                                            </div>

                                            <br>
                                            <br>

                                            <h4 class="card-title"> CCAvenue Payment Gateway <i class="flaticon-381-fast-forward"></i> </h4>

                                            <br>
                                            <br>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> CCAvenue ON/OFF
                                                </label>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-switch">
                                                        @if ($c->ccavenue_status=="")
                                                        <input name="ccavenue_status" class="form-check-input" value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        @else
                                                        <input name="ccavenue_status" class="form-check-input" value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                                        @endif
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Test Mode ON/OFF
                                                </label>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-switch">
                                                        @if ($c->ccavenue_testmode=="")
                                                        <input name="ccavenue_testmode" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        @else
                                                        <input name="ccavenue_testmode" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Merchant id
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="ccavenue_merchant_id" type="text" class="form-control" value="{{$c->ccavenue_merchant_id}}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Access Code
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="ccavenue_access_code" type="text" class="form-control" value="{{$c->ccavenue_access_code}}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Working key
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="ccavenue_working_key" type="text" class="form-control" value="{{$c->ccavenue_working_key}}">
                                                </div>
                                            </div>



                                        </div>
                                        <div id="v-pills-charge" class="tab-pane fade ">
                                            <h4 class="card-title">Delivery Charge <i class="flaticon-381-fast-forward"></i> </h4>
                                            <br>

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Fixed Delivery Charge ON/OFF
                                                </label>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-switch">
                                                        @if ($c->if_fixeddelivery=="")
                                                        <input name="if_fixeddelivery" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        @else
                                                        <input name="if_fixeddelivery" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Fixed Delivery Charge
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="delivery_charge" type="text" class="form-control" value="{{$c->delivery_charge}}">
                                                </div>
                                            </div>

                                            <h4 class="card-title">Handling Charge <i class="flaticon-381-fast-forward"></i> </h4>
                                            <br>

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Handling Charge ON/OFF
                                                </label>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-switch">
                                                        @if ($c->if_handlingcharge=="")
                                                        <input name="if_handlingcharge" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        @else
                                                        <input name="if_handlingcharge" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Handling Charge in %
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="handling_charge" type="text" class="form-control" value="{{$c->handling_charge}}">
                                                </div>
                                            </div>



                                        </div>
                                        <div id="v-pills-notification" class="tab-pane fade ">
                                            <h4 class="card-title">Firebase Settings <i class="flaticon-381-fast-forward"></i> </h4>
                                            <br>

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Firebase ON/OFF
                                                </label>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-switch">
                                                        @if ($c->if_firebase=="")
                                                        <input name="if_firebase" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        @else
                                                        <input name="if_firebase" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                                        @endif
                                                       
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Firebase API Key
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="firebase_API" type="text" class="form-control" value="{{$c->firebase_API}}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Firebase Config
                                                </label>
                                                <div class="col-lg-6">
                                                    <textarea name="firebase_config" cols="30" rows="10">{{$c->firebase_config}}</textarea>

                                                </div>
                                            </div>
                                            <h4 class="card-title">Onesignal Settings <i class="flaticon-381-fast-forward"></i> </h4>
                                            <br>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Onsignal ON/OFF
                                                </label>
                                                <div class="col-lg-6">
                                                    <div class="form-check form-switch">
                                                        @if ($c->if_onesignal=="")
                                                        <input name="if_onesignal" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                        @else
                                                        <input name="if_onesignal" class="form-check-input"  value="1" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> Sender id
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="onesignal_id" type="text" class="form-control" value="{{$c->onesignal_id}}">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01"> API Key
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="onesignal_key" type="text" class="form-control" value="{{$c->onesignal_key}}">
                                                </div>
                                            </div>
                                        </div>
                                      
                                    </div>

                                </div>
                                <div class="col-xl-6" style="float: right;">
                                    <button name="update" type="submit" class="btn btn-success btn-sm">Update Store</button>

                                </div>
                        </form>
                    </div>
                    @endforeach

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