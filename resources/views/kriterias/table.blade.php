<table class="table table-responsive" id="kriterias-table">
    <thead>
        <tr>
            <th>Nama Kriteria</th>
            <th>Keterangan</th>
            <th>Nilai Rata-rata</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($kriterias as $kriteria)
        <tr>
            <td>{!! $kriteria->nama_kriteria !!}</td>
            <td>{!! $kriteria->ket !!}</td>
            <td>{!! $kriteria->rata_kriteria !!}</td>
            <td>
                {!! Form::open(['route' => ['kriterias.destroy', $kriteria->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kriterias.show', [$kriteria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('kriterias.edit', [$kriteria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>