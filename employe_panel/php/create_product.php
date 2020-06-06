<?php
require_once("../../db.php");
$product_title = $_POST["product_title"];
$product_desc = $_POST["product_desc"];
$product_price = $_POST["product_price"];
$product_quant = $_POST["product_quant"];
$brand = $_POST["brand"];
$category = $_POST["category"];
$check_table = "SELECT * FROM products";
$message = "";
// file uploading and data update
$all_img = [$_FILES["thumb"], $_FILES["front"], $_FILES["top"], $_FILES["bottom"], $_FILES["left"], $_FILES["right"]];
$all_file_path = ["thumb_pic", "front_pic", "top_pic", "bottom_pic", "left_pic", "right_pic"];
$check_folder = is_dir("../../stocks/" . $category . "/" . $brand . "/" . $product_title);


// file uploading and data update 
if ($db->query($check_table)) {
    $insert_data = "INSERT INTO products(product_title,product_desc,product_price,product_quant,brand,category) VALUES('$product_title','$product_desc','$product_price','$product_quant','$brand','$category')";
    if ($db->query($insert_data)) {
        if ($check_folder) {
        } else {
            $img_folder = mkdir("../../stocks/" . $category . "/" . $brand . "/" . $product_title);
            $file_dest = "../../stocks/" . $category . "/" . $brand . "/" . $product_title;
            if ($img_folder) {
                $img_length = count($all_img);
                for ($i = 0; $i < $img_length; $i++) {
                    $file = $all_img[$i];
                    $name = $file["name"];
                    $des = "stocks/" . $category . "/" . $brand . "/" . $product_title . "/" . $name;
                    $loaction = $file["tmp_name"];
                    $file_uploaded =    move_uploaded_file($loaction, $file_dest . "/" . $name);
                    if ($file_uploaded) {
                        $update_product_path = "UPDATE products SET $all_file_path[$i] ='$des'  WHERE category = '$category' AND product_title = '$product_title' AND brand = '$brand'";
                        if ($db->query($update_product_path)) {
                            $message = "succfully";
                        } else {
                            $message = "failed to insert" . $db->error;
                        }
                    } else {
                        $message = "file not uploaded";
                    }
                };
            } else {
                $message = "folder not created";
            }
        }
    } else {
        $message = "failed to insert";
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
        thumb_pic VARCHAR(255),front_pic VARCHAR(255),top_pic VARCHAR(255),bottom_pic VARCHAR(255),left_pic VARCHAR(255),right_pic VARCHAR(255),
        PRIMARY KEY(id)
    )";
    if ($db->query($create_table)) {
        $insert_data = "INSERT INTO products(product_title,product_desc,product_price,product_quant,brand,category) VALUES('$product_title','$product_desc','$product_price','$product_quant','$brand','$category')";
        if ($db->query($insert_data)) {
            if ($check_folder) {
            } else {
                $img_folder = mkdir("../../stocks/" . $category . "/" . $brand . "/" . $product_title);
                $file_dest = "../../stocks/" . $category . "/" . $brand . "/" . $product_title;
                if ($img_folder) {
                    $img_length = count($all_img);
                    for ($i = 0; $i < $img_length; $i++) {
                        $file = $all_img[$i];
                        $name = $file["name"];
                        $loaction = $file["tmp_name"];
                        $des = "stocks/" . $category . "/" . $brand . "/" . $product_title . "/" . $name;
                        $file_uploaded =    move_uploaded_file($loaction, $file_dest . "/" . $name);
                        if ($file_uploaded) {
                            $update_product_path = "UPDATE products SET $all_file_path[$i] = '$des'  WHERE category = '$category' AND product_title = '$product_title' AND brand = '$brand'";
                            if ($db->query($update_product_path)) {
                                $message = "succfully";
                            } else {
                                $message = "failed to insert" . $db->error;
                            }
                        } else {
                            $message = "file not uploaded";
                        }
                    };
                } else {
                    $message = "folder not created";
                }
            }
            // file uploading and data update 
        } else {
            $message = "failed to insert";
        }
    } else {
        $message = "table creation failed" . $db->error;
    }
}
echo $message;
