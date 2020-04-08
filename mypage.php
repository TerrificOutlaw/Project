<?php
    include 'users.php';
?>
<!DOCTYPE html>
<!-- saved from url=(0039)file:///C:/Users/hp/Desktop/mypage.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Userlogin</title>
    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <meta charset="UTF-8">
  <meta http_equiv="X-UA-Compatible" content="IE=edge">
   <meta name="author" content="Samruddhi Moharkar">
  
    
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
      <div class="nav-left-sidebar sidebar-dark">
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div class="menu-list" style="overflow: hidden; width: auto; height: 100%;">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
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
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="users.php" method="post"  enctype="multipart/form-data">
                        <h2>USER ACCOUNTS</h2>  
                            <div class="container">
                            <div class="form-group">
                           <h4> <lable>User Type:</lable>
                            <select name="usertype" style="min-height:30px;width:170px;margin-left:30px" >
                          <option value="select type" ><label>Select Type </label></option>
                            <option value="chef">Chef</option>
                            <option value="Waiter">Waiter</option>
                               </select>    </h4> <br> 
                                </div>
                                <div class="form-groups">
                            <h4><label>Username:</label><input type="text" style="right;margin-left:35px" name="username" required></h4><br>
                                </div>
                                <div class="form-group">
                            <h4><label>Password:</label><input type="password" style="right;margin-left:35px" name="password" required></h4><br>
                                    </div>
                                <div class="form-group">
                        <button type="submit" name="insert" class="btn-btn-primay" value="add record" > Submit </button></div><br>
                                </div>
                          </form><hr>
                        <?php   
                        if(isset($_SESSION['response'])){?>    
                        
                <div class="alert alert-<?= $_SESSION['res_type'];?> alert-dismissible text-center">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                   <b class="text-center"> <?= $_SESSION['response']; ?></b>
  
</div>
            <?php } unset($_SESSION['response']); ?>
            <?php
                  $query="select * from users";
                  $stmt=$conn->prepare($query);
                  $stmt->execute();
                  $result=$stmt->get_result();
            ?>            
                                           
    <div class="row">
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
             <?php
                $query="SELECT * FROM users";
                $stmt=$conn->prepare($query);
                $stmt->execute();
                $result=$stmt->get_result();
             ?>
        <h4>USER ACCOUNTS LIST</h4>
             <div class="container">
 
             
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
       
        <th>Usertype</th>
        <th>Username</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php while($row=$result->fetch_assoc()){ ?>
      <tr>
        
        <td><?= $row['usertype'];?></td>
        <td><?= $row['username'];?></td>
       
          <td>
              
              <a href="users.php?delete=<?= $row['id']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want to delete this record ?');">Delete</a>
          </td>
      </tr>
     <?php } ?>
    </tbody>
  </table>
</div>

        </div>           
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
 
    </body></html>