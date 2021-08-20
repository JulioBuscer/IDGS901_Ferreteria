{{-- {{ var_dump($compra_completa['Detalle']) }} --}}
<table class="table">
    <thead>
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
    </thead>
    <tbody>
        @forelse ($compra_completa['Detalle'] as $detalle)
            <tr>
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
