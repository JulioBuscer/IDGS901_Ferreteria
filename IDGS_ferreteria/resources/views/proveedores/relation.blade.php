{!! Form::open(['url' => route('proveedores.store'), 'class' => 'text-justify']) !!}

<div class="row">
    <div class="col form-outline m-2">
        {!! Form::label('selectProveedor', 'Proveedores', ['class' => 'form-label']) !!}
        <select name="selectProveedor" id="selectProveedor" style="width: 50vh">
            @forelse ($table as $proveedor)
                <option value="{{ $proveedor->id }}">{{ $proveedor->empresa }}</option>
            @empty

            @endforelse
        </select>

    </div>

    <div class="col form-outline m-2">
        {!! Form::label('selectProducto', 'Productos', ['class' => 'form-label']) !!}

        <select name="selectProducto" id="selectProducto" style="width: 50vh">
            @forelse ($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
            @empty

            @endforelse
        </select>

    </div>

    <div class="col form-outline m-2">
        {!! Form::number('costo', Request::old('costo'), ['class' => 'form-control', 'required']) !!}
        {!! Form::label('costo', 'Costo', ['class' => 'form-label']) !!}
    </div>
</div>

<div class="text-right">
    {!! Form::button('<i class="fas fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-color-2']) !!}
</div>

{!! Form::close() !!}
@push('scripts')
    <script>
        $('#selectProveedor').select2({});
        $('#selectProducto').select2({});
    </script>
@endpush
