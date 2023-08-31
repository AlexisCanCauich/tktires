<?php

    include('database.php');

    $query = "SELECT * FROM MTires";
    $result = mysqli_query($db, $query);

    $Scampo = isset($_POST['Scampo']) ? $db->real_escape_string($_POST['Scampo']) : null;

    $where = '';

    if($Scampo != null) {
        $where = "WHERE (";

        $cont = count($query);
        for($i = 0; i < $cont; $i++){
            $where .= $query[i] . " LIKE '%". $Scampo . "%' OR ";
        }
        $where = substr_replace($where, "", -3);
        $where .= ")";
    }

    if(!$result){
        die('Query error' . mysqli_error($db));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'brand' => $row['brand'],
            'model' => $row['model'],
            'price' => $row['price'],
            'id_tire' => $row['id_tire']
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;

?>


