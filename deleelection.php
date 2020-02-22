<?php
if(isset($_POST['delete_ele'])){

    require("include/database.php");
    
    if(!empty($_POST['checked_id'])){
        $idstr = implode(',',$_POST['checked_id']);
        $delete = pg_query($con,"delete from electiontable where electionid IN($idstr)");
        if($delete){
            echo "<script>alert('Elections Deleted');
            window.location.href='eledelete.php'
        </script>";
        }
        else{
             echo "<script>alert('Error while deleting');
        </script>";
        }
    }
    else{
         echo "<script>alert('select atleast 1 election');
        </script>";
    }
}
?>