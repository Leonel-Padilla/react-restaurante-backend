@extends('layouts.app')

@section('template_title')
    Compra Encabezado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Compra Encabezado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('compra-encabezados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Proveedorid</th>
										<th>Fechasolicitud</th>
										<th>Fechaentregacompra</th>
										<th>Fechapagocompra</th>
										<th>Estadocompra</th>
										<th>Numerofactura</th>
										<th>Cai</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($compraEncabezados as $compraEncabezado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $compraEncabezado->proveedorId }}</td>
											<td>{{ $compraEncabezado->fechaSolicitud }}</td>
											<td>{{ $compraEncabezado->fechaEntregaCompra }}</td>
											<td>{{ $compraEncabezado->fechaPagoCompra }}</td>
											<td>{{ $compraEncabezado->estadoCompra }}</td>
											<td>{{ $compraEncabezado->numeroFactura }}</td>
											<td>{{ $compraEncabezado->cai }}</td>
											<td>{{ $compraEncabezado->estado }}</td>

                                            <td>
                                                <form action="{{ route('compra-encabezados.destroy',$compraEncabezado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('compra-encabezados.show',$compraEncabezado->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('compra-encabezados.edit',$compraEncabezado->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $compraEncabezados->links() !!}
            </div>
        </div>
    </div>
@endsection
