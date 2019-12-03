function enviarAlerta(titulo, mensaje, ico, action) {
    Swal.fire({
        title: titulo,
        text: mensaje,
        icon: ico,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: action
    });
}