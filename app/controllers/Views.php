<?php

require_once '../app/validator/ValidarCurp.php';


class Views extends Control
{

  public function inicio()
  {

    $nombre          = 'Ricardo';
    $apellidoPaterno = 'Valentino';
    $apellidoMaterno = 'Bazan';
    $diaNacimiento   = '09'; // XX
    $mesNacimiento   = '09'; // XX
    $anioNacimiento  = '1988'; // XXXX
    $fecha           = "$anioNacimiento-$mesNacimiento-$diaNacimiento";
    $sexo            = 'H'; // X (H o M)
    $entidad         = '88'; // XX (01-32, 87-88)
    $datos = [];
    $curp = [];

    if (isset($_POST['data_curp'])) {
      $comparar_curp   = $_POST['data_curp'];
      
      try {
        $curpObjeto     = new ValidarCurp($nombre, $apellidoPaterno, $apellidoMaterno, $fecha, $sexo, $entidad);
        $curp        = $curpObjeto->curp;
        $datos = $curpObjeto->comparar($comparar_curp);

        $original = [
          'nombre' => $nombre,
          'paterno' => $apellidoPaterno,
          'materno' => $apellidoMaterno,
          'original' => $curp,
          'data_curp' => $_POST['data_curp'],
        ];

      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }

    $original = (empty($original)) ? [] :  $original;
    $datos = (empty($datos)) ? [] :  $datos;

    $this->load_view('inicio', $datos, $original);
  }
  
}
