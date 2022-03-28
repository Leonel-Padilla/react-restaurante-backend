<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('productoNombre') }}
            {{ Form::text('productoNombre', $producto->productoNombre, ['class' => 'form-control' . ($errors->has('productoNombre') ? ' is-invalid' : ''), 'placeholder' => 'Productonombre']) }}
            {!! $errors->first('productoNombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('productoDescripcion') }}
            {{ Form::text('productoDescripcion', $producto->productoDescripcion, ['class' => 'form-control' . ($errors->has('productoDescripcion') ? ' is-invalid' : ''), 'placeholder' => 'Productodescripcion']) }}
            {!! $errors->first('productoDescripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $producto->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>