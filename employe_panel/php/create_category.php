<?php
require_once("../../db.php");
$data = json_decode($_POST["data"]);
$length = count($data);
$sel_table = "SELECT * FROM category";
$message = "";
if ($db->query($sel_table)) {
    for ($i = 0; $i < $length; $i++) {
        $store_data = "INSERT INTO category(category_name) VALUES('$data[$i]')";
        if ($db->query($store_data)) {
            if (mkdir("../../stocks/"  . $data[$i])) {
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
    $create_table = "CREATE TABLE category(id INT(20) NOT NULL AUTO_INCREMENT,category_name VARCHAR(255),PRIMARY KEY(id));";
    if ($db->query($create_table)) {
        for ($i = 0; $i < $length; $i++) {
            $store_data = "INSERT INTO category_name VALUES('$data[$i]')";
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
}
