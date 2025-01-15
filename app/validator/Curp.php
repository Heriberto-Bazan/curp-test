<?php
require_once('../validator/ValidarCurp.php');

$nombre          = 'Ricardo';
$apellidoPaterno = 'Valentino';
$apellidoMaterno = 'Bazan';
$diaNacimiento   = '09'; // XX
$mesNacimiento   = '09'; // XX
$anioNacimiento  = '1988'; // XXXX
$fecha           = "$anioNacimiento-$mesNacimiento-$diaNacimiento";
$sexo            = 'H'; // X (H o M)
$entidad         = '88'; // XX (01-32, 87-88)


$diferencias = [];


if (isset($_POST['data_curp'])) {
    $otra_curp   = $_POST['data_curp'];
}
try {
    $curpObj     = new ValidarCurp($nombre, $apellidoPaterno, $apellidoMaterno, $fecha, $sexo, $entidad);
    $curp        = $curpObj->curp;
    $diferencias = $curpObj->comparar($otra_curp);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../public/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../public/css/contact-form.css" type="text/css">
    <title>CURP</title>
</head>

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
</body>

</html>