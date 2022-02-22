<?php 
    require "./models/db.php";
    include "header.php";
?>

<!-- BEGIN CONTENT -->
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i>
                    Home</a></div>
            <h1>Add New Manufacture</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                            <h5>Manufacture info</h5>
                        </div>
                        <div class="widget-content nopadding">

                       	<!-- BEGIN USER FORM -->
						<form action="addmn.php" method="post" class="form-horizontal" enctype="multipart/form-data">
							<div class="control-group">
								<label class="control-label">Manufacture Name :</label>
								<div class="controls">
									<input type="text" class="span11" placeholder="Manufacture name" name="manu_name" /> *
								</div>
							</div>

	
							<div class="control-group">
									<label class="control-label">Choose an image :</label>
									<div class="controls">
										<input type="file" name="fileUpload" id="fileUpload">
									</div>
								</div>
	

								<div class="form-actions">
									<button type="submit" class="btn btn-success">Add</button>
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