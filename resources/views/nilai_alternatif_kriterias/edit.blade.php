@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nilai Alternatif Kriteria
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nilaiAlternatifKriteria, ['route' => ['nilaiAlternatifKriterias.update', $nilaiAlternatifKriteria->id], 'method' => 'patch']) !!}

                        @include('nilai_alternatif_kriterias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection