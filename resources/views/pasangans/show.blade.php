@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pasangan
        </h1>
    </section>
    <div class="content">
        <div class="box box-warning">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="thumbnail">
                            <img src="{{ $pasangan->photo }}" alt="{{ $pasangan->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        @include('pasangans.show_fields')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{!! route('pasangans.index') !!}" class="btn btn-default">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        <a href="{!! route('pasangans.edit', $pasangan->id) !!}" class="btn btn-warning pull-right">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
