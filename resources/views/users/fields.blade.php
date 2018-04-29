<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nama:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>


<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', 'Status Aktif:') !!}
    {!! Form::select('is_active', [1 => 'Aktif', 0 => 'Non Aktif'], null, ['class' => 'form-control']); !!}
</div>

<!-- Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Role', 'Role Id:') !!}
    <select name="role_id" id="role_id" class="form-control">
        @foreach ($roles as $r)
            <option value="{{$r->id}}">{{$r->nama}}</option>
        @endforeach
    </select>
</div>

<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::file('photo') !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-warning']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
