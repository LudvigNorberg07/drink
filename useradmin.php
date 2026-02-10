<!DOCTYPE html>
<?php require_once("asset.php");?>


<?php
/*if(!isLevel(1000)){
    header("Location: index.php");
}*/
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
                    <div>
                        <div class="id">ID: <?=$row['id'];?></div>
                        <div class="user">Username: <?=$row['username'];?></div>
                        <div class="level">Level: <?=$row['userlevel'];?></div>
                    </div>
                    <div class="last">Last Login: <?=$row['lastlogin']; ?></div>
                    <div class="created">User created: <?=$row['created']; ?></div>
                    <div class="buttons">
                        <a href="useradmin.php?level=100">Demote</a>
                        <a href="useradmin.php?edit=<?=$row['id'];?>">Edit</a>
                        <a href="useradmin.php?del=<?=$row['id'];?>">Purge</a>
                    </div>
                </details>
            <?php endwhile; ?>
    </main>
    <?php require_once("_footer.php");?>
</body>
</html>