{{ Form::open(['url' => route('proveedores.store')]) }}

<div class="row">
    <div class="col form-outline m-2">
        {!! Form::label('selectProveedor', 'Proveedores', ['class' => 'form-label']) !!}
        {!! Form::select('selectProveedor', $proveedores, null, ['class' => 'form-control', 'id' => 'selectProveedor', 'onchange' => '', 'required']) !!}
    </div>

    <div class="col form-outline m-2">
        {!! Form::label('selectProducto', 'Productos', ['class' => 'form-label']) !!}
        
        {!! Form::select('selectProducto', $productos, null, ['class' => 'form-control', 'id' => 'selectProducto', 'required']) !!}
    </div>

    <div class="col form-outline m-2">
        {{ Form::number('costo', Request::old('costo'), ['class' => 'form-control', 'required']) }}
        {{ Form::label('csoto', 'Costo', ['class' => 'form-label']) }}
    </div>
</div>

<div class="text-right">
    {{ Form::button('<i class="fas fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-color-2']) }}
</div>

{{ Form::close() }}
@push('scripts')
    <script>
        $('#selectProveedor').select2({});
        $('#selectProducto').select2({});
    </script>
@endpush
