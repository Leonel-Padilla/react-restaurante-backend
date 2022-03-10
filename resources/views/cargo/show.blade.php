@extends('layouts.app')

@section('template_title')
    {{ $cargo->name ?? 'Show Cargo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cargo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('cargos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cargonombre:</strong>
                            {{ $cargo->cargoNombre }}
                        </div>
                        <div class="form-group">
                            <strong>Cargodescripcion:</strong>
                            {{ $cargo->cargoDescripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $cargo->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
