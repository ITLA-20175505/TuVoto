function confirmarVotacion(titulo, mensaje, ico, action, cancel, url) {
    return new Promise((resolve) => {
        Swal.fire({
            title: titulo,
            text: mensaje,
            icon: ico,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: action,
            cancelButtonText: cancel
        }).then((result) => {
            if (result.value) {
                // resolve(true);
                resolve(true);
                for (i = 0; i < lista_votos.length; i++) {
                    tr = document.createElement('tr');
                    cont = document.getElementById('detalle_plantilla').value;
                    for (prop in lista_votos[i]) {
                        console.log(prop)
                        cont = cont.replace('{' + prop + '}', lista_votos[i][prop]);
                    }
                    tr.innerHTML = cont;
                    document.getElementById('detalle_votacion').appendChild(tr);
                }

                document.getElementById('detalle_votos').submit();

            } else {
                resolve(false);

            }
        });
    });
}