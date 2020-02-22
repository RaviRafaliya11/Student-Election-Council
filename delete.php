<?php
require("include/database.php");
if(isset($_GET['id'])){
$id = $_GET['id'];
$select = pg_query_params($con,"select * from idreqtable where id = $1",array($id));
 $delete = "delete from idreqtable where id=$1";
$del = pg_query_params($con,$delete,array($id));
    if($del){
        echo "<script>alert('Request Denied');
        
        window.location.href='request_id_accept.php';
        </script>";
    }
    else{
        echo "<script>alert('Request Pending');</script>";
    }
}
?>