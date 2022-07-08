<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('rolesId') }}
            {{ Form::text('rolesId', $rolesPantalla->rolesId, ['class' => 'form-control' . ($errors->has('rolesId') ? ' is-invalid' : ''), 'placeholder' => 'Rolesid']) }}
            {!! $errors->first('rolesId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pantallaId') }}
            {{ Form::text('pantallaId', $rolesPantalla->pantallaId, ['class' => 'form-control' . ($errors->has('pantallaId') ? ' is-invalid' : ''), 'placeholder' => 'Pantallaid']) }}
            {!! $errors->first('pantallaId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('buscar') }}
            {{ Form::text('buscar', $rolesPantalla->buscar, ['class' => 'form-control' . ($errors->has('buscar') ? ' is-invalid' : ''), 'placeholder' => 'Buscar']) }}
            {!! $errors->first('buscar', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('actualizar') }}
            {{ Form::text('actualizar', $rolesPantalla->actualizar, ['class' => 'form-control' . ($errors->has('actualizar') ? ' is-invalid' : ''), 'placeholder' => 'Actualizar']) }}
            {!! $errors->first('actualizar', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('registrar') }}
            {{ Form::text('registrar', $rolesPantalla->registrar, ['class' => 'form-control' . ($errors->has('registrar') ? ' is-invalid' : ''), 'placeholder' => 'Registrar']) }}
            {!! $errors->first('registrar', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('imprimirReportes') }}
            {{ Form::text('imprimirReportes', $rolesPantalla->imprimirReportes, ['class' => 'form-control' . ($errors->has('imprimirReportes') ? ' is-invalid' : ''), 'placeholder' => 'Imprimirreportes']) }}
            {!! $errors->first('imprimirReportes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('reimprimir') }}
            {{ Form::text('reimprimir', $rolesPantalla->reimprimir, ['class' => 'form-control' . ($errors->has('reimprimir') ? ' is-invalid' : ''), 'placeholder' => 'Reimprimir']) }}
            {!! $errors->first('reimprimir', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('detalles') }}
            {{ Form::text('detalles', $rolesPantalla->detalles, ['class' => 'form-control' . ($errors->has('detalles') ? ' is-invalid' : ''), 'placeholder' => 'Detalles']) }}
            {!! $errors->first('detalles', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $rolesPantalla->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>