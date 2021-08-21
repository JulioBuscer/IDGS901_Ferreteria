@extends('layouts.layout')
@section('content')
<div class="m-5 ">
    <!-- Tabs navs -->
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
            <table id="reportTable" class="table table-responsive text-justify">
                <thead class="table-dark text-center">
                    <th>No.</th>
                    <th>Fecha</th>
                    <th>IVA</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                    <th>Productos</th>
                </thead>

                <tbody>
                    @forelse($ventas as $key=>$row)

                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->fecha}}</td>
                        <td>{{$row->iva}}</td>
                        <td>{{$row->subtotal}}</td>
                        <td>{{$row->total}}</td>
                        <td>{{$row->cantidad}}</td>

                    </tr>
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