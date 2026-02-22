<!DOCTYPE html>
<?php require_once("asset.php"); ?>
<?php
if(isLevel(10)){ 
    header("Location: index.php");
}
if(isset($_POST['btn_reg'])){
    $username=$_POST['username'];
    $realname=$_POST['realname'];
    $mail=$_POST['mail'];
    $password=$_POST['password'];
    $sql="INSERT INTO tbl_user(username, password, realname, mail) VALUES ('$username', '$password', '$realname', '$mail')";
    $result=mysqli_query($conn, $sql);
    header("Location: register.php?reg=aac7d883b45");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if(isset($_GET['reg'])): ?>
            <h1>Thank you for registering a user!</h1>
            <p>The admin have to approve the user befor you can login. A mail will be sent to th registred email when approved.</p>
    <?php else: ?>    
    <form action="register.php" method="POST">
        <input type="text" name="username" id="username" placeholder="Preferred username" required>
        <input type="text" name="realname" id="realname" placeholder="Your real name"required>
        <input type="email" name="mail" id="mail" placeholder="Your email adress" required>
        <input type="password" name="password" id="password" placeholder="Password (min 14 chars)" required>
        <input type="submit" name="btn_reg" value="Create user">
    </form>
    <?php endif; ?>
</body>
</html>