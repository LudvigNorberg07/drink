<?php
require_once("asset.php");
if(!islevel(10)){
    header("Location: index.php");
    exit;
}
$chosenRating = intval($_GET['rating']);
$chosenID = intval($_GET['drinkID']);
$userID = ($_SESSION['id']);

/*Behöver ha en if sats som ser till att rating som kommer in är 1 - 5*/
if($chosenRating < 1 or $chosenRating > 5){
    header("Location: index.php");
    exit;
}

$sql="SELECT * FROM tbl_ratings WHERE drinkID=$chosenID AND userID=$userID";

$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

if(!$row){ 
    /*Set New*/
    $sql= "INSERT INTO tbl_ratings (rating, drinkID, userID) VALUES ($chosenRating,$chosenID,$userID)";
    $result=mysqli_query($conn,$sql);
    header("Location: index.php");
}else{
    /*Update current*/
    $sql="UPDATE tbl_ratings SET rating=$chosenRating where drinkID=$chosenID AND userID=$userID";
    $result=mysqli_query($conn,$sql);
    header("Location: index.php");
}
?>