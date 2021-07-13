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

<h1 class="adminControlTitle">Панель Адміністратора</h1>
<div class="controlTable">
    <div class="blockLeft__controlTable">
        <table>
            <tr>
                <td>Пошук за категорією: </td>
                <td><input type="text" id = "category"></td>
            </tr>
            <tr>
                <td>Пошук за айді: </td>
                <td><input type="text" id="id"></td>
            </tr>
            <tr>
                <td>Пошук за назвою: </td>
                <td><input type="text" id="name"></td>
            </tr>
        </table>
    </div>
        <div class="blockRight__controlTable">
            <a class="sendData" onclick="searchElem()">Пошук</a>
            <br><br>
            <a class="sendData" onclick="window.location.href='addPage.php'">Добавити</a>
        </div>
    </div>

<?php

require_once('Connector.php');
require_once('element.php');

$linkCheck = $_GET['result'];
$id = $_GET['id'];

echo $id;
$counter = 0;

if($linkCheck == null) $sql[0] = "SELECT * FROM goods";
else $sql = explode("___", $linkCheck);

if($sql[1] != null) echo '<script> document.getElementById("category").value = ' . $sql[1] . '</script>';
if($sql[2] != null) echo '<script> document.getElementById("id").value = ' . $sql[2] . '</script>';
if($sql[3] != null) echo '<script> document.getElementById("name").value = ' . $sql[3] . '</script>';

if (!$result = getMySQL()->query($sql[0])) {
    echo $sql[0];
    echo "[ERROR] mainContent";
    exit;
}


echo '<div class="content">';
while ($elem = $result->fetch_assoc()) {
    echo getElement($elem['id'], $elem['name'], $elem['price'], $elem['image'], $elem['category'], $elem['transportWeight'], $elem['maximumWeight'], $elem['dimensions'], $elem['producer'], $elem['description']);
    $counter++;
}

echo '</div>';

getMySQL()->close();

if($counter === 0) echo "<h2 class='notFound'>Не знайдено жодного результату</h2>";

?>


<?php include 'footer.php'; ?>


</body>


<script>

    function searchElem(){
        let category = document.getElementById("category");
        let id = document.getElementById("id");
        let name = document.getElementById("name");

        let categoryValue = document.getElementById("category").value;
        let idValue = document.getElementById("id").value;
        let nameValue = document.getElementById("name").value;

        if(!categoryValue && !idValue && !nameValue){
            window.location.href = "indexAdmin.php";
            return;
        }else{
            category.style.borderColor = "black";
            id.style.borderColor = "black";
            name.style.borderColor = "black";
        }

        let sql = "SELECT * FROM goods WHERE ";

        if(categoryValue && !idValue && !nameValue) sql += "category = '" + categoryValue + "'";

        if(!categoryValue && idValue && !nameValue) sql += "id = '" + idValue + "'";

        if(!categoryValue && !idValue && nameValue) sql += "name = '" + nameValue + "'";

        if(categoryValue && idValue && !nameValue) sql += "category = '" + categoryValue + "' AND " + "id = '" + idValue + "'";

        if(categoryValue && !idValue && nameValue) sql += "category = '" + categoryValue + "' AND " + "name = '" + nameValue + "'";

        if(!categoryValue && idValue && nameValue) sql += "id = '" + idValue + "' AND " + "name = '" + nameValue + "'";

        if(categoryValue && idValue && nameValue) sql += "category = '" + categoryValue + "' AND " + "id = '" + idValue + "' AND " + "name = '" + nameValue + "'";

        sql += ";";

        let value = "";

        if(categoryValue) value += "___" + categoryValue;
        else value += "___" + "null";

        if(idValue) value += "___" + idValue;
        else value += "___" + "null";

        if(nameValue) value += "___" + nameValue;
        else value += "___" + "null";

        window.location.href = "indexAdmin.php?result=" + sql + value;

    }


    if(localStorage.getItem('theme') === null) localStorage.setItem('theme', 'light');
    document.querySelector("body").setAttribute("class", localStorage.getItem('theme'));
</script>

</html>


