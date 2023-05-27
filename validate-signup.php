<?php

if (!isset($_POST['submit'])){
    response(false, "Enter the webpage correctly!");
    exit();
}

        $submit = $_POST['submit'];
        $name = totitle($_POST['name']) ;
        $Middle_name = totitle($_POST['middlename']) ;
        $Last_name =totitle($_POST['surname']) ;
        $Country =totitle($_POST['country']) ;
        $Region =totitle($_POST['region']) ;
        $email = strtolower($_POST['email']) ;
        $pass = $_POST['pass'];
        $phone = $_POST['phone'];

        if (isEmpty($submit) || isEmpty($name) || isEmpty($Last_name) || isEmpty($email) || isEmpty($pass) || isEmpty($phone) || isEmpty($Country) || isEmpty($Region)){
            response(false, "Error: An entry is empty.");
            exit();
        }
//
        function validateName(){
             $str= $GLOBALS['name'];

            $pattern ="/^[A-Za-z]+$/";
            return preg_match($pattern,$str);
        }
        function validatePassword(){
           $str= $GLOBALS['pass'];

           $pattern =" /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/";
           return preg_match($pattern,$str);
       }
       function validateMiddle_name(){
        $str= $GLOBALS['Middle_name'];

        $pattern ='/^[A-Za-z]+$/';
        return preg_match($pattern,$str);
    }
        function validateLast_name(){
            $str= $GLOBALS['Last_name'];

            $pattern ='/^[A-Za-z]+$/';
            return preg_match($pattern,$str);
        }
        
        function validateEmail(){
            $str= $GLOBALS['email'];

            $pattern ="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
            return preg_match($pattern,$str);
        }
        function validatePhone(){
            $str= $GLOBALS['phone'];

            $pattern ="/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/";
            return preg_match($pattern,$str);
        }


//

    $host = 'wheatley.cs.up.ac.za';
    $username="u22575172";
    $password="OXHR544YXMSFKLXGTK655UKTFR3Z7NKW";



    if (isset($_POST['submit'])){
        //Database connection
        $connection = new mysqli($host,$username,$password);
        
        if ($connection->connect_error){
            die('Connection Failed: '.$conn->connect_error);
        }
        else {
            $connection->select_db("u22575172_wine");
            
            if (uniqueEmail() ==false){
                response(false, "Error: Duplicate email");
                exit();
            }
            if (validateName() == false )
            {
                response(false, "Error: Invalid name entered. Names can only have letters of the alphabet.");
                exit();
            }
            if (validateMiddle_name()== false)
            {
                response(false, "Error: Invalid Middle name entered. Middle names can only have letters of the alphabet.");
                exit();
            }
            if (validateLast_name()== false)
            {
                response(false, "Error: Invalid Last name entered. Last names can only have letters of the alphabet.");
                exit();
            }
            if (validatePassword() == false)
            {
                response(false, "Error: Invalid password entered. The password should be longer than 8 characters, contain upper and lower case letters, at least one digit and one symbol");
                exit();
            }
            if (validateEmail()== false )
            {
                response(false, "Error: Invalid Email entry. The email address should have an @ symbol");
                exit();
            }

            createUser(createCountry());
        }        



    } else{
        response(false, "Error: Please enter the webpage correctly");
        exit();
    }


//     function checkRegion()  //I left out the verification of whether the region is already in the database due to possible confusion
// {
// 	if (isset($GLOBALS['country'])){

//         $stmt = $GLOBALS['connection']->prepare("Select * from region where Country=? AND RegionName=?");
//         $stmt->bind_param("ss",$GLOBALS['country'],$GLOBALS['region']);
//         $stmt->execute();

//         $result = $stmt->get_result();
//         $res = $result->fetch_assoc();
        
//         if ($res) {
//             return false;
//         }

//         return $res;
       
//     }
//     return false;
// }

function createCountry(){
    $stmt = $GLOBALS['connection'] -> stmt_init();
    if ($stmt -> prepare("INSERT INTO region (Country,RegionName) VALUES (?,?)")) {

        $stmt -> bind_param("ss",$GLOBALS['Country'],$GLOBALS['Region']);
        $stmt -> execute();
        $stmt -> close();

        $stmt2 = $GLOBALS['connection'] -> stmt_init();

        if ($stmt2 -> prepare("SELECT * FROM region where Country =? AND RegionName = ? LIMIT 1")) {

            $stmt2 -> bind_param("ss",$GLOBALS['Country'],$GLOBALS['Region']);
            $stmt2 -> execute();

            $stmt2 -> execute();
            $user_data = mysqli_fetch_assoc($stmt2->get_result());
            return $user_data['Region_ID'];  //SUS, may have to change
        }    

        
    }

}

function uniqueEmail()
{
	if (isset($GLOBALS['email'])){

        $stmt = $GLOBALS['connection']->prepare("Select * from user where email=?");
        $stmt->bind_param("s",$GLOBALS['email']);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        
        if ($user) {
            return false;
        }

        return true;
       
    }
    return false;
}
function createUser($region_id){
        $key = implode('-', str_split(strtolower(md5(microtime().rand(1000, 9999) )), 6));
        $stmt = $GLOBALS['connection'] -> stmt_init();

        $hash_variable_salt = password_hash($GLOBALS['pass'],PASSWORD_ARGON2I, array('cost' => 15));

        if ($stmt -> prepare("INSERT INTO user (First_name,Middle_name,Last_name,Region_id,Password,Email,API_key,PhoneNumber) VALUES (?,?,?,?,?,?,?,?)")) {
            // Bind parameters
            $stmt -> bind_param("ssssssss",$GLOBALS['name'],$GLOBALS['Middle_name'],$GLOBALS['Last_name'],$region_id,$hash_variable_salt,$GLOBALS['email'],$key,$GLOBALS['phone']);
          
            // Execute query
            $stmt -> execute();
          
            // Close statement
            $stmt -> close();

            response(true, "Your key is ".$key);
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

function totitle($string){
    return ucfirst(strtolower($string));
  }

function isEmpty($string){
    return $string ==="";
} 
?>