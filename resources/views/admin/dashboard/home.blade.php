@extends('admin/layouts/app')

@section('title', 'Home Page')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('admin-assets\css\dash.css') }}">



    <style>
        .custom-active {
            background-color: #007bff;
            /* Change this to your desired active color */
            color: white;

        }
    </style>


    <div class="content-body">

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

        <!-- row -->
        <div class="container-fluid" style="width:100%; ">

            <h3>Dashboard</h3>
            <div class="d-flex justify-content-end">
                <div class="btn-group" style="height: 50px;">
                    <button type="button" title="Today" class="btn btn-default btn-info get_tab_records ">Today</button>
                    <button type="button" title="Current Week"
                        class="btn btn-default btn-info get_tab_records">Weekly</button>
                    <button type="button" title="Current Month"
                        class="btn btn-default btn-info get_tab_records">Monthly</button>
                    <button type="button" title="Current Year"
                        class="btn btn-default btn-info get_tab_records">Yearly</button>
                    <button type="button" title="All Years" class="btn btn-default btn-info get_tab_records">All</button>
                </div>
            </div>



            <div class="tab-pane" id="general" role="tabpanel" style="  position:relative;">
                <div class="row">

                    <div class="col-12">
                        <div class="row item">

                            <div class="col-12">
                                <div class="row item d-flex" style="justify-content: center">
                                    <div class=" boxes" style="width: 23%;">
                                        <div class="box">
                                            <i class="bi bi-box"></i>
                                            <p>
                                                <b style="font-size: 30px;">₹ 0</b> <br>
                                                Purchase Due
                                            </p>
                                        </div>
                                    </div>
                                    <div class="boxes" style="width: 23%;">
                                        <div class="box" id="res">
                                            <i class="bi bi-receipt"></i>
                                            <p>
                                                <b style="font-size: 30px;">₹ 0</b> <br>
                                                Sale Due
                                            </p>
                                        </div>
                                    </div>
                                    <div class=" boxes" style="width: 23%;">
                                        <div class="box">

                                            <i class="bi bi-receipt"></i>
                                            <p>
                                                <b style="font-size: 30px;" class="sale-pay-amount" id="sale">0</b>
                                                <br>
                                                Sales
                                            </p>
                                        </div>
                                    </div>
                                    <div class=" boxes" style="width: 23%;">
                                        <div class="box">
                                            <i class="bi bi-dash-square-fill"></i>
                                            <p>
                                                <b style="font-size: 30px;" id="expence"></b> <br>
                                                Expense
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row item d-flex" style="justify-content: center;">
                                            <div class="" style="width: 23%;">
                                                <div class="box_count d-flex">
                                                    <div class="icon">
                                                        <i class="bi bi-people-fill"></i>
                                                    </div>

                                                    <p>
                                                        <b id="customer_count"></b> <br>
                                                        Customers
                                                    </p>
                                                </div>
                                            </div>
                                            <div style="width: 23%;">
                                                <div class="box_count d-flex">
                                                    <div class="icon">
                                                        <i class="bi bi-truck"></i>
                                                    </div>

                                                    <p>
                                                        <b id="supplier_count">₹ 200</b> <br>
                                                        Suppliers
                                                    </p>
                                                </div>
                                            </div>
                                            <div style="width: 23%;">
                                                <div class="box_count d-flex">
                                                    <div class="icon">
                                                        <i class="bi bi-handbag-fill"></i>
                                                    </div>

                                                    <p>
                                                        <b id="purchase_count"></b> <br>
                                                        Purchases
                                                    </p>
                                                </div>
                                            </div>
                                            <div style="width: 23%;">
                                                <div class="box_count d-flex">
                                                    <div class="icon">
                                                        <i class="bi bi-cart-fill"></i>
                                                    </div>

                                                    <p>
                                                        <b id="sale_count"></b> <br>
                                                        Sales
                                                    </p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="row" style="display: flex; gap:5%;">
                                        <div style="background-color:white; width:60%; border-top:#007bff 2px solid;">


                                            <canvas id="kt_chartjs_1" class="mh-400px"></canvas>


                                        </div>
                                        <div class="col-5"
                                            style="background-color:white; width:35%; border-top:#007bff 2px solid;">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <script src="assets/plugins/global/plugins.bundle.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.ajax({
                type: "GET",
                url: "{{ route('suppliercount') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('supplier_count').innerText = total;
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.ajax({
                type: "GET",
                url: "{{ route('customercount') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('customer_count').innerText = total;
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.ajax({
                type: "GET",
                url: "{{ route('report') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('sale').innerText = formatNumber(total);
                    updateChart(myChart, total);
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
            });
        });

        function formatNumber(num) {
            if (num >= 10000000) {
                return (num / 10000000).toFixed(1) + " crore";
            } else if (num >= 100000) {
                return (num / 100000).toFixed(1) + " lakh";
            } else {
                return "₹" + num;
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.ajax({
                type: "GET",
                url: "{{ route('expencesum') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('expence').innerText = formatNumber(total);
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
            });
        });

        function formatNumber(num) {
            if (num >= 10000000) {
                return (num / 10000000).toFixed(1) + " crore";
            } else if (num >= 100000) {
                return (num / 100000).toFixed(1) + " lakh";
            } else {
                return "₹" + num;
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.ajax({
                type: "GET",
                url: "{{ route('advancesum') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('advance').innerText = formatNumber(total);
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
            });
        });

        function formatNumber(num) {
            if (num >= 10000000) {
                return (num / 10000000).toFixed(1) + " crore";
            } else if (num >= 100000) {
                return (num / 100000).toFixed(1) + " lakh";
            } else {
                return "₹" + num;
            }
        }
    </script>
     // ... existing code ...

     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Ensure this is before your custom scripts -->
 
     <script>
         async function fetchMonthlyReport() {
             const response = await fetch('/admin/monthly-report'); // Ensure the URL is correct
             if (!response.ok) {
                 throw new Error('Network response was not ok');
             }
             return response.json();
         }
     
         async function createChart() {
             try {
                 const monthlyData = await fetchMonthlyReport();
                 //console.log(monthlyData); 
     
                 const ctx = document.getElementById('kt_chartjs_1').getContext('2d');
     
                 const chartData = {
                     labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                     datasets: [
                         {
                             label: 'Sales',
                             data: monthlyData.sales || [],
                             backgroundColor: 'green',
                         },
                         {
                             label: 'Expenses',
                             data: monthlyData.expenses || [], 
                             backgroundColor: 'red',
                         },
                         {
                             label: 'purchase',
                             data: monthlyData.purchase || [], 
                             backgroundColor: 'orange',
                         }
                     ]
                 };
     
                 const config = {
                     type: 'bar',
                     data: chartData,
                     options: {
                         responsive: true,
                         plugins: {
                             legend: {
                                 position: 'top',
                             },
                             title: {
                                 display: true,
                                 text: 'Monthly Financial Overview'
                             }
                         },
                     }
                 };
     
                 new Chart(ctx, config);
             } catch (error) {
                 console.error('Error creating chart:', error);
             }
         }
     
         document.addEventListener('DOMContentLoaded', createChart);
     </script>
 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.ajax({
                type: "GET",
                url: "{{ route('purchasecount') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('purchase_count').innerText = total;
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.ajax({
                type: "GET",
                url: "{{ route('salecount') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('sale_count').innerText = total;
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
            });
        });
    </script>
@endsection
