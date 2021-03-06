@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Alternatif</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('kecamatans.create') !!}">Add Kecamatan</a>
            @if(!$alternatifs->isEmpty())
                {!! Form::open(array('action' => 'AlternatifController@hapus')) !!}
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger pull-right btn-md', 'onclick' => "return confirm('Anda yakin? Semua Data akan dihapus')"]) !!}
                {!! Form::close() !!}
            @endif
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('alternatifs.table')
            </div>
        </div>
        <div class="text-center">

        </div>

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('alternatifs.tableKec')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>

@endsection

