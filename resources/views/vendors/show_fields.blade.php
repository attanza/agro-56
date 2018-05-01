<!-- Nama Field -->
<div class="form-group col-md-6">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{!! $vendor->nama !!}</p>
</div>

<!-- Alamat Field -->
<div class="form-group col-md-6">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{!! $vendor->alamat !!}</p>
</div>

<!-- Telpon Field -->
<div class="form-group col-md-6">
    {!! Form::label('telpon', 'Telpon:') !!}
    <p>{!! $vendor->telpon !!}</p>
</div>

<!-- Npwp Field -->
<div class="form-group col-md-6">
    {!! Form::label('npwp', 'Npwp:') !!}
    <p>
        @if($vendor->npwp_file != "")
            <a href="{{$vendor->npwp_file}}" target="_blank">{{ $vendor->npwp }}<</a>
        @else
            {{ $vendor->npwp }}
        @endif
    </p>
</div>

<!-- Siup Field -->
<div class="form-group col-md-6">
    {!! Form::label('siup', 'Siup:') !!}
    <p>
        @if($vendor->siup_file != "")
            <a href="{{$vendor->siup_file}}" target="_blank">{{ $vendor->siup }}<</a>
        @else
            {{ $vendor->siup }}
        @endif
    </p>
</div>

<!-- Tdp Field -->
<div class="form-group col-md-6">
    {!! Form::label('tdp', 'Tdp:') !!}
    <p>
        @if($vendor->tdp_file != "")
            <a href="{{$vendor->tdp_file}}" target="_blank">{{ $vendor->tdp }}<</a>
        @else
            {{ $vendor->tdp }}
        @endif
    </p>
</div>

<!-- Jenis Saprotan Field -->
<div class="form-group col-md-6">
    {!! Form::label('jenis_saprotan', 'Saprotan:') !!}
    <p>{!! $vendor->jenis->nama !!}</p>
</div>

<!-- Harga Field -->
<div class="form-group col-md-6">
    {!! Form::label('harga', 'Harga:') !!}
    <p>{!! $vendor->harga !!}</p>
</div>

<!-- Nama Penganggung Jawab Field -->
<div class="form-group col-md-6">
    {!! Form::label('nama_penganggung_jawab', 'Nama Penganggung Jawab:') !!}
    <p>{!! $vendor->nama_penganggung_jawab !!}</p>
</div>

<!-- Posisi Penanggung Jawab Field -->
<div class="form-group col-md-6">
    {!! Form::label('posisi_penanggung_jawab', 'Posisi Penanggung Jawab:') !!}
    <p>{!! $vendor->posisi_penanggung_jawab !!}</p>
</div>

<!-- Alamat Penanggung Jawab Field -->
<div class="form-group col-md-6">
    {!! Form::label('alamat_penanggung_jawab', 'Alamat Penanggung Jawab:') !!}
    <p>{!! $vendor->alamat_penanggung_jawab !!}</p>
</div>

<!-- No Telpon Penanggung Jawab Field -->
<div class="form-group col-md-6">
    {!! Form::label('no_telpon_penanggung_jawab', 'No Telpon Penanggung Jawab:') !!}
    <p>{!! $vendor->no_telpon_penanggung_jawab !!}</p>
</div>
