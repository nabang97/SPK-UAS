<table class="table table-responsive" id="nilaiAlternatifKriterias-table">
    <thead>
        <tr>
            <th>Kriteria</th>
            <th>Alternatif 1</th>
            <th>Alternatif 2</th>
            <th>Bobot Alternatif</th>
            <th>Normalisasi Alernatif</th>
            <th>Rata-rata Alternatif</th>
            {{--<th colspan="3">Action</th>--}}
        </tr>
    </thead>
    <tbody>
    @foreach($nilaiAlternatifKriterias as $nilaiAlternatifKriteria)
        <tr>
            @php
                if(!isset($baseKriteria)){
                    $baseKriteria = $nilaiAlternatifKriteria->kriteria_id;
                    echo "<td><b>".$nilaiAlternatifKriteria->kriteria->nama_kriteria."</b></td>";
                }else{
                    if($baseKriteria != $nilaiAlternatifKriteria->kriteria_id){
                        $baseKriteria = $nilaiAlternatifKriteria->kriteria_id;
                        echo "<td><b>".$nilaiAlternatifKriteria->kriteria->nama_kriteria."</b></td>";
                    }else{
                        echo "<td></td>";
                    }
                }
            @endphp
            @php
                if(!isset($baseAlt1)){
                    $baseAlt1 = $nilaiAlternatifKriteria->alternatif1->nama;
                    echo "<td>".$nilaiAlternatifKriteria->alternatif1->nama."</td>";
                }else{
                    if($baseAlt1 != $nilaiAlternatifKriteria->alternatif1->nama){
                        $baseAlt1 = $nilaiAlternatifKriteria->alternatif1->nama;
                        echo "<td>".$nilaiAlternatifKriteria->alternatif1->nama."</td>";
                    }else{
                        echo "<td></td>";
                    }
                }
            @endphp
            {{--<td>{!! $nilaiAlternatifKriteria->alternatif1->nama !!}</td>--}}
            <td>{!! $nilaiAlternatifKriteria->alternatif2->nama !!}</td>
            <td>{!! $nilaiAlternatifKriteria->bobot_alternatif !!}</td>
            <td>{!! $nilaiAlternatifKriteria->norm_alternatif !!}</td>
            @php
                if(!isset($base)){
                    $base = $nilaiAlternatifKriteria->rata_alternatif_kriteria;
                    echo "<td>".$nilaiAlternatifKriteria->rata_alternatif_kriteria."</td>";
                }else{
                    if($base != $nilaiAlternatifKriteria->rata_alternatif_kriteria){
                        $base = $nilaiAlternatifKriteria->rata_alternatif_kriteria;
                        echo "<td>".$nilaiAlternatifKriteria->rata_alternatif_kriteria."</td>";
                    }
                }
            @endphp

            {{--<td>--}}
                {{--{!! Form::open(['route' => ['nilaiAlternatifKriterias.destroy', $nilaiAlternatifKriteria->id], 'method' => 'delete']) !!}--}}
                {{--<div class='btn-group'>--}}
                    {{--<a href="{!! route('nilaiAlternatifKriterias.show', [$nilaiAlternatifKriteria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    {{--<a href="{!! route('nilaiAlternatifKriterias.edit', [$nilaiAlternatifKriteria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>--}}
                    {{--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                {{--</div>--}}
                {{--{!! Form::close() !!}--}}
            {{--</td>--}}
        </tr>
    @endforeach
    </tbody>
</table>