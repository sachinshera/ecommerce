<nav class="navbar w-100">
    <a href="#" class="navbar-brand">
        <?php
        $response = $db->query("SELECT * FROM branding");
        if ($response) {
            $data = $response->fetch_assoc();
            echo "<img class='float-left' style='width:50px;height:50px;border-radius:10px' src='data:image/png;base64," . base64_encode($data["logo"]) . "'> </img>";
            echo "<a href='index.php'><h5 class='float-right m-2' style='font-weight:bold;color:red'>" . $data["brand_name"] . " </h5></a>";
        }
        ?>
    </a>
    <ul class="nav mx-auto">
        <?php
        $query = "SELECT * FROM category";
        $response = $db->query($query);
        if ($response) {
            while ($data = $response->fetch_assoc()) {
                echo "<li class='nav-item'>  <a href='#' class='nav-link text-capitalize text-dark'> " . $data["category_name"] . " </a> </li>";
            }
        }
        ?>
    </ul>
    <div class="btn-group mx-auto">
        <a href="#" class="btn btn-dark text-light px-3" title="Serch Item"><i class="fas fa-search"></i></a>
        <a class="btn btn-dark text-light px-3" title="cart"><i class="fas fa-shopping-bag"></i></a>
        <a href="accounts.php" class="btn btn-dark text-light px-3" title="account"><i class="fas fa-user"></i></a>
    </div>
</nav>