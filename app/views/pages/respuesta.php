<?php require_once APP . '/views/inc/header.php' ?>

<div class="container-fluid bg-light py-5">
  <div class="container">
    <h1 class="display-4"><?= $datos['title'] ?></h1>
  </div>

  <body>
    <div class="container text-center">
        <div class="row">
            <div class="tab-content">
                <div class="col-sm-12">
                    <h1>CURP</h1>
                    <h2>Nombre: <?php echo $nombre . " " . $apellidoPaterno . " " . $apellidoMaterno; ?></h1>
                        <h2>CURP: <?php echo $curp; ?></h2>
                        <br>

                        <p>validar con la curp <strong><?php echo $otra_curp; ?></strong>:</p>
                        <p><strong><?php echo $diferencias["curp_formateada"] ?></strong></p>
                        
                            <?php
                            foreach ($diferencias["fallos"] as $codigo => $d) {
                            ?>

                                <dt><?php echo $codigo; ?></dt>
                                <dd>- Índices: <?php echo implode(', ', $d["indices"]); ?></dd>
                                <dd>- Mensaje: <?php echo $d["mensaje"]; ?></dd>

                            <?php
                            }
                            ?>
                        
                </div>
            </div>
        </div>
    </div>
</body>

</div>

<?php require_once APP . '/views/inc/footer.php' ?>