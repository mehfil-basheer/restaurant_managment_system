@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 442px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Menus
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Menus</a></li>
            <li class="active">Edit Menu</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-lg-offset-3">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit <span class="text text-primary">{{ $menu->name }}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('patch')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name <span class="red-colour">*</span></label>

                                <input type="text" class="form-control" id="" value="{{ old('name') ?? $menu->name }}" placeholder="Enter Item Name" name="name" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category <span class="red-colour">*</span></label>
                                <select name="category_id" id="menu-category" class="form-control">
                                    <option value="">Select a Category</option>
                                    @foreach($categories as $key => $category)
                                    <option value="{{$category->id}}" @if($category->id == $menu->category_id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Price per Item<span class="red-colour">*</span></label>

                                <input type="number" min="1" class="form-control" id="" value="{{ old('price') ?? $menu->price }}" placeholder="Enter Price per unit" name="price" required="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>

                                <textarea name="description" class="form-control" id="" name="description" placeholder="Description">{{ old('description') ?? $menu->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>

                                <input type="file" class="form-control" placeholder="" name="image" id="image" value="{{ old('image') ?? $menu->image }}" </div> <div class="form-group">
                                <label for="exampleInputEmail1">Sort Order<span class="red-colour">*</span></label>

                                <input type="number" min="1" class="form-control" id="" value="{{ old('sort_order') ?? $menu->sort_order }}" placeholder="Enter Sort Order" name="sort_order" required="">
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


        </div>
</div>
</section>

</div>
@endsection

@section('js')
<script>
    $(document).ready(() => {
        $('#menu-category').select2();
    });
</script>
@endsection