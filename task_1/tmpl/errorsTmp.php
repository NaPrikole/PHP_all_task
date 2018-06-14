<?php
if($errors){
  foreach($errors as $err){
   echo "<div class=\"errors\">
          <p>{$err}</p>
       </div>";
  }
} elseif($message){
  echo "<div class=\"success\">
         <p>{$message}</p>
      </div>";
}
?>
