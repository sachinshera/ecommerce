<?php
require_once("../../db.php");
$data = json_decode($_POST["data"]);
$category = $_POST["category"];
$length = count($data);
$sel_table = "SELECT * FROM brands";
$message = "";
if ($db->query($sel_table)) {
    for ($i = 0; $i < $length; $i++) {
        $store_data = "INSERT INTO brands(brand_name,category_name) VALUES('$data[$i]','$category')";
        if ($db->query($store_data)) {

            if (mkdir("../../stocks/" . $category . "/" . $data[$i])) {
                $message = "your data has been saved successfully";
            } else {
                $message = "dr not created";
            }
        } else {
            $message = "your data has not, please try again later !";
        }
    }
    echo $message;
} else {
    $create_table = "CREATE TABLE brands(id INT(20) NOT NULL AUTO_INCREMENT,category_name VARCHAR(255),brand_name VARCHAR(255),PRIMARY KEY(id));";
    if ($db->query($create_table)) {
        for ($i = 0; $i < $length; $i++) {
            $store_data = "INSERT INTO brands(brand_name,category_name)VALUES('$data[$i]','$category')";
            if ($db->query($store_data)) {
                $message = "your data has been saved successfully";
            } else {
                $message = "your data has not, please try again later !";
            }
        }
        echo $message;
    } else {
        echo "table not created" . $db->error;
    }
};
