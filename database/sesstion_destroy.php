<?php
 
 session_start(); 
 $_SESSION = array(); 
 session_destroy(); 
 header('location: ../project/welcome.html'); 
//  destroy ssetion

?>