<!DOCTYPE html>
<html lang="en">

<head>
    <!-- All Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="UNNIKRISHNAN">
    <meta name="robots" content="">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>GreenBIller</title>

    <!-- Datatable -->
    <link href="{{ asset('admin-assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('admin-assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <div id="main-wrapper">




                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                               
                                <h4 class="card-title">Product List </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="padding: 30px !important; ">
                                    <table id="example" class="display" style="min-width: 845px ;border: 1px solid #12453 !important;">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Item Image
                                                </th>
                                                <th>
                                                    Item Name
                                                </th>
                                                <th>
                                                    Price
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($storeItems as $s)
            <tr>
                <td>
                    <img src="{{asset('storage/'.$s->image)}}" alt="" srcset="" style="width:80px; height:80px;">
                </td>
                <td>{{$s->item_name}}</td>
                <td>{{$s->purchase_price}}</td>
            </tr>
        @endforeach
                                           

                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
           
        

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://greencreon.com/"
                        target="_blank">Greencreon</a></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->



    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('admin-assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <script src="{{ asset('admin-assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/deznav-init.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('admin-assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/plugins-init/datatables.init.js') }}"></script>

</body>

</html>


