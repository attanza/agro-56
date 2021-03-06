@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vendor
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-warning">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'vendors.store', 'enctype' => 'multipart/form-data']) !!}

                        @include('vendors.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
