@extends('layouts.app')

@section('template_title')
    {{ $cliente->name ?? 'Show Cliente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('clientes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clientenombre:</strong>
                            {{ $cliente->clienteNombre }}
                        </div>
                        <div class="form-group">
                            <strong>Clientenumero:</strong>
                            {{ $cliente->clienteNumero }}
                        </div>
                        <div class="form-group">
                            <strong>Clientecorreo:</strong>
                            {{ $cliente->clienteCorreo }}
                        </div>
                        <div class="form-group">
                            <strong>Clientertn:</strong>
                            {{ $cliente->clienteRTN }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $cliente->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
