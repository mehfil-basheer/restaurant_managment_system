@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 442px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dicount List

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Category</a></li>
            <li class="active">Category List</li>
        </ol>
        <div class="row">
            <div class="text-center">
                <nav class="tabs">
                    <div class="selector"></div>
                    <a href="#" class="active" id="for-categories"><i class="fa fa-th"></i>For Categories</a>
                    <a href="#" id="for-products"><i class="fa fa-list"></i>For Product</a>
                </nav>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content" style="margin-top: 20px;">

        <div class="row" id="category">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Discount for Categories</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('discount.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category<span class="red-colour">*</span></label>

                                <select name="category_id" id="choose-category" class="form-control">
                                    <option value="">Choose a category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Percentage</label>

                                <input type="number" class="form-control" placeholder="" name="percentage" id="percentege" placeholder="Percentage">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description<span class="red-colour">*</span></label>

                                <textarea class="form-control" id="" placeholder="Description" name="description" required=""></textarea>
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
                        <h3 class="box-title">Discount For Categories</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered dataTable no-footer" id="ttable" role="grid" aria-describedby="ttable_info">

                            <thead>
                                <tr role="row">
                                    <th style="width: 10%">#</th>
                                    <th style="width: 40%">Category Name</th>
                                    <th style="width: 30%">Percentage</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category_discounts as $key => $discount)
                                <tr role="row" class="odd">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $discount->category->name }}</td>
                                    <td>{{ $discount->percentage }}</td>
                                    <td>
                                        <i class="fa fa-trash btn-sm btn-danger" onclick="deleteCategory({{ $category->id }})"></i>

                                        <a href="{{ route('category.edit', $category->id) }}"><i class="fa fa-edit btn-sm btn-primary"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
        </div>

        <div class="row" id="product">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Discount For Product</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('discount.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category<span class="red-colour">*</span></label>

                                <select name="menu_id" id="choose-product" class="form-control select2">
                                    <option value="">Choose a product</option>
                                    @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Percentage</label>

                                <input type="number" class="form-control" placeholder="" name="percentage" id="percentege" placeholder="Percentage">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description<span class="red-colour">*</span></label>

                                <textarea class="form-control" id="" placeholder="Description" name="description" required=""></textarea>
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
                        <h3 class="box-title">Discount For Products</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered dataTable no-footer" id="ttable" role="grid" aria-describedby="ttable_info">

                            <thead>
                                <tr role="row">
                                    <th style="width: 10%">#</th>
                                    <th style="width: 40%">Product Name</th>
                                    <th style="width: 30%">Percentage</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product_discounts as $key => $discount)
                                <tr role="row" class="odd">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $discount->menu->name }}</td>
                                    <td>{{ $discount->percentage }}</td>
                                    <td>
                                        <i class="fa fa-trash btn-sm btn-danger" onclick="deleteCategory({{ $category->id }})"></i>

                                        <a href="{{ route('category.edit', $category->id) }}"><i class="fa fa-edit btn-sm btn-primary"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </section>
</div>
@endsection

@section('js')
<script>
    $(document).ready(() => {
        $('#choose-category').select2();
        $('#choose-product').select2();

        $('#product').hide();
    });

    var tabs = $('.tabs');
    var selector = $('.tabs').find('a').length;
    //var selector = $(".tabs").find(".selector");
    var activeItem = tabs.find('.active');
    var activeWidth = activeItem.innerWidth();
    $(".selector").css({
        "left": activeItem.position.left + "px",
        "width": activeWidth + "px"
    });

    $(".tabs").on("click", "a", function(e) {
        e.preventDefault();
        $('.tabs a').removeClass("active");
        $(this).addClass('active');
        var activeWidth = $(this).innerWidth();
        var itemPos = $(this).position();
        $(".selector").css({
            "left": itemPos.left + "px",
            "width": activeWidth + "px"
        });
    });

    $('#for-products').click(() => {
        $('#category').hide();
        $('#product').fadeIn();
    });
    $('#for-categories').click(() => {
        $('#product').hide();
        $('#category').fadeIn();
    });
</script>
@endsection