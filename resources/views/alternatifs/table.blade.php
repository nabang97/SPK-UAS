<table class="table table-responsive" id="alternatifs-table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Nilai</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($alternatifs as $alternatif)
        <tr>
            <td>{!! $alternatif->nama !!}</td>
            <td>{!! $alternatif->nilai_akhir !!}</td>
            <td>
                {!! Form::open(['route' => ['alternatifs.destroy', $alternatif->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('alternatifs.show', [$alternatif->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('alternatifs.edit', [$alternatif->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>