<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('ordenEncabezadoId') }}
            {{ Form::text('ordenEncabezadoId', $ordenDetalle->ordenEncabezadoId, ['class' => 'form-control' . ($errors->has('ordenEncabezadoId') ? ' is-invalid' : ''), 'placeholder' => 'Ordenencabezadoid']) }}
            {!! $errors->first('ordenEncabezadoId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('productoId') }}
            {{ Form::text('productoId', $ordenDetalle->productoId, ['class' => 'form-control' . ($errors->has('productoId') ? ' is-invalid' : ''), 'placeholder' => 'Productoid']) }}
            {!! $errors->first('productoId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $ordenDetalle->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $ordenDetalle->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $ordenDetalle->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>