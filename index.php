<!DOCTYPE html>
<?php require_once("asset.php");?>
<?php

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
        <h1>Drinks</h1>
    </header>    
    <nav>
        <a href="index.php">Hem</a>
        <a href="about.php">About</a>
        <div class="fill"></div>
        <button popovertarget="login">Login</button>
    </nav>
    <main>

    </main>
    <footer>
        &copy;2026 Ludvig Norberg
    </footer>
    <dialog id="login" popover>
        <form action="_login.php" method="POST">
            <input type="text" name="user" placeholder="Username" requierd>
            <input type="password" name="pass" placeholder="Password" requierd>
            <input type="submit" name="btn_login" value="Log in">
        </form>
    </dialog>
</body>
</html>