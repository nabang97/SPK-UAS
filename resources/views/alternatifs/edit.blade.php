@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Alternatif
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($alternatif, ['route' => ['alternatifs.update', $alternatif->id], 'method' => 'patch']) !!}

                        @include('alternatifs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection