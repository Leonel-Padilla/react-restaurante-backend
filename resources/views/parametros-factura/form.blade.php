<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('cai_Restaurante') }}
            {{ Form::text('cai_Restaurante', $parametrosFactura->cai_Restaurante, ['class' => 'form-control' . ($errors->has('cai_Restaurante') ? ' is-invalid' : ''), 'placeholder' => 'Cai Restaurante']) }}
            {!! $errors->first('cai_Restaurante', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rtn_Restaurante') }}
            {{ Form::text('rtn_Restaurante', $parametrosFactura->rtn_Restaurante, ['class' => 'form-control' . ($errors->has('rtn_Restaurante') ? ' is-invalid' : ''), 'placeholder' => 'Rtn Restaurante']) }}
            {!! $errors->first('rtn_Restaurante', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $parametrosFactura->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>