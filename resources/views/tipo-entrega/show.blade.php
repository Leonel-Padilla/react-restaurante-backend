@extends('layouts.app')

@section('template_title')
    {{ $tipoEntrega->name ?? 'Show Tipo Entrega' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Tipo Entrega</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipo-entregas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombretipoentrega:</strong>
                            {{ $tipoEntrega->nombreTipoEntrega }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $tipoEntrega->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
