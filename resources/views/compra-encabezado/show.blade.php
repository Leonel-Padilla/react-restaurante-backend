@extends('layouts.app')

@section('template_title')
    {{ $compraEncabezado->name ?? 'Show Compra Encabezado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Compra Encabezado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('compra-encabezados.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proveedorid:</strong>
                            {{ $compraEncabezado->proveedorId }}
                        </div>
                        <div class="form-group">
                            <strong>Fechasolicitud:</strong>
                            {{ $compraEncabezado->fechaSolicitud }}
                        </div>
                        <div class="form-group">
                            <strong>Fechaentregacompra:</strong>
                            {{ $compraEncabezado->fechaEntregaCompra }}
                        </div>
                        <div class="form-group">
                            <strong>Fechapagocompra:</strong>
                            {{ $compraEncabezado->fechaPagoCompra }}
                        </div>
                        <div class="form-group">
                            <strong>Estadocompra:</strong>
                            {{ $compraEncabezado->estadoCompra }}
                        </div>
                        <div class="form-group">
                            <strong>Numerofactura:</strong>
                            {{ $compraEncabezado->numeroFactura }}
                        </div>
                        <div class="form-group">
                            <strong>Cai:</strong>
                            {{ $compraEncabezado->cai }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $compraEncabezado->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
