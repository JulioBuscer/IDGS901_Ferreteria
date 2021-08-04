@extends ('layouts.layout')

@section('content')





<div class="container-fluid">
    <div class="container"><br>
        
        <div class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
            <div class="row">
            <h1 class="text-left">Catalogo de productos </h1>
                <img src="img/banner3.jpg"  alt="..."  style="height: 500px;" />

            </div>
        </div>

        <div class="row">

            <div class="col-md-2">
                <!-- Scrollspy -->
                <div id="scrollspy1" class="sticky-top">
                    <ul class="nav flex-column nav-pills menu-sidebar">
                        @forelse($select as $slc)
                        <li class="nav-item">
                            <a class="nav-link" href="#example-{{$slc->id}}">{{$slc->nombre}}</a>
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
                    <br>
                    <h4 class="text-center">{{$slc->nombre}}</h4>
                    <div class="row row-cols-1 row-cols-md-3 g-4">



                        @forelse($table as $row)
                        @if($row->idCat== $slc->id)

                        <div class="col" id="example-{{$row->idCat}}">
                            <div class="card border border-dark shadow-0 h-100 ml-3">
                                <img src="data:image/jpeg;base64,{{$row->fotografia}}" style="height:250px;" class="card-img-top" alt="..." />
                                <div class="card-body">
                                    <h4 class="card-title "><strong>{{$row->nombre}}</strong></h4>
                                    <p class="card-text">
                                        {{$row->descripcion}}
                                    </p>
                                    <p>Existencias: <strong name="name">{{$row->cantidad}}</strong></p>
                                    <div class="col-4 form-outline">
                                        <input type="number" min="1" max="{{$row->cantidad}}" name="quantity" id="quantity" class="form-control" />
                                        <label class="form-label" for="quantity">Cantidad</label>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="note note-primary">
                                                <strong>${{$row->precio}}</strong>
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <a href="#!" class="btn btn-primary">Agregar</a></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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



</div>
<!-- Grid row -->

</div>

@endsection