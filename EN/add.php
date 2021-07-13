<div class="controlElement">
    <form>

        <table>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input onchange="this.style.borderColor = 'black'" id="name" name="name" type="text"></td>
            </tr>
            <tr>
                <td><label for="price">Price:</label></td>
                <td><input onchange="this.style.borderColor = 'black'" id="price" name="price" type="number"></td>
            </tr>
            <tr>
                <td><label for="image">Image:</label></td>
                <td><input onchange="this.style.borderColor = 'black'" id="image" name="file" type="file"></td>
            </tr>
            <tr>
                <td><label for="category">Category:</label></td>
                <td><input onchange="this.style.borderColor = 'black'" id="category" name="category" type="text"></td>
            </tr>
            <tr>
                <td><label for="transportWeight">Transport Weight</label></td>
                        <td><input onchange="this.style.borderColor = 'black'" id="transportWeight" name="transportWeight" type="number"></td>
            </tr>
            <tr>
                <td><label for="maximumWeight">Maximum Weight</label></td>
                <td><input onchange="this.style.borderColor = 'black'" id="maximumWeight" name="maximumWeight" type="number"></td>
            </tr>
            <tr>
                <td><label for="dimensions">Dimensions:</label></td>
                <td><input onchange="this.style.borderColor = 'black'" id="dimensions" name="dimensions" type="text"></td>
            </tr>
            <tr>
                <td><label for="orders">Number of orders:</label></td>
                <td><input onchange="this.style.borderColor = 'black'" id="orders" name="orders" type="number"></td>
            </tr>
            <tr>
                <td><label for="producer">Provider:</label></td>
                <td><input onchange="this.style.borderColor = 'black'" id="producer" name="producer" type="text"></td>
            </tr>
            <tr>
                <td><label for="description">Description:</label></td>
                <td><textarea onchange="this.style.borderColor = 'black'" id = "description" rows="10" cols="45"></textarea></td>
            </tr>
        </table>

    </form>

    <form>
        <table id = "myTable"></table>
        <br><br><br>
        <a class="sendData" onclick="addRow();">Add a field</a>

    </form>

    <br>
    <div style="text-align: right; margin-right: 10px;"><a class="sendData" onclick="sendData()">Done</a></div>
</div>

<script>
    let table = document.getElementById("myTable");
    let titles = [];
    let values = [];

    let tempTitles = 0;
    let tempValue = 0;
    let check = true;
    let addNewRow = false;

    let checkTemp = false;

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

            if(!checkTemp)
            {

            document.querySelectorAll(".titleJS").forEach(elem => tempTitles = elem.value);
            document.querySelectorAll(".valueJS").forEach(elem => tempValue = elem.value);
                titles.push(tempTitles);
                values.push(tempValue);
            }

            checkTemp = false;

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


        let id = 0;

        id = <?php
        require_once('Connector.php');
        foreach(getMySQL()->query('SELECT COUNT(*) FROM goods') as $row) echo $row['COUNT(*)'];
        ?> + 1;

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

        let goodId = "GoodID_" + id;

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

    function sendDataPHP(result){

        let result1 = "INSERT INTO `goods` (`id`, `name`, `price`, `image`, `category`, `transportWeight`, `maximumWeight`, `dimensions`, `orders`, `producer`, `description`, `goodID`) VALUES " +
            "('" + result.id + "', '" + result.name + "', '" + result.price + "', '" + result.image + "', '" + result.category + "', '" + result.transportWeight + "', '" + result.maximumWeight + "', '" + result.dimensions + "', '" + result.orders + "', '" + result.producer + "', '" + result.description + "', '" + result.goodId + "');"


        let table = "CREATE TABLE " + result.goodId + " ( GoodsID int, title varchar(255), value varchar(255));";

        let sql = result1 + "___" + table;

        if(addNewRow){
            sql += "___"
            for(let i = 0; i < titles.length-1; i++){
                sql += "INSERT INTO `" + result.goodId +  "` (`GoodsID`, `title`, `value`) VALUES ('" + i+1 + "', '" + result.titles[i] + "', '" + result.values[i] + "');___";
            }
            sql += "INSERT INTO `" + result.goodId +  "` (`GoodsID`, `title`, `value`) VALUES ('" + result.titles.length + "', '" + result.titles[result.titles.length-1] + "', '" + result.values[result.titles.length-1] + "');";
        }

        window.location.href="addPage.php?result=" + sql;
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
                checkTemp = true;
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