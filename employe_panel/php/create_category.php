<?php
require_once("../../db.php");
$data = json_decode($_POST["data"]);
$length = count($data);
$sel_table = "SELECT * FROM category";
if ($db->query($sel_table)) {
    for ($i = 0; $i < $length; $i++) {
        $store_data = "INSERT INTO category(category_name) VALUES('$data[$i]')";
        if ($db->query($store_data)) {
            echo "store_data";
        } else {
            echo "fail" . $db->error;
        }
    }
} else {
    $create_table = "CREATE TABLE category(id INT(20) NOT NULL AUTO_INCREMENT,category_name VARCHAR(255),PRIMARY KEY(id));";
    if ($db->query($create_table)) {
        for ($i = 0; $i < $length; $i++) {
            $store_data = "INSERT INTO category_name VALUES('$data[$i]')";
            if ($db->query($store_data)) {
                echo "store_data";
            } else {
                echo "fail" . $db->error;
            }
        }
    } else {
        echo "table not created" . $db->error;
    }
}
