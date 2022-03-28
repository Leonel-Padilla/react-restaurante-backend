@extends('layouts.app')

@section('template_title')
    Update Producto Insumo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Producto Insumo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('producto-insumos.update', $productoInsumo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('producto-insumo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
