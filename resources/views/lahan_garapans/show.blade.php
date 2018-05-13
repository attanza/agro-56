@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lahan Garapan
        </h1>
    </section>
    <div class="content">
        <div class="box box-warning">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('lahan_garapans.show_fields')
                    <a href="{!! route('lahanGarapans.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
