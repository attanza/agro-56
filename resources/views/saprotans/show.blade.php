@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Saprotan
        </h1>
    </section>
    <div class="content">
        <div class="box box-warning">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('saprotans.show_fields')
                    <a href="{!! route('saprotans.index') !!}" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
