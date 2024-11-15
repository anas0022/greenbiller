@extends('admin//layouts/app')

@section('title', 'Home Page')

<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
@section('content')


<div class="content-body">
   
    <!-- row -->
    <div class="container-fluid" style="width:100%; display:flex; justify-content:start;;">
    <div  style="background-color:white; padding:20px;  position:relative;">

        <div class="row">
        @if($errors->any())
        <script>
            swal({
                title: "Error!",
                text: "{!! implode('\n', $errors->all()) !!}", // Join errors with line breaks
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
            <div class="col-12">
                <form action="{{route('storeadd')}}" method="post" enctype="multipart/form-data">


                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-text d-inline"> Add Store </h4>
                            <p>Add/Update Store</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                               <!--  <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Store Code<span class="required">*</span></label>
                                        <input type="text" name="store_code" class="form-control" value="ST-">
                                    </div>
                                    
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">store Name<span class="required
                                ">*</span></label>

                                        <input type="text" name="store_name" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                <div class="form-group">
                                        <label class="form-label">store Website<span class="required
                                ">*</span></label>

                                        <input type="text" name="store_website" class="form-control" required="">
                                    </div>

                                

                                </div>
                                <div class="col-lg-4 mb-2">
                                <div class="form-group">
                                        <label class="form-label">Mobile<span class="required
                                ">*</span></label>

                                        <input type="text" name="mobile" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                <div class="form-group">
                                        <label class="form-label">Email<span class="required
                                ">*</span></label>

                                        <input type="text" name="email" class="form-control" required="">
                                    </div>
                                </div>


                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Website</label>
                                        <input type="text" name="website" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">country</label>
                                        <input type="text" name="country" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">state</label>
                                        <input type="text" name="state" class="form-control" min="0">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">City</label>
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Postcode</label>

                                        <div class="input-group mb-3">
                                            <!-- <span class="input-group-text"><i class="bi bi-calendar-date"></i></span> -->
                                            <input type="text" name="postcode" class="form-control">
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Gst No</label>
                                        <input type="text" name="gst" class="form-control">

                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Logo</label>
                                        <input type="file" name="logo" class="form-control">
                                        <span style="font-size: 10px;color: #B03838;">Max Width/Height: 1000px * 1000px
                                            & Size: 1MB</span>
                                    </div>
                                </div>



                            </div>
                     
                           

                         
                            <div class="row">




                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Signature <span class="required" data-bs-container="body"
                                                data-bs-toggle="popover" data-bs-placement="top"
                                                data-bs-content="Maximum Retail Price." title="Info"><i
                                                    class="bi bi-info-circle"></i></span></label>
                                        <input type="file" name="signature" class="form-control"
                                            placeholder="Maximum Retail Price">
                                    </div>
                                </div>
                                <script>
    document.addEventListener('DOMContentLoaded', function () {
        var apneed = document.getElementById('apneed');
        var toggle = document.getElementById('inapp_view'); // Corrected ID to match your input

        toggle.addEventListener('change', function () {
            if (toggle.checked) {
                apneed.value = "app"; // Set value to "app" if checked
            } else {
                apneed.value = "none_app"; // Optionally set back to "none_app" if unchecked
            }
        });
    });
</script>
                                <script>
                                    function showappprice() {

                                        var x = document.getElementById("fixed");
                                        if (x.style.display === "none") {
                                            x.style.display = "block";
                                        } else {
                                            x.style.display = "none";
                                        }

                                    }

                                </script>

                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Show on app? <span class="required"
                                                data-bs-container="body" data-bs-toggle="popover"
                                                data-bs-placement="top"
                                                data-bs-content="On this togle to show this product in mobile app."
                                                title="Info"><i class="bi bi-info-circle"></i></span></label>
                                        <div class="form-check form-switch">
                                            <input type="hidden" name="app" id="apneed" value="none_app">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="inapp_view" name="inapp_view" value="1" onchange="showappprice()">

                                        </div>
                                    </div>
                                </div>
                               

                                <div id="fixed" class="col-lg-4 mb-2" style="display:none">
                                    <div class="form-group">
                                        <label class="form-label">App Price <span class="required"
                                                data-bs-container="body" data-bs-toggle="popover"
                                                data-bs-placement="top" data-bs-content="Price of the item in app."
                                                title="Info"><i class="bi bi-info-circle"></i></span></label>
                                        <input type="text" name="app_price" class="form-control"
                                            placeholder="Price to show on app">
                                    </div>
                                </div>


                            </div>
                           </div>
               
                        <div class="card-header">

                            <a></a>
                            <button name="save" type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </div>

                </form>
            </div>









<!-- Modal Unit -->
 
<div class="modal fade" id="unitModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Unit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Unit Name <span class="required">*</span>:</label>
                        <div class="col-sm-9">
                            <input name="name" type="text" class="form-control" placeholder="Enter Category Name" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Description:</label>
                        <div class="col-sm-9">
                            <textarea name="description" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button name="addunit" type="submit" class="btn btn-primary">Save</button>
            </div>

        </div>
    </div>
</div>
<!-- Modal brand -->
<div class="modal fade" id="brandModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Brand Name <span class="required">*</span>:</label>
                        <div class="col-sm-9">
                            <input name="name" type="text" class="form-control" placeholder="Enter Category Name"
                                required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Description:</label>
                        <div class="col-sm-9">
                            <textarea name="detail" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Image: </label>
                        <div class="col-sm-9">
                            <input name="image" type="file" class="form-file-input form-control">
                            Image dimension 486x355
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button name="addbrand" type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- end -->
<!-- Modal category -->
<div class="modal fade" id="categoryModal" >
    <div class="modal-dialog modal-lg" role="document" style="z-index: 10000000; position:relative;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">


                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Category Name <span class="required">*</span>:</label>
                        <div class="col-sm-9">
                            <input name="name" type="text" class="form-control" placeholder="Enter Category Name"
                                required>
                            <input name="category_code" type="text" class="form-control" required hidden>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Description:</label>
                        <div class="col-sm-9">
                            <textarea name="detail" class="form-control" cols="10" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Image: </label>
                        <div class="col-sm-9">
                            <input name="image" type="file" class="form-file-input form-control">
                            Image dimension 486x355
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button name="addcat" type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- end -->
<!-- Modal tax -->
<div class="modal fade" id="taxModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Tax</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Tax Name <span class="required">*</span>:</label>
                        <div class="col-sm-9">
                            <input name="name" type="text" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Tax Percentage <span class="required">*</span>:</label>
                        <div class="col-sm-9">
                            <input name="tax" type="text" class="form-control" placeholder="" required>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button name="addtax" type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>


        </div>

    </div>
</div>

<script>
function updatePrice() {
    // Get the purchase price and tax percentage
    var purchasePrice = parseFloat(document.getElementById('purchasePrice').value) || 0;
    var taxPercentage = parseFloat(document.getElementById('tax-percentage').value) || 0;

    // Calculate the price without tax
    var priceWithoutTax = purchasePrice / (1 + (taxPercentage / 100));

    // Update the price field
    document.getElementById('price').value = priceWithoutTax.toFixed(2); // Format to two decimal places

    // Set the sales price equal to the purchase price
    document.getElementById('sales_price').value = purchasePrice.toFixed(2); // Set sales price
}

// Update the price when the purchase price changes
document.getElementById('purchasePrice').addEventListener('input', updatePrice);
document.getElementById('tax-select').addEventListener('change', function() {
    // Update the tax percentage input when the tax select changes
    var selectedOption = this.options[this.selectedIndex];
    var percentage = selectedOption.getAttribute('data-percentage') || 0;
    document.getElementById('tax-percentage').value = percentage;
    updatePrice(); // Recalculate the price whenever tax percentage changes
});
</script>
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
@endsection