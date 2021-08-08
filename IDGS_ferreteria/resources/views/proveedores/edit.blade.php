<div class="row">
    <div class="col form-outline m-2">
        {{ Form::text('empresa', $modelo->empresa, ['class' => 'form-control']) }}
        {{ Form::label('empresa', 'Empresa Proveedor', ['class' => 'form-label']) }}
    </div>
    <div class="col form-outline m-2">
        {{ Form::text('representante', $modelo->representante, ['class' => 'form-control']) }}
        {{ Form::label('representante', 'Representante', ['class' => 'form-label']) }}
    </div>

    <div class="col form-outline m-2">
        {{ Form::email('email', $modelo->email, ['class' => 'form-control']) }}
        {{ Form::label('email', 'E-mail', ['class' => 'form-label']) }}
    </div>
</div>

<div class="row">
    <div class="col form-outline m-2">
        {{ Form::text('telefono', $modelo->telefono, ['class' => 'form-control']) }}
        {{ Form::label('telefono', 'Telefono', ['class' => 'form-label']) }}
    </div>
    <div class="col form-outline m-2">
        {{ Form::text('RFC', $modelo->RFC, ['class' => 'form-control']) }}
        {{ Form::label('RFC', 'RFC', ['class' => 'form-label']) }}
    </div>
    <div class="col form-outline m-2">
        {{ Form::text('direccion', $modelo->direccion, ['class' => 'form-control']) }}
        {{ Form::label('direccion', 'Direccion', ['class' => 'form-label']) }}
    </div>
</div>


<div class="">
    <table class="table responsive table-bordered">
        <thead class="table-dark text-center">
            <th>Poducto</th>
            <th>Costo</th>
            <th>Accion</th>
        </thead>

        <tbody>
            @forelse($proveedores_prodcutos as $producto)

                @if ($modelo->id == $producto->idProveedor)
                    <tr>
                        {{ Form::open(['url' => route('proveedores.destroy', $producto->id)]) }}
                        <input type="hidden" id="idProducto" name="idProducto" type="number"
                            value="{{ $producto->idProducto }}">
                        <input type="hidden" id="id" name="id" type="number" value="{{ $producto->id }}"> </td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->precioCompra }}</td>
                        <td class="row  text-center">
                            <!-- Eliminar -->
                            {{ Form::hidden('_method', 'DELETE') }}
                            <button type="submit" class="btn btn-danger" /> <i class='fas fa-trash'></i>
                            </button>
                        </td>
                        {{ Form::close() }}
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
