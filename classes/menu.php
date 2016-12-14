<?php
require_once 'database.php';

/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 24-11-2016
 * Time: 14:11
 */
class menu
{

    public $id;
    public $name;
    public $entree;
    public $maindish;
    public $dessert;
    public $price;
    public $ingredients;
    public $quantity;
    public $availability;
    public $app_color;



    public function add_menu($objMenu)
    {
        $objDatabase = new database();
        $objDatabase->query("INSERT INTO menu VALUES(NULL, :name, :entree, :maindish, :dessert, :price, :availability, :app_color)");
        $objDatabase->bind('name', $objMenu->name);
        $objDatabase->bind('entree', $objMenu->entree);
        $objDatabase->bind('maindish', $objMenu->maindish);
        $objDatabase->bind('dessert', $objMenu->dessert);
        $objDatabase->bind('price',$objMenu->price);
        $objDatabase->bind('availability', $objMenu->availability);
        $objDatabase->bind('app_color',$objMenu->app_color);
        $objDatabase->execute();

        $intMenuId = $objDatabase->lastInsertId();
        var_dump($objMenu->ingredients);
        foreach ($objMenu->ingredients as $objIngredient){

            $this->link_ingredient($intMenuId, $objIngredient);
            var_dump($objIngredient);
            //exit();
        }
    }

    public function link_ingredient($intMenuId, $objIngredients)
    {
        $objDatabase = new database();
        $objDatabase->query("INSERT INTO `menu_ingredient` VALUES (:ingredient_id,:menu_id,:quantity)");
        var_dump($objIngredients);
        $objDatabase->bind("ingredient_id", $objIngredients->intId);
        $objDatabase->bind("menu_id", $intMenuId);
        $objDatabase->bind("quantity", $objIngredients->intQuantity);
        $objDatabase->execute();
    }
    /**
     * @param null $id
     * @return array
     */
    public function get_menus($id = null)
    {
        $objDatabase = new database();
        if($id == null){
            $query = "SELECT * FROM menu";
        }else{
            $query = "SELECT * FROM menu WHERE id = $id";
        }
        $objDatabase->query($query);
        $arrMenus = [];
        foreach ($objDatabase->resultset() as $result)
        {
            $objMenu = new menu();
            $objMenu->id = $result['id'];
            $objMenu->name = $result['name'];
            $objMenu->entree = $result['entree'];
            $objMenu->maindish = $result['maindish'];
            $objMenu->dessert = $result['dessert'];
            $objMenu->price = $result['price'];
            $objMenu->availability = $result['availability'];
            $objMenu->app_color = $result['app_color'];
            array_push($arrMenus, $objMenu);
        }
        return $arrMenus;
    }
}