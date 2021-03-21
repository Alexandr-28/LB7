<?php
    require_once 'db.php';

    $publ=$_GET['publ'];

    $expr1="SELECT `NAME`, `ISBN`, `PUBLISHER`, `YEAR`, `NUMBER` FROM `LITERATURE` WHERE `PUBLISHER`=:publ";
    $res1=$pdo->prepare($expr1);

    $res1->execute(['publ'=>$publ]);
    $result=$res1->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($result);
?>