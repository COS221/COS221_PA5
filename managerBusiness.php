<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
 if (!isset($_SESSION["Business_ID"])) {
    # code...
    //echo ("٩(▀̿Ĺ̯▀̿ ̿٩)三");
    header("Location: login.php");
    //die();
 }

?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <style>
      .d-flex {
        justify-content: center;
        align-items: center;
      }

      .heading {
        text-align: center;
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
    <script src="js/managerBusiness.js"></script>
    <title>Manager View</title>
  </head>
  <body>
    <ul class="nav nav-tabs d-flex">
      <li class="nav-item logo">
        <a href="index.php"><img src="img\Vineyard.svg" alt="Logo" /></a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link active"
          aria-current="page"
          href="managerBusiness.php"
          >Business</a
        >
      </li>
      <li class="nav-item">
        <a class="nav-link" href="managerWines.php">Wines</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="EventsBusiness.php">Events</a>
      </li>
    </ul>

    <div id="container"></div>

    <button
      type="submit"
      class="btn btn-primary btn-lg d-block mx-auto"
      onclick="updateInfo()"
    >
      Update Information
    </button>
    <div id="formContainer" class="container"></div>
    <div class="after" id="after" >
    <input type="text" name="apistuff1" id="API_Key" value="<?php echo $_SESSION["API_Key"];?>" style="display:none">
    <input type="text" name="apistuff2" id="BName" value="<?php echo $_SESSION["BName"];?>" style="display:none">
    <input type="text" name="apistuff3" id="Business_ID" value="<?php echo $_SESSION["Business_ID"];?>" style="display:none">
  </div>
  </body>
</html>
