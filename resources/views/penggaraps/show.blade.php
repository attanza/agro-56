@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penggarap
        </h1>
    </section>
    <div class="content">
        <div class="box box-warning">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="thumbnail">
                            <img src="{{$penggarap->photo}}" alt="{{$penggarap->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        {!! $qr !!}
                    </div>
                </div>
                <div class="row">
                    @include('penggaraps.show_fields')
                    <a href="{!! route('penggaraps.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
