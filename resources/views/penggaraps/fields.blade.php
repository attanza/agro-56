<!-- Nip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nip', 'Nip:') !!}
    {!! Form::text('nip', null, ['class' => 'form-control']) !!}
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

<!-- Kk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kk', 'Kk:') !!}
    {!! Form::text('kk', null, ['class' => 'form-control']) !!}
</div>

<!-- Kk File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kk_file', 'Kk File:') !!}
    {!! Form::file('kk_file') !!}
</div>
<div class="clearfix"></div>

<!-- Jenis Kelamin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:') !!}
    {!! Form::select('jenis_kelamin', ['Pria' => 'Pria', 'Wanita' => 'Wanita'], null, ['class' => 'form-control']) !!}
</div>

<!-- Status Pernikahan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_pernikahan', 'Status Pernikahan:') !!}
    {!! Form::select('status_pernikahan', ['Menikah' => 'Menikah', 'Lajang' => 'Lajang'], null, ['class' => 'form-control']) !!}
</div>

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

<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::file('photo') !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['Aktif' => 'Aktif', 'Non Aktif' => 'Non Aktif'], null, ['class' => 'form-control']) !!}
</div>

<div class="clearfix"></div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control', 'rows' => 3]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <a href="{!! route('penggaraps.index') !!}" class="btn btn-default">
        <i class="fa fa-arrow-left"></i>
    </a>
    {!! Form::submit('Save', ['class' => 'btn btn-warning pull-right']) !!}
</div>
