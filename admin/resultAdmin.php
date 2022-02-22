<?php 

    include "header.php";
    require_once "./models/db.php";
    if(!isset( $_GET['key'])){
        echo"khong nhan duoc key";
    }
?>
<!-- BEGIN CONTENT -->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
		<h1>Search Result:<?php echo  $_GET['key']; ?></h1>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><a href="form.html"> <i class="icon-plus"></i> </a></span>
						<h5>Products</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th></th>
								<th>Name</th>
								<th>Category</th>
								<th>Producer</th>
								<th>Description</th>
								<th>Price (VND)</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
								
								
								if(isset($_GET['page']))
									{
										$searchDescriptionForAdmin = $productAdmin->searchDescriptionForAdmin($_GET['page'], $_GET['key']);
									}
								else{
										$searchDescriptionForAdmin = $productAdmin->searchDescriptionForAdmin(1, $_GET['key']);
										$_GET['page'] = 1;
								}
								echo count($searchDescriptionForAdmin)." RESULTS";
                                foreach($searchDescriptionForAdmin as $key=>$vaule)                               
								{
									?>
									<tr class="">
									<td><img src="../mobile/public/images/<?php echo $vaule['Image'] ?>" /></td>
									<td><?php echo $vaule['Name'] ?></td>
									<td>
									<?php $typename = $productAdmin->getTypes($vaule['Type_ID']); 
									foreach($typename as $name=>$num) echo $num['type_Name']?>
									</td>
									<td>
									<?php $manuname = $productAdmin->getManu($vaule['Manu_ID']) ;
									foreach($manuname as $name=>$num) echo $num['manu_Name']?>
									</td>
									<td><?php echo $vaule['Description'] ?></td>
									<td><?php echo $vaule['Price']?></td>
									<td>
									<a href="editproduct.php?id=<?php echo $vaule['ID'] ?>" class="btn btn-success btn-mini">Edit</a>
									<a href="deletepd.php?id=<?php echo $vaule['ID'] ?>" class="btn btn-danger btn-mini">Delete</a>
								</td>
									</tr>
								<?php
								}
							?>
							
							</tbody>
						</table>
						<ul class="pagination">
								<?php $productAdmin->splitAdminResult($_GET['page'], $_GET['key']) ?>
						</ul>
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