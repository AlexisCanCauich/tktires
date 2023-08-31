<?php

require'database.php';

$columns = ['codigo','marca','descripcion','precio','link'];
$table = "MTires";

$Scampo = isset($_POST['Scampo']) ? $db->real_escape_string($_POST['Scampo']) : null;

$where = '';

if($Scampo != null) {
    $where = "WHERE (";

    $cont = count($columns);
    for($i = 0; $i < $cont; $i++){
        $where .= $columns[$i] . " LIKE '%". $Scampo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}


$sql = "SELECT " . implode(", ", $columns) . " 
FROM $table
$where";
$resultado = $db->query($sql);
$num_rows = $resultado->num_rows;

$html = "";


if($num_rows > 0) {
    while($row = $resultado->fetch_assoc()) {
       
        $html .= '<tr>';
            $html .= '<td class="table__item">'.$row['codigo'].'</td>';
            $html .= '<td class="table__item">'.$row['marca'].'</td>';
            $html .= '<td class="table__item">'.$row['descripcion'].'</td>';
            $html .= '<td class="table__item">'.$row['precio'].'</td>';
            $html .= '<td><img src='.substr($row['link'],3).' style="float:left; margin:15px;" width="100" height="100"/></td>';
            $html .= '<td><a class="btn btn-primary" href="">edit</a></td>';
            $html .= '<td><a href="" class="delete">delete</a></td>';

        $html .= '</tr>';
    }
}else {
    $html .= '<tr>';
    $html .= '<td colspan="7">Sin resultados</td>';
    $html .= '</tr>';
}


$jsonstring = json_encode($html);
    echo $jsonstring;

