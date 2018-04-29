<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_id', 'Jenis:') !!}
    <select name="jenis_id" id="jenis_id" class="form-control">
        @foreach ($jenis as $j)
            <option value="{{$j->id}}">{{$j->nama}}</option>
        @endforeach
    </select>
</div>

<!-- Merk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('merk', 'Merk:') !!}
    {!! Form::text('merk', null, ['class' => 'form-control']) !!}
</div>

<!-- Satuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('satuan', 'Satuan:') !!}
    {!! Form::text('satuan', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Satuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_satuan', 'Harga Satuan:') !!}
    {!! Form::number('harga_satuan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <a href="{!! route('saprotans.index') !!}" class="btn btn-default">
        <i class="fa fa-arrow-left"></i>
    </a>
    {!! Form::submit('Save', ['class' => 'btn btn-warning pull-right']) !!}
</div>
