
<li class="{{ Request::is('alternatifs*') ? 'active' : '' }}">
    <a href="{!! route('alternatifs.index') !!}"><i class="fa fa-edit"></i><span>Alternatif</span></a>
</li>

<li class="{{ Request::is('kriterias*') ? 'active' : '' }}">
    <a href="{!! route('kriterias.index') !!}"><i class="fa fa-edit"></i><span>Kriteria</span></a>
</li>


<li class="{{ Request::is('nilaiKriterias*') ? 'active' : '' }}">
    <a href="{!! route('nilaiKriterias.index') !!}"><i class="fa fa-edit"></i><span>Nilai Kriteria</span></a>
</li>

<li class="{{ Request::is('nilaiAlternatifKriterias*') ? 'active' : '' }}">
    <a href="{!! route('nilaiAlternatifKriterias.index') !!}"><i class="fa fa-edit"></i><span>Nilai Alternatif Kriterias</span></a>
</li>

<li class="{{ Request::is('hasil*') ? 'active' : '' }}">
    <a href="{!! route('hasil.index') !!}"><i class="fa fa-edit"></i><span>Hasil</span></a>
</li>

