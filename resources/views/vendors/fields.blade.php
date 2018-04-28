<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Telpon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telpon', 'Telpon:') !!}
    {!! Form::text('telpon', null, ['class' => 'form-control']) !!}
</div>

<!-- Npwp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('npwp', 'Npwp:') !!}
    {!! Form::text('npwp', null, ['class' => 'form-control']) !!}
</div>

<!-- Siup Field -->
<div class="form-group col-sm-6">
    {!! Form::label('siup', 'Siup:') !!}
    {!! Form::text('siup', null, ['class' => 'form-control']) !!}
</div>

<!-- Tdp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tdp', 'Tdp:') !!}
    {!! Form::text('tdp', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Saprotan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_saprotan', 'Jenis Saprotan:') !!}
    {{-- {!! Form::select('jenis_saprotan', ], null, ['class' => 'form-control']) !!} --}}
    <select name="jenis_saprotan" id="jenis_saprotan" class="form-control">
        @foreach ($jenis as $j)
            <option value="{{$j->id}}">{{$j->nama}}</option>
        @endforeach
    </select>
</div>

<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::number('harga', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Penganggung Jawab Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_penganggung_jawab', 'Nama Penganggung Jawab:') !!}
    {!! Form::text('nama_penganggung_jawab', null, ['class' => 'form-control']) !!}
</div>

<!-- Posisi Penanggung Jawab Field -->
<div class="form-group col-sm-6">
    {!! Form::label('posisi_penanggung_jawab', 'Posisi Penanggung Jawab:') !!}
    {!! Form::text('posisi_penanggung_jawab', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Penanggung Jawab Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat_penanggung_jawab', 'Alamat Penanggung Jawab:') !!}
    {!! Form::text('alamat_penanggung_jawab', null, ['class' => 'form-control']) !!}
</div>

<!-- No Telpon Penanggung Jawab Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_telpon_penanggung_jawab', 'No Telpon Penanggung Jawab:') !!}
    {!! Form::text('no_telpon_penanggung_jawab', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('vendors.index') !!}" class="btn btn-default">Cancel</a>
</div>
