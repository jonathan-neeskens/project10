<?php
include './includes/head.php';

/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 21-11-2016
 * Time: 13:54
 */
$objIngredient = new ingredient();
$arrIngredients = $objIngredient->get_ingredients();
$color[0] = '#00BCD4';
$color[1] = '#8BC34A';
$color[2] = '#FF9800';
$color[3] = '#9C27B0';

$app_color = $color[rand()%count($color)];
$arrErrors = [];
if (isset($_POST['submit'])) {
    $objMenu = new menu();

    if(!isset($_POST['name']) || $_POST['name'] == ""){
        array_push($arrErrors, "Er is geen naam ingevoerd");
    }
    if(!isset($_POST['entree']) || $_POST['entree'] == ""){
        array_push($arrErrors, "Er is geen voorgerecht ingevoerd");
    }
    if(!isset($_POST['maindish']) || $_POST['maindish'] == ""){
        array_push($arrErrors, "Er is geen hoofdgerecht ingevoerd");
    }
    if(!isset($_POST['dessert']) || $_POST['dessert'] == ""){
        array_push($arrErrors, "Er is geen dessert ingevoerd");
    }
    if(!isset($_POST['price']) || $_POST['price'] == ""){
        array_push($arrErrors, "Er is geen price ingevoerd");
    }
    if(!isset($_POST['quantity']) || $_POST['quantity'] == ""){
        array_push($arrErrors, "Er is geen hoeveelheid ingevoerd");
    }
    if(!isset($_POST['ingredients']) || $_POST['ingredients'] == ""){
        array_push($arrErrors, "Er is geen ingredient ingevoerd");
    }

    if(empty($arrErrors)){
        $objMenu->name = $_POST['name'];
        $objMenu->entree = $_POST['entree'];
        $objMenu->maindish = $_POST['maindish'];
        $objMenu->dessert = $_POST['dessert'];
        $objMenu->price = $_POST['price'];
        $objMenu->ingredients = [];
        foreach ($_POST['ingredients'] as $i=>$intIngredient){
            $objIngredient = new ingredient();
            $objIngredient->intId = $intIngredient;
            $objIngredient->intQuantity = $_POST['quantity'][$i];
            array_push($objMenu->ingredients, $objIngredient);
        }
        $objMenu->quantity = $_POST['quantity'];
        $objMenu->availability = 1;
        $objMenu->app_color = $app_color;
        if ($objMenu->add_menu($objMenu)) {
            header('location: menus.php?add=succes');
        } else {
            header('location: menus.php?add=failed');
        }
    }



}

?>

<body>
<?php include "includes/menu.php" ?>
<div class="canvas bit-90">
    <div class="innerCanvas">

        <div class="inside_innerCanvas">
            <h2>Menu toevoegen</h2>
            <div class="error">
                <?php foreach ($arrErrors as $error): ?>
                    <span><?= $error ?>.</span><br/>

                <?php endforeach; ?>
            </div>
            <form method="POST">
                <input type="text" name="name" placeholder="Naam"><br>
                <input type="text" name="entree" placeholder="Voorgerecht"><br>
                <input type="text" name="maindish" placeholder="Hoofdgerecht"><br>
                <input type="text" name="dessert" placeholder="Nagerecht"><br>
                <input type="text" name="price" placeholder="Prijs"><br>
                <input style="width: 7%;" name="quantity[]" type="number" min="1">
                <select style="width: 33%;" name="ingredients[]">
                    <option disabled selected value="">Ingrediënt</option>
                    <?php foreach ($arrIngredients as $ingredient): ?>
                        <option value="<?= $ingredient->intId ?>"><?= $ingredient->objUnit->strName ?> <?= $ingredient->strName ?></option>
                    <?php endforeach; ?>
                </select> <button onclick="appendFields()" class="addbutton_small">+</button>
                <div class="location"></div>
                <input type="submit" name="submit" value="Invoeren">
            </form>
        </div>
    </div>

    <script>

        function appendFields(){
            event.preventDefault();

            var txt1 = '<input style="width: 7%;" name="quantity[]" type="number" min="1"><select style="width: 33%;" name="ingredients[]"> <option disabled selected value="">Ingrediënt</option><?php foreach ($arrIngredients as $ingredient): ?><option value="<?= $ingredient->intId ?>"><?= $ingredient->objUnit->strName ?> <?= $ingredient->strName ?></option><?php endforeach; ?>';
            $(".location").append(txt1);      // Append the new elements
        }

        if (window.location.href.indexOf("add=success") != -1){
            alert('Toevoegen van menu was succesvol.');
        }

        else if (window.location.href.indexOf("change=success") != -1){
            alert('Aanpassen van menu was succesvol.');
        }
    </script>
</div>
</body>


