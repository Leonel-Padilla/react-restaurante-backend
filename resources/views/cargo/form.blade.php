<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cargoNombre') }}
            {{ Form::text('cargoNombre', $cargo->cargoNombre, ['class' => 'form-control' . ($errors->has('cargoNombre') ? ' is-invalid' : ''), 'placeholder' => 'Cargonombre']) }}
            {!! $errors->first('cargoNombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cargoDescripcion') }}
            {{ Form::text('cargoDescripcion', $cargo->cargoDescripcion, ['class' => 'form-control' . ($errors->has('cargoDescripcion') ? ' is-invalid' : ''), 'placeholder' => 'Cargodescripcion']) }}
            {!! $errors->first('cargoDescripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $cargo->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>