@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 442px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Coupon
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Coupons</a></li>
            <li class="active">Edit Coupon</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-lg-offset-3">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit coupon code <span class="text text-primary">{{ $coupon->code }}</span></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('coupon.update', $coupon->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @method('patch')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Code<span class="red-colour">*</span></label>

                                <input type="text" class="form-control" id="" value="{{ old('code') ?? $coupon->code }}" placeholder="Enter Code: Eg: FIFTEECOUPON" name="code" required="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Percentage</label>

                                <input type="number" class="form-control" placeholder="" name="percentage" id="percentage" placeholder="Percentage" value="{{ old('percentage') ?? $coupon->percentage }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description<span class="red-colour">*</span></label>

                                <textarea class="form-control" id="" placeholder="Description" name="description" required="">{{ old('description') ?? $coupon->description }}</textarea>
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