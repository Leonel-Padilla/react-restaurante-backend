<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('impuestoId') }}
            {{ Form::text('impuestoId', $impuestoHistorial->impuestoId, ['class' => 'form-control' . ($errors->has('impuestoId') ? ' is-invalid' : ''), 'placeholder' => 'Impuestoid']) }}
            {!! $errors->first('impuestoId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('valorImpuesto') }}
            {{ Form::text('valorImpuesto', $impuestoHistorial->valorImpuesto, ['class' => 'form-control' . ($errors->has('valorImpuesto') ? ' is-invalid' : ''), 'placeholder' => 'Valorimpuesto']) }}
            {!! $errors->first('valorImpuesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaInicio') }}
            {{ Form::text('fechaInicio', $impuestoHistorial->fechaInicio, ['class' => 'form-control' . ($errors->has('fechaInicio') ? ' is-invalid' : ''), 'placeholder' => 'Fechainicio']) }}
            {!! $errors->first('fechaInicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaFinal') }}
            {{ Form::text('fechaFinal', $impuestoHistorial->fechaFinal, ['class' => 'form-control' . ($errors->has('fechaFinal') ? ' is-invalid' : ''), 'placeholder' => 'Fechafinal']) }}
            {!! $errors->first('fechaFinal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $impuestoHistorial->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>