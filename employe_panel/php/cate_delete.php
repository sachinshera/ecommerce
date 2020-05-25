<?php
require_once("../../db.php");
$id = $_POST['id'];
$edit = "DELETE  FROM category WHERE id = $id";
if ($db->query($edit)) {
    echo "successfully";
} else {
    echo "failed";
}
