@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 442px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Category List

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Category</a></li>
            <li class="active">Category List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add new category</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name(En)<span class="red-colour">*</span></label>

                                <input type="text" class="form-control" id="" value="" placeholder="Enter Category Name" name="name" required="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>

                                <input type="file" class="form-control" placeholder="" name="image" id="image">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sort Order<span class="red-colour">*</span></label>

                                <input type="number" min="1" class="form-control" id="" value="" placeholder="Enter Sort Order" name="sortOrder" required="">
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Categories</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered dataTable no-footer" id="ttable" role="grid" aria-describedby="ttable_info">

                            <thead>
                                <tr role="row">
                                    <th style="width: 10px">#</th>
                                    <th>Category Name</th>
                                    <th style="width: 86px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>





                                <tr role="row" class="odd">
                                    <td>1</td>
                                    <td>Sandwich</td>
                                    <td>
                                        <i class="fa fa-trash btn-sm btn-danger" onclick="deleteCategory(7)"></i>

                                        <i class="fa fa-edit btn-sm btn-primary" id="btn-edit_1" data-ar_name="إلكترونيات" onclick="editModal(7, 'ELECTRONICS', 1, 'ELECTRONICS', 'إلكترونيات', 'no_category.png', '2')" data-toggle="modal"></i>
                                    </td>
                                </tr>
                                <tr role="row" class="even">
                                    <td>2</td>
                                    <td>Bevarages</td>
                                    <td>
                                        <i class="fa fa-trash btn-sm btn-danger" onclick="deleteCategory(8)"></i>

                                        <i class="fa fa-edit btn-sm btn-primary" id="btn-edit_2" data-ar_name="مركبة" onclick="editModal(8, 'VEHICLE', 2, 'VEHICLE', 'مركبة', 'no_category.png', '3')" data-toggle="modal"></i>
                                    </td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td>3</td>
                                    <td>Snacks</td>
                                    <td>
                                        <i class="fa fa-trash btn-sm btn-danger" onclick="deleteCategory(9)"></i>

                                        <i class="fa fa-edit btn-sm btn-primary" id="btn-edit_3" data-ar_name="مستحضرات التجميل" onclick="editModal(9, 'COSMETICS', 3, 'COSMETICS', 'مستحضرات التجميل', 'no_category.png', '3')" data-toggle="modal"></i>
                                    </td>
                                </tr>
                                <tr role="row" class="even">
                                    <td>4</td>
                                    <td>FOOD</td>
                                    <td>
                                        <i class="fa fa-trash btn-sm btn-danger" onclick="deleteCategory(10)"></i>

                                        <i class="fa fa-edit btn-sm btn-primary" id="btn-edit_4" data-ar_name="طعام" onclick="editModal(10, 'FOOD', 4, 'FOOD', 'طعام', 'no_category.png', '4')" data-toggle="modal"></i>
                                    </td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td>5</td>
                                    <td>Snacks</td>
                                    <td>
                                        <i class="fa fa-trash btn-sm btn-danger" onclick="deleteCategory(11)"></i>

                                        <i class="fa fa-edit btn-sm btn-primary" id="btn-edit_5" data-ar_name="مواد بناء" onclick="editModal(11, 'Constructions Material', 5, 'Constructions Material  desc', 'وصف مواد بناء', '15678820505d73fb4201aa9.jpg', '30')" data-toggle="modal"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="dataTables_info" id="ttable_info" role="status" aria-live="polite">Showing 1 to 5 of 5 entries</div>
                        <div class="dataTables_paginate paging_simple_numbers" id="ttable_paginate"><a class="paginate_button previous disabled" aria-controls="ttable" data-dt-idx="0" tabindex="0" id="ttable_previous">Previous</a><span><a class="paginate_button current" aria-controls="ttable" data-dt-idx="1" tabindex="0">1</a></span><a class="paginate_button next disabled" aria-controls="ttable" data-dt-idx="2" tabindex="0" id="ttable_next">Next</a></div>
                    </div>

                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->


        </div>
</div>
</section>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" id="editForm" method="post" enctype="multipart/form-data" autocomplete="off" novalidate="novalidate">
                <input type="hidden" name="_method" value="patch"> <input type="hidden" name="_token" value="yLOe8BmfSAnmqEmcpTsQrVOYkO4YYD3T0Je00Mu7">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="editModalLabel">Edit <span class="heading"></span></h4>
                </div>
                <div class="modal-body">
                    <label for="name">Category Name(En)<span class="red-colour">*</span></label>
                    <input type="text" name="name" class="name form-control validate" id="name">
                    <span id="modal-myvalue"></span> <span id="modal-myvar"></span> <span id="modal-bb"></span>
                </div>
                <div class="modal-body">
                    <label for="arabicName">Category Name(Ar)<span class="red-colour">*</span></label>
                    <input type="text" name="arabicName" class="arabicName form-control validate" id="arabicName">
                    <span id="modal-myvalue"></span> <span id="modal-myvar"></span> <span id="modal-bb"></span>
                </div>
                <div class="modal-body">
                    <label for="descriptionEn">Description(En)<span class="red-colour">*</span></label>
                    <input type="text" name="descriptionEn" class="descriptionEn form-control validate" id="descriptionEn">
                    <span id="modal-myvalue"></span> <span id="modal-myvar"></span> <span id="modal-bb"></span>
                </div>
                <div class="modal-body">
                    <label for="descriptionAr">Description(Ar)<span class="red-colour">*</span></label>
                    <input type="text" name="descriptionAr" class="descriptionAr form-control validate" id="descriptionAr">
                    <span id="modal-myvalue"></span> <span id="modal-myvar"></span> <span id="modal-bb"></span>
                </div>
                <div class="modal-body">
                    <label for="name">Image</label>
                    <input type="file" class="Image form-control" placeholder="" name="image" id="image">
                    <span id="modal-myvalue"></span> <span id="modal-myvar"></span> <span id="modal-bb"></span>
                    <div class="row" style="margin-top: 5px;">
                        <div class="col-md-4">
                            <img src="" id="img" width="60%" height="60%">
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <label for="sortOrder">sortOrder<span class="red-colour">*</span></label>
                    <input type="text" name="sortOrder" class="sortOrder form-control validate" id="sortOrder">
                    <span id="modal-myvalue"></span> <span id="modal-myvar"></span> <span id="modal-bb"></span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>
    </div>
</div>
</div>
@endsection