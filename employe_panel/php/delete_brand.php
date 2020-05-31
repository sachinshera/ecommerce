<?php require_once("../../db.php");
$brand = $_POST["brand"];
$category = $_POST["category"];
$sql  = "DELETE  FROM brands WHERE brand_name = '$brand' AND category_name = '$category'";

if ($db->query($sql)) {
    echo "successfully";
} else {
    echo "failed";
}
