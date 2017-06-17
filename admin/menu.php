<div class="left side-menu noimprimir-contenido">
	<div class="sidebar-inner slimscrollleft">
		<div class="user-details">
			<div class="pull-left"><img src="usuarios/user.png" alt="" class="thumb-md img-circle"></div>
			<div class="user-info">
				<div class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="nombre-usuario"><?php echo $_SESSION["nombre"]; ?></span> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="?cerrar=cerrar"><i class="md md-settings-power"></i> Cerrar sesi&oacute;n</a></li>
					</ul>
				</div>
				<p class="text-muted m-0"></p>
			</div>
		</div>
		<!--- Divider -->
		<div id="sidebar-menu">
			<ul>
				<li class="has_sub"><a href="#" class="waves-effect"><i class="md md-lock"></i><span>Noticias</span><span class="pull-right"><i class="md md-add"></i></span></a>
					<ul class="list-unstyled">
						<li><a href="nueva-noticia.php">Nueva noticia</a></li>
						<li><a href="index.php">Lista de noticias</a></li>
					</ul>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>