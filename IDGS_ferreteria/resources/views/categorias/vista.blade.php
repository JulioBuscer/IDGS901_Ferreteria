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
            <h2 class="card-title text-left">Categorias Activas</h2>
            <hr class="hr-245">
            <table class="table  text-justify">
                <thead class="table-dark text-center">
                    <th>Id</th>
                    <th>Nombre Categoria</th>
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
                            <button class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal1" onclick="verCategorias('{{$row->id}}','{{$row->nombre}}','{{$row->descripcion}}')"> <i class="fas fa-eye"></i> </button>

                            <button class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#exampleModal" onclick="editarCategorias('{{$row->id}}','{{$row->nombre}}','{{$row->descripcion}}')"> <i class="fas fa-edit"></i> </button>

                            {{Form::open(["url" =>route('Categorias.destroy', $row->id)])}}
                            {{ Form::hidden('_method','DELETE')}}
                            <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
                            {{Form::close()}}
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="2">No hay categorias registradas </td>
                    </tr>

                    @endforelse

                </tbody>
            </table>
        </div>




        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" id=editCat>
                        <!-- {{Form::model(["route"=>["Categorias.update"]])}} -->
                        <div class="modal-body">
                            <!-- -->
                            <input name="_method" type="hidden" value="PUT">
                            @csrf
                            <div class="row">
                                <input name="idCat" style="display:none;" id="idCat" />
                                <div class="col form-outline m-2">
                                    <input name="nombreCat" type="text" id="nombreCat" class="form-control" />
                                    <label class="form-label" for="nombreCat">Nombre Categoria</label>
                                </div>
                                <div class="col form-outline  m-2">
                                    <input name="descripcionCat" type="text" id="descripcionCat" class="form-control" />
                                    <label class="form-label" for="descripcionCat">Descripcion categoria</label>
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
                    <!-- {{Form::close()}} -->
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Detalle Categoria</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- -->
                        <div class="row">
                            <div class="col form-outline m-2">
                                <input name="nombreCat2" type="text" id="nombreCat2" class="form-control" />
                                <label class="form-label" for="nombreCat2">Nombre Categoria</label>
                            </div>
                            <div class="col form-outline  m-2">
                                <input name="descripcionCat2" type="text" id="descripcionCat2" class="form-control" />
                                <label class="form-label" for="descripcionCat2">Descripcion categoria</label>
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
                <h2 class="card-title text-left">Categorias registro</h2>
                <hr class="hr-245">
                {{Html::ul($errors->all())}}
                {{Form::open(["url"=>"/Categorias"])}}
                <!-- Email input -->
                <div class="row">
                    <div class="col form-outline m-2">
                        <input name="nombreCategoria" type="text" id="nombreCategoria" class="form-control" />
                        <label class="form-label" for="nombreCategoria">Nombre Categoria</label>
                    </div>
                    <div class="col form-outline  m-2">
                        <input name="descripcionCategoria" type="text" id="descripcionCategoria" class="form-control" />
                        <label class="form-label" for="descripcionCategoria">Descripcion categoria</label>
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