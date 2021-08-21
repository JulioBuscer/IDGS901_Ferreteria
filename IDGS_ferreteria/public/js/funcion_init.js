// FUNCIONES PARA CATEGORIAS
// window.onload = function() {
//     // In your Javascript (external .js resource or <script> tag)
//     $(document).ready(function() {
//         $('.js-example-basic-single').select2();
//     });
// }

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
    $('#textarea0').val(foto);
    $('#slcCategoria10').val(idCategoria);

    var ruta = Route_esp + "Productos/" + id

    $('#editCat').attr('action', ruta);
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

function alertError(contexto) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        html: contexto
    });
}

// FUNCIONES PARA ROLES

function editarRoles(id, nombre, descripcion) {

    $('#idCat').val(id);
    $('#nombrerol1').val(nombre);
    $('#descripcionRol1').val(descripcion);

    var ruta = Route_esp + "Roles/" + id

    $('#editCat').attr('action', ruta);
}

function verRoles(id, nombre, descripcion) {


    $('#id2').val(id);
    $('#nombreRol2').val(nombre);
    $('#descripcionRol2').val(descripcion);


}

//FUNCIONES PARA EMPLEADOS

function editarEmpleado(id, nombre, app, apm, email, tel, foto, idPersona, idRol, pass) {
    $('#idEmp').val(id);
    $('#idPer').val(idPersona);
    $('#nombre1').val(nombre);
    $('#App1').val(app);
    $('#Apm1').val(apm);
    $('#tel1').val(tel);
    $('#email1').val(email);
    $('#password1').val("");
    $('#imgFoto20').attr("src", "data:image/jpeg;base64," + foto).width(220).height(280);
    $('#textarea0').val(foto);
    $('#slcRol1').val(idRol);

    var ruta = Route_esp + "Empleados/" + id

    $('#editCat').attr('action', ruta);
}

function verEmpleado(id, nombre, app, apm, email, tel, foto, idPersona, idRol, pass) {

    $('#nombre2').val(nombre);
    $('#App2').val(app);
    $('#Apm2').val(apm);
    $('#tel2').val(tel);
    $('#email2').val(email);
    $('#password2').val(pass);
    $('#imgFoto21').attr("src", "data:image/jpeg;base64," + foto).width(220).height(280);
    $('#textarea01').val(foto);
    $('#slcRol2').val(idRol);


}


function cargarFotoEmpleado() {

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


function actualizarFotoEmpleado() {
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

// Funciones para Clientes

function editarCliente(id, nombre, app, apm, rfc, direccion, correo, idPersona, tel) {
    $('#idClie').val(id);
    $('#idPer').val(idPersona);
    $('#nombre1').val(nombre);
    $('#App1').val(app);
    $('#Apm1').val(apm);
    $('#tel1').val(tel);
    $('#email1').val(correo);
    $('#rfc1').val(rfc);
    $('#direccion1').val(direccion);

    var ruta = Route_esp + "Clientes/" + id

    $('#editCat').attr('action', ruta);
}

function verCliente(id, nombre, app, apm, rfc, direccion, correo, idPersona, tel) {

    $('#nombre2').val(nombre);
    $('#App2').val(app);
    $('#Apm2').val(apm);
    $('#tel2').val(tel);
    $('#email2').val(correo);
    $('#rfc2').val(rfc);
    $('#direccion2').val(direccion);


}