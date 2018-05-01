<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, [
        'class' => 'form-control',
        'v-model' => 'nama'
    ]) !!}
</div>

<!-- Slug Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, [
        'class' => 'form-control',
        'v-model' => 'slug'        
        ]) !!}
</div>

<!-- Permissions Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permissions', 'Permissions:') !!}
    {!! Form::text('permissions', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
    {!! Form::submit('Save', ['class' => 'btn btn-warning pull-right']) !!}
</div>
