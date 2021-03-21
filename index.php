<?php 
    require_once 'db.php';
    $publishers=array();
    $years=array();
    $authors=array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="ajax.js"></script>
    <script src="ajax2.js"></script>
    <script src="ajax3.js"></script>
    <title>Document</title>
    <style>
        .form{
            border: 1px solid black;
            margin-bottom:7px;
            font-size: 20px;
        }
        table{
            border-collapse: collapse;
            font-size: 20px;
            margin-bottom:7px;
        }

        td,th{
            border: 1px solid black;
        }

        th{
            background: #007dff;
            color:white;
        }
    </style>
</head>
<body>
    <?php
        $expr2="SELECT `PUBLISHER` FROM `LITERATURE`";
        $expr3="SELECT `YEAR` FROM `LITERATURE`";
        $expr4="SELECT `NAME` FROM `AUTHOR`"; 

        $res2=$pdo->query($expr2);
        $res3=$pdo->query($expr3);
        $res4=$pdo->query($expr4);
        
        while($row=$res2->fetch()){
           array_push($publishers, $row['PUBLISHER']);
        }
        
        while($row=$res3->fetch()){
            array_push($years, $row['YEAR']);
        }

        while($row=$res4->fetch()){
            array_push($authors, $row['NAME']);
        }

        $publishers=array_unique($publishers);
        $years=array_unique($years);
    ?>

    <div class="form">
        <span>Поиск по издательству</span>
        <p>
            <label for="publ">Выберите название: </label>
            <select name="publ" id="publ">
            <?php
                for($i=0;$i<count($publishers);$i++){
                    if($publishers[$i]==""){continue;}
                    echo "<option value='".$publishers[$i]."'>".$publishers[$i]."</option>";
                }
            ?>
            </select>
            <br>
            <button type="button" onclick="btn1_click()">Поиск1</button>
        </p>
    </div>

    <div class="res1"></div>


    <div class="form">
        <span>Поиск по указанному периоду</span>
        <p>
            <label for="yr1">Введите времменой период: </label>
            <span>С</span>
            <select name="yr1" id="yr1">
            <?php
                sort($years);
                for($i=0;$i<count($years);$i++){
                    echo "<option value='".$years[$i]."'>".$years[$i]."</option>";
                }
            ?>
            </select>
            <span>&nbsp;По</span>
            <select name="yr2" id="yr2">
            <?php
                rsort($years);
                for($i=0;$i<count($years);$i++){
                    echo "<option value='".$years[$i]."'>".$years[$i]."</option>";
                }
            ?>
            </select>
            <br>
            <button type="button" onclick="btn2_click()">Поиск2</button>
        </p>
    </div>

    <div class="res2"></div>
    

    <div class="form">
        <span>Поиск по автору</span>  
        <p>
            <label for="auth">Выберите автора: </label>
            <select name="auth" id="auth">
            <?php
                for($i=0;$i<count($authors);$i++){
                    echo "<option value='".$authors[$i]."'>".$authors[$i]."</option>";
                }
            ?>
            </select>
            <br>
            <button type="button" onclick="btn3_click()">Поиск3</button>
        </p> 
    </div>

    <div class="res3"></div>
   

</body>
</html>