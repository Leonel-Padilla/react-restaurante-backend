@extends('layouts.app')

@section('template_title')
    {{ $factura->name ?? 'Show Factura' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Factura</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('facturas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Ordenencabezadoid:</strong>
                            {{ $factura->ordenEncabezadoId }}
                        </div>
                        <div class="form-group">
                            <strong>Empleadocajeroid:</strong>
                            {{ $factura->empleadoCajeroId }}
                        </div>
                        <div class="form-group">
                            <strong>Parametrofacturaid:</strong>
                            {{ $factura->parametroFacturaId }}
                        </div>
                        <div class="form-group">
                            <strong>Formapagosid:</strong>
                            {{ $factura->formaPagosId }}
                        </div>
                        <div class="form-group">
                            <strong>Numerofactura:</strong>
                            {{ $factura->numeroFactura }}
                        </div>
                        <div class="form-group">
                            <strong>Impuesto:</strong>
                            {{ $factura->impuesto }}
                        </div>
                        <div class="form-group">
                            <strong>Subtotal:</strong>
                            {{ $factura->subTotal }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $factura->total }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $factura->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
