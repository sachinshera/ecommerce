<?php
require_once("../../db.php");
$file = $_FILES["logo"];
if ($file["name"] != "") {
    $file_loc = $file["tmp_name"];
    $logo = addslashes(file_get_contents($file_loc));
} else {
    $logo = "";
}
$brand_name = addslashes($_POST["brand_name"]);
$domain = addslashes($_POST["domain"]);
$email = addslashes($_POST["email"]);
$facebook = addslashes($_POST["facebook"]);
$twitter = addslashes($_POST["twitter"]);
$instagram = addslashes($_POST["instagram"]);
$address = addslashes($_POST["address"]);
$phone = $_POST["phone"];
$about = addslashes($_POST["about"]);
$policy = addslashes($_POST["policy"]);
$cookies = addslashes($_POST["cookies"]);
$terms = addslashes($_POST["terms"]);
$check_table = "SELECT * FROM branding";
if ($db->query($check_table)) {
    if ($logo != "") {
        $update_data = "UPDATE branding SET logo = '$logo',brand_name = '$brand_name' , domain = '$domain', email = '$email', facebook = '$facebook', twitter = '$twitter', address = '$address',phone = '$phone',about = '$about',policy = '$policy',cookies = '$cookies',terms = '$terms'";
        if ($db->query($update_data)) {
            echo "data updated successfully";
        } else {
            echo "data updated failed" . $db->error;
        }
    } else {
        $update_data = "UPDATE branding SET brand_name = '$brand_name' , domain = '$domain', email = '$email', facebook = '$facebook', twitter = '$twitter', address = '$address',phone = '$phone',about = '$about',policy = '$policy',cookies = '$cookies',terms = '$terms'";
        if ($db->query($update_data)) {
            echo "data updated successfully";
        } else {
            echo "data updated failed" . $db->error;
        }
    }

    // $insert_data = "INSERT INTO branding (logo,brand_name,domain,email,facebook,twitter,instagram,address,phone,about,policy,cookies,terms)
    // VALUES('$logo','$brand_name','$domain','$email','$facebook','$twitter','$instagram','$address','$phone','$about','$policy','$cookies','$terms')
    // ";
    // if ($db->query($insert_data)) {
    //     echo "data inserted successfully";
    // } else {
    //     echo "data inserting failed" . $db->error;
    // }
} else {
    $create_table = "CREATE TABLE branding(
        id INT(11) NOT NULL AUTO_INCREMENT,
        logo MEDIUMBLOB,
        brand_name VARCHAR(255),
        domain VARCHAR(255),
        email VARCHAR(255),
        facebook MEDIUMTEXT,
        twitter MEDIUMTEXT,
        instagram MEDIUMTEXT,
        address MEDIUMTEXT,
        phone VARCHAR(255),
        about MEDIUMTEXT,
        policy MEDIUMTEXT,
        cookies MEDIUMTEXT,
        terms MEDIUMTEXT,
        PRIMARY KEY (id)
    )";
    if ($db->query($create_table)) {
        $insert_data = "INSERT INTO branding (logo,brand_name,domain,email,facebook,twitter,instagram,address,phone,about,policy,cookies,terms)
        VALUES('$logo','$brand_name','$domain','$email','$facebook','$twitter','$instagram','$address','$phone','$about','$policy','$cookies','$terms')
        ";
        if ($db->query($insert_data)) {
            echo "data inserted successfully";
        } else {
            echo "data inserting failed" . $db->error;
        }
    } else {
        echo "table created failed" . $db->error;
    }
}
