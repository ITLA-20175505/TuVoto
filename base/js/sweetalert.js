function confirmacion(titulo, mensaje, ico, action, url) {
    return new Promise((resolve) => {
        Swal.fire({
            title: titulo,
            text: mensaje,
            icon: ico,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: action,
        }).then((result) => {
            if (result.value) {
                resolve(true);
                window.location = url;

            } else {
                resolve(false);
            }
        });
    });

}

function swtest() {
    Swal.fire('HOla');
}

function confirmarRegistro(titulo, mensaje, ico, action, url) {
    return new Promise((resolve) => {
        Swal.fire({
            title: titulo,
            text: mensaje,
            icon: ico,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: action,
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                // resolve(true);
                confirmacion('Confirmacion', 'Registro Eliminado con existo', 'success',
                    'OK', url);
                // window.location = url;
            } else {
                resolve(false);
            }
        });
    });

}

function eliminarFila(btn) {
    fila = btn.parentNode.parentNode;
    fila.parentNode.removeChild(fila);

}

function confirmJS(titulo, mensaje, ico, action, btn) {
    return new Promise((resolve) => {
        Swal.fire({
            title: titulo,
            text: mensaje,
            icon: ico,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: action,
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                resolve(true);
                eliminarFila(btn);
            } else {
                resolve(false);
            }
        });
    });

}