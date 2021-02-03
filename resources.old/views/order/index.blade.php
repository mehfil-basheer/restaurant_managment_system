@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            All Orders
            <!-- <small>advanced tables</small> -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Orders</a></li>
            <li class="active">All Orders</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th style="width: 164px;">Customer Name</th>
                                                <th style="width: 203px;">Phone</th>
                                                <th style="width: 180px;">Address</th>
                                                <th style="width: 140px;">View Items</th>
                                                <th style="width: 100px;">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row">
                                                <td class="sorting_1">John Doe</td>
                                                <td>9012345678</td>
                                                <td>Address</td>
                                                <td><i class="fa fa-eye btn btn-primary"> 2</i></td>
                                                <td>
                                                    <div class="label label-danger">New</div>
                                                </td>
                                            </tr>
                                            <tr role="row">
                                                <td class="sorting_1">Jane</td>
                                                <td>9012345678</td>
                                                <td>Address</td>
                                                <td><i class="fa fa-eye btn btn-primary"> 4</i></td>
                                                <td>
                                                    <div class="label label-warning">Processing</div>
                                                </td>
                                            </tr>
                                            <tr role="row">
                                                <td class="sorting_1">Jennifer</td>
                                                <td>9012345678</td>
                                                <td>Address</td>
                                                <td><i class="fa fa-eye btn btn-primary"> 1</i></td>
                                                <td>
                                                    <div class="label label-success">Delivered</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <!-- <tr>
                                                <th rowspan="1" colspan="1">Rendering engine</th>
                                                <th rowspan="1" colspan="1">Browser</th>
                                                <th rowspan="1" colspan="1">Platform(s)</th>
                                                <th rowspan="1" colspan="1">Engine version</th>
                                                <th rowspan="1" colspan="1">CSS grade</th>
                                            </tr> -->
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
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
</script>
@endsection