@extends('layouts.layout')
@section('content')

<!-- Carousel wrapper -->
<div id="carouselBasicExample" class="carousel slide carousel-fade h-25" data-mdb-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
        <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide-to="2"
            aria-label="Slide 3"></button>
    </div>

    <!-- Inner -->
    <div class="carousel-inner">
        <!-- Single item -->
        <div class="carousel-item active">
            <img src="img/banner1.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
                <h5>Ferretería El Clavito</h5>
                <p>Encontrarás las mejores herramientas.</p>
            </div>
        </div>

        <!-- Single item -->
        <div class="carousel-item">
            <img src="img/banner2.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
                <h5>Los mejores productos</h5>
                <p>Y las mejores marcas para tus proyectos.</p>
            </div>
        </div>

        <!-- Single item -->
        <div class="carousel-item">
            <img src="img/banner3.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
                <h5>Ven a comprar tus productos a nuestra sucursal</h5>
                <p>Siéntete seguro con tus compras y nuestros años de experiencia.</p>
            </div>
        </div>
    </div>
    <!-- Inner -->

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
        <span aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
        <span aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Carousel wrapper -->

<div class="container-fluid">
    <div class="container">
        <div class="row mt-3">

            <!-- Grid column -->
            <div class="col-12">

                <!-- Nav tabs -->
                <ul class="nav md-tabs nav-justified grey lighten-3 mx-0 text-left" role="tablist">

                    <li class="nav-item">

                        <a class="nav-link active dark-grey-text font-weight-bold" data-toggle="tab" href="#panel5"
                            role="tab">
                            Productos Relevantes</a>

                    </li>
                </ul>
            </div>
        </div>
        @if(Session::has('message'))
        <br>{{Session::get('message')}} <br>
        @endif

        {{HTML::ul($errors->all())}}
        <div class="row row-cols-1 row-cols-md-3 g-4">

            @forelse($products as $row)
            {{Form::open(["url"=>"cart"])}}
            <div class="col">
                <div class="card border border-dark shadow-0 h-100 ml-3">
                    <img src="data:image/jpeg;base64,{{$row->fotografia}}" style="height:250px;" class="card-img-top"
                        alt="..." />
                    <input style="display:none;" name="id" value="{{$row->id}}">
                    <input style="display:none;" name="price" value="{{$row->precio}}">
                    <input style="display:none;" name="name" value="{{$row->nombre}}">
                    <div class="card-body">


                        <h4 class="card-title "><strong name="name">{{$row->nombre}}</strong></h4>
                        <p class="card-text">
                            {{$row->descripcion}}
                        </p>
                        @if($row->cantidad>0)
                        <p>Existencias: <strong name="name">{{$row->cantidad}}</strong></p>
                        @else
                        <p>Existencias: <strong style="color:red;" name="name">{{$row->cantidad}}</strong></p>
                        @endif
                        @guest
                        @else
                        @if(\Auth::user()->id_rol == 2)
                        @if($row->cantidad>0)
                        <div class="col-4 form-outline">
                            <input type="number" min="1" max="{{$row->cantidad}}" name="quantity" value="1"
                                class="form-control" />
                            <label class="form-label" for="quantity">Cantidad</label>
                        </div>
                        @else
                        <div class="col-4 form-outline">
                            <input disabled="true" type="number" min="1" max="{{$row->cantidad}}" name="quantity" value="1"
                                class="form-control" />
                            <label class="form-label" for="quantity">Cantidad</label>
                        </div>
                        @endif
                        @endif

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

                            @else
                            @if(\Auth::user()->id_rol == 2)
                            @if($row->cantidad>0)
                            <div class="col-6">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </div>
                            </div>
                            @else
                            @endif
                            @endif
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
            {{Form::close()}}
            @empty
            <h1>No hay productos</h1>
            @endforelse
        </div>
    </div>
    <!-- Grid row -->

</div>
@endsection