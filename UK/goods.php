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

    $id = $_GET['id'];

    require_once('infoElem.php');
    require_once('Connector.php');

    $sql = "SELECT * FROM goods WHERE id = " . $id;

    if (!$result = getMySQL()->query($sql)) {
        echo "[ERROR] goods";
        exit;
    }


    echo '<div class="infoGoods">';

    while ($elem = $result->fetch_assoc()) {
        echo getInfoGoods($elem['id'], $elem['name'], $elem['price'], $elem['image'], $elem['category'], $elem['transportWeight'], $elem['maximumWeight'], $elem['dimensions'], $elem['producer'], $elem['description'], $elem['goodID'], $elem['orders']);
    }

    echo '</div>';

    getMySQL()->close();

    ?>

    <?php include 'footer.php'; ?>
</body>

<script>
    let arr = [];
    let check = true;
    function addCard(id){

        check = true;
        arr = JSON.parse(localStorage.getItem("id"));
        if(arr === null) arr = [];

        arr.forEach(elem => { if(elem.id === id) check = false; });

        if(!check) return;

        arr.push({id});
        localStorage.setItem('id', JSON.stringify(arr));
    }

    if(localStorage.getItem('theme') === null) localStorage.setItem('theme', 'light');
    document.querySelector("body").setAttribute("class", localStorage.getItem('theme'));
</script>

</html>


