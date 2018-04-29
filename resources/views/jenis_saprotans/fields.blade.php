<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <a href="{!! route('jenisSaprotans.index') !!}" class="btn btn-default">
        <i class="fa fa-arrow-left"></i>        
    </a>
    {!! Form::submit('Save', ['class' => 'btn btn-warning pull-right']) !!}
</div>
