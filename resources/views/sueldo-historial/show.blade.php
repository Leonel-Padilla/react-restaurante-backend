@extends('layouts.app')

@section('template_title')
    {{ $sueldoHistorial->name ?? 'Show Sueldo Historial' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Sueldo Historial</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sueldo-historials.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empleadoid:</strong>
                            {{ $sueldoHistorial->empleadoId }}
                        </div>
                        <div class="form-group">
                            <strong>Fechainicio:</strong>
                            {{ $sueldoHistorial->fechaInicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fechafinal:</strong>
                            {{ $sueldoHistorial->fechaFinal }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $sueldoHistorial->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
