<?php
session_start();
if(!$_SESSION['useridgen']){
    header("location:election.php");
}
?>
<html>
    <head>
     <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> SEC </title>
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
                <form method="post">
                    <div class="form-group">
                    <label style="font-weight:bold;">Election Name</label>
                        
                        <select name="election_name" class="form-control" required>
                          <option value="" selected disabled>Select Election</option>
                    <?php
                    require("include/database.php");
                    $select = "select * from electiontable";
                    $run = pg_query($con,$select);
                    if(pg_num_rows($run)){
                        $data = pg_fetch_all($run);
                        while($row=pg_fetch_array($run)){
                         
                     
                    ?>
                          <option value="<?php echo $row['electionname'];?>"><?php echo $row['electionname'];?></option>
                    <?php
                       }
                    }
                    ?>
                    </select>
                        <br>
                        </div>
                    <input type="submit" name="showcandidate" class="btn" value="Show Candidate">
                </form>
                  </div>
        </div>
        </div>
    </body>
</html>
<?php
if(isset($_POST['showcandidate'])){
    $election_name = $_POST['election_name'];
    $select = "select * from electiontable where electionname = $1";
    $run = pg_query_params($con,$select,array($election_name));
    if(pg_num_rows($run)){
        $data = pg_fetch_all($run);
        while($row=pg_fetch_array($run)){
            $start_date = $row['startdate'];
            $end_date = $row['enddate'];
        }
    }
    $current_ts = time();
    $start_date_ts = strtotime($start_date);
    $end_date_ts = strtotime($end_date);
    if($start_date_ts>$current_ts){
        echo "<script>alert('Election is not started yet...');</script>";
    }
    else if($current_ts>$end_date_ts){
        echo "<script>alert('Election is closed now..!!');</script>";
    }
    else{
        ?>

       <script type="text/javascript">
          window.location.href="votecast.php?election_name=<?php echo str_replace(' ','-',$election_name);?>";
      </script>
  
<?php
    }
}
?>



