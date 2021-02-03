@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 442px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Menus
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Menus</a></li>
            <li class="active">Menu List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add new Item</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name <span class="red-colour">*</span></label>

                                <input type="text" class="form-control" id="" value="" placeholder="Enter Category Name" name="name" required="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category <span class="red-colour">*</span></label>
                                <select name="category_id" id="menu-category" class="form-control">
                                    <option value="">Select a Category</option>
                                    @foreach($categories as $key => $category)
                                    <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Price per Item<span class="red-colour">*</span></label>

                                <input type="number" min="1" class="form-control" id=""  placeholder="Enter Price per unit" name="price" required="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>

                                <textarea name="description" class="form-control" id="" name="description" placeholder="Description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>

                                <input type="file" class="form-control" placeholder="" name="image" id="image">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sort Order<span class="red-colour">*</span></label>

                                <input type="number" min="1" class="form-control" id="" value="" placeholder="Enter Sort Order" name="sort_order" required="">
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
                        <h3 class="box-title">Menu</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered dataTable no-footer" id="ttable" role="grid" aria-describedby="ttable_info">

                            <thead>
                                <tr role="row">
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th style="width: 86px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menus as $key => $menu)
                                <tr role="row" class="odd">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $menu->name }}</td>
                                    <td>{{ $menu->category->name }}</td>
                                    <td>{{ $menu->price }}</td>
                                    <td>
                                        <i class="fa fa-trash btn-sm btn-danger" onclick="deleteMenu({{ $menu->id }})"></i>

                                        <a href="{{ route('menu.edit', $menu->id) }}"><i class="fa fa-edit btn-sm btn-primary"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->


        </div>
</div>
</section>

</div>
@endsection

@section('js')

<script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(document).ready(() => {
        $('#menu-category').select2();

        $('.dataTable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': false
        });
    });

    const deleteMenu = (id) => {
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: 'DELETE',
                        url: "{{ url('menu') }}/" + id,
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                        },
                        success: (res) => {
                            if (res == 1) {
                                swal("The Menu has been deleted!", {
                                    icon: "success",
                                }).then(() => {
                                    location.reload();
                                });
                            } else if (res == 0) {
                                swal("You can't delete the Menu!", {
                                    icon: "error",
                                });
                            }
                        }
                    });

                } else {
                    swal("The Menu is safe!");
                }
            });
    };
</script>
@endsection
