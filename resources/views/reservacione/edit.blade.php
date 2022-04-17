@extends('layouts.app')

@section('template_title')
    Update Reservacione
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Reservacione</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reservaciones.update', $reservacione->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('reservacione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
