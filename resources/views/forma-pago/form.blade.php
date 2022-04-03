<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombreFormaPago') }}
            {{ Form::text('nombreFormaPago', $formaPago->nombreFormaPago, ['class' => 'form-control' . ($errors->has('nombreFormaPago') ? ' is-invalid' : ''), 'placeholder' => 'Nombreformapago']) }}
            {!! $errors->first('nombreFormaPago', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $formaPago->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>