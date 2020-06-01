<?php
require_once("../../db.php");
$product_title = $_POST["product_title"];
$product_desc = $_POST["product_desc"];
$product_price = $_POST["product_price"];
$product_quant = $_POST["product_quant"];
$brand = $_POST["brand"];
$category = $_POST["category"];
$check_table = "SELECT * FROM products";
$all_img = [$_FILES["thumb"], $_FILES["front"], $_FILES["top"], $_FILES["bottom"], $_FILES["left"], $_FILES["right"]];
$img_folder = mkdir("../../stocks/" . $category . "/" . $brand . "/" . $product_title);
$file_dest = "../../stocks/" . $category . "/" . $brand . "/" . $product_title;
if ($img_folder) {
    $img_length = count($all_img);
    for ($i = 0; $i < $img_length; $i++) {
        $file = $all_img[$i];
        $name = $file["name"];
        $loaction = $file["tmp_name"];
        move_uploaded_file($loaction, $file_dest . "/" . $name);
    };
} else {
    echo "folder not created";
}
if ($db->query($check_table)) {
    $insert_data = "INSERT INTO products(product_title,product_desc,product_price,product_quant,brand,category) VALUES('$product_title','$product_desc','$product_price','$product_quant','$brand','$category')";
    if ($db->query($insert_data)) {
        echo "successfully inserted";
    } else {
        echo "failed to insert";
    }
} else {
    $create_table = "CREATE TABLE products(
        id INT(11) NOT NULL AUTO_INCREMENT,
        product_title VARCHAR(255),
        product_desc VARCHAR(255),
        product_price FLOAT(10),
        product_quant FLOAT(10),
        brand VARCHAR(255),
        category VARCHAR(255),
        PRIMARY KEY(id)
    )";
    if ($db->query($create_table)) {
        $insert_data = "INSERT INTO products(product_title,product_desc,product_price,product_quant,brand,category) VALUES('$product_title','$product_desc','$product_price','$product_quant','$brand','$category')";
        if ($db->query($insert_data)) {
            echo "successfully inserted";
        } else {
            echo "failed to insert";
        }
    } else {
        echo "table creation failed" . $db->error;
    }
}
