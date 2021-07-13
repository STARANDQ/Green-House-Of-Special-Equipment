<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <link href="../css/light.css" type="text/css" rel="stylesheet">
    <link href="../css/dark.css" type="text/css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="dark">
    <?php include 'header.php'; ?>
    <h1 class="adminControlTitle">Edit</h1>
    <?php include 'edit.php'; ?>
    <?php include 'footer.php'; ?>
</body>
<script>
    if(localStorage.getItem('theme') === null) localStorage.setItem('theme', 'light');
    document.querySelector("body").setAttribute("class", localStorage.getItem('theme'));
</script>
</html>