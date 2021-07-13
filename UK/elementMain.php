<?php

function getElement($id, $name, $price, $image, $category, $transportWeight, $maximumWeight, $dimensions, $producer, $description)
{
   return '<div class="column" id = "' .  $id . '" onclick="document.location.href = \'goods.php?id=' . $id . '\' ">
        <div class="image" >
            <img src = "../../img/element/' . $image . '" >
        </div >
        <div class="name" >
            <span>' . $name . '</span >
        </div >
        <table class="info" >
            <tr >
                <td class="left" >
                    <p ><b > Категорія: </b > ' .  $category . ' </p >
                    <p ><b > Вага транспорту: </b > ' .  $transportWeight . ' </p >
                    <p ><b > Максимальна вага: </b > ' .  $maximumWeight . ' </p >
                    <p ><b > Габарити: </b > ' . $dimensions . ' </p >
                </td >
                <td class="right" >
                    <img src = "../img/model/' . strtolower($producer) . '.jpg " alt = "'.$producer.'" >
                </td >
            </tr >
        </table >
        <div class="description" >
            <span style = "color:grey;" class="descriptionJS">
                ' . $description . '
            </span >
        </div >
        <div class="footerElement" >
            <a class="left" style = "
                background: #D2FFAF; 
                display: inline-block;
                padding: 10px 40px 10px 40px;
            " href = "#" >
                <span class="text" style = "color: black;" > Замовити </span >
                <span class="UAH" style = "color: #14B036;" >&#8372;</span>
            </a >
            <div class="right" >
                <span > Ціна: <span> ' . $price . '</span> грн / год</span >
            </div >
        </div >
        <div class="hide" >
            <span > Натисніть щоб дізнатися більше </span >
        </div >
    </div >';

    }