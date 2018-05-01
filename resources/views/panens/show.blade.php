@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Panen
        </h1>
    </section>
    <div class="content">
        <div class="box box-warning">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('panens.show_fields')
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{!! route('panens.index') !!}" class="btn btn-default">
                            <i class ="fa fa-arrow-left"></i>
                        </a>
                        <a href="{!! route('panens.edit', $panen->id) !!}" class="btn btn-warning pull-right">
                            <i class ="fa fa-pencil"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
