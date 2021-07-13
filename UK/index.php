<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>

    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <link href="../css/light.css" type="text/css" rel="stylesheet">
    <link href="../css/dark.css" type="text/css" rel="stylesheet">

</head>
<body class="light">
    <?php include 'header.php'; ?>

    <?php
    $result = $_GET['result'];

    if($result === "MinMax") {
        $min = $_GET['min'];
        $max = $_GET['max'];
    }

    ?>

    <div class="filter">
        <div class="blockLeft__filter">
            <img src="../img/image5.png">
            <span>Ціна: </span>
            <input type="number" placeholder="min" id = "min" value="<?php if($result === "MinMax") echo $min ?>" onchange="MinMax()">
            <span>-</span>
            <input type="number" placeholder="max" id = "max" value="<?php if($result === "MinMax") echo $max ?>" onchange="MinMax()">
        </div>
        <div class="blockRight__filter">
            <span>Сортувати за:</span>
            <div class="blocksInput">
                <span class="click <?php if($result === "sortByOrders") echo 'active'?>"
                      onclick="window.location.href = 'index.php' +
                      <?php
                        if($result === "sortByOrders") echo '\'\'';
                        else echo '\'?result=sortByOrders\'';
                      ?>;">Замовленням
                </span>
                <span>|</span>
                <span class="click <?php if($result === "sortByPrice") echo 'active'?>"
                      onclick="window.location.href = 'index.php' +
                      <?php
                      if($result === "sortByPrice") echo '\'\'';
                      else echo '\'?result=sortByPrice\'';
                      ?>;">Ціною
                </span>
            </div>
        </div>
    </div>

    <?php include 'mainContent.php'; ?>
    <?php include 'footer.php'; ?>
</body>

<script>
    let minElem = document.getElementById("min");
    let maxElem = document.getElementById("max");
    let checkMinMax = false;

    function MinMax(){
        checkMinMax = false;
        minElem.style.borderColor = "black";
        maxElem.style.borderColor = "black";

        if(minElem.value === "" && maxElem.value === ""){
            document.location.href = "index.php";
            return;
        }

        if(minElem.value < 0 || isNaN(parseInt(minElem.value)) ||  minElem.value[0] === "0") {
            minElem.style.borderColor = "red";
            checkMinMax = true;
        }
        if(maxElem.value < 0 || isNaN(parseInt(maxElem.value)) || maxElem.value[0] === "0"){
            maxElem.style.borderColor = "red";
            checkMinMax = true;
        }

        if(+minElem.value > +maxElem.value){
            minElem.style.borderColor = "red";
            maxElem.style.borderColor = "red";
            console.log("Yes");
            return;
        }

        if(checkMinMax) return;

        document.location.href = "index.php?result=MinMax&min=" + minElem.value + "&max=" + maxElem.value;
    }

    if(localStorage.getItem('theme') === null) localStorage.setItem('theme', 'light');
    document.querySelector("body").setAttribute("class", localStorage.getItem('theme'));

</script>

</html>


