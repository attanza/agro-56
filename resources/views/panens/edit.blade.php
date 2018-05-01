@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Panen
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-warning">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($panen, ['route' => ['panens.update', $panen->id], 'method' => 'patch']) !!}

                        @include('panens.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@section('scripts')
<script>
$( document ).ready(function() {
    var $j = jQuery.noConflict();
    $("#tanggal").datepicker({
        format: 'yyyy-mm-dd'
    })
});
const app = new Vue({
    el: '#app',
    data: {
        jumlah: {{ $panen->jumlah }} || '',
        harga: {{ $panen->harga }} || '',
        pembayaran: {{ $panen->pembayaran }} || ''
    },
    watch: {
        jumlah() {
            if(this.jumlah > 0 && this.harga > 0) {
                this.pembayaran = this.jumlah * this.harga
            }
        },
        harga() {
            if(this.jumlah > 0 && this.harga > 0) {
                this.pembayaran = this.jumlah * this.harga
            }
        }
    }
});
</script>
@endsection