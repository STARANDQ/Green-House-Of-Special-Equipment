<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <link href="../css/light.css" type="text/css" rel="stylesheet">
    <link href="../css/dark.css" type="text/css" rel="stylesheet">
</head>
<body class="light">
<?php include 'header.php'; ?>
<div class="infoCompany">
    Ми- компанія постачання техніки " ....". Працюємо на ринку з 2016 року.
Наші можливості: здача в оренду промислової техніки, постачання послуг (надання техпідтримки господарям сільського господарства).
Підприємці, з якими ми працюємо–сертифіковані власники найкращих комплектуючих та запчастин, більшість із них відомі в Західній Європі.
Підтримка нашої компанії забезпечена найбільш відомими брендами-постачальниками та перевірена численними документами.
За ці 5 років ми зуміли проявити  себе на дуже високому рівні, адже якісне обслуговування клієнтів для нас завжди на першому місці. Наша компанія нагороджена премією "VillageON" як постачальник найбільш доброякісних послуг.
</div>
<?php include 'footer.php'; ?>
</body>
<script>
    if(localStorage.getItem('theme') === null) localStorage.setItem('theme', 'light');
    document.querySelector("body").setAttribute("class", localStorage.getItem('theme'));
</script>
</html>