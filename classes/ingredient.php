<?php

/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 29-11-2016
 * Time: 11:54
 */
class ingredient
{
    public $intId;
    public $strName;
    public $objSupplier;
    public $objUnit;
    public $intQuantity;
    public $intQuantityMinimum;

    public function get_ingredients()
    {
        $objDatabase = new database();
        $query = "SELECT * FROM ingredients";

        $objDatabase->query($query);
        $arrIngredients = [];
        foreach ($objDatabase->resultset() as $result)
        {
            $objIngredient = new ingredient();
            $objIngredient->id = $result['ingredient_id'];
            $objIngredient->name = $result['name'];
            $objIngredient->objSupplier = supplier::get_supplier_by_id($result['supplier_id']);
            $objIngredient->objUnit = unit::get_unit_by_id($result['unit_id']);
            $objIngredient->quantity = $result['quantity'];
            $objIngredient->quantity_minimum = $result['quantity_minimum'];

            array_push($arrIngredients, $objIngredient);
        }
        return $arrIngredients;
    }
}