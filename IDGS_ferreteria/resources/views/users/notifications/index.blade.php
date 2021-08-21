@extends('layouts.layout')
@section('content')
<div class="m-5 ">
    <!-- Tabs navs -->
    <ul class="nav nav-tabs d-flex align-items-center justify-content-center mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="ex3-tab-1" data-mdb-toggle="tab" href="#ex3-tabs-1" role="tab"
                aria-controls="ex3-tabs-1" aria-selected="true">No leídas</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="tab" href="#ex3-tabs-2" role="tab"
                aria-controls="ex3-tabs-2" aria-selected="false">Leídas</a>
        </li>
    </ul>
    <!-- Tabs navs -->

    <!-- Tabs content -->
    <div class="tab-content d-flex align-items-center justify-content-center" id="ex2-content">
        <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
            <h2 class="card-title text-left">Notificaciones no leídas</h2>
            <hr class="hr-245">
            <table id="reportTable" class="table table-responsive text-justify">
                <thead class="table-dark text-center">
                    <th>No.</th>
                    <th>Notificación</th>
                    <th>Fecha/Hora</th>
                </thead>

                <tbody>
                    @forelse($sql as $key=>$row)

                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$row->data}}</td>
                        <td>{{$row->created_at}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2">No hay notificaciones por leer </td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
            <h2 class="card-title text-left">Notificaciones leídas</h2>
            <hr class="hr-245">
            <table id="reportTable" class="table table-responsive text-justify">
                <thead class="table-dark text-center">
                    <th>No.</th>
                    <th>Notificación</th>
                    <th>Fecha/Hora Recibida</th>
                    <th>Fecha/Hora Leída</th>
                </thead>

                <tbody>
                    @forelse($sqls as $key=>$row)

                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$row->data}}</td>
                        <td>{{$row->created_at}}</td>
                        <td>{{$row->read_at}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2">No hay notificaciones leídas</td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection