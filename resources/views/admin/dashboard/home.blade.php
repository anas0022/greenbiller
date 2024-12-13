@extends('admin/layouts/app')

@section('title', 'Home Page')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('admin-assets\css\dash.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">

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
                    <button type="button" title="Today" class="btn btn-default btn-info get_tab_records"
                        name="today">Today</button>
                    <button type="button" title="Current Week" class="btn btn-default btn-info get_tab_records"
                        name="week">Weekly</button>
                    <button type="button" title="Current Month" class="btn btn-default btn-info get_tab_records"
                        name="month">Monthly</button>
                    <button type="button" title="Current Year" class="btn btn-default btn-info get_tab_records"
                        name="yearly">Yearly</button>
                    <button type="button" title="All Years" class="btn btn-default btn-info get_tab_records"
                        name="all">All</button>
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
                                            <i class="bi bi-calendar-fill"></i>
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


                                            <canvas id="kt_chartjs_1" class="mh-500px"></canvas>


                                        </div>
                                        <div class="col-5"
                                            style="background-color:white; width:35%; border-top:#007bff 2px solid;">
                                            <h5>Recently Added Items</h5>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Sl No</th>
                                                        <th>Item Name</th>

                                                        <th>Sale Item Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="recent-items-body">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="container mt-5" style="background: white;">
                                    <h4>Stock Alert Items</h4>
                                    <table class="table table-bordered" id="stock-alert-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Opening Stock</th>
                                                <th>Alert Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data will be populated here via AJAX -->
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="row" style="display: flex; gap:5%;">
                                {{-- <div style="background-color:white; width:50%; border-top:#007bff 2px solid;">


                                    <canvas id="kt_chartjs_pie" width="400" height="400"></canvas>


                                </div> --}}
                                <div class="col-5"
                                    style="background-color:white; width:45%; border-top:#007bff 2px solid;">
                                    <h5>Recently Sale Items</h5>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Date</th>
                                                <th>Invoice No</th>
                                                <th>Total</th>

                                                <th>created by</th>
                                            </tr>
                                        </thead>
                                        <tbody id="recent-sale-body">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        #kt_chartjs_pie {
            max-height: 400px;
            /* Set the maximum height */
        }

        .small-swal {
            font-size: 0.9rem !important;
        }

        .small-swal .swal2-title {
            font-size: 1.1rem !important;
            padding: 0.5em 1em 0 !important;
        }

        .small-swal .swal2-content {
            font-size: 0.9rem !important;
        }

        .small-swal .swal2-icon {
            width: 60px !important;
            height: 60px !important;
            margin: 0.5em auto !important;
        }

        .small-swal .swal2-actions {
            margin: 1em auto 0 !important;
        }

        .small-swal .swal2-confirm,
        .small-swal .swal2-cancel {
            font-size: 0.9rem !important;
            padding: 0.5em 2em !important;
            margin: 0 0.5em !important;
        }

        /* Question icon color */
        .swal2-icon.swal2-question {
            border-color: #87adbd !important;
            color: #87adbd !important;
        }


        /* Style for DataTable buttons */
        .dt-button,
        .buttons-html5,
        .buttons-print,
        .custom-btn {
            background-color: #000000 !important;
            color: #ffffff !important;
            border: none !important;
            padding: 5px 15px !important;
            margin: 2px !important;
            border-radius: 4px !important;
        }

        .dt-button:hover,
        .buttons-html5:hover,
        .buttons-print:hover,
        .custom-btn:hover {
            background-color: #333333 !important;
            color: #ffffff !important;
            opacity: 0.9;
        }

        /* Style for the buttons container */
        .dt-buttons {
            display: flex;
            gap: 5px;
            margin-left: 20px;
        }

        /* Container styling */
        .top,
        .bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
        }

        /* Left side styling */
        .left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        /* Right side styling */
        .right {
            display: flex;
            align-items: center;
        }

        /* Pagination styling */
        .dataTables_paginate {
            margin: 0;
            padding-top: 3px;
        }

        .paginate_button {
            padding: 5px 10px;
            margin: 0 2px;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            background-color: #fff;
        }

        .paginate_button.current {
            background-color: #000000 !important;
            color: white !important;
            border-color: #000000 !important;
        }

        .paginate_button:hover {
            background-color: #f0f0f0 !important;
            color: #000000 !important;
        }

        /* Length menu styling */
        .dataTables_length {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .dataTables_length select {
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin: 0 5px;
        }

        /* Button container styling */
        .dt-buttons {
            display: flex;
            gap: 5px;
        }

        /* Button styling */
        .dt-button,
        .buttons-html5,
        .buttons-print,
        .custom-btn {
            background-color: #000000 !important;
            color: #ffffff !important;
            border: none !important;
            padding: 5px 15px !important;
            margin: 2px !important;
            border-radius: 4px !important;
        }

        .dt-button:hover,
        .buttons-html5:hover,
        .buttons-print:hover,
        .custom-btn:hover {
            background-color: #333333 !important;
            color: #ffffff !important;
            opacity: 0.9;
        }

        /* Search styling */
        .dataTables_filter input {
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-left: 5px;
        }

        /* Info text styling */
        .dataTables_info {
            padding-top: 8px;
        }
    </style>

    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <script src="assets/plugins/global/plugins.bundle.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            // Function to load stock alert items
            function loadStockAlertItems() {
                $.ajax({
                    url: "{{ route('stockalertitem') }}", // Ensure this route is defined in your web.php
                    type: "GET",
                    success: function(data) {
                        console.log(data); // Log the data received
                        let rows = '';
                        data.forEach((item, index) => {
                            rows += `<tr>
                                <td>${index + 1}</td>
                                <td>${item.item_name}</td>
                                <td>${item.opening_stock}</td>
                                <td>${item.alert_quantity ?? '00'}</td>
                            </tr>`;
                        });
                        const tableBody = $('#stock-alert-table tbody');
                        tableBody.html(rows); // Populate the table body

                        // Initialize or reinitialize DataTable
                        if ($.fn.DataTable.isDataTable('#stock-alert-table')) {
                            $('#stock-alert-table').DataTable()
                                .destroy(); // Destroy existing DataTable instance
                        }
                        $('#stock-alert-table').DataTable();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
                });
            }

            // Load stock alert items on page load
            loadStockAlertItems();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.ajax({
                type: "GET",
                url: "{{ route('suppliercountall') }}",
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
            fetchRecentItems();

            function fetchRecentItems() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('recentitem') }}", // Ensure this route is defined in your web.php
                    success: function(response) {
                        let itemsBody = document.getElementById('recent-items-body');
                        itemsBody.innerHTML = ''; // Clear existing items

                        response.forEach((item, index) => {
                            let row = `<tr>
                            <td>${index + 1}</td> <!-- Display count -->
                            <td>${item.item_name}</td>
         
                            <td> ₹ ${item.purchase_price}</td>
                        </tr>`;
                            itemsBody.innerHTML += row; // Append new row
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
                });
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchRecentSale();

            function fetchRecentSale() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('salelatest') }}", // Ensure this route is defined in your web.php
                    success: function(response) {
                        console.log(response); // Log the response to check the data structure
                        let itemsBody = document.getElementById('recent-sale-body');
                        itemsBody.innerHTML = ''; // Clear existing itemsl

                        response.forEach((sale, index) => {
                            let createdAt = sale.created_at ? new Date(sale.created_at)
                                .toISOString().split('T')[0] : 'N/A';
                            let grandTotal = sale.grand_total ? Math.floor(sale.grand_total) :
                                '';
                            let row = `<tr>
        <td>${index + 1}</td> 
        <td>${createdAt}</td> 
<td>${sale.prefix && sale.sales_code ? `${sale.prefix} / ${sale.sales_code}` : 'N/A'}</td>

  <td>${grandTotal ? `₹ ${grandTotal}` : ''}</td><!-- Conditionally show grand_total -->
     <td>${sale.name}</td>
    </tr>`;
                            itemsBody.innerHTML += row; // Append new row
                        });

                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
                });
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchRecentItems();

            function fetchRecentItems() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('recentitem') }}", // Ensure this route is defined in your web.php
                    success: function(response) {
                        let itemsBody = document.getElementById('recent-items-body');
                        itemsBody.innerHTML = ''; // Clear existing items

                        response.forEach((item, index) => {
                            let row = `<tr>
                            <td>${index + 1}</td> <!-- Display count -->
                            <td>${item.item_name}</td>
         
                            <td> ₹ ${item.purchase_price}</td>
                        </tr>`;
                            itemsBody.innerHTML += row; // Append new row
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
                });
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.ajax({
                type: "GET",
                url: "{{ route('customercountall') }}",
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
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                        'October', 'November', 'December'
                    ],
                    datasets: [{
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

{{--     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

   {{--  <script>
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

                const ctx = document.getElementById('kt_chartjs_pie').getContext('2d');

                const chartData = {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                        'October', 'November', 'December'
                    ],
                    datasets: [{
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
                    type: 'pie',
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
    </script> --}}


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $.ajax({
                type: "GET",
                url: "{{ route('expenseall') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('expence').innerText = formatNumber(total);
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
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
        });
        document.addEventListener('DOMContentLoaded', function() {
            $.ajax({
                type: "GET",
                url: "{{ route('reportall') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('sale').innerText = formatNumber(total);
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
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
            $.ajax({
                type: "GET",
                url: "{{ route('salecountall') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('sale_count').innerText = total;
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
            });
            $.ajax({
                type: "GET",
                url: "{{ route('purchasecountall') }}",
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
            // Event listener for the "Today" button
            document.querySelector('button[name="today"]').addEventListener('click', function() {

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
                $.ajax({
                    type: "GET",
                    url: "{{ route('report') }}",
                    success: function(response) {
                        let total = response;
                        document.getElementById('sale').innerText = formatNumber(total);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
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



        });
        document.querySelector('button[name="week"]').addEventListener('click', function() {

            $.ajax({
                type: "GET",
                url: "{{ route('purchaseweekcount') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('purchase_count').innerText = total;
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
            });
            $.ajax({
                type: "GET",
                url: "{{ route('saleweekcount') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('sale_count').innerText = total;
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
            });
            $.ajax({
                type: "GET",
                url: "{{ route('supplierweekcount') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('supplier_count').innerText = total;
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
            });
            $.ajax({
                type: "GET",
                url: "{{ route('customerweekcount') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('customer_count').innerText = total;
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
            });
            $.ajax({
                type: "GET",
                url: "{{ route('saleweeksum') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('sale').innerText = formatNumber(total);
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
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
            $.ajax({
                type: "GET",
                url: "{{ route('expenceweeksum') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('expence').innerText = formatNumber(total);
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
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
        });
        document.querySelector('button[name="month"]').addEventListener('click', function() {
            $.ajax({
                type: "GET",
                url: "{{ route('expenseMonthlySum') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('expence').innerText = formatNumber(total);
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
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

            $.ajax({
                type: "GET",
                url: "{{ route('saleMonthlySum') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('sale').innerText = formatNumber(total);
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
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
            $.ajax({
                type: "GET",
                url: "{{ route('customerMonthlycount') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('customer_count').innerText = total;
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
            });
            $.ajax({
                type: "GET",
                url: "{{ route('supplierMonthlycount') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('supplier_count').innerText = total;
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
            });
            $.ajax({
                type: "GET",
                url: "{{ route('purchaseMonthlycount') }}",
                success: function(response) {
                    let total = response;
                    document.getElementById('purchase_count').innerText = total;
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred: " + error);
                }
            });
            $.ajax({
                type: "GET",
                url: "{{ route('saleMonthlycount') }}",
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('button[name="all"]').addEventListener('click', function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('reportall') }}",
                    success: function(response) {
                        let total = response;
                        document.getElementById('sale').innerText = formatNumber(total);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
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
                $.ajax({
                    type: "GET",
                    url: "{{ route('salecountall') }}",
                    success: function(response) {
                        let total = response;
                        document.getElementById('sale_count').innerText = total;
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
                });

                $.ajax({
                    type: "GET",
                    url: "{{ route('purchasecountall') }}",
                    success: function(response) {
                        let total = response;
                        document.getElementById('purchase_count').innerText = total;
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "{{ route('expenseall') }}",
                    success: function(response) {
                        let total = response;
                        document.getElementById('expence').innerText = formatNumber(total);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "{{ route('customercountall') }}",
                    success: function(response) {
                        let total = response;
                        document.getElementById('customer_count').innerText = total;
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "{{ route('suppliercountall') }}",
                    success: function(response) {
                        let total = response;
                        document.getElementById('supplier_count').innerText = total;
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
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
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('button[name="yearly"]').addEventListener('click', function() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('expenseYearlySum') }}",
                    success: function(response) {
                        let total = response;
                        document.getElementById('expence').innerText = formatNumber(total);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "{{ route('saleYearlySum') }}",
                    success: function(response) {
                        let total = response;
                        document.getElementById('sale').innerText = formatNumber(total);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "{{ route('saleYearlycount') }}",
                    success: function(response) {
                        let total = response;
                        document.getElementById('sale_count').innerText = total;
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "{{ route('purchaseYearlycount') }}",
                    success: function(response) {
                        let total = response;
                        document.getElementById('purchase_count').innerText = total;
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "{{ route('suplierYearlycount') }}",
                    success: function(response) {
                        let total = response;
                        document.getElementById('supplier_count').innerText = total;
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "{{ route('customerYearlycount') }}",
                    success: function(response) {
                        let total = response;
                        document.getElementById('customer_count').innerText = total;
                    },
                    error: function(xhr, status, error) {
                        console.error("Error occurred: " + error);
                    }
                });
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
            // Event listener for the "Today" button
            document.querySelector('button[name="today"]').addEventListener('click', function() {

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

                function formatNumber(num) {
                    if (num >= 10000000) {
                        return (num / 10000000).toFixed(1) + " crore";
                    } else if (num >= 100000) {
                        return (num / 100000).toFixed(1) + " lakh";
                    } else {
                        return "₹" + num;
                    }
                }
            });
        });
    </script>
    <script>
        document.querySelectorAll('.get_tab_records').forEach(button => {
            button.addEventListener('click', function() {
                // Remove 'active' class from all buttons
                document.querySelectorAll('.get_tab_records').forEach(btn => btn.classList.remove(
                    'active'));
                // Add 'active' class to the clicked button
                this.classList.add('active');
            });
        });
    </script>



@endsection
