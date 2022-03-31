@extends('layouts.app')

@section('template_title')
    Producto Historial
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Producto Historial') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('producto-historials.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Productoid</th>
										<th>Precio</th>
										<th>Fechainicio</th>
										<th>Fechafinal</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productoHistorials as $productoHistorial)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $productoHistorial->productoId }}</td>
											<td>{{ $productoHistorial->precio }}</td>
											<td>{{ $productoHistorial->fechaInicio }}</td>
											<td>{{ $productoHistorial->fechaFinal }}</td>
											<td>{{ $productoHistorial->estado }}</td>

                                            <td>
                                                <form action="{{ route('producto-historials.destroy',$productoHistorial->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('producto-historials.show',$productoHistorial->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('producto-historials.edit',$productoHistorial->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $productoHistorials->links() !!}
            </div>
        </div>
    </div>
@endsection
