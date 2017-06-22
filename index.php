<?php
// ob_start("ob_gzhandler");
// define('TIMEZONE', 'America/Mexico_City');
// date_default_timezone_set(TIMEZONE);
// setlocale(LC_ALL,"es_ES");
// Conexion a BD
//     require_once("conexion.php");
//     session_start();
    
// if(isset($_POST["login"])){
//         $sql= "SELECT * FROM usuarios WHERE email = '".$_POST["usuario"]."' AND password= '".$_POST["password"]."' limit 1";    
//         $query=mysql_query($sql) or die(mysql_error());         
//         while ($resultados = mysql_fetch_assoc($query)){
//             $id = $resultados["id"];
//             $nombre = $resultados["nombre"];
//             $usuario = $resultados["usuario"];
//             $password = $resultados["password"];
//             $celular = $resultados["celular"];
//             $patrocinador = $resultados["id_patrocinador"];
//             $depostia_a = $resultados["id_user_deposita_a"];
//         }mysql_free_result($query);
        
//         $query = mysql_query("SELECT numero_usuario FROM usuarios where id=".$depostia_a." limit 1");$results = mysql_fetch_array($query); mysql_free_result($query);
//         $beneficiario = $results['numero_usuario'];
        
//         if(@$id != NULL){
            // Session
    //             $_SESSION["iniciada"]=1;
    //             $_SESSION["id"] = $id;
    //             $_SESSION["nombre"] = $usuario;
    //             $_SESSION["usuario"] = $usuario;
    //             $_SESSION["password"] = $password;
    //             $_SESSION["celular"] = $celular;
    //             $_SESSION["numero_patrocinador"] = $beneficiario;
    //             header("Location:tuextra-user/index.php");
    //     }else{
    //         $_SESSION["iniciada"]=NULL;
    //         header("Location:../index.php");
    //         echo "<div style='text-align: center;'><span style='color: white;background-color: rgba(255, 0, 0, 0.7);padding: 4px;'>El usuario o contraseña no existe.</span></div>";
    //     }
    // }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DaExtra, Porque el Extra es lo que damos</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!-- LINKS META -->
    <?php include 'include/links-meta.php';?>
    <!-- LINKS META -->

</head>

<body>

    <!-- NAVBAR -->
    <?php include 'include/navbar.php';?>
    <!-- NAVBAR -->
    
    <!-- HEADER -->
    <?php include 'include/header-sliders.php';?>
    <!-- HEADER -->
    
    <!-- QUE ES DAEXTRRA -->
    <section class="daextra">
        <div class="container">
            <div class="col-md-12">
            <figure>
                <img src="img/debocaaboca-daextra@5x.png" class="img-responsive center-block img__daextra rellax" data-rellax-speed="-1" data-rellax-percentage="0" alt="">
            </figure>
            <div class="padding-20"></div>
                <h2 class="h2-des text-center text-muli-100 rellax" data-rellax-speed="-1" data-rellax-percentage="0">
                    <b>DaExtra</b> es una red de apoyo financiero basado en el Networking y Crowdfunding funciona a través de la cooperación mutua de quienes en ella participan, por lo que ser parte de esta red es una manera de obtener un dinerito extra a corto plazo, y la posibilidad de tener ingresos muy buenos y residuales altos a mediano plazo.
                </h2>
            </div>
        </div>
    </section>
    <!-- QUE ES DAEXTRRA -->
    
    <section class="section-porque">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                    
                        <div class="col-md-6">
                            <figure>
                        
                        <img src="img/img-log-daextra-animated@0.7x.png" class="img-daextra-float animated infinite pulse" alt="">
                        
                        <img src="img/grafico-daextra-persona-sl.png" class="img-daextra img-responsive rellax" alt=""
                        data-rellax-speed="-1" data-rellax-percentage="0.9">

                            </figure>
                            
                        </div>

                        <div class="col-md-6">

                        <h3 class="pregunta-h3">¿Por qué?</h3>
                        <h4>• Porque siempre necesitas ese apoyo extra.</h4>
                        <h3 class="pregunta-h3">¿Para quiénes?</h3>
                        <h4>• Para todos. Todos necesitamos dar y recibir un extra.</h4>
                        <h3 class="pregunta-h3">¿Desde cuándo?</h3>
                        <h4>• Desde YA! <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#registro-modal">Regístrate</button> y sé parte de esta red de apoyo económico.</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="video-daextra">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    <figure>
                        <img src="img/tabla-funciona-extra.png" class="img-responsive rellax" alt="" data-rellax-speed="-1" data-rellax-percentage=".2">
                    </figure>
                    </div>
                    <div class="col-md-6 como-ser-parte">
                        <h3 class="pregunta-h3">¿Cómo soy parte?</h3>
                        <br>
                        <h4>• Te invitan a la red de DaExtra</h4>
                        <h4>• Te <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#registro-modal">Regístras</button> en el portal.</h4>
                        <h4>• Escoge un plan de aportación mensual acorde a tu capacidad económica.

                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#dx200-modal">DX200</button>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#dx500-modal">DX500</button>
                        </h4>
                        
                        <h4>• Haz tu aportación a tu patrocinador.</h4>
                        <h4>• Invita a 4 amigos.</h4>
                        <h4>• Se repite el ciclo <i class="fa fa-refresh fa-spin fa-fw"></i></h4>
                        <h4>• Todos reciben su extra.</h4>
                        <p class="p-sub text-muli-100">2 aportarán directamente a tu cuenta y los otros 2 directamente a la cuenta de tu patrocinador</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CAJATUEXTRA -->
     <section class="section-cajatuextra">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <img src="img/bill-daextra-icon-animated@4x.png" class="img-responsive center-block img-bill-cartera-float img-bill-daextra rellax animated infinite pulse hidden-xs" alt=""  data-rellax-speed="-3" data-rellax-percentage="0.3">

                    <img src="img/img-extramoney-po.png" class="img-responsive center-block img-extramoney img-bill-daextra rellax" alt=""  data-rellax-speed="-3" data-rellax-percentage="0.4">
                </div>
                <div class="col-md-6 center-block">
                    <h2 class="text-rigth">Ideados acorde a tu nivel de ingreso y capacidad de apoyo.</h2>
                    <div class="info info-horizontal">
                        <div class="icon icon-info">
                            <i class="material-icons">done_all</i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">DX200 = $200.00
                            </h4>
                        </div>
                    </div>
                    <div class="info info-horizontal">
                        <div class="icon icon-info">
                            <i class="material-icons">done_all</i>
                        </div>
                        <div class="description">
                            <h4 class="info-title">DX500 = $500.00</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CAJATUEXTRA -->

    <!-- SEGURIDAD -->
    <section>
        <div class="seguro-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <figure>
                            <img src="img/24x7-daextra-final.png" class="img-responsive center-block rellax" 
                            alt="" data-rellax-speed="3" data-rellax-percentage="0.4">
                        </figure>
                        <h1 class="text-center text-seguro text-muli-700">
                            SIEMPRE DISPONIBLE · CONFIABLE · SEGURO
                        </h1>
                        <h5 class="text-center text-white">
                        TODA LA INFORMACIÓN DE DAEXTRA ESTA DISPONIBLE 24/7, ES SEGURA Y ENCRIPTADA.</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SEGURIDAD -->

    <!-- TESTIMONIOS -->
    <?php include 'include/testimonios.php';?>
    <!-- TESTIMONIOS -->

    <!-- FOOTER -->
    <?php include 'include/footer.php';?>
    <!-- FOOTER -->

    <!-- FOOTER -->
    <?php include 'include/modals.php';?>
    <!-- FOOTER -->

    <!-- SCRIPTS -->
    <?php include 'include/scripts.php';?>
    <!-- SCRIPTS -->

</body>

</html>