<div class="container formato__registro">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#terminos" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Terminos y condiciones</p>
            </div>
            <div class="stepwizard-step">
                <a href="#nombre-usuario" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Ingresa tus datos</p>
            </div>
            <div class="stepwizard-step">
                <a href="#finaliza" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>Donde recibiras tu extra</p>
            </div>
        </div>
    </div>
    <!-- EMPIEZA EL FORM -->
    <form method="post" action="tuextra-user/index.php" onsubmit="validar();">
        <div class="row setup-content" id="terminos">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3 class="text-center">Acepta los terminos y condiciones</h3>
                    <div class="embed-responsive embed-responsive-4by3">
                       <iframe src="include/terminos-iframe.html" id="terminos" class="iframe" name="terminos-condiciones" height="300px" scrolling="yes" frameborder="3" ></iframe>
                    </div>
                    <div class="col-md-12">
                        <div class="checkbox caja__terminos"><label>
                            <input type="checkbox" name="optionsCheckboxes" required>
                                <span class="checkbox-material">Acepto los términos y condiciones</span>
                            </label>
                        </div>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">S&iacute;guiente</button>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="row setup-content" id="nombre-usuario">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3 class="text-center">Ingreta tus datos</h3>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="control-label">Nombre de tu patrocinador</label>
                            <input name="patrocinador" maxlength="20" type="text" required="required" class="form-control" placeholder="e.g. CarlosA20100" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="control-label">Tu nombre completo</label>
                            <input name="nombre" maxlength="40" type="text" required="required" class="form-control" placeholder="e.g. Cesar Delgado" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="control-label">Tu nombre de usuario</label>
                            <input name="usuario" maxlength="40" type="text" required="required" class="form-control" placeholder="e.g. Minombre2003" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="control-label">Password</label>
                            <input type="password" class="form-control" name="password" required placeholder="El nombre del perro no cuenta"> 
                        </div>
                    </div>
                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">S&iacute;guiente</button>
                </div>
            </div>
        </div>
        <div class="row setup-content" id="finaliza">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3 class="text-center">Los datos más importantes toma tu tiempo</h3>
                    <div class="col-md-6">
                        <select class="select form-control" name="plan" placeholder="Seleciona tu plan" required>
                            <option disabled selected class="disabled"> Tu plan</option>
                            <option value="200">DX 200</option>
                            <option value="500">DX 500</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select class="select form-control" name="banco" placeholder="Selecciona tu banco" required>
                            <option disabled selected class="disabled"> Banco</option>
                            <option value="1">BanCoppel</option>
                            <option value="2">Banamex (Saldazo) </option>
                            <option value="3">Bancomer</option>
                            <option value="4">Banco Azteca</option>
                            <option value="5">Banorte</option>
                            <option value="6">Scotiabank</option>
                            <option value="7">Santander</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label class="control-label">Tu correo electronico</label>
                            <input type="email" class="form-control" name="email" required> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label class="control-label">No. de celular</label>
                            <input id="tel" type="tel" name="phone" placeholder="(XXX) XXX-XXXX" pattern="\(\d{3}\) \d{3}\-\d{4}" class="masked form-control" title="10-digit number" required> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label class="control-label">No. de tarjeta</label>
                            <input id="cc" type="tel" name="ccnumber" placeholder="XXXX XXXX XXXX XXXX" pattern="\d{4} \d{4} \d{4} \d{4}" class="masked form-control" required> 
                        </div>
                    </div>
                    
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-success btn-lg pull-right" type="submit">Registrarme</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- TERMINA EL FORM -->
    </form>
</div>