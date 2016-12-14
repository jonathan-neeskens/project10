<?php include "includes/head.php" ?>
<body>
<?php include "includes/menu.php";
$objMenu = new menu();
$arrMenus = $objMenu->get_menus();
?>
<div class="canvas bit-90">
    <input class="searchField" placeholder="Zoek naar menu's..." type="text">
    <i class="fa fa-search"></i>

    <div class="innerCanvas">
        <?php
        foreach ($arrMenus as $menu): ?>

            <div class='list_item'>
                <div class='user_pic' style='background-image: url("img/menu.png"); background-color: <?= $menu->app_color ?>'> </div>
                <div class='list-section'>
                    <h3> <?= $menu->name; ?> </h3>
                </div>
                <a href='edit_menu.php?id=".$row1['id']."'>
                <i class='fa fa-eye'></i>
                </a>
            </div>

        <?php endforeach; ?>
    </div>
    <a href="add_menu.php" class="addbutton">
        <i> + </i>
    </a>
    <div class="popup" style="display: none;"></div>
    <script>
        if (window.location.href.indexOf("add=success") != -1){
            alert('Toevoegen van menu was succesvol. Dit bericht moet binnenkort veranderd worden in een pop-up.');
            //addclass 'zichtbaar' aan <div class='popup'>
        }

        else if (window.location.href.indexOf("change=success") != -1){
            alert('Aanpassen van menu was succesvol. Dit bericht moet binnenkort veranderd worden in een pop-up.');
            //addclass 'zichtbaar' aan <div class='popup'>
        }
    </script>
</div>
</body>
</html>
