<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $rowCounter = $_POST['rowCounter'];
    $tableName = $_POST['tableName'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $sign = $_POST['sign'];
    $increment = $_POST['increment'];
    $key = $_POST['key'];

    // sql to create table

    $sql = "CREATE TABLE $tableName ()";

    if ($conn->query($sql) === TRUE) {
        echo "Table $tableName created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();