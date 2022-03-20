@extends('layouts.app')

@section('template_title')
    Update Cargo Historial
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Cargo Historial</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cargo-historials.update', $cargoHistorial->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('cargo-historial.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
