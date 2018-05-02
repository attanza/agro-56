@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ $user->name }}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-warning">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['profile.update', $user->id], 'method' => 'patch','enctype' => 'multipart/form-data']) !!}

                        @include('profile.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection