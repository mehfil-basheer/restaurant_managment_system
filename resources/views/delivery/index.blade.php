@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 442px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Delivery Locations

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Settings</a></li>
            <li class="active">Delivery</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Delivery Management</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-10">
                            <label for="">Will you deliver Indoor(to table)</label>
                            <input type="checkbox" name="indoor" id="delivery-indoor">
                        </div>

                        <div class="col-2">
                            <label for="">Will you deliver Outdoor</label>
                            <input type="checkbox" name="indoor" id="delivery-outdoor">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('js')
<script>
    $(document).ready(() => {
        $('#delivery-indoor').change(() => {
            var outdoor = $('#delivery-outdoor').is(":checked") ? 1 : 0;
            var indoor = $('#delivery-indoor').is(":checked") ? 1 : 0;

            $.ajax({
                url: '{{ route('delivery-location.settings') }}',
                method: 'POST',
                data: {
                    indoor: indoor,
                    outdoor: outdoor,
                    _token: '{{ csrf_token() }}'
                },
                success: (res) => {
                    alert(res);
                }
            });
        });

        $('#delivery-outdoor').change(() => {
            var outdoor = $('#delivery-outdoor').is(":checked") ? 1 : 0;
            var indoor = $('#delivery-indoor').is(":checked") ? 1 : 0;

            alert(outdoor);
            alert(indoor);
        });
    });
</script>
@endsection