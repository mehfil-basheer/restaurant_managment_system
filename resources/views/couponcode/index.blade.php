@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 442px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Coupons List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Coupons</a></li>
            <li class="active">Coupons List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add new Coupon or Promo Code</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('coupon.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Code<span class="red-colour">*</span></label>

                                <input type="text" class="form-control" id="" value="" placeholder="Enter Code: Eg: FIFTEECOUPON" name="code" required="">
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
                        <h3 class="box-title">Coupons</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered dataTable no-footer" id="ttable" role="grid" aria-describedby="ttable_info">

                            <thead>
                                <tr role="row">
                                    <th style="width: 10%">#</th>
                                    <th style="width: 40%">Coupon Code</th>
                                    <th style="width: 30%">Discount</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($coupons as $key => $coupon)
                                <tr role="row" class="odd">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $coupon->code }}</td>
                                    <td>{{ $coupon->percentage }}</td>
                                    <td>
                                        <i class="fa fa-trash btn-sm btn-danger" onclick="deleteCoupon({{ $coupon->id }})"></i>

                                        <a href="{{ route('coupon.edit', $coupon->id) }}"><i class="fa fa-edit btn-sm btn-primary"></i></a>
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

    const deleteCoupon = (id) => {
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
                        url: "{{ url('coupon') }}/" + id,
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                        },
                        success: (res) => {
                            if (res == 1) {
                                swal("The Coupon Code has been deleted!", {
                                    icon: "success",
                                }).then(() => {
                                    location.reload();
                                });
                            } else if (res == 0) {
                                swal("You can't delete the Coupon Code!", {
                                    icon: "error",
                                });
                            }
                        }
                    });

                } else {
                    swal("The Coupon Code is safe!");
                }
            });
    };
</script>

@endsection