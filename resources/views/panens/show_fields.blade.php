
<!-- Nama Field -->
<div class="form-group col-md-6">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $panen->nama }}</p>
</div>

<!-- Penggarap -->
<div class="form-group col-md-6">
    {!! Form::label('penggarap_id', 'Penggarap Id:') !!}
    <p>{{ $panen->penggarap->nama }}</p>
</div>

<!-- Tanggal Field -->
<div class="form-group col-md-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{{ $panen->tanggal->format('d M Y') }}</p>
</div>

<!-- Komoditi Id Field -->
<div class="form-group col-md-6">
    {!! Form::label('komoditi_id', 'Komoditas:') !!}
    <p>{{ $panen->komoditi->nama }}</p>
</div>

<!-- Jumlah Field -->
<div class="form-group col-md-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    <p>{{ $panen->jumlah }}</p>
</div>

<!-- Harga Field -->
<div class="form-group col-md-6">
    {!! Form::label('harga', 'Harga:') !!}
    <p>{{ number_format($panen->harga) }}</p>
</div>

<!-- Jumlah Field -->
<div class="form-group col-md-6">
    {!! Form::label('jumlah', 'Jumlah Pembayaran:') !!}
    <p>{{ number_format($panen->pembayaran) }}</p>
</div>


