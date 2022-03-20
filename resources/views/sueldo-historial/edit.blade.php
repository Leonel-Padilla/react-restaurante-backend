@extends('layouts.app')

@section('template_title')
    Update Sueldo Historial
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Sueldo Historial</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sueldo-historials.update', $sueldoHistorial->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('sueldo-historial.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
