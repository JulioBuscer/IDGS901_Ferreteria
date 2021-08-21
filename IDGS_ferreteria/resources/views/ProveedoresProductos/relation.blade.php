{!! Form::label('selectProveedor', 'Proveedores', ['class' => 'form-label']) !!}
{!! Form::select('selectProveedor', $proveedores, null, ['class' => 'form-control', 'id' => 'selectProveedor', 'onchange' => '', 'required']) !!}

{!! Form::label('selectProductos', 'Productos', ['class' => 'form-label']) !!}
{!! Form::select('selectProductos', $productos, null, ['class' => 'form-control', 'id' => 'selectProductos', 'onchange' => '', 'required']) !!}
