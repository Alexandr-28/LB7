<?php
    require_once 'db.php';

    $t1=$_GET['yr1'];
    $t2=$_GET['yr2'];

    $expr2="SELECT b.NAME, b.YEAR, a.IMG FROM `RESOURSE` a JOIN `LITERATURE` b ON a.Id=b.FID_RES WHERE b.YEAR BETWEEN :t1 AND :t2";

    $res2=$pdo->prepare($expr2);

    $res2->execute(['t1'=>$t1, 't2'=>$t2]);


    echo "<table><tr><th>Name</th><th>Year</th><th>Img</th></tr>";

    while($row=$res2->fetch()){
        echo "<tr>";
        echo "<td>".$row['NAME']."</td>";
        echo "<td>".$row['YEAR']."</td>";
        echo '<td>' .'<img src = "data:image/png;base64,'.base64_encode($row['IMG']) .'"heigth = "1575px" width="100px" />'.'</td>';
        echo "</tr>";
    }
    echo "</table>";
?>