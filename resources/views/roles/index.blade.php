@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Data Role User</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-warning">
            <div class="box-body">
                    @include('roles.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

