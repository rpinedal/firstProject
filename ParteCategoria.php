<?php
if ($category) { ?>

 <span class="CPcommentBy" ><strong class="postedby" style="text-decoration: none; margin-right: 10px;">
    <a href="Meme<?php echo ucfirst($category) ?>.php"><?php echo strtoupper($category) ?></strong></span>
    <br>
<?php
} else {
?>
<span class="CPcommentBy" ></span><br>
<?php  } ?>
