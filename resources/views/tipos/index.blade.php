@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Tipos de pasteles</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <a class="pull-left btn btn-success" href="{{ route('tipos.create') }}"><i class="fa fa-file-o fa-lg"></i> Nuevo</a>
                         </div>
                         <div class="card-body">
                             @include('tipos.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

