<?php
require_once("asset.php");

if (isset($_POST['btn_login'])){
    $user=$_POST['user'];
    $pass=password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $sql="SELECT * FROM tbl_user WHERE (username='$user' AND password='$pass')";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)===1){
        //INLOGGAD
        $row=mysqli_fetch_assoc($result);
        $_SESSION['mess']="Login successful!";
        $_SESSION['name']=$row['realname'];
        $_SESSION['level']=$row['userlevel'];
        $_SESSION['id']=$row['id'];
    }else{
        //INTE INLOGGAD >:(
        $_SESSION['mess']="Login failed! Wrong username or password.";
        $_SESSION['name']="";
        $_SESSION['level']="";
        $_SESSION['id']="";
    }
    header("Location: index.php");
}
?>