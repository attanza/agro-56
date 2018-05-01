<!-- Nama Field -->
<div class="form-group col-md-6 col-md-6">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $pasangan->nama }}</p>
</div>

<!-- Ktp Field -->
<div class="form-group col-md-6">
    {!! Form::label('ktp', 'Ktp:') !!}
    <p>
        @if($pasangan->ktp_file != "")
        <a href="{{$pasangan->ktp_file}}" target="_blank">
            {{ $pasangan->ktp }}
        </a>
        @else {{ $pasangan->ktp }} @endif
    </p>
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-md-6">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    <p>{{ $pasangan->jenis_kelamin }}</p>
</div>

<!-- Telpon Field -->
<div class="form-group col-md-6">
    {!! Form::label('telpon', 'Telpon:') !!}
    <p>{{ $pasangan->telpon }}</p>
</div>

<!-- Email Field -->
<div class="form-group col-md-6">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $pasangan->email }}</p>
</div>

<!-- Penggarap -->
<div class="form-group col-md-6">
    {!! Form::label('pasangan', 'Nama Pasangan:') !!}
    <p>{{ $pasangan->penggarap->nama }}</p>
</div>

<!-- No Surat Nikah Field -->
<div class="form-group col-md-6">
    {!! Form::label('no_surat_nikah', 'No Surat Nikah:') !!}
    <p>
        @if($pasangan->surat_nikah_file != "")
        <a href="{{$pasangan->surat_nikah_file}}" target="_blank">
            {{ $pasangan->no_surat_nikah }}
        </a>
        @else {{ $pasangan->no_surat_nikah }} 
        @endif
    </p>
</div>