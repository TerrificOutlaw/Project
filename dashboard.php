<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashbard</title>
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
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
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
                        <h2 class="text-center">WELCOME</h2>
                        <div class="ecommerce-widget">
                            <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                                <h5 class="card-header">CLOCK</h5>
                                <div class="card">
                                    <div class="card-body">
                                    <canvas id="canvas" width="250" height="250" style=" margin-right:250px"></canvas>
                                    <script>
                                        var canvas = document.getElementById("canvas");
                                        var ctx = canvas.getContext("2d");
                                        var radius = canvas.height / 2;
                                        ctx.translate(radius, radius);
                                        radius = radius * 0.90
                                        setInterval(drawClock, 1000);

                                        function drawClock() {
                                          drawFace(ctx, radius);
                                          drawNumbers(ctx, radius);
                                          drawTime(ctx, radius);
                                        }

                                        function drawFace(ctx, radius) {
                                          var grad;
                                          ctx.beginPath();
                                          ctx.arc(0, 0, radius, 0, 2*Math.PI);
                                          ctx.fillStyle = 'white';
                                          ctx.fill();
                                          grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
                                          grad.addColorStop(0, '#333');
                                          grad.addColorStop(0.5, 'white');
                                          grad.addColorStop(1, '#333');
                                          ctx.strokeStyle = grad;
                                          ctx.lineWidth = radius*0.1;
                                          ctx.stroke();
                                          ctx.beginPath();
                                          ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
                                          ctx.fillStyle = '#333';
                                          ctx.fill();
                                        }

                                        function drawNumbers(ctx, radius) {
                                          var ang;
                                          var num;
                                          ctx.font = radius*0.15 + "px arial";
                                          ctx.textBaseline="middle";
                                          ctx.textAlign="center";
                                          for(num = 1; num < 13; num++){
                                            ang = num * Math.PI / 6;
                                            ctx.rotate(ang);
                                            ctx.translate(0, -radius*0.85);
                                            ctx.rotate(-ang);
                                            ctx.fillText(num.toString(), 0, 0);
                                            ctx.rotate(ang);
                                            ctx.translate(0, radius*0.85);
                                            ctx.rotate(-ang);
                                          }
                                        }

                                        function drawTime(ctx, radius){
                                            var now = new Date();
                                            var hour = now.getHours();
                                            var minute = now.getMinutes();
                                            var second = now.getSeconds();
                                            //hour
                                            hour=hour%12;
                                            hour=(hour*Math.PI/6)+
                                            (minute*Math.PI/(6*60))+
                                            (second*Math.PI/(360*60));
                                            drawHand(ctx, hour, radius*0.5, radius*0.07);
                                            //minute
                                            minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
                                            drawHand(ctx, minute, radius*0.8, radius*0.07);
                                            // second
                                            second=(second*Math.PI/30);
                                            drawHand(ctx, second, radius*0.9, radius*0.02);
                                        }

                                        function drawHand(ctx, pos, length, width) {
                                            ctx.beginPath();
                                            ctx.lineWidth = width;
                                            ctx.lineCap = "round";
                                            ctx.moveTo(0,0);
                                            ctx.rotate(pos);
                                            ctx.lineTo(0, -length);
                                            ctx.stroke();
                                            ctx.rotate(-pos);
                                        }
                                        </script>
                                        </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end category revenue  -->
                            <!-- ============================================================== -->

                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header"> ADMIN</h5>
                                    <div class="card-body">
                                    <img id="hotel" width="500" height="257" src="resort.jpg" alt="The Hotel">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div></div>
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