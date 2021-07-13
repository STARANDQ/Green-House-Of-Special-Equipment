<?php

function getInfoGoods($id, $name, $price, $image, $category, $transportWeight, $maximumWeight, $dimensions, $producer, $description, $goodID, $orders)
{
    $generalResult = '
    <div class="image">
        <img src = "../img/element/' . $image . '">
    </div>
            <p class="name font">' . $name . '</p>
            <p class="name font">Характеристики</p>
            <div class="information">
            <p><b> Категорія: </b > ' .  $category . ' </p>
            <p><b> Вага транспорту: </b > ' .  $transportWeight . ' </p>
            <p><b> Максимальна вага: </b > ' .  $maximumWeight . ' </p>
            <p><b> Габарити: </b > ' . $dimensions . ' </p>
            <p><b> Продюсер: </b > ' . $producer . ' </p>
            ';

    require_once('Connector.php');

    $sql = "SELECT * FROM " . $goodID . ";";

    if (!$result = getMySQL()->query($sql)) {
        echo "[ERROR] infoElem";
        exit;
    }


    while ($elem = $result->fetch_assoc()) {
        $generalResult .="<p><b>" . $elem['title'] . ": </b>" . $elem['value'] . "</p>";
    }

    getMySQL()->close();

    $generalResult .= "<p class='name font'>Опис</p>";

    $generalResult .= "<p class='font' style='font-size: 20px;'>" . $description . " </p>";

    $generalResult .= "</div>";

    $generalResult .= '
    <div style="display: flow-root">
    <div style="margin-left: 20px; display: inline-block; float: left;"><a class="sendData" href = "../UK/index.php">Повернутись</a></div>
    <div style="margin-right: 20px; display: inline-block; float: right;"><a class="sendData" onclick = "addCard(' . $id .')" href = "card.php">Замовити</a></div>
    </div>
    <p class="price">'. $price .' грн/день</p>
    <br/><br/><br/>
    <p class="orders">Всього '. $orders;

    if($orders > 0 && $orders < 5) $generalResult.= ' замовленя';
    else $generalResult .= ' замовлень';

    $generalResult .= '</p>';

    return $generalResult;
}