<!DOCTYPE html>
<?php require_once("asset.php");?>


<?php
/*if(!isLevel(1000)){
    header("Location: index.php");
}*/
if (isset($_GET['del'])){
    $id=intval($_GET['del']);
    $sql="DELETE FROM tbl_user WHERE id=$id";
    $result=mysqli_query($conn,$sql);
}
if(isset($_GET['level'])){
    $id=intval($_GET['level']);
    $sql="SELECT userlevel FROM tbl_user WHERE id=$id";
    $result=mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $initlevel=$row['userlevel'];
    $newlevel= $initlevel-100;
    $sql="UPDATE tbl_user SET userlevel=$newlevel WHERE id=$id";
    $result=mysqli_query($conn, $sql);
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
    <header>
        <h1>User Admin</h1>
    </header>
    <?php require_once("_nav.php");?>
   <main>
        <?php
            $sql="SELECT * FROM tbl_user ORDER BY userlevel DESC";
            $result=mysqli_query($conn, $sql);
            while($row=mysqli_fetch_assoc($result)): ?>
                <details>
                    <summary>
                        <div class="id"><?=$row['id'];?></div>
                        <div class="user"><?=$row['username'];?></div>
                        <div class="level"><?=$row['userlevel'];?></div>
                    </summary>
                    <div class="realname"><?=$row['realname'];?></div>
                    <div class="mail"><a href="mailto:<?=$row['mail'];?>"><?=$row['mail'];?></a></div>
                    <div class="userdetails">
                        <div class="id">ID: <?=$row['id'];?></div>
                        <div class="user"> Username: <?=$row['username'];?> </div>
                        <div class="level">&nbsp;&nbsp;Level: <?=$row['userlevel'];?> </div>
                    </div>
                    <div class="last">Last Login: <?=$row['lastlogin']; ?></div>
                    <div class="created">User created: <?=$row['created']; ?></div>
                    <div class="buttons">
                        <a href="useradmin.php?level=<?=$row['id'];?>">Demote</a>
                        <a href="useradmin.php?edit=<?=$row['id'];?>">Edit</a>
                        <a href="useradmin.php?del=<?=$row['id'];?>">Purge</a>
                    </div>
                </details>
            <?php endwhile; ?>
    </main>
    <?php require_once("_footer.php");?>
</body>
</html>