<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{!! $saprotan->nama !!}</p>
</div>

<!-- Jenis Id Field -->
<div class="form-group">
    {!! Form::label('jenis_id', 'Jenis Id:') !!}
    <p>{!! $saprotan->jenis->nama !!}</p>
</div>

<!-- Merk Field -->
<div class="form-group">
    {!! Form::label('merk', 'Merk:') !!}
    <p>{!! $saprotan->merk !!}</p>
</div>

<!-- Satuan Field -->
<div class="form-group">
    {!! Form::label('satuan', 'Satuan:') !!}
    <p>{!! $saprotan->satuan !!}</p>
</div>

<!-- Harga Satuan Field -->
<div class="form-group">
    {!! Form::label('harga_satuan', 'Harga Satuan:') !!}
    <p>{!! $saprotan->harga_satuan !!}</p>
</div>
