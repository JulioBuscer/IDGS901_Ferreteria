{{ Form::open(['url' => route('proveedores.store')]) }}

<div class="row">
    <div class="col form-outline m-2">
        {{ Form::text('empresa', Request::old('empresa'), ['class' => 'form-control', 'required']) }}
        {{ Form::label('empresa', 'Empresa Proveedor', ['class' => 'form-label']) }}
    </div>
    <div class="col form-outline m-2">
        {{ Form::text('representante', Request::old('representante'), ['class' => 'form-control', 'required']) }}
        {{ Form::label('representante', 'Representante', ['class' => 'form-label']) }}
    </div>

    <div class="col form-outline m-2">
        {{ Form::email('email', Request::old('email'), ['class' => 'form-control', 'required']) }}
        {{ Form::label('email', 'E-mail', ['class' => 'form-label']) }}
    </div>
</div>

<div class="row">
    <div class="col form-outline m-2">
        {{ Form::text('telefono', Request::old('telefono'), ['class' => 'form-control', 'required']) }}
        {{ Form::label('telefono', 'Telefono', ['class' => 'form-label']) }}

    </div>
    <div class="col form-outline m-2">
        {{ Form::text('rfc', Request::old('rfc'), ['class' => 'form-control', 'required']) }}
        {{ Form::label('rfc', 'RFC', ['class' => 'form-label']) }}
    </div>
    <div class="col form-outline m-2">
        {{ Form::text('direccion', Request::old('direccion'), ['class' => 'form-control', 'required']) }}
        {{ Form::label('direccion', 'Direccion', ['class' => 'form-label']) }}
    </div>
</div>
<div class="text-right">
    <button type="submit" class="btn btn-color-2" />
    <i class="fas fa-save"></i>
    </button>
</div>
{{ Form::close() }}
