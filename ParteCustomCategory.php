<?php
include 'Database/dbConnect.php';
$bestCategoryQuery = 'SELECT Category, COUNT(Category) AS COUNT FROM `images` WHERE Category != "" AND Category != "nuevos" AND Category != "populares" AND Category != "memes" AND Category != "divertido" AND Category != "juegos" AND Category != "fracasos" AND Category != "exitos" AND Category != "animales" AND Category != "nsfw" GROUP BY Category ORDER BY COUNT DESC LIMIT 3';
$categoryResult = mysqli_query($db, $bestCategoryQuery);

while($rowCustom = $categoryResult->fetch_array()) { ?>
<li class="nav-item hiddenbig">
    <a class="nav-link hiddenbig" style="color: white;" href="highscores.php"><?php echo $rowCustom['Category'] ?></a>
  </li>

<?php } ?>