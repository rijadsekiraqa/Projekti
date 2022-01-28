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

if(isset($_GET['pid'])){
    $pid=$_GET['pid'];
    global $dbconn;
    $sql="DELETE FROM products WHERE id=$pid";
    $res=mysqli_query($dbconn,$sql);
    if($res){
        header("Location: ./products.php");
        $_SESSION['mesazhi'] ="Anetarri u fshi me sukses";
    }
    else{
        die("Gabim" . mysqli_error($dbconn));
    }
}


?>