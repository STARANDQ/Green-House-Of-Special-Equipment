<?php

require_once('./Connector.php');
require_once('element.php');

$sql = "SELECT * FROM goods";

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

