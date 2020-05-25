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
            <button type="button" class="btn stock_btn bg-white w-100 text-left" style="font-size:20px" data-toggle="collapse" data-target="#stock_list">
                <i class="fa fa-shopping-cart"></i>
                Stock Update
                <i class="fa fa-angle-down ml-2"></i>
            </button>
            <ul class="collapse  show " id="stock_list">
                <li class="collapse-item" data-url="create_category_design.php" id="one">Create catogories</li>
                <li class="collapse-item " data-url="create_brands_design.php">Create brands</li>
                <li class="collapse-item " data-url="create_products_design.php">Create products</li>

            </ul>
        </div>
        <!-- slide bar coding -->
        <!-- page coding  -->
        <div class="page">
            <div class="container" id="dyn_page">

            </div>
        </div>
        <!-- page coding  -->

    </div>
    <!-- ext js page  -->
    <script src="js/index.js"> </script>
    <script src="js/brands.js"></script>
    <script>
        $(document).ready(function() {
            $("#one").click();
        })
    </script>
    <!-- ext js page -->

</body>

</html>