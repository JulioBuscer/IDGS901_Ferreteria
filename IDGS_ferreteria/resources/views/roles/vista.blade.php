@extends('layouts.layout')


@section('content')
<div class="m-5">

    <!-- Tabs navs -->
    <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="ex3-tab-1" data-mdb-toggle="tab" href="#ex3-tabs-1" role="tab" aria-controls="ex3-tabs-1" aria-selected="true">Activos</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="ex3-tab-3" data-mdb-toggle="tab" href="#ex3-tabs-3" role="tab" aria-controls="ex3-tabs-3" aria-selected="false">Registro</a>
        </li>
    </ul>
    <!-- Tabs navs -->

    <!-- Tabs content -->
    <div class="tab-content mb-3" id="ex2-content">
        <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
            <h2 class="card-title text-left">Roles Activos</h2>
            <hr class="hr-245">
            <table class="table  text-justify">
                <thead class="table-dark text-center">
                    <th>Id</th>
                    <th>Nombre Rol</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </thead>

                <tbody>
                    @forelse($table as $row)

                    <tr align="center">
                        <td>{{$row->id}}</td>
                        <td>{{$row->nombre}}</td>
                        <td>{{$row->descripcion}}</td>
                        <td>
                            <button class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal1" onclick="verRoles('{{$row->id}}','{{$row->nombre}}','{{$row->descripcion}}')"> <i class="fas fa-eye"></i> </button>

                            <button class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#exampleModal" onclick="editarRoles('{{$row->id}}','{{$row->nombre}}','{{$row->descripcion}}')"> <i class="fas fa-edit"></i> </button>

                            {{Form::open(["url" =>route('Roles.destroy', $row->id)])}}
                            {{ Form::hidden('_method','DELETE')}}
                            <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
                            {{Form::close()}}
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="2">No hay Roles registrados </td>
                    </tr>

                    @endforelse

                </tbody>
            </table>
        </div>




        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar rol</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" id=editCat>
                        <div class="modal-body">
                            <!-- -->
                            <input name="_method" type="hidden" value="PUT">
                            @csrf
                            <div class="row">
                                <input name="idCat" style="display:none;" id="idCat" />
                                <div class="col form-outline m-2">
                                    <input name="nombrerol1" type="text" id="nombrerol1" class="form-control" />
                                    <label class="form-label" for="nombrerol1">Nombre rol</label>
                                </div>
                                <div class="col form-outline  m-2">
                                    <input name="descripcionRol1" type="text" id="descripcionRol1" class="form-control" />
                                    <label class="form-label" for="descripcionRol1">Descripcion rol</label>
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

        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Detalle roles</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col form-outline m-2">
                                <input name="nombreRol2" type="text" id="nombreRol2" class="form-control" />
                                <label class="form-label" for="nombreRol2">Nombre rol</label>
                            </div>
                            <div class="col form-outline  m-2">
                                <input name="descripcionRol2" type="text" id="descripcionRol2" class="form-control" />
                                <label class="form-label" for="descripcionRol2">Descripcion rol</label>
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

        <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">
            <div class="card-body">
                <h2 class="card-title text-left">Roles registro</h2>
                <hr class="hr-245">
                {{Html::ul($errors->all())}}
                {{Form::open(["url"=>"/Roles"])}}
                <!-- Email input -->
                <div class="row">
                    <div class="col form-outline m-2">
                        <input name="nombrerol" type="text" id="nombrerol" class="form-control" />
                        <label class="form-label" for="nombrerol">Nombre rol</label>
                    </div>
                    <div class="col form-outline  m-2">
                        <input name="descripcionrol" type="text" id="descripcionrol" class="form-control" />
                        <label class="form-label" for="descripcionrol">Descripcion rol</label>
                    </div>
                </div>
                <!-- Submit button -->
                <div class="text-right">
                    <button type="submit" class="btn btn-color-2 ">Registrar</button>
                </div>

                {{Form::close()}}
            </div>
        </div>
    </div>
    <!-- Tabs content -->

</div>

@endsection