@extends('layouts.layout')

@section('content')

<div class="container-fluid">
    <div class="container">
        <!-- Grid row -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 pb-lg-5 mb-4 mt-5">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="{{asset('img/wrong.png')}}">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h1 class="card-title text-center">¡¡¡ Ups !!!</h1>
                                <h2>No hemos encontrado el recurso :(</h2>
                                <div class="text-center">
                                    <a href="{{URL::to('/')}}" class="btn btn-color-2">Regresar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection