<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{!! $role->nama !!}</p>
</div>

<!-- Permissions Field -->
<div class="form-group">
    {!! Form::label('permissions', 'Permissions:') !!}
    <p>{!! $role->permissions !!}</p>
</div>
