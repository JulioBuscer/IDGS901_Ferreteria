<div class="row">
    <div class="col form-outline m-2">
        {{Form::text('empresa',$modelo->empresa,["class"=>"form-control"])}}
        {{Form::label('empresa','Empresa Proveedor',["class"=>"form-label"])}}
    </div>
    <div class="col form-outline m-2">
        {{Form::text('representante',$modelo->representante,["class"=>"form-control"])}}
        {{Form::label('representante','Representante',["class"=>"form-label"])}}
    </div>

    <div class="col form-outline m-2">
        {{Form::email('email',$modelo->email,["class"=>"form-control"])}}
        {{Form::label('email','E-mail',["class"=>"form-label"])}}
    </div>
</div>

<div class="row">
    <div class="col form-outline m-2">
        {{Form::text('telefono',$modelo->telefono,["class"=>"form-control"])}}
        {{Form::label('telefono','Telefono',["class"=>"form-label"])}}
    </div>
    <div class="col form-outline m-2">
        {{Form::text('RFC',$modelo->RFC,["class"=>"form-control"])}}
        {{Form::label('RFC','RFC',["class"=>"form-label"])}}
    </div>
    <div class="col form-outline m-2">
        {{Form::text('direccion',$modelo->direccion,["class"=>"form-control"])}}
        {{Form::label('direccion','Direccion',["class"=>"form-label"])}}
    </div>
</div>