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
                    <a href="{!! route('panens.index') !!}" class="btn btn-default">
                        <i class ="fa fa-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
