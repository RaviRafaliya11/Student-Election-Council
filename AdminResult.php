<?php
session_start();
if(!$_SESSION['adminuser']){
    header("location:Admin.php");
}
?>
<html>
    <head>
        <link rel="icon" href="projectphotos/s02.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="css/addele.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result Admin Side - SEC </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>

        <style>
            body{
                margin: 0%;
                padding: 0%;
                font-family: 'poppins',sans-serif;
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
              padding: 5px 10px;
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


 table {
                margin-top: 3%;    
                border-collapse: collapse;
                width: 100%;
                margin-left: 0%;
               }

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}

th {
  background-color: #1b357b;
  color: white;
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
              <li><a href="deleresult.php">DELETE RESULT</a></li>
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
        
        <div style="margin-top:7%;">
            <div class="col-md-12 col-md-offset3">
                
                    <div class="form-group">
                        <form method="post">
                        <select class="form-control" name="election_name" required>
                            <option selected  disabled value="">Select Election</option>
                            <?php
                            $current_ts=time();
                             require("include/database.php");
                    $select = "select * from electiontable";
                    $run = pg_query($con,$select);
                    if(pg_num_rows($run)){
                        $data = pg_fetch_all($run);
                        while($row=pg_fetch_array($run)){
                            $election_name = $row['electionname'];
                            $start_date = $row['startdate'];
                            $end_date = $row['enddate'];
                            ?>
                            <?php
                            
                            $end_date_ts = strtotime($end_date);
                            if($end_date_ts<$current_ts){
                                
                            
                            
                            ?>
                            <option value="<?php echo $election_name;?>"><?php echo $election_name;?></option>
                            <?php
                            }
                            }
                            }
                            ?>
                        </select>
                        <br>
                        
                        <input type="submit" name="result_btn" class="btn" value="Result">
                       
                        </form>
                    <table class="table-hover">
                   <tr>
                       <th scope="col">#</th>
                       <th scope="col">Candidate Name</th>
                       <th scope="col">Semester</th>
                       <th scope="col">Branch Name</th>
                       <th scope="col">Total Votes</th>
                       <th scope="col">Voting Status</th>    
                    </tr>
                        
                <?php
                if(isset($_POST['result_btn'])){
                   $election_name = $_POST['election_name'];
                    $select = "select * from result where electionnames = $1";
                    $run = pg_query_params($con,$select,array($election_name));
                    if(pg_num_rows($run)){
                        $data = pg_fetch_all($run);
                       $total_votes=0;
                        while($row=pg_fetch_array($run)){
                            $total_votes = $total_votes+1;
                        }
                    }

                    $select1 = "select * from candidatestable where electionname = $1";
                    $run1 = pg_query_params($con,$select1,array($election_name));
                    if(pg_num_rows($run1)){
                        $total=0;
                        while($row1=pg_fetch_array($run1)){
                            $total = $total+1;
                            $candidatesname = $row1['candidatesname'];
                            $semester = $row1['semester'];
                            $branchname = $row1['branchname'];
                            $totalvotes = $row1['totalvotes'];
                            $percentage = round(($totalvotes / $total_votes) * 100);
                            
                            ?>
                            
                        <tr>
                            <td><?php echo $total;?></td>
                            <td><?php echo $candidatesname;?></td>
                            <td><?php echo $semester;?></td>
                            <td><?php echo $branchname;?></td>
                            <td><?php echo $totalvotes;?></td>
                            <td>
                            <?php
                                if($percentage>50){
                                    ?>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="<?php echo $percentage;?>" aria-valuemin="0" aria-valuemax="<?php echo $percentage;?>" style="width:<?php echo $percentage;?>%;">
                                    <?php echo $percentage;?>%
                                    </div>
                                </div>
                                
                                <?php
                                }
                            else{
                                ?>
                                
                                 <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="<?php echo $percentage;?>" aria-valuemin="0" aria-valuemax="<?php echo $percentage;?>" style="width:<?php echo $percentage;?>%;">
                                    <?php echo $percentage;?>%
                                    </div>
                                </div>
                                
                                <?php
                            }
                              ?>
                            </td>
                        </tr>
                           <?php
                        }
                        ?>
                        
                        <tr>
                            <td colspan="4">Total Votes</td>
                            <td><?php echo $total_votes; ?></td>
                            <td></td>
                        </tr>
                        <?php
                 
                    }
                    
                    else{
                        ?>
                        <tr><td colspan="4">Record Not Found</td></tr>
                        <?php
                    }
                    
                    
                }
                        
                ?>
                </table>
                    </div>
                

            </div>
        </div>
    </body>
</html>

