<div class="row">
    <div class="col form-outline m-2">
        {{ Form::text('empresa', $modelo->empresa, ['class' => 'form-control', 'readonly']) }}
        {{ Form::label('empresa', 'Empresa Proveedor', ['class' => 'form-label']) }}
    </div>
    <div class="col form-outline m-2">
        {{ Form::text('representante', $modelo->representante, ['class' => 'form-control', 'readonly']) }}
        {{ Form::label('representante', 'Representante', ['class' => 'form-label']) }}
    </div>

    <div class="col form-outline m-2">
        {{ Form::email('email', $modelo->email, ['class' => 'form-control', 'readonly']) }}
        {{ Form::label('email', 'E-mail', ['class' => 'form-label']) }}
    </div>
</div>

<div class="row">
    <div class="col form-outline m-2">
        {{ Form::text('telefono', $modelo->telefono, ['class' => 'form-control', 'readonly']) }}
        {{ Form::label('telefono', 'Telefono', ['class' => 'form-label']) }}
    </div>
    <div class="col form-outline m-2">
        {{ Form::text('RFC', $modelo->RFC, ['class' => 'form-control', 'readonly']) }}
        {{ Form::label('RFC', 'RFC', ['class' => 'form-label']) }}
    </div>
    <div class="col form-outline m-2">
        {{ Form::text('direccion', $modelo->direccion, ['class' => 'form-control', 'readonly']) }}
        {{ Form::label('direccion', 'Direccion', ['class' => 'form-label']) }}
    </div>
</div>

<div class="">
    <table class="table responsive table-bordered">
        <thead class="table-dark text-center">
            <th>Poducto</th>
            <th>Costo</th>
        </thead>

        <tbody>
            @forelse($proveedores_prodcutos as $producto)

                @if ($modelo->id == $producto->idProveedor)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>$ {{ $producto->precioCompra }} MXN</td>
                    </tr>
                @endif
            @empty
                <tr>
                    <td>No hay proveedores registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
