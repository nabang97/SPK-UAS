
<table class="table table-responsive" id="nilaiAlternatifKriterias-table">
    <thead>
    <tr>
        <th>Kriteria</th>
    </tr>
    </thead>
    <tbody>
    @foreach($rataKriterias as $rataKriteria)
        <tr>
            <td>{!! $rataKriteria->rata_kriteria !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>