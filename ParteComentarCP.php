<?php 
if (isset($_SESSION['username'])) {
?>
<form class="content" action='POST' onkeydown="return event.key != 'Enter';">
<div style="text-align: left; height:auto; margin-top: 5px; padding-top: 3px;">

<input type='hidden' name='uid' value="<?php echo $postedBY; ?>">

        <input type='hidden' name='image_id' value="<?php echo $imageID; ?>">
                <strong class="postedby" style="font-size: 16px;">
<?php

include 'ParteAvatarUser.php';

?>        
                </strong> 
 
        <input maxlength="155" class="CommentInput" type="text" placeholder="<?php echo $_SESSION['username'] ?>: Deja tu comentario" id='comment<?php echo $imageID; ?>' required>

<span id="comentar<?php echo $imageID; ?>" onclick='return setCommentFeed("<?php echo $imageID; ?>")' style="color: grey; font-size: 19px; margin-left: 5px; padding-top: 7px;">
        <li class="fa fa-send-o" ></li>
</span>

<div class="ComScrollCP">
<span id="commentst2<?php echo $imageID ?>"></span>

</div>

</div>

<?php
} else { ?>
<br>
<div style="text-align: left;">
 <strong class="postedby" style="font-size: 16px;"> </strong> <input onclick="loginNeeded(<?php echo $imageID ?>)" class="CommentInput" type="text" placeholder=" Deja tu comentario...">
</div>
 
<?php
}
?>
</form>