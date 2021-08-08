@extends('layouts.layout')

@section('content')

    @if (Session::has('message'))
        <br>{{ Session::get('message') }} <br>
    @endif

    {{ HTML::ul($errors->all()) }}


    <div class="m-5">

        <!-- Tabs navs -->
        <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="ex3-tab-1" data-mdb-toggle="tab" href="#ex3-tabs-1" role="tab"
                    aria-controls="ex3-tabs-1" aria-selected="true">Activos</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="tab" href="#ex3-tabs-2" role="tab"
                    aria-controls="ex3-tabs-2" aria-selected="false">Inactivos</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex3-tab-3" data-mdb-toggle="tab" href="#ex3-tabs-3" role="tab"
                    aria-controls="ex3-tabs-3" aria-selected="false">Registro</a>
            </li>
        </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content" id="ex2-content">
            <!-- Activos -->

            <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                <h2 class="card-title text-left">Proveedores Activos</h2>
                <hr class="hr-245">
                <div class="col form-outline  m-2">
                    <form id="formProveedores" name="formProveedores" method="HEAD"
                        action=" {{ route('compras.create') }} ">
                        {{-- Utilizamos la libreria Collective para el lavel y el Select, es importante el id para el uso del Select2 --}}
                        {!! Form::label('selectProveedor', 'Proveedores', ['class' => 'form-control']) !!}
                        <select name="selectProveedor" id="selectProveedor" required style="width: 50vh">
                            @forelse ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}">{{ $proveedor->empresa }}</option>
                            @empty

                            @endforelse
                        </select>
                        <button type="succes" name="consultarProductos" id="consultarProductos">consultarProductos</button>
                    </form>
                    {!! Form::label('selectProducto', 'Productos', ['class' => 'form-control']) !!}
                    <select name="selectProducto" id="selectProducto" required style="width: 50vh" disabled>


                    </select>
                    {{-- Implementamos los scripts para absorber la libreria Select 2 --}}
                    @push('scripts')
                        <script>
                            var productos;
                            $('#selectProveedor').select2({});
                            $('#selectProducto').select2({});
                            $('#consultarProductos').click(function(e) {
                                e.preventDefault();
                                // debugger;
                                $.ajax({
                                    type: 'GET',
                                    url: '{{ route('compras.create') }}',
                                    data: $('#selectProveedor').val(),
                                    success: function(proveedorProductos) {
                                        console.log(proveedorProductos);
                                        productos = proveedorProductos;
                                        var inner = "";
                                        if (productos.length > 0) {
                                            productos.forEach(element => {
                                                inner += "<option value='" + element.id + "'>" +
                                                    element.empresa + "</option>";
                                            });
                                            $('#selectProducto').html(inner);
                                            $('#selectProducto').removeAttr("disabled");
                                        }
                                        debugger;

                                    }
                                });
                            });
                        </script>
                    @endpush
                </div>
            </div>
            <!-- Inactivos -->
            <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                <h2 class="card-title text-left">Proveedores Inactivos</h2>
                <hr class="hr-245">

            </div>
            <!-- Registro -->


            <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">
                <div class="card-body">
                    <h2 class="card-title text-left">Proveedores Registro</h2>
                    <hr class="hr-245">
                    <!-- Importamos el formulario para registrar un prveedor -->
                    <!-- @include('proveedores.create') -->
                </div>
            </div>
        </div>
        <!-- Tabs content -->

    </div>
@endsection
