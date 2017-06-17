<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DaExtra, Porque el Extra es lo que damos</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!-- LINKS META -->
    <?php include '../include/links-meta.php';?>
        <link rel="icon" href="img/favicon.png" type="image/png">
        <!-- LINKS META -->

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-defaull nopadding">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-primary">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <figure>
                    <img src="img/daextra-logo1x.png" alt="">
                </figure>
            </div>

            <!-- NOMBRE DE USUARIO -->
            <div class="collapse navbar-collapse" id="example-navbar-primary">
                <ul class="nav navbar-nav navbar-right">
                <li><a>Hola <strong>{{ NOMBRE USUARIO }}</strong></a></li>
            <!-- NOMBRE DE USUARIO -->

                <!-- SALIR -->
                    <li class="active">

                        <a href="../index.php" style="color: red;">
                            <i class="material-icons">exit_to_app</i> Salir
                        </a>

                    </li>
                </ul>
                <!-- SALIR -->

            </div>
        </div>
    </nav>
    <div class="alert alert-danger">
        <div class="container">
            <div class="alert-icon">
                <i class="material-icons">info_outline</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>

            <b>Alerta</b> Recuerda realizar tu Extra para seguir...
        </div>
    </div>
    <br>
    <!-- NAVBAR -->

    <!-- DATOS DE USUARIO -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-input-id">
            <h2>INFORMACIÓN PARA RECIBIR TU EXTRA</h2>
                <hr>

                <h3 class="text-left">Número de tu patrocinador: <strong>{{ 1012129 }}</strong></h3>
                <h3 class="text-left">Número tarjeta: <strong>{{ 1234 5678 9101 1213 }}</strong></h3>
                <h3 class="text-left">Banco de patrocinador: <strong>{{ Banamex (Salzado) }}</strong></h3>
                <h3 class="text-left">No. de Celular: <strong>{{ (229) 99 9999 }}</strong></h3>
                <h3 class="text-left">Correo Electrónico: <strong>{{ correo@mail.com }}</strong></h3>
                <h3 class="text-left">Fecha para dar tu Extra: <strong>{{ Los 15 de cada mes }}</strong></h3>
                <h3 class="text-left">Comprobado: <strong>{{ SI }}</strong></h3>
                <br>

            </div>
            <div class="col-md-4 box-fileinput">
                <!-- SUBIR ARCHIVO -->
                <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail img-raised">
                        <img src="img/image_placeholder.jpg" alt="...">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                    <div>
                        <span class="btn btn-raised btn-round btn-info btn-file">
                        <span class="fileinput-new">ABRIR</span>
                        <span class="fileinput-exists btn-info">Cambiar</span>

                        <input type="hidden" value="" name="...">
                        <input type="file" name="">
                        <div class="ripple-container"></div>
                        </span>
                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Quitar</a>

                        <a href="#" class="btn btn-success fileinput-exists" data-dismiss="fileinput"><i class="fa fa-send"></i> Enviar</a>
                    </div>
                </div>
            <!-- SUBIR ARCHIVO -->
            </div>
        </div>
    </div>
    <!-- FIN DE DATOS DE USUARIO -->
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
    
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
                                <th>No. de Celular</th>
                                <th>Correo Electrónico</th>
                                <th class="text-center">Fecha de aportación</th>
                                <th class="text-center">Comprobante</th>
                                <th class="text-center">Comprobado</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                    <!-- INFO DE MIS INVITADOS -->
                            <tr>
                                <td class="text-center">1</td>
                                <td>Julio Poxtan</td>
                                <td>(229) 99 99 99</td>
                                <td>jucepoxtan@gmail.com</td>
                                <td class="text-center">12/04/2017</td>
                                <td class="text-center">
                                    <button type="button" rel="tooltip" class="btn btn-xs btn-info">
                                        <i class="material-icons">visibility</i> Ver
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button type="button" rel="tooltip" class="btn btn-xs btn-success">
                                        <i class="material-icons">done</i> SI
                                    </button>
                                    <button type="button" rel="tooltip" class="btn btn-xs btn-warning">
                                        <i class="material-icons">highlight_off</i> NO
                                    </button>
                                </td>
                                <td class="td-actions text-center">
                                    <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#eliminar-usuario">
                                        <i class="material-icons">delete_forever</i> Eliminar
                                    </button>
                                </td>
                            </tr>
                    <!-- INFO DE MIS INVITADOS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php include '../include/footer.php';?>
        <!-- FOOTER -->

        <!-- FOOTER -->
        <?php include '../include/modals.php';?>
            <!-- FOOTER -->

            <!-- SCRIPTS -->
            <?php include '../include/scripts.php';?>
                <!-- SCRIPTS -->

</body>

</html>