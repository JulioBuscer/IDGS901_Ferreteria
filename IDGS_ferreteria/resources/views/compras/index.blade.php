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
                    aria-controls="ex3-tabs-1" aria-selected="true">Pedidos</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="tab" href="#ex3-tabs-2" role="tab"
                    aria-controls="ex3-tabs-2" aria-selected="false">Recibidos</a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="tab" href="#ex3-tabs-2" role="tab"
                    aria-controls="ex3-tabs-2" aria-selected="false">Cancelados</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex4-tab-3" data-mdb-toggle="tab" href="#ex3-tabs-4" role="tab"
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
                    <p>
                        {{-- {{ var_dump($compras_completas) }} --}}
                    </p>

                    <table name="tblComprasCompletas" id="tblComprasCompletas" class="text-center">
                        <thead class="table-danger ">
                            <tr>
                                <th hidden>ID</th>
                                <th>Proveedor</th>
                                <th>Descripcion</th>
                                <th>Total</th>
                                <th>Pedido</th>
                                <th>Empleado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($compras_completas as $compra_completa)
                                {{-- {{ var_dump($compra_completa) }} --}}
                                {{-- {{ $compra_completa['Compra']['id'] }} --}}
                                {{-- {{ $compra_completa['Detalle'][0] }} --}}
                                @if ($compra_completa['Compra']['status'] == 1)
                                    <tr>
                                        <td hidden>{{ $compra_completa['Compra']['id'] }}</td>
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
                                                <div class="modal top fade" id="showModal{{ $loop->index }}" tabindex="-1"
                                                    aria-labelledby="showModalLabel" aria-hidden="true"
                                                    data-mdb-backdrop="true" data-mdb-keyboard="false">
                                                    <div class="modal-dialog modal-xl  modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="showModalLabel">Vista Proveedor
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-mdb-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @include('compras.show',$modelo=$compra_completa['Detalle'])
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary "
                                                                    data-mdb-dismiss="modal">
                                                                    <i class="fas fa-eye-slash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                <h2 class="card-title text-left">Compras Entregados</h2>
                <hr class="hr-245">
                <div class="col form-outline  m-2">

                </div>
            </div>
            <!-- Registro -->

            <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">
                <div class="card-body">
                    <h2 class="card-title text-left">Compra Registro</h2>
                    <hr class="hr-245">
                    <div class="col form-outline  m-2">


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
        });
    </script>
@endpush
