@extends('layouts.app')

@section('template_title')
    {{ $proveedore->name ?? 'Show Proveedore' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Proveedore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proveedores.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proveedornombre:</strong>
                            {{ $proveedore->proveedorNombre }}
                        </div>
                        <div class="form-group">
                            <strong>Proveedornumero:</strong>
                            {{ $proveedore->proveedorNumero }}
                        </div>
                        <div class="form-group">
                            <strong>Proveedorcorreo:</strong>
                            {{ $proveedore->proveedorCorreo }}
                        </div>
                        <div class="form-group">
                            <strong>Proveedorencargado:</strong>
                            {{ $proveedore->proveedorEncargado }}
                        </div>
                        <div class="form-group">
                            <strong>Proveedorrtn:</strong>
                            {{ $proveedore->proveedorRTN }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $proveedore->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
