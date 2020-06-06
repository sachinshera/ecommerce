<nav class="navbar">
    <ul class="nav">
        <?php
        require_once("db.php");
        $query = "SELECT * FROM category";
        $response = $db->query($query);
        if ($response) {
            while ($data = $response->fetch_assoc()) {
                echo "<li class='nav-item'>  <a href='#' class='nav-link'> " . $data["category_name"] . " </a> </li>";
            }
        }
        ?>
    </ul>
</nav>