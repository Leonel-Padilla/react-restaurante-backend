<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('empleadoId') }}
            {{ Form::text('empleadoId', $cargoHistorial->empleadoId, ['class' => 'form-control' . ($errors->has('empleadoId') ? ' is-invalid' : ''), 'placeholder' => 'Empleadoid']) }}
            {!! $errors->first('empleadoId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaInicio') }}
            {{ Form::text('fechaInicio', $cargoHistorial->fechaInicio, ['class' => 'form-control' . ($errors->has('fechaInicio') ? ' is-invalid' : ''), 'placeholder' => 'Fechainicio']) }}
            {!! $errors->first('fechaInicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaFinal') }}
            {{ Form::text('fechaFinal', $cargoHistorial->fechaFinal, ['class' => 'form-control' . ($errors->has('fechaFinal') ? ' is-invalid' : ''), 'placeholder' => 'Fechafinal']) }}
            {!! $errors->first('fechaFinal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $cargoHistorial->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>