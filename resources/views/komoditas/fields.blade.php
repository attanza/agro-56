<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Satuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('satuan', 'Satuan:') !!}
    {!! Form::text('satuan', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::number('harga', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-warning']) !!}
    <a href="{!! route('komoditas.index') !!}" class="btn btn-default">Back</a>
</div>
