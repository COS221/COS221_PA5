<?php
session_start();
if (!isset($_POST['submit'])) {
    response(false, "Enter the webpage correctly!");
    exit();
}

$submit = $_POST['submit'];
$email = strtolower($_POST['email']);
$pass = $_POST['pass'];

if (isEmpty($submit) || isEmpty($email) || isEmpty($pass)) {
    response(false, "Error: An entry is empty.");
    exit();
}
function validatePassword()
{
    $str = $GLOBALS['pass'];

    $pattern = " /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/";
    return preg_match($pattern, $str);
}

function validateEmail()
{
    $str = $GLOBALS['email'];

    $pattern = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
    return preg_match($pattern, $str);
}


//

$host = 'wheatley.cs.up.ac.za';
$username = "u22575172";
$password = "OXHR544YXMSFKLXGTK655UKTFR3Z7NKW";



if (isset($_POST['submit'])) {
    //Database connection
    $connection = new mysqli($host, $username, $password);

    if ($connection->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $connection->select_db("u22575172_wine");

        if (isThere() == false) {
            response(false, "Error: Invalid email entered");
            exit();
        }
        if (validatePassword() == false) {
            response(false, "Error: Invalid password entered. The password should be longer than 8 characters, contain upper and lower case letters, at least one digit and one symbol");
            exit();
        }
        if (validateEmail() == false) {
            response(false, "Error: Invalid Email entry. The email address should have an @ symbol");
            exit();
        }

        login();

    }

} else {
    response(false, "Error: Please enter the webpage correctly");
    exit();
}


function isThere()
{
    if (isset($GLOBALS['email'])) {

        $stmt = $GLOBALS['connection']->prepare("Select * from user where Email=?");
        $stmt->bind_param("s", $GLOBALS['email']);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            return true;
        }

        return false;
    }
    return false; //if not set
}

function isManager($userid)
{
    if (isset($GLOBALS['email'])) {

        $stmt = $GLOBALS['connection']->prepare("Select * from business where User_ID=?");
        $stmt->bind_param("i", $userid);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            return $user;
        }

        return false;
    }
    return false; //if not set
}


function login()
{
    $sql = "SELECT * FROM user WHERE Email=? LIMIT 1";
    $stmt = $GLOBALS['connection']->stmt_init();

    if ($stmt->prepare($sql)) {
        $stmt->bind_param("s", $GLOBALS['email']);
        $stmt->execute();
        $user_data = mysqli_fetch_assoc($stmt->get_result());

        $match = password_verify($_POST["pass"], $user_data['Password']); //This verifies password matches the hash stored in the DB

        if ($match == false) {
            response(false, 'Incorrect password, please check your spelling.');
        } else {
            $stmt->close();

            if (isManager($user_data['UserID'])!= false){
                //var_dump(isManager($user_data['UserID'])["BName"]);
                $arr=isManager($user_data['UserID']);
                $_SESSION['BName'] = $arr['BName'];
                $_SESSION['Business_ID'] = $arr['Business_ID'];
            }
                
            //The following code is for favourite wine etc. if implemented 
            //we may change these later
            //def stands for default
            $_SESSION['API_Key'] = $user_data['API_Key'];
            $_SESSION['UserID'] = $user_data['UserID'];
            $_SESSION['First_name'] = $user_data['First_name'];
            $_SESSION['Middle_name'] = $user_data['Middle_name'];
            $_SESSION['Last_name'] = $user_data['Last_name'];
            $_SESSION['Email'] = $user_data['Email'];
            $_SESSION['PhoneNumber'] = $user_data['PhoneNumber'];

            // $_SESSION['lName'] = $user_data['Last_name'];
            //Example code
            //$_SESSION['APIkey'] = $user_data['API_key'];
            response($match, 'Welcome back, ' . $_SESSION['First_name']);
        }
    }

}

function response($success, $message = "")
{
    header("HTTP/1.1 200 OK");
    header("Content-Type: application/json");

    echo json_encode([
        "success" => $success,
        "message" => $message
    ]);
}

function totitle($string)
{
    return ucfirst(strtolower($string));
}

function isEmpty($string)
{
    return $string === "";
}
?>