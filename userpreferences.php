<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
 if (!isset($_SESSION["API_Key"])) {
    # code...
    //echo ("٩(▀̿Ĺ̯▀̿ ̿٩)三");
    header("Location: login.php");
    //die();
 }

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .d-flex {
            justify-content: center;
        }
    </style>
    <title>User Prefernces</title>
</head>
<body>
    <ul class="nav nav-tabs d-flex">
        <li class="nav-item">
            <a class="nav-link" href="usersettings.php">Settings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="userpreferences.php">Prefrences</a>
        </li>
    </ul>

    <div id="formContainer" class="container"></div>
    <div class="after" id="after" >
    <input type="text" name="apistuff1" id="API_Key" value="<?php echo $_SESSION["API_Key"];?>" style="display:none">
    <input type="text" name="apistuff4" id="Email" value="<?php echo $_SESSION["Email"];?>" style="display:none">
    <input type="text" name="apistuff5" id="UserID" value="<?php echo $_SESSION["UserID"];?>" style="display:none">
  </div>
</body>
</html>
