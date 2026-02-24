<!DOCTYPE html>
<?php require_once("asset.php"); ?>
<?php
$mess="";
if(isset($_SESSION['mess'])){
    $mess=$_SESSION['mess'];
}
if(isset($_POST['btnAdd'])){
    $drink=htmlentities($_POST['drinkname']);
    $desc=htmlentities($_POST['description']);
    $alc=intval($_POST['alcoholic']);
    $ingr=htmlentities($_POST['ingredients']);
    $rec=htmlentities($_POST['recipe']);
    $sql="INSERT INTO tbl_drinks (drinkname, description, ingredients, recipe, alcoholic) VALUES ('$drink', '$desc', '$ingr', '$rec', $alc)";
    $result=mysqli_query($conn, $sql);
    header("Location: index.php");
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
        <h1>Drinks</h1>
    </header>
<?php require_once("_nav.php"); ?>
    <main>
        <form action="add_drink.php" method="POST">
            <label for="descripiton">What is the name of the drink?</label>
            <input type="text" name="drinkname">
            <label for="drinkname">Describe the drink in a few words</label>
            <input type="text" name="description">
            <label for="alcoholic">Is there any alcohol in the drink?</label>
            <select name=alcoholic>
                <option value="0" checked>Not alcoholic</option>
                <option value="1">Contains alcohol</option>
                <option value="1">Ludvig Mode</option>
            </select>
            <label for="igredients">Ingredients (New row for each ingredient)</label>
            <textarea name="ingredients" rows="6"></textarea>
            <label for="recipe">How do you build the drink?</label>
            <textarea name="recipe" rows="6"></textarea>

            <input type="submit" name=btnAdd value="Add">
        </form>
    </main>
<?php require_once("_footer.php"); ?>
</body>
</html>