<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="css/light.css" type="text/css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">

    <link href="css/dark.css" type="text/css" rel="stylesheet">

</head>
<body>
    <?php include 'block/header.php'; ?>

    <div class="filter">

    </div>

    <div class="line" style="margin-top: 150px;"></div>

    <?php include 'block/mainContent.php'; ?>

    <br>
    <div class="line"></div>
    <div class="pages"></div>

    <?php include 'block/footer.php'; ?>
</body>

<script>
    let elements = document.querySelectorAll(".descriptionJS");
    let result = "";
    elements.forEach(elem => {
        result = "";
        if(elem.textContent.length >= 500)
            for (let i = 0; i < 500; i++) {
                result += elem.textContent[i];
            }
        result += "...";

        elem.innerHTML = result;
    })

</script>

</html>


