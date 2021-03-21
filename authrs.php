<?php
    header('Content-Type: text/xml');
    require_once 'db.php';
    $auth=$_GET['auth'];

    $expr3="SELECT a.NAME FROM `LITERATURE` a JOIN `BOOK_AUTHRS` b ON a.Id=b.FID_BOOK JOIN `AUTHOR` c ON b.FID_AUTH=c.Id WHERE c.NAME=:author";

       
    $res3=$pdo->prepare($expr3);
    $res3->execute(['author'=>$auth]);
    $result=$res3->fetchAll();
    $count=$res3->rowCount();

    echo '<?xml version="1.0" encoding="utf8" ?>';
?>
<results>
    <?php
        for($i=0;$i<$count;$i++){
            echo "<authors>".$result[$i][0]."</authors>";
        }
    ?>
</results>