<?php //this page send the data to validate-login, which will then set session variables and accept user into website or reject
if (!isset($_SESSION)) {
  session_start();
}
?>

<!DOCTYPE html>
<html>
<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
    border-radius: 25px;
  }

  * {
    box-sizing: border-box;
  }

  input {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: cornsilk;
    border-radius: 25px;
  }

  input:focus {
    background-color: #ddd;
    outline: none;
  }

  button:hover {
    border: 1px black;
    box-shadow: 0 0 5px black,
      0 0 5px black,
      0 0 5px black,
      0 0 5px black;

  }

  button {
    background-color: forestgreen;
    color: whitesmoke;
    padding-top: 10px;
    padding-bottom: 10px;
    margin: 8px 0;

    cursor: pointer;
    width: 40%;
    opacity: 0.9;
    font-size: large;

    border-radius: 25px;
  }

  .container {
    padding: 50px;
    border-radius: 25px;
  }

  .cancelbtn {
    padding-top: 10px;
    padding-bottom: 10px;
    background-color: red;
  }

  .cancelbtn,
  .signupbtn {
    width: 100%;
  }

  .center-stage {
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    /*overflow-y: none; */
    background-color: rgb(83, 72, 58);
    background-blend-mode: multiply;
    background-image: linear-gradient(rgba(0, 0, 0, 0.30), rgba(0, 0, 0, 0.3)), url("https://images.unsplash.com/photo-1595878715977-2e8f8df18ea8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80");
    background-size: cover;
    background-repeat: no-repeat;
  }


  .center-stage-content {

    background-color: #fefefe;
    margin: 5% auto 15% auto;
    border: 1px solid #888;
    width: 80%;

    /* box-shadow: 0 0 50px darkorange,
                  0 0 15px black,
                  0 0 60px black,
                  0 0 20px black; */

    border-radius: 25px;

  }

  hr {
    border: 1px solid grey;
    margin-bottom: 25px;
  }
</style>

<body>

  <div id="moduluso" class="center-stage">
    <form class="center-stage-content" id="frm-submit">
      <div class="container">
        <h1>Login</h1>
        <p>Welcome to Vineyard</p>
        <hr>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" onfocusout="validateMail()" required>

        <label for="pass"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pass" id="pass1" minlength="8" required>

        Are you not a member?👀 <a href="signup.php" style="color:cornflowerblue"><br> Sign up</a>
        <div class="clearfix">
          <!-- <button type="button" onclick="goHome()"  class='cancelbtn'>Cancel</button> -->
          <button type="button" class="signupbtn" id="signup" name="submit" onclick="sub()">Login</button>
        </div>
      </div>
    </form>
    <div class="af" id="after">

    </div>
  </div>



  <script>
    // Get the center-stage

    function startup() {
      document.getElementById("moduluso").style.display = "block";
      document.getElementById("moduluso").style.width = "100%";
    }
    var centerstage = document.getElementById("moduluso");

    window.onload = startup();
  </script>
  <script src="js/login.js"></script>
</body>

</html>'