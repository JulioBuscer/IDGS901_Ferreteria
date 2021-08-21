@extends('layouts.layout')


@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-6 text-center">
                <figure class="figure bg-color1 m-5 rounded-5">
                    <img src="{{ asset('img/logo.png') }}" class="figure-img img-fluid rounded shadow-3 mb-3">
                    <figcaption class="figure-caption text-cener text-light">
                        <h2>
                            "Productos a tu alcance"
                        </h2>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-6">
                <div class="card card-user m-5">
                    <div class="card-header">
                        <h5 class="card-title">Contactanos</h5>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <form method="post" action="contact-us">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Nombre </label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Nombre" name="name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Numero Telefonico </label>
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                            placeholder="Numero Telefonico" name="phone_number">
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Correo </label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Correo" name="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Asunto </label>
                                        <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                            placeholder="Asunto" name="subject">
                                        @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Mensaje </label>
                                        <textarea class="form-control textarea @error('message') is-invalid @enderror"
                                            placeholder="Mensaje" name="message"></textarea>
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
