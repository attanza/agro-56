@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Pasanga
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-warning">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pasangans.store', 'enctype' => 'multipart/form-data']) !!}

                        @include('pasangans.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
