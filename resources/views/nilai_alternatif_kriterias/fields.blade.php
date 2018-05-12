@foreach($alternatifs as $alternatif1)
    <div class="form-group col-sm-8">
    @foreach($alternatifs as $alternatif2)

        @if($alternatif1['id'] == $alternatif2['id'])
                {!! Form::hidden('alternatif_1_id[]', $alternatif1['id'], ['class' => 'form-control']) !!}
                {!! Form::hidden('alternatif_2_id[]', $alternatif2['id'], ['class' => 'form-control']) !!}
                {!! Form::hidden('kriteria_id', $id, ['class' => 'form-control']) !!}
                {!! Form::hidden('bobot_alternatif[]', 1, ['class' => 'form-control', 'min' => '0', 'step' => '0.0001', 'placeholder' => $alternatif1['nama'].' terhadap '.$alternatif2['nama'] ]) !!}
        @else
            {!! Form::hidden('alternatif_1_id[]', $alternatif1['id'], ['class' => 'form-control']) !!}
            {!! Form::hidden('alternatif_2_id[]', $alternatif2['id'], ['class' => 'form-control']) !!}
            {!! Form::hidden('kriteria_id', $id, ['class' => 'form-control']) !!}
            {!! Form::number('bobot_alternatif[]', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.0001', 'placeholder' => $alternatif1['nama'].' terhadap '.$alternatif2['nama'] ]) !!}
        @endif

    @endforeach
    </div>
@endforeach


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('nilaiAlternatifKriterias.index') !!}" class="btn btn-default">Cancel</a>
</div>
