<?php
    include_once'manage.php';
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Menu</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <meta http_equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Ayush Mallick">
</head>
<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
         <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand">ADMIN</a>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
      <div class="nav-left-sidebar sidebar-dark" background="../background1.png">
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="menu-list" style="overflow: hidden; width: auto; height: 100%;">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    </button>
                    <div class="navbar-collapse collapse " id="navbarNav" style="">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                            </li>
                            <li class="nav-item">
                                <a class="" href="dashboard.php" style="float: right">admin </a>
                                        </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="file:///C:/Users/hp/Desktop/dashboard.php" data-toggle="collapse" aria-expanded="true" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Administrator<span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="submenu collapse show" style="">
                                    <ul class="nav flex-column">
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="mypage.php">User Login</a>
                                        </li>
                                        <li class="nav-item">
                                            
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="menu.php">Add Menu</a>
                                        </li>
                                        <li class="nav-item">
                                                        <a class="nav-link" href="billing.php">Billing</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>   
                                    </ul>
                                </div>                                                        
                    </nav>
            </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 657px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12"> 
                        <h1 class="text-center">Menu</h1><hr>
                        <?php if(isset($_SESSION['response'])){ ?>
                        <div class="alert alert-<?= $_SESSION['res_type']; ?> alert-dismissible text-center" >
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <b ><?= $_SESSION['response']; ?></b>    
                            <?php } unset($_SESSION['response']); ?>
                        </div>
                    </div>
                </div>    
                <div class="row">
                <div class="col-md-4">
                    <h3 class="text-center text-info">Add Menu</h3>
                         <form action="manage.php" method="post" enctype="multipart/form-data">
							 <input type="hidden" name="name" value="<?= $id; ?>">
                             <div class="form-group">
                                 <input type="text" name="itemname" class="form-control" value="<?= $itemname; ?>" placeholder="Enter Item Name" required>
                             </div>
                             <div class="form-group">
                                 <input type="text" name="price" class="form-control" value="<?= $price; ?>" placeholder="Enter Price Name" required>
                             </div>
                             <div class="form-group">
								 <input type="hidden" name="oldimage" value="<?= $photo; ?>">	
                                 <input type="file" name="image" class="custom-file" style="" >
								 <img src="<?= $photo; ?>" width="120" class="img-thumbnail">
                             </div>
                             <div class="form-group">
								<?php if($update==true){ ?>
									<input type="submit" name="update" class="btn btn-success btn-block" value="Update Menu">
								<?php } else{ ?>
									<input type="submit" name="add" class="btn btn-primary btn-block" value="Add Menu">
								<?php } ?>
                             </div>
                        </form> 
                        </div>
                        <div class="col-md-8">
                            <?php 
                                $query="SELECT * FROM menu";
                                $stmt=$conn->prepare($query);
                                $stmt->execute();
                                $result=$stmt->get_result();
                            ?>
                            <h3 class="text-center text-info">Menu Available</h3>
                             <table class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <th>Image</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 <?php while($row=$result->fetch_assoc()){ ?>    
                                  <tr>
                                    <td><img src="<?= $row['photo']; ?>" width="42"></td>
                                    <td><?= $row['itemname']; ?></td>
                                    <td><?= $row['price']; ?></td>  
                                    <td>
                                       <a href="manage.php?delete=<?= $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want to delete yhis record ?');" >Delete</a>
                                       <a href="menu.php?edit=<?= $row['id']; ?>" class="badge badge-success p-2">Edit</a> 
                                    </td>
                                  </tr>
                                  <?php }?>  
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
               
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
</body>
 
</html>