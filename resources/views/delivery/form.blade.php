<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('clienteId') }}
            {{ Form::text('clienteId', $delivery->clienteId, ['class' => 'form-control' . ($errors->has('clienteId') ? ' is-invalid' : ''), 'placeholder' => 'Clienteid']) }}
            {!! $errors->first('clienteId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empleadoId') }}
            {{ Form::text('empleadoId', $delivery->empleadoId, ['class' => 'form-control' . ($errors->has('empleadoId') ? ' is-invalid' : ''), 'placeholder' => 'Empleadoid']) }}
            {!! $errors->first('empleadoId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ordenEncabezadoId') }}
            {{ Form::text('ordenEncabezadoId', $delivery->ordenEncabezadoId, ['class' => 'form-control' . ($errors->has('ordenEncabezadoId') ? ' is-invalid' : ''), 'placeholder' => 'Ordenencabezadoid']) }}
            {!! $errors->first('ordenEncabezadoId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaEntrega') }}
            {{ Form::text('fechaEntrega', $delivery->fechaEntrega, ['class' => 'form-control' . ($errors->has('fechaEntrega') ? ' is-invalid' : ''), 'placeholder' => 'Fechaentrega']) }}
            {!! $errors->first('fechaEntrega', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comentario') }}
            {{ Form::text('comentario', $delivery->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
            {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horaDespacho') }}
            {{ Form::text('horaDespacho', $delivery->horaDespacho, ['class' => 'form-control' . ($errors->has('horaDespacho') ? ' is-invalid' : ''), 'placeholder' => 'Horadespacho']) }}
            {!! $errors->first('horaDespacho', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horaEntrega') }}
            {{ Form::text('horaEntrega', $delivery->horaEntrega, ['class' => 'form-control' . ($errors->has('horaEntrega') ? ' is-invalid' : ''), 'placeholder' => 'Horaentrega']) }}
            {!! $errors->first('horaEntrega', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $delivery->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>