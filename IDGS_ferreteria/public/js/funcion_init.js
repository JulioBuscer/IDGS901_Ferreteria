// FUNCIONES PARA CATEGORIAS

function editarCategorias(id, nombre, descripcion) {

    $('#idCat').val(id);
    $('#nombreCat').val(nombre);
    $('#descripcionCat').val(descripcion);

    var ruta = Route_esp + "Categorias/" + id

    $('#editCat').attr('action', ruta);
}

function verCategorias(id, nombre, descripcion) {


    $('#id2').val(id);
    $('#nombreCat2').val(nombre);
    $('#descripcionCat2').val(descripcion);


}


// FUNCIONES PARA PRODUCTOS 

function editarProductos(id, nombre, descripcion, precio, cantidad, unidad, foto, idCategoria) {
    $('#idProd').val(id);
    $('#nombreProducto0').val(nombre);
    $('#txtDescripcion0').val(descripcion);
    $('#txtPrecio0').val(precio);
    $('#txtCantidad0').val(cantidad);
    $('#txtUnidad0').val(unidad);
    $('#imgFoto20').attr("src", "data:image/jpeg;base64," + foto).width(220).height(280);
    $('#slcCategoria10').val(idCategoria);

    var ruta = Route_esp + "Productos/" + id

    $('#edtProd').attr('action', ruta);
}

function verProductos(id, nombre, descripcion, precio, cantidad, unidad, foto, idCategoria) {
    $('#nombreProducto1').val(nombre);
    $('#txtDescripcion1').val(descripcion);
    $('#txtPrecio1').val(precio);
    $('#txtCantidad1').val(cantidad);
    $('#txtUnidad1').val(unidad);
    $('#imgFoto21').attr("src", "data:image/jpeg;base64," + foto).width(220).height(280);
    $('#slcCategoria11').val(idCategoria);


}


function cargarFotoProducto() {
    var fileChooser = document.getElementById("txtFoto2");
    var foto = document.getElementById("imgFoto2");
    var base64 = document.getElementById("textarea");
    if (fileChooser.files.length > 0) {
        var fr = new FileReader();
        fr.onload = function() {
            foto.src = fr.result;
            base64.value = foto.src.replace(/^data:image\/(png|jpg|jpeg|gif);base64,/, '');
        }
        fr.readAsDataURL(fileChooser.files[0]);
    }
}


function actualizarFotoProducto() {
    var fileChooser = document.getElementById("txtFoto20");
    var foto = document.getElementById("imgFoto20");
    var base64 = document.getElementById("textarea0");
    if (fileChooser.files.length > 0) {
        var fr = new FileReader();
        fr.onload = function() {
            foto.src = fr.result;
            base64.value = foto.src.replace(/^data:image\/(png|jpg|jpeg|gif);base64,/, '');
        }
        fr.readAsDataURL(fileChooser.files[0]);
    }
}