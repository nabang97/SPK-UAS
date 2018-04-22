@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nilai Alternatif Berdasarkan Kriteria {!! $nama !!}
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'nilaiAlternatifKriterias.store']) !!}

                        @include('nilai_alternatif_kriterias.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
