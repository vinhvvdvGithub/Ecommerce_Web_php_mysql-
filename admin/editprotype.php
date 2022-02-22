<?php 

    include "header.php";

?>
<!-- BEGIN CONTENT -->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
		<h1>Edit Protype</h1>
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

                        <!-- BEGIN USER FORM -->
                        <?php
                            
                           
							 $getProtypeByID = $protyepAdmin->getProtypeByID($_GET['id']);
							 foreach($getProtypeByID as $key=>$value)
                        ?>
						<form action="editpt.php?id=<?php echo $_GET['id'] ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
							<div class="control-group">
							<input type="hidden" name="id" value=<?php echo $_GET['id']; ?>/>
								<label class="control-label">Protype Name :</label>
								<div class="controls">
									<input type="text" class="span11" placeholder="Protype name" name="type_name" value="<?php echo $value['type_Name'] ?>"/> *
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
<script src="public/js/jquery.min.js"></script>
<script src="public/js/jquery.ui.custom.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/jquery.uniform.js"></script>
<script src="public/js/select2.min.js"></script>
<script src="public/js/jquery.dataTables.min.js"></script>
<script src="public/js/matrix.js"></script>
<script src="public/js/matrix.tables.js"></script>
</body>
</html>


