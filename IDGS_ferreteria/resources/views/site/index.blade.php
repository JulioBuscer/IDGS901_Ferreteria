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

<div class="container-fluid mt-4">

    <!-- Grid row -->
    <div class="row">

        <!-- Grid column -->
        <div class="col-12">

            <!-- Nav tabs -->
            <ul class="nav md-tabs nav-justified grey lighten-3 mx-0 text-left" role="tablist">

                <li class="nav-item">

                    <a class="nav-link active dark-grey-text font-weight-bold" data-toggle="tab" href="#panel5"
                        role="tab">
                        Productos releevantes</a>

                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="card mb-4 ml-2" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="img/martillo.jpg" alt="..." class="img-fluid" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">MARTILLO DE UÑA CURVA 7 ONZAS ACERO TRUPER</h5>
                            <p class="card-text">
                                Martillo de uña curva de 7 onzas (198.5 g) Truper de acero, útil para
                                trabajos de carpintería en el hogar o el taller. Cabeza pulida. Su diseño
                                absorbe impactos y proporciona un rendimiento superior con menos vibración,
                                óptimo para tareas con más solidez. Está elaborado de acero resistente y
                                posee una uña curva para retirar las piezas con firmeza. Sus dimensiones son
                                28.1 x 10 x 2.5 cm.
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Agregar</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-4 ml-2" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="img/martillo.jpg" alt="..." class="img-fluid" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">MARTILLO DE UÑA CURVA 7 ONZAS ACERO TRUPER</h5>
                            <p class="card-text">
                                Martillo de uña curva de 7 onzas (198.5 g) Truper de acero, útil para
                                trabajos de carpintería en el hogar o el taller. Cabeza pulida. Su diseño
                                absorbe impactos y proporciona un rendimiento superior con menos vibración,
                                óptimo para tareas con más solidez. Está elaborado de acero resistente y
                                posee una uña curva para retirar las piezas con firmeza. Sus dimensiones son
                                28.1 x 10 x 2.5 cm.
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Agregar</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mb-4 ml-2" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="img/martillo.jpg" alt="..." class="img-fluid" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">MARTILLO DE UÑA CURVA 7 ONZAS ACERO TRUPER</h5>
                            <p class="card-text">
                                Martillo de uña curva de 7 onzas (198.5 g) Truper de acero, útil para
                                trabajos de carpintería en el hogar o el taller. Cabeza pulida. Su diseño
                                absorbe impactos y proporciona un rendimiento superior con menos vibración,
                                óptimo para tareas con más solidez. Está elaborado de acero resistente y
                                posee una uña curva para retirar las piezas con firmeza. Sus dimensiones son
                                28.1 x 10 x 2.5 cm.
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Agregar</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection