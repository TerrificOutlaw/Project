<?php
    
    $link = mysqli_connect("localhost","root","Hotel@Katpl#SVPCET");
    mysqli_select_db($link,"hotel_katpl");
        
    include 'action.php';

?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chef</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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
                <a class="navbar-brand">Chef</a>
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
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                    </button>
                    <div class="navbar-collapse collapse " id="navbarNav" style="">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary" href="dashboard.php" style="float: right">Waiter </a>
                                        </li>
                            <li class="nav-item">
                                            <a class="nav-link" > </a>
                                        </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="dashboard.php" data-toggle="collapse" aria-expanded="true" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Waiter<span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="order.php">Take Order</a>
                                        </li>
                                        <li class="nav-item">                                            
                                        </li>
                                                </ul>
                                            </div>
                                        </li>                     
                                   </ul>
                                </div>                                                        
                         </nav>
            </div>
                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 657px;"></div>
                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
          </div>
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
                        
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                               <?php 
                            
                                $servername = "localhost";
                                $username = "root";
                                $password = "Hotel@Katpl#SVPCET";
                                $dbname = "hotel_katpl";
                                
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                            
                                $query="SELECT * FROM `order`";
                                $result = $conn->query($query);
                                

                            ?>         
                            <h4>ORDER LIST</h4>
                                <div class="container">
                                  <h2>List Group With Badges</h2>
                                    <?php 

                                    while($row = $result->fetch_assoc()) {
                                    ?>
                                    
                                   <div class="card">
                                  <ul class="list-group" id="ul_<?php echo $row['id']; ?>" >
                                    <li class="list-group-item"><label>Table no.: &nbsp;&nbsp;&nbsp; </label><?php echo $row['table'];  ?><hr> <label>Item:&nbsp;&nbsp;&nbsp;&nbsp;</label><?php echo $row['itemname'];?><hr><label>Quantity:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><?php echo $row['quantinty'];?><hr><button type="button" class="btn btn-primary" onclick=" delete_data('<?php echo $row['id']; ?>')" >Delivered</button>></li>
                                  </ul>
                                </div>                                
                                    <?php
                                    }                                
                                    ?>
                                </div>
                                >
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
    <script>
        
        function delete_data(id ){
            jQuery.ajax({
                url : 'delete.php',
                type : 'post',
                data : 'id-='+id,
                success : function(result){
                    jQuery('#ul_'+id).hide();
                }
            });
        }
    </script>
    </body></html>