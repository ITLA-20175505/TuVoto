<?php
$base = base_url('base');
?>
<footer class="footer full-reset" style="min-height:288px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <h4 class="all-tittles">Acerca de</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam quam dicta et, ipsum quo. Est saepe deserunt, adipisci eos id cum, ducimus rem, dolores enim laudantium eum repudiandae temporibus sapiente.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <h4 class="all-tittles">Programador Web</h4>
                        <ul class="list-unstyled">
                            <li><i class="zmdi zmdi-check zmdi-hc-fw"></i>&nbsp; Jose Luis Alemán <i class="zmdi zmdi-facebook zmdi-hc-fw footer-social"></i><i class="zmdi zmdi-twitter zmdi-hc-fw footer-social"></i></li>
                        </ul>
					</div>
					<div class="col-xs-12 col-sm-6">
                        <h4 class="all-tittles">Programador Web MVC</h4>
                        <ul class="list-unstyled">
                            <li><i class="zmdi zmdi-check zmdi-hc-fw"></i>&nbsp; Freddy Soto Fermin <i class="zmdi zmdi-facebook zmdi-hc-fw footer-social"></i><i class="zmdi zmdi-twitter zmdi-hc-fw footer-social"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright full-reset all-tittles">&copy; 2019 AleSot S.A</div>
        </footer>
</div>
</body>
<script src="<?=$base?>/js/sweetalert.js"></script>
<script>
function eliminar(titulo,mensaje,ico,action,$urlBorrar){

confirmarRegistro(titulo,mensaje,ico,action,$urlBorrar);
}
function activar(titulo,mensaje,ico,action,$urlBorrar){
confirmarActivacion(titulo,mensaje,ico,action,$urlBorrar);
}

function desactivar(titulo,mensaje,ico,action,$urlBorrar){
confirmarInactivacion(titulo,mensaje,ico,action,$urlBorrar);
}
function confirmarSave(titulo,mensaje,ico,action,$urlBorrar){
confirmacion(titulo,mensaje,ico,action,$urlBorrar);
}
function confirmarVoto(titulo,mensaje,ico,action,cancel,url){
    confirmarVotacion(titulo,mensaje,ico,action,cancel,url);
}
function MensajeSA(titulo,mensaje,ico,action){
    enviarAlerta(titulo,mensaje,ico,action);
}

</script>
</html>
