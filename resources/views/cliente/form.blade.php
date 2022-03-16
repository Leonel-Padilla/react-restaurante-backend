<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('clienteNombre') }}
            {{ Form::text('clienteNombre', $cliente->clienteNombre, ['class' => 'form-control' . ($errors->has('clienteNombre') ? ' is-invalid' : ''), 'placeholder' => 'Clientenombre']) }}
            {!! $errors->first('clienteNombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('clienteNumero') }}
            {{ Form::text('clienteNumero', $cliente->clienteNumero, ['class' => 'form-control' . ($errors->has('clienteNumero') ? ' is-invalid' : ''), 'placeholder' => 'Clientenumero']) }}
            {!! $errors->first('clienteNumero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('clienteCorreo') }}
            {{ Form::text('clienteCorreo', $cliente->clienteCorreo, ['class' => 'form-control' . ($errors->has('clienteCorreo') ? ' is-invalid' : ''), 'placeholder' => 'Clientecorreo']) }}
            {!! $errors->first('clienteCorreo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('clienteRTN') }}
            {{ Form::text('clienteRTN', $cliente->clienteRTN, ['class' => 'form-control' . ($errors->has('clienteRTN') ? ' is-invalid' : ''), 'placeholder' => 'Clientertn']) }}
            {!! $errors->first('clienteRTN', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $cliente->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>