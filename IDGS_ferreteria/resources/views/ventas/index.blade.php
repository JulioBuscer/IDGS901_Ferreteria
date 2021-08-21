@extends('layouts.layout')
@section('content')
<div class="m-5 ">
    <!-- Tabs navs -->
    <form id="formVenta" name="formVenta" action=" {{ route('venta_terminada.create') }}">
            <input type=" text" value="0" name="opcion" id="opcion" readonly hidden>
            <input type="text" value="0" name="idSelected" id="idSelected" readonly hidden>
        </form>
    <ul class="nav nav-tabs d-flex align-items-center justify-content-center mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="ex3-tab-1" data-mdb-toggle="tab" href="#ex3-tabs-1" role="tab"
                aria-controls="ex3-tabs-1" aria-selected="true">Ventas</a>
        </li>
    </ul>
    <!-- Tabs navs -->

    <!-- Tabs content -->
    <div class="tab-content d-flex align-items-center justify-content-center" id="ex2-content">
        <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
            <h2 class="card-title text-left">Ventas realizadas</h2>
            <hr class="hr-245">
            <table id="reportTable" class="text-justify">
                <thead class="table-dark text-center">
                    <th>No.</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Cantidad Poductos</th>
                    <th>Subtotal</th>
                    <th>IVA.</th>
                    <th>Total</th>
                    <th>Empleado</th>
                    <th>Acciones</th>
                </thead>

                <tbody>
                    @forelse($ventas_completas as $venta_completa)
                    @if($venta_completa['Venta']['Estatus']==1)
                    <tr>
                        <td>{{$venta_completa['Venta']['id']}}</td>
                        <td>{{$venta_completa['Venta']['Cliente']}}</td>
                        <td>{{$venta_completa['Venta']['Fecha']}}</td>
                        <td>{{$venta_completa['Venta']['Cantidad']}}</td>
                        <td>{{$venta_completa['Venta']['SubTotal']}}</td>
                        <td>{{$venta_completa['Venta']['Iva']}}</td>
                        <td>{{$venta_completa['Venta']['Total']}}</td>
                        <td>{{$venta_completa['Venta']['Empleado']}}</td>
                        <td class="row">
                            <span class="col">

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-sm" data-mdb-toggle="modal"
                                    data-mdb-target="#showModal{{ $loop->index }}">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <!-- Modal -->
                                @include('ventas.show')
                            </span>
                        </td>
                    </tr>
                    @endif
                    @empty
                    <tr>
                        <td colspan="2">No hay ventas</td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('#reportTable').DataTable();
});

function cancelarVenta(id) {
    console.log(id);
    $('#opcion').val("Cancelar");
    $('#idSelected').val(id);
    $.ajax({
        type: 'GET',
        url: '{{ route('venta_terminada.create') }}',
        data: $('#formVenta').serialize(),
        success: function(data) {
            console.log(data);

            window.location.reload();
        }
    });
}
</script>
@endpush