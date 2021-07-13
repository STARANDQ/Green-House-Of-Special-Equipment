<?php

require_once('Connector.php');

$id = $_GET['id'];

if($id != "") {
    $sql = "SELECT * FROM goods where id = " . $id;

    if (!$result = getMySQL()->query($sql)) {
        echo "[ERROR] mainContent";
        exit;
    }


    echo '<div class="controlElement">';

    while ($elem = $result->fetch_assoc()) {
        echo '<form>

        <table>
            <tr>
                <td><label for="id">Id:</label></td>
                <td><input onchange="this.style.borderColor = \'black\'" id="id" name="id" type="text" value="' . $elem['id'] . '" readonly></td>
            </tr>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input onchange="this.style.borderColor = \'black\'" id="name" name="name" type="text" value="' . $elem['name'] . '" ></td>
            </tr>
            <tr>
                <td><label for="price">Price:</label></td>
                <td><input onchange="this.style.borderColor = \'black\'" id="price" name="price" type="number" value="' . $elem['price'] . '" ></td>
            </tr>
            <tr>
                <td><label for="image">Image:</label></td>
                <td><input onchange="this.style.borderColor = \'black\'" id="image" name="file" type="file" value="' . $elem['image'] . '" ></td>
            </tr>
            <tr>
                <td><label for="category">Category:</label></td>
                <td><input onchange="this.style.borderColor = \'black\'" id="category" name="category" type="text" value="' . $elem['category'] . '" ></td>
            </tr>
            <tr>
                <td><label for="transportWeight">Transport Weight: </label></td>
                <td><input onchange="this.style.borderColor = \'black\'" id="transportWeight" name="transportWeight" type="number" value="' . $elem['transportWeight'] . '" ></td>
            </tr>
            <tr>
                <td><label for="maximumWeight">Maximum Weight:</label></td>
                <td><input onchange="this.style.borderColor = \'black\'" id="maximumWeight" name="maximumWeight" type="number" value="' . $elem['maximumWeight'] . '" ></td>
            </tr>
            <tr>
                <td><label for="dimensions">Dimensions:</label></td>
                <td><input onchange="this.style.borderColor = \'black\'" id="dimensions" name="dimensions" type="text" value="' . $elem['dimensions'] . '" ></td>
            </tr>
            <tr>
                <td><label for="orders">Number of orders:</label></td>
                <td><input onchange="this.style.borderColor = \'black\'" id="orders" name="orders" type="number" value="' . $elem['orders'] . '" ></td>
            </tr>
            <tr>
                <td><label for="producer">Provider:</label></td>
                <td><input onchange="this.style.borderColor = \'black\'" id="producer" name="producer" type="text" value="' . $elem['producer'] . '" ></td>
            </tr>
            <tr>
                <td><label for="description">Description:</label></td>
                <td><textarea onchange="this.style.borderColor = \'black\'" id = "description" rows="10" cols="45" >' . $elem['description'] . '</textarea></td>
            </tr>
            <tr>
                <td><label for="id">GoodsID:</label></td>
                <td><input onchange="this.style.borderColor = \'black\'" id="goodId" name="goodId" type="text" readonly value="' . $elem['goodID'] . '" ></td>
            </tr>
        </table>

    </form>';

    }


    getMySQL()->close();

}
?>




    <form>
        <table id = "myTable">

        </table>
        <br><br><br>
        <a class="sendData" onclick="addRow();">Add a field</a>

    </form>

    <br>
    <br>
    <br>
<div>
    <div style="margin-left: 10px; display: inline-block; float: left;"><a class="sendData" style="background: #ff6060;" onclick="deleteObj()">Delete</a></div>
    <div style="margin-right: 10px; display: inline-block; float: right;"><a class="sendData" onclick="sendData()">Done</a></div>
</div>

<script>
    let table = document.getElementById("myTable");
    let titles = [];
    let values = [];

    let tempTitles = 0;
    let tempValue = 0;
    let check = true;
    let addNewRow = false;

    function addRow(){
        check = true;
        addNewRow = true;
        if(table.innerHTML === "") {
            table.innerHTML +=
                '<tr data-id="id_' + 0 + '"> \
                    <td><label>Title</label></td> \
                    <td><input onchange="this.style.borderColor = \'black\' " class="titleJS" type="text" placeholder="title"></td> \
                </tr> \
                <tr data-id="id_' + 0 + '"> \
                    <td><label>Value</label></td> \
                    <td><input onchange="this.style.borderColor = \'black\'" class="valueJS" type="text" placeholder="value"></td>\
                </tr>\
                <tr data-id="id_' + 0 + '"> \
                    <td colspan="2" class="deleteBlock"><a onclick="deleteELem(' + 0 + ')">remove</a><hr></td> \
                </tr>\n';
        }else
        {

            document.querySelectorAll(".titleJS").forEach(elem => {
                if(!elem.value) {
                    elem.style.borderColor = "red";
                    check = false;
                }
            });

            document.querySelectorAll(".valueJS").forEach(elem => {
                if(!elem.value) {
                    elem.style.borderColor = "red";
                    check = false;
                }
            });

            if(!check) return;


                document.querySelectorAll(".titleJS").forEach(elem => tempTitles = elem.value);
                document.querySelectorAll(".valueJS").forEach(elem => tempValue = elem.value);
                titles.push(tempTitles);
                values.push(tempValue);

            table.innerHTML = "";

            for(let i = 0; i < titles.length; i++){
                table.innerHTML +=
                    '<tr data-id="id_' + i + '"> \
                        <td><label>Title</label></td> \
                        <td><input value="' + titles[i] + '" class="titleJS" type="text" placeholder="title"></td> \
                    </tr> \
                    <tr data-id="id_' + i + '"> \
                        <td><label>Value</label></td> \
                        <td><input value="' + values[i] + '" class="valueJS" type="text" placeholder="value"></td>\
                    </tr>\
                    <tr data-id="id_' + i + '"> \
                    <td colspan="2" class="deleteBlock"><a onclick="deleteELem(' + i + ')">remove</a><hr></td> \
                    </tr>\n';
            }
            table.innerHTML +=
                '<tr data-id="id_' + titles.length + '"> \
                    <td><label>Title</label></td> \
                    <td><input class="titleJS" type="text" placeholder="title"></td> \
                </tr> \
                <tr data-id="id_' + titles.length + '"> \
                    <td><label>Value</label></td> \
                    <td><input class="valueJS" type="text" placeholder="value"></td>\
                </tr>\
                <tr data-id="id_' + titles.length + '"> \
                    <td colspan="2" class="deleteBlock"><a onclick="deleteELem(' + titles.length + ')">remove</a><hr></td> \
                </tr>\n';
        }
    }

    function sendData(){

        if(document.querySelectorAll("input").value === "___")
            document.querySelectorAll("input").value.replaceAll("___", " ");


        let id = document.getElementById("id").value;

        let name  = document.getElementById("name").value;
        let price  = document.getElementById("price").value;

        let image = document.getElementById("image").value;

        image = image.replaceAll("C:\\fakepath\\", "");


        let category = document.getElementById("category").value;
        let transportWeight = document.getElementById("transportWeight").value;
        let maximumWeight = document.getElementById("maximumWeight").value;
        let dimensions = document.getElementById("dimensions").value;
        let orders = document.getElementById("orders").value;
        let producer = document.getElementById("producer").value;
        let description = document.getElementById("description").value;

        let goodId = document.getElementById("goodId").value;

        titles = [];
        values = [];

        document.querySelectorAll(".titleJS").forEach(elem => (elem.value) ? titles.push(elem.value) : console.log("error title"));
        document.querySelectorAll(".valueJS").forEach(elem => (elem.value) ? values.push(elem.value) : console.log("error title"));

        if(!checkValidation(name, price, image, category, transportWeight, maximumWeight,
            dimensions, orders, producer, description)) return;


        let result = {
            id: id,
            name: name,
            price: price,
            image: image,
            category: category,
            transportWeight: transportWeight,
            maximumWeight: maximumWeight,
            dimensions: dimensions,
            orders: orders,
            producer: producer,
            description: description,
            goodId: goodId,
            titles: titles,
            values: values
        }

        console.log(result);

        sendDataPHP(result);
    }


    function deleteObj(){
        //
        //DROP TABLE table_name;

        let id = document.getElementById("id").value;
        let goodId = document.getElementById("goodId").value;

        let sql = "DELETE FROM `goods` WHERE id = " + id + ";";
        sql += "___"
        sql += "DROP TABLE " + goodId + ";"

        window.location.href="editPage.php?result=" + sql;
    }

    function sendDataPHP(result){

        let result1 = 'UPDATE `goods` SET ' +
            '`name` = \'' + result.name + '\', ' +
            '`price` = \'' + result.price + '\', ' +
            '`image` = \'' + result.image + '\', ' +
            '`category` = \'' + result.category + '\', ' +
            '`transportWeight` = \'' + result.transportWeight + '\', ' +
            '`maximumWeight` = \'' + result.maximumWeight + '\', ' +
            '`dimensions` = \'' + result.dimensions + '\', ' +
            '`orders` = \'' + result.orders + '\', ' +
            '`producer` = \'' + result.producer + '\', ' +
            '`description` = \'' + result.description + '\' ' +
            'WHERE `id` = \'' + result.id + '\';';

        sql = result1;

        if(addNewRow){
            sql += "___"
            for(let i = 0; i < titles.length-1; i++){
                sql += "INSERT INTO `" + result.goodId +  "` (`GoodsID`, `title`, `value`) VALUES ('" + i+1 + "', '" + result.titles[i] + "', '" + result.values[i] + "');___";
            }
            sql += "INSERT INTO `" + result.goodId +  "` (`GoodsID`, `title`, `value`) VALUES ('" + result.titles.length + "', '" + result.titles[result.titles.length-1] + "', '" + result.values[result.titles.length-1] + "');";
        }

        window.location.href="editPage.php?result=" + sql;
    }


    function checkValidation(name, price, image, category, transportWeight, maximumWeight,
                             dimensions, orders, producer, description){
        if(!name){
            document.getElementById("name").style.borderColor = "red";
            return false;
        }
        if(!price){
            document.getElementById("price").style.borderColor = "red";
            return false;
        }
        if(!image){
            document.getElementById("image").style.borderColor = "red";
            return false;
        }
        if(!category){
            document.getElementById("category").style.borderColor = "red";
            return false;
        }
        if(!transportWeight){
            document.getElementById("transportWeight").style.borderColor = "red";
            return false;
        }
        if(!maximumWeight){
            document.getElementById("maximumWeight").style.borderColor = "red";
            return false;
        }
        if(!dimensions){
            document.getElementById("dimensions").style.borderColor = "red";
            return false;
        }
        if(!orders){
            document.getElementById("orders").style.borderColor = "red";
            return false;
        }
        if(!producer){
            document.getElementById("producer").style.borderColor = "red";
            return false;
        }
        if(!description){
            document.getElementById("description").style.borderColor = "red";
            return false;
        }

        return true;
    }


    function deleteELem(id){
        titles = [];
        values = [];
        document.querySelectorAll(".titleJS").forEach(elem => (elem.value) ? titles.push(elem.value) : console.log("error title"));
        document.querySelectorAll(".valueJS").forEach(elem => (elem.value) ? values.push(elem.value) : console.log("error title"));
        document.querySelectorAll("tr").forEach(elem => {
            if(elem.getAttribute("data-id") === ("id_" + id)) {
                elem.remove();
                values.splice(id, 1);
                titles.splice(id, 1);
            }
        });
    }

</script>

<?php

require_once('Connector.php');
$result = $_GET['result'];

$check = true;

$sql = explode("___", $result);


for ($i = 0; $i < count($sql); $i++) {
    if (getMySQL()->query($sql[$i]) === TRUE) ;
    else {
        if($result != "") echo "ERROR: " . $sql[$i];
        $check = false;
    }
}

if ($check) echo "<script>window.location.href='indexAdmin.php'</script>";

getMySQL()->close();

?>