@extends('layouts.app')

@section('template_title')
    Compra Detalle
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Compra Detalle') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('compra-detalles.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Insumoid</th>
										<th>Compraencabezadoid</th>
										<th>Precio</th>
										<th>Cantidad</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($compraDetalles as $compraDetalle)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $compraDetalle->insumoId }}</td>
											<td>{{ $compraDetalle->compraEncabezadoId }}</td>
											<td>{{ $compraDetalle->precio }}</td>
											<td>{{ $compraDetalle->cantidad }}</td>
											<td>{{ $compraDetalle->estado }}</td>

                                            <td>
                                                <form action="{{ route('compra-detalles.destroy',$compraDetalle->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('compra-detalles.show',$compraDetalle->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('compra-detalles.edit',$compraDetalle->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $compraDetalles->links() !!}
            </div>
        </div>
    </div>
@endsection
