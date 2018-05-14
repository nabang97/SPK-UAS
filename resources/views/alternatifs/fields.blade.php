<div class="form-group col-sm-6">
    {!! Form::label('kec', 'Kecamatan:') !!}
    {!! Form::select('kec_id', $pilihKec, null, ['class' => 'form-control']) !!}
</div>
<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('alternatifs.index') !!}" class="btn btn-default">Cancel</a>
</div>
