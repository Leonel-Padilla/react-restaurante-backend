<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('proveedorNombre') }}
            {{ Form::text('proveedorNombre', $proveedore->proveedorNombre, ['class' => 'form-control' . ($errors->has('proveedorNombre') ? ' is-invalid' : ''), 'placeholder' => 'Proveedornombre']) }}
            {!! $errors->first('proveedorNombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proveedorNumero') }}
            {{ Form::text('proveedorNumero', $proveedore->proveedorNumero, ['class' => 'form-control' . ($errors->has('proveedorNumero') ? ' is-invalid' : ''), 'placeholder' => 'Proveedornumero']) }}
            {!! $errors->first('proveedorNumero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proveedorCorreo') }}
            {{ Form::text('proveedorCorreo', $proveedore->proveedorCorreo, ['class' => 'form-control' . ($errors->has('proveedorCorreo') ? ' is-invalid' : ''), 'placeholder' => 'Proveedorcorreo']) }}
            {!! $errors->first('proveedorCorreo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proveedorEncargado') }}
            {{ Form::text('proveedorEncargado', $proveedore->proveedorEncargado, ['class' => 'form-control' . ($errors->has('proveedorEncargado') ? ' is-invalid' : ''), 'placeholder' => 'Proveedorencargado']) }}
            {!! $errors->first('proveedorEncargado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('proveedorRTN') }}
            {{ Form::text('proveedorRTN', $proveedore->proveedorRTN, ['class' => 'form-control' . ($errors->has('proveedorRTN') ? ' is-invalid' : ''), 'placeholder' => 'Proveedorrtn']) }}
            {!! $errors->first('proveedorRTN', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $proveedore->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>