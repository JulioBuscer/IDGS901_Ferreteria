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
        <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
            <h2 class="card-title text-left">PROVEEDORES ACTIVOS</h2>
            <hr class="hr-245">
            <table class="table text-justify">
                <thead class="table-dark text-center">
                    <th>PROVEEDOR</th>
                    <th>REPRESENTANTE</th>
                    <th>EMAIL</th>
                    <th>TELEFONO</th>
                    <th>RFC</th>
                    <th>DIRECCION</th>
                </thead>

                <tbody>
                    @forelse($table as $row)
                    @if($row->active == 1)
                    <tr>
                        <td style="display:none;">{{$row->id}}</td>
                        <td>{{$row->empresa}}</td>
                        <td>{{$row->representante}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->telefono}}</td>
                        <td>{{$row->RFC}}</td>
                        <td>{{$row->direccion}}</td>
                        <td>
                            <button class="btn btn-primary"> <i class="fas fa-eye"></i> </button>
                            <button class="btn btn-success"> <i class="fas fa-edit"></i> </button>
                            <button class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td>No hay proveedores activos</td>
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
        <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
            <h2 class="card-title text-left">PROVEEDORES INACTIVOS</h2>
            <hr class="hr-245">
            <table class="table text-justify">
                <thead class="table-dark text-center">
                    <th>PROVEEDOR</th>
                    <th>REPRESENTANTE</th>
                    <th>EMAIL</th>
                    <th>TELEFONO</th>
                    <th>RFC</th>
                    <th>DIRECCION</th>
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
                            <button class="btn btn-primary"> <i class="fas fa-eye"></i> </button>
                            <button class="btn btn-success"> <i class="fas fa-edit"></i> </button>
                            <button class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td>No hay proveedores activos</td>
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
        <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">
            <div class="card-body">
                <h2 class="card-title text-left">Productos registro</h2>
                <hr class="hr-245">

                <!-- {{Form::open(["url"=>route("proveedores.store")])}} -->
                {{Form::open(["url"=>route('proveedores.store')])}}
                <!-- Email input -->
                <div class="row">
                    <div class="col form-outline m-2">
                        {{Form::text('empresa',Request::old('empresa'),["class"=>"form-control"])}}
                        {{Form::label('empresa','Empresa Proveedor',["class"=>"form-label"])}}
                    </div>
                    <div class="col form-outline m-2">
                        {{Form::text('representante',Request::old('representante'),["class"=>"form-control"])}}
                        {{Form::label('representante','Representante',["class"=>"form-label"])}}
                    </div>

                    <div class="col form-outline m-2">
                        {{Form::email('email',Request::old('email'),["class"=>"form-control"])}}
                        {{Form::label('email','E-mail',["class"=>"form-label"])}}
                    </div>
                </div>

                <div class="row">
                    <div class="col form-outline m-2">
                        {{Form::text('telefono',Request::old('telefono'),["class"=>"form-control"])}}
                        {{Form::label('telefono','Telefono',["class"=>"form-label"])}}
                    </div>
                    <div class="col form-outline m-2">
                        {{Form::text('rfc',Request::old('rfc'),["class"=>"form-control"])}}
                        {{Form::label('rfc','RFC',["class"=>"form-label"])}}
                    </div>
                    <div class="col form-outline m-2">
                        {{Form::text('direccion',Request::old('direccion'),["class"=>"form-control"])}}
                        {{Form::label('direccion','Direccion',["class"=>"form-label"])}}
                    </div>
                </div>
                <!-- Submit button -->
                {{Form::submit('Registrar Proveedor',["class"=>"btn btn-success"])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
    <!-- Tabs content -->

</div>
@endsection