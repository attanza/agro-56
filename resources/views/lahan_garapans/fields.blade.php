<!-- Penggarap Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penggarap_id', 'Penggarap:') !!}
    <select name="penggarap_id" id="penggarap_id" class="form-control">
        @foreach ($penggaraps as $p)
            <option value="{{$p->id}}">{{$p->nama}}</option>
        @endforeach
    </select>
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>

<!-- Luas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('luas', 'Luas:') !!}
    {!! Form::number('luas', null, ['class' => 'form-control']) !!}
</div>

<!-- Satuan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('satuan', 'Satuan:') !!}
    {!! Form::text('satuan', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-warning']) !!}
    <a href="{!! route('lahanGarapans.index') !!}" class="btn btn-default">Cancel</a>
</div>
