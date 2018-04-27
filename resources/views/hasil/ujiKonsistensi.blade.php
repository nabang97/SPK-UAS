<table class="table table-responsive" id="nilaiAlternatifKriterias-table">
    <tbody>
        <tr>
            <td>Nilai Konsistensi = <b>{!! $CI !!}</b></td>
        </tr>
        <tr>
            @php
                $hasilUjiKonsistensi = '';
                if($CI <= 0.10){
                    $hasilUjiKonsistensi = 'sangat memuaskan';
                }else{
                    $hasilUjiKonsistensi = 'mengalami inkonsistensi yang serius';
                }
            @endphp
            <td>Artinya tingkat konsistensi <b>{!! $hasilUjiKonsistensi !!}</b></td>
        </tr>
    </tbody>
</table>