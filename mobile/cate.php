<!DOCTYPE html>
<html lang="en">
<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
$product = new Product;
$manufacture = new Manufacture;
$protype = new Protype;
    //var_dump($product->getAllFeatureProducts());
    $manu_id =0;
    if(isset($_GET['id'])){
        $manu_id = $_GET['id'];
    }
    else{
         echo "Khong nhan duoc id";
    }
    $detailProtype = $protype->getProtypeByID($manu_id);
    $productsByProtype = $protype->getAllProductsByProtype($manu_id);
   // var_dump($productsByProtype);
    //var_dump($detailProtype);
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
                            <li><a href="cate.php?id=<?php echo $manu_id?>" class="active">Home</a></li>
                            <li class="dropdown"><a href="">Products<i class="fa fa-angle-down"></i></a>
                                <!-- menu manufacture -->
                                <ul role="menu" class="sub-menu">
                                    <?php 
                                foreach($protype->getAllProtype() as $key => $value){
                               // var_dump($value);                               
                                ?>

                                    <li><a
                                            href="cate.php?id=<?php echo $value['type_ID'] ?>"><?php echo $value['type_Name'] ?></a>
                                    </li>
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
                            <li><a href="cart.html?">Cart</a></li>
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
                        <h2 class="title text-center"><?php echo $detailProtype[0]['type_Name'] ?></h2>
                        <?php 
                        foreach($productsByProtype as $key => $value)
                        {

                       // var_dump($value);
                        
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
                                            <a href="cart.html?45" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>                         
                            </div>              
                        </div>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    <ul class="pagination col-sm-12">