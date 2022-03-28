<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('sucursalId') }}
            {{ Form::text('sucursalId', $comentario->sucursalId, ['class' => 'form-control' . ($errors->has('sucursalId') ? ' is-invalid' : ''), 'placeholder' => 'Sucursalid']) }}
            {!! $errors->first('sucursalId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $comentario->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telCliente') }}
            {{ Form::text('telCliente', $comentario->telCliente, ['class' => 'form-control' . ($errors->has('telCliente') ? ' is-invalid' : ''), 'placeholder' => 'Telcliente']) }}
            {!! $errors->first('telCliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('correoCliente') }}
            {{ Form::text('correoCliente', $comentario->correoCliente, ['class' => 'form-control' . ($errors->has('correoCliente') ? ' is-invalid' : ''), 'placeholder' => 'Correocliente']) }}
            {!! $errors->first('correoCliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $comentario->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>