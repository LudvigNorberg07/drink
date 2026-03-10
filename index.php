<!DOCTYPE html>
<?php require_once("asset.php"); ?>
<?php
$mess="";
if(isset($_SESSION['mess'])){
    $mess=$_SESSION['mess'];
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
    <div class="container">
        <div class="info">
            <h1 class="message"><?=$mess;?></h1>
            <p>Our school project focused on developing a modern and interactive website about drinks, mainly alcoholic beverages such as cocktails, wine, beer, and spirits. The goal was to create a platform where users could explore different drinks, learn about their ingredients, and share their opinions. We began by planning the structure and categories of the site, then designed the layout using HTML and CSS to create a clean and user-friendly interface. JavaScript was implemented to add interactive features.

The website is simple to use. Users can browse drinks by category or search for specific ones. Each drink has its own page with a description and ingredients list. Visitors can also rate drinks using a rating system and leave feedback. Additionally, users can add new drinks through a submission form by entering the name, ingredients, and a short description. This made the website both informative and interactive.</p>
            <?php if(isLevel(10)): ?>
                <a href="add_drink.php" class="addDrink">Add new drink!</a>
            <?php endif; ?>
        </div>
        <div class="drinks">
            <?php
                $sql = "
                SELECT
                    d.*,
                    COALESCE(AVG(r.rating), 0) AS avg_rating
                FROM tbl_drinks d
                LEFT JOIN tbl_ratings r ON d.id = r.drinkID
                GROUP BY d.id
                ORDER BY avg_rating DESC, d.drinkname ASC
                ";
                $result = mysqli_query($conn, $sql);
            ?>
            <?php while($row=mysqli_fetch_assoc($result)): ?>
               <?php 
                ?> 
            <details>
                <summary>
                    <div><h2><?=$row['drinkname']?>&nbsp;&nbsp;<span><?=isAlcoholic(intval($row['alcoholic']))?></span></h2>
                    <h4><?=$row['description']?></h4></div> 
                    <div class="filler"></div>  
            
                    <div class="ratingDiv">
                        Rated: <?=showRating($row['avg_rating']);?>

                        <div class="yourRating">
                            <a href="rating.php?rating=5&drinkID=<?=$row['id']?>" class="olive">🫒</a>
                            <a href="rating.php?rating=4&drinkID=<?=$row['id']?>" class="olive">🫒</a>
                            <a href="rating.php?rating=3&drinkID=<?=$row['id']?>" class="olive">🫒</a>
                            <a href="rating.php?rating=2&drinkID=<?=$row['id']?>" class="olive">🫒</a>
                            <a href="rating.php?rating=1&drinkID=<?=$row['id']?>" class="olive">🫒</a>
                            Your rating:
                        </div>  
                    </div>
                </summary>
                <div class="ingredients">
                    <pre><?=$row['ingredients']?></pre>
                </div>
                <div class="recipe">    
                    <pre><?=$row['recipe']?></pre>
                </div>
            </details> 
            <?php endwhile; ?>
        </div>
    </div>
    </main>
<?php require_once("_footer.php"); ?>
    <dialog id="login" popover>
        <form action="_login.php" method="POST" class="addForm">
            <label for="user">Username</label>
            <input type="text" name="user" placeholder="Username" required>
            <label for="pass">Password</label>
            <input type="password" name="pass" placeholder="Password" required>
            <input type="submit" name="btn_login" value="Log in">
        </form>
    </dialog>
    <script src="java.js"></script>
</body>
</html>