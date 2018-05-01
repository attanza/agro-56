<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Penggarap Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penggarap_id', 'Penggarap:') !!}
    <select name="penggarap_id" id="penggarap_id" class="form-control">
        @foreach ($penggaraps as $r)
            <option value="{{$r->id}}">{{$r->nama}}</option>
        @endforeach
    </select>
</div>

<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::text('tanggal', null, ['class' => 'form-control']) !!}
</div>

<!-- Komoditi Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('komoditi_id', 'Komoditi:') !!}
    <select name="komoditi_id" id="komoditi_id" class="form-control">
        @foreach ($komoditas as $r)
            <option value="{{$r->id}}">{{$r->nama}}</option>
        @endforeach
    </select>
</div>

<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::number('jumlah', null, ['class' => 'form-control', 'v-model' => 'jumlah']) !!}
</div>

<!-- Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga', 'Harga:') !!}
    {!! Form::number('harga', null, ['class' => 'form-control', 'v-model' => 'harga']) !!}
</div>

<!-- Pembayaran Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pembayaran', 'Jumlah Pembayaran:') !!}
    {!! Form::number('pembayaran', null, ['class' => 'form-control', 'v-model' => 'pembayaran']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <a href="{!! route('panens.index') !!}" class="btn btn-default">Cancel</a>
    {!! Form::submit('Save', ['class' => 'btn btn-warning pull-right']) !!}
</div>
