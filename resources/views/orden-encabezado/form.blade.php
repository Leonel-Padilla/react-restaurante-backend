<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('clienteId') }}
            {{ Form::text('clienteId', $ordenEncabezado->clienteId, ['class' => 'form-control' . ($errors->has('clienteId') ? ' is-invalid' : ''), 'placeholder' => 'Clienteid']) }}
            {!! $errors->first('clienteId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empleadoMeseroId') }}
            {{ Form::text('empleadoMeseroId', $ordenEncabezado->empleadoMeseroId, ['class' => 'form-control' . ($errors->has('empleadoMeseroId') ? ' is-invalid' : ''), 'placeholder' => 'Empleadomeseroid']) }}
            {!! $errors->first('empleadoMeseroId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empleadoCocinaId') }}
            {{ Form::text('empleadoCocinaId', $ordenEncabezado->empleadoCocinaId, ['class' => 'form-control' . ($errors->has('empleadoCocinaId') ? ' is-invalid' : ''), 'placeholder' => 'Empleadococinaid']) }}
            {!! $errors->first('empleadoCocinaId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipoEntregaId') }}
            {{ Form::text('tipoEntregaId', $ordenEncabezado->tipoEntregaId, ['class' => 'form-control' . ($errors->has('tipoEntregaId') ? ' is-invalid' : ''), 'placeholder' => 'Tipoentregaid']) }}
            {!! $errors->first('tipoEntregaId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaHora') }}
            {{ Form::text('fechaHora', $ordenEncabezado->fechaHora, ['class' => 'form-control' . ($errors->has('fechaHora') ? ' is-invalid' : ''), 'placeholder' => 'Fechahora']) }}
            {!! $errors->first('fechaHora', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estadoOrden') }}
            {{ Form::text('estadoOrden', $ordenEncabezado->estadoOrden, ['class' => 'form-control' . ($errors->has('estadoOrden') ? ' is-invalid' : ''), 'placeholder' => 'Estadoorden']) }}
            {!! $errors->first('estadoOrden', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $ordenEncabezado->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>