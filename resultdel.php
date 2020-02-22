<?php
if(isset($_POST['delete_result'])){

    require("include/database.php");
    if(!empty($_POST['checked_id'])){
        $idstr = implode(',',$_POST['checked_id']);
        $delete = pg_query($con,"delete from result where id IN($idstr)");
        if($delete){
            echo "<script>alert('User result Deleted');
            window.location.href='deleresult.php'
        </script>";
        }
        else{
             echo "<script>alert('Error while deleting');
        </script>";
        }
    }
    else{
         echo "<script>alert('select atleast 1 user');
        </script>";
    }
}

?>