@extends('layouts.app')

@section('template_title')
    {{ $sucursale->name ?? 'Show Sucursale' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Sucursale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sucursales.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Empleadoid:</strong>
                            {{ $sucursale->empleadoId }}
                        </div>
                        <div class="form-group">
                            <strong>Sucursaldireccion:</strong>
                            {{ $sucursale->sucursalDireccion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $sucursale->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
