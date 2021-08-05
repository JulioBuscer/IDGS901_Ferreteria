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
                            Productos releevantes</a>

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
                        <p>Existencias: <strong name="name">{{$row->cantidad}}</strong></p>
                        @guest
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
            </div>
            {{Form::close()}}
            @empty
            <h1>No hay productos</h1>
            @endforelse
        </div>
    </div>
    <!-- Grid row -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Venta</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- {{Form::model(["route"=>["Categorias.update"]])}} -->
                <div class="modal-body">

                    <div class="col-12">
                        @if (!Cart::isEmpty())
                        <table class="table">
                            <thead>
                                <tr>

                                    <th sc ope="col">#ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th sc ope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::getContent() as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <th scope="row">
                                        {{Form::open(["route"=>["cart.destroy",$item->id], "method"=>"POST"])}}
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i>
                                        </button>
                                        {{Form::close()}}
                                    </th>
                                </tr>
                                @endforeach
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th scope="col">Productos</th>
                                            <th scope="col">Sub total</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <td scope="row">{{Cart::getTotalQuantity()}}</td>
                                            <td scope="row">{{Cart::getSubTotal()}}</td>
                                            <td scope="row">{{Cart::getTotal()}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </tbody>
                        </table>
                        <div class="col form-outline  m-2">
                            <input list="brow" class="form-control" type="text" name="client">
                            <datalist id="brow">
                                @forelse($clients as $slc)
                                <option value="{{$slc->id}}">{{$slc->nombre}}</option>
                                @empty
                                <option value="0">No hay Registros</option>
                                @endforelse
                            </datalist>
                            <label class="form-label" for="form1">Cliente</label>
                        </div>
                        @else
                        <table class="table">
                            <thead>
                                <tr>

                                    <th sc ope="col">No hay elementos en tu venta</th>
                                </tr>
                            </thead>
                        </table>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
                <!-- {{Form::close()}} -->
            </div>
        </div>
    </div>

</div>
@endsection