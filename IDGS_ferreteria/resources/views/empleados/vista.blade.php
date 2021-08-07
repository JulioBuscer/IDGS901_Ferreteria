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
            <h2 class="card-title text-left">Empleados Activos</h2>
            <hr class="hr-245">
            <table class="table table-responsive text-justify">
                <thead class="table-dark text-center">
                    <th>Fotografia</th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </thead>

                <tbody>
                    @forelse($table as $row)
                    <tr>
                        <td><img height="100" width="100" src="data:image/jpeg;base64,{{$row->fotografia}}"></td>
                        <td>{{$row->id}}</td>
                        <td>{{$row->nombre}} {{$row->apellidoP}} {{$row->apellidoM}} </td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->telefono}}</td>
                        <td>{{$row->nombreRol}}</td>
                        <td>
                            <button class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal1" onclick="verProductos('{{$row->id}}','{{$row->nombre}}','{{$row->apellidoP}}','{{$row->apellidoM}}','{{$row->email}}','{{$row->telefono}}','{{$row->fotografia}}','{{$row->idPersona}}','{{$row->idRol}}')">
                                <i class="fas fa-eye"></i> </button>
                            <button class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#exampleModal" onclick="editarProductos('{{$row->id}}','{{$row->nombre}}','{{$row->apellidoP}}','{{$row->apellidoM}}','{{$row->email}}','{{$row->telefono}}','{{$row->fotografia}}','{{$row->idPersona}}','{{$row->idRol}}')">
                                <i class="fas fa-edit"></i> </button>

                            {{Form::open(["url" =>route('Empleados.destroy', $row->id)])}}
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
            <h2 class="card-title text-left">Empleados Inactivos</h2>
            <hr class="hr-245">
            <table class="table table-responsive text-justify">
                <thead class="table-dark text-center">
                    <th>Fotografia</th>
                    <th>Id</th>
                    <th>Nombre Producto</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @forelse($table2 as $row2)
                    <tr>
                        <td><img height="100" width="100" src="data:image/jpeg;base64,{{$row2->fotografia}}"></td>
                        <td>{{$row2->id}}</td>
                        <td>{{$row2->nombre}}</td>
                        <td>{{$row2->precio}}</td>
                        <td>{{$row2->descripcion}}</td>
                        <td>{{$row2->cantidad}}</td>
                        <td>{{$row2->unidad}}</td>
                        <td>{{$row2->idCategoria}}</td>
                        <td>
                            <button class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal1" onclick="verProductos('{{$row2->id}}','{{$row2->nombre}}','{{$row2->apellidoP}}','{{$row2->apellidoM}}','{{$row2->email}}','{{$row2->telefono}}','{{$row2->fotografia}}','{{$row2->idPersona}}','{{$row2->idRol}}')">
                                <i class="fas fa-eye"></i> </button>

                            {{Form::open(["url" =>route('Empleados.edit', $row2->id)])}}
                            {{ Form::hidden('_method','GET')}}
                            <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> </button>
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
        <!-- formulario para insertar -->
        <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">
            <h2 class="card-title text-left">Empleados registro</h2>
            <hr class="hr-245">
            {{Html::ul($errors->all())}}
            {{Form::open(["url"=>"/Empleados"])}}
            <div class="row">
                <div class="col-9 mr-2">
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
                            <input type="email" name="email" autocomplete="off" id="email" class="form-control" />
                            <label class="form-label" for="email">Correo</label>
                        </div>
                        <div class="col form-outline m-2">
                            <input type="password" autocomplete="off" name="password" id="password" class="form-control" />
                            <label class="form-label" for="password">Contraseña</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-outline  m-2">
                            <select name="slcRol" id="slcRol" class="form-select" aria-label="Default select example">
                                <option disabled selected>Rol</option>
                                @forelse($select as $slc)
                                <option value="{{$slc->id}}">{{$slc->nombre}}</option>
                                @empty
                                <tr>
                                    <option value="0">No hay Registros</option>
                                </tr>

                                @endforelse
                            </select>
                        </div>
                        <div class="col form-outline m-2">
                        </div>
                    </div>
                </div>
                <div class="col-2">

                    <div class="row">
                        <div class="col form-outline ml-2">


                            <div class="file-field input-field">

                                <div class="btn waves-effect waves-red orange accent-4 btn-large ">
                                    <span>Imagen</span>
                                    <input type="file" name="txtFoto2" id="txtFoto2" class="form-control text-black orange" onchange="cargarFotoEmpleado();">
                                    <img src="{{asset('img/upload.jpg')}}" id="imgFoto2" height="200" width="200">
                                    <textarea id="textarea" style="display:none;" name="textarea" class="" data-length="120"></textarea>
                                </div>
                                <div class="file-path-wrapper">
                                    <input hidden class="file-path validate" type="text">
                                </div>
                            </div>
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
                <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id=editCat>

                <input name="_method" type="hidden" value="PUT">
                @csrf

                <input name="idProd" style="display:none;" id="idProd" />
                <div class="modal-body">
                    <div class="row">
                        <div class="col form-outline m-2">
                            <input type="text" name="nombre" id="nombre" class="form-control" />
                            <label class="form-label" for="nombre">Nombre </label>
                        </div>
                        <div class="col form-outline m-2">
                            <input type="text" name="App" id="App" class="form-control" />
                            <label class="form-label" for="App">Apellido Paterno</label>
                        </div>
                        <div class="col form-outline m-2">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-outline m-2">
                        <input type="number" name="txtPrecio0" id="txtPrecio0" class="form-control" />
                        <label class="form-label" for="txtPrecio0">Precio</label>
                    </div>

                    <div class="col form-outline m-2">
                        <input type="text" name="txtCantidad0" id="txtCantidad0" class="form-control" />
                        <label class="form-label" for="txtCantidad0">Cantidad</label>
                    </div>
                    <div class="col form-outline  m-2">
                        <input type="text" name="txtUnidad0" id="txtUnidad0" class="form-control" />
                        <label class="form-label" for="txtUnidad0">Unidad</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-outline  m-2">
                        <input type="number" name="precioCompra0" id="precioCompra0" class="form-control" />
                        <label class="form-label" for="precioCompra0">Precio Compra</label>
                    </div>
                    <div class="col form-outline  m-2">

                    </div>
                </div>
                <div class="row">
                    <div class="col form-outline m-2 text-center">

                        <img class="text-center" id="imgFoto20" height="280" width="220">

                        <div class="file-field input-field">
                            <div class="btn waves-effect waves-red orange accent-4 btn-large ">
                                <span>Imagen</span>

                                <input type="file" name="txtFoto20" id="txtFoto20" class="form-control text-black orange" onchange="actualizarFotoProducto();">
                                <textarea id="textarea0" style="display:none;" name="textarea0" class="" data-length="120"></textarea>
                            </div>
                            <div class="file-path-wrapper">
                                <input hidden class="file-path validate" type="text">
                            </div>
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
                <h5 class="modal-title" id="exampleModalLabel1">Ver Producto</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col form-outline m-2">
                        <input type="text" name="nombreProducto1" id="nombreProducto1" class="form-control active" />
                        <label class="form-label" for="nombreProducto1">Nombre Producto</label>
                    </div>
                    <div class="col form-outline  m-2">
                        <input type="text" name="txtDescripcion1" id="txtDescripcion1" class="form-control active" />
                        <label class="form-label" for="txtDescripcion1">Descripcion</label>
                    </div>
                    <div class="col m-2">

                    </div>
                </div>

                <div class="row">

                    <div class="col form-outline m-2">
                        <input type="number" name="txtPrecio1" id="txtPrecio1" class="form-control active" />
                        <label class="form-label" for="txtPrecio1">Precio</label>
                    </div>

                    <div class="col form-outline m-2">
                        <input type="text" name="txtCantidad1" id="txtCantidad1" class="form-control active" />
                        <label class="form-label" for="txtCantidad1">Cantidad</label>
                    </div>
                    <div class="col form-outline  m-2">
                        <input type="text" name="txtUnidad1" id="txtUnidad1" class="form-control active" />
                        <label class="form-label" for="txtUnidad1">Unidad</label>
                    </div>
                </div>
                <div class="row">

                    <div class="col form-outline  m-2">
                        <input type="number" name="precioCompra1" id="precioCompra1" class="form-control active" />
                        <label class="form-label" for="precioCompra1">Precio Compra</label>
                    </div>
                    <div class="col form-outline  m-2">

                    </div>

                </div>

                <div class="row">
                    <div class="col form-outline m-2 text-center">

                        <img id="imgFoto21" height="380" width="320">

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