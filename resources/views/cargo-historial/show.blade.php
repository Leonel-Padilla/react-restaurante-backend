@extends('layouts.app')

@section('template_title')
    {{ $cargoHistorial->name ?? 'Show Cargo Historial' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cargo Historial</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cargo-historials.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empleadoid:</strong>
                            {{ $cargoHistorial->empleadoId }}
                        </div>
                        <div class="form-group">
                            <strong>Fechainicio:</strong>
                            {{ $cargoHistorial->fechaInicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fechafinal:</strong>
                            {{ $cargoHistorial->fechaFinal }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $cargoHistorial->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
