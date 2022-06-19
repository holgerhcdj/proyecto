@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Lista de Facturas</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                            <div class="row">
                                <div class="col-md-1">
                                   <a class="pull-left btn btn-success"  href="{{ route('facturas.create') }}"><i class="fa fa-file-o fa-lg"></i> Nuevo</a>
                                    
                                </div>
                                <div class="col-md-6">
                                    <form action="{{route('facturas.index')}}" method="POST">
                                        @csrf
                                       <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" >Desde</span>
                                        </div>
                                        <input type="date" class="form-control" id="desde" name="desde" value="{{$desde}}" >
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >Hasta</span>
                                        </div>
                                        <input type="date" class="form-control" id="hasta" name="hasta" value="{{$hasta}}" >

                                        <div class="input-group-prepend">
                                           <button class="btn btn-primary" name="btn_buscar" value="buscar">Buscar</button>
                                       </div>
                                       <div class="input-group-prepend">
                                           <button class="btn btn-danger" name="btn_buscar" value="pdf">PDF</button>
                                       </div>
                                      </div>

                                    </form>

                                </div>
                            </div>


                    </div>




                         <div class="card-body">
                             @include('facturas.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

