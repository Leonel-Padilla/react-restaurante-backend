<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('proveedorId') }}
            {{ Form::text('proveedorId', $compraEncabezado->proveedorId, ['class' => 'form-control' . ($errors->has('proveedorId') ? ' is-invalid' : ''), 'placeholder' => 'Proveedorid']) }}
            {!! $errors->first('proveedorId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaSolicitud') }}
            {{ Form::text('fechaSolicitud', $compraEncabezado->fechaSolicitud, ['class' => 'form-control' . ($errors->has('fechaSolicitud') ? ' is-invalid' : ''), 'placeholder' => 'Fechasolicitud']) }}
            {!! $errors->first('fechaSolicitud', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaEntregaCompra') }}
            {{ Form::text('fechaEntregaCompra', $compraEncabezado->fechaEntregaCompra, ['class' => 'form-control' . ($errors->has('fechaEntregaCompra') ? ' is-invalid' : ''), 'placeholder' => 'Fechaentregacompra']) }}
            {!! $errors->first('fechaEntregaCompra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaPagoCompra') }}
            {{ Form::text('fechaPagoCompra', $compraEncabezado->fechaPagoCompra, ['class' => 'form-control' . ($errors->has('fechaPagoCompra') ? ' is-invalid' : ''), 'placeholder' => 'Fechapagocompra']) }}
            {!! $errors->first('fechaPagoCompra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estadoCompra') }}
            {{ Form::text('estadoCompra', $compraEncabezado->estadoCompra, ['class' => 'form-control' . ($errors->has('estadoCompra') ? ' is-invalid' : ''), 'placeholder' => 'Estadocompra']) }}
            {!! $errors->first('estadoCompra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numeroFactura') }}
            {{ Form::text('numeroFactura', $compraEncabezado->numeroFactura, ['class' => 'form-control' . ($errors->has('numeroFactura') ? ' is-invalid' : ''), 'placeholder' => 'Numerofactura']) }}
            {!! $errors->first('numeroFactura', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cai') }}
            {{ Form::text('cai', $compraEncabezado->cai, ['class' => 'form-control' . ($errors->has('cai') ? ' is-invalid' : ''), 'placeholder' => 'Cai']) }}
            {!! $errors->first('cai', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $compraEncabezado->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>