<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('insumoId') }}
            {{ Form::text('insumoId', $productoInsumo->insumoId, ['class' => 'form-control' . ($errors->has('insumoId') ? ' is-invalid' : ''), 'placeholder' => 'Insumoid']) }}
            {!! $errors->first('insumoId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('productoId') }}
            {{ Form::text('productoId', $productoInsumo->productoId, ['class' => 'form-control' . ($errors->has('productoId') ? ' is-invalid' : ''), 'placeholder' => 'Productoid']) }}
            {!! $errors->first('productoId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $productoInsumo->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>