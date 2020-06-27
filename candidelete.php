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
    <title> SEC </title>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/wtf-forms.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
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
        <script>
        function delete_confirm(){
    if($('.checkbox:checked').length > 0){
        var result = confirm("Are you sure to delete selected candidates?");
        if(result){
            return true;
        }else{
            return false;
        }
    }else{
        alert('Select at least 1 record to delete.');
        return false;
    }
}
            $(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
	
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
        </script>
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
        
        <form name="action_form" action="delecandi.php" method="post" onsubmit="return delete_confirm();">
         <table class="table-hover">
            <tr>
            <th scope="col"><input type="checkbox" id="select_all" value=""></th>
            <th scope="col">#</th>
            <th scope="col">Candidates Name</th>
            <th scope="col">Elections Name</th>
            <th scope="col">Semester</th>
            <th scope="col">Branch Name</th>
            </tr>
                <?php 
             require("include/database.php");
            $select = "select * from candidatestable";
            $run = pg_query($con,$select);
           
              if(pg_num_rows($run)){
                  $data = pg_fetch_all($run);
                while($row=pg_fetch_array($run)){
                 $id=$row['candidateid'];
                    ?>
            <tr>
                <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['candidateid']; ?>"/></td> 
                <td><?php echo $row['candidateid'];?></td>
                <td><?php echo $row['candidatesname'];?></td>
                <td><?php echo $row['electionname'];?></td>
                <td><?php echo $row['semester'];?></td>
                <td><?php echo $row['branchname'];?></td>
                
            </tr>
            <?php
                }
            }
            else{
                ?>
            <tr>
                <td colspan="6">Record Not Found</td>
            </tr>
            <?php
            }
             ?>
        </table>
            <br>
<input type="submit" class="btn btn-danger" name="delete_candi" value="DELETE">
        </form>
    </body>
</html>