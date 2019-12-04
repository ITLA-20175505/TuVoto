<?php
$base = base_url('base');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    <script src="<?=$base?>/js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="<?=$base?>/css/sweet-alert.css">
    <link rel="stylesheet" href="<?=$base?>/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?=$base?>/css/normalize.css">
    <link rel="stylesheet" href="<?=$base?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$base?>/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="<?=$base?>/css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?=$base?>/js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="<?=$base?>/js/modernizr.js"></script>
    <script src="<?=$base?>/js/bootstrap.min.js"></script>
    <script src="<?=$base?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="<?=$base?>/js/main.js"></script>
	<script src="<?=$base?>/js/sweetalert.js"></script>
    <script src="<?=$base?>/js/confirmarvoto.js"></script>
    <script src="<?=$base?>/js/mensaje.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
             <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

<div class="container">
    <div class="page-header">
        <h1 class="all-tittles">Resumen de Votacion de <strong><?=$votacion[0]['Votante']?></strong></h1>
    </div>
        <div class="container-fluid">
                <?php
                    foreach ($votacion as $key => $voto) {
                        echo <<<CODIGO
                        <div class="media media-hover">
                            <div class="media-left media-middle">
                                <a href="#!" class="tooltips-general" data-toggle="tooltip" data-placement="right" title="Más información del libro">
                                <img class="media-object" src="{$voto['Foto']}" alt="Foto" width="48" height="48">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Nivel de {$voto['Nivel']}</h4>
                                <div class="pull-left">
                                    <strong>Candidato: {$voto['Candidato']}<br>
                                    <strong>Partido: {$voto['Partido']}<br>
                                </div>
                                <p class="text-center pull-right">
                                </p>
                            </div>
                        </div>
              
CODIGO;

                    }
                ?>
                <!-- <div class="media-body">
                    <h4 class="media-heading">1 - Partido</h4>
                    <div class="pull-left">
                        <strong>Nombre<br>
                        <strong>Partido<br>
                    </div>
                    <p class="text-center pull-right">
                        <a href="#!" class="btn btn-info btn-xs" style="margin-right: 10px;"><i class="zmdi zmdi-info-outline"></i> &nbsp;&nbsp; Más información</a>
                    </p>
                </div> -->
   
</div>   
            </body>
</html>

<script>
print();
</script>