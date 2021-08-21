<!-- {{ var_dump($venta_completa) }} -->
<div class="modal top fade" id="showModal{{ $loop->index }}" tabindex="-1" aria-labelledby="showModalLabel"
    aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="false">
    <div class="modal-dialog modal-xl  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel">Detalle Venta
                </h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row justify-content">
                <div class="col d-flex justify-content-start ml-5">
                    <h5> ID Venta : {{ $venta_completa['Venta']['id'] }}</h4>
                </div>
                <div class="col d-flex justify-content-center mlr-5">
                    <h5>Fecha: {{ $venta_completa['Venta']['Fecha'] }}</h4>
                </div>
                <div class="col d-flex justify-content-center mlr-5">
                    <h5>IVA: {{ $venta_completa['Venta']['Iva'] }}</h4>
                </div>
            </div>
            <div class="row justify-content">
                <div class="col d-flex justify-content-start ml-5">
                    <div class="text-justify">
                        <h5>Proveedor: {{ $venta_completa['Venta']['Cliente'] }} </h5>
                        <h5>Empleado: {{ $venta_completa['Venta']['Empleado'] }} </h5>
                    </div>
                </div>
                <div class="col d-flex justify-content-betwen mrl-5">
                    <div class="text-justify">
                        <label for="pDescripcion">Subtotal</label>
                        <p name="pDescripcion" id="pDescripcion">{{ $venta_completa['Venta']['SubTotal'] }} </p>
                    </div>
                </div>
                <div class="col d-flex justify-content-end mr-5">
                    <h4>Total: ${{ $venta_completa['Venta']['Total'] }}</h4>
                </div>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="table-dark">
                        <th>ID Producto</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </thead>
                    <tbody>
                        @forelse ($venta_completa['Detalle'] as $detalle)
                            <tr>
                                <td>{{ $detalle['idProducto'] }}</td>
                                <td>{{ $detalle['Producto'] }}</td>
                                <td>{{ $detalle['Precio'] }}</td>
                                <td>{{ $detalle['Cantidad'] }}</td>
                                <td>{{ $detalle['Subtotal'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>No</td>
                                <td>Hay</td>
                                <td>Productos</td>
                                <td>Dentro</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            @if ($venta_completa['Venta']['Estatus'] == 1)
                    <button type="success" class="btn btn-danger"
                        onclick="cancelarVenta({{ $venta_completa['Venta']['id'] }})">
                        <i class='fas fa-ban'></i>
                    </button>
                @endif
                <button type="button" class="btn btn-secondary " data-mdb-dismiss="modal">
                    <i class="fas fa-eye-slash"></i>
                </button>
            </div>
        </div>
    </div>
</div>
