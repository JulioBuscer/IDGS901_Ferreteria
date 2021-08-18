<form id="formProveedores" name="formProveedores" action=" {{ route('compras.store') }} ">
    <div class="container row">
        <div class="col">
            <div class="">
                {!! Form::label('selectProveedor', 'Proveedores', ['class' => 'form-label']) !!}
                <select name="selectProveedor" id="selectProveedor" required style="width: 50vh" class="form-select">
                    <option value="">Seleccione un proveedor</option>
                    @forelse ($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}">{{ $proveedor->empresa }}</option>
                    @empty

                    @endforelse
                </select>

                {!! Form::label('selectProducto', 'Productos', ['class' => 'form-label ']) !!}
                <select name="selectProducto" id="selectProducto" required style="width: 50vh" disabled
                    class="form-select">
                </select>
            </div>

            <div class="">
                {!! Form::label('precio', 'Precio Compra', ['class' => 'form-label']) !!}
                {!! Form::number('precio', null, ['class' => 'form-input', 'readonly', 'placeholder' => '0.0']) !!}

                {!! Form::label('cantidad', 'Cantidad', ['class' => 'form-label']) !!}
                {!! Form::number('cantidad', null, ['class' => 'form-input', 'placeholder' => '0']) !!}

                <input type="number" value="0" name="option" id="option" readonly hidden>
                <input type="number" value="0" name="index" id="index" readonly hidden>

                <button name="agregarProducto" id="agregarProducto" disabled class="btn btn-success"><i
                        class="fas fa-box-open"></i></button>

            </div>

        </div>

        <div class="col">
            <table id="tablaCarrito" name="tablaCarrito" class="table text-center">
                <thead>
                    <tr>
                        <th>❌</th>
                        <th hidden>ID</th>
                        <th>Producto</th>
                        <th>Costo</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody name="tblProductos" id="tblProductos">

                </tbody>
            </table>
        </div>
        <div class="col-2">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Total</h5>
                    <h3 id="total" name=total class="card-text text-success"></h3>
                    <button id="agregarCompra" name="agregarCompra" hidden class="btn btn-color-2" /><i
                        class="fas fa-save"></i> </button>
                </div>
            </div>
        </div>

    </div>
</form>
{{-- Implementamos los scripts para absorber la libreria Select 2 --}}
@push('scripts')
    <script>
        var productos;
        var array;
        var carrito;
        var idProducto;
        var producto;
        var precio;
        var cantidad;
        var total;
        $('#selectProveedor').select2({});
        $('#selectProducto').select2({});


        $('#selectProveedor').change(function(e) {
            e.preventDefault();
            $('#option').val(1);
            limpiarDatos();
            cargarCarrito();
            $.ajax({
                type: 'GET',
                url: '{{ route('compras.create') }}',
                data: $('#formProveedores').serialize(),
                success: function(proveedorProductos) {
                    // console.log(proveedorProductos);
                    $('#precio').val(proveedorProductos[0]["precioCompra"]);
                    productos = proveedorProductos;
                    var inner = "";
                    if (productos.length > 0) {
                        // productos[0].id
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

        $('#selectProducto').change(function(e) {
            e.preventDefault();
            var idProductoSelect = $('#selectProducto option:selected').val();
            productos.forEach(element => {
                if (element.id == idProductoSelect) {
                    $('#precio').val(element.precioCompra);
                }
            });


        });

        $('#agregarProducto').click(function(e) {
            e.preventDefault();
            var unico = true;
            var cont = 0;
            cargarDatosItem();
            if (cantidad > 0) {
                $('#option').val(2);
                console.log(carrito);
                $.ajax({
                    type: 'GET',
                    url: '{{ route('compras.create') }}',
                    data: $('#formProveedores').serialize(),
                    success: function(data) {
                        carrito = data;
                        cargarCarrito();
                        $('#cantidad').val(null);
                    }
                });
            }
        });

        $('#agregarCompra').click(function(e) {
            // e.preventDefault();
            $('#option').val(4);
            console.log(carrito);
            $.ajax({
                type: 'GET',
                url: '{{ route('compras.store') }}',
                data: $('#formProveedores').serialize(),
                success: function(salida) {
                    console.log(salida);
                }
            });
        })

        function cargarDatosItem() {
            idProducto = parseInt($('#selectProducto').val());
            producto = $('#selectProducto option:selected').text();
            precio = parseFloat($('#precio').val());
            cantidad = parseInt($('#cantidad').val());
        };

        function cargarCarrito() {
            var inner = "";
            var cont = 0
            total = 0;
            if (carrito.length > 0) {
                $('#agregarCompra').removeAttr("hidden");
            } else {
                console.log('entro pero le valio xd');
                $('#agregarCompra').add('hidden');
                $('#agregarCompra').attr("disabled");
            }
            carrito.forEach(element => {
                var subtotal = parseFloat(element.Precio) * parseFloat(element.Cantidad);
                inner += "<tr>" +
                    "<th > <button class='btn btn-danger' onclick='quitarItem(" + cont +
                    ")'>❌</button> </th>" +
                    "<th >" + element.Producto + "</th>" +
                    "<th >" + element.Precio + "</th>" +
                    "<th >" + element.Cantidad + "</th>" +
                    "<th >" + subtotal + "</th>" +
                    "</tr>";
                total += subtotal;
                cont++;
            });
            $('#total').text(total);
            $('#tblProductos').html(inner);


        };

        function limpiarDatos() {
            idProducto = null;
            producto = null;
            precio = null;
            cantidad = null;
            carrito = [];

        };

        function quitarItem(contador) {
            event.preventDefault();
            $('#option').val(3);
            $('#index').val(contador);
            $.ajax({
                type: 'GET',
                url: '{{ route('compras.create') }}',
                data: $('#option').val(3),
                success: function(data) {
                    carrito = data;
                }
            });

            if (contador == 0) {
                carrito.shift();
            } else {
                carrito.splice(contador, contador);
            }
            cargarCarrito();
        };
    </script>
@endpush
