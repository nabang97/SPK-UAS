<table class="table table-responsive" id="nilaiAlternatifKriterias-table">
    <thead>
        <tr>
            <th>Peringkat</th>
            <th>Alternatif</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
    @php
        $rank = 1;
    @endphp

    @foreach($hasilAHP as $hasil)
        @if($rank == 1)
            <tr style="background-color: #00d600">
        @else
            <tr>
        @endif
            <td>{!! $rank++ !!}</td>
            <td>{!! $hasil->nama !!}</td>
            <td>{!! $hasil->nilai_akhir !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>