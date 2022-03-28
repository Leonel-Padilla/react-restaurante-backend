@extends('layouts.app')

@section('template_title')
    {{ $comentario->name ?? 'Show Comentario' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Comentario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('comentarios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Sucursalid:</strong>
                            {{ $comentario->sucursalId }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $comentario->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Telcliente:</strong>
                            {{ $comentario->telCliente }}
                        </div>
                        <div class="form-group">
                            <strong>Correocliente:</strong>
                            {{ $comentario->correoCliente }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $comentario->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
