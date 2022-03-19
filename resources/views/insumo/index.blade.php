@extends('layouts.app')

@section('template_title')
    Insumo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Insumo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('insumos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Insumonombre</th>
										<th>Insumodescripcion</th>
										<th>Cantidad</th>
										<th>Cantidadmin</th>
										<th>Cantidadmax</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($insumos as $insumo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $insumo->proveedorId }}</td>
											<td>{{ $insumo->insumoNombre }}</td>
											<td>{{ $insumo->insumoDescripcion }}</td>
											<td>{{ $insumo->cantidad }}</td>
											<td>{{ $insumo->cantidadMin }}</td>
											<td>{{ $insumo->cantidadMax }}</td>
											<td>{{ $insumo->estado }}</td>

                                            <td>
                                                <form action="{{ route('insumos.destroy',$insumo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('insumos.show',$insumo->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('insumos.edit',$insumo->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $insumos->links() !!}
            </div>
        </div>
    </div>
@endsection
