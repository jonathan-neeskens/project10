<?php
require_once  './classes/menu.php';
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 28-11-2016
 * Time: 09:43

$objMenu = new menu();
$objMenu->name = "Fietsmenu voor de echte fietsers";
$objMenu->price = 15;
$objMenu->availability = 1;
$objMenu->app_color = "#FF5";
if($objMenu->add_menu($objMenu)){
    echo 'Jona is een baas';
}else{
    echo 'Jona is een faalhaas';
}
 * */

$objMenu = new menu();
$arrMenus = $objMenu->get_menus();
?>

<html>

<!--<table>-->
<!--    <thead>-->
<!--    <tr>-->
<!--    <td>name</td>-->
<!--    <td>price</td>-->
<!--    <td>beschikbaarheid</td>-->
<!--    </tr></thead>-->
<!--    <tbody>-->
<!--        --><?php
//            foreach ($arrMenus as $menu): ?>
<!--                <tr style="color:--><?//= $menu->app_color; ?><!--">-->
<!--                    <td>--><?//= $menu->name; ?><!--</td>-->
<!--                    <td>--><?//= $menu->price; ?><!--</td>-->
<!--                    <td>--><?//= $menu->availability; ?><!--</td>-->
<!---->
<!--                </tr>-->
<!---->
<!--            --><?php //endforeach; ?>
<!--    </tbody>-->
<!--</table>-->
    <body>

    </body>
</html>
