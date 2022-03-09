@extends('layouts.app')

@section('template_title')
    {{ $empleado->name ?? 'Show Empleado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Empleado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('empleados.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipodocumentoid:</strong>
                            {{ $empleado->tipoDocumentoId }}
                        </div>
                        <div class="form-group">
                            <strong>Empleadonombre:</strong>
                            {{ $empleado->empleadoNombre }}
                        </div>
                        <div class="form-group">
                            <strong>Empleadonumero:</strong>
                            {{ $empleado->empleadoNumero }}
                        </div>
                        <div class="form-group">
                            <strong>Empleadodireccion:</strong>
                            {{ $empleado->empleadoDireccion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $empleado->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
