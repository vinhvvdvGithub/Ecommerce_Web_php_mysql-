<?php
session_start();
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
require "models/cart.php";
$products = new Product;
$cart = new Cart;
if(isset($_SESSION['user'])){
    $_SESSION['cart'] = $cart->getCart($_SESSION['user']);

}
else{
    header('location: ../mobilelogin.php');
}

  
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mobile Shopping</title>
    <link rel="icon" href="./images/logo.png" type="image/icon type">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->


<body>

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                        <div class="logo"> <a href="index.php"><img src="images/logo.png" alt="" /></a> </div>
                    </div>
                    <div class="mainmenu pull-right">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php" class="active">Home</a></li>
                            <li class="dropdown"><a href="index.php">Products<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="?type_id=1">Cellphone</a></li>
                                    <li><a href="?type_id=2">Tablet</a></li>
                                    <li><a href="?type_id=3">Laptop</a></li>
                                    <li><a href="?type_id=4">Speaker</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Blog List</a></li>
                                    <li><a href="#">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="cart.php?">Cart</a></li>
                        </ul>
                        <div class="search_box pull-right">
                            <form action="result.php" method="get">
                                <input type="text" placeholder="Search" name="key" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
    </header>
    <!--/header-->
    <section>
        <section id="cart_items">
            <div class="container">
                <h3>Your shopping cart</h3>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="description">Name</td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                      <!--
                        <?php 
                        
                        foreach($_SESSION['cart'] as $myCart=>$key) {
                            $price;
                            $getProductById = $products->detail($key['Product_ID']);
                            //var_dump( $getProductById);
                            foreach($getProductById as $pInfo=>$get)
                            {   
                                 
                        ?>



                                <td class="image"> <img src="public/images/<?php echo $get['Image'] ?>"></td>
                                <td class="description"></td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                                <td></td>

                        <?php } } ?>        
                        -->

                   
                   <?php
                        
                        foreach ($_SESSION['cart']  as $key => $value) {
                           // var_dump($value['Cart_ID']);
                            $getProductById = $products->detail($value['Product_ID']);
                            //  var_dump($getProductById );
                            foreach($getProductById as $pInfo=>$get)
                            {  
                               
                            
                                $price = $get['Price'];
                              
                        ?>


                        <tr>
                                <td class="cart_product">
                                    <a href=""><img src="public/images/<?php echo $get['Image'] ?>" alt=""
                                            width=110></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="detail.php?id=<?php echo $value['Product_ID']?>"><?php echo $get['Name'] ?></a></h4>
                                </td>
                                <td class="cart_price">
                                    <p><?php      echo number_format( $price) ?></p>
                                </td>
 <!--
                                <td>

                                <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                        
                                <div class="quantity_selector">
                                    <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                    <span id="quantity_value">1</span>
                                    <input type="text" name="quanlity" id="val_quanlity" value="1" style="width: 20px; display: none">
                                    <input type="text" name="id" value="<?php echo $get['ID'] ?>" style="display: none">
                                    <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                </div>
                                <div class="red_button add_to_cart_button"><input style="border: 0; background: none; color: white; font-size: 17px" type="submit" value="Add to cart"></div>
                               
                            </div>
                                </td>
                               -->

                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href="addcart.php?id=<?php echo $get['ID'] ?>"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $value['Quanlity']?>"
                                            autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href="deQuanlity.php?id=<?php echo $value['Cart_ID'] ?>"> - </a>
                                    </div>
                                </td>



                                <td class="cart_total">
                                    <p class="cart_total_price"><?php  echo number_format($value['Quanlity']*$price)  ?> VND</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="./deletecart.php?id=<?php  echo $value['Cart_ID']?>"><i
                                            class="fa fa-times"></i></a>
                                </td>
                         </tr>
                    <?php  } } ?>

                           <!-- <tr>
                                <td class="cart_product">
                                    <a href=""><img src="images/iphone-6s-plus-128gb-400-1-400x450.png" alt=""
                                            width=110></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="detail.php?45">Điện thoại iPhone 6s Plus 128GB</a></h4>
                                </td>
                                <td class="cart_price">
                                    <p>27,490,000 VND</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href="#"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="4"
                                            autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href="#"> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">109,960,000 VND</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="#"><i
                                            class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="images/lenovo-phab-2gb-400x460-400x460.png" alt=""
                                            width=110></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="detail.php?77">Máy tính bảng Lenovo Phab 2GB</a></h4>
                                </td>
                                <td class="cart_price">
                                    <p>4,490,000 VND</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href="#"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="1"
                                            autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href="#"> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">4,490,000 VND</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="#"><i
                                            class="fa fa-times"></i></a>
                                </td>
                            </tr>-->

                        </tbody>
                    </table>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post"
                        action="?order=ordered">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" placeholder="Phone number">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" class="form-control" rows="3"
                                placeholder="Your Message Here"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <a class="btn btn-default update" href="index.php">Continue Buying</a>
                            <a class="btn btn-default check_out" href="#">Delete All</a>
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Order">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--/#cart_items-->
        <!--features_items-->
        </div>
        </div>
    </section>
    <footer id="footer">
        <!--Footer-->

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank"
                                href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>
    </footer>
    <!--/Footer-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    
</body>

</html>