@extends('layouts.app')

@section('template_title')
    Create Delivery
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Delivery</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('deliveries.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('delivery.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
