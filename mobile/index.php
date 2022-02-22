<!DOCTYPE html>
<html lang="en">
<?php
session_start();

require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
require "models/cart.php";
$product = new Product;
$manufacture = new Manufacture;
$protype = new Protype;
$cart = new Cart;

    if(isset($_SESSION['user'])){
        $_SESSION['cart'] = $cart->getCart($_SESSION['user']);
    
    }
   
   
// if(!isset($_SESSION['user'] ))
// {
//     header("location: ../mobilelogin.php");
// }

// if(!isset($_SESSION['user']))
// 	{
// 		$_SESSION['user'] =  2;
// 	}
// 	$cart = new Cart;
// 	$_SESSION['cart'] = $cart->getCart($_SESSION['user']);

//var_dump($_SESSION['cart']);
//var_dump($product->getAllFeatureProducts());
?>
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
                            <li class="dropdown"><a href="cate.php">Products<i class="fa fa-angle-down"></i></a>
                              
                               <!-- menu manufacture -->
                               <ul role="menu" class="sub-menu">
                               <?php 
                                foreach($protype->getAllProtype() as $key => $value){
                               // var_dump($value);                               
                                ?>
                                  
                                    <li><a href="cate.php?id=<?php echo $value['type_ID'] ?>"><?php echo $value['type_Name'] ?></a></li>                                  
                                <?php  } ?>
                                </ul>

                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Blog List</a></li>
                                    <li><a href="#">Blog Single</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="#">Contact</a></li>
                            <li><a href="cart.php">Cart</a></li>

                            <?php
                            if (isset($_SESSION['user'])){
                                $user = $_SESSION['user'];
                            ?>     
                            <li class="dropdown"><a href="#">Hello <?php echo $user;?><i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Account information</a></li>
                                    <li><a href="logout.php">Log out <i class="fa fa-sign-out" style="font-size:24px"></i></a></li>
                                </ul>
                            </li>
                            <?php
                            }
                            else{
                            ?>
                            <li><a href="../mobilelogin.php">Login</a></li>
                            <?php
                            }
                            ?>
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
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            <?php
                                foreach($manufacture->getAllManufactures() as $key => $value){
                            ?>
                                <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="manu.php?id=<?php echo $value['manu_ID']?>"><?php echo $value['manu_Name'] ?></a></h4>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>

                
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">Features Items</h2> 
                        <?php 
                        foreach($product->lay3SanPhamNoiBat() as $key => $value)
                        {

                        //var_dump($value);
                        
                        ?>                     
                        <div class="col-sm-4">                           
                            <div class="product-image-wrapper">                           
                                <div class="single-products">
                                    <div class="productinfo text-center"> <img
                                            src="./public/images/<?php echo $value['Image']; ?>" height="250" width="250" alt="Example of resizing an image" />
                                        <h2><?php  echo number_format($value['Price']) ?></h2>
                                        <p></p>
                                        <a href="" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to
                                            cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php  echo number_format($value['Price'])?></h2>
                                            <p><a href="detail.php?id=<?php echo $value['ID']; ?>"><?php echo $value['Name'] ;?></a></p>
                                           
                                            <a href="detail.php?id=<?php echo  $value['ID']?>" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>                         
                            </div>              
                        </div>
                        <?php } ?>
                    </div>
                    <!--features_items-->

                    <!--feature_phones-->
                    <div class="features_items">
                        <h2 class="title text-center">Features Phone</h2> 
                        <?php 
                        foreach($product->getAllFeaturePhone() as $key => $value)
                        {

                        //var_dump($value);
                        
                        ?>                     
                        <div class="col-sm-4">                           
                            <div class="product-image-wrapper">                           
                                <div class="single-products">
                                    <div class="productinfo text-center"> <img
                                            src="./public/images/<?php echo $value['Image']; ?>" height="250" width="250" alt="Example of resizing an image" />
                                        <h2><?php  echo number_format($value['Price']) ?></h2>
                                        <p></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to
                                            cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php  echo number_format($value['Price'])?></h2>
                                            <p><a href="detail.php?id=<?php echo $value['ID']; ?>"><?php echo $value['Name'] ;?></a></p>
                                           
                                            <a href="detail.php?id=<?php echo  $value['ID']?>" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>                         
                            </div>              
                        </div>
                        <?php } ?>
                    </div>
                    <!--feature_phones-->

                    <!--feature_laptop-->
                    <div class="features_items">
                        
                        <h2 class="title text-center">Features Laptop</h2> 
                        <?php 
                        foreach($product->getAllFeatureLaptop() as $key => $value)
                        {

                        //var_dump($value);
                        
                        ?>                     
                        <div class="col-sm-4">                           
                            <div class="product-image-wrapper">                           
                                <div class="single-products">
                                    <div class="productinfo text-center"> <img
                                            src="./public/images/<?php echo $value['Image']; ?>" height="250" width="250" alt="Example of resizing an image" />
                                        <h2><?php  echo number_format($value['Price']) ?></h2>
                                        <p></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to
                                            cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php  echo number_format($value['Price'])?></h2>
                                            <p><a href="detail.php?id=<?php echo $value['ID']; ?>"><?php echo $value['Name'] ;?></a></p>
                                           
                                            <a href="detail.php?id=<?php echo  $value['ID']?>" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>                         
                            </div>              
                        </div>
                        <?php } ?>
                    </div>
                    <!--feature_laptop-->

                    
                    <!--features_tablet-->
                    <div class="features_items">
                        
                        <h2 class="title text-center">Features Tablet</h2> 
                        <?php 
                        foreach($product->getAllFeatureTablet() as $key => $value)
                        {

                        //var_dump($value);
                        
                        ?>                     
                        <div class="col-sm-4">                           
                            <div class="product-image-wrapper">                           
                                <div class="single-products">
                                    <div class="productinfo text-center"> <img
                                            src="./public/images/<?php echo $value['Image']; ?>" height="250" width="250" alt="Example of resizing an image" />
                                        <h2><?php  echo number_format($value['Price']) ?></h2>
                                        <p></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to
                                            cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php  echo number_format($value['Price'])?></h2>
                                            <p><a href="detail.php?id=<?php echo $value['ID']; ?>"><?php echo $value['Name'] ;?></a></p>
                                           
                                            <a href="detail.php?id=<?php echo  $value['ID']?>" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>                         
                            </div>              
                        </div>
                        <?php } ?>
                    </div>
                    <!--features_tablet-->

                    <!--features_speaker-->
                    <div class="features_items">
                        <h2 class="title text-center">Features Speaker</h2> 
                        <?php 
                        foreach($product->getAllFeatureSpeaker() as $key => $value)
                        {

                        //var_dump($value);
                        
                        ?>                     
                        <div class="col-sm-4">                           
                            <div class="product-image-wrapper">                           
                                <div class="single-products">
                                    <div class="productinfo text-center"> <img
                                            src="./public/images/<?php echo $value['Image']; ?>" height="250" width="250" alt="Example of resizing an image" />
                                        <h2><?php  echo number_format($value['Price']) ?></h2>
                                        <p></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to
                                            cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php  echo number_format($value['Price'])?></h2>
                                            <p><a href="detail.php?id=<?php echo $value['ID']; ?>"><?php echo $value['Name'] ;?></a></p>
                                           
                                            <a href="detail.php?id=<?php echo  $value['ID']?>" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>                         
                            </div>              
                        </div>
                        <?php } ?>
                    </div>
                    <!--features_speaker-->

                    <!--features_powerbank-->
                    <div class="features_items">
                        <h2 class="title text-center">Features PowerBank</h2> 
                        <?php 
                        foreach($product->getAllFeaturePowerBank() as $key => $value)
                        {

                        //var_dump($value);
                        
                        ?>                     
                        <div class="col-sm-4">                           
                            <div class="product-image-wrapper">                           
                                <div class="single-products">
                                    <div class="productinfo text-center"> <img
                                            src="./public/images/<?php echo $value['Image']; ?>" height="250" width="250" alt="Example of resizing an image" />
                                        <h2><?php  echo number_format($value['Price']) ?></h2>
                                        <p></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to
                                            cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php  echo number_format($value['Price'])?></h2>
                                            <p><a href="detail.php?id=<?php echo $value['ID']; ?>"><?php echo $value['Name'] ;?></a></p>
                                           
                                            <a href="detail.php?id=<?php echo  $value['ID']?>" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>                         
                            </div>              
                        </div>
                        <?php } ?>
                    </div>
                    <!--features_powerbank-->



                    <!--news itmes-->            
                    <div class="news_items">
                        <!--New_items-->
                        <h2 class="title text-center">New Items</h2>
                        <?php 
                        foreach ($product->lay3SanPhamMoiNhat() as $key => $value) {
                                              
                            //var_dump($value);
                        ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center"> <img
                                            src="./public/images/<?php echo $value['Image'] ?>" height="250" width="250" alt="Example of resizing an image" />
                                        <h2><?php  echo number_format($value['Price']) ?></h2>
                                        <p></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to
                                            cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?php echo number_format($value['Price'])?></h2>
                                            <p><a href="detail.php?id=<?php echo $value['ID'];?>"><?php echo $value['Name'] ?></a></p>
                                           
                                            <a href="detail.php?id=<?php echo  $value['ID']?>" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>                  
                    </div>
                    
                    <!--news itmes-->


                    

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