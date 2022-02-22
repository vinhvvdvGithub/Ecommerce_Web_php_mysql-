<?php 
    session_start();
 require "config.php";
 require "models/db.php";
 require "models/product.php";
 require "models/protype.php";
 require "models/cart.php";
 require "models/manufacture.php";
 $product = new Product;
 $protype = new Protype;
 $manufacture = new Manufacture;
 $cart = new Cart ; 
  //$id=0;
    if(isset($_GET['id'])){
        $id = $_GET['id'];            
    }
    else{
        echo "Khong nhan duoc gi ";
    }
    if(!isset($_GET['quanlity'])){
        $_GET['quanlity']=1;
    }

    if(isset($_SESSION['user'])){
        $_SESSION['cart'] = $cart->getCart($_SESSION['user']);
    
    }
   
   
    $allProducts = $product->detail($id);
    $getManuTypeID = $product->getTypeManuID($id);
    $getManuName = $manufacture->getManuNameByID($getManuTypeID[0]['Manu_ID']);
    $getRelatedProduct = $product->getRelatedProduct($getManuTypeID[0]['Manu_ID'], $getManuTypeID[0]['Type_ID']);

  
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
                            <!-- <li><a href="cart.php?id=<?php  $_SESSION['cart'] ?>">Cart</a></li> -->
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
                    <div class="product-details">
                        <!--product-details-->


                        <div class="col-sm-5">
                            <div class="view-product">

                                <img src="./public/images/<?php echo $allProducts[0]['Image'] ?>"
                                height="250" width="250" alt="Example of resizing an image" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information">
                                <!--/product-information-->
                                <h2><?php echo $allProducts[0]['Name'] ?></h2>
                                <span>


                                <form action="addcart.php?id=<?php echo  $allProducts[0]['ID'] ?>" method="get">
                                <span><?php echo $allProducts[0]['Price'] ?></span>
                                    <label>Quantity:</label>    
                                    <input type="text" value="<?php  echo $_GET['quanlity']?>" name="quanlity"/>
                                    <button type="button" class="btn btn-fefault cart">
                                    <a href="addcart.php?id=<?php echo  $allProducts[0]['ID'] ?>"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    </button>
                                

                        <!--    <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                                <span>Quantity:</span>
                                <div class="quantity_selector">
                                    <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                    <span id="quantity_value">1</span>
                                    <input type="text" name="quanlity" id="val_quanlity" value="1" style="width: 20px; display: none">
                                    <input type="text" name="id" value="<?php echo $_GET['p'] ?>" style="display: none">
                                    <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                </div>
                                <div class="red_button add_to_cart_button"><input style="border: 0; background: none; color: white; font-size: 17px" type="submit" value="Add to cart"></div>
                                <div class="product_favorite d-flex flex-column align-items-center justify-content-center" style="background-image: url(public/image<?php echo $pd['image']." " ?>)"></div>
                            </div> -->
                            </form>


                                <!--
                                    <span><?php echo $allProducts[0]['Price'] ?></span>
                                    <label>Quantity:</label>
                                    <input type="text" value="<?php  echo $_GET['quanlity']?>" name="quanlity"/>
                                    <button type="button" class="btn btn-fefault cart">
                                    <a href="addcart.php?id=<?php echo  $allProducts[0]['ID'] ?>"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                    </button>
                                </span>
-->

                                <p><b>Availability:</b> In Stock</p>
                                <p><b>Condition:</b> New</p>
                                <p><b>Brand:</b> <?php echo $getManuName[0]['manu_Name']?></p>
                                <p><b>Detai:</b><?php echo $allProducts[0]['Description']?> </p>
                            </div>
                            <!--/product-information-->
                        </div>

                       
                    </div>
                    <div class="features_items">
                        <!--related_items-->
                        <h2 class="title text-center">Related Items</h2> 
                        <?php 
                        foreach($getRelatedProduct as $key => $value)
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
                                           
                                            <a href="addcart.php?id=<?php echo  $value['ID']?>" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>                         
                            </div>              
                        </div>
                        <?php } ?>
                    </div>
                    <!--related_items-->
                    <!--/product-details-->
                    <!--features_items-->
                </div>
                <!-- <div class="col-sm-9 padding-right">
                    
                </div> -->
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