@extends('layouts.app')

@section('template_title')
    Orden Detalle
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Orden Detalle') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('orden-detalles.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Ordenencabezadoid</th>
										<th>Productoid</th>
										<th>Precio</th>
										<th>Cantidad</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordenDetalles as $ordenDetalle)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ordenDetalle->ordenEncabezadoId }}</td>
											<td>{{ $ordenDetalle->productoId }}</td>
											<td>{{ $ordenDetalle->precio }}</td>
											<td>{{ $ordenDetalle->cantidad }}</td>
											<td>{{ $ordenDetalle->estado }}</td>

                                            <td>
                                                <form action="{{ route('orden-detalles.destroy',$ordenDetalle->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('orden-detalles.show',$ordenDetalle->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('orden-detalles.edit',$ordenDetalle->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $ordenDetalles->links() !!}
            </div>
        </div>
    </div>
@endsection
