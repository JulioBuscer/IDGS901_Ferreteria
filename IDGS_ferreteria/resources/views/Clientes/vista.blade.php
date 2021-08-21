@extends('layouts.layout')
@section('content')
<div class="m-5 ">
    <!-- Tabs navs -->
    <ul class="nav nav-tabs d-flex align-items-center justify-content-center mb-3" id="ex1" role="tablist">
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
    <div class="tab-content d-flex align-items-center justify-content-center" id="ex2-content">
        <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
            <h2 class="card-title text-left">Clientes Activos</h2>
            <hr class="hr-245">
            <table class="table table-responsive text-justify">
                <thead class="table-dark text-center">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>RFC</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </thead>

                <tbody>
                    @forelse($table as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->nombre}} {{$row->apellidoP}} {{$row->apellidoM}} </td>
                        <td>{{$row->rfc}}</td>
                        <td>{{$row->telefono}}</td>
                        <td>{{$row->direccion}}</td>
                        <td>{{$row->correo}}</td>
                        <td>
                            <button class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal1" onclick="verCliente('{{$row->id}}','{{$row->nombre}}','{{$row->apellidoP}}','{{$row->apellidoM}}','{{$row->rfc}}','{{$row->direccion}}','{{$row->correo}}','{{$row->idPersona}}','{{$row->telefono}}')">
                                <i class="fas fa-eye"></i> </button>
                            <button class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#exampleModal" onclick="editarCliente('{{$row->id}}','{{$row->nombre}}','{{$row->apellidoP}}','{{$row->apellidoM}}','{{$row->rfc}}','{{$row->direccion}}','{{$row->correo}}','{{$row->idPersona}}','{{$row->telefono}}')">
                                <i class="fas fa-edit"></i> </button>

                            {{Form::open(["url" =>route('Clientes.destroy', $row->id)])}}
                            {{ Form::hidden('_method','DELETE')}}
                            <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
                            {{Form::close()}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2">No hay Empleados registrados </td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- tabla inactivos -->
        <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
            <h2 class="card-title text-left">Clientes Inactivos</h2>
            <hr class="hr-245">
            <table class="table table-responsive text-justify">
                <thead class="table-dark text-center">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>RFC</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @forelse($table2 as $row2)
                    <tr>
                        <td>{{$row2->id}}</td>
                        <td>{{$row2->nombre}} {{$row2->apellidoP}} {{$row2->apellidoM}} </td>
                        <td>{{$row2->rfc}}</td>
                        <td>{{$row2->telefono}}</td>
                        <td>{{$row2->direccion}}</td>
                        <td>{{$row2->correo}}</td>
                        <td>
                            <button class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal1" onclick="verCliente('{{$row2->id}}','{{$row2->nombre}}','{{$row2->apellidoP}}','{{$row2->apellidoM}}','{{$row2->rfc}}','{{$row2->direccion}}','{{$row2->correo}}','{{$row2->idPersona}}','{{$row2->telefono}}')">
                                <i class="fas fa-eye"></i> </button>

                            {{Form::open(["url" =>route('Clientes.edit', $row2->id)])}}
                            {{ Form::hidden('_method','GET')}}
                            <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> </button>
                            {{Form::close()}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2">No hay Clientes registrados </td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- formulario para insertar -->
        <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">
            <h2 class="card-title text-left">Clientes registro</h2>
            <hr class="hr-245">
            {{Html::ul($errors->all())}}
            {{Form::open(["url"=>"/Clientes"])}}
            <div class="row">
                <div class="col-12 mr-2">
                    <div class="row">
                        <div class="col form-outline m-2">
                            <input type="text" name="nombre" id="nombre" class="form-control" />
                            <label class="form-label" for="nombre">Nombre </label>
                        </div>
                        <div class="col form-outline m-2">
                            <input type="text" name="App" id="App" class="form-control" />
                            <label class="form-label" for="App">Apellido Paterno</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-outline m-2">
                            <input type="text" name="Apm" id="Apm" class="form-control" />
                            <label class="form-label" for="Apm">Apellido Materno</label>
                        </div>
                        <div class="col form-outline  m-2">
                            <input type="number" min="1" name="tel" id="tel" class="form-control" />
                            <label class="form-label" for="tel">Telefono</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-outline  m-2">
                            <input type="email" name="email" autocomplete="off" value="" id="email" class="form-control" />
                            <label class="form-label" for="email">Correo</label>
                        </div>
                        <div class="col form-outline m-2">
                            <input type="text" name="rfc" id="rfc" class="form-control" />
                            <label class="form-label" for="rfc">RFC</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-outline  m-2">
                            <input type="text" name="direccion" id="direccion" class="form-control" />
                            <label class="form-label" for="direccion">Direccion</label>
                        </div>
                    </div>
                </div>

                <div class="col-11 text-right mt-2">
                    <button type="submit" class="btn btn-color-2 ">Registrar</button>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
    <!-- Tabs content -->
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Clientes</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id=editCat>

                <input name="_method" type="hidden" value="PUT">
                @csrf

                <input name="idProd" style="display:none;" id="idEmp" />
                <input name="idPer" style="display:none;" id="idPer" />
                <div class="modal-body">
                    <div class="row">
                        <div class="col form-outline m-2">
                            <input type="text" name="nombre1" id="nombre1" class="form-control active" />
                            <label class="form-label" for="nombre1">Nombre </label>
                        </div>
                        <div class="col form-outline m-2">
                            <input type="text" name="App1" id="App1" class="form-control active" />
                            <label class="form-label" for="App1">Apellido Paterno</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-outline m-2">
                            <input type="text" name="Apm1" id="Apm1" class="form-control active" />
                            <label class="form-label" for="Apm1">Apellido Materno</label>
                        </div>
                        <div class="col form-outline  m-2">
                            <input type="number" min="1" name="tel1" id="tel1" class="form-control active" />
                            <label class="form-label" for="tel1">Telefono</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-outline  m-2">
                            <input type="email" name="email1" autocomplete="off" value="" id="email1" class="form-control" />
                            <label class="form-label" for="email1">Correo</label>
                        </div>
                        <div class="col form-outline m-2">
                            <input type="text" name="rfc1" id="rfc1" class="form-control" />
                            <label class="form-label" for="rfc1">RFC</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-outline  m-2">
                            <input type="text" name="direccion1" id="direccion1" class="form-control" />
                            <label class="form-label" for="direccion1">Direccion</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal para mostrar detalle -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Ver Clientes</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col form-outline m-2">
                        <input type="text" name="nombre2" id="nombre2" class="form-control active" disabled />
                        <label class="form-label" for="nombre2">Nombre </label>
                    </div>
                    <div class="col form-outline m-2">
                        <input type="text" name="App2" id="App2" class="form-control active" disabled />
                        <label class="form-label" for="App2">Apellido Paterno</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-outline m-2">
                        <input type="text" name="Apm2" id="Apm2" class="form-control active" disabled />
                        <label class="form-label" for="Apm2">Apellido Materno</label>
                    </div>
                    <div class="col form-outline  m-2">
                        <input type="number" min="1" name="tel2" id="tel2" class="form-control active" disabled />
                        <label class="form-label" for="tel2">Telefono</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-outline  m-2">
                        <input type="email" name="email2" autocomplete="off" value="" id="email2" class="form-control" disabled />
                        <label class="form-label" for="email2">Correo</label>
                    </div>
                    <div class="col form-outline m-2">
                        <input type="text" name="rfc2" id="rfc2" class="form-control" disabled />
                        <label class="form-label" for="rfc2">RFC</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-outline  m-2">
                        <input type="text" name="direccion2" id="direccion2" class="form-control" disabled />
                        <label class="form-label" for="direccion2">Direccion</label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>
@endsection