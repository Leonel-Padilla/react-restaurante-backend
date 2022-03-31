<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('productoId') }}
            {{ Form::text('productoId', $productoHistorial->productoId, ['class' => 'form-control' . ($errors->has('productoId') ? ' is-invalid' : ''), 'placeholder' => 'Productoid']) }}
            {!! $errors->first('productoId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $productoHistorial->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaInicio') }}
            {{ Form::text('fechaInicio', $productoHistorial->fechaInicio, ['class' => 'form-control' . ($errors->has('fechaInicio') ? ' is-invalid' : ''), 'placeholder' => 'Fechainicio']) }}
            {!! $errors->first('fechaInicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaFinal') }}
            {{ Form::text('fechaFinal', $productoHistorial->fechaFinal, ['class' => 'form-control' . ($errors->has('fechaFinal') ? ' is-invalid' : ''), 'placeholder' => 'Fechafinal']) }}
            {!! $errors->first('fechaFinal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $productoHistorial->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>