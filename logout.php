<?php //unsets session and redirects to login page, we can change this behaviour to redirect to Wines
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

session_unset();
header("Location: Wines.php");
?> 