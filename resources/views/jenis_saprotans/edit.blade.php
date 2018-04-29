@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jenis Saprotan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-warning">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jenisSaprotan, ['route' => ['jenisSaprotans.update', $jenisSaprotan->id], 'method' => 'patch']) !!}

                        @include('jenis_saprotans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection