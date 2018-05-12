@foreach($kriterias as $kriteria1)
    <div class="form-group col-sm-6">
        @foreach($kriterias as $kriteria2)

            @if($kriteria1['id'] == $kriteria2['id'])
                {!! Form::hidden('kriteria_1_id[]', $kriteria1['id'], ['class' => 'form-control']) !!}
                {!! Form::hidden('kriteria_2_id[]', $kriteria2['id'], ['class' => 'form-control']) !!}
                {!! Form::hidden('bobot_kriteria[]', 1, ['class' => 'form-control', 'min' => '0', 'step' => '0.0001']) !!}
            @else
                {!! Form::hidden('kriteria_1_id[]', $kriteria1['id'], ['class' => 'form-control']) !!}

                {!! Form::hidden('kriteria_2_id[]', $kriteria2['id'], ['class' => 'form-control']) !!}

                {!! Form::number('bobot_kriteria[]', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.0001', 'placeholder' => $kriteria1['nama_kriteria'].' terhadap '.$kriteria2['nama_kriteria'] ]) !!}

            @endif

        @endforeach
    </div>
@endforeach

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('nilaiKriterias.index') !!}" class="btn btn-default">Cancel</a>
</div>
