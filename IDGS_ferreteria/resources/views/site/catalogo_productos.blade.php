@extends('layouts.layout')


@section('content')
<div class="row">
    <!-- Grid column -->
    <div class="col-lg-2 ">
        <!-- Section: Categories -->
        <section class="section">
            <ul class="list-group z-depth-1 ">
                <li class="list-group-item d-flex justify-content-between align-items-center ">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label" for="flexCheckDefault">
                        <a class="dark-grey-text font-small">
                            <i class="fas fa-laptop dark-grey-text mr-2" aria-hidden="true"></i> Laptops</a>
                        <a href=""></a>
                        <span class="badge badge-danger badge-pill">43</span>
                        </a>
                    </label>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center ">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label" for="flexCheckDefault">

                        <a class="dark-grey-text font-small">
                            <i class="fas fa-mobile-alt dark-grey-text mr-3" aria-hidden="true"></i> Smartphone</a>
                        <span class="badge badge-danger badge-pill">32</span>
                    </label>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center ">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label" for="flexCheckDefault">
                        <a class="dark-grey-text font-small">
                            <i class="fas fa-tablet-alt dark-grey-text mr-3" aria-hidden="true"></i> Tablet</a>
                        <span class="badge badge-danger badge-pill">18</span>
                    </label>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center ">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label" for="flexCheckDefault">
                        <a class="dark-grey-text font-small">
                            <i class="fas fa-headphones-alt dark-grey-text mr-3" aria-hidden="true"></i>Heahphones</a>
                        <span class="badge badge-danger badge-pill">37</span>
                    </label>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center ">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label" for="flexCheckDefault">
                        <a class="dark-grey-text font-small">
                            <i class="fas fa-suitcase dark-grey-text mr-3" aria-hidden="true"></i>Accesories</a>
                        <span class="badge badge-danger badge-pill">64</span>
                    </label>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center ">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label" for="flexCheckDefault">
                        <a class="dark-grey-text font-small">
                            <i class="fas fa-camera-retro dark-grey-text mr-3" aria-hidden="true"></i>Camera</a>
                        <span class="badge badge-danger badge-pill">15</span>
                    </label>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center ">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label" for="flexCheckDefault">
                        <a class="dark-grey-text font-small">
                            <i class="fas fa-tv dark-grey-text mr-3" aria-hidden="true"></i>TV</a>
                        <span class="badge badge-danger badge-pill">2</span>
                    </label>
                </li>

            </ul>

        </section>
        <!-- Section: Categories -->
    </div>
    <div class="col-lg-10 ">
        <section class="row m-3">
            <div class="col-4">

                <!-- Card -->
                <div class="card card-ecommerce">
                    <!-- Card image -->
                    <div class="view overlay">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/12.jpg" class="img-fluid" alt="sample image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <!-- Card image -->
                    <!-- Card content -->
                    <div class="card-body">
                        <!-- Category & Title -->
                        <h5 class="card-title mb-1">
                            <strong>
                                <a href="" class="dark-grey-text">Headphones</a>
                            </strong>
                        </h5>
                        <span class="badge badge-danger mb-2">bestseller</span>
                        <!-- Rating -->
                        <ul class="rating">
                            <li>
                                <i class="fas fa-star blue-text"></i>
                            </li>
                            <li>
                                <i class="fas fa-star blue-text"></i>
                            </li>
                            <li>
                                <i class="fas fa-star blue-text"></i>
                            </li>
                            <li>
                                <i class="fas fa-star blue-text"></i>
                            </li>
                            <li>
                                <i class="fas fa-star blue-text"></i>
                            </li>
                        </ul>
                        <!-- Card footer -->
                        <div class="card-footer pb-0">
                            <div class="row mb-0">
                                <span class="float-left">
                                    <strong>1439$</strong>
                                </span>
                                <span class="float-right">
                                    <a class="" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                        <i class="fas fa-shopping-cart ml-3"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Card content -->
                </div>
                <!-- Grid column -->
            </div>
        </section>
    </div>
</div>
@endsection