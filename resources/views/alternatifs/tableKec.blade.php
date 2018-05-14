<table class="table table-responsive" id="alternatifs-table">
    <thead>
        <tr>
            <th>Nama Kecamatan</th>
        </tr>
    </thead>
    <tbody>
    @foreach($kecamatans as $kecamatan)
        <tr>
            <td>{!! $kecamatan->nama_kec !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>