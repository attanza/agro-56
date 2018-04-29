@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            User
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
                        @include('users.show_fields')
                        <a href="{!! route('users.index') !!}" class="btn btn-warning">
                            <i class="fa fa-arrow-left"></i>
                        </a>   
                        <a href="{!! route('users.edit', $user->id) !!}" class="btn btn-default pull-right">
                            <i class="fa fa-edit"></i>
                        </a>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
