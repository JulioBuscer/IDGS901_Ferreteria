@extends('layouts.layout')

@section('content')

    @if (Session::has('message'))
        <br>{{ Session::get('message') }} <br>
    @endif

    {{ HTML::ul($errors->all()) }}


    <div class="m-5">
        <form id="formCompra" name="formCompra" action=" {{ route('compras.create') }}">
            <input type=" text" value="0" name="opcion" id="opcion" readonly hidden>
            <input type="text" value="0" name="idSelected" id="idSelected" readonly hidden>
        </form>

        <!-- Tabs navs -->
        <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="ex3-tab-1" data-mdb-toggle="tab" href="#ex3-tabs-1" role="tab"
                    aria-controls="ex3-tabs-1" aria-selected="true">Pedidos</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="tab" href="#ex3-tabs-2" role="tab"
                    aria-controls="ex3-tabs-2" aria-selected="false">Aceptados</a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex3-tab-3" data-mdb-toggle="tab" href="#ex3-tabs-3" role="tab"
                    aria-controls="ex3-tabs-3" aria-selected="false">Cancelados</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex3-tab-4" data-mdb-toggle="tab" href="#ex3-tabs-4" role="tab"
                    aria-controls="ex3-tabs-4" aria-selected="false">Registro</a>
            </li>
        </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content" id="ex2-content">
            <!-- Activos -->

            <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                <h2 class="card-title text-left">Compras Pedidos</h2>
                <hr class="hr-245">
                <div class="col form-outline  m-2">
                    <table name="tblComprasCompletas" id="tblComprasCompletas" class="text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Proveedor</th>
                                <th>Descripcion</th>
                                <th>Total</th>
                                <th>Pedido</th>
                                <th>Empleado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($compras_completas as $compra_completa)
                                @if ($compra_completa['Compra']['status'] == 1)
                                    <tr>
                                        <td>{{ $compra_completa['Compra']['id'] }}</td>
                                        <td>{{ $compra_completa['Compra']['Proveedor'] }}</td>
                                        <td>{{ $compra_completa['Compra']['Descripcion'] }}</td>
                                        <td>{{ $compra_completa['Compra']['Total'] }}</td>
                                        <td>{{ $compra_completa['Compra']['FechaPedido'] }}</td>
                                        <td>{{ $compra_completa['Compra']['Empleado'] }}</td>
                                        <td class="row">
                                            <span class="col">

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm" data-mdb-toggle="modal"
                                                    data-mdb-target="#showModal{{ $loop->index }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <!-- Modal -->
                                                @include('compras.show')
                                            </span>
                                        </td>
                                    </tr>
                                @endif
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Inactivos -->
            <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                <h2 class="card-title text-left">Compras Aceptados</h2>
                <hr class="hr-245">
                <div class="col form-outline  m-2">
                    <table name="tblComprasEntregadas" id="tblComprasEntregadas" class="text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Proveedor</th>
                                <th>Descripcion</th>
                                <th>Total</th>
                                <th>Pedido</th>
                                <th>Aceptado</th>
                                <th>Empleado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($compras_completas as $compra_completa)
                                @if ($compra_completa['Compra']['status'] == 2)
                                    <tr>
                                        <td>{{ $compra_completa['Compra']['id'] }}</td>
                                        <td>{{ $compra_completa['Compra']['Proveedor'] }}</td>
                                        <td>{{ $compra_completa['Compra']['Descripcion'] }}</td>
                                        <td>{{ $compra_completa['Compra']['Total'] }}</td>
                                        <td>{{ $compra_completa['Compra']['FechaPedido'] }}</td>
                                        <td>{{ $compra_completa['Compra']['FechaEntrega'] }}</td>
                                        <td>{{ $compra_completa['Compra']['Empleado'] }}</td>
                                        <td class="row">
                                            <span class="col">

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-sm" data-mdb-toggle="modal"
                                                    data-mdb-target="#showModal{{ $loop->index }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <!-- Modal -->
                                                @include('compras.show')
                                            </span>
                                        </td>
                                    </tr>
                                @endif
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Registro -->

            <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">
                <div class="card-body">
                    <h2 class="card-title text-left">Compra Cancelados</h2>
                    <hr class="hr-245">
                    <div class="col form-outline  m-2">
                        <table name="tblComprasCanceladas" id="tblComprasCanceladas" class="text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Proveedor</th>
                                    <th>Descripcion</th>
                                    <th>Total</th>
                                    <th>Pedido</th>
                                    <th>Cancelado</th>
                                    <th>Empleado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($compras_completas as $compra_completa)
                                    @if ($compra_completa['Compra']['status'] == 0)
                                        <tr>
                                            <td>{{ $compra_completa['Compra']['id'] }}</td>
                                            <td>{{ $compra_completa['Compra']['Proveedor'] }}</td>
                                            <td>{{ $compra_completa['Compra']['Descripcion'] }}</td>
                                            <td>{{ $compra_completa['Compra']['Total'] }}</td>
                                            <td>{{ $compra_completa['Compra']['FechaPedido'] }}</td>
                                            <td>{{ $compra_completa['Compra']['FechaEntrega'] }}</td>
                                            <td>{{ $compra_completa['Compra']['Empleado'] }}</td>
                                            <td class="row">
                                                <span class="col">

                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-mdb-toggle="modal"
                                                        data-mdb-target="#showModal{{ $loop->index }}">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <!-- Modal -->
                                                    @include('compras.show')
                                                </span>
                                            </td>
                                        </tr>
                                    @endif
                                @empty

                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="ex3-tabs-4" role="tabpanel" aria-labelledby="ex3-tab-4">
                <div class="card-body">
                    <h2 class="card-title text-left">Compra Registro</h2>
                    <hr class="hr-245">
                    <div class="col form-outline  m-2">
                        @include('compras.create')
                    </div>
                </div>
            </div>
        </div>
        <!-- Tabs content -->

    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#tblComprasCompletas').DataTable();
            $('#tblComprasEntregadas').DataTable();
            $('#tblComprasCanceladas').DataTable();
        });


        function recibirCompra(id) {
            console.log(id);
            $('#opcion').val("Recibir");
            $('#idSelected').val(id);
            $.ajax({
                type: 'GET',
                url: '{{ route('compras.create') }}',
                data: $('#formCompra').serialize(),
                success: function(data) {
                    window.location.reload();
                }
            });
        }

        function cancelarCompra(id) {
            console.log(id);
            $('#opcion').val("Cancelar");
            $('#idSelected').val(id);
            $.ajax({
                type: 'GET',
                url: '{{ route('compras.create') }}',
                data: $('#formCompra').serialize(),
                success: function(data) {
                    window.location.reload();
                }
            });
        }
    </script>
@endpush
