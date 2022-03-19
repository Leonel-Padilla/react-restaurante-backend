<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('sucursalId') }}
            {{ Form::text('sucursalId', $mesa->sucursalId, ['class' => 'form-control' . ($errors->has('sucursalId') ? ' is-invalid' : ''), 'placeholder' => 'Sucursalid']) }}
            {!! $errors->first('sucursalId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidadAsientos') }}
            {{ Form::text('cantidadAsientos', $mesa->cantidadAsientos, ['class' => 'form-control' . ($errors->has('cantidadAsientos') ? ' is-invalid' : ''), 'placeholder' => 'Cantidadasientos']) }}
            {!! $errors->first('cantidadAsientos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $mesa->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>