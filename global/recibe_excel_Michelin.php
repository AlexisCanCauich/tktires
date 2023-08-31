<?php
require'database.php';

$tipo       = $_FILES['dataCliente']['type'];
$tamanio    = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];
$lineas     = file($archivotmp);

$i = 1;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);



    if ($i != 0) {

    $datos = explode(",", $linea);

    $codigo = !empty($datos[0])  ? ($datos[0]) : '';
	$marca = !empty($datos[1])  ? ($datos[1]) : '';
    $descripcion = !empty($datos[2])  ? ($datos[2]) : '';
    $precio = !empty($datos[3])  ? ($datos[3]) : '';
    $link = !empty($datos[4])  ? ($datos[4]) : '';

    

    if( !empty($codigo) ){
        $sqlVerificarExistencia = ("SELECT codigo FROM MTires WHERE codigo='".($codigo)."' ");
        $queryDuplicidad        = mysqli_query($db, $sqlVerificarExistencia);
        $cantidadDuplicidad     = mysqli_num_rows($queryDuplicidad);

        /**********************************
         * Caso 1; si no existe ningún
         * registro asociado algunos de los
         * código que viene desde el CSV.
         * **************************/
        if ( $cantidadDuplicidad == 0 ) { 
            $insertarProduct = ("INSERT INTO MTires(codigo,marca,descripcion,precio,link) VALUES('$codigo','$marca','$descripcion','$precio','$link')");
            mysqli_query($db, $insertarProduct);
        }else {
            $updateData = ("UPDATE MTires SET marca='" .$marca. "', descripcion='".$descripcion."', precio='".$precio."', link='".$link."'  WHERE codigo='".$codigo."' ");
            $resultUpdate = mysqli_query($db, $updateData);
        }

    }



    /*$insertarProduct = ("INSERT INTO productos(producto,codigo,cantidad) VALUES('$producto','$codigo','$cantidad')");
    myqli_query($db, $insertarProduct);*/
    }

       
    

      echo '<center><div>'. $i. "). " .$linea.'</div></center>';
    $i++;
}


  echo '<center><p style="text-aling:center; color:#333;">Total de Registros: '. $cantidad_regist_agregados .'</p></center>';

echo "<center><a href='../index.html'>Atras</a></center>";
?>