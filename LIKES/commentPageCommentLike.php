<?php
include 'Database/dbConnect.php';
$responseC = "";
$commentQuery = $db->query("SELECT * FROM comment WHERE image_pid = $imageID ORDER BY date DESC");
if($commentQuery->num_rows > 0){
  while($rowC = $commentQuery->fetch_assoc()){
    $date = mysqli_real_escape_string($db, $rowC["date"]);
     $postID = mysqli_real_escape_string($db, $rowC["image_pid"]);
       $comments = mysqli_real_escape_string($db, $rowC["comment"]);
         $commentedBy = mysqli_real_escape_string($db, $rowC["sender"]);
           $numberTabs = $numberTabs + 1;
          $comID = mysqli_real_escape_string($db, $rowC['id']);
          $commentLike = mysqli_real_escape_string($db, $rowC['comlike']);
          
$responseC .= '           
<div class="container">  
        <div class="indexcard spaces'.$numberTabs.'">
          <div class="card-body">
          
          ';
         
        if (isset($_SESSION['username'])) {
            if ($_SESSION['username'] == $commentedBy or $_SESSION['username'] == "Admin" ) {   
            $responseC .= '
            <div style="margin-top: -25px; padding:0px;" id="delete'.$imageID.'">
                <div style="margin-top: 25px; padding:0px;" id="delete<?php echo $imageID; ?>">
                    <span style="color:red; float: right;" onclick="forDelete(<?php echo $imageID; ?>)" >
                     Eliminar
                    </span>&nbsp;&nbsp; 
</div>
</div>';
 } } 
     $responseC .= '
          
          
            
             <span class="CPcommentBy2"><strong class="postedby">'.$commentedBy.'</strong></span>
               <p class="CPcommentBy2">'.$date.'</p>
                  <div class="nonewline">'.$comments.'</div>

</div>     
        </div>
        </div><br>';
 }

} else  { 
       $responseC .= '
    <div class="container elseErrorIndex">
      <p>Lo sentimos aun no tenemos comentarios para este Meme</p>
      <p>Se el primero en comentar!</p>
    </div>
    '; }