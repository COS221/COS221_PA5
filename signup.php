<?php
session_start();
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
    margin-top: 200px;
    padding: 50px;
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
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="name"><b>First name*</b></label>
        <input type="text" placeholder="Your name" name="name" id="name" onfocusout="validateName()" required>

        <label for="middlename"><b>Middle name*</b></label>
        <input type="text" placeholder="Your middlename" name="middlename" id="middlename"
          onfocusout="validateMiddleName()" required>

        <label for="surname"><b>Surname*</b></label>
        <input type="text" placeholder="Your surname" name="surname" id="surname" onfocusout="validateSurname()"
          required>

        <label for="email"><b>Email*</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" onfocusout="validateMail()" required>

        <label for="phone"><b>Cellphone number*</b></label> <small>(Format: 01223237898)</small><br><br>
        <input type="text" placeholder="e.g. +44 20 1234 5678" name="phone" id="phone" onfocusout="validatePhone()"
          required>

        <label for="country"><b>Country*</b></label>
        <input type="text" placeholder="South Africa" name="country" id="country" onfocusout="validateCountry()"
          required>

        <label for="region"><b>Region*</b></label>
        <input type="text" placeholder="Cape Town" name="region" id="region" onfocusout="validateRegion()" required>

        <label for="pass"><b>Password* (Must be longer than 8 characters, contain upper and lower case letters, at least
            one digit and
            one symbol)</b></label>
        <input type="password" placeholder="Enter Password" name="pass" id="pass1" minlength="8" required>

        <label for="pass-repeat"><b>Repeat Password*</b></label>
        <input type="password" placeholder="Re-enter Password" name="pass-repeat" id="pass2" minlength="8"
          onfocusout="validatePassword()" required>

        <!-- change ts and cs url later -->
        <p>By creating an account, you can&#39;t sue us ( ͡° ͜ʖ ͡° )<a
            href="https://www.termsandconditionsgenerator.com/live.php?token=xfef1kejCUCjmEyON6ZFtamFztpRhNnB"
            style="color:cornflowerblue"><br> T&#39;s and C&#39;s</a>.</p><br>
        <div class="clearfix" style="margin-bottom:30px">
          <button type="button" onclick="goHome()" class='cancelbtn'>Cancel</button>
          <button type="button" class="signupbtn" id="signup" name="submit" onclick="sub()">Sign Up</button>
        </div>

        Are you already a member? <a href="login.php" style="color:cornflowerblue"><br> Login</a>
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
  <script src="js/signup.js" defer></script>
</body>

</html>'
