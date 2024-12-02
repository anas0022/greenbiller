<!DOCTYPE html>

<html style="--animate-duration: 0.5s; --animate-delay: 0.1s; height: auto">

<head>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <!-- TABLES CSS CODE -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>POS | </title>
    <link rel="icon" type="image/png" href="">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/bootstrap.min.css') }}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/font-awesome.min.css') }}" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/ionicons.min.css') }}" />
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/select2.min.css') }}" />

    <!-- end -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/AdminLTE.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('pos_assets/css/newcustom.css') }}" />

    <!-- bootstrap date-range-picker -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/daterangepicker.css') }}" />
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/datepicker3.css') }}" />
    <!--Toastr notification -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/toastr.css') }}" />
    <!--Toastr notification end-->
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/orange.css') }}" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--Custom Css File-->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/custom.css') }}" />


    <!-- Autocomplete -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/autocomplete.css') }}" />
    <!-- Pace Loader -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/pace.min.css') }}" />
    <!-- Theme color finder -->

    <!-- jQuery 2.2.3 -->
    <!-- <script src="{{ asset('pos_assets/js/jquery-2.2.3.min.js') }}"></script> -->
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('pos_assets/css/blue.css') }}" />
    <link rel="stylesheet" href="{{ asset('pos_assets/css/pos.css') }}" />
    <!-- bootstrapicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

    <!-- sweetalert2 -->
    <!-- <script src="{{ asset('admin_assets/js/sweetalert.min.js') }}"></script>
    <link href="{{ asset('admin_assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet"> -->

    <!-- font-awesome -->
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>


</head>

<body class="skin-blue layout-top-nav " style="height: auto" cz-shortcut-listen="true">





    @if ($errors->any())
        <script>
            swal({
                title: "Error!",
                text: "{!! implode('\n', $errors->all()) !!}", // Join errors with line breaks
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


    <style>
        .underselect {
            height: 17px;
            width: 100%;
            font-size: 10px;
        }
    </style>



    <!-- /.modal-dialog -->
    </div>
    <!-- **********************MODALS***************** -->

    <!-- <div class="col-sm-3">
                                        <button type="button" id="pay_all" name="" class="btn bg-purple btnhold btn-block btn-flat btn-lg Alt_a" title="By Cash &amp; Save [Alt+A]">
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            Pay All
                                        </button>
                                    </div> -->




    </div>
    </div>
    </div>


    <div class="content-wrapper" style="min-height: 602px">

        <div class="wrapper" style="height: auto">
            <header class="main-header">
                <nav class="navbar navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="dashboard" class="navbar-brand"><b class="hidden-xs">GreenBiller</b></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">

                            <ul class="nav navbar-nav">

                                <li class="">
                                    <a href="{{ route('add_sales_biller') }}"><i
                                            class="fa fa-calculator text-yellow"></i><span> New
                                            Invoice</span></a>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav">
                                <li class="">
                                    <a href="{{ route('saleslist') }}"><i class="fa fa-list text-yellow"></i>
                                        <span>Sales
                                            List</span></a>
                                </li>


                            </ul>


                        </div>
                        <!-- /.navbar-collapse -->
                        <!-- Navbar Right Menu -->
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <!-- User Account Menu -->
                                <li class="dropdown user user-menu">
                                    <a href="javavoid:main();" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="">Hold List</span>
                                        4
                                        <span class="label label-danger hold_invoice_list_count">4</span>
                                    </a>

                                    <ul class="dropdown-menu dropdown-width-lg">
                                        <!-- Menu Body -->
                                        <li class="user-body">
                                            <div class="row">
                                                <div class="col-xs-12 text-center">
                                                    <table class="table table-bordered" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Date</th>
                                                                <th>Ref.ID</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody id="hold_invoice_list">

                                                            <tr>
                                                                <td colspan="4" class="text-danger text-center">
                                                                    No Records Found
                                                                </td>
                                                            </tr>


                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                            <!--</li>-->
                                        </li>
                                    </ul>
                                </li>

                                <!-- Messages: style can be found in dropdown.less-->
                                <li class="hidden-xs" id="fullscreen">
                                    <a><i class="fa fa-tv text-white"></i>
                                    </a>
                                </li>
                                <li class="text-center">
                                    <a href="dashboard"><i class="fa fa-dashboard text-yellow"></i><b
                                            class="hidden-xs">Dashboard</b></a>
                                </li>

                                <!-- User Account Menu -->
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ asset('pos_assets/avatar1.png') }}" class="user-image"
                                            alt="User Image" />
                                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <!-- User image -->
                                        <li class="user-header">
                                            <img src="{{ asset('pos_assets/avatar1.png') }}" class="img-circle"
                                                alt="User Image" />
                                            <p>
                                                {{ Auth::user()->name }}
                                                <!-- <small>Year 2023</small> -->
                                                <small class="text-uppercase text-bold">Role:
                                                    {{ Auth::user()->role }}</small>
                                            </p>
                                        </li>
                                        <!-- Menu Body -->
                                        <!-- Menu Footer-->
                                        <!-- <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="logout" class="btn btn-default btn-flat">Sign out</a>
                                            </div>
                                        </li> -->
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-custom-menu -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
            </header>


            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <!-- form start -->
                            <div class="modal fade" id="customer-modal" tabindex="-1">

                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header header-custom">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <label aria-hidden="true">×</label>
                                            </button>
                                            <h4 class="modal-title text-center">Edit Customer</h4>
                                        </div>

                                        <form id="customer_edit">
                                            @csrf
                                            <input type="hidden" id="id" name="id">
                                            <div class="modal-body" style="padding: 80px;">
                                                <div>
                                                    <div class="pt-4">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Customer Name<span
                                                                            class="required">*</span></label>
                                                                    <input type="text" name="customer_name"
                                                                        class="form-control form-control-sm" required
                                                                        id="customer_name">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Mobile<span
                                                                            class="required">*</span></label>
                                                                    <input type="text" name="mobile"
                                                                        class="form-control form-control-sm" required
                                                                        id="mobile">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Email</label>
                                                                    <input name="email" type="email"
                                                                        class="form-control form-control-sm"
                                                                        id="email">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">GST Number</label>
                                                                    <input type="text" name="gstin"
                                                                        class="form-control form-control-sm"
                                                                        id="gst_no">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">TAX Number</label>
                                                                    <input type="text" name="tax_number"
                                                                        class="form-control form-control-sm"
                                                                        id="tax_number">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Credit Limit</label>
                                                                    <input type="text" name="credit_limit"
                                                                        class="form-control form-control-sm"
                                                                        value="-1.000" id="credit">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Previous Due</label>
                                                                    <input type="text" name="opening_balance"
                                                                        class="form-control form-control-sm"
                                                                        value="0.000" id="previous_due">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <h4 class="card-title"
                                                                style="margin-bottom: 20px !important;">
                                                                <i class="flaticon-381-fast-forward"></i> Address
                                                                Details
                                                            </h4>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Address</label>
                                                                    <textarea name="address" id="address" class="form-control form-control-sm"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">City</label>
                                                                    <input type="text" name="city"
                                                                        id="city"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">State</label>
                                                                    <input type="text" name="state"
                                                                        id="state"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Postcode</label>
                                                                    <input type="text" name="postcode"
                                                                        id="postcode"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="country_name"
                                                                        id="countryInput">
                                                                    <label class="form-label">Country</label>
                                                                    <select name="country_id" id="countrySelect"
                                                                        class="form-control form-control-sm selectpicker"
                                                                        data-live-search="true"
                                                                        onchange="document.getElementById('countryInput').value = this.value;">
                                                                        <option id="country">-SELECT COUNTRY -
                                                                        </option>
                                                                        @foreach ($country as $c)
                                                                            <option value="{{ $c->id }}">
                                                                                {{ $c->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <h4 class="card-title"
                                                                style="margin-bottom: 20px !important;">
                                                                <i class="flaticon-381-fast-forward"></i> Shipping
                                                                Address
                                                            </h4>
                                                            <div class="col-lg-12 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Copy Address ?</label>
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input"
                                                                            type="checkbox" role="switch"
                                                                            id="same" name="same"
                                                                            onchange="sameasabove()">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Address</label>
                                                                    <textarea name="address_shipping" id="address_shipping" class="form-control form-control-sm"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">City</label>
                                                                    <input type="text" name="city_shipping"
                                                                        id="city_shipping"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">State</label>
                                                                    <input type="text" name="state_shipping"
                                                                        id="state_shipping"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Postcode</label>
                                                                    <input type="text" name="postcode_shipping"
                                                                        id="postcode_shipping"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="shipping_country"
                                                                        id="scountryInput">
                                                                    <label class="form-label">Country</label>
                                                                    <select name="country_id_shipping"
                                                                        id="scountrySelect"
                                                                        class="form-control form-control-sm selectpicker"
                                                                        data-live-search="true"
                                                                        onchange="document.getElementById('scountryInput').value = this.value;">
                                                                        <option id="ship_country">-SELECT COUNTRY-
                                                                        </option>
                                                                        @foreach ($country as $c)
                                                                            <option value="{{ $c->id }}">
                                                                                {{ $c->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            function sameasabove() {
                                                                if (document.getElementById("same").checked) {
                                                                    document.getElementById("address_shipping").value = document.getElementById("address").value;
                                                                    document.getElementById("city_shipping").value = document.getElementById("city").value;
                                                                    document.getElementById("state_shipping").value = document.getElementById("state").value;
                                                                    document.getElementById("postcode_shipping").value = document.getElementById("postcode").value;
                                                                    document.getElementById("scountryInput").value = document.getElementById("countryInput").value;
                                                                } else {
                                                                    document.getElementById("address_shipping").value = "";
                                                                    document.getElementById("city_shipping").value = "";
                                                                    document.getElementById("state_shipping").value = "";
                                                                    document.getElementById("postcode_shipping").value = "";
                                                                    document.getElementById("scountryInput").value = "";
                                                                }
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="pt-4">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Price Level Type</label>
                                                                    <script>
                                                                        function pricelevel() {
                                                                            document.getElementById("pricelevelInput").value = document.getElementById('pricelevelSelect').value;
                                                                        }
                                                                    </script>
                                                                    <input type="text"
                                                                        name="price_level_type_value"
                                                                        id="pricelevelInput">
                                                                    <select name="price_level_type"
                                                                        id="pricelevelSelect"
                                                                        class="form-control form-control-sm selectpicker"
                                                                        data-live-search="true"
                                                                        onchange="pricelevel()">
                                                                        <option value="" id="price_level">
                                                                        </option>
                                                                        <option value="Increase" data-tokens="0">
                                                                            Increase</option>
                                                                        <option value="Decrease" data-tokens="1">
                                                                            Decrease</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="form-group">
                                                                    <label class="form-label">Price Level</label>
                                                                    <input type="text" name="price_level"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>

                                        </form>

                                        <!-- edit customer -->


                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->

                            </div>






                            <form method="POST" action="{{ route('return.sale.mass') }}" class="form-horizontal">


                                @csrf

                                <div class="modal fade" id="discount-modal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title">Set Discount on All</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="discount_to_all_input">Discount</label>
                                                                <input type="text" class="form-control"
                                                                    id="discount_to_all_amt"
                                                                    name="discount_to_all_amt" placeholder=""
                                                                    value="0" oninput="alldiscout()" />


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="discount_type">Discount Type</label>
                                                                <select class="form-control" id="discount_to_all_type"
                                                                    name="discount_to_all_type"
                                                                    onchange="alldiscout()">
                                                                    <option value="Percentage" selected="selected">
                                                                        Percentage%
                                                                    </option>
                                                                    <option value="in_fixed">Fixed</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary discount_update"
                                                    data-dismiss="modal">
                                                    Apply
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="modal fade" id="terms-modal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title">Terms &amp; Conditions</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <textarea class="form-control" id="invoice_terms" name="invoice_terms"
                                                                    placeholder="Enter Invoice Terms and Conditions"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                    Add
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                                <div class="modal fade" id="hold-modal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title">Hold Invoice ?</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h1>Same Reference will replace the old list if exist!!</h1>
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    name="hold_reference_no" id="hold_reference_no"
                                                                    placeholder="Please Enter Reference Number!">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="submit" name="hold_pos" class="btn btn-danger">
                                                    OK
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                                <!-- Hold invoice End -->
                                <!-- models end -->


                                <div class="box-body">
                                    <!-- Store Code -->

                                    <!-- Store Code end -->

                                    <div class="row">



                                        <div class="col-md-6">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-group" data-toggle="tooltip" title=""
                                                        data-original-title="Warehouse">
                                                        <span class="input-group-addon"><i
                                                                class="fa fa-building text-red"></i></span>
                                                        <select id="store_select" name="store_id"
                                                            class="form-control selectpicker " data-live-search="true"
                                                            required onchange="store()">
                                                            
                                                            <option value="">Select Store</option>
                                                            @foreach ($stores as $store)
                                                                <option value="{{ $store->id }}">
                                                                    {{ $store->store_name }}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>

                                                </div>

                                            </div>




                                        </div>

                                        <div class="col-md-2">
                                            <input type="text" class="form-control" data-toggle="tooltip"
                                                title="" placeholder="Prefix" id="sale_code"
                                                name="return_prefix" value="SRB2024-25" readonly />
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" data-toggle="tooltip"
                                                title="" placeholder="Invioce Number" id="sale_code"
                                                name="sale_code" value="{{ $saleCode }}" readonly />
                                        </div>
                                    </div>
                                    <script>
                                        function handleSelectChange(value) {
                                            store();
                                            notax(value);
                                        }
                                    </script>

                                    <script>
                                        function notax(value) {
                                            const checkbox = document.getElementById('tax_report');
                                            if (value === "2") {
                                                checkbox.checked = false; // Checked when value is 2
                                            } else {
                                                checkbox.checked = true; // Unchecked otherwise
                                            }
                                        }
                                    </script>

                                    <br />

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group" data-toggle="tooltip" title=""
                                                data-original-title="Customer">
                                                <span class="input-group-addon pointer" data-toggle="modal"
                                                    data-target=""><i
                                                        class="fa fa-user-plus text-primary fa-lg"></i></span>

                                              
                                                    <select class="form-control select2"
                                                    id="customer_select" 
                                                    name="customer_id" 
                                                    style="width: 100%"  data-search="true">
                                                    <option value="">Select Customer</option>
                                                    @if ($customers)
                                                        @foreach ($customers as $customer)
                                                            <option value="{{ $customer->id }}">
                                                                {{ $customer->id }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>

                                                <span id="customer_edit_modal" class="input-group-addon pointer"
                                                    onclick="showedit();" data-target="#customer_edit_modal"><i
                                                        class="fa fa-user-edit text-primary fa-lg"
                                                        data-toggle="modal"></i></span>
                                            </div>

                                            <script>
                                                $(document).ready(function() {
                                                    // Prevent customer selection before store selection
                                                    $('#customer_select').on('focus', function(e) { // Use 'focus' instead of 'click' to ensure it triggers
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

                                                    // Store selection change handler
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
                                                                        // Show SweetAlert if no customers found
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
                                                                                value.id + '">' +
                                                                                value.customer_name + '</option>');
                                                                        });
                                                                    }
                                                                },
                                                                error: function(xhr, status, error) {
                                                                    // Show error alert if AJAX request fails
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
                                                        }
                                                    });
                                                });
                                            </script>



                                            <script>
                                                function showedit() {
                                                    // Get the selected option element
                                                    var selectElement = document.getElementById('customer_id');
                                                    var customer_id = selectElement.value;


                                                    var customer_name = selectElement.options[selectElement.selectedIndex].getAttribute('data-name');
                                                    var mobile = selectElement.options[selectElement.selectedIndex].getAttribute('data-mobile');
                                                    var email = selectElement.options[selectElement.selectedIndex].getAttribute('data-email');
                                                    var gst_no = selectElement.options[selectElement.selectedIndex].getAttribute('data-gst_number');

                                                    var credit = selectElement.options[selectElement.selectedIndex].getAttribute('data-credit');
                                                    var pre_due = selectElement.options[selectElement.selectedIndex].getAttribute('data-previous_due');
                                                    var address = selectElement.options[selectElement.selectedIndex].getAttribute('data-address');
                                                    var city = selectElement.options[selectElement.selectedIndex].getAttribute('data-city');
                                                    var state = selectElement.options[selectElement.selectedIndex].getAttribute('data-state');
                                                    var country = selectElement.options[selectElement.selectedIndex].getAttribute('data-country');
                                                    var ship_country = selectElement.options[selectElement.selectedIndex].getAttribute('data-ship_country');
                                                    var ship_state = selectElement.options[selectElement.selectedIndex].getAttribute('data-ship_state');
                                                    var ship_postcode = selectElement.options[selectElement.selectedIndex].getAttribute('data-ship_postcode');
                                                    var tax_number = selectElement.options[selectElement.selectedIndex].getAttribute('data-tax_number');
                                                    var price_level_type = selectElement.options[selectElement.selectedIndex].getAttribute('data-pricelevel_type');
                                                    var price_level = selectElement.options[selectElement.selectedIndex].getAttribute('data-price_level');


                                                    if (customer_id === '') {
                                                        swal("Warning!", "Please select a customer", "warning");
                                                    } else {
                                                        $("#customer-modal").modal();
                                                    }
                                                    document.getElementById('id').value = customer_id;
                                                    document.getElementById('customer_name').value = customer_name;
                                                    document.getElementById('mobile').value = mobile;
                                                    document.getElementById('email').value = email;
                                                    document.getElementById('gst_no').value = gst_no;
                                                    document.getElementById('tax_number').value = tax_number;
                                                    document.getElementById('credit').value = credit;
                                                    document.getElementById('previous_due').value = pre_due;
                                                    document.getElementById('address').value = address;
                                                    document.getElementById('state').value = state;
                                                    document.getElementById('country').innerText = country;
                                                    document.getElementById('ship_address').value = ship_country;
                                                    document.getElementById('ship_state').value = ship_state;
                                                    document.getElementById('ship_postcode').value = ship_postcode;
                                                    document.getElementById('price_level_type').value = price_level_type;
                                                    document.getElementById('price_level').value = price_level;

                                                }
                                            </script>
                                            <div class="form-group" style="margin-bottom:0px !important;">

                                                <label for="staticEmail" class="col-sm-4 col-form-label"
                                                    style="padding-top: 6px; color:red;" id="prevdue"></label>

                                                <label for="staticEmail" class="col-sm-4 col-form-label"
                                                    style="padding-top: 6px; color:green;" id="creditlmt"></label>

                                                <input type="text" name="customer_credit_limit"
                                                    id="customer_credit_limit" hidden>
                                            </div>


                                            <script>
                                                function customercheck() {
                                                    var customer_id = document.getElementById('customer_id').value;
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

                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group" data-toggle="tooltip" title=""
                                                data-original-title="Select Items">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="date" class="form-control ui-autocomplete-input"
                                                    name="sales_date" id="dateInput" value="{{ date('Y-m-d') }}" />

                                            </div>
                                        </div>



                                    </div>
                                    <br />
                                    <!-- row end -->
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="input-group" data-toggle="tooltip" title=""
                                                data-original-title="Select Items">
                                                <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                                <span role="status" aria-live="polite"
                                                    class="ui-helper-hidden-accessible"></span>
                                                <input type="text" class="form-control ui-autocomplete-input"
                                                    placeholder="Item name/Barcode/Itemcode" id="search"
                                                    autocomplete="off" oninput="searchitem()"
                                                    onkeypress="return (event.key!='Enter')" />
                                                <span class="input-group-addon pointer show_item_service"
                                                    title="New Item?" data-toggle="modal"
                                                    data-target="#add-item-model"><i
                                                        class="fa fa-plus text-primary fa-lg"></i></span>
                                            </div>



                                            <div class="dropdown-menu" id="search_rapper" style="min-width: 95%;">
                                            </div>
                                            <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content ui-corner-all"
                                                id="ui-id-1" tabindex="0"
                                                style="display: none; top: 40%; left: 3%;  width: 95%;">
                                            </ul>

                                            <div class="form-group">
                                                <br>
                                                <label class="form-label">Tax Report</label>

                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="tax_report" name="tax_report" value="1" checked>
                                                <label class="form-label">Show Part</label>

                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="show_part" name="show_part" value="1" checked>

                                            </div>

                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group" data-toggle="tooltip" title=""
                                                data-original-title="Customer">


                                                <span class="input-group-addon"><i class="fa fa-info"></i></span>
                                                <select name="sale_prefix" id="bill_no"
                                                    class="form-control selectpicker">
                                                    <option value="">-Select Bill-</option>
                                                    @foreach ($prefix as $bill)
                                                        <option value="{{ $bill }}">{{ $bill }}
                                                        </option>
                                                    @endforeach
                                                </select>

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

                                                                    // Update the cloned element
                                                                    newInput.find('.prefix-group').attr('id', 'prefix-group-' + inputCount);
                                                                    newInput.find('.prefix-input')
                                                                        .attr('id', 'prefix_' + inputCount)
                                                                        .val(prefix)
                                                                        .attr('data-sale-id', saleId); // Store sale ID with the input
                                                                    newInput.find('.delete-prefix').attr('onclick', 'removePrefix(' + inputCount + ')');

                                                                    // Add to container
                                                                    $('.prefix-container').append(newInput);

                                                                    // Store the sale ID in a hidden input if needed
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

                                                        // Remove the prefix group wrapper
                                                        if (prefixGroup.length) {
                                                            prefixGroup.closest('.prefix-group-wrapper').remove();
                                                        }

                                                        // Remove all rows from the table that match this prefix
                                                        $('#purchase_table tr.item-row').each(function() {
                                                            if ($(this).data('prefix') === removedPrefix) {
                                                                $(this).remove();
                                                            }
                                                        });

                                                        // Recalculate totals
                                                        let totalQty = 0;
                                                        let totalAmount = 0;

                                                        // Sum up remaining quantities
                                                        $('input[name="sales_qty[]"]').each(function() {
                                                            totalQty += parseFloat($(this).val()) || 0;
                                                        });

                                                        // Sum up remaining amounts
                                                        $('input[name="total_amount[]"]').each(function() {
                                                            totalAmount += parseFloat($(this).val()) || 0;
                                                        });

                                                        // Update total displays
                                                        $('#totalitemqty').val(totalQty);
                                                        $('#subtotal_amt').val(totalAmount.toFixed(3));

                                                        // Trigger other calculations
                                                        total_sum();
                                                        alldiscout();
                                                        totalamtsum();
                                                    }
                                                </script>





                                            </div>




                                        </div>


                                    </div>

                                    <script>
                                        function saletype() {
                                            var sale_type = document.getElementById('sales_type').value;

                                            if (sale_type == 1) {

                                                document.getElementById('tax_report').checked = false;
                                            } else {
                                                document.getElementById('tax_report').checked = true;
                                            }
                                        }
                                    </script>

                                    <input type="hidden" name="sales_types" id="sales_type" value="1"
                                        oninput="saletype()">
                                    <input type="hidden" name="sale_id" id="sale_id">
                                    <script>
                                        $(document).ready(function() {
                                            $('#customer_select').on('change', function() {
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
                                                                        'data-sale-id="' + sale.id + '">' +
                                                                        sale.prefix + '/' + sale.sales_code +
                                                                        '</option>'
                                                                    );
                                                                });
                                                            } else {
                                                                // Show sweet alert when no bills are found
                                                                swal({
                                                                    title: "No Bills Found!",
                                                                    text: "This customer has no bills available for return.",
                                                                    icon: "warning",
                                                                    button: "OK",
                                                                });
                                                            }
                                                        },
                                                        error: function(xhr, status, error) {
                                                            // Handle AJAX errors
                                                            swal({
                                                                title: "Error!",
                                                                text: "Failed to fetch customer bills. Please try again.",
                                                                icon: "error",
                                                                button: "OK",
                                                            });
                                                        }
                                                    });
                                                } else {
                                                    $('#bill_no').empty();
                                                    $('#bill_no').append('<option value="">-select-</option>');
                                                    $('#sales_type').val('');
                                                    $('#sales_code').val('');
                                                }
                                            });

                                            $('#bill_no').on('change', function() {
                                                var selectedOption = $(this).find('option:selected');
                                                var saleId = selectedOption.data('sale-id');
                                                var saleType = selectedOption.data('sales-type');
                                                document.getElementById('sale_id').value = saleId;
                                                document.getElementById('sales_type').value = saleType;
                                            });
                                        });
                                    </script>





                                </div>
                                <!-- row end -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-12"
                                                style="overflow-y: auto;height: 270.4px;border: 1px solid rgb(51, 122, 183);">
                                                <table
                                                    class="table table-condensed table-bordered table-responsive items_table"
                                                    id="purchase_table">
                                                    <thead class="bg-gray">
                                                        <tr>
                                                            <th width="20%">Item Name</th>
                                                            <th width="10%">Quantity</th>
                                                            <th width="8%">Unit</th>
                                                            <th width="10%">Rate(inc.of.tax)</th>
                                                            <th width="10%">Price/Unit</th>
                                                            <th width="8%">Discount</th>
                                                            <th width="8%">Tax</th>
                                                            <th width="8%">TaxAmount</th>
                                                            <th width="8%">MRP</th>
                                                            <th width="15%">TotalAmount</th>
                                                            <th width="8%">
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style=" font-size: 16px;font-weight: bold;overflow: scroll;"
                                                        id="item-results">



                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- SMS Sender while saving -->



                                    <div class="col-md-2">

                                        <label class="fa fa-pencil-square-o cursor-pointer"
                                            title="Edit Invoice T&amp;C" data-toggle="modal"
                                            data-target="#terms-modal"></label>



                                        T&amp;C
                                        </label>
                                    </div>
                                </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer bg-gray">
                            <div class="row">
                                <div class="col-md-2 text-right">
                                    <label> Quantity:</label><br />

                                    <input type="text" id="totalitemqty" name="total_qty"
                                        class="form-control form-control-sm" readonly
                                        style="background-color: #ddd; font-size:18px !important; text-align:right"
                                        value="0">

                                </div>
                                <div class="col-md-2 text-right">
                                    <label>Subtotal Amount:</label> <br />

                                    <span style="font-size: 19px" class="tot_amt text-bold"
                                        id="subtotal_amt-s"></span>
                                    <input type="text" id="subtotal_amt" name="subtotal"
                                        class="form-control form-control-sm" readonly
                                        style="background-color: #ddd; font-size:18px !important; text-align:right"
                                        oninput="totalamtsum()" value="0">

                                </div>

                                <div class="col-md-2 text-right">
                                    <label>Other Charges: <a class="fa fa-pencil-square-o cursor-pointer"
                                            data-toggle="modal" data-target="#othercharge-modal"></a></label>
                                    <br />

                                    <input type="text" id="other_charges_amt" name="other_charge"
                                        class="form-control form-control-sm" readonly
                                        style="background-color: #ddd; font-size:18px !important; text-align:right"
                                        oninput="totalamtsum()" value="0">


                                </div>

                                <div class="modal fade" id="othercharge-modal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true"></span>
                                                </button>
                                                <h4 class="modal-title">Set Other Charges</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="discount_input">Other
                                                                    Charge</label>
                                                                <input name="other_charges_input"
                                                                    id="other_charges_input" type="text"
                                                                    class="form-control form-control-sm"
                                                                    oninput="othercharge()" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="discount_type">Tax</label>
                                                                <input type="hidden" name="tax" id="taxInput">
                                                                <select name="othercharges_tax_id"
                                                                    id="othercharges_tax_id"
                                                                    class="form-control selectpicker"
                                                                    data-live-search="true" onchange="othercharge()">

                                                                    <option value="">No Tax</option>
                                                                    @foreach ($tax as $t)
                                                                        <option value="{{ $t->id }}"
                                                                            data-percentage="{{ $t->per }}">
                                                                            {{ $t->taxname }}
                                                                        </option>
                                                                    @endforeach
                                                                    <input type="hidden" name="tax_amount"
                                                                        id="tax-percentage" placeholder="Tax Amount"
                                                                        readonly>
                                                                </select>

                                                                <input type="hidden" name="tax_type" id=""
                                                                    value="inclusive">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="button" class="btn btn-primary discount_update"
                                                    data-dismiss="modal">
                                                    Update
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-3 text-right">
                                    <label>Total Discount: <a class="fa fa-pencil-square-o cursor-pointer"
                                            data-toggle="modal" data-target="#discount-modal"></a>
                                    </label><br />

                                    <span style="font-size: 19px" class="tot_disc text-bold"></span>

                                    <input type="text" id="total_discount_amt" name="total_discount_amt"
                                        class="form-control form-control-sm" readonly
                                        style="background-color: #ddd; font-size:18px !important; text-align:right"
                                        value="0">
                                </div>
                                <div class="col-md-3 text-right">
                                    <label> Total Amount:</label> <br />

                                    <span style="font-size: 19px" class="tot_grand text-bold"></span>

                                    <input type="text" id="grand_total" name="grand_total"
                                        class="form-control form-control-sm" readonly
                                        style="background-color: #ddd; font-size:18px !important; text-align:right"
                                        value="0">

                                </div>
                            </div>

                            <div class="row" style="margin-top: 10px !important;">
                                <div class="col-md-12 text-right">

                                    <div class="col-sm-3" style="float: right;">
                                        <button type="submit"
                                            class="btn btnhold btn-success btn-block btn-flat btn-lg Alt_c"
                                            title="By Cash &amp; Save [Alt+C]" data-toggle="modal"
                                            data-target="#cash-payments-modal">
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            Return Bill
                                        </button>
                                    </div>






                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (left) -->

        </div>
        <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->








    <!-- SOUND CODE -->
    <!-- Notification sound -->





    <audio id="success">
        <source src="pos_assets/success.mp3" type="audio/mpeg" />
        <source src="pos_assets/success.ogg" type="audio/ogg" />
    </audio>
    <audio id="failed">
        <source src="pos_assets/failed.mp3" type="audio/mpeg" />
        <source src="pos_assets/failed.ogg" type="audio/ogg" />
    </audio>

    <script>
        function playsuccess() {
            document.getElementById("success").play();
        }

        function playfailed() {
            document.getElementById("failed").play();
        }
    </script>



    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>POWERED BY <a href="https://greencreon.com">GREENCREON</a> </b>
        </div>
        <strong>Copyright © Green Biller</strong>
    </footer>
    <!-- Control Sidebar -->
    </div>
    <!-- ./wrapper -->





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // AJAX form submission
            $('#saleform').on('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission
                var formData = $(this).serialize(); // Get form data

                $.ajax({
                    url: '{{ route('addsale') }}',
                    method: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include CSRF token
                    },
                    success: function(response) {
                        if (response.success) {
                            $('html').html(response
                                .view); // Replace body content with the new view
                        }
                    },
                    error: function(xhr) {
                        alert('Something went wrong');
                    }
                });
            });
        });
    </script>


    <script>
        function searchitem() {
            const search = document.getElementById("search").value;
            const sale_id = document.getElementById("sale_id").value;
            const sale_type = document.getElementById("sales_type").value;

            // Debug logs
            console.log('Search Parameters:', {
                search: search,
                sale_id: sale_id,
                sale_type: sale_type
            });

            if (!sale_id) {
                swal("Warning!", "Please select a bill first", "warning");
                return;
            }

            const searchResults = document.getElementById("ui-id-1");

            if (!search) {
                searchResults.style.display = "none";
                return;
            }

            searchResults.style.display = "block";
            searchResults.innerHTML = `<div class="alert alert-info m-2" role="alert">
    <i class="fa fa-spinner fa-spin"></i> Searching...
</div>`;

            // Add CSRF token to headers
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: "{{ route('get.sale.items') }}",
                data: {
                    search: search,
                    sales_ids: sale_id,
                    sales_types: sale_type
                },
                dataType: 'json',
                success: function(response) {
                    console.log('Success Response:', response);
                    searchResults.innerHTML = "";

                    if (!response.data || response.data.length === 0) {
                        searchResults.innerHTML =
                            '<li class="ui-menu-item"><a class="ui-corner-all">No items found</a></li>';
                        return;
                    }

                    response.data.forEach(function(item) {
                        console.log('Processing item:', item);
                        const li = document.createElement('li');
                        li.className = 'ui-menu-item';
                        li.innerHTML = `
                            <a href="javascript:void(0)" 
                               onclick="additem(
                                   '${item.item_id}', 
                                   '${item.sales_qty}', 
                                   '${item.unit_id}', 
                                   '${item.rate_inclusive_tax}', 
                                   '${item.price_per_unit}', 
                                   '${item.discount_amt}', 
                                   '${item.tax_amt}', 
                                   '${item.mrp}', 
                                   '${item.total_cost}'
                               )" 
                               class="ui-corner-all">
                                ${item.item_name} [ ${item.part_no || ''} ] - Qty: ${item.sales_qty}
                            </a>`;
                        searchResults.appendChild(li);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', {
                        status: xhr.status,
                        statusText: xhr.statusText,
                        responseText: xhr.responseText,
                        error: error
                    });

                    let errorMessage = 'Failed to fetch items';
                    try {
                        const response = JSON.parse(xhr.responseText);
                        errorMessage = response.message || errorMessage;
                    } catch (e) {
                        console.error('Error parsing response:', e);
                    }

                    searchResults.innerHTML =
                        `<li class="ui-menu-item"><a class="ui-corner-all">Error: ${errorMessage}</a></li>`;
                    swal("Error!", errorMessage, "error");
                }
            });
        }



        function additem(item_id, sales_qty, unit_id, rate_inclusive_tax, price_per_unit, discount_amt, tax_amt, mrp,
            total_cost) {

            document.getElementById("ui-id-1").style.display = "none";
            document.getElementById("search").value = "";

            $.ajax({
                type: "GET",
                url: "{{ route('add-item') }}",
                data: {
                    item_id: item_id
                },
                success: function(response) {
                    var data = JSON.stringify(response);

                    response.forEach(function(data) {

                        var count = $(".itemRow").length;
                        var htmlRows = "";
                        htmlRows += `<tr class="item-row" data-prefix="${$('#bill_no').val()}">`;



                        htmlRows += '<td><input name="item_id[]" type="hidden" id="item_id_' +

                            count +
                            '" class="form-control form-control-sm itemRow" value="' +
                            data.id +
                            '"> ' +
                            data.item_name + ' <input type="hidden" value="' + data.item_name +
                            '" name="item_name[]"> <input type="hidden" value="' + data.hsn_code +
                            '" name="hsn_code[]"> <input type="hidden" value="' + data.part_no +
                            '" name="part_no[]"> </td>';

                        htmlRows +=
                            '<td> <div class="input-group input-group-sm"><span class="input-group-btn"> <button type="button" onclick="decrement_qty(1,' +
                            count +
                            ')" class="btn btn-default btn-flat"><i class="fa fa-minus text-danger"></i></button></span> <input name="sales_qty[]" type="text" id="qty_' +
                            count + '" class="form-control no-padding text-center min_width" value="' +
                            sales_qty + '" name="sale_qty_' + count +
                            '">  <span class="input-group-btn">  <button type="button" onclick="increment_qty(1,' +
                            count +
                            ')" class="btn btn-default btn-flat"><i class="fa fa-plus text-success"></i> </button>  </span> </div> </td>';
                        htmlRows += '<td>';

                        // Unit ID exists in the data, pre-select the option in the dropdown
                        htmlRows += '<select class="form-control form-control-sm"  name="unit_id[]" >';
                        htmlRows += '<option value="">select</option>';
                        @foreach ($unit as $unitvalue)
                            htmlRows += '<option value="{{ $unitvalue->id }}" ' +
                                'data-name="{{ $unitvalue->unit_name }}" ' +
                                // Check if this unit matches the passed unit_id
                                ({{ $unitvalue->id }} == unit_id ? 'selected' : '') +
                                '>{{ $unitvalue->unit_name }}</option>';
                        @endforeach
                        htmlRows += '</select>';
                        htmlRows += '</td>';

                        htmlRows +=
                            '<td> <input name="rate_inc_tax[]" id="rate_inc_tax_' +
                            count +
                            '" type="text" class="form-control form-control-sm" value="' +
                            rate_inclusive_tax + '" oninput="cal_division(' + count + ')"></td>';

                        htmlRows +=
                            '<td> <input name="purchase_price[]" id="purchase_price_' +
                            count +
                            '" type="text"  oninput="update_calculation(' +
                            count +
                            ')" class="form-control form-control-sm" value="' +
                            price_per_unit +
                            '"></td>';
                        htmlRows += '<td> <input name="discount_amt[]" id="discount_' + count +
                            '" type="text" oninput="cal_division(' + count +
                            ')" class="form-control form-control-sm" value="' + discount_amt +
                            '"><select class="underselect" name="item_discount_type[]" id="item_discount_type_' +
                            count + '" onchange="cal_division(' + count +
                            ')"><option value="percent">Percent</option><option value="fixed">Fixed</option></select></td>';
                        htmlRows += '<td>';

                        // Tax ID does not exist, show the select dropdown
                        htmlRows += '<select name="tax_id[]" id="taxid_' + count +
                            '" class="form-control form-control-sm" onchange="calculatetax(' + count +
                            ');">';
                        htmlRows += '<option value="">select</option>';
                        @foreach ($tax as $taxvalue)
                            htmlRows += '<option ';
                            if (data['tax_id'] == {{ $taxvalue->id }}) {
                                htmlRows += 'selected ';
                            }
                            htmlRows +=
                                'value="{{ $taxvalue->id }}" data-id="{{ $taxvalue->per }}">{{ $taxvalue->taxname }}</option>';
                        @endforeach
                        htmlRows += '</select>';
                        htmlRows += '<input type="text"  id="taxInput_' + count + '"  value="' + data[
                            'tax_id'] + '" hidden>';

                        htmlRows += '</td>';
                        htmlRows +=
                            '<td> <input name="tax_amt[]" id="tax_amt_' +
                            count +
                            '" type="text" class="form-control form-control-sm" value="' + tax_amt +
                            '" readonly style="background-color: #ddd;"></td>';

                        htmlRows +=
                            '<td><input type="text" id="mrp_' +
                            count +
                            '" value="' +
                            mrp +
                            '" name="mrp[]" class="form-control form-control-sm"></td>'

                        htmlRows +=
                            '<td> <input name="total_amount[]" id="total_amount_' +
                            count +
                            '" type="text" class="form-control form-control-sm total" value="' +
                            total_cost +
                            '" readonly style="background-color: #ddd;" oninput="total_sum()" ></td>';

                        htmlRows +=
                            '<td> <button onclick="delete_row(' +
                            count +
                            ')" type="button" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button></td></tr>';

                        $("#purchase_table").append(htmlRows);
                        document.getElementById("totalitemqty").value = (parseFloat(count) + 1);
                        document.getElementById('totalitemqty_1').value = (parseFloat(count) + 1);
                        totalamtsum()
                        calculatingtax(count);
                        itemTotal(count);
                        total_sum();
                        alldiscout();
                        removePrefix();

                    });
                },
            });

        }









        //delecting a row in table
        function delete_row(count) {

            var delcol = (parseFloat(count) + 1)
            document.getElementById("purchase_table").deleteRow(delcol);
            var count = $(".itemRow").length;
            var totalitemqty = parseFloat(count) - 1;
            document.getElementById("totalitemqty").innerHTML = totalitemqty;
            document.getElementById("totalitemqty").innerHTML = totalitemqty;
            cal_division(count);
            total_sum();
            alldiscout();
        }

        //increacing quantity
        function increment_qty(value, count) {
            var qty = document.getElementById("qty_" + count).value;
            document.getElementById("qty_" + count).value = parseFloat(qty) + value;
            cal_division(count);
            totalamtsum();
            calculatingtax(count);
            itemTotal(count);
            update_calculation(count);
            total_sum();
            alldiscout();



        }
        //decrecing quantity
        function decrement_qty(value, count) {
            var qty = document.getElementById("qty_" + count).value;
            if (qty != 0) {
                document.getElementById("qty_" + count).value = parseFloat(qty) - value;
                cal_division(count);
                totalamtsum();
                calculatingtax(count);
                itemTotal(count);
                update_calculation(count);
                total_sum();
                alldiscout();
            }

        }

        function cal_division(counts) {
            var amt_inc_tax = document.getElementById("rate_inc_tax_" + counts).value;
            var taxid = document.getElementById("taxid_" + counts);
            var taxoption = taxid.options[taxid.selectedIndex];
            var taxvalue = taxoption.getAttribute('data-id');

            var qty = document.getElementById("qty_" + counts).value;
            var purchase_price = (parseFloat(amt_inc_tax) * 100) / (100 + parseFloat(taxvalue));
            document.getElementById("purchase_price_" + counts).value = purchase_price;



            calculatingtax(counts);
            itemTotal(counts);
            total_sum();
            totalamtsum();
            alldiscout();

        }

        function calculatetax(counts) {
            calculatingtax(counts);
            itemTotal(counts);
            total_sum();
            totalamtsum();
            alldiscout();
        }

        function calculatingtax(counts) {
            var taxid = document.getElementById("taxid_" + counts);
            var taxoption = taxid.options[taxid.selectedIndex];
            var taxvalue = taxoption.getAttribute('data-id');
            var qty = document.getElementById("qty_" + counts).value;
            var purchase_price = document.getElementById("purchase_price_" + counts).value;
            var taxamt = ((parseFloat(purchase_price) * parseFloat(qty)) * parseFloat(taxvalue)) / 100
            document.getElementById("tax_amt_" + counts).value = taxamt;
            itemTotal(counts);
            alldiscout();
            total_sum();
            totalamtsum();

        }


        function itemTotal(count) {

            // alert('haii');
            var qty = document.getElementById("qty_" + count).value;
            var purchase_price = document.getElementById("purchase_price_" + count).value;
            var taxamt = document.getElementById("tax_amt_" + count).value;
            var discount = document.getElementById("discount_" + count).value;
            var item_discount_type = document.getElementById("item_discount_type_" + count).value;
            if (item_discount_type == 'percent') {
                var discount_amt = ((parseFloat(purchase_price) * parseFloat(discount)) / 100);
            } else {
                var discount_amt = discount;
            }
            var itemtotalamt = (((parseFloat(purchase_price) * parseFloat(qty)) + parseFloat(taxamt))) - parseFloat(
                discount_amt);
            document.getElementById("total_amount_" + count).value = itemtotalamt.toFixed(3);
            total_sum();
            alldiscout();
            totalamtsum();
        }


        // geting total sum
        function total_sum() {
            // alert('haii');
            var result = document.getElementById("subtotal_amt");
            var item_total,
                i = 0,
                total = 0;
            while ((item_total = document.getElementById("total_amount_" + i++))) {
                item_total.value = item_total.value.replace(/\\D/, "");
                total = total + parseFloat(item_total.value);
            }
            result.value = total;
            //alert(total);
            document.getElementById("grand_total").value = total;
            //document.getElementById("subtotal_amt-s").innerHTML = total;
            document.getElementById("subtotal_amt").value = total;
            //totaldicount();
            alldiscout();
        }



        function othercharge() {

            var other_charges_input = document.getElementById("other_charges_input").value;
            document.getElementById("other_charges_amt").value = other_charges_input;
            var othercharges_tax_id = document.getElementById("othercharges_tax_id").value;
            var othercharges_tax_id = document.getElementById("othercharges_tax_id");
            var otherchargeoption = othercharges_tax_id.options[othercharges_tax_id.selectedIndex];
            var othertaxvalue = otherchargeoption.getAttribute('data-percentage');

            if (other_charges_input != "") {
                var tax_amt = ((other_charges_input * othertaxvalue) / 100);
                var other_charges_amt = parseFloat(other_charges_input) + parseFloat(tax_amt);
                document.getElementById("other_charges_amt").value = other_charges_amt;

                total_sum();

            } else {
                //document.getElementById("total_amt").value = 0;
                var subtotal_amt = document.getElementById("subtotal_amt").value;
                document.getElementById("total_amt").value = subtotal_amt;
                total_sum();
            }

            alldiscout();
            totalamtsum();
        }


        function alldiscout() {



            var discount_to_all_input = document.getElementById("discount_to_all_amt").value;
            document.getElementById("total_discount_amt").value = discount_to_all_input;
            var discount_to_all_type = document.getElementById("discount_to_all_type").value;

            // alert(discount_to_all_type);

            if (discount_to_all_type == 'Percentage') {
                var subtotal_amt = document.getElementById("subtotal_amt").value;
                var discount_peramt = ((subtotal_amt * discount_to_all_input) / 100);
                document.getElementById("total_discount_amt").value = parseFloat(discount_peramt);
                var subtotal_amt = document.getElementById("subtotal_amt").value;
                var other_charges_amt = document.getElementById("other_charges_amt").value;
                var total_amt = (parseFloat(subtotal_amt) + parseFloat(other_charges_amt)) - parseFloat(discount_peramt)
                document.getElementById("grand_total").value = total_amt;
            } else {
                document.getElementById("total_discount_amt").value = discount_to_all_input;
                var subtotal_amt = document.getElementById("subtotal_amt").value;
                var other_charges_amt = document.getElementById("other_charges_amt").value;
                var total_amt = (parseFloat(subtotal_amt) + parseFloat(other_charges_amt)) - parseFloat(
                    discount_to_all_input)
                document.getElementById("grand_total").value = total_amt;
            }

            document.getElementById('total_amount_print').value = document.getElementById('grand_total').value;
            totalamtsum()

        }
    </script>


    <script>
        function update_calculation(count) {
            var qty = document.getElementById("qty_" + count).value;
            var purchase_price = document.getElementById("purchase_price_" + count).value;
            var total = parseFloat(purchase_price) * parseFloat(qty);
            document.getElementById("unit_cost_" + count).value = purchase_price;
            document.getElementById("total_amount_" + count).value = total;
            var no = $(".total").length;
            //alert(no);
            total_sum();
            totalamtsum()
        }
    </script>



    <script>
        function totalamtsum() {

        }
    </script>

    <script>
        function unitvalue(count) {

            var unitSelect = document.getElementById('unitselect_' + count);

            var selectedOption = unitSelect.options[unitSelect.selectedIndex];


            var gotAttri = selectedOption.getAttribute('data-name');







            if (gotAttri === 'Ltr') {
                document.getElementById('totallitters_' + count + '').style.display = "block";
                document.getElementById('totalnos_' + count + '').style.display = "none";
            } else if (gotAttri === 'Nos') {
                document.getElementById('totalnos_' + count + '').style.display = "block";
                document.getElementById('totallitters_' + count + '').style.display = "none";
            } else {
                document.getElementById('totalnos_' + count + '').style.display = "none";
                document.getElementById('totallitters_' + count + '').style.display = "none";
            }
        }
    </script>
    <!-- <script>
        function totalamtsum() {
            // alert();
            var subtotal_amt = document.getElementById("subtotal_amt").value
            var other_charges_amt = document.getElementById("other_charges_amt").value;
            var discount_to_all_amt = document.getElementById("discount_to_all_amt").value;
            var round_off_amt = document.getElementById("round_off_amt").value;



            document.getElementById("total_amt").value = subtotal_amt;

            alert(subtotal_amt);
        }
    </script> -->
    <script>
        function calculateTotalLiters() {
            const quantity = parseFloat(document.getElementById("quantity").value);
            const litersPerItem = parseFloat(document.getElementById("litersPerItem").value);

            if (!isNaN(quantity) && !isNaN(litersPerItem)) {
                const totalLiters = quantity * litersPerItem;
                document.getElementById("totalLiters").value = totalLiters.toFixed(2);
            } else {
                document.getElementById("totalLiters").value = "";
            }
        }

        document.getElementById("quantity").addEventListener("input", calculateTotalLiters);
        document.getElementById("litersPerItem").addEventListener("input", calculateTotalLiters);
    </script>
    <script>
        function payselect() {
            var selectElement = document.getElementById('accountSelect');
            var inputElement = document.getElementById('accountInput');
            var selectedType = selectElement.options[selectElement.selectedIndex].value;

            // Set the selected discount type into the input field
            inputElement.value = selectedType;
        }
    </script>

    <script>
        function accountsselect() {
            var selectElement = document.getElementById('accountsSelect');
            var inputElement = document.getElementById('accountsInput');
            var selectedType = selectElement.options[selectElement.selectedIndex].value;

            // Set the selected discount type into the input field
            inputElement.value = selectedType;
        }
    </script>

    <script>
        document.getElementById('total_amount_print').value =
            document.getElementById('grand_total').value;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function deleteItem(saleId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('item_delete_salebill') }}", // URL to send the request to
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: saleId
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: response.message,
                                icon: "success",
                                confirmButtonText: "OK"
                            }).then(() => {

                                $('#deleteForm-' + saleId).closest('tr').remove();
                                window.location.reload();
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: "Error!",
                                text: "An error occurred while deleting the item. Please try again.",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    });
                }
            });
        }
    </script>

    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('pos_assets/js/bootstrap.min.js') }}"></script>


    <!-- SlimScroll -->
    <script src="{{ asset('pos_assets/js/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('pos_assets/js/fastclick.js') }}"></script>
    <!-- Shortcut Keys -->
    <script src="{{ asset('pos_assets/js/shortcuts.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('pos_assets/js/select2.full.min.js') }}"></script>


    <!-- <script src="pos_assets/js/app.js"></script>  -->

    <!--Toastr notification -->
    <script src="{{ asset('pos_assets/js/toastr.js') }}"></script>
    <script src="{{ asset('pos_assets/js/toastr_custom.js') }}"></script>
    <!--Toastr notification end-->
    <!-- bootstrap datepicker -->
    <script src="{{ asset('pos_assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('pos_assets/js/daterangepicker.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('pos_assets/js/bootstrap-datepicker.js') }}"></script>
    <!-- Autocomplete -->
    <script src="{{ asset('pos_assets/js/autocomplete.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('pos_assets/js/special_char_check.js') }}"></script>
    <script src="{{ asset('pos_assets/js/custom.js') }}"></script>

    <!-- Pace Loader -->
    <script src="{{ asset('pos_assets/js/pace.min.js') }}"></script>
    <!-- <script type="text/javascript">
        $(document).ajaxStart(function() {
            Pace.restart();
        });
    </script> -->
    <!-- Sweet alert -->
    <script src="{{ asset('pos_assets/js/sweetalert.min.js') }}"></script>

    <!-- iCheck -->
    <script src="{{ asset('pos_assets/js/icheck.min.js') }}"></script>

    <!-- Initialize Select2 Elements -->
    <script type="text/javascript">
        $(".select2").select2();
    </script>
    <!-- Initialize toggler -->

    <!-- Initialize date with its Format -->



    <!-- iCheck -->
    <script src="{{ asset('pos_assets/js/icheck.min.js') }}"></script>

    <script src="{{ asset('pos_assets/js/fullscreen.js') }}"></script>
    <script src="{{ asset('pos_assets/js/modals.js') }}"></script>
    <script src="{{ asset('pos_assets/js/modal_item.js') }}"></script>
    <!-- <script src="{{ asset('pos_assets/js/customer_select_ajax.js') }}"></script> -->

    <!-- DROP DOWN -->
    <script src="{{ asset('pos_assets/js/bootstrap3-typeahead.min.js') }}"></script>
    <!-- DROP DOWN END-->

    <script type="text/javascript">
        var warehouse_module = false;
        warehouse_module = true;
        var store_module = false;
    </script>
    <!-- <script src="pos_assets/js/pos.js"></script> -->
    <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content ui-corner-all" id="ui-id-1"
        tabindex="0" style="display: none"></ul>

</body>

</html>
