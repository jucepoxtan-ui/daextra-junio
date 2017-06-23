
    <!-- MODAL REGISTRO -->
    <div class="modal fade" 
        id="registro-modal" 
        tabindex="-1" 
        role="dialog" 
        aria-labelledby="modal-" 
        aria-hidden="true" 
        style="display: none;">
        <div class="modal-dialog modal-notice">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>

                    <figure>
                        <img src="img/daextra-logo3x-white.png" class="center-block logo-extra-login" alt="">
                    </figure>
                </div>
                <div class="modal-body">
                    <div class="instruction">
                        <div class="row">
                            <div class="col-md-12">
                            <div>
                            </div>
                                <form method="post" action="tuextra-user/index.php" onsubmit="validar();">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- NOMBRE DE USUARIO -->
                                            <div class="form-group label-floating">

                                                <label class="control-label">
                                                    Tu nombre completo
                                                </label>
                                            <input type="text" class="form-control" name="usuario" required>
                                            </div>
                                            <!-- NOMBRE DE USUARIO -->
                                        </div>
                                        <div class="col-md-6">
                                        <!-- PATRICINADOR -->
                                            <div class="form-group label-floating">

                                            <label class="control-label">
                                                Nombre de usuario de patrocinador
                                            </label>

                                            <input type="text" class="form-control" name="patrocinador" required>
                                        </div>
                                        <!-- PATROCINADOR -->

                                        <!-- CORREO ELECTRONICO -->
                                            <div class="form-group label-floating">
                                            <label class="control-label">
                                                Correo Electronico
                                            </label>

                                        <input type="email" class="form-control" name="email" required> 
                                        <!-- CORREO ELECTRONICO -->
                                    </div>
                                        <!-- LEFT -->

                                        <!-- BANCO -->
                                        <select class="select form-control" name="banco" placeholder="Choose an option" required>
                                            <option disabled selected class="disabled"> Banco</option>
                                            <option value="1">BanCoppel</option>
                                            <option value="2">Banamex (Saldazo) </option>
                                            <option value="3">Bancomer</option>
                                            <option value="4">Banco Azteca</option>
                                            <option value="5">Banorte</option>
                                            <option value="6">Scotiabank</option>
                                            <option value="7">Santander</option>
                                        </select>
                                        <!-- BANCO -->

                                        <!-- CELULAR -->
                                        <div class="form-group label-floating">
                                        <label class="control-label">No. de Celular</label>
                                        <input id="tel" type="tel" name="phone" placeholder="(XXX) XXX-XXXX" pattern="\(\d{3}\) \d{3}\-\d{4}" class="masked form-control" title="10-digit number" required>
                                        <!-- CELULAR -->
                                    </div>

                                        <!-- LEFT -->
                                        </div>

                                        <div class="col-md-6">
                                        <!-- RIGTH -->
                                            <!-- NOMBRE DE USUARIO -->
                                            <div class="form-group label-floating">

                                                <label class="control-label">
                                                    Tu nombre de usuario
                                                </label>
                                            <input type="text" class="form-control" name="usuario" required>
                                            </div>
                                            <!-- NOMBRE DE USUARIO -->

                                            <!-- PASSWORD -->
                                            <div class="form-group label-floating">

                                            <label class="control-label">
                                                Password
                                            </label>
                                                <input type="password" class="form-control" name="password" required> 
                                            </div>
                                            <!-- PASSWORD -->

                                        <!-- RIGHT -->

                                        <!-- TU EXTRA -->
                                            <select class="select form-control" name="plan" placeholder="Choose an option" required>
                                            <option disabled selected class="disabled"> Tu plan</option>
                                            <option value="200">DX 200</option>
                                            <option value="500">DX 500</option>
                                            </select>
                                        <!-- TU EXTRA -->

                                            <div class="form-group label-floating">
                                                <label class="control-label">
                                                Tarjeta de Debito
                                                </label>

                                                <input id="cc" type="tel" name="ccnumber" placeholder="XXXX XXXX XXXX XXXX" pattern="\d{4} \d{4} \d{4} \d{4}" class="masked form-control" title="16 Digitus con clave lada" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-7">
                                    <!-- CHECKBOX    -->
                                    <div class="checkbox center-block">
                                        <label>
                                        <input type="checkbox" name="optionsCheckboxes" required>
                                        <span class="checkbox-material">
                                            </span>Acepto los términos y condiciones
                                        </label>
                                    </div>
                                    <!-- CHECKBOX -->
                                    </div>

                                    <br>
                                    <div class="padding-20"></div>
                                    <!-- SUBMIT -->
                                    <input type="submit" name="registro" class="btn btn-entrar btn-block btn-centrado" value="Regístrate" style="background: #00BF40 !important;">
                                    <!-- SUBMIT -->

                                    </form>
                                    <hr>
                                    <div class="col-md-6">
                                        <a href="aviso-de-privacidad.php" class="text-center center-block"><i class="fa fa-shield" aria-hidden="true"></i> Aviso de privacidad</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="terminos-y-condiciones.php" class="text-center center-block"><i class="fa fa-shield" aria-hidden="true"></i> T&eacute;rminos y condiciones</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL REGISTRO -->
    <!-- DX200 -->
    <div class="modal fade" id="dx200-modal" tabindex="-1" role="dialog" aria-labelledby="modal-" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-notice">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="com-md-12">
                            <div class="col-md-6">
                                <figure>
                                    <img src="img/dx200.png" class="img-responsive" alt="">
                                </figure>
                            </div>
                            <div class="col-md-6">
                                <h2>DX200</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis, vitae laboriosam incidunt doloribus in sapiente iusto ea facilis ipsum, corporis provident, eligendi fugit. Architecto voluptates quaerat doloremque, temporibus quae! Nulla.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="moda-footer">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- DX200 -->

    <!-- DX500 -->
    <div class="modal fade" id="dx500-modal" tabindex="-1" role="dialog" aria-labelledby="modal-" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-notice">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <figure>
                                    <img src="img/dx500.png" class="img-responsive animated infinite pulse" alt="">
                                </figure>
                            </div>
                            <div class="col-md-6">
                                <h2>DX500</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere non cum laboriosam, odit consectetur maxime. Illum repellat impedit eaque veritatis distinctio voluptatum velit voluptates, quod tempora. Molestiae minus vero voluptas.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="moda-footer">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- DX500 -->

    <!-- DX1000 -->
    <div class="modal fade" id="dx1000-modal" tabindex="-1" role="dialog" aria-labelledby="modal-" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-notice">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                        <h2 class="info-title text-center">DX1000</h2>
                        <figure>
                            <img class="img-responsive center-block" src="img/dx200.png" alt="">
                        </figure>
                        
                        <p>Es el plan para aquellos que requieren montos mayores para proyectos más grandes, ningún proyecto es grande o pequeño para la mente humana pero la falta de fondos puede limitar, está desarrollado para pequeñas empresas, negocios establecidos o para aquellas personas que quieren realizar un proyecto en el corto plazo.
                        <br>
                        Diseñado para darle la vuelta al mundo, comprar el auto de tus sueños, poner el restaurante que quieres, pagarte la colegiatura de una universidad privada. </p>
                        </div>
                    </div>
                </div>
                <div class="moda-footer">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- DX1000 -->
       
    <!-- MODAL ENTRAR -->
 <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="modal-" aria-hidden="true" style="display: none;">
    <div class="modal-dialog caja-login modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>

                    <figure>
                        <img src="img/daextra-logo3x-white.png" class="center-block logo-extra-login" alt="">
                    </figure>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                        <div>
                            <h2 class="text-center">Iniciar sesi&oacute;n</h2>
                        </div>
                             <form method="post" action="index.php" >
                                <div class="form-group label-floating">
                                    <label class="control-label">Correo Electronico</label>
                                    <input type="email" class="form-control" name="usuario">
                                </div>

                                <div class="form-group label-floating">
                                    <label class="control-label">Contraseña</label>
                                    <input type="password" name="password" class="form-control" data-toggle="password">
                                </div>
                                <input type="submit" name="login" class="btn btn-entrar btn-block btn-centrado" value="Entrar">
                            </form>
                            <hr>
                                <div class="col-md-12 center-block">
                            <a href="aviso-de-privacidad.php" class="text-center center-block">• Olvid&eacute; mi contraseña •</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- MODAL ENTRAR -->

<!-- MODAL ELIMINAR -->
 <div class="modal fade" id="eliminar-usuario" tabindex="-1" role="dialog" aria-labelledby="modal-" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header" style="background: #f44336;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="center-block text-center">
                                <i class="material-icons" style="font-size: 100px;">delete_forever</i>
                                <h4>¿Estas seguro que deseas eliminar este Extra?</h4>
                            </div>
                            <br><hr>
                            <div class="center-block">
                                <input type="submit" name="login" class="btn btn-danger btn-block btn-centrado" value="Eliminar">
                            </div>
                            
                            <hr>
                            <p class="text-center">Te recordamos que DaExtra se realiza de la confianza y hacemos lo posible por seguir con tu Extra</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- MODAL ELIMINAR -->
	
<div class="modal fade" id="deposito" tabindex="-1" role="dialog" aria-labelledby="modal-" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
							<div>
								<figure>
									<img src="img/img.png" class="center-block logo-extra-login" id="deposito-user" alt="" style="width:100%">
								</figure>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- MODAL ENTRAR -->