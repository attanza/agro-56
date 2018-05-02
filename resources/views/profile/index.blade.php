@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ $user->name }}
        </h1>
    </section>
    <div class="content">
        <div class="box box-warning">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="thumbnail">
                            <img src="{{$user->photo}}" alt="{{$user->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        @include('profile.show_fields')
                        <a href="{!! route('profile.edit', $user->id) !!}" class="btn btn-default pull-right">
                            <i class="fa fa-edit"></i>
                        </a>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
