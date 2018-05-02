<!-- Name Field -->
<div class="form-group col-md-6">
    {!! Form::label('password_lama', 'Password Lama:') !!}
    {!! Form::password('password_lama', ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-md-6">
    {!! Form::label('password', 'Password Baru:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Photo Field -->
<div class="form-group col-md-6">
    {!! Form::label('password_confirmation', 'Konfirmasi Password:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Save', ['class' => 'btn btn-warning']) !!}
    <a href="{!! route('profile.index') !!}" class="btn btn-default">Cancel</a>
</div>
