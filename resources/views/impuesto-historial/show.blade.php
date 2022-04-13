@extends('layouts.app')

@section('template_title')
    {{ $impuestoHistorial->name ?? 'Show Impuesto Historial' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Impuesto Historial</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('impuesto-historials.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Impuestoid:</strong>
                            {{ $impuestoHistorial->impuestoId }}
                        </div>
                        <div class="form-group">
                            <strong>Valorimpuesto:</strong>
                            {{ $impuestoHistorial->valorImpuesto }}
                        </div>
                        <div class="form-group">
                            <strong>Fechainicio:</strong>
                            {{ $impuestoHistorial->fechaInicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fechafinal:</strong>
                            {{ $impuestoHistorial->fechaFinal }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $impuestoHistorial->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
