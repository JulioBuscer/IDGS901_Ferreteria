<div class="modal fade" id="modalCart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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