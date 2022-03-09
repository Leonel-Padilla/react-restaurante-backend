<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombreDocumento') }}
            {{ Form::text('nombreDocumento', $tipoDocumento->nombreDocumento, ['class' => 'form-control' . ($errors->has('nombreDocumento') ? ' is-invalid' : ''), 'placeholder' => 'Nombredocumento']) }}
            {!! $errors->first('nombreDocumento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numeroDocumento') }}
            {{ Form::text('numeroDocumento', $tipoDocumento->numeroDocumento, ['class' => 'form-control' . ($errors->has('numeroDocumento') ? ' is-invalid' : ''), 'placeholder' => 'Numerodocumento']) }}
            {!! $errors->first('numeroDocumento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $tipoDocumento->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>