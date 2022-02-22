<?php 
    include "header.php";
?>
<!-- BEGIN CONTENT -->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
		<h1>Manage Protypes</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><a href="addprotype.php"><i class="icon-plus"></i></a></span>
						<h5>Products</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>Type_ID</th>
								<th>Type_Name</th>
                                <th>Type_image</th>
                                <th>Actions</th>
							</tr>
							</thead>
							<tbody>
                                <?php 
                                   
                                 // $manuAdmin->getAllProtype();
                                   
								foreach ($protyepAdmin->getAllProtype() as $key=>$value)
								{
                                    
									?>
										<tr class="">
										<td><?php echo $value['type_ID']?></td>
										<td><?php echo $value['type_Name']?></td>
										<td><img
                                            src="../mobile/public/images/<?php echo $value['type_Image']?>" height="75" width="75" alt="Example of resizing an image"></td>

                                        <td>
										<td>
									<a href="editprotype.php?id=<?php echo $value['type_ID'] ?>" class="btn btn-success btn-mini">Edit</a>
									<a href="deleteprotype.php?id=<?php echo $value['type_ID']?>" class="btn btn-danger btn-mini">Delete</a>
								</td>
								</tr>
									<?php
								}
								?>
							

							</tbody>
						</table>
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
