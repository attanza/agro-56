@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Saprotan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-warning">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($saprotan, ['route' => ['saprotans.update', $saprotan->id], 'method' => 'patch']) !!}

                        @include('saprotans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection