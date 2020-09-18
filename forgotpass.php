
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
if($_POST){
 $email = $_POST['email'];
 
$select = pg_query_params($con,"select * from userdetails where  email=$1",array($email));
 $count = pg_num_rows($select);
 $row =  pg_fetch_array($select);
$fpass = base64_encode($row['password']);    
if($count>0)
{
    $mail = new PHPMailer;

try {
    //Server settings
//    $mail->SMTPDebug = 2;                      
    $mail->isSMTP();                           
    $mail->Host       = 'smtp.gmail.com';      
    $mail->SMTPAuth   = true;                  
    $mail->Username   = EMAIL;                     
    $mail->Password   = PASS;                               
    $mail->SMTPSecure = 'tls';     
    $mail->Port       = 587;                                  

    //Recipients
    $mail->setFrom(EMAIL, 'StudentElectionCouncil');
    $mail->addAddress($email);     
    $mail->isHTML(true);                                  
    $mail->Subject = 'SEC - FORGOT PASSWORD';
    $mail->Body    = "Hi $email your password is: <b> {$fpass} </b> <br> Now Convert this <b>base64encode to normal text</b> after that you will get your password";

    $mail->send();
    echo "<script>alert('Message has been sent to your mail, check Now');
    window.location.href='User.php';
    </script>";
} catch (Exception $e) {
    echo "<script>alert('Message could not be sent.');</script>";
}
}
    else{
        echo "<script>alert('Email not found');
        window.location.href='User.php';
        </script>";
    }

}
?>
<html>
    <head>
        <link rel="icon" href="projectphotos/s02.png" type="image/png" sizes="16x16">
     <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password - SEC </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script> 
        <style>
        
         body{
             margin: 0;
             padding: 0;
    font-family: 'Poppins', sans-serif;
    overflow: hidden;
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
              <li><a href="index.php">Home</a></li>
              <li><a href="Registration.php">Registration</a></li>
              <li><a href="User.php">User</a></li>
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
			<img src="projectphotos/greenforgotpass.svg">
		</div>
		<div class="login-content">
			<form method="post">
				<img src="projectphotos/avatar.svg">
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Enter Email</h5>
           		   		<input type="email" class="input" name="email" autocomplete="off" required>
           		   </div>
           		</div>
            	<input type="submit" name="submit" class="btn" value="Send">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script> 
    </body>
</html>