<?php 

  include "header.php";
  $id=0;
  if(isset($_GET['id'])){
    $id =$_GET['id'];
  }

  $productByID=$productAdmin->getProductByID($id);
  
  //var_dump($productByID);
  
?>

    <!-- BEGIN CONTENT -->
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i>
                    Home</a></div>
            <h1>Edit Product</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Product info</h5>
                        </div>
                        <div class="widget-content nopadding">

                        

                            <!-- BEGIN USER FORM -->
                            <?php 
                                foreach ($productByID as $KEY => $VALUE) {
                                
                                
                            ?>
                            <form action="editpd.php?id=<?php echo $id ?>" method="post" class="form-horizontal"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id" value=<?php echo $id; ?>/>
                                <div class="control-group">
                                    <label class="control-label">Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" placeholder="Product name" name="name" value="<?php echo $VALUE['Name'] ?>" /> *
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Choose a manufacture:</label>
                                    <div class="controls">
                                        <select name="manu_id" id="cate">
                                        <?php 
                                        
                                        foreach($manuAdmin->getAllManufactures() as $key => $value){

                                        
                                        ?>
                                        <option <?php  if($VALUE['Manu_ID'] == $value['manu_ID']){ echo "selected='selected'";} ?> value="<?php echo $value['manu_ID'] ?>"><?php echo $value['manu_Name'] ?></option> 
                                          
                                            <!-- <option value="<?php echo $value['manu_ID'] ?>"><?php echo $value['manu_Name'] ?></option> -->
                                        <?php } ?>   

                                        </select> *
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Choose a product type:</label>
                                    <div class="controls">
                                        <select name="type_id" id="subcate">
                                                   
                                        <?php 
                                        
                                        foreach($protyepAdmin->getAllProtype() as $key => $value){
                  
                                        ?>

                                            <option  <?php  if($VALUE['Type_ID'] == $value['type_ID']){ echo "selected='selected'";} ?>  value="<?php echo $value['type_ID']?>"><?php echo $value['type_Name'] ?></option>
                                            <!-- <option value="<?php echo $value['type_ID']?>"><?php echo $value['type_Name'] ?></option> -->

                                        <?php } ?>    
                                        </select> *
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Choose an image :</label>
                                        <div class="controls">
                                            <img src="../mobile/public/images/<?php echo $VALUE['Image'] ?>"alt="" width="100px">
                                            <input type="file" name="fileUpload" id="fileUpload" >
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Description</label>
                                        <div class="controls">
                                            <textarea class="span11" placeholder="Description"
                                                name="description" ><?php echo $VALUE['Description'] ?></textarea>
                                                <script>CKEDITOR.replace('description');</script>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Price :</label>
                                            <div class="controls">
                                                <input type="text" class="span11" placeholder="price" name="price" value="<?php echo $VALUE['Price'] ?>"/> *
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Feature :</label>
                                            <div class="controls">
                                                <input type="number" class="span11" name="feature" min="0" max="1" value="<?php echo $VALUE['Feature'] ?>" /> *
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                            </form>
                             <?php } ?>
                            <!-- END USER FORM -->
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

