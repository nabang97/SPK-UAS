@foreach($kriterias as $kriteria1)
    @foreach($kriterias as $kriteria2)

        <div class="form-group col-sm-3">
            {!! Form::label('bobot_kriteria', 'Bobot Kriteria:') !!}

            {!! Form::label('kriteria_1_id', $kriteria1['nama_kriteria']) !!}
            {!! Form::hidden('kriteria_1_id[]', $kriteria1['id'], ['class' => 'form-control']) !!}

            {!! Form::label('keterangan', 'terhadap') !!}

            {!! Form::label('kriteria_2_id', $kriteria2['nama_kriteria']) !!}
            {!! Form::hidden('kriteria_2_id[]', $kriteria2['id'], ['class' => 'form-control']) !!}

            {!! Form::number('bobot_kriteria[]', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.0001']) !!}
        </div>
    @endforeach
@endforeach

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('nilaiKriterias.index') !!}" class="btn btn-default">Cancel</a>
</div>
