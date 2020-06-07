<?php $response = $db->query("SELECT * FROM branding");
if ($response) {
    $data = $response->fetch_assoc();
}
?>
<div class="subscribe_box d-flex justify-content-center py-3 w-100">
    <div class="input-group w-50">
        <input type="email" placeholder="Email address" class="form-control">
        <div class="input-group-append">
            <div class="input-group-text bg-dark text-light">
                Subscribe
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center ml-3 ">
        <h4>Follow us on</h4>
        <div class="btn-group ml-2">

            <a href="<?php echo $data["facebook"] ?>" class="btn btn-dark text-light"><i class="fab fa-facebook-f"></i></a>
            <a href="<?php echo $data["twitter"] ?>" class="btn btn-dark text-light"><i class="fab fa-twitter"></i></i></button>
                <a href="<?php echo $data["instagram"] ?>" class="btn btn-dark text-light"><i class="fab fa-instagram"></i></a>

        </div>
    </div>

</div>

<div class="bg-dark text-light border-top border border-dark">
    <div class="row container-fluid">
        <div class="col-md-4">
            <h5 class=" mt-3">Category</h5>
            <ul class="nav d-flex flex-column">
                <?php
                $query = "SELECT * FROM category";
                $response = $db->query($query);
                if ($response) {
                    while ($data1 = $response->fetch_assoc()) {
                        echo "<li class='nav-item'>  <a href='#' class='nav-link text-capitalize '> " . $data1["category_name"] . " </a> </li>";
                    }
                }
                ?>
            </ul>
        </div>
        <div class="col-md-4">
            <h5 class="mt-3"> Policies</h5>
            <ul class="nav d-flex flex-column">
                <li class="nav-item">
                    <a href="about.php" class="nav-link">About us</a>
                </li>
                <li class="nav-item">
                    <a href="privacy.php" class="nav-link">Privacy Policy</a>
                </li>
                <li class="nav-item">
                    <a href="cookies.php" class="nav-link">Cookies Policy</a>
                </li>

                <li class="nav-item">
                    <a href="terms.php" class="nav-link">Tems and conditions</a>
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <h5 class="my-3"> Contacts</h5>
            <address>
                <?php
                echo "<span> Address : " . $data["address"] . " </span> <br><br>";
                echo "<span> Phone : " . $data["phone"] . " </span> <br> <br>";
                echo "<span> Email : " . $data["email"] . " </span> <br> <br>";
                echo "<span> Website: " . $data["domain"] . " </span>";

                ?>
            </address>
        </div>
    </div>
</div>