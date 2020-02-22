<?php
session_start();
if(!$_SESSION['adminuser']){
    header("location:Admin.php");
}
?>
<html>
    <head>
       
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> SEC </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
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
        
        <div style="margin-top:4%;">
            <div class="col-sm-12 col-offset-3">
                <form method="post">
                    <?php
                 $elections_name = $_GET['elections_name'];
                 $totalcandidates = $_GET['totalcandidates'];
                    
                    ?>
                    <label style="font-weight:bold;">Election Name</label>
                    <input type="text" name="elections_name_candi" value="<?php echo $elections_name;?>" class="form-control" readonly>
                    <?php
                    for($i=1; $i<=$totalcandidates; $i++){
                        ?>
                    <div class="form-group">
                        <br>
                        <label style="font-weight:bold;">Candidate Name <?php echo $i;?></label>
                        <input type="text" name="candidatesname<?php echo $i;?>" class="form-control" required>
                        <br>
                        <select class="form-control" required name="semester<?php echo $i;?>">
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
                        <br>
                         <select class="form-control" required name="branchname<?php echo $i;?>">
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
                    <?php
                        
                    }
                    ?>
                    <input type="submit" name="addcandidate_details" class="btn btn-primary">
                </form>
            </div>
        </div>
    </body>
</html>
<?php
require("include/database.php");
if(isset($_POST['addcandidate_details'])){

   $totalcandidates = $_GET['totalcandidates'];
   $elections_name_candi = $_POST['elections_name_candi'];
    for ($i=0; $i<$totalcandidates; $i++) {
    $ind = $i + 1;
    $insert = "insert into candidatestable(candidatesname,electionname,semester,branchname,totalvotes) values($1,$2,$3,$4,$5)";
    $run = pg_query_params($con,$insert,array($_POST["candidatesname".$ind],$elections_name_candi,$_POST["semester".$ind],$_POST["branchname".$ind],0));
        
        if($run){
            echo "<script>alert('Candidates Added Successfully');
            window.location.href='addcandidates.php';
            </script>";
        }
        else{
            echo "<script>alert('Error While Entering Details');</script>";
        }
}
}
?>
