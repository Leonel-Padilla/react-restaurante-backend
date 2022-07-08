<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombrePantalla') }}
            {{ Form::text('nombrePantalla', $pantalla->nombrePantalla, ['class' => 'form-control' . ($errors->has('nombrePantalla') ? ' is-invalid' : ''), 'placeholder' => 'Nombrepantalla']) }}
            {!! $errors->first('nombrePantalla', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $pantalla->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>