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
    <link href="../css/card.css" type="text/css" rel="stylesheet">

</head>
<script>
    function url() {
        let arr = JSON.parse(localStorage.getItem("id"));
        let result = "";

        if(arr === null) arr = [];

        if(arr.length !== 0) {
            for (let i = 0; i < arr.length - 1; i++)
                result += arr[i].id + "___";

            result += arr[arr.length - 1].id;

        }

        window.location.href = "card.php?result=" + result;

    }
</script>
<body class="dark">
<script>
    if(localStorage.getItem('theme') === null) localStorage.setItem('theme', 'light');
    document.querySelector("body").setAttribute("class", localStorage.getItem('theme'));
</script>
    <?php include 'header.php'; ?>


    <div class="content_card">
        <h1 class="content_card__title">Card</h1>
    <?php
    $resultId = $_GET['result'];
    $card = $_GET['card'];

    if($resultId === null && $card === null) echo "<script>url()</script>";
    if($resultId === "" && $card === null){
        exit;
    }

    require_once('Connector.php');

    if($card != null){
        $id = explode("___", $card);

    for ($i = 0; $i < count($id); $i++) {
        $sql = "UPDATE goods set orders = orders+1 WHERE id = " . $id[$i];

        if (getMySQL()->query($sql) === TRUE);
        else {
            echo "ERROR: " . $id[$i];
            echo "<br/>";
            echo $sql;
        }

    }
        echo "<script>window.location.href = 'index.php'</script>";
        exit;
    }

    $id = explode("___", $resultId);


    require_once('cardAdd.php');

    for ($i = 0; $i < count($id); $i++) {
        $sql = "SELECT * FROM goods WHERE id = " . $id[$i];

        if (!$result = getMySQL()->query($sql)) {
            echo "[ERROR] card";
            exit;
        }

        while ($elem = $result->fetch_assoc()) {
            echo setCard($elem['id'], $elem['name'], $elem['price'], $elem['image'], $elem['category'], $elem['transportWeight'], $elem['maximumWeight'], $elem['dimensions'], $elem['producer'], $elem['description']);
        }
    }

    ?>

    </div>

    <div class="footerCard">
        <div style="margin-right: 10px; display: inline-block; float: left;"><a class="sendData" onclick="setOrder()">Order</a></div>
        <div style="margin-left: 10px; display: inline-block; float: right;">
            <label for="generalPrice">Total price: </label>
            <input id="generalPrice" readonly>
        </div>
    </div>



    <?php include 'footer.php'; ?>
</body>
<script>
    let arrTemp = [];
    let arr = [];
    function deleteItemCard(id){
        console.log("id: " + id);
        arrTemp = JSON.parse(localStorage.getItem("id"));

        arrTemp.forEach(elem => { if(elem.id !== id) arr.push({id:elem.id}) });

        localStorage.clear();
        localStorage.setItem('id', JSON.stringify(arr));
        url();
    }


    //CardElem
    let generalSum = 0;
    sum();
    function sum() {
        generalSum = 0;
        document.querySelectorAll("input[data-type=amount]").forEach(elem => {
                let elemPrice = document.getElementById("priceAll_" + elem.getAttribute("data-id"));
                elemPrice.setAttribute("value", elem.value * elemPrice.getAttribute("data-price"));
                generalSum += elem.value * elemPrice.getAttribute("data-price");
            }
        );
        document.getElementById("generalPrice").setAttribute("value", generalSum);
    }


    function setOrder(){
        console.log(generalSum);


        let arr = JSON.parse(localStorage.getItem("id"));
        let result = "";

        if(arr === null) arr = [];

        if(arr.length !== 0) {
            for (let i = 0; i < arr.length - 1; i++)
                result += arr[i].id + "___";

            result += arr[arr.length - 1].id;

        }

        localStorage.removeItem('id');
        window.location.href = "card.php?card=" + result;
    }

</script>
</html>


