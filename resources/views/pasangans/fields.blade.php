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

<!-- Ktp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ktp', 'Ktp:') !!}
    {!! Form::text('ktp', null, ['class' => 'form-control']) !!}
</div>

<!-- Ktp File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ktp_file', 'Ktp File:') !!}
    {!! Form::file('ktp_file') !!}
</div>
<div class="clearfix"></div>

<!-- Telpon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telpon', 'Telpon:') !!}
    {!! Form::text('telpon', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    {!! Form::select('jenis_kelamin', ['Pria' => 'Pria', 'Wanita' => 'Wanita'], null, ['class' => 'form-control']) !!}
</div>

<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::file('photo') !!}
</div>
<div class="clearfix"></div>

<!-- No Surat Nikah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_surat_nikah', 'No Surat Nikah:') !!}
    {!! Form::text('no_surat_nikah', null, ['class' => 'form-control']) !!}
</div>

<!-- Surat Nikah File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('surat_nikah_file', 'Surat Nikah File:') !!}
    {!! Form::file('surat_nikah_file') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pasangans.index') !!}" class="btn btn-default">Cancel</a>
</div>
