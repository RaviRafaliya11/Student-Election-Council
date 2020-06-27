
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require('mail.php');
?>
<?php
require("include/database.php");
if(isset($_POST['submit'])){
 $fullname = $_POST['fullname'];
 $branchname = $_POST['branchname'];
 $semester = $_POST['semester'];
 $email = $_POST['email'];
 $pass = $_POST['password'];
 $token = md5(rand('00001', '99999'));
 $status = "Inactive";
 $result = pg_query_params($con,"SELECT * FROM userdetails WHERE email = $1", array($email));
    
   if(pg_num_rows($result)){
   $name = pg_fetch_all($result);
       echo "<script>alert('EMAIL ALREADY REGISTERED');</script>";
       
}
    else{
        
        try {
    $splitString = strstr($email, '@');
	$getDomain = substr($splitString, 1, strlen($splitString));
       if(strcmp($getDomain, "iite.indusuni.ac.in") != 0) {
		echo "<script>alert('You Cannot use disposable email id');</script>";
    $mail = new PHPMailer();                      
   $mail->isSMTP();                           
    $mail->Host       = 'smtp.gmail.com';      
    $mail->SMTPAuth   = true;                  
    $mail->Username   = EMAIL;                     
    $mail->Password   = PASS;                               
    $mail->SMTPSecure = 'tls';     
    $mail->Port       = 587;                                  

        }
    else{
          $insert = "insert into userdetails(name,branchname,semester,email,password,useridgen,token,status) values($1,$2,$3,$4,$5,$6,$7,$8)";
         $run = pg_query_params($con,$insert,array($fullname,$branchname,$semester,$email,$pass,'',$token,$status));
        $url = $_SERVER['SERVER_NAME'].'/verify.php?&token='.$token;
        $output = '<div> Hey! '.$fullname.' <br>  Thanks For Register. Now Click on this link and verify your self <br>'.$url.'</div>';
        
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
    $mail->addAddress($email, $fullname); 
    $mail->isHTML(true);                                  
    $mail->Subject = 'SEC - VERIFICATION';
    $mail->Body    = $output;
    }


    if($mail->send()){
    echo "<script>alert('Verification link has been sent to your Email');</script>";
    }
} 
    catch (Exception $e) {
    echo "<script>alert('Message could not be sent. Mailer Error:$mail->ErrorInfo');</script>";
}
        
        
        
    }
}
?>
<html>
    <head>
<link rel="icon" href="projectphotos/s02.png" type="image/png" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> SEC </title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" type="text/css" href="css/register.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
        <style>
          body{
              margin: 0;
              padding: 0;
              font-family: 'poppins', sans-serif;
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
              color: #069370;
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
              color: #fff;
              transition: 0.5s;
          }
          @media (max-width:100%){
              header{
                  margin: 20px;
              }
              
          }
          @media (max-width:768px){
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
              <li><a href="index.php">HOME</a></li>
              <li><a href="Registration.php">REGISTRATION</a></li>
              <li><a href="User.php">USER</a></li>
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
			<img src="projectphotos/addgreen.svg">
		</div>
        <div class="login-content">
			<form action="" method="post">
           		<div class="form-group">
                        <input type="text" class="form-control" name="fullname" placeholder="Enter Name" required style="border:none;outline:none;border-bottom:solid 2px gray;">
                    </div>
              <div class="form-group">
                    <select class="form-control" required name="branchname" style="border:none;outline:none;border-bottom:solid 2px gray;">
                        <option value="" selected disabled>Branch</option>
                        <option value="IT">IT</option>
                        <option value="CE">CE</option>
                        <option value="CS">CS</option>
                        <option value="MECHANICAL">MECHANICAL</option>
                        <option value="CIVIL">CIVIL</option>
                        <option value="EC">EC</option>
                        <option value="MBA">MBA</option>
                        <option value="BBA">BBA</option>
                        <option value="MSC-IT">MSC-IT</option>
                        <option value="BSC-IT">BSC-IT</option>
                        <option value="AERONAUTICAL">AERONAUTICAL</option>
                        <option value="METALLURGICAL">METALLURGICAL</option>
                        <option value="ECE">ECE</option>
                        <option value="ELECTRICAL ENGINEERING">ELECTRICAL ENGINEERING</option>
                        <option value="AUTOMOBILE ENGINEERING">AUTOMOBILE ENGINEERING</option>
                    </select>
                    </div>
                <div class="form-group">
                    <select class="form-control" required name="semester" style="border:none;outline:none;border-bottom:solid 2px gray;">
                        <option value="" selected disabled>Semester</option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                        <option value="V">V</option>
                        <option value="VI">VI</option>
                        <option value="VII">VII</option>
                        <option value="VIII">VIII</option>
                        <option value="IX">IX</option>
                        <option value="X">X</option>
                    </select>
                    </div>
                <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required style="border:none;outline:none;border-bottom:solid 2px gray;">
                    </div>
                <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="password" required style="border:none;outline:none;border-bottom:solid 2px gray;">
                    </div>
                
            	<input type="submit" name="submit" class="btn" value="Register">
            </form>
        </div>
        </div>
         <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>