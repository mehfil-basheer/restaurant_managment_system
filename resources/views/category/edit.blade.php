@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 442px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Category

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Category</a></li>
            <li class="active">Edit Category</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="rowr">
            <div class="col-md-6 col-centered col-lg-offset-3">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit categoey <span class="text text-primary">{{ $category->name }}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('patch')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name(En)<span class="red-colour">*</span></label>

                                <input type="text" class="form-control" id="" value="{{ old('name') ?? $category->name }}" placeholder="Enter Category Name" name="name" required="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>

                                <input type="file" class="form-control" placeholder="" name="image" id="image" value="{{ old('image') ?? $category->image }}" >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sort Order<span class="red-colour">*</span></label>

                                <input type="number" min="1" class="form-control" id="" placeholder="Enter Sort Order" name="sort_order" value="{{ old('sort_order') ?? $category->sort_order }}">
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
<script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.dataTable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': false
        });
    });

    const deleteCategory = (id) => {
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
                        url: "{{ url('category') }}/" + id,
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                        },
                        success: (res) => {
                            if (res == 1) {
                                swal("The category has been deleted!", {
                                    icon: "success",
                                }).then(() => {
                                    location.reload();
                                });
                            } else if (res == 0) {
                                swal("You can't delete the category!", {
                                    icon: "error",
                                });
                            }
                        }
                    });

                } else {
                    swal("The category is safe!");
                }
            });
    };
</script>

@endsection