@extends('layouts.app')

@section('template_title')
    {{ $productoHistorial->name ?? 'Show Producto Historial' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Producto Historial</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('producto-historials.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Productoid:</strong>
                            {{ $productoHistorial->productoId }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $productoHistorial->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Fechainicio:</strong>
                            {{ $productoHistorial->fechaInicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fechafinal:</strong>
                            {{ $productoHistorial->fechaFinal }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $productoHistorial->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
