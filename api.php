<?php
// if(!isset($_SESSION))   //for sending session data to clientSide
// { 
//     session_start(); 
// } 

function isEmpty($param){
  return $param == "";
}

$json =file_get_contents('php://input');
$data = json_decode($json);          


//this can be refactored later on, I could not get $_POST to work
//ALSO, we can change the queries to use prepared statements
//Apologies for teh bad indentations, The api may be verbose for now

// $resultObject = new stdClass();
// $resultObject->status = 'success';
// $resultObject->timestamp = time();
// $resultObject->data = [];

function success($arr){ //place relevent headers
  
  header("HTTP/1.1 200 OK");
	header("Content-Type: application/json");
$resultObject = new stdClass();
$resultObject->status = 'success';
$resultObject->timestamp = time();
$resultObject->data = $arr;
echo json_encode($resultObject);
}

function response($success, $message = ""){
	header("HTTP/1.1 200 OK");
	header("Content-Type: application/json");
	
$resultObject = new stdClass();
$resultObject->status = $success;
$resultObject->data = $message;
echo json_encode($resultObject);
}

function failure($messsage){ //check for relevent headers
  header("HTTP/1.1 200 OK");
	header("Content-Type: application/json");

  $resultObject = new stdClass();
  $resultObject->status = 'failure';
  $resultObject->timestamp = time();
  $resultObject->data = $messsage;
  echo json_encode($resultObject);
  }


require_once("config.php");
$apikey = "123456"; //for testing reasons
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
$database =Database::instance();
$db = $database->connect();
$conn = $db;
//var_dump($data ->api_key);
function isThere(){
      $stmt = $GLOBALS['conn']->prepare("Select * from users where api_key='".$GLOBALS['data']->api_key."'");
      $stmt->execute();
      $count = $stmt->rowCount();
      return $count > 0;
}
//A default user who isnt logged in will use the apikey 123456
if (isset($GLOBALS['data']->api_key) && isThere() || $GLOBALS['data']->api_key == $apikey ) {
    # code...
    if (isset($GLOBALS['data']->type) && $GLOBALS['data']->type == "search"){  
      if (isset($GLOBALS['data']->action) && $GLOBALS['data']->action == "searchWines"){  //
        $sql ="SELECT * FROM wines WHERE wine_name = "."'".$GLOBALS['data']->wine_name."'";

          if (isset($GLOBALS['data']->fuzzy) && $GLOBALS['data']->fuzzy == true){
              $fuzz =substr($GLOBALS['data']->wine_name,0,2)."%";
              $sql ="SELECT * FROM wines WHERE wine_name LIKE "."'".$fuzz."'";
            }
          
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $count = $stmt->rowCount();
          if($count > 0) {
            $post_arr = array();
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                //var_dump($row);
                  # code...
                  $post_item = array(
                    'WineID' => $row['WineID'],
                    'Image_URL' => $row['Image_URL'],
                    'Body' => $row['Body'],
                    'Alcohol' => $row['Alcohol'],
                    'Tannin' => $row['Tannin'],
                    'Acidity' => $row['Acidity'],
                    'Sweetness' => $row['Sweetness'],
                    'Brand_name' => $row['Brand_name'],
                    'Vintage' => $row['Vintage'],
                    'Origin' => $row['Origin'],
                    'Volume' => $row['Volume'],
                    'Code_Num' => $row['Code_Num'],
                    'Cultivars' => $row['Cultivars'],
                    'Category' => $row['Category'],
                    'Description' => $row['Description'],
                    'Cost_per_bottle' => $row['Cost_per_bottle'],
                    'Cost_per_glass' => $row['Cost_per_glass'],
                    'Price_category' => $row['Price_category'],
                    'Lot_ID' => $row['Lot_ID']
                  );
              array_push($post_arr, $post_item);
      }
        success($post_arr);
      } else{
        failure("No wines with this name found");
      }
   } 
 } else if (isset($GLOBALS['data']->action) && $GLOBALS['data']->action == "getAllWines"){  //filling homepage
        if (isset($GLOBALS['data']->limit)){
          $stmt = $conn->prepare("SELECT * FROM wines LIMIT ".$GLOBALS['data']->limit);
          $stmt->execute();
          $count = $stmt->rowCount();
          if($count > 0) {
            $post_arr = array();
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                //var_dump($row);
                  # code...
                  $post_item = array(
                    'WineID' => $row['WineID'],
                    'Image_URL' => $row['Image_URL'],
                    'Body' => $row['Body'],
                    'Alcohol' => $row['Alcohol'],
                    'Tannin' => $row['Tannin'],
                    'Acidity' => $row['Acidity'],
                    'Sweetness' => $row['Sweetness'],
                    'Brand_name' => $row['Brand_name'],
                    'Vintage' => $row['Vintage'],
                    'Origin' => $row['Origin'],
                    'Volume' => $row['Volume'],
                    'Code_Num' => $row['Code_Num'],
                    'Cultivars' => $row['Cultivars'],
                    'Category' => $row['Category'],
                    'Description' => $row['Description'],
                    'Cost_per_bottle' => $row['Cost_per_bottle'],
                    'Cost_per_glass' => $row['Cost_per_glass'],
                    'Price_category' => $row['Price_category'],
                    'Lot_ID' => $row['Lot_ID']
                  );
              array_push($post_arr, $post_item);
      }
        success($post_arr);
      } else{
        failure("Error: Unable to fetch wines from server at the moment");
      }  
    }

} else  if (isset($GLOBALS['data']->type) && $GLOBALS['data']->type == "rate"){
            if (isset($GLOBALS['data']->action) && $GLOBALS['data']->action == "rateWine"){  //filling homepage
              if (isset($GLOBALS['data']->rate) && isset($GLOBALS['data']->rate->wineID) && isset($GLOBALS['data']->rate->rating ) ){  //add comment part of review later
                  $sql = "Select * from ratings WHERE apikey= '".$GLOBALS['data']->api_key."' AND  = ".$GLOBALS['data']->rate->wineID;
                  $stmt = $this->conn->prepare($sql);
                  $stmt->execute();

                  if ($stmt->rowCount() == 0) {
                    # code...
                    $sql = "INSERT INTO wine_reviews VALUES ('".$GLOBALS['data']->api_key."', ".$GLOBALS['data']->rate->wineID.", ".$GLOBALS['data']->rate->rating.")";
                  // var_dump($sql);
          
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                  } else {
                    $sql = "UPDATE wine_reviews SET rating= ".$GLOBALS['data']->rate->rating." WHERE apikey='".$GLOBALS['data']->api_key."' AND wineID = ".$GLOBALS['data']->rate->wineID;
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                  }
                    success($post_arr); 
                } else{
                  failure("Error: Unable to fetch wines from server at the moment");
                }  
            } else if (isset($GLOBALS['data']->action) && $GLOBALS['data']->action == "rateWinery"){  //filling homepage
              if (isset($GLOBALS['data']->rate) && isset($GLOBALS['data']->rate->wineID) && isset($GLOBALS['data']->rate->rating ) ){
                  $sql = "Select * from ratings WHERE apikey= '".$GLOBALS['data']->api_key."' AND  = ".$GLOBALS['data']->rate->wineID;
                  $stmt = $this->conn->prepare($sql);
                  $stmt->execute();

                  if ($stmt->rowCount() == 0) {
                    # code...
                    $sql = "INSERT INTO ratings VALUES ('".$GLOBALS['data']->api_key."', ".$GLOBALS['data']->rate->wineID.", ".$GLOBALS['data']->rate->rating.")";
                  // var_dump($sql);
          
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                  } else {
                    $sql = "UPDATE ratings SET rating= ".$GLOBALS['data']->rate->rating." WHERE apikey='".$GLOBALS['data']->api_key."' AND wineID = ".$GLOBALS['data']->rate->wineID;
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                  }
                    success($post_arr); 
                } else{
                  failure("Error: Unable to fetch wines from server at the moment");
                }  
            }
          } 
  else  if (isset($GLOBALS['data']->action) && $GLOBALS['data']->action == "getAllWineries"){  //filling homepage
            if (isset($GLOBALS['data']->limit)){
              $stmt = $conn->prepare("SELECT * FROM wines LIMIT ".$GLOBALS['data']->limit);
              $stmt->execute();
              $count = $stmt->rowCount();
              if($count > 0) {
                $post_arr = array();
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    //var_dump($row);
                      # code...
                      $post_item = array(
                        'Business_ID' => $row['Business_ID'],
                        'BName' => $row['BName'],
                        'Website_URL' => $row['Website_URL'],
                        'Weekday_open_time' => $row['Weekday_open_time'],
                        'Weekend_open_time' => $row['Weekend_open_time'],
                        'Weekend_close_time' => $row['Weekend_close_time'],
                        'Instagram' => $row['Instagram'],
                        'Twitter' => $row['Twitter'],
                        'Facebook' => $row['Facebook'],
                        'Description' => $row['Description'],
                        'User_ID' => $row['User_ID'],
                        'Region_ID' => $row['Region_ID'],

                      );
                  array_push($post_arr, $post_item);
          }
            success($post_arr);
          } else{
            failure("Error: Unable to fetch wines from server at the moment");
          }  
            }

        }
  }


?>
