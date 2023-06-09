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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Info</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    .form-group {
      margin-top: 40px;
      margin-bottom: 20px;
    }
    .d-flex {
        justify-content: center;
        align-items: center;
      }

    .logo {
        display: flex;
        align-items: center;
        margin-right: 1rem;
      }

      .logo img {
        height: 100px; /* Adjust the height as needed */
        margin-right: 0.5rem;
      }
      
  </style>
  <script src="js/usersettings.js"></script>
</head>
<body> 
    <!--Nav-->
    <ul class="nav nav-tabs d-flex">
      <li class="nav-item logo">
        <a href="index.php"><img src="img\Vineyard.svg" alt="Logo" /></a>
      </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="usersettings.php">Settings</a>
        </li>
    </ul>
      

    <!--Form-->
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="text-center">
              <h1>User Info</h1>
            </div>
            <div class="row">
              <div class="col">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username">
              </div>
      
              <div class="col">
                <label for="middleName">Middle Name:</label>
                <input type="text" class="form-control" id="middleName">
              </div>
      
              <div class="w-100"></div>
      
              <div class="col">
                <label for="firstName">First Name:</label>
                <input type="text" class="form-control" id="firstName">
              </div>
      
              <div class="col">
                <label for="lastName">Last Name:</label>
                <input type="text" class="form-control" id="lastName">
              </div>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="password">
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="showPasswordButton">Show</button>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="country">Region:</label>
                <input type="text" class="form-control" id="region">
              </div>

              <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" id="country">
              </div>
      
            <div class="text-center">
              <h3>Contact Info</h3>
            </div>
      
            <div class="form-group">
              <label for="email">Email Address:</label>
              <input type="email" class="form-control" id="email">
            </div>
      
            <div class="form-group">
              <label for="number">Phone Number:</label>
              <input type="tel" class="form-control" id="number">
            </div>
      
            <div class="text-center">
              <button type="submit" class="btn btn-primary" onclick="updateInfo()">Update Info</button>
            </div>
          </div>
        </div>
      </div>
      
      <div id="formContainer" class="container"></div>
    <div class="after" id="after" >
    <input type="text" name="apistuff1" id="API_Key" value="<?php echo $_SESSION["API_Key"];?>" style="display:none">
    <input type="text" name="apistuff4" id="Email" value="<?php echo $_SESSION["Email"];?>" style="display:none">
    <input type="text" name="apistuff5" id="UserID" value="<?php echo $_SESSION["UserID"];?>" style="display:none">
  </div>


</body>
</html>
