<table class="table table-responsive" id="nilaiAlternatifKriterias-table">
    <thead>
        <tr>
            <th></th>
            @foreach($rataKriterias as $rataKriteria)
            <th>{!! $rataKriteria->nama_kriteria !!}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>

    @php
        $nAlt = $namaAlternatifs->count();
        $nKri = $rataKriterias->count();

        $cols = [];
        $rows = [];
        for($i = 0 ; $i<$nAlt; $i++){
            for($j = 0 ; $j<$nKri; $j++){
                $rows[$j]= $matriksAlt[$i][$j];
            }
            $cols[$i] = $rows;
        }
        $batasRow = 0;
    @endphp

    @foreach($namaAlternatifs as $namaAlternatif)
        <tr>
            <td>{!! $namaAlternatif->nama !!}</td>
            @php
                $batasCol = 0;

            @endphp

            @while($batasCol < $nKri)
                <td>{!! $cols[$batasRow][$batasCol] !!}</td>
                @php
                    $batasCol++;
                @endphp
            @endwhile
        </tr>
        @php
            $batasRow++;
        @endphp
    @endforeach
    </tbody>
</table>