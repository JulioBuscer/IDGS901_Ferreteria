@forelse ($modelo as $detalle)
    {{ $detalle['Producto'] }}
@empty

@endforelse
