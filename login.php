<?php //this page send the data to validate-login, which will then set session variables and accept user into website or reject
if (!isset($_SESSION)) {
  session_start();
}
?>

<!DOCTYPE html>
<html>
<style>
  @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

  * {
    box-sizing: border-box;
  }

  body {
    background-image: url(img/backgroundMountain.jpg);
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    font-family: 'Montserrat', sans-serif;
    height: 100vh;
    margin: -20px 0 50px;
  }

  h1 {
    font-weight: bold;
    margin: 0;
  }

  h2 {
    text-align: center;
  }

  p {
    font-size: 14px;
    font-weight: 100;
    line-height: 20px;
    letter-spacing: 0.5px;
    margin: 20px 0 30px;
  }

  span {
    font-size: 12px;
  }

  a {
    color: #333;
    font-size: 14px;
    text-decoration: none;
    margin: 15px 0;
  }

  button {
    border-radius: 20px;
    background-color: #00192b;
    color: #FFFFFF;
    font-size: 12px;
    font-weight: bold;
    padding: 12px 45px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
  }


  form {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 50px;
    height: 100%;
    text-align: center;
  }

  input {
    background-color: #eee;
    border: none;
    padding: 12px 15px;
    margin: 8px 0;
    width: 100%;
  }

  .container {
    padding-top: 30px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
      0 10px 10px rgba(0, 0, 0, 0.22);
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    min-height: 480px;
  }
</style>

<body>

  <div id="moduluso" class="center-stage">
    <form class="center-stage-content" id="frm-submit">
      <div class="container">
        <h1>Login</h1>
        <p>Welcome to Vineyard</p>
        <hr>

        <label for="email"><b>Email</b></label><br>
        <input type="text" style="width:400px" placeholder="Enter Email" name="email" id="email"
          onfocusout="validateMail()" required><br>

        <label for="pass"><b>Password</b></label><br>
        <input type="password" style="width:400px" placeholder="Enter Password" name="pass" id="pass1" minlength="8"
          required>

        <div class="clearfix">
          <!-- <button type="button" onclick="goHome()"  class='cancelbtn'>Cancel</button> -->
          <button type="button" style="margin-top:20px; margin-bottom:10px" class="signupbtn" id="signup" name="submit"
            onclick="sub()">Login</button>
          <a href="signup.php" style="margin-top:20px"><br>Sign up</a>
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