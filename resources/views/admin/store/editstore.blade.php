@extends('admin//layouts/app')

@section('title', 'Home Page')

<link href="{{asset('admin-assets/css/toast.css')}}" rel="stylesheet">
@section('content')

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
<div class="content-body">
   
    <!-- row -->
    <div class="container-fluid" style="width:100%; display:flex; justify-content:start;;">
    <div  style="background-color:white; padding:20px;  position:relative;">

        <div class="row">
            <div class="col-12">
                <form action="{{route('edit.store')}}" method="post" enctype="multipart/form-data">

<input type="text" name="id" id="" value="{{$store->id}}">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-text d-inline"> Add Store </h4>
                            <p>Add/Update Store</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Store Code<span class="required">*</span></label>
                                        <input type="text" name="store_code" class="form-control" value="{{$store->store_code}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">store Name<span class="required
                                ">*</span></label>

                                        <input type="text" name="store_name" class="form-control" required="" value="{{$store->store_name}}">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                <div class="form-group">
                                        <label class="form-label">store Website<span class="required
                                ">*</span></label>

                                        <input type="text" name="store_website" class="form-control" required="" value="{{$store->store_website}}">
                                    </div>

                                

                                </div>
                                <div class="col-lg-4 mb-2">
                                <div class="form-group">
                                        <label class="form-label">Mobile<span class="required
                                ">*</span></label>

                                        <input type="text" name="mobile" class="form-control" required="" value="{{$store->mobile}}">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                <div class="form-group">
                                        <label class="form-label">Email<span class="required
                                ">*</span></label>

                                        <input type="text" name="email" class="form-control" required="" value="{{$store->email}}">
                                    </div>
                                </div>


                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Website</label>
                                        <input type="text" name="website" class="form-control" value="{{$store->website}}">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">country</label>
                                        <input type="text" name="country" class="form-control" value="{{$store->country}}">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">state</label>
                                        <input type="text" name="state" class="form-control" min="0" value="{{$store->state}}">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">City</label>
                                        <input type="text" name="city" class="form-control" value="{{$store->city}}">
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control">{{$store->address}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Postcode</label>

                                        <div class="input-group mb-3">
                                            <!-- <span class="input-group-text"><i class="bi bi-calendar-date"></i></span> -->
                                            <input type="text" name="postcode" class="form-control"value="{{$store->postcode}}">
                                        </div>


                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="form-group">
                                        <label class="form-label">Gst No</label>
                                        <input type="text" name="gst" class="form-control" value="{{$store->gst_no}}">

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
        var toggle = document.getElementById('inapp_view');
        var fixedDiv = document.getElementById('fixed');

        // Initialize toggle state based on server value
        if (toggle.checked) {
            apneed.value = "app"; // If checked, set value to "app"
            fixedDiv.style.display = "block"; // Show app price input
        } else {
            apneed.value = "none_app"; // If not checked, set to "none_app"
            fixedDiv.style.display = "none"; // Hide app price input
        }

        // Change event listener for the toggle
        toggle.addEventListener('change', function () {
            if (toggle.checked) {
                apneed.value = "app"; // Set value to "app" if checked
                fixedDiv.style.display = "block"; // Show app price input
            } else {
                apneed.value = "none_app"; // Optionally set back to "none_app" if unchecked
                fixedDiv.style.display = "none"; // Hide app price input
            }
        });
    });
</script>

<div class="col-lg-4 mb-2">
    <div class="form-group">
        <label class="form-label">Show on app? 
            <span class="required" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" 
                  data-bs-content="On this toggle to show this product in mobile app." title="Info">
                <i class="bi bi-info-circle"></i>
            </span>
        </label>
        <div class="form-check form-switch">
            <input type="hidden" name="app" id="apneed" value="none_app">
            <input class="form-check-input" type="checkbox" role="switch" id="inapp_view" name="inapp_view" value="1" 
                   onchange="showappprice()" 
                   <?php echo ($store->show_app === 'app') ? 'checked' : ''; ?>>
        </div>
    </div>
</div>

<div id="fixed" class="col-lg-4 mb-2" style="display:none">
    <div class="form-group">
        <label class="form-label">App Price 
            <span class="required" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" 
                  data-bs-content="Price of the item in app." title="Info">
                <i class="bi bi-info-circle"></i>
            </span>
        </label>
        <input type="text" name="app_price" class="form-control" value="{{$store->app_price}}">
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