<?php session_start();
ob_start();
header("Access-Control-Allow-Origin: *");
include 'includes/dbAccessClass.php';
include 'includes/myFunctions.php';

if (session_id() == czGet("tkn")) {
    $valueForSearch = czGet("term");
    if (strlen($valueForSearch) > 1) {
        $tableName = czGet('tbl');
        $feildName = czGet('type');

        $obj_class_main = new czDBAccess();
        $obj_class_main->varTableName = 'product_table';
        $result = $obj_class_main->selectDataForAutoComplete("SELECT distinct $feildName from $tableName where $feildName like '%" . $valueForSearch . "%'", $feildName);
        echo $result;
    }
}