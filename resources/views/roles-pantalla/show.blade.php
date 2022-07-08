@extends('layouts.app')

@section('template_title')
    {{ $rolesPantalla->name ?? 'Show Roles Pantalla' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Roles Pantalla</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('roles-pantallas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Rolesid:</strong>
                            {{ $rolesPantalla->rolesId }}
                        </div>
                        <div class="form-group">
                            <strong>Pantallaid:</strong>
                            {{ $rolesPantalla->pantallaId }}
                        </div>
                        <div class="form-group">
                            <strong>Buscar:</strong>
                            {{ $rolesPantalla->buscar }}
                        </div>
                        <div class="form-group">
                            <strong>Actualizar:</strong>
                            {{ $rolesPantalla->actualizar }}
                        </div>
                        <div class="form-group">
                            <strong>Registrar:</strong>
                            {{ $rolesPantalla->registrar }}
                        </div>
                        <div class="form-group">
                            <strong>Imprimirreportes:</strong>
                            {{ $rolesPantalla->imprimirReportes }}
                        </div>
                        <div class="form-group">
                            <strong>Reimprimir:</strong>
                            {{ $rolesPantalla->reimprimir }}
                        </div>
                        <div class="form-group">
                            <strong>Detalles:</strong>
                            {{ $rolesPantalla->detalles }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $rolesPantalla->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
