<?php

    $search = '%'.trim($_POST['search']).'%';
    require_once("baza.php");
    $connection = new mysqli("localhost", $dbuser, $dbpassword, $dbname);
    $query = $connection->prepare("SELECT * FROM uslugi WHERE nazwa LIKE ? ORDER BY nazwa");
    $query->bind_param('s', $search);
    $query->execute();
    $query = $query->get_result();
    while($service = $query->fetch_assoc()) {
        echo '
            <div>
                <p>'.mb_convert_case($service["nazwa"], MB_CASE_TITLE, "UTF-8").'</p>
                <span>'.($service["cena"] != "0" ? $service["cena"].'&nbsp;zł' : "Cena Do Ustalenia (Tel. 502 947 181)").'</span>
            </div>
        ';
    }
    $connection->close();

?>