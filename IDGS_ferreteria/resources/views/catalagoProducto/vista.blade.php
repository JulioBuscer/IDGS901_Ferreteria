@extends('layouts.layout')

@section('content')

<div class="m-5">
    @if(Session::has('message'))
    <br>{{Session::get('message')}} <br>
    @endif
    <div class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
        <div class="row">
            <h1 class="text-left">Catálogo de productos </h1>
        </div>
    </div>

    <div class="row">

        <div class="col-md-2">
            <!-- Scrollspy -->
            <div id="scrollspy1" class="sticky-top">
                <ul class="nav flex-column nav-pills menu-sidebar">
                    @forelse($select as $slc)
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light white-text font-weight-bold"
                            href="#example-{{$slc->id}}">
                            {{$slc->nombre}}
                            <hr>
                        </a>
                    </li>
                    @empty
                    <tr>
                        <option value="0">No hay Registros</option>
                    </tr>

                    @endforelse
                </ul>
            </div>
            <!-- Scrollspy -->
        </div>
        <div class="col-md-10">
            <!-- Spied element -->
            <div data-mdb-spy="scroll" data-mdb-target="#scrollspy1" data-mdb-offset="0" class="scrollspy-example">
                @forelse($select as $slc)
                <div class="row row-cols-1 row-cols-md-3 g-4">



                    @forelse($table as $row)
                    @if($row->idCat== $slc->id)
                    {{Form::open(["url"=>"cart", "class"=>"col", "id" => "example-$row->idCat"] )}}

                    <div class="card border border-dark shadow-0 h-100 ml-3">
                        <img src="data:image/jpeg;base64,{{$row->fotografia}}" style="height:250px;"
                            class="card-img-top" alt="..." />

                        <div class="card-body">
                            <input style="display:none;" name="id" value="{{$row->id}}">
                            <input style="display:none;" name="price" value="{{$row->precio}}">
                            <input style="display:none;" name="name" value="{{$row->nombre}}">
                            <h4 class="card-title "><strong name="name">{{$row->nombre}}</strong></h4>
                            <p class="card-text">
                                {{$row->descripcion}}
                            </p>
                            <p>Existencias: <strong name="name">{{$row->cantidad}}</strong></p>
                            @guest
                            <p></p>
                            @else
                            <div class="col-4 form-outline">
                                <input type="number" min="1" max="{{$row->cantidad}}" name="quantity" value="1"
                                    id="quantity" class="form-control" />
                                <label class="form-label" for="quantity">Cantidad</label>
                            </div>
                            @endguest
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <p class="note note-primary">
                                        <strong name="price">${{$row->precio}}</strong>
                                    </p>
                                </div>
                                @guest
                                <p></p>
                                @else
                                <div class="col-6">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Agregar</button>

                                    </div>
                                </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                    {{Form::close()}}
                    @endif
                    @empty
                    <h1>No hay productos</h1>
                    @endforelse
                </div>
                @empty
                <tr>
                    <option value="0">No hay Registros</option>
                </tr>

                @endforelse

            </div>
            <!-- Spied element -->
        </div>

    </div>
</div>
<!-- Grid row -->

@endsection

