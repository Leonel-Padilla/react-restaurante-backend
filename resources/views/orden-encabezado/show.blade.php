@extends('layouts.app')

@section('template_title')
    {{ $ordenEncabezado->name ?? 'Show Orden Encabezado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Orden Encabezado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('orden-encabezados.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clienteid:</strong>
                            {{ $ordenEncabezado->clienteId }}
                        </div>
                        <div class="form-group">
                            <strong>Empleadomeseroid:</strong>
                            {{ $ordenEncabezado->empleadoMeseroId }}
                        </div>
                        <div class="form-group">
                            <strong>Empleadococinaid:</strong>
                            {{ $ordenEncabezado->empleadoCocinaId }}
                        </div>
                        <div class="form-group">
                            <strong>Tipoentregaid:</strong>
                            {{ $ordenEncabezado->tipoEntregaId }}
                        </div>
                        <div class="form-group">
                            <strong>Fechahora:</strong>
                            {{ $ordenEncabezado->fechaHora }}
                        </div>
                        <div class="form-group">
                            <strong>Estadoorden:</strong>
                            {{ $ordenEncabezado->estadoOrden }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $ordenEncabezado->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
