<?php

/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 24-11-2016
 * Time: 14:12
 */
class supplier
{
    public $strName;
    public $branche;
    public $strCity;
    public $strAddress;

    public function get_supplier_by_id()
    {

    }

    public function get_suppliers($id = null)
    {
        $objDatabase = new database();
        if($id == null){
            $query = "SELECT * FROM suppliers";
        }else{
            $query = "SELECT * FROM suppliers WHERE id = $id";
        }
        $objDatabase->query($query);
        $arrSuppliers = [];
        foreach ($objDatabase->resultset() as $result)
        {
            $objSupplier = new supplier();
            $objSupplier->id = $result['supplier_id'];
            $objSupplier->name = $result['name'];
            $objSupplier->branche = $result['branche'];
            $objSupplier->city = $result['city'];

            array_push($arrSuppliers, $objSupplier);
        }
        return $arrSuppliers;
    }
}