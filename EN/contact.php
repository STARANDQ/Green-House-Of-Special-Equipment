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
<body class="dark">

<?php include 'header.php'; ?>

    <div class="content">
            <div class="content__contact">
                <p class="content__contact__1">CONTACT US</p>
                <p class="content__contact__2">street So-so m. So-so</p>
                <p class="content__contact__2">info@mysite.com</p>
                <p class="content__contact__2">+38 099 456-78-90</p>
            </div>
            <form class="content__form">
                <input class="content__form__neta" type="text" placeholder="Name" required>
                <input class="content__form__neta" type="email" placeholder="Email" required>
                <input class="content__form__neta" type="tel" placeholder="Phone" required>
                    <input class="content__form__neta" type="text" placeholder="Address" required>
                <input class="content__form__theme" type="text" placeholder="Topic" required>
                <textarea class="content__form__message" placeholder="Add message ..." required></textarea>
                <button class="content__form__button">Send</button>
            </form>
        </div>


    <?php include 'footer.php'; ?>
</body>
<script>
    if(localStorage.getItem('theme') === null) localStorage.setItem('theme', 'light');
    document.querySelector("body").setAttribute("class", localStorage.getItem('theme'));
</script>
</html>


