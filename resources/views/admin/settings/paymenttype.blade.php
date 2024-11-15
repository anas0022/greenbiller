@extends('admin//layouts/app')

@section('title', 'Home Page')

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-footer">
                        <h4 class="card-text d-inline"> Payment Type List</h4>

                        <button type="button" class="card-link float-end btn btn-rounded btn-info btn-sm " data-bs-toggle="modal" data-bs-target="#basicModal"><span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i>
                            </span>Add Payment Type</button>
                    </div>
                    <!-- Modal start -->
                    <div class="modal fade" id="basicModal">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Payment Type</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Payment Type Name <span class="required">*</span>:</label>
                                            <div class="col-sm-9">
                                                <input name="name" type="text" class="form-control" placeholder="Enter Category Name" required>
                                            </div>
                                        </div>
                                      
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                    <button name="add" type="submit" class="btn btn-primary">Save</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal end -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="list" class="display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Payment Type Name</th>                                     
                                        <th>Status</th>
                                        <th><i class="fas fa-arrow-circle-down"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="form-check form-switch">
                                                       
                                                    </div>
                                                    <a data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <button onclick="deletecat()" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>

                                                </div>
                                                <!-- Modal start -->
                                                <div class="modal fade" id="editModal">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Payment Type</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" method="POST" enctype="multipart/form-data">
                                                                    <div class="mb-3 row">
                                                                        <label class="col-sm-3 col-form-label">Payment Type Name:</label>
                                                                        <div class="col-sm-9">
                                                                            <input name="u_name" type="text" class="form-control" value="<?php echo $row_units['payment_type']; ?>">
                                                                            <input type="text" name="cat_id" id="" value="<?php echo $row_units['id']; ?>" hidden>
                                                                        </div>
                                                                    </div>
                                                                  

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                                <button name="update" type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal end -->
                                            </td>
                                        </tr>
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

