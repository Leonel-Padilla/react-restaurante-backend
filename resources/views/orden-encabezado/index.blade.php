@extends('layouts.app')

@section('template_title')
    Orden Encabezado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Orden Encabezado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('orden-encabezados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Clienteid</th>
										<th>Empleadomeseroid</th>
										<th>Empleadococinaid</th>
										<th>Tipoentregaid</th>
										<th>Fechahora</th>
										<th>Estadoorden</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordenEncabezados as $ordenEncabezado)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $ordenEncabezado->clienteId }}</td>
											<td>{{ $ordenEncabezado->empleadoMeseroId }}</td>
											<td>{{ $ordenEncabezado->empleadoCocinaId }}</td>
											<td>{{ $ordenEncabezado->tipoEntregaId }}</td>
											<td>{{ $ordenEncabezado->fechaHora }}</td>
											<td>{{ $ordenEncabezado->estadoOrden }}</td>
											<td>{{ $ordenEncabezado->estado }}</td>

                                            <td>
                                                <form action="{{ route('orden-encabezados.destroy',$ordenEncabezado->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('orden-encabezados.show',$ordenEncabezado->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('orden-encabezados.edit',$ordenEncabezado->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $ordenEncabezados->links() !!}
            </div>
        </div>
    </div>
@endsection
