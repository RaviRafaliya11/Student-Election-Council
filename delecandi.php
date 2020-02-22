<?php
if(isset($_POST['delete_candi'])){

    require("include/database.php");
    if(!empty($_POST['checked_id'])){
        $idstr = implode(',',$_POST['checked_id']);
        $delete = pg_query($con,"delete from candidatestable where candidateid IN($idstr)");
        if($delete){
            echo "<script>alert('Candidates Deleted');
            window.location.href='candidelete.php'
        </script>";
        }
        else{
             echo "<script>alert('Error while deleting');
        </script>";
        }
    }
    else{
         echo "<script>alert('select atleast 1 candidate');
        </script>";
    }
}
?>