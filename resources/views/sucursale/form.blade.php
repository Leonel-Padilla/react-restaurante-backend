<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('empleadoId') }}
            {{ Form::text('empleadoId', $sucursale->empleadoId, ['class' => 'form-control' . ($errors->has('empleadoId') ? ' is-invalid' : ''), 'placeholder' => 'Empleadoid']) }}
            {!! $errors->first('empleadoId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sucursalDireccion') }}
            {{ Form::text('sucursalDireccion', $sucursale->sucursalDireccion, ['class' => 'form-control' . ($errors->has('sucursalDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Sucursaldireccion']) }}
            {!! $errors->first('sucursalDireccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $sucursale->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>