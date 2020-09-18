<?php
session_start();
if(!$_SESSION['useridgen']){
    header("location:election.php");
    exit();
}
?>
<html>
    <head>
        <link rel="icon" href="projectphotos/s02.png" type="image/png" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Votecast - SEC </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" type="text/css" href="css/addcandi.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script> 
        <style>
         body{
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
			<img src="projectphotos/vote.svg">
		</div>
              <div style="margin-top:40%;">
            <div class="col-sm-6">
                <form method="post" action="">
                   <?php 
                    require("include/database.php");
                    $election_name = $_GET['election_name'];
                    $election_name = str_replace('-',' ',$election_name);
                    ?>
                    
                    <div class="form-group"> 
                    <input type="text" style="font-weight:bold;text-transform: uppercase;" value="<?php echo $election_name;?>"class="form-control" readonly/>
                    </div>
                    
                    
                    <?php
                    
                    $select = "select * from candidatestable where electionname = $1";
                    $run = pg_query_params($con,$select,array($election_name));
                    if(pg_num_rows($run)){
                        $data = pg_fetch_all($run);
                        while($row=pg_fetch_array($run)){
                            
                            ?>
                    
                    <div class="form-group">
                        <select name="candi_name" class="form-control" required>
                            <option value="" selected disabled>Select Candidate</option>
                            
                            <?php
                    require("include/database.php");
                    $select = "select * from candidatestable where electionname = $1";
                    $run = pg_query_params($con,$select,array($election_name));
                    if(pg_num_rows($run)){
                        $data = pg_fetch_all($run);
                        while($row=pg_fetch_array($run)){
                         
                     
                    ?>
                          <option value="<?php echo $row['candidatesname'];?>"><?php echo $row['candidatesname'];?></option>
                    <?php
                       }
                    }
                    ?>
                            
                        </select>
                    </div>
                          
                    
                           <?php
                        }
                    }
                    ?>
                    <input type="submit" name="votecast" value="Vote" class="btn">
                </form>
                
                  </div>
        </div>
        </div>
    </body>
</html>
<?php
require("include/database.php");
if(isset($_POST['votecast'])){
   $candi_name = $_POST['candi_name'];
   $email = $_SESSION['email'];
    $select = "select * from result where useremails = $1 and electionnames = $2";
    $exe1 = pg_query_params($con,$select,array($email,$election_name));
    if(pg_num_rows($exe1)){
        echo "<script>alert('You Already Cast Your Vote For:$election_name');</script>";
    }
    else{
        $insert = "insert into result(useremails,candidatesnames,electionnames) values($1,$2,$3)";
    $run = pg_query_params($con,$insert,array($email,$candi_name,$election_name));
    if($run){
        $update = "update candidatestable set totalvotes=totalvotes+'1' where candidatesname=$1 and electionname = $2";
        $exe = pg_query_params($con,$update,array($candi_name,$election_name));
        if($exe){
            echo "<script>alert('You Successfully Cast Your Vote');</script>";
        }
        else{
            echo "<script>alert('You didn't Vote');</script>";
        }
    }
    else{
        echo "<script>alert('NO VOTE');</script>";
    }
    }    
    } 
?>


