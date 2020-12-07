<?php

session_start();


require_once('Ad/php/CreateDb.php');
require_once('Ad/php/component.php');
$database = new CreateDb("dbshop", "Productdb");
if (isset($_POST['add'])) {
    if (isset($_SESSION['cart'])) {

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if (in_array($_POST['product_id'], $item_array_id)) {
            echo "<script>alert('เพิ่มสินค้าเรียบร้อยเเล้ว')</script>";
            echo "<script>window.location = 'index.php'</script>";
        } else {

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }
    } else {

        $item_array = array(
            'product_id' => $_POST['product_id']
        );
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}

if ($_SESSION['id'] == "") {
    header("location: signin.php");
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="assets/fontawesome-free-5.15.1-web/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/cssme.css">
        <title>Shop</title>
    </head>

    <body>
        <div class="conainer-fluid">
            <div class="navbar sticky-top navbar-light bg-light  px-5">
                <ul class="navbar-nav p-0 "></ul>
                    <li>
                        <div class=""><?php echo $_SESSION['fname']; ?> | <a href="logout.php">ออกจากระบบ</a></div>
                    </li>
                </ul>
            </div>
        </div>
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light px-5 conainer-fluid">
                <a href="index.html" class=""><h3> Stationary Shop </h3></a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="collapsibleNavId">
                    <ul class="navbar-nav mt-2 mt-lg-0 ml-auto ">
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="search" placeholder="ค้นหาสินค้า" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">ค้นหา</button>
                        </form>
                        <a href="cart.php" class="nav-item nav-link active">
                            <h5 class="px-5 cart">
                                <i class="fas fa-shopping-cart"></i> Cart
                                <?php

                                if (isset($_SESSION['cart'])) {
                                    $count = count($_SESSION['cart']);
                                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                                } else {
                                    echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                                }

                                ?>
                            </h5>
                        </a>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end Navbar-->

        <!-- Section Carousel -->
        <section id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-img"><img src="assets/image/st1.jpg " style="width:100%;">
                        <div class="carousel-caption">
                            <h1 class="display-4 font-weight-bold ">เครื่องเขียน</h1>
                        </div>
                        <div class="backscreen"></div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img"><img src="assets/image/st2.jpg" style="width:100%;">
                        <div class="carousel-caption">
                            <h1 class="display-4 font-weight-bold">อุปกรณ์การเรียน</h1>
                        </div>
                        <div class="backscreen"></div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img"><img src="assets/image/st3.jpg" style="width:100%;">
                        <div class="carousel-caption">
                            <h1 class="display-4 font-weight-bold">อุปกรณ์เสริม</h1>
                        </div>
                        <div class="backscreen"></div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </section>
        <!-- Section Hope -->
        <div class="container">
            <div class="row text-center py-5">

                <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)) {
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id'],$row['producttext']);
                }
                ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>

    </html>


<?php

}


?>