<?php 

    include "header.php";
    $id;
    if(isset($_GET['id'])){
       $id=$_GET['id'];
    }
    $manuByID= $manuAdmin->getManuByID( $id);
   // var_dump($manuByID);
?>
<!-- BEGIN CONTENT -->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
		<h1>Edit Manufactures</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
						<h5>Product Detail</h5>
					</div>
					<div class="widget-content nopadding">
                        <?php
                           
                            foreach($manuByID as $key=>$value)
                            {
                                ?>
						<!-- BEGIN USER FORM -->
						<form action="editmn.php?id=<?php echo $value['manu_ID'] ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
							<div class="control-group">
							<input type="hidden" name="id" value=<?php echo $id; ?>/>
								<label class="control-label">Manufacture Name :</label>
								<div class="controls">
									<input type="text" class="span11" placeholder="Manufacture name" name="manu_name" value="<?php echo $value['manu_Name'] ?>" /> *
								</div>
							</div>

	
							<div class="control-group">
									<label class="control-label">Choose an image :</label>
									<div class="controls">
										<input type="file" name="fileUpload" id="fileUpload">
									</div>
								</div>
	

								<div class="form-actions">
									<button type="submit" class="btn btn-success">Save</button>
								</div>
							</div>

						</form>
						<!-- END USER FORM -->
                            <?php } ?>

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