@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Nilai Alternatif Berdasarkan Kriteria</h1>
        {{--<h1 class="pull-right">--}}
           {{--<a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('nilaiAlternatifKriterias.create') !!}">Add New</a>--}}
        {{--</h1>--}}
        @if(!$nilaiAlternatifKriterias->isEmpty())
            {!! Form::open(array('action' => 'NilaiAlternatifKriteriaController@hapus')) !!}
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger pull-right btn-md', 'onclick' => "return confirm('Anda yakin? Semua Data akan dihapus')"]) !!}
            {!! Form::close() !!}
        @endif
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @foreach($kriterias as $kriteria)
                    <a class="btn btn-primary" href="{!! route('createByKriteria', ['id' => $kriteria->id]) !!}">{!! $kriteria->nama_kriteria !!}</a>
                @endforeach
            </div>
        </div>

        <div class="box box-primary">
            <div class="box-body">
                @include('nilai_alternatif_kriterias.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

