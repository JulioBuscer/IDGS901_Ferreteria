<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>El clavito</title>
    <script>
        const Route_esp = "{{ URL::asset('') }}"
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript" src="{{ asset('js/funcion_init.js') }}"></script>





</head>

<body class="homepage-v1 hidden-sn white-skin animated">

    <!-- Navigation -->
    <header>
        <!-- Sidebar navigation -->
        <div class="row">
            <div class="col-3 d-flex align-items-center justify-content-center bg-color1 ">
                <img src="{{ asset('img/logo.png') }}" class="nav-bar-logo">
                <span class="h1 ">Ferreteria</span>
            </div>
            <!-- Navbar -->
            <div class="col-9">
                <div class="row">
                    <div class="col-12">
                        <div style="background-color: #fff; height: 10vh;">
                            <div class="container">

                                <!-- Grid row -->
                                <div class="row py-4 d-flex align-items-center">

                                    <!-- Grid column -->
                                    <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                                        <div class="input-group mb-0">
                                            <div class="form-outline">
                                                <input id="search-focus" type="search" id="form1"
                                                    class="form-control" />
                                                <label class="form-label" for="form1">Buscar</label>
                                            </div>
                                            <button type="button" class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-md-6 col-lg-7 text-center text-md-right">
                                        @guest
                                            <a class="ml-0 px-2 waves-effect waves-light white-text font-weight-bold"
                                                href="">
                                                Bienvenido
                                                <span class="sr-only">(current)</span>
                                            </a>
                                        @else
                                            <a class="dropdown-toggle ml-0 px-2 dark-text" href="{{ asset('#') }}"
                                                id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown"
                                                aria-expanded="false">
                                                <img src="data:image/jpeg;base64,{{ \Auth::user()->fotografia }}"
                                                    class="rounded-circle" height="25" alt="" loading="lazy" />
                                                {{ \Auth::user()->name }}
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu"
                                                aria-labelledby="navbarDropdownMenuLink">
                                                <li>
                                                    <a class="dropdown-item" href="{{ asset('#') }}">Perfil</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ URL::to('logout') }}">Salir</a>
                                                </li>
                                            </ul>

                                        @endguest

                                        <!-- Facebook -->
                                        <a class="fb-ic ml-0 px-4" href="{{ asset('https://wwww.facebook.com') }}">

                                            <i class="fab fa-facebook-f blue-text"> </i>

                                        </a>

                                        <!-- Instagram -->
                                        <a class="ins-ic px-4" href="{{ asset('https://www.instagram.com') }}">

                                            <i class="fab fa-instagram purple-text"> </i>

                                        </a>
                                        <!-- Instagram -->
                                        <a class="ins-ic px-4" href="{{ asset('https://www.whatsapp.com') }}">

                                            <i class="fab fa-whatsapp green-text"> </i>

                                        </a>

                                    </div>
                                    <!-- Grid column -->

                                </div>
                                <!-- Grid row -->

                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar bg-color2 navbar-expand-md navbar-dark" style="height: 10vh;">
                            <div class="container">
                                <a class="navbar-brand font-weight-bold" href="{{ asset('#') }}">
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link waves-effect waves-light white-text font-weight-bold"
                                                href="{{ URL::to('/') }}">
                                                Inicio
                                                <span class="sr-only">(current)</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link waves-effect waves-light white-text font-weight-bold"
                                                href="{{ URL::to('Catalogo') }}">
                                                Catálogo
                                                <span class="sr-only">(current)</span>
                                            </a>
                                        </li>


                                        @guest
                                            <li class="nav-item">
                                                <a class="nav-link waves-effect waves-light white-text font-weight-bold"
                                                    href="{{ URL::to('login') }}">
                                                    Iniciar Sesión
                                                    <span class="sr-only">(current)</span>
                                                </a>
                                            </li>
                                        @else

                                            @if (\Auth::user()->id_rol == 1 or \Auth::user()->id_rol == 2)
                                                <li class="nav-item">
                                                    <a class="nav-link waves-effect waves-light white-text font-weight-bold"
                                                        href="{{ URL::to('proveedores') }}">
                                                        Proveedores
                                                        <span class="sr-only">(current)</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link waves-effect waves-light white-text font-weight-bold"
                                                        href="{{ URL::to('compras') }}">
                                                        Compras
                                                        <span class="sr-only">(current)</span>
                                                    </a>
                                                </li>

                                            @endif
                                            @if (!Cart::isEmpty())
                                                <li class="nav-item">
                                                    <a class="nav-link waves-effect waves-light white-text font-weight-bold"
                                                        data-mdb-toggle="modal" data-mdb-target="#modalCart">
                                                        <i class="fas fa-shopping-cart">
                                                            ({{ Cart::getTotalQuantity() }})</i>
                                                        <span class="sr-only">(current)</span>
                                                    </a>
                                                </li>
                                            @else
                                                <li class="nav-item">

                                                    <a class="nav-link waves-effect waves-light white-text font-weight-bold"
                                                        data-mdb-toggle="modal" data-mdb-target="#modalCart">
                                                        <i class="fas fa-shopping-cart"> (0)</i>
                                                        <span class="sr-only">(current)</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endguest
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

            </div>
            <!-- Navbar -->
        </div>
    </header>
    <!-- Navigation -->
    @yield('content')
    <!-- Main Container -->
    <div class="modal fade" id="modalCart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Venta</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- {{ Form::model(['route' => ['Categorias.update']]) }} -->
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
                                            <th scope="row">{{ $item->id }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <th scope="row">
                                                {{ Form::open(['route' => ['cart.destroy', $item->id], 'method' => 'POST']) }}
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"> <i
                                                        class="fas fa-trash"></i>
                                                </button>
                                                {{ Form::close() }}
                                            </th>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

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
                @if (!Cart::isEmpty())
                    <div class="modal-footer">
                        <a href="{{ URL::to('cart') }}" class="btn btn-primary">Terminar venta</a>
                    </div>
                @endif
                <!-- {{ Form::close() }} -->
            </div>
        </div>
    </div>

    <footer class="bg-color1 page-footer text-center text-md-left white-text pt-0 mt-5 flex-end">
        <br>
        <!-- Footer Links -->
        <div class="container mt-5 mb-4 text-center text-md-left white-text">
            <div class="row mt-3">
                <!-- First column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                    <h6 class="text-uppercase font-weight-bold">
                        <strong>Tienda</strong>
                    </h6>
                    <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <img src="{{ asset('img/logo.png') }}" class="footer-logo">
                </div>
                <!-- First column -->
                <!-- Second column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weight-bold">
                        <strong>Conocenos</strong>
                    </h6>
                    <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <a href="#!">Tienda</a>
                    </p>
                    <p>
                        <a href="#!">Productos</a>
                    </p>
                    <p>
                        <a href="#!">Contacto</a>
                    </p>
                    <p>
                        <a href="#!">¿Quienes Somos?</a>
                    </p>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <strong>Contacto</strong>
                    </h6>
                    <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <i class="fas fa-home mr-3"></i> Leon Guanajuato, universidad tecnologica #1102
                    </p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i> elclavitoferrteteria@elclavito.com
                    </p>
                    <p>
                        <i class="fas fa-phone mr-3"></i> + 52 (477 888 67 54)
                    </p>
                </div>
                <!-- Fourth column -->
                <div class="col-md-4 col-lg-3 col-xl-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <strong>Ubicación</strong>
                    </h6>
                    <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d658.1815936246556!2d-101.58184840878059!3d21.063180624056905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842b974c3471c735%3A0xf39f762b9db6af2!2sBiblioteca%20Universidad%20Tecnol%C3%B3gica%20de%20Le%C3%B3n!5e0!3m2!1ses-419!2smx!4v1625026867144!5m2!1ses-419!2smx"
                        width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="footer-copyright py-3 text-center" style="background-color: rgba(0, 0, 0, 0.2);">
            <div class="container-fluid">
                © 2021 Copyright: <a href="" target="_blank" class="white-text"> MacroBios </a>
            </div>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <!-- SCRIPTS -->
    <!-- JQuery -->

    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}">
    </script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>

    <script type="text/javascript">
        /* WOW.js init */
        // new WOW().init();
        // Tooltips Initialization
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').material_select();
        });

        // SideNav Initialization
        // $(".button-collapse").sideNav();
    </script>
    {{-- Select 2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('scripts')
</body>

</html>
