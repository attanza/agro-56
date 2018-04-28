@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Komoditas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($komoditas, ['route' => ['komoditas.update', $komoditas->id], 'method' => 'patch']) !!}

                        @include('komoditas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection