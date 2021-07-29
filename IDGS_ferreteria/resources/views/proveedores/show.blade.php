@extends('layouts.layout')

@section('content')

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
        <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
            <h2 class="card-title text-left">Productos Activos</h2>
            <hr class="hr-245">
            <table class="table table-responsive text-justify">
                <thead class="table-dark text-center">
                    <th>Nombre Producto</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Proveedor</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </thead>

                <tbody>
                    <tr>
                        <td>Nombre Producto</td>
                        <td>Descripcion</td>
                        <td>Categoria</td>
                        <td>Precio</td>
                        <td>Cantidad</td>
                        <td>Unidad</td>
                        <td>Proveedor</td>
                        <td>Imagen</td>
                        <td>
                            <button class="btn btn-primary"> <i class="fas fa-eye"></i> </button>
                            <button class="btn btn-success"> <i class="fas fa-edit"></i> </button>
                            <button class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Nombre Producto</td>
                        <td>Descripcion</td>
                        <td>Categoria</td>
                        <td>Precio</td>
                        <td>Cantidad</td>
                        <td>Unidad</td>
                        <td>Proveedor</td>
                        <td>Imagen</td>
                        <td>
                            <button class="btn btn-primary"> <i class="fas fa-eye"></i> </button>
                            <button class="btn btn-success"> <i class="fas fa-edit"></i> </button>
                            <button class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
            <h2 class="card-title text-left">Productos Inactivos</h2>
            <hr class="hr-245">
            <table class="table table-responsive">
                <thead class="table-dark text-center">
                    <th>Nombre Producto</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>
                    <th>Proveedor</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Nombre Producto</td>
                        <td>Descripcion</td>
                        <td>Categoria</td>
                        <td>Precio</td>
                        <td>Cantidad</td>
                        <td>Unidad</td>
                        <td>Proveedor</td>
                        <td>Imagen</td>
                        <td>
                            <button class="btn btn-primary"> <i class="fas fa-eye"></i> </button>
                            <button class="btn btn-success"> <i class="fas fa-check"></i> </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Nombre Producto</td>
                        <td>Descripcion</td>
                        <td>Categoria</td>
                        <td>Precio</td>
                        <td>Cantidad</td>
                        <td>Unidad</td>
                        <td>Proveedor</td>
                        <td>Imagen</td>
                        <td>
                            <button class="btn btn-primary"> <i class="fas fa-eye"></i> </button>
                            <button class="btn btn-success"> <i class="fas fa-check"></i> </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">
            <div class="card-body">
                <h2 class="card-title text-left">Productos registro</h2>
                <hr class="hr-245">
                <form>
                    <!-- Email input -->
                    <div class="row">
                        <div class="col form-outline m-2">
                            <input type="text" id="txtProducto" class="form-control" />
                            <label class="form-label" for="txtProducto">Nombre Producto</label>
                        </div>
                        <div class="col form-outline  m-2">
                            <input type="text" id="txtDescripcion" class="form-control" />
                            <label class="form-label" for="txtDescripcion">Descripcion</label>
                        </div>
                        <div class="col m-2">
                            <select id="slcCategoria" class="form-select" aria-label="Default select example">
                                <option disabled selected>Categoria</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col form-outline m-2">
                            <input type="number" id="txtPrecio" class="form-control" />
                            <label class="form-label" for="txtPrecio">Precio</label>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col form-outline m-2">
                            <input type="number" id="txtCantidad" class="form-control" />
                            <label class="form-label" for="txtCantidad">Cantidad</label>
                        </div>
                        <div class="col form-outline  m-2">
                            <input type="number" id="txtUnidad" class="form-control" />
                            <label class="form-label" for="txtUnidad">Unidad</label>
                        </div>
                        <div class="col form-outline m-2">
                            <input type="text" id="txtProveedor" class="form-control" />
                            <label class="form-label" for="txtProveedor">Proveedor</label>
                        </div>
                        <div class="col form-outline m-2">
                            <input type="file" id="txtImagen" class="form-control" />
                        </div>
                    </div>
                    <!-- Submit button -->
                    <div class="text-right">
                        <button type="submit" class="btn btn-color-2 ">Registrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Tabs content -->

</div>
@endsection