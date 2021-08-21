{{-- {{ var_dump($compra_completa['Detalle']) }} --}}
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
                    <h5> ID Compra : {{ $compra_completa['Compra']['id'] }}</h4>
                </div>
                <div class="col d-flex justify-content-center mlr-5">
                    <h5>Fecha Pedido: {{ $compra_completa['Compra']['FechaEntrega'] }}</h4>
                </div>

                <div class="col d-flex justify-content-end mr-5">
                    <h5>Fecha Pedido: {{ $compra_completa['Compra']['FechaPedido'] }}</h4>
                </div>
            </div>
            <div class="row justify-content">
                <div class="col d-flex justify-content-start ml-5">
                    <div class="text-justify">
                        <h5>Proveedor: {{ $compra_completa['Compra']['Proveedor'] }} </h5>
                        <h5>Empleado: {{ $compra_completa['Compra']['Empleado'] }} </h5>
                    </div>
                </div>
                <div class="col d-flex justify-content-betwen mrl-5">
                    <div class="text-justify">
                        <label for="pDescripcion">Descripcion</label>
                        <p name="pDescripcion" id="pDescripcion">{{ $compra_completa['Compra']['Descripcion'] }} </p>
                    </div>
                </div>
                <div class="col d-flex justify-content-end mr-5">
                    <h4>Total: ${{ $compra_completa['Compra']['Total'] }}</h4>
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
                        @forelse ($compra_completa['Detalle'] as $detalle)
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
                @if ($compra_completa['Compra']['status'] == 1)
                    <button type="success" class="btn btn-success"
                        onclick="recibirCompra({{ $compra_completa['Compra']['id'] }})">
                        <i class='fas fa-check'></i>
                    </button>
                    <button type="success" class="btn btn-danger"
                        onclick="cancelarCompra({{ $compra_completa['Compra']['id'] }})">
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
