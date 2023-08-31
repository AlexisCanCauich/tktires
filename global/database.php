<?php
    $db = new mysqli('23.229.183.99', 'T-tires', 'CTKtires', 'tk-tires');
    //$db = new mysqli('localhost', 'root', '', 'tkfest');
    if($db->connect_errno){
        echo "El sitio web esta experimentando problemas";
    } 
?>