<?php


if(isset($_POST['submit'])){


    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $transportWeight = $_POST['transportWeight'];
    $maximumWeight = $_POST['maximumWeight'];
    $dimensions = $_POST['dimensions'];
    $orders = $_POST['orders'];
    $producer = $_POST['producer'];
    $description = $_POST['description'];
    $goodID = $_POST['goodID'];


    require_once('../Connector.php');

    $db = "goods";

    $sql = "INSERT INTO MyGuests (firstname, lastname, email, id)
VALUES ('John', 'Doe', 'john@example.com', 34)";

    if (mysqli_query(getMySQL(), $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error(getMySQL());
    }

    mysqli_close(getMySQL());


    $sql = "INSERT INTO" . $db . "values (" . $id . ", " . $name . ", " . $price . ", " . $category . ", " . $transportWeight . ", " . $maximumWeight . ", " . $dimensions . ", " . $orders . ", " . $producer . ", " . $description . ", " . $goodID . ");";


    if (mysqli_query(getMySQL(), $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error(getMySQL());
    }
    mysqli_close(getMySQL());
}

?>

<form method="POST">
    <table>
        <tr>
            <td>Id</td>
            <td><input name = "id" type="text" required></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input name = "name" type="text" required></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input name = "price" type="number" required></td>
        </tr>
        <tr>
            <td>Category</td>
            <td><input name = "category" type="text" required></td>
        </tr>
        <tr>
            <td>Transport weight</td>
            <td><input name = "transportWeight" type="number" required></td>
        </tr>
        <tr>
            <td>Maximum weight</td>
            <td><input name = "maximumWeight" type="number" required></td>
        </tr>
        <tr>
            <td>Dimensions</td>
            <td><input name = "dimensions" type="text" required></td>
        </tr>
        <tr>
            <td>Orders</td>
            <td><input name = "orders" type="number" required></td>
        </tr>
        <tr>
            <td>Producer</td>
            <td><input name = "producer" type="text" required></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input name="description" type="text" required></td>
        </tr>
        <tr>
            <td>goodID</td>
            <td><input name="goodID" type="text" required></td>
        </tr>
    </table>
    <button type="submit">Add</button>
</form>

