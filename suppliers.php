<?php include "includes/head.php";
$objSupplier = new supplier();
$arrSuppliers = $objSupplier->get_suppliers();
?>
<body>
<?php include "includes/menu.php" ?>
<div class="canvas bit-90">
    <input class="searchField" placeholder="Zoek naar leveranciers..." type="text">
    <i class="fa fa-search"></i>

    <div class="innerCanvas">
        <?php foreach ($arrSuppliers as $supplier): ?>

            <div class='list_item'>
                <div class="list-section w50">
                    <h3> <?= $supplier->name; ?>, <strong><?= $supplier->branche; ?></strong> </h3>
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
