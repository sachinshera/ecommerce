<?php
require_once("../../db.php");
$id = $_POST['id'];
$name = $_POST['name'];
$edit = "UPDATE category SET category_name  = '$name' WHERE id = $id";
if ($db->query($edit)) {
    echo "successfully";
} else {
    echo "failed";
}
