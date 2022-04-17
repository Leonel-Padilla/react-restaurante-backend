@extends('layouts.app')

@section('template_title')
    {{ $reservacionMesa->name ?? 'Show Reservacion Mesa' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Reservacion Mesa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reservacion-mesas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Reservacionid:</strong>
                            {{ $reservacionMesa->reservacionId }}
                        </div>
                        <div class="form-group">
                            <strong>Mesaid:</strong>
                            {{ $reservacionMesa->mesaId }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $reservacionMesa->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Horainicio:</strong>
                            {{ $reservacionMesa->horaInicio }}
                        </div>
                        <div class="form-group">
                            <strong>Horafinal:</strong>
                            {{ $reservacionMesa->horaFinal }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $reservacionMesa->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
