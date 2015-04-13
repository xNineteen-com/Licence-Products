<?php
$db_host = 'HOST';
$db_user = 'DB_USER';
$db_pass = 'DB_PASS';
$db_name = 'DB_NAME';
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

function KeyGen(){
	
     $key = sha1("Pr0t3ct".md5("Pr0t3ct".microtime())."Pr0t3ct");
     $new_key = '';
     for($i=1; $i <= 25; $i ++ ){
               $new_key .= $key[$i];
               if ( $i%5==0 && $i != 25) $new_key.='-';
     }
  return strtoupper($new_key);
  }


  
  
  
  
  ?>