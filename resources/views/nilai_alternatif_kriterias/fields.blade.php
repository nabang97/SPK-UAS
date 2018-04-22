@foreach($alternatifs as $alternatif1)
    @foreach($alternatifs as $alternatif2)

<!-- Bobot Alternatif Field -->
<div class="form-group col-sm-8">
    {!! Form::label('bobot_alternatif', 'Bobot Alternatif:') !!}

    {!! Form::label('alternatif_1_id', $alternatif1['nama']) !!}
    {!! Form::hidden('alternatif_1_id[]', $alternatif1['id'], ['class' => 'form-control']) !!}

    {!! Form::label('alternatif_1_id', 'terhadap') !!}

    {!! Form::label('alternatif_2_id', $alternatif2['nama']) !!}
    {!! Form::hidden('alternatif_2_id[]', $alternatif2['id'], ['class' => 'form-control']) !!}

    {!! Form::hidden('kriteria_id', $id, ['class' => 'form-control']) !!}

    {!! Form::number('bobot_alternatif[]', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.0001']) !!}
</div>

    @endforeach
@endforeach


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('nilaiAlternatifKriterias.index') !!}" class="btn btn-default">Cancel</a>
</div>
