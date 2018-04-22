@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Nilai Kriteria</h1>

        @if(!$nilaiKriterias->isEmpty())
            {!! Form::open(array('action' => 'NilaiKriteriaController@hapus')) !!}
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger pull-right btn-md', 'onclick' => "return confirm('Anda yakin? Semua Data akan dihapus')"]) !!}
            {!! Form::close() !!}
        @else
            <a class="btn btn-primary pull-right" href="{!! route('nilaiKriterias.create') !!}">Beri Nilai</a>
        @endif

    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('nilai_kriterias.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

