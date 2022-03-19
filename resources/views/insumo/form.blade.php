<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('proveedorId') }}
            {{ Form::text('proveedorId', $insumo->proveedorId, ['class' => 'form-control' . ($errors->has('proveedorId') ? ' is-invalid' : ''), 'placeholder' => 'Proveedorid']) }}
            {!! $errors->first('proveedorId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('insumoNombre') }}
            {{ Form::text('insumoNombre', $insumo->insumoNombre, ['class' => 'form-control' . ($errors->has('insumoNombre') ? ' is-invalid' : ''), 'placeholder' => 'Insumonombre']) }}
            {!! $errors->first('insumoNombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('insumoDescripcion') }}
            {{ Form::text('insumoDescripcion', $insumo->insumoDescripcion, ['class' => 'form-control' . ($errors->has('insumoDescripcion') ? ' is-invalid' : ''), 'placeholder' => 'Insumodescripcion']) }}
            {!! $errors->first('insumoDescripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $insumo->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidadMin') }}
            {{ Form::text('cantidadMin', $insumo->cantidadMin, ['class' => 'form-control' . ($errors->has('cantidadMin') ? ' is-invalid' : ''), 'placeholder' => 'Cantidadmin']) }}
            {!! $errors->first('cantidadMin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidadMax') }}
            {{ Form::text('cantidadMax', $insumo->cantidadMax, ['class' => 'form-control' . ($errors->has('cantidadMax') ? ' is-invalid' : ''), 'placeholder' => 'Cantidadmax']) }}
            {!! $errors->first('cantidadMax', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $insumo->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>