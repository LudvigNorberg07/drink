<?php
session_start();
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="drink";
$conn=mysqli_connect($db_host, $db_user, $db_pass, $db_name);

function isLevel($level){
    if(isset($_SESSION['level'])){
        if(intval($_SESSION['level'])>=$level){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function fix($str_raw){
    $str_raw=trim($str_raw);
    $str_raw=stripslashes($str_raw);
    $str_raw=htmlspecialchars($str_raw); 
    return $str_raw;
}

function isUserTaken($username){
    global $conn;
    $sql="SELECT username FROM tbl_user WHERE username='$username'";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        return true;
    }else{
        return false;
    }
}
function showRating($drinkID){
    $db_host="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="drink";
    $conn=mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $sql="SELECT avg(rating) FROM tbl_ratings WHERE drinkID=$drinkID";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $number=$row['avg(rating)'];

    if($row){
        $retStr="";
        for($vdo=1;$vdo<=5;$vdo++){
            if($vdo<=$number){
                $retStr .= "<span class='olive'>🫒</span>";
            }else{
                $retStr .= "<span class='olive grey'>🫒</span>";
            }
        }
        return $retStr;
    }else{
        $retStr="";
        for($vdo=1;$vdo<=5;$vdo++){
            $retStr .= "<span class='olive grey'>🫒</span>";
        }
    }


    $number=intval(round($result));
    $retStr="";
    for($vdo=1;$vdo<=5;$vdo++){
        if($vdo<=$number){
            $retStr .= "<span class='olive'>🫒</span>";
        }else{
            $retStr .= "<span class='olive grey'>🫒</span>";
        }
    }
    return $retStr;
}
function isAlcoholic($value){
    if($value){
        return "😎🍹";
    }else{
        return "🤓🥤";
    }
}
function isSelected($val){
    $val=boolval($val);
    if($val){
        return true;
    }else{
        return false;
    }
}
function rateDrink($val, $drinkID){
    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_assoc($result);
    }
}
?>