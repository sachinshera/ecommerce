<?php require_once("../db.php");
if ($db->query("SELECT * FROM branding")) {
    $sql = $db->query("SELECT * FROM branding");
    if ($sql) {
        $data = $sql->fetch_assoc();
        $brand_name = $data["brand_name"];
        $logo = $data["logo"];
        $domain =  $data["domain"];
        $email = $data["email"];
        $facebook = $data["facebook"];
        $twitter = $data["twitter"];
        $instagram = $data["instagram"];
        $address = $data["address"];
        $phone = $data["phone"];
        $about = $data["about"];
        $policy = $data["policy"];
        $cookies = $data["cookies"];
        $terms = $data["terms"];
    } else {
        $brand_name = "";
        $logo = "";
        $domain = "";
        $email = "";
        $facebook = "";
        $twitter = "";
        $instagram = "";
        $address = "";
        $phone = "";
        $about = "";
        $policy = "";
        $cookies = "";
        $terms = "";
    }
} else {
    $brand_name = "";
    $logo = "";
    $domain = "";
    $email = "";
    $facebook = "";
    $twitter = "";
    $instagram = "";
    $address = "";
    $phone = "";
    $about = "";
    $policy = "";
    $cookies = "";
    $terms = "";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css and js cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" integrity="sha256-PHcOkPmOshsMBC+vtJdVr5Mwb7r0LkSVJPlPrp/IMpU=" crossorigin="anonymous" /> <!-- css and js cdn  -->
    <!-- css and js cdn -->
    <!-- ext css -->
    <link rel="stylesheet" href="css/index.css">
    <!-- ext css -->
    <title>EmployePanel</title>
</head>

<body>
    <div class="container-fluid">
        <!-- slide bar coding  -->
        <div class="sidebar">
            <button type="button" class="btn  bg-white w-100 text-left mb-3" style="font-size:20px">
                <i class="fas fa-id-card"></i> Branding Update
            </button>
            <button type="button" class="btn stock_btn bg-white w-100 text-left" style="font-size:20px" data-toggle="collapse" data-target="#stock_list">
                <i class="fa fa-shopping-cart"></i>
                Stock Update
                <i class="fa fa-angle-down ml-2"></i>
            </button>
            <ul class="collapse  show " id="stock_list">
                <li class="collapse-item" data-url="create_category_design.php" id="one">Create catogories</li>
                <li class="collapse-item " data-url="create_brands_design.php" id="two">Create brands</li>
                <li class="collapse-item " data-url="create_products_design.php" id="three">Create products</li>

            </ul>
        </div>
        <!-- slide bar coding -->
        <!-- page coding  -->
        <div class="page" style="overflow:scroll">
            <div class="container-fluid" id="dyn_page">

            </div>
            <!-- test -->
            <form id="brand_form">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 update_brand_box py-3">
                        <h4 class="text-center mb-3">Update brand details</h4>
                        <label for="brand_name" style="font-weight: bold">Enter your brand name</label>
                        <input type="text" placeholder="brand name" class="form-control mb-3" id="brand_name" name="brand_name" norequired="no" value=" <?php echo $brand_name ?>">
                        <div>
                            <?php echo "<img style='width:80px;height:80px' src='data:image/gif;base64," . base64_encode($logo) . "'> </img>" ?>

                        </div>
                        <label for="logo" style="font-weight: bold">Logo</label>
                        <input type="file" accept="image/*" class="form-control mb-3" id="logo" placeholder="choose your logo" name="logo" norequired="no">
                        <label for="domain" style="font-weight: bold">Domain Name</label>
                        <input type="website" class="form-control mb-3" id="domain" placeholder="Enter your domain" name="domain" norequired="no" value=" <?php echo $domain ?>">
                        <label for="email" style="font-weight: bold">Enter your email address</label>
                        <input type="email" class="form-control mb-3" id="email" placeholder="Enter your email" name="email" norequired="no" value=" <?php echo $email ?>">
                        <label for="socialaccounts" style="font-weight: bold">Social accounts</label>
                        <br><small>facebook</small>
                        <input type="website" class="form-control mb-3" id="socialaccounts" placeholder="facebook url" name="facebook" value=" <?php echo $facebook ?>">
                        <small>twitter</small>
                        <input type="website" class="form-control mb-3" id="socialaccounts" placeholder="twitter url" name="twitter" value=" <?php echo $twitter ?>">
                        <small>instagram</small>
                        <input type="website" class="form-control mb-3" id="socialaccounts" placeholder="instagram url" name="instagram" value=" <?php echo $instagram ?>">
                        <label for="address" style="font-weight: bold">Address</label><small class="float-right">max 1500</small>
                        <textarea name="address" id="address" cols="30" rows="5" class="form-control mb-3" norequired="no" maxlength="1500" minlength="100"><?php echo $address ?></textarea>
                        <label for="phone" style="font-weight: bold">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="form-control mb-3" maxlength="12" minlength="10" norequired="no" value="<?php echo $phone ?>">
                        <label for="about" style="font-weight: bold">About us</label><small class="float-right">max 10000</small>
                        <textarea name="about" id="about" cols="30" rows="7" class="form-control mb-3" norequired="no" maxlength="10000" minlength="1000">
                        <?php echo $about ?>
                        </textarea>
                        <label for="policy" style="font-weight: bold">Privacy Policy</label><small class="float-right">max 10000</small>
                        <textarea name="policy" id="policy" cols="30" rows="12" class="form-control mb-3" norequired="no" maxlength="10000" minlength="1000"><?php echo $policy; ?></textarea>
                        <label for="cookies" style="font-weight: bold">Cookies Policy</label> <small class="float-right">max 10000</small>
                        <textarea name="cookies" id="cookies" cols="30" rows="12" class="form-control mb-3" norequired="no" maxlength="10000" minlength="1000"><?php echo $cookies ?></textarea>
                        <label for="terms" style="font-weight: bold"><span class="float-left">Terms and conditions </span></label> <small class="float-right">max 10000</small>
                        <textarea name="terms" id="terms" cols="30" rows="12" class="form-control mb-3" norequired="no" maxlength="10000" minlength="1000"><?php echo $terms ?></textarea>
                        <button type="submit" class="btn btn-dark text-light">Update details</button>

                    </div>
                    <div class="col-md-3"></div>

                </div>
            </form>
            <!-- test -->
        </div>
        <!-- page coding  -->

    </div>
    <!-- ext js page  -->
    <script src="js/index.js"> </script>
    <script>
        $(document).ready(function() {
            $("#brand_form").submit(function(event) {
                var form = this;
                event.preventDefault();
                var logo = document.querySelector("#logo");
                var file = logo.files[0];
                if (logo.value != "") {
                    if (file.size < 200000) {
                        send();
                    } else {
                        alert("please choose logo  size less than 200kb");
                    }
                } else {
                    send();
                }

                function send() {
                    $.ajax({
                        type: "POST",
                        url: "php/branding.php",
                        data: new FormData(form),
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(response) {
                            document.write(response);
                        }
                    });
                }

            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $("#threeeee").click();
        })
    </script>
    <!-- ext js page -->

</body>

</html>