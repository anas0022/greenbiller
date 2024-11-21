

<!DOCTYPE html>
<html lang="en" class="h-100">



<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="Davur - Restaurant Bootstrap Admin Dashboard + FrontEnd" />
	<meta property="og:title" content="Davur - Restaurant Bootstrap Admin Dashboard + FrontEnd" />
	<meta property="og:description" content="Davur - Restaurant Bootstrap Admin Dashboard + FrontEnd" />
	<meta property="og:image" content="social-image.png" />
	<meta name="format-detection" content="telephone=no">
    <title>Green biller</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">
   
    <link rel="stylesheet" href="{{asset('admin-assets/css/style.css')}}">
	<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
</head>

<body class="h-100">
	

@if(session('error'))
            <script>
                swal({
                    title: "error!",
                    text: "{{ session('error') }}",
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
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-xl-12">
					<div class="row align-items-center ">
						<div class="card login-card">
							<div class="card-body">
								<div class="row">
									<div class="col-xl-6">
										<div class="text-center my-5">
											<a href="index.html"><img src="{{asset('admin-assets/images/login/1700131608.png')}}" alt="" style="width:75%;">
                                        </a>
										</div>
										<div class="media-login" style="display:flex; justify-content:center;">
											<img src="{{asset('admin-assets/images/login/landing.png')}}" alt="" style="width:60%;">
										</div>
									</div>
									<div class="col-xl-6">
                                    <form class="auth-form" action="{{route('loginpost')}}" method="post">
										@csrf
											<h3 class="text-start mb-4 font-w600">Login To Green Biller</h3>
											<form action="https://davur.dexignzone.com/dashboard/index.html">
												<div class="form-group">
													<label class="mb-1 text-black">Email<span class="required">*</span></label>
													
                                                    <input type="email" class="form-control" placeholder="hello@gmail.com" name="username">
												</div>
												<div class="form-group">
													<label class="mb-1 text-black">Password<span class="required">*</span></label>
												
                                                    <input type="password" class="form-control"  placeholder="*****" name="password">
												</div>
												<div class="form-row d-flex justify-content-between mt-4 mb-2">
													<div class="form-group">
													  
														<div class=" form-check ms-1">
															<input type="checkbox" class="form-check-input" id="basic_checkbox_2">
															<label class="custom-control-label ms-1" for="basic_checkbox_2">Remember my preference</label>
														</div>
													</div>
												</div>
												<div class="text-center">
													<button type="submit" class="btn btn-primary btn-block">Sign In</button>
												</div>
											</form>
										
													
                                            </form>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/deznav-init.js"></script>

</body>


<!-- Mirrored from davur.dexignzone.com/dashboard/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Nov 2023 13:07:08 GMT -->
</html>