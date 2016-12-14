<?php include "includes/head.php";
$objIngredient = new ingredient();
$arrIngredients = $objIngredient->get_ingredients();
?>
<body>
<?php include "includes/menu.php" ?>
<div class="canvas bit-90">
    <input class="searchField" placeholder="Zoek naar ingrediënten..." type="text">
    <i class="fa fa-search"></i>

    <div class="innerCanvas">
        <?php foreach ($arrIngredients as $ingredient): ?>
            <div class='list_item'>
                <div class="list-section">
                    <h3> <?= $ingredient->name; ?> </h3>
                </div>
                <div class="list-section">
                    <u class="<?php  ?>"><?= $ingredient->quantity; ?> </u> / <strong> <?= $ingredient->quantity_minimum; ?></strong> stuks
                </div>
                <a href='edit_menu.php?ingredient_id=<?= $ingredient->id; ?>'>
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
