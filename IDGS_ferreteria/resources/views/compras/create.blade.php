<form id="formProveedores" name="formProveedores" method="HEAD" action=" {{ route('compras.create') }} ">

    {!! Form::label('selectProveedor', 'Proveedores', ['class' => 'form-control']) !!}
    <select name="selectProveedor" id="selectProveedor" required style="width: 50vh">
        @forelse ($proveedores as $proveedor)
            <option value="{{ $proveedor->id }}">{{ $proveedor->empresa }}</option>
        @empty

        @endforelse
    </select>
    <select name="selectProducto" id="selectProducto" required style="width: 50vh" disabled>
    </select>
    {!! Form::label('precio', 'Precio Compra', ['class' => 'form-label']) !!}
    <input type="number" disabled name="precio" id="precio" class="form-control">

    <input type="number" value="0" name="option" id="option">

    <button name="agregarProducto" id="agregarProducto" disabled class="btn btn-success"><i
            class="fas fa-box-open"></i></button>
</form>
{!! Form::label('selectProducto', 'Productos', ['class' => 'form-control']) !!}

<div class="">
    <table>
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tbody name="productoID" id="productoID">
        </tbody>
    </table>
</div>
{{-- Implementamos los scripts para absorber la libreria Select 2 --}}
@push('scripts')
    <script>
        var productos;
        var array
        $('#selectProveedor').select2({});
        $('#selectProducto').select2({});
        $('#selectProveedor').change(function(e) {
            e.preventDefault();
            $('#option').val(1);
            $.ajax({
                type: 'GET',
                url: '{{ route('compras.create') }}',
                data: $('#formProveedores').serialize(),
                success: function(proveedorProductos) {
                    console.log(proveedorProductos);
                    $('#precio').val(proveedorProductos[0]["precioCompra"]);
                    debugger;
                    productos = proveedorProductos;
                    var inner = "";
                    if (productos.length > 0) {
                        productos[0].id
                        productos.forEach(element => {
                            inner += "<option value='" + element.id + "'>" +
                                element.nombre + "</option>";
                        });
                        $('#selectProducto').html(inner);
                        $('#selectProducto').removeAttr("disabled");
                        $('#agregarProducto').removeAttr("disabled");

                        debugger;
                    } else {
                        $('#selectProducto').attr("disabled");
                        $('#selectProducto').html(inner);
                        $('#agregarProducto').attr("disabled");
                        debugger;
                    }
                    debugger;

                }
            });
        });

        $('#agregarProducto').click(function(e) {
            e.preventDefault();
            $('#option').val(2);
            $.ajax({

            })
            var producto = $('#selectProducto').val();
            $proveedores
        });
    </script>
@endpush
