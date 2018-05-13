@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lahan Garapan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-warning">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($lahanGarapan, ['route' => ['lahanGarapans.update', $lahanGarapan->id], 'method' => 'patch']) !!}

                        @include('lahan_garapans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection