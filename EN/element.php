<?php

function getElement($id, $name, $price, $image, $category, $transportWeight, $maximumWeight, $dimensions, $producer, $description)
{
   return '<div class="column" id = "' .  $id . '" onclick="document.location.href = \'editPage.php?id=' . $id . '\' ">
        <div class="image" >
            <img src = "../../img/element/' . $image . '" >
        </div >
        <div class="name" >
            <span>' . $name . ' <span style="color:grey;"> [ id: ' . $id . ' ] </span> </span >
        </div >
        <table class="info" >
            <tr >
                <td class="left" >
                    <p ><b > Category: </b > ' .  $category . ' </p >
                    <p ><b > Transport Weight: </b > ' .  $transportWeight . ' </p >
                    <p ><b > Maximum Weight: </b > ' .  $maximumWeight . ' </p >
                    <p ><b > Dimensions: </b > ' . $dimensions . ' </p >
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
                <span class="text" style = "color: black;" > Edit </span >
                <span class="UAH" style = "color: #14B036;" >&#8372;</span>
            </a >
            <div class="right" >
                <span > Price: <span> ' . $price . '</span> UAH / hour</span >
            </div >
        </div >
        <div class="hide" >
            <span > Натисніть щоб дізнатися більше </span >
        </div >
    </div >';

    }