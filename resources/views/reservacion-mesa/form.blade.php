<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('reservacionId') }}
            {{ Form::text('reservacionId', $reservacionMesa->reservacionId, ['class' => 'form-control' . ($errors->has('reservacionId') ? ' is-invalid' : ''), 'placeholder' => 'Reservacionid']) }}
            {!! $errors->first('reservacionId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('mesaId') }}
            {{ Form::text('mesaId', $reservacionMesa->mesaId, ['class' => 'form-control' . ($errors->has('mesaId') ? ' is-invalid' : ''), 'placeholder' => 'Mesaid']) }}
            {!! $errors->first('mesaId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $reservacionMesa->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horaInicio') }}
            {{ Form::text('horaInicio', $reservacionMesa->horaInicio, ['class' => 'form-control' . ($errors->has('horaInicio') ? ' is-invalid' : ''), 'placeholder' => 'Horainicio']) }}
            {!! $errors->first('horaInicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horaFinal') }}
            {{ Form::text('horaFinal', $reservacionMesa->horaFinal, ['class' => 'form-control' . ($errors->has('horaFinal') ? ' is-invalid' : ''), 'placeholder' => 'Horafinal']) }}
            {!! $errors->first('horaFinal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $reservacionMesa->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>