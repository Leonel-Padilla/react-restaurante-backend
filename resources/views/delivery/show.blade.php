@extends('layouts.app')

@section('template_title')
    {{ $delivery->name ?? 'Show Delivery' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Delivery</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('deliveries.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clienteid:</strong>
                            {{ $delivery->clienteId }}
                        </div>
                        <div class="form-group">
                            <strong>Empleadoid:</strong>
                            {{ $delivery->empleadoId }}
                        </div>
                        <div class="form-group">
                            <strong>Ordenencabezadoid:</strong>
                            {{ $delivery->ordenEncabezadoId }}
                        </div>
                        <div class="form-group">
                            <strong>Fechaentrega:</strong>
                            {{ $delivery->fechaEntrega }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $delivery->comentario }}
                        </div>
                        <div class="form-group">
                            <strong>Horadespacho:</strong>
                            {{ $delivery->horaDespacho }}
                        </div>
                        <div class="form-group">
                            <strong>Horaentrega:</strong>
                            {{ $delivery->horaEntrega }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $delivery->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
