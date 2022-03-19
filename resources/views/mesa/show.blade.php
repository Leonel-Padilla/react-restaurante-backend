@extends('layouts.app')

@section('template_title')
    {{ $mesa->name ?? 'Show Mesa' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Mesa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('mesas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Sucursalid:</strong>
                            {{ $mesa->sucursalId }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidadasientos:</strong>
                            {{ $mesa->cantidadAsientos }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $mesa->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
