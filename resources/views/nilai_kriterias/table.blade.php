<table class="table table-responsive" id="nilaiKriterias-table">
    <thead>
        <tr>
            <th>Kriteria 1</th>
            <th>Kriteria 2</th>
            <th>Bobot Kriteria</th>
            <th>Normalisasi Bobot Kriteria</th>
            {{--<th colspan="3">Action</th>--}}
        </tr>
    </thead>
    <tbody>
    @foreach($nilaiKriterias as $nilaiKriteria)
        <tr>
            <td>{!! $nilaiKriteria->kriteria1->nama_kriteria !!}</td>
            <td>{!! $nilaiKriteria->kriteria2->nama_kriteria !!}</td>
            <td>{!! $nilaiKriteria->bobot_kriteria !!}</td>
            <td>{!! $nilaiKriteria->norm_kriteria !!}</td>
            {{--<td>--}}
                {{--<div class='btn-group'>--}}
                    {{--<a href="{!! route('nilaiKriterias.show', [$nilaiKriteria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>--}}
                    {{--<a href="{!! route('nilaiKriterias.edit', [$nilaiKriteria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>--}}
                {{--</div>--}}
            {{--</td>--}}
        </tr>
    @endforeach
    </tbody>
</table>