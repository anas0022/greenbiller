@extends('admin//layouts/app')

@section('title', 'Home Page')



<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

       

        <div class="row">
            <div class="col-12">
                <form action="{{route('acount.edit')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="" value="{{$customer->id}}">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-text d-inline">Edit Accounts </h4>
                            <p> Please Enter Valid Data </p>
                        </div>
                   
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Parent Account<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <select name="parent_id" class="form-control selectpicker" data-live-search="true" id="parentSelect">
                                        <option value="0" data-tokens="-CREATE ACCOUNT HEAD-">{{$customer->parent_accont}}</option>
                                   
                                    </select>
<input type="hidden" name="parent" id="parentInput" value="{{$customer->parent_accont}}">

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
                                    <input name="number" type="text" class="form-control" required value="{{$customer->account_number}}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Account Name<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input name="name" type="text" class="form-control" required value="{{$customer->account_name}}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Opening Balance<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input name="balance" type="text" class="form-control" required value="{{$customer->opening_balance}}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Note</label>
                                <div class="col-sm-9">
                                    <textarea name="note" class="form-control">{{$customer->note}}</textarea>

                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <a ></a>
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