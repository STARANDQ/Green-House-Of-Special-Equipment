<?php

function setCard($id, $name, $price, $image, $category, $transportWeight, $maximumWeight, $dimensions, $producer, $description)
{
   return '    
        <div class="content_card__block">
            <div class="content_card__block__first">
                <div class="content_card__block__first__address">
                    <label for="address_' . $id . '">Адрес:</label>
                    <br>
                    <textarea name="address" id="address_' . $id . '"></textarea>
                </div>
                <div class="content_card__block__first__info">
                    <div class="content_card__block__first__info__label">
                        <label for="number_' . $id . '">Номер телефону:</label>
                        <br>
                        <label for="name_' . $id . '">ПІБ:</label>
                    </div>
                    <div class="content_card__block__first__info__input">
                        <input id="number_' . $id . '" type="text">
                        <br>
                        <input id="name_' . $id . '" type="text">
                    </div>
                </div>
            </div>
            <div class="content_card__block__second">
                <div class="content_card__block__second__img">
                    <img class="content_card__block__second__img__text__imge" src= "../img/element/' . $image . '" alt="">
                    <p class="content_card__block__second__img__text">' . $name . '</p>
                </div>
                <div class="content_card__block__second__items">
                    <div class="content_card__block__second__items__label">
                        <label for="amount">Кількість:</label>
                        <br>
                        <label for="priceAll">Ціна:</label>
                    </div>
                    <div class="content_card__block__second__items__label">
                        <input id="amount_' . $id . '" data-type = "amount" data-id = "' . $id . '" type="number" min="1" value="1" onchange="sum()">
                        <br>
                        <input id="priceAll_' . $id . '" data-type = "priceAll" data-price = "' . $price . '">
                        <p onclick="deleteItemCard('. $id .')" class="removeElem">Видалити</p>
                    </div>
                </div>
            </div>
        </div>';

    }