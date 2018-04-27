@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Hasil Perhitungan dengan Metode AHP</h1>
        <div class="clearfix"></div>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-9">
                        Rata-rata Alternatif
                        @include('hasil.alternatif_table')
                    </div>
                    <div class="col-md-3">
                        Rata-rata Kriteria
                        @include('hasil.kriteria_table')
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-body">
                Peringkat Alternatif
                @include('hasil.hasil')
            </div>
        </div>
        <div class="text-center">

        </div>

        <div class="box box-primary">
            <div class="box-body">
                Uji Konsistensi
                @include('hasil.ujiKonsistensi')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
