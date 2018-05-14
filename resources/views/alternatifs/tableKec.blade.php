<table class="table table-responsive" id="alternatifs-table">
    <thead>
        <tr>
            <th>Nama Kecamatan</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($kecamatans as $kecamatan)
        <tr>
            <td>{!! $kecamatan->nama_kec !!}</td>
            <td><a class="btn btn-primary" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('alternatifs.createById', [$kecamatan->id]) !!}">Add Alternatif</a></td>
            <td><a class="btn btn-primary" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('alternatifs.createSub', [$kecamatan->id]) !!}">Add Sub Kecamatan</a></td>
        </tr>
    @endforeach
    </tbody>
</table>