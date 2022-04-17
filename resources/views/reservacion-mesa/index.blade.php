@extends('layouts.app')

@section('template_title')
    Reservacion Mesa
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reservacion Mesa') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('reservacion-mesas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Reservacionid</th>
										<th>Mesaid</th>
										<th>Fecha</th>
										<th>Horainicio</th>
										<th>Horafinal</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservacionMesas as $reservacionMesa)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $reservacionMesa->reservacionId }}</td>
											<td>{{ $reservacionMesa->mesaId }}</td>
											<td>{{ $reservacionMesa->fecha }}</td>
											<td>{{ $reservacionMesa->horaInicio }}</td>
											<td>{{ $reservacionMesa->horaFinal }}</td>
											<td>{{ $reservacionMesa->estado }}</td>

                                            <td>
                                                <form action="{{ route('reservacion-mesas.destroy',$reservacionMesa->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('reservacion-mesas.show',$reservacionMesa->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('reservacion-mesas.edit',$reservacionMesa->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $reservacionMesas->links() !!}
            </div>
        </div>
    </div>
@endsection
