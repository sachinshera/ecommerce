<?php
require_once("../../db.php");
$category = $_POST['category'];
$response = $db->query("SELECT * FROM brands WHERE category_name = '$category'");
$result = [];
while ($data = $response->fetch_assoc()) {
    array_push($result, $data);
}
echo json_encode($result);
