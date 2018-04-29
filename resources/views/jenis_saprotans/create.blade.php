@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jenis Saprotan
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-warning">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'jenisSaprotans.store']) !!}

                        @include('jenis_saprotans.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
