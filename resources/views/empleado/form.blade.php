<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('tipoDocumentoId') }}
            {{ Form::text('tipoDocumentoId', $empleado->tipoDocumentoId, ['class' => 'form-control' . ($errors->has('tipoDocumentoId') ? ' is-invalid' : ''), 'placeholder' => 'Tipodocumentoid']) }}
            {!! $errors->first('tipoDocumentoId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empleadoNombre') }}
            {{ Form::text('empleadoNombre', $empleado->empleadoNombre, ['class' => 'form-control' . ($errors->has('empleadoNombre') ? ' is-invalid' : ''), 'placeholder' => 'Empleadonombre']) }}
            {!! $errors->first('empleadoNombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empleadoNumero') }}
            {{ Form::text('empleadoNumero', $empleado->empleadoNumero, ['class' => 'form-control' . ($errors->has('empleadoNumero') ? ' is-invalid' : ''), 'placeholder' => 'Empleadonumero']) }}
            {!! $errors->first('empleadoNumero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empleadoDireccion') }}
            {{ Form::text('empleadoDireccion', $empleado->empleadoDireccion, ['class' => 'form-control' . ($errors->has('empleadoDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Empleadodireccion']) }}
            {!! $errors->first('empleadoDireccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $empleado->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>