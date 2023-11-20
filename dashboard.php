<?php
require('db_config.php');
if($con){
  session_start();
  if(isset($_SESSION['logged_in'])){
    if($_SESSION['logged_in']){
      $user_id = $_SESSION['id'];

      $sql="SELECT * FROM users WHERE userid='$user_id'";
      $result=mysqli_query($con,$sql);
      $users=mysqli_fetch_all($result,MYSQLI_ASSOC);


    // Calculating total money budgeted for
      $sql="SELECT * FROM expense_category_tbl";
      $result=mysqli_query($con,$sql);
      $expenses=mysqli_fetch_all($result,MYSQLI_ASSOC);

    // Calculating total money spent
      $sql="SELECT * FROM expense_tbl";
      $result=mysqli_query($con,$sql);
      $spendings=mysqli_fetch_all($result,MYSQLI_ASSOC);

    } else {
      header("Location:index.php");
    }

  } else{
       header("Location:index.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  

  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    
      <!--ASWESOME ICON-->
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0; color:#FF0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Econominder</a> 
            </div>
           <!--  dddddddddd -->
 <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">
 
 <?php
  echo ("Welcome: ". $users[0]['first_name']);
 ?>

 &nbsp; <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> </span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li></li>
                    <li>
			  <a href="logout.php"><span class="glyphicon glyphicon-log-out"> Logout</span></a></li>
            
            <li class="divider"></li>
            
               <li> <a href="change_password.php"><i class="glyphicon glyphicon-edit"> Change Password</i></a></li>
                </ul>
            </div>
          </div>
        </nav>
  
<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu" style="height:100vh !important">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive">
					</li>
	    
                      <li>
                         </li><li><a class="active-menu" href="#"><i class="fa fa-dashboard-o fa-3x"></i>Dashboard</a></li>                       
                    
                      <li>
                         </li><li><a class="" href="expense_category.php"><i class="fa fa-keyboard-o fa-2x"></i>Expense</a></li>                       
                    
                    <li>
                       
                   </li><li><a href="expense_category.php"><i class="fa fa-cog fa-2x" aria-hidden="true"></i>Create Expense</a></li>          
                     				
					
					   <li>
                        <a href="#"><i class="fa fa-list  fa-2x"></i>Expense Summerry<span class="fa arrow"></span></a>
                        
                        
                        
                          <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="expense_report.php "><i class="fa fa-file"></i>Expense Report</a>
                            </li>
                            <li>
                                <a href=" "><i class="fa fa-check-circle"></i></a>
                            </li>
										  <li>
                                <a href=" "><i class="fa fa-pause"></i> </a>
                          
                            
                                    </li>
                                </ul>
                               
                            </li>         
                                </ul>
                               
                          
                
               
            </div>
            
        </nav>
      <div class="page-wrapper">
        <div class="page-inner" style="margin-left:300px; overflow-x:hidden ">

        <div class="card-container">
            <!-- Card -->
            <div class="dash-container">
              <div class="dash-card">
                <h5>Amount Budgeted For</h5>
                <p>

                <?php
                  $expenditure=0;
                  foreach($expenses as $expense){
                    $expenditure+=$expense['amount'];
                  }
                  echo("Ksh ".$expenditure);
                ?>

                </p>
              </div>
            </div>
          <!-- Card -->
            <div class="dash-container">
              <div class="dash-card">
                <h4>Amount Spent</h4>
                <p>
                  <?php
                     $spent=0;
                     foreach($spendings as $spending){
                       $spent+=$spending['amount_spent'];
                     }
                     echo("Ksh ".$spent);
                  ?>
                </p>
              </div>
            </div>
          <!-- Card -->
            <div class="dash-container">
              <div class="dash-card">
                <h4>Balance</h4>
                <p>
                  <?php
                    echo("Ksh ".$expenditure-$spent);
                  ?>
                </p>
              </div>
            </div>
          <!-- Card -->
            <div class="dash-container">
              <div class="dash-card">
                <h4>Amount Spent</h4>
                <p>Ksh 30000</p>
              </div>
            </div>
        </div>
        <div class="card-container">
            <!-- Card -->
            <div class="dash-container">
              <div class="dash-card">
                <h4>Amount Spent</h4>
                <p>Ksh 30000</p>
              </div>
            </div>
          <!-- Card -->
            <div class="dash-container">
              <div class="dash-card">
                <h4>Amount Spent</h4>
                <p>Ksh 30000</p>
              </div>
            </div>
          <!-- Card -->
            <div class="dash-container">
              <div class="dash-card">
                <h4>Amount Spent</h4>
                <p>Ksh 30000</p>
              </div>
            </div>
          <!-- Card -->
            <div class="dash-container">
              <div class="dash-card">
                <h4>Amount Spent</h4>
                <p>Ksh 30000</p>
              </div>
            </div>
        </div>
<!--  -->
        </div>
      </div>
      <a href="aboutus.php">Go to About us </a>
      </body>
</html>