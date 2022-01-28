<?php

global $dbconn;
connection();
function connection(){
    global $dbconn;
    $dbconn=mysqli_connect('localhost', 'root','', 'webprojekti1');
     //mysqli_select_db(dbconn, dbname);
     if(!$dbconn){
         die("Gabim". mysqli_error($dbconn));
     }
}

if(isset($_GET['aid'])){
    $aid=$_GET['aid'];
    global $dbconn;
    $sql="DELETE FROM users WHERE id=$aid";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        header("Location: ./users.php");
        $_SESSION['mesazhi'] ="Anetarri u fshi me sukses";
    }
    else{
        die("Gabim" . mysqli_error($dbconn));
    }
}


?>