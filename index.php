<?php
session_start();
if(isset($_SESSION['adminuser'])) {
      header("location:Adminpanel.php");
  }
if(isset($_SESSION['email'])) {
      header("location:loginheader.php");
  }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Election Council - SEC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="icon" href="projectphotos/s02.png" type="image/png" sizes="16x16">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script> 
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
                  margin: 15px;
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
          <a class="logo"><img src="projectphotos/s02.png">
          </a>
      <div class="menu-toggle"></div>
      <nav>
          <ul>
              <li><a href="Admin.php">ADMIN</a></li>
              <li><a href="Registration.php">REGISTRATION</a></li>
              <li><a href="User.php">USER</a></li>
          </ul>
      </nav>
          <div class="clearfix"></div>
      </header>
       <div id="slides" class="carousel slide" data-ride="carousel">  
    <ol class="carousel-indicators">   
        <li data-target="#slides" data-slide-to="0" class="active"></li>  
        <li data-target="#slides" data-slide-to="1" ></li> 
        <li data-target="#slides" data-slide-to="2" ></li> 
        <li data-target="#slides" data-slide-to="3" ></li> 
         <li data-target="#slides" data-slide-to="4" ></li> 
         <li data-target="#slides" data-slide-to="5" ></li> 
          
    </ol>  
    <div class="carousel-inner">
        <div class="carousel-item active">  
        <img src="projectphotos/isoEle1.png" width="100%" height="91%">    
        </div>  
        <div class="carousel-item" style="width: 100%;">  
        <img src="projectphotos/isoEle2.jpg" width="100%" height="91%">  
        </div>
         <div class="carousel-item" style="width: 100%;">  
        <img src="projectphotos/isoEle3.jpg" width="100%" height="91%">  
        </div>
         <div class="carousel-item" style="width: 100%;">  
        <img src="projectphotos/ele4.png" width="100%" height="91%">  
        </div>
         <div class="carousel-item" style="width: 100%;">  
        <img src="projectphotos/ele5.png" width="100%" height="91%">  
        </div>
         <div class="carousel-item" style="width: 100%;">  
        <img src="projectphotos/isoEle4.jpg" width="100%" height="91%">  
        </div>
        
        
        </div> 
        <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
        </div> 
      
      
         <div class="w3-content" style="max-width:1100px">


  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="projectphotos/SEC_Logo.png" class="w3-round w3-image w3-opacity-min" alt="SEClogo" width="600" height="750">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">About SEC</h1><br>
      <h5 class="w3-center w3-light-grey">Student Election Council</h5>
      <p class="w3-large w3-text-grey w3-hide-medium">The SEC provides the online election platform for college. It is centralized with database so all the data store at one place.</p>
      <p class="w3-large w3-text-grey w3-hide-medium">Student Election Council is safe and less time consuming. User can vote one time at one post and candidate. User can't vote multiple candidate on same post Student Election Council has two side, First is Admin Side and Second is User Side.</p>
    </div>
  </div>
  <hr>

            
      <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="projectphotos/avtarBLUE.svg" class="w3-round w3-image w3-opacity-min" alt="Avatar" width="600" height="750">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">User Side</h1><br>
      
      <p class="w3-large w3-text-grey w3-hide-medium">First of all, users must register to access the voting system. After registration they got the verification mail on their registered mail id. After verification they can login into the system. without verification they can't access the system.
        </p>
         <p class="w3-large w3-text-grey w3-hide-medium">User Sections<br>
        <span class="w3-tag w3-light-grey">ID GENERATE</span><br><br>
        <span class="w3-tag w3-light-grey">ELECTION</span><br><br>     
        <span class="w3-tag w3-light-grey">VOTE</span><br><br>
        <span class="w3-tag w3-light-grey">RESULT</span><br><br>     
        </p>
    </div>
  </div>
       <hr>  
            
        <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="projectphotos/idgen.svg" class="w3-round w3-image w3-opacity-min" alt="Info" width="600" height="750">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">User Side</h1><br>
      <h5 class="w3-center w3-light-grey">ID Generate</h5>
      <p class="w3-large w3-text-grey w3-hide-medium">After successful login user need to generate unique id with <span class="w3-tag w3-light-grey">ID GENERATE</span> section. The request for id generate is sent to admin. When admin accept that request after that user get the unique id like.. <span class="w3-tag w3-light-grey">ID7854864IU</span><br>with that unique id user can access the election, vote and result section.
        </p>  
    </div>
  </div>
       <hr>   
            
            <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="projectphotos/vote.svg" class="w3-round w3-image w3-opacity-min" alt="Vote" width="600" height="750">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">User Side</h1><br>
      <h5 class="w3-center w3-light-gray">Election &amp; Vote</h5>
      <p class="w3-large w3-text-grey w3-hide-medium">With the Unique id and password user can login into the Election and vote section, so you can see the perticular elections name and candidates name who stand for perticular election and you can vote them.
        </p>  
    </div>
  </div>
       <hr>    
    <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="projectphotos/result.svg" class="w3-round w3-image w3-opacity-min" alt="Result" width="600" height="750">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">User Side</h1><br>
      <h5 class="w3-center w3-light-gray">Result</h5>
      <p class="w3-large w3-text-grey w3-hide-medium">After the end of the election you can see the result on result section.<br> If the election is in the progress then you can't see the result.
        </p>  
    </div>
  </div>
       <hr>    
 
  </div>
        <footer class="w3-center w3-light-grey w3-padding-32">
  <p>© Project SEC 2020 - <a title="SEC" target="_blank" class="w3-hover-text-green">Student Election Council</a></p>
</footer>
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
  </body>
</html>
