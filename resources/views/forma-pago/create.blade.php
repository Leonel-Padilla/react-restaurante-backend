@extends('layouts.app')

@section('template_title')
    Create Forma Pago
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Forma Pago</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('forma-pagos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('forma-pago.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
