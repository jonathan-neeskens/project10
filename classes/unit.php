<?php

/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 29-11-2016
 * Time: 12:18
 */
class unit
{
    public $strName;

    public static function get_unit_by_id($intId)
    {
        $objDatabase = new Database();
        $objDatabase->query("SELECT * FROM units WHERE unit_id = :id");
        $objDatabase->bind("id",$intId);

        $result = $objDatabase->single();
        $objUnit = new unit();

        $objUnit->strName = $result['unit_name'];

        return $objUnit;
    }
}