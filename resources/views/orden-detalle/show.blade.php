@extends('layouts.app')

@section('template_title')
    {{ $ordenDetalle->name ?? 'Show Orden Detalle' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Orden Detalle</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('orden-detalles.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Ordenencabezadoid:</strong>
                            {{ $ordenDetalle->ordenEncabezadoId }}
                        </div>
                        <div class="form-group">
                            <strong>Productoid:</strong>
                            {{ $ordenDetalle->productoId }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $ordenDetalle->precio }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $ordenDetalle->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $ordenDetalle->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
