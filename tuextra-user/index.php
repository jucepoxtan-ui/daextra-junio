<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DaExtra, Tu Extra</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!-- LINKS META -->
    <?php include '../include/links-meta.php';?>
        <link rel="icon" href="img/favicon.png" type="image/png">
        <link rel="stylesheet" href="css/bootstrap3-editable.css">
        <!-- LINKS META -->

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-defaull">
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
    <!-- <div class="alert alert-danger">
        <div class="container">
            <div class="alert-icon">
                <i class="material-icons">info_outline</i>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="material-icons">clear</i></span>
            </button>

            <b>Alerta</b> Recuerda realizar tu Extra para seguir...
        </div>
    </div> -->
    <br>
    <!-- NAVBAR -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-nav-tabs">
                    <div class="header header-success">
                        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li class="active">
                                        <a href="#tu-extra" data-toggle="tab" aria-expanded="true">
                                            <i class="material-icons">speaker_notes</i> DAR TU EXTRA
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#recibir" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">compare_arrows</i> RECIBIR TU EXTRA
                                            <div class="ripple-container"></div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="tab-content text-center">
                            <div class="tab-pane active" id="tu-extra">
                                <div class="col-md-8 text-input-id">
                                    <h2 class="text-left">INFORMACIÓN PARA DAR TU EXTRA</h2>
                                    <hr>
                                    <h3 class="text-left">Número de tu patrocinador: <strong>{{ 1012129 }}</strong></h3>
                                    <h3 class="text-left">Número tarjeta: <strong>{{ 1234 5678 9101 1213 }}</strong></h3>
                                    <h3 class="text-left">CLABE interbancaria: <strong>{{ 18 Digitos }}</strong></h3>
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
                                            <!-- <label class="control-label">Folio de comprobante</label> -->
                                            <input name=folio__depo type="text" required="required" class="form-control" placeholder="Folio de comprobante" />
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
                                <!-- TABLA DE COMPROBANTE -->

                            </div>

                            <div class="tab-pane" id="recibir">
                                <div class="col-md-12 text-input-id caja-perfil">
                                    <h2 class="text-center">INFORMACIÓN PARA RECIBIR TU EXTRA</h2>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="padding-20"></div>
                                            <h3 class="text-left">Nombre completo: <br>
                                            <strong>{{ Julio Alimaña }}</strong></h3>

                                            <h3 class="text-left">Correo Electrónico: <br>
                                            <strong>{{ correo@mail.com }}</strong></h3>

                                        </div>

                                        <h2>Aquí podras cambiar tus datos</h2>
                                        <div class="col-md-8">
                                            <form class="form-inline editableform">
                                                <table id="user" class="table table-bordered table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td width="30%">Banco</td>
                                                            <td><a href="#" id="banco-cambio" class="myeditable editable editable-click editable-empty" data-type="select" data-pk="1" data-title="Selecciona">Banamex</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Numero de tarjeta</td>
                                                            <td><a href="#" id="numero-tarjeta-cambio" class="myeditable editable editable-click editable-empty" data-type="text" data-name="firstname" data-original-title="Cambia tu numero de tarjeta">1234 1212 5212 5232</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>CLABE SPEI</td>
                                                            <td><a href="#" id="clave-interbancaria-cambiar" class="myeditable editable editable-click editable-empty" data-type="text" data-name="firstname" data-original-title="CLABE SPEI">18 Digitos</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>No de Celular</td>
                                                            <td><a href="#" id="celular-cambio" class="myeditable editable editable-click editable-empty" data-type="text" data-name="firstname" data-original-title="Cambia tu numero de celular">(222) 339 20 90</a></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- INICIA TABLA -->
                                    <div class="col-md-12">
                                        <h2 class="text-center">TABLA DE TUS EXTRAS</h2>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Nombre</th>
                                                        <th class="text-center">No. de Celular</th>
                                                        <th class="text-center">Correo Electrónico</th>
                                                        <th class="text-center">Fecha de aportación</th>
                                                        <th class="text-center">Comprobante</th>
                                                        <!-- <th class="text-center">Comprobado</th> -->
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
                                                            <button type="button" rel="tooltip" class="btn btn-xs btn-info" data-toggle="modal" data-target="#deposito-ficha">
                                                                <i class="material-icons">visibility</i> Ver
                                                            </button>
                                                        </td>
                                                        <!-- <td class="text-center">
                                                            <button type="button" rel="tooltip" class="btn btn-xs btn-success">
                                                                <i class="material-icons">done</i> SI
                                                            </button>
                                                            <button type="button" rel="tooltip" class="btn btn-xs btn-warning">
                                                                <i class="material-icons">highlight_off</i> NO
                                                            </button>
                                                        </td> -->
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <?php include '../include/footer-panel.php';?>
    <!-- FOOTER -->

    <!-- FOOTER -->
    <?php include '../include/modals.php';?>
    <!-- FOOTER -->

    <!-- SCRIPTS -->
    <?php include '../include/scripts.php';?>
    <!-- SCRIPTS -->

</body>

</html>