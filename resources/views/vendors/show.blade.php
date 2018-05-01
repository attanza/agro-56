@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vendor
        </h1>
    </section>
    <div class="content">
        <div class="box box-warning">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('vendors.show_fields')
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{!! route('vendors.index') !!}" class="btn btn-default">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        <a href="{!! route('vendors.edit', $vendor->id) !!}" class="btn btn-warning pull-right">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
