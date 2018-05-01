@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jenis Saprotan
        </h1>
    </section>
    <div class="content">
        <div class="box box-warning">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        @include('jenis_saprotans.show_fields')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{!! route('jenisSaprotans.index') !!}" class="btn btn-default">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        <a href="{!! route('jenisSaprotans.edit', $jenisSaprotan->id) !!}" class="btn btn-warning pull-right">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
