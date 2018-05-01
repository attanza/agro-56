@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Data Panen</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-warning">
            <div class="box-body">
                    @include('panens.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

