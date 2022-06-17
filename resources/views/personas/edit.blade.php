@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('personas.index') !!}">Usuarios/Clientes</a>
          </li>
          <li class="breadcrumb-item active">Modificar</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Modificar usuario</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($personas, ['route' => ['personas.update', $personas->per_id], 'method' => 'patch']) !!}

                               @include('personas.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection