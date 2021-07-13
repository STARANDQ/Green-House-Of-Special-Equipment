<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>

    <link href="../css/style.css" type="text/css" rel="stylesheet">
    <link href="../css/light.css" type="text/css" rel="stylesheet">
    <link href="../css/dark.css" type="text/css" rel="stylesheet">
    <link href="../css/contact-style.css" type="text/css" rel="stylesheet">

</head>
<body class="light">

<?php include 'header.php'; ?>

    <div class="content">
            <div class="content__contact">
                <p class="content__contact__1">ЗВ'ЯЖІТЬСЯ З НАМИ</p>
                <p class="content__contact__2">вул. Така-то м. Таке-то</p>
                <p class="content__contact__2">info@mysite.com</p>
                <p class="content__contact__2">+38 099 456-78-90</p>
            </div>
            <form class="content__form">
                <input class="content__form__neta" type="text" placeholder="Ім'я" required>
                <input class="content__form__neta" type="email" placeholder="Ел. пошту" required>
                <input class="content__form__neta" type="tel" placeholder="Телефон" required>
                <input class="content__form__neta" type="text" placeholder="Адрес" required>
                <input class="content__form__theme" type="text" placeholder="Тема" required>
                <textarea class="content__form__message" placeholder="Добавьте повідомлення..." required></textarea>
                <button class="content__form__button">Відправити</button>
            </form>
        </div>


    <?php include 'footer.php'; ?>
</body>
<script>
    if(localStorage.getItem('theme') === null) localStorage.setItem('theme', 'light');
    document.querySelector("body").setAttribute("class", localStorage.getItem('theme'));
</script>
</html>


