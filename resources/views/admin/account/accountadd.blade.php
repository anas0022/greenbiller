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
    <div class="container-fluid">

       

        <div class="row">
            <div class="col-12">
                <form action="{{route('account.post')}}" method="post">
                    @csrf   
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-text d-inline"> Accounts </h4>
                            <p> Please Enter Valid Data </p>
                        </div>
                   
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Parent Account<span class="required">*</span></label>
                                <div class="col-sm-9">
                                <input type="hidden" name="parent" id="parentInput">
<select name="parent_id" class="form-control selectpicker" data-live-search="true" id="parentSelect" onchange="updateParentInput()">
    <option value="0" data-ttokens="-CREATE ACCOUNT HEAD-">-CREATE ACCOUNT HEAD-</option>
    <option value="main account">main account</option>
</select>

<script>
    function updateParentInput() {
        var parentInput = document.getElementById('parentInput');
        var parentSelect = document.getElementById('parentSelect');

        // Check if the selected value is not '0' before updating
        if (parentSelect.value !== "0") {
            parentInput.value = parentSelect.value;
        } else {
            parentInput.value = ''; // Clear input if the default option is selected
        }
    }
</script>

                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Account Number<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input name="number" type="text" class="form-control" required value="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Account Name<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input name="name" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Opening Balance<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input name="balance" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Note</label>
                                <div class="col-sm-9">
                                    <textarea name="note" class="form-control"></textarea>

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