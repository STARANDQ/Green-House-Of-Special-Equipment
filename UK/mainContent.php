<?php

require_once('Connector.php');
require_once('elementMain.php');

if($result === "sortByOrders") $sql = "SELECT * FROM goods ORDER BY orders";
else if($result === "sortByPrice") $sql = "SELECT * FROM goods ORDER BY price";
else if($result === "MinMax") $sql = "SELECT * FROM goods WHERE price > " . $min . " AND price < " . $max . ";";
else $sql = "SELECT * FROM goods";

if (!$result = getMySQL()->query($sql)) {
    echo "[ERROR] mainContent";
    exit;
}


echo '<div class="content">';

while ($elem = $result->fetch_assoc()) {
    echo getElement($elem['id'], $elem['name'], $elem['price'], $elem['image'], $elem['category'], $elem['transportWeight'], $elem['maximumWeight'], $elem['dimensions'], $elem['producer'], $elem['description']);
}

echo '</div>';

getMySQL()->close();

