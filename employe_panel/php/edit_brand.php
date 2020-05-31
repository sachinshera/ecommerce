<?php require_once("../../db.php");
$new_brand = $_POST["new_brand"];
$old_brand = $_POST["old_brand"];
$new_category = $_POST["new_category"];
$old_category = $_POST["old_category"];
$sql = "UPDATE brands SET brand_name ='$new_brand',category_name ='$new_category' WHERE brand_name = '$old_brand' AND category_name = '$old_category'";
if ($db->query($sql)) {
    echo "successfully";
} else {
    echo "failed";
}
