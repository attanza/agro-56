@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Change Password
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-warning">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['profile.update-password', $user->id], 'method' => 'put']) !!}

                        @include('profile.change_password_form')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection