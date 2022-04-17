@extends('layouts.app')

@section('template_title')
    Delivery
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Delivery') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('deliveries.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Empleadoid</th>
										<th>Ordenencabezadoid</th>
										<th>Fechaentrega</th>
										<th>Comentario</th>
										<th>Horadespacho</th>
										<th>Horaentrega</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deliveries as $delivery)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $delivery->clienteId }}</td>
											<td>{{ $delivery->empleadoId }}</td>
											<td>{{ $delivery->ordenEncabezadoId }}</td>
											<td>{{ $delivery->fechaEntrega }}</td>
											<td>{{ $delivery->comentario }}</td>
											<td>{{ $delivery->horaDespacho }}</td>
											<td>{{ $delivery->horaEntrega }}</td>
											<td>{{ $delivery->estado }}</td>

                                            <td>
                                                <form action="{{ route('deliveries.destroy',$delivery->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('deliveries.show',$delivery->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('deliveries.edit',$delivery->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $deliveries->links() !!}
            </div>
        </div>
    </div>
@endsection
