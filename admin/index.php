<?php
  
    require "./models/db.php";
    
    include "header.php";
    $productByPage;
    $page;
    
    if(!isset($_GET['page'])){
        $page=1;
        $productByPage = $productAdmin->getProductsForAdminByPage( $page);
       
    }
    else{
        $page=$_GET['page'];
        $productByPage = $productAdmin->getProductsForAdminByPage($page);

    }
    
  
?>
    
    <!-- BEGIN CONTENT -->
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom current"><i
                        class="icon-home"></i> Home</a></div>
            <h1>Manage Products</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><a href="addproduct.php"> <i class="icon-plus"></i>
                                </a></span>
                            <h5>Products</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Manufactures</th>
                                        <th>Product type</th>
                                        <th>Description</th>
                                        <th>Price (VND)</th>
                                        <th>Feature</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                 //var_dump($_GET['page']);

                                        // if(isset($_GET['page'])){
                                        //       $page=$_GET['page'];
                                        //     $productByPage = $productAdmin->getProductsForAdminByPage($page);
                                        // }
                                        // else{
                                        //     $_GET['page']=1;
                                        //     $productByPage = $productAdmin->getProductsForAdminByPage(1);
                                           
                                        // }

                                   
                                    //var_dump($productByPage);
                                    foreach($productByPage as $key=>$value)
									//var_dump($getProductsByPage);
									{
										?>
										<tr class="">
										<td width="250"><img
                                                src="../mobile/public/images/<?php echo $value['Image']?>" alt=""/>
                                        </td>
											<td><?php echo $value['Name'] ?></td>									
											<td><?php $manuname = $productAdmin->getManu($value['Manu_ID']) ;foreach($manuname as $name=>$num) echo $num['manu_Name']?></td>
                                            <td><?php $typename = $productAdmin->getTypes($value['Type_ID']); foreach($typename as $name=>$num) echo $num['type_Name']?></td>
                                            <td><?php echo $value['Description']?></td>
                                            <td><?php echo number_format($value['Price'])?></td>
                                            <td><?php echo $value['Feature']?></td>
                                            <td>2020-10-22 00:00:00</td>
											<td>
									<a href="editproduct.php?id=<?php echo $value['ID'] ?>" class="btn btn-success btn-mini">Edit</a>
									<a href="deletepd.php?id=<?php echo $value['ID'] ?>" class="btn btn-danger btn-mini">Delete</a>
								</td>
								</tr>
										<?php

									}
								?>






                                <!-- <?php
                                    $productByPage = $productAdmin->getProductsForAdminByPage($page);
                                        foreach($productAdmin->getProductAdmin() as $key => $value){
                                    ?>
                                    <tr class="">
                                        <td width="250"><img
                                                src="../mobile/public/images/<?php echo $value['Image']?>" alt=""/>
                                        </td>
                                        <td><?php echo $value['Name']?></td>
                                        <td><?php echo $value['manu_Name']?></td>
                                        <td><?php echo $value['type_Name']?></td>
                                        <td><?php echo $value['Description']?></td>
                                        <td><?php echo number_format($value['Price'])?></td>
                                        <td><?php echo $value['Feature']?></td>
                                        <td>2020-10-22 00:00:00</td>
                                        <td>
                                            <a href="" class="btn btn-success btn-mini">Edit</a>
                                            <a href="deletepd.php?id=<?php echo $value['ID']?>" class="btn btn-danger btn-mini">Delete</a>
                                        </td>
                                    </tr>
                                    <?php 
                                        }
                                    ?> -->
                                </tbody>
                            </table>
                            <div class="row" style="margin-left: 18px;">
                                <ul class="pagination">
                                  <!--  <li class="active"><a href="">1</a>  </li> -->
                                  <?php 
                                  $productAdmin->splitAdminIndex($page);
                                  ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
    <!--Footer-part-->
    <div class="row-fluid">
        <div id="footer" class="span12"> 2017 &copy; TDC - Lập trình web 1</div>
    </div>
    <!--end-Footer-part-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.ui.custom.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.uniform.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/matrix.js"></script>
    <script src="js/matrix.tables.js"></script>
</body>

</html>