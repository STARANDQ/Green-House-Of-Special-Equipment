<?php
echo
'
<footer>
    <div class="footer__first">
        <div class="footer__first__title">
            <img src="../../img/Car.png" alt="Label" class="footer__first__title__img">
            <div  class="footer__first__title__text">
                <p class="footer__first__title__text__main-title">Green House Of Special Equipment</p>
                <p class="footer__first__title__text__subtitle">Rent everything you want</p>
            </div>
        </div>
        <div class="footer__first__admin-panel">
            <a class="footer__first__admin-panel__text" href="indexAdmin.php">Панель адміністратора</a>
        </div>
    </div>
    <div class="footer__second-menu">
        <p class="footer__second-menu__text">Навігація</p>
        <div class="footer__second-menu__elems">
            <a class="footer__second-menu__elems__elem" href="index.php">Головна</a>
            <a class="footer__second-menu__elems__elem" href="card.php">Корзина</a>
            <a class="footer__second-menu__elems__elem" href="about.php">Про нас</a>
            <a class="footer__second-menu__elems__elem" href="contact.php">Контакти</a>
        </div>
    </div>
    <div class="footer__third">
        <div class="footer__third__options">
            <div class="footer__third__options__option">
                <p class="footer__third__options__option__text">Мова</p>
                <div class="footer__third__options__option__images">
                    <img class="footer__third__options__option__images__image" src="../../img/image13.png"
                     onclick="window.location.href = \'../EN/index.php\';" alt="">
                    <img class="footer__third__options__option__images__image" src="../../img/image12.png"
                     onclick="window.location.href = \'../UK/index.php\';" alt="">
                </div>
            </div>
            <div class="footer__third__options__option">
                <p class="footer__third__options__option__text">Дизайн</p>
                <div class="footer__third__options__option__images">
                    <img class="footer__third__options__option__images__image" src="../../img/image4.png" 
                    onclick="localStorage.setItem(\'theme\', \'light\'); location.reload();" alt="">
                    <img class="footer__third__options__option__images__image" src="../../img/image3.png"
                    onclick="localStorage.setItem(\'theme\', \'dark\'); location.reload();" alt="">
                </div>
            </div>
        </div>
        <div class="footer__third__social-networks">
            <span class="footer__third__social-networks__text">Ми в соціальних мережах</span>
            <div class="footer__third__social-networks__links">
                <a class="footer__third__social-networks__links__main" href="https://www.facebook.com/" target="_blank">
                    <img class="footer__third__social-networks__links__main" src="../../img/facebook.png">
                </a>
                <a class="footer__third__social-networks__links__main" href="https://www.instagram.com/" target="_blank">
                    <img class="footer__third__social-networks__links__main"  src="../../img/instagram.png">
                </a>
                <a class="footer__third__social-networks__links__main" href="https://www.twitter.com/" target="_blank">
                    <img class="footer__third__social-networks__links__main"  src="../../img/twitter.png">
                </a>
            </div>
        </div>
    </div>
</footer>
';