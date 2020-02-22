<?php 
require("include/database.php");
if(isset($_GET["token"])){

	$token = $_GET['token'];
    
    $query = pg_query_params($con,"update userdetails set status = 'active' where token = $1", array($token));
	if($query) {
		echo "<script>alert('verification successful, you can log in now');window.location.href='User.php'</script>";
	}else{
		echo "<script>alert('You cannot verify, something wrong');</script>";
	}

}

?>