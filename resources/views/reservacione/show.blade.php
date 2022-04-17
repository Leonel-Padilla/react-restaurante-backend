@extends('layouts.app')

@section('template_title')
    {{ $reservacione->name ?? 'Show Reservacione' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Reservacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reservaciones.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Clienteid:</strong>
                            {{ $reservacione->clienteId }}
                        </div>
                        <div class="form-group">
                            <strong>Sucursalid:</strong>
                            {{ $reservacione->sucursalId }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $reservacione->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
