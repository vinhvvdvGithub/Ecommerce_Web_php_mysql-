<?php 

    include "header.php";
?>
<!-- BEGIN CONTENT -->
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom current"><i
                        class="icon-home"></i> Home</a></div>
            <h1>Manage Manufacture</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><a href="./addmanu.php"> <i class="icon-plus"></i>
                                </a></span>
                            <h5>Manufacture</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Manu Id</th>
                                        <th>Manu Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($manuAdmin->getAllManufactures() as $key => $value){ ?>
                                    <tr class="">
                                        <td><?php echo $value['manu_ID']?></td>
                                        <td><?php echo $value['manu_Name']?></td>
                                        <td><img
                                            src="../mobile/public/images/<?php echo $value['manu_Image']?>" height="75" width="75" alt="Example of resizing an image"></td>

                                        <td>
                                            <a href="editmanu.php?id=<?php echo $value['manu_ID']?>" class="btn btn-success btn-mini">Edit</a>
                                            <a href="deletemanu.php?id=<?php echo $value['manu_ID']?>" class="btn btn-danger btn-mini">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                     ?>
                                </tbody>
                            </table>
                            <div class="row" style="margin-left: 18px;">
                                <ul class="pagination">
                                    <li class="active"></li>
                                    
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