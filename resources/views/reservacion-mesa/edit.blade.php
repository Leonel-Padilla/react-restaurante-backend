@extends('layouts.app')

@section('template_title')
    Update Reservacion Mesa
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Reservacion Mesa</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('reservacion-mesas.update', $reservacionMesa->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('reservacion-mesa.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
