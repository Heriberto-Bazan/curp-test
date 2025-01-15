<?php require_once APP . '/views/inc/header.php' ?>

<div class="container-fluid bg-light py-5">
	<section id="contact-form-section" class="form-content-wrap">
		<div class="container ">
			<div class="row">
				<div class="tab-content">
					<div class="col-sm-12">
						<div class="item-wrap">
							<div class="row">
								<div class="col-sm-12">
									<div class="item-content colBottomMargin">
										<div class="item-info">
											<h2 class="item-title "></h2>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<form id="test_curp" name="test_curp" method="post" action="http://localhost/test-curp/views/inicio">
										<div class="row">
											<div id="msgContactSubmit" class="hidden"></div>
											<div class="form-group col-sm-6">
												<div class="help-block with-errors"></div>
												<input name="data_curp" id="data_curp" placeholder="Validar CURP"
													class="form-control" type="text" required
													data-error="Por favor ingresa tu CURP">
												<div class="input-group-icon"><i class="fa fa-user"></i></div>
											</div>
											<br> <br>
											<div class="form-group last col-sm-12">
												<button type="submit" id="curp_submit" class="btn btn-primary">Enviar</button>
											</div>
											<br> <br>
											<span class="sub-text">* Campos requeridos</span>
											<div class="clearfix"></div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div id="complemento" class="container" hidden>
		
			<h2>CURP: <?php echo $original['data_curp']; ?></h2>
			<br>

			<p><strong><?= $datos['curp_formateada'] ?></strong></p>
			<?php
			foreach ($datos["fallos"] as $codigo => $d) {
			?>
				<dt><?php echo $codigo; ?></dt>
				<dd>- Índices: <?php echo implode(', ', $d["indices"]); ?></dd>
				<dd>- Mensaje: <?php echo $d["mensaje"]; ?></dd>
			<?php
			}
			?>
	</div>

</div>

<?php require_once APP . '/views/inc/footer.php' ?>


<script type="text/javascript">
	document.getElementById('curp_submit').addEventListener('click', function(e) {
		document.getElementById("complemento").removeAttribute("hidden");
	});
</script>