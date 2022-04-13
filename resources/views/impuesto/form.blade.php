<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('valorImpuesto') }}
            {{ Form::text('valorImpuesto', $impuesto->valorImpuesto, ['class' => 'form-control' . ($errors->has('valorImpuesto') ? ' is-invalid' : ''), 'placeholder' => 'Valorimpuesto']) }}
            {!! $errors->first('valorImpuesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombreImpuesto') }}
            {{ Form::text('nombreImpuesto', $impuesto->nombreImpuesto, ['class' => 'form-control' . ($errors->has('nombreImpuesto') ? ' is-invalid' : ''), 'placeholder' => 'Nombreimpuesto']) }}
            {!! $errors->first('nombreImpuesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $impuesto->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>