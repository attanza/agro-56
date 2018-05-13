<!-- Penggarap Id Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('penggarap_id', 'Penggarap:') !!}
        <p>{!! $lahanGarapan->penggarap->nama !!}</p>
    </div>
</div>


<!-- Nama Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('nama', 'Nama:') !!}
        <p>{!! $lahanGarapan->nama !!}</p>
    </div>
</div>

<!-- Alamat Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('alamat', 'Alamat:') !!}
        <p>{!! $lahanGarapan->alamat !!}</p>
    </div>
</div>

<!-- Lat Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('luas', 'Luas:') !!}
        <p>{!! $lahanGarapan->luas !!}</p>
    </div>
</div>

<!-- Lng Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('satuan', 'Satuan:') !!}
        <p>{!! $lahanGarapan->satuan !!}</p>
    </div>
</div>

<!-- Keterangan Field -->
<div class="col-md-6">
    <div class="form-group">
        {!! Form::label('keterangan', 'Keterangan:') !!}
        <p>{!! $lahanGarapan->keterangan !!}</p>
    </div>
</div>
