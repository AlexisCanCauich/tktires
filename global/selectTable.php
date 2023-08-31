<?php

require'database.php';

$selecd = isset($_POST['selectOption']) ? $db->real_escape_string($_POST['selectOption']) : null;

if($selecd = 2){
    
    $columns = ['codigo','marca','descripcion','precio','link'];
    $table = "MHankook";
    
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
                $html .= '<td>'.$row['codigo'].'</td>';
                $html .= '<td>'.$row['marca'].'</td>';
                $html .= '<td>'.$row['descripcion'].'</td>';
                $html .= '<td>'.$row['precio'].'</td>';
                $html .= '<td><img src='.substr($row['link'],3).' style="float:left; margin:15px;" width="100" height="100"/></td>';
    
            $html .= '</tr>';
        }
    }else {
        $html .= '<tr>';
        $html .= '<td colspan="7">Sin resultados</td>';
        $html .= '</tr>';
    }
    
    
    $jsonstring = json_encode($html);
        echo $jsonstring;
}



