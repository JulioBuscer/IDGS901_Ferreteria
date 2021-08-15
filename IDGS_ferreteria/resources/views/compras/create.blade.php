<form id="formProveedores" name="formProveedores" method="HEAD" action=" {{ route('compras.create') }} ">

    {!! Form::label('selectProveedor', 'Proveedores', ['class' => 'form-label']) !!}
    <select name="selectProveedor" id="selectProveedor" required style="width: 50vh" class="form-select">
        @forelse ($proveedores as $proveedor)
            <option value="{{ $proveedor->id }}">{{ $proveedor->empresa }}</option>
        @empty

        @endforelse
    </select>
    {!! Form::label('selectProducto', 'Productos', ['class' => 'form-label ']) !!}
    <select name="selectProducto" id="selectProducto" required style="width: 50vh" disabled class="form-select">
    </select>
    {!! Form::label('precio', 'Precio Compra', ['class' => 'form-label']) !!}
    <input type="number" readonly name="precio" id="precio" class="form-input">

    <input type="number" value="0" name="option" id="option" readonly hidden>

    <button name="agregarProducto" id="agregarProducto" disabled class="btn btn-success"><i
            class="fas fa-box-open"></i></button>
</form>

<div class="">
    <table>
        <thead>
            <tr>
                <th>
                    @if (count($carrito) > 0)
                        @forelse ($carrito as $item)

                            <option value="{{ $item }}">
                                {{ $item }}
                            </option>
                        @empty

                        @endforelse
                    @endif

                </th>
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

                    } else {
                        $('#selectProducto').attr("disabled");
                        $('#selectProducto').html(inner);
                        $('#agregarProducto').attr("disabled");
                    }

                }
            });
        });

        $('#agregarProducto').click(function(e) {
            e.preventDefault();

            // var proveedores = @json($proveedores);
            var prueba = @json($carrito);
            var jsonStr =
                '{"idProdcuto":' + $('#selectProducto').val() + ',"producto":' + $('#') + '}';
            var onj = JSON.parse(jsonStr);
            prueba.push(onj);
            jsonStr =
                '{"teamId":"2","status":"member"}';
            onj = JSON.parse(jsonStr);
            prueba.push(onj);
            jsonStr = '{"teamId": "3","status": "member"}';
            onj = JSON.parse(jsonStr);
            prueba.push(onj);
            console.log(<?php echo $carrito; ?>);
            console.log(prueba);
        });
    </script>
@endpush
