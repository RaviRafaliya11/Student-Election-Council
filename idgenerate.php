<?php
session_start();
if(!$_SESSION['email']){
    header("location:User.php");
}
?>
<?php
require("include/database.php");
$user_email = $_SESSION['email'];
$select = "select * from idreqtable where useremail = $1";
$run = pg_query_params($con,$select,array($user_email));
    if(pg_num_rows($run)){
      $data = pg_fetch_all($run);  
    ?>
  <script>alert('Request Already Submitted please wait..!!');
window.location.href="loginheader.php";
 </script>
<?php
      
    }

else
{
    ?>

<?php 
$select = "select * from userdetails where email = $1";
$run = pg_query_params($con,$select,array($user_email));
if(pg_num_rows($run)){
    $data = pg_fetch_all($run);
    while($row=pg_fetch_array($run)){
        $fullname = $row['name'];
        $branchname = $row['branchname'];
        $email = $row['email'];
        $user_idgen = $row['useridgen'];
        
    }
}
    if($user_idgen!=""){
        echo "<script>alert('Your ID is: $user_idgen');
        window.location.href='loginheader.php';
        </script>";
    }
    else{
        ?>
    <html>
    <head>
        <link rel="icon" href="projectphotos/s02.png" type="image/png" sizes="16x16">
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ID Generate Section - SEC </title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" type="text/css" href="css/requestsend.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>  
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
              <li><a href="idgenerate.php">GENERATE-ID</a></li>
              <li><a href="election.php">ELECTION</a></li>
              <li><a href="vote.php">VOTE</a></li>
              <li><a href="result.php">RESULT</a></li>
              <li><a href="logout.php">LOGOUT</a></li><li><a href=""><?php echo $_SESSION['name'];?></a></li>
              
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
			<form action="" method="post">
				<img src="projectphotos/avatar.svg">
           		<div class="input-div one">
           		   <div class="i">
           		   </div>
           		   <div class="div">
                       
           		   		<input type="text" name="user_fullname" class="input" value="<?php echo $fullname;?>" required readonly>
           		   </div>
           		</div>
                 <div class="input-div one">
           		   <div class="i">
           		   </div>
           		   <div class="div">
                       
           		   		<input type="text" name="user_branchname" class="input" value="<?php echo $branchname;?>" required readonly>
           		   </div>
           		</div>
               <div class="input-div one">
           		   <div class="i">
           		   </div>
           		   <div class="div">
                       
           		   		<input type="email" name="user_email" class="input" value="<?php echo $email;?>" required readonly>
           		   </div>
           		</div>
                <input type="submit" name="reqid" class="btn" value="Send Request">
             </form>
        </div>
        </div>
        <script type="text/javascript" src="js/main.js"></script> 
        </body>
</html>
<?php
  
    }
}
?>
<?php
if(isset($_POST['reqid'])){
    $user_fullname = $_POST['user_fullname'];
    $user_branchname = $_POST['user_branchname'];
    $user_email = $_POST['user_email'];
    require("include/database.php");
    $insert = "insert into idreqtable(userfullname,userbranchname,useremail) values($1,$2,$3)";
    $run = pg_query_params($con,$insert,array($user_fullname,$user_branchname,$user_email));
    if($run){
        echo "<script>alert('Request has been Sent To Admin..');</script>";
    }
    else{
        echo "<script>alert('Error While Sending Request..!!');</script>";
    }    
}  
?>

