@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ $pasangan->nama }}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-warning">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pasangan, ['route' => ['pasangans.update', $pasangan->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('pasangans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection