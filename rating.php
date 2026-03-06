<?php
require_once("asset.php");
if(!islevel(10)){
    header("Location: index.php");
}
$sql="SELECT * FROM tbl_ratings";
$result=mysqli_query($conn, $sql);
if(mysqli_num_rows($result)=1){
    $row=mysqli_fetch_assoc($result);
    $drinkID=$row['drinkID'];
    $userID=$row['userID'];
    $rating=$row['rating'];
}
$chosenRating = intval($_GET['rating']);
$chosenID = intval($_GET['drinkID']);

?>