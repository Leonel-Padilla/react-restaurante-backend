<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('ordenEncabezadoId') }}
            {{ Form::text('ordenEncabezadoId', $factura->ordenEncabezadoId, ['class' => 'form-control' . ($errors->has('ordenEncabezadoId') ? ' is-invalid' : ''), 'placeholder' => 'Ordenencabezadoid']) }}
            {!! $errors->first('ordenEncabezadoId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('empleadoCajeroId') }}
            {{ Form::text('empleadoCajeroId', $factura->empleadoCajeroId, ['class' => 'form-control' . ($errors->has('empleadoCajeroId') ? ' is-invalid' : ''), 'placeholder' => 'Empleadocajeroid']) }}
            {!! $errors->first('empleadoCajeroId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('parametroFacturaId') }}
            {{ Form::text('parametroFacturaId', $factura->parametroFacturaId, ['class' => 'form-control' . ($errors->has('parametroFacturaId') ? ' is-invalid' : ''), 'placeholder' => 'Parametrofacturaid']) }}
            {!! $errors->first('parametroFacturaId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('formaPagosId') }}
            {{ Form::text('formaPagosId', $factura->formaPagosId, ['class' => 'form-control' . ($errors->has('formaPagosId') ? ' is-invalid' : ''), 'placeholder' => 'Formapagosid']) }}
            {!! $errors->first('formaPagosId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numeroFactura') }}
            {{ Form::text('numeroFactura', $factura->numeroFactura, ['class' => 'form-control' . ($errors->has('numeroFactura') ? ' is-invalid' : ''), 'placeholder' => 'Numerofactura']) }}
            {!! $errors->first('numeroFactura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('impuesto') }}
            {{ Form::text('impuesto', $factura->impuesto, ['class' => 'form-control' . ($errors->has('impuesto') ? ' is-invalid' : ''), 'placeholder' => 'Impuesto']) }}
            {!! $errors->first('impuesto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('subTotal') }}
            {{ Form::text('subTotal', $factura->subTotal, ['class' => 'form-control' . ($errors->has('subTotal') ? ' is-invalid' : ''), 'placeholder' => 'Subtotal']) }}
            {!! $errors->first('subTotal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total') }}
            {{ Form::text('total', $factura->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'Total']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $factura->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>