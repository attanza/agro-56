<!-- Nip Field -->
<div class="form-group col-md-6">
    {!! Form::label('nip', 'Nip:') !!}
    <p>{{ $penggarap->nip }}</p>
</div>

<!-- Nama Field -->
<div class="form-group col-md-6">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{{ $penggarap->nama }}</p>
</div>

<!-- Ktp Field -->
<div class="form-group col-md-6">
    {!! Form::label('ktp', 'Ktp:') !!}
    <p>
        @if($penggarap->ktp_file != "")
            <a href="{{$penggarap->ktp_file}}" target="_blank">{{ $penggarap->ktp }}<</a>
        @else
            {{ $penggarap->ktp }}
        @endif
    </p>
</div>

<!-- Kk Field -->
<div class="form-group col-md-6">
    {!! Form::label('kk', 'Kk:') !!}
    <p>
        @if($penggarap->kk_file != "")
            <a href="{{$penggarap->kk_file}}" target="_blank">{{ $penggarap->kk }}<</a>
        @else
            {{ $penggarap->kk }}
        @endif
    </p>
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-md-6">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    <p>{{ $penggarap->jenis_kelamin }}</p>
</div>

<!-- Status Pernikahan Field -->
<div class="form-group col-md-6">
    {!! Form::label('status_pernikahan', 'Status Pernikahan:') !!}
    <p>{{ $penggarap->status_pernikahan }}</p>
</div>

<!-- Telpon Field -->
<div class="form-group col-md-6">
    {!! Form::label('telpon', 'Telpon:') !!}
    <p>{{ $penggarap->telpon }}</p>
</div>

<!-- Email Field -->
<div class="form-group col-md-6">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $penggarap->email }}</p>
</div>

<!-- Status Field -->
<div class="form-group col-md-6">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $penggarap->status }}</p>
</div>

<!-- Alamat Field -->
<div class="form-group col-md-6">
    {!! Form::label('alamat', 'Alamat:') !!}
    <p>{{ $penggarap->alamat }}</p>
</div>
