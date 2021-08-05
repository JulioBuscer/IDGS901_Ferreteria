@extends('layouts.layout')

@section('content')

@if(Session::has('message'))
<br>{{Session::get('message')}} <br>
@endif

{{HTML::ul($errors->all())}}

<div class="m-5">

    <!-- Tabs navs -->
    <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="ex3-tab-1" data-mdb-toggle="tab" href="#ex3-tabs-1" role="tab" aria-controls="ex3-tabs-1" aria-selected="true">Activos</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="tab" href="#ex3-tabs-2" role="tab" aria-controls="ex3-tabs-2" aria-selected="false">Inactivos</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="ex3-tab-3" data-mdb-toggle="tab" href="#ex3-tabs-3" role="tab" aria-controls="ex3-tabs-3" aria-selected="false">Registro</a>
        </li>
    </ul>
    <!-- Tabs navs -->

    <!-- Tabs content -->
    <div class="tab-content" id="ex2-content">
        <!-- Activos -->
        <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
            <h2 class="card-title text-left">Proveedores Activos</h2>
            <hr class="hr-245">
            <table class="table text-justify">
                <thead class="table-dark text-center">
                    <th>PROVEEDOR</th>
                    <th>REPRESENTANTE</th>
                    <th>EMAIL</th>
                    <th>TELEFONO</th>
                    <th>RFC</th>
                    <th>DIRECCION</th>
                    <th>ACCIONES</th>
                </thead>

                <tbody>
                    @forelse($table as $row)
                    @if($row->active == 1)
                    <tr>
                        <td>{{$row->empresa}}</td>
                        <td>{{$row->representante}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->telefono}}</td>
                        <td>{{$row->RFC}}</td>
                        <td>{{$row->direccion}}</td>
                        <td class="row">
                            <!-- Consultar -->
                            <span class="col">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#showModal{{$loop->index}}">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal top fade" id="showModal{{$loop->index}}" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="false">
                                    <div class="modal-dialog modal-xl  modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="showModalLabel">Vista Proveedor</h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @include('proveedores.show',$modelo=$row)
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </span>
                            <!-- Editar -->
                            <span class="col">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#editModal{{$loop->index}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal top fade" id="editModal{{$loop->index}}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="false">
                                    <div class="modal-dialog modal-xl  modal-dialog-centered">
                                        <div class="modal-content">

                                            {{Form::model($modelo,["route"=>["proveedores.update",$row->id], "method"=>"PUT"])}}
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Editar Proveedor</h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @include('proveedores.edit',$modelo=$row)
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                                                    Close
                                                </button>
                                                {{Form::submit('Save changes',["class"=>"btn btn-primary"])}}
                                            </div>
                                        </div>
                                        {{Form::close()}}
                                    </div>
                                </div>
                            </span>
                            <!-- Eliminar -->
                            <span class="col">
                                {{Form::open(["url"=>route('proveedores.destroy',$row->id)])}}
                                {{Form::hidden('_method','DELETE')}}
                                <button type="submit" class="btn btn-danger" /> <i class='fas fa-trash'></i> </button>
                                {{Form::close()}}
                            </span>
                        </td>
                    </tr>
                    @endif
                    @empty
                    <tr>
                        <td>No hay proveedores registrados</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Inactivos -->
        <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
            <h2 class="card-title text-left">Proveedores Inactivos</h2>
            <hr class="hr-245">
            <table class="table text-justify">
                <thead class="table-dark text-center">
                    <th>PROVEEDOR</th>
                    <th>REPRESENTANTE</th>
                    <th>EMAIL</th>
                    <th>TELEFONO</th>
                    <th>RFC</th>
                    <th>DIRECCION</th>
                    <th>ACCIONES</th>
                </thead>

                <tbody>
                    @forelse($table as $row)
                    @if($row->active == 0)
                    <tr>
                        <td style="display:none;">{{$row->id}}</td>
                        <td>{{$row->empresa}}</td>
                        <td>{{$row->representante}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->telefono}}</td>
                        <td>{{$row->RFC}}</td>
                        <td>{{$row->direccion}}</td>
                        <td>
                            @if( \Auth::user()->id_rol == 1)
                            {{Form::open(["url"=>route('proveedores.destroy',$row->id)])}}
                            {{Form::hidden('_method','DELETE')}}
                            <button type="submit" class="btn btn-danger" /> <i class='fas fa-trash'></i> </button>
                            {{Form::close()}}
                            @endif
                        </td>
                    </tr>
                    @endif
                    @empty
                    <tr>
                        <td>No hay proveedores registrados</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Registro -->

        <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">
            <div class="card-body">
                <h2 class="card-title text-left">Proveedores Registro</h2>
                <hr class="hr-245">
                <!-- Importamos el formulario para registrar un prveedor -->
                @include('proveedores.create')
            </div>
        </div>
    </div>
    <!-- Tabs content -->

</div>
@endsection