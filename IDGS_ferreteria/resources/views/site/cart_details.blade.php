@extends('layouts.layout')
@section('content')

<div class="container mt-5">

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{asset('img/logo_shop.jpg')}}" alt="..." class="img-fluid" />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    @if (!Cart::isEmpty())
                    <table class="table  table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::getContent() as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>${{$item->price}}</td>
                                <td>${{$item->quantity*$item->price}}</td>
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
                    <h5 class="card-title">Resumen</h5>
                    <table class="table table-bordered">
                        <thead class="table-danger">
                            <tr>
                                <th scope="col">Productos</th>
                                <th scope="col">Sub total</th>
                                <th scope="col">Total (Iva incluido)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">{{Cart::getTotalQuantity()}}</td>
                                <td scope="row">${{Cart::getSubTotal()-Cart::getSubTotal()*.16}}</td>
                                <td scope="row">${{Cart::getTotal()}}</td>
                            </tr>
                        </tbody>
                    </table>
                    {{Form::open(["url"=>"venta_terminada"])}}
                    <input type="number" name="subtotal" style="display:none"
                        value="{{Cart::getSubTotal()-Cart::getSubTotal()*.16}}">
                    <input type="number" name="iva" style="display:none" value="{{Cart::getSubTotal()*.16}}">
                    <div class="col form-outline  m-2">
                        <select name="selectCliente" id="selectCliente" style="width: 50vh" required>
                            @forelse ($clientes as $row)
                            <option value="{{ $row->id}}">{{ $row->nombre }}</option>
                            @empty

                            @endforelse
                        </select>

                        @push('scripts')
                        <script>
                        $('#selectCliente').select2({});
                        </script>
                        @endpush
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-color-2" />
                        <i class="fas fa-save"></i>
                        </button>
                    </div>
                    {{Form::close()}}
                    <p class="card-text">
                    </p>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection