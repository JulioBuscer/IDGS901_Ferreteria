@extends('layouts.layout')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-5">
                <div class="card-body row">
                    <div class="col bg-color1 text-center">
                        <figure class="figure bg-color1 m-5 rounded-5">
                            <img src="{{ asset('img/logo.png') }}" class="figure-img img-fluid rounded shadow-3 mb-3">
                            <figcaption class="figure-caption text-cener text-light">
                                <h2>
                                    "Productos a tu alcance"
                                </h2>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="col-8 ml-3">
                        <h4>Nosotros</h4>
                        <p class="card-text">
                            Somos una empresa familiar con mas de 30 años de experiencia en el mercado y
                            comercialización de herramientas y productos para todos los segmentos de la industria ferretera.
                            Nuestro catálogo está en constante crecimiento, gracias a nuestros diversos proveedores.
                        </p>
                        <div class="row">
                            <div class="card col m-1">
                                <div class="card-title text-center">
                                    <img src="{{ asset('img/svg/undraw_mission_impossible_bwa2.svg') }}"
                                        style="height: 20vh">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Mision</h5>
                                    <p class="card-text text-justify">
                                        Mantener una mejora continua acelerada para maximizar la satisfacción de nuestros
                                        clientes a través de la excelencia en la calidad de nuestros productos y servicios.
                                    </p>
                                </div>
                            </div>
                            <div class="card col m-1">
                                <div class="card-title text-center">
                                    <img src="{{ asset('img/svg/undraw_solution_mindset_34bi.svg') }}"
                                        style="height: 20vh">

                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Vision</h5>
                                    <p class="card-text text-justify">
                                        Convertirse en el proveedor más importante y relevante del mercado ferretero en
                                        México.
                                    </p>
                                </div>
                            </div>
                            <div class="card col m-1">
                                <div class="card-title text-center">
                                    <img src="{{ asset('img/svg/undraw_winners_ao2o.svg') }}" style="height: 20vh">

                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Valores</h5>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Honestidad</li>
                                        <li class="list-group-item">Respeto</li>
                                        <li class="list-group-item">Profesionalismo</li>
                                        <li class="list-group-item">Pasión</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6"></div>
    </div>
@endsection
