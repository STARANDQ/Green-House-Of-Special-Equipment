<?php

function getInfoGoods($id, $name, $price, $image, $category, $transportWeight, $maximumWeight, $dimensions, $producer, $description, $goodID, $orders)
{
    $generalResult = '
    <div class="image">
        <img src = "../img/element/' . $image . '">
    </div>
            <p class="name font">' . $name . '</p>
            <p class="name font">Features</p>
            <div class="information">
            <p><b> Category: </b > ' .  $category . ' </p>
            <p><b> Transport weight: </b > ' .  $transportWeight . ' </p>
            <p><b> Maximum weight: </b > ' .  $maximumWeight . ' </p>
            <p><b> Dimensions: </b > ' . $dimensions . ' </p>
            <p><b> Producer: </b > ' . $producer . ' </p>
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

    $generalResult .= "<p class='name font'>Description</p>";

    $generalResult .= "<p class='font' style='font-size: 20px;'>" . $description . " </p>";

    $generalResult .= "</div>";

    $generalResult .= '
    <div style="display: flow-root">
    <div style="margin-left: 20px; display: inline-block; float: left;"><a class="sendData" href = "../UK/index.php">Back</a></div>
    <div style="margin-right: 20px; display: inline-block; float: right;"><a class="sendData" onclick = "addCard(' . $id .')" href = "card.php">Order</a></div>
    </div>
    <p class="price">'. $price .' UAH / hour</p>
    <br/><br/><br/>
    <p class="orders">all '. $orders;

    if($orders > 0 && $orders < 2) $generalResult.= ' order';
    else $generalResult .= ' orders';

    $generalResult .= '</p>';

    return $generalResult;
}