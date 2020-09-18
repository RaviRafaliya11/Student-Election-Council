<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require('mail.php');
?>
<?php
session_start();
if(!$_SESSION['adminuser']){
    header("location:Admin.php");
}
?>
<html>
    <head>
        <link rel="icon" href="projectphotos/s02.png" type="image/png" sizes="16x16">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generate ID - SEC </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" type="text/css" href="css/update.css">
         <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
        <style>
         body{
    font-family: 'Poppins', sans-serif;
}
             header{
              position: relative;
              max-width: 100%;
              margin: auto;
              padding: 10px;
              background: #fff;
              box-sizing: border-box;
              box-shadow: 0 2px 5px rgba(0,0,0,0.2);
          }
          .logo{
              height: 60px;
              font-size: 36px;
              line-height: 60px;
              padding: 0 20px;
              text-align: center;
              box-sizing: border-box;
              float: left;
              font-weight: 700;
              text-decoration: none;
          }
          nav{
              float: right;
          }
          .clearfix{
              clear: both;
          }
          nav ul{
              margin: 0;
              padding: 0;
              display: flex;
              
          }
          nav li{
              list-style: none;
          }
          nav ul li a{
              display: block;
              margin: 10px 0;
              padding: 10px 20px;
              text-decoration: none;
              color: #262626;
          }
          nav ul li a:hover{
              text-decoration: none;
              background: #069370;
              transition: 0.5s;
          }
          @media (max-width:100%){
              header{
                  margin: 20px;
              }
              
          }
          @media (max-width:1200px){
              .menu-toggle{
                  display: block;
                  width: 40px;
                  height: 40px;
                  margin: 10px;
                  float: right;
                  cursor: pointer;
                  text-align: center;
                  font-size: 30px;
                  color: #069370;
              }
              .menu-toggle:before{
                content: '\f0c9';
                font-family: fontAwesome;
                  line-height: 40px;
              }
               .menu-toggle.active:before{
                content: '\f00d';
                font-family: fontAwesome;
                line-height: 40px;
              }
              nav{
                  display: none;
              }
              nav.active{
                  display: block;
                  width: 100%;
              }
              nav.active ul{
                  display: block;
              }
              nav.active ul li a{
                  margin: 0;
              }
          }
        </style>
    </head>
    <body>
        <header>
            <a class="logo"><img src="projectphotos/s02.png"></a>
      <div class="menu-toggle"></div>
      <nav>
          <ul>
              <li><a href="addnewelection.php">ADD ELECTIONS</a></li>
               <li><a href="eledelete.php">DELETE ELECTIONS</a></li>
              <li><a href="addcandidates.php">ADD CANDIDATES</a></li>
               <li><a href="candidelete.php">DELETE CANDIDATES</a></li>
              <li><a href="request_id_accept.php">UPDATE ID</a></li>
              <li><a href="AdminResult.php">RESULT</a></li>
              <li><a href="adminlogout.php">LOGOUT</a></li>
          </ul>
      </nav>
          <div class="clearfix"></div>
      </header>
      <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
      <script type="text/javascript">
      $(document).ready(function(){
          $('.menu-toggle').click(function(){
              $('.menu-toggle').toggleClass('active')
              $('nav').toggleClass('active')
          });
      });
      </script>
        
         <img class="wave" src="projectphotos/wave.png">
	<div class="container">
		<div class="img">
			<img src="projectphotos/man.svg">
		</div>
         <div class="login-content">
             <?php
                $postfix = "";
                $prefix = "";
                $id_gen = "";

             require("include/database.php");
                $id = $_GET['id'];
                $select = "select * from idreqtable where id=$1";
                $run = pg_query_params($con,$select,array($id));
                if(pg_num_rows($run)){
                    $data = pg_fetch_all($run);
                    while($row=pg_fetch_array($run)){
                        $user_fullname = $row['userfullname'];
                        $user_branchname = $row['userbranchname'];
                        $user_email = $row['useremail'];
                    }
                    
                   switch($user_branchname){
                       case 'IT':
                           $prefix = "IT";
                           $rand = rand(9999999,1234567);
                           $postfix = "IU";
                           $id_gen = $prefix.$rand.$postfix;
                           break;
                       case 'MECHANICAL':
                           $prefix = "Mech";
                           $rand = rand(9999999,1234567);
                           $postfix = "IU";
                           $id_gen = $prefix.$rand.$postfix;
                           break;
                       case 'CIVIL':
                           $prefix = "civ";
                           $rand = rand(9999999,1234567);
                           $postfix = "IU";
                           $id_gen = $prefix.$rand.$postfix;
                           break;
                       case 'AUTOMOBILE ENGINEERING':
                           $prefix = "auto";
                           $rand = rand(9999999,1234567);
                           $postfix = "IU";
                           $id_gen = $prefix.$rand.$postfix;
                           break;
                       case 'CE':
                           $prefix = "CE";
                           $rand = rand(9999999,1234567);
                           $postfix = "IU";
                           $id_gen = $prefix.$rand.$postfix;
                           break;
                       case 'CS':
                           $prefix = "CS";
                           $rand = rand(9999999,1234567);
                           $postfix = "IU";
                           $id_gen = $prefix.$rand.$postfix;
                           break;
                       
                       case 'ELECTRICAL ENGINEERING':
                           $prefix = "EE";
                           $rand = rand(9999999,1234567);
                           $postfix = "IU";
                           $id_gen = $prefix.$rand.$postfix;
                           break; 
                       
                       case 'ECE':
                           $prefix = "ECE";
                           $rand = rand(9999999,1234567);
                           $postfix = "IU";
                           $id_gen = $prefix.$rand.$postfix;
                           break;
                       case 'METALLURGICAL':
                           $prefix = "META";
                           $rand = rand(9999999,1234567);
                           $postfix = "IU";
                           $id_gen = $prefix.$rand.$postfix;
                           break;
                       case 'AERONAUTICAL':
                           $prefix = "AT";
                           $rand = rand(9999999,1234567);
                           $postfix = "IU";
                           $id_gen = $prefix.$rand.$postfix;
                           break;
                       
                       case 'MBA':
                           $prefix = "MBA";
                           $rand = rand(9999999,1234567);
                           $postfix = "IU";
                           $id_gen = $prefix.$rand.$postfix;
                           break;
                       case 'BBA':
                           $prefix = "BBA";
                           $rand = rand(9999999,1234567);
                           $postfix = "IU";
                           $id_gen = $prefix.$rand.$postfix;
                           break;
                       case 'MSC-IT':
                           $prefix = "MIT";
                           $rand = rand(9999999,1234567);
                           $postfix = "IU";
                           $id_gen = $prefix.$rand.$postfix;
                           break;
                       case 'BSC-IT':
                           $prefix = "BIT";
                           $rand = rand(9999999,1234567);
                           $postfix = "IU";
                           $id_gen = $prefix.$rand.$postfix;
                           break;
                
                           
                       default:
                           break;
                           
                   }
                    
                       ?>
			<form method="post">
           		<div class="input-div one">
           		   <div class="i">
           		   </div>
           		   <div class="div">
           		   		<input type="text" name="user_fullname" class="input" value="<?php echo $user_fullname;?>" required readonly>
           		   </div>
           		</div>
                 <div class="input-div one">
           		   <div class="i">
           		   </div>
           		   <div class="div">
           		   		<input type="text" name="user_branchname" class="input" value="<?php echo $user_branchname;?>" required readonly>
           		   </div>
           		</div>
               <div class="input-div one">
           		   <div class="i">
           		   </div>
           		   <div class="div">
           		   		<input type="email" name="user_email" class="input" value="<?php echo $user_email;?>" required readonly>
           		   </div>
           		</div>
                <div class="input-div one">
           		   <div class="i">
           		   </div>
           		   <div class="div">
           		   		<input type="text" name="user_idsys" class="input" readonly required value="<?php echo strtoupper($id_gen);?>">
           		   </div>
           		</div>
                <input type="submit" name="Update" class="btn" value="GENERATE ID">
             </form>
             <?php
                    
                }
                else{
                    echo "<script>alert('Record Not Found');</script>";
                }
            ?>
        </div>
        </div>
    </body>
</html>
<?php
if(isset($_POST['Update'])){
 $user_email = $_POST['user_email'];
 $user_idsys = $_POST['user_idsys']; 
 $update = "update userdetails set useridgen=$1 where email=$2";
$run = pg_query_params($con,$update,array($user_idsys,$user_email));
if($run){
    $output = '<div> Hey! '.$user_email.' <br> Your unique ID is: <br><b>'.$user_idsys.'</b> <br> Now use this unique id to log in into the system to access the election,vote,result section. <br> All you need to do is, <br> 1. Log in into the user section with registered email and password .<br>
    2. Now after log in into the user section to access the election,vote,result section you need to log in with this unique id and password (you entered during registration.)
    </div>';
    try{
    $mail = new PHPMailer();                      
    $mail->isSMTP();                           
    $mail->Host       = 'smtp.gmail.com';      
    $mail->SMTPAuth   = true;                  
    $mail->Username   = EMAIL;                     
    $mail->Password   = PASS;                               
    $mail->SMTPSecure = 'tls';     
    $mail->Port       = 587;                                  

    //Recipients
    $mail->setFrom(EMAIL, 'StudentElectionCouncil');
    $mail->addAddress($user_email); 
    $mail->isHTML(true);                                  
    $mail->Subject = 'SEC - UNIQUE ID';
    $mail->Body    = $output;
    if($mail->send()){
   $delete = "delete from idreqtable where useremail=$1";
   $del = pg_query_params($con,$delete,array($user_email));
    echo "<script>alert('Update successfully and Deleted');</script>";
    echo "<script>window.location.href='request_id_accept.php';</script>";
    }
    }
    catch (Exception $e) {
    echo "<script>alert('Message could not be sent. Mailer Error:$mail->ErrorInfo');</script>";
} 

   }
    else{
        echo "<script>alert('Error');</script>";
    }
}
?>