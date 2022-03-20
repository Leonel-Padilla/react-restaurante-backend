@extends('layouts.app')

@section('template_title')
    Sueldo Historial
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Sueldo Historial') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('sueldo-historials.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Empleadoid</th>
										<th>Fechainicio</th>
										<th>Fechafinal</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sueldoHistorials as $sueldoHistorial)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $sueldoHistorial->empleadoId }}</td>
											<td>{{ $sueldoHistorial->fechaInicio }}</td>
											<td>{{ $sueldoHistorial->fechaFinal }}</td>
											<td>{{ $sueldoHistorial->estado }}</td>

                                            <td>
                                                <form action="{{ route('sueldo-historials.destroy',$sueldoHistorial->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('sueldo-historials.show',$sueldoHistorial->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('sueldo-historials.edit',$sueldoHistorial->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $sueldoHistorials->links() !!}
            </div>
        </div>
    </div>
@endsection
