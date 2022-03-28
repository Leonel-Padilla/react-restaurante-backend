@extends('layouts.app')

@section('template_title')
    {{ $productoInsumo->name ?? 'Show Producto Insumo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Producto Insumo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('producto-insumos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Insumoid:</strong>
                            {{ $productoInsumo->insumoId }}
                        </div>
                        <div class="form-group">
                            <strong>Productoid:</strong>
                            {{ $productoInsumo->productoId }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $productoInsumo->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
