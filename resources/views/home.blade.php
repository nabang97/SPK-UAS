@extends('layouts.app')

@section('content')

    <div class="content">
        <div class="col-md-3">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-blue"><i class="fa fa fa-database"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Kriteria</span>
                    <span class="info-box-number">{!! $nKriteria !!}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>

        <div class="col-md-3">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-blue"><i class="fa fa fa-database"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Alternatif</span>
                    <span class="info-box-number">{!! $nAlternatif !!}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
        </div>
        @if($terbaik != NULL)
            @if($terbaik->nilai_akhir != NULL)
                <div class="col-md-12">
                    <div class="info-box">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon bg-blue"><i class="fa fa fa-database"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Alternatif Terbaik</span>
                            <span class="info-box-number">{!! $terbaik->nama !!} = {!! $terbaik->nilai_akhir !!}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>
            @endif
        @endif

        <div class="col-md-12">
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Petunjuk Penggunaan</h3>
                </div>
                <div class="box-body">
                    <ol>
                        <li>Isikan data alternatif pada menu <a href="{!! route('alternatifs.index') !!}">Alternatif</a></li>
                        <li>Isikan data kriteria pada menu <a href="{!! route('kriterias.index') !!}">Kriteria</a></li>
                        <li>Isikan nilai kriteria pada menu <a href="{!! route('nilaiKriterias.index') !!}">Nilai Kriteria</a></li>
                        <li>Isikan nilai alternatif terhadap masing-masing kriteria pada menu Nilai <a href="{!! route('nilaiAlternatifKriterias.index') !!}">Alternatif Kriteria</a></li>
                        <li>Lihat hasil perhitungan nilai pada menu <a href="{!! route('hasil.index') !!}">Hasil</a></li>
                    </ol>
                </div>
                <div class="box-footer">
                    Semoga Membantu
                </div>
            </div>
        </div>
    </div>





@endsection
