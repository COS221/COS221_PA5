<?php  //26 May
// if(!isset($_SESSION))   //for sending session data to clientSide
// { 
//     session_start(); 
// } 

function isEmpty($param){
  return $param == "";
}

$json =file_get_contents('php://input');
$data = json_decode($json);  

function success($arr){ //place relevent headers
  
    header("HTTP/1.1 200 OK");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
$resultObject = new stdClass();
$resultObject->status = 'success';
$resultObject->timestamp = time();
$resultObject->data = $arr;
echo json_encode($resultObject);
}

function response($success, $message = ""){
	header("HTTP/1.1 200 OK");
	header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
	
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
  exit();
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
      $stmt = $GLOBALS['conn']->prepare("Select * from user where api_key='".$GLOBALS['data']->api_key."'");
      $stmt->execute();
      $count = $stmt->rowCount();
      return $count > 0;
}
function select($possible){
  if (!isset($GLOBALS['data']->return)) {
      # code...
      failure("Error: Return parameters were not provided. In order to return all fields the wildcard * should be used. You can also add specific columns, ask the DB team about which ones are available.");
  }

  if (isEmpty($GLOBALS['data']->return)) {
    # code...
    failure("Error: Empty 'return' value was entered. Please ensure all attributes have values");
  }

  if ($GLOBALS['data']->return=="*") {
      # code...
      return "*";
  }

  for ($i=0; $i <count($GLOBALS['data']->return) ; $i++) { 
    # code...
    if (in_array($GLOBALS['data']->return[$i],$possible) == false) {
      # code...      
      failure("Error: Invalid 'return' value was entered. Please recheck your spelling");
    }

  }

  $select = array();
  $valid  = $GLOBALS['data']->return;
  
  foreach ($valid as $column ) {
      # code...
      $select[] = $column;
  }

  return implode(', ', $select);
}

function search($possible){        
  if (!isset($GLOBALS['data']->search)) {
      return false;
  }
  if (isEmpty($GLOBALS['data']->search)) {
    failure( "Error: Empty search parameter was entered. Please ensure all attributes have values");
  }
  if (isset($GLOBALS['data']->search->make) && isEmpty($GLOBALS['data']->search->make)){
    failure("Error: Empty search parameter was entered for 'make'. Please ensure all attributes have values"); 
  }
  if (isset($GLOBALS['data']->search->model) && isEmpty($GLOBALS['data']->search->model)){
    failure("Error: Empty search parameter was entered for 'model'. Please ensure all attributes have values");
  }
  if (isset($GLOBALS['data']->search) && isset($GLOBALS['data']->search->model) && isEmpty($GLOBALS['data']->search->model)){
    failure("Error: Empty search parameter was entered for 'model' or 'model'. Please ensure attributes have values if entered in the request body");
  }

  $select = array();
  $valid  = $possible;
  //For testing
  $temp =json_encode($GLOBALS['data']->search) ;
  // var_dump($GLOBALS['data']->search);
   //var_dump($temp);
  // var_dump($temp[5]);
  foreach ($valid as $column ) {
      # code...
      if ( isset($GLOBALS['data']->search->$column) ) {
          # code...
          $select[] = $column . ' = "' . $GLOBALS['data']->search->$column.'"' ;
          // echo "Added to where statement";
           //var_dump($select);
      }
  }
  return implode(' AND ', $select);
}
function Fuzzysearch($possible){        
      if (!isset($GLOBALS['data']->search)) {
          return false;
      }
      if (isEmpty($GLOBALS['data']->search)) {
        failure( "Error: Empty search parameter was entered. Please ensure all attributes have values");
      }
      if (isset($GLOBALS['data']->search->make) && isEmpty($GLOBALS['data']->search->make)){
        failure("Error: Empty search parameter was entered for 'make'. Please ensure all attributes have values"); 
      }
      if (isset($GLOBALS['data']->search->model) && isEmpty($GLOBALS['data']->search->model)){
        failure("Error: Empty search parameter was entered for 'model'. Please ensure all attributes have values");
      }
      if (isset($GLOBALS['data']->search) && isset($GLOBALS['data']->search->model) && isEmpty($GLOBALS['data']->search->model)){
        failure("Error: Empty search parameter was entered for 'model' or 'model'. Please ensure attributes have values if entered in the request body");
      }

      $select = array();
      $valid  = $possible;
      //For testing
      $temp =json_encode($GLOBALS['data']->search) ;
      // var_dump($GLOBALS['data']->search);
      // var_dump($temp);
      // var_dump($temp[5]);
      foreach ($valid as $column ) {
        # code...
        if ( isset($GLOBALS['data']->search->$column) ) {
            # code...
            $select[] = $column . ' LIKE "%' . $GLOBALS['data']->search->$column.'%"' ;
        }
    }
  return implode(' AND ', $select);
}
function fuzzy(){                
  if (!isset($GLOBALS['data']->fuzzy)) {
      # code...
    return false;
  }
  //for size of array to return
  return $GLOBALS['data']->fuzzy;
}
// function whereClause($array){
//     $select = array();
//     $valid  = $array;

//     // var_dump($GLOBALS['data']->search);

//     // var_dump($temp);
//     // var_dump($temp[5]);

//     foreach ($valid as $column ) {
//         # code...
//         if ( isset($GLOBALS['data']->search->$column) ) {
//             # code...
//             $select[] = $column . ' = "' . $GLOBALS['data']->search->$column.'"' ;
//             // echo "Added to where statement";
//             // var_dump($select);
//         }
//     }

//     return implode(' AND ', $select);
// }

// function whereClauseFuzzy($array){
//     $select = array();
//     $valid  = $array;

//     // var_dump($GLOBALS['data']->search);

//     // var_dump($temp);
//     // var_dump($temp[5]);
//     foreach ($valid as $column ) {
//         # code...
//         if ( isset($GLOBALS['data']->search->$column) ) {
//             # code...
//             $fuzz =substr($GLOBALS['data']->search->$column,0,2)."%";
//             $select[] = $column . ' LIKE "' . $fuzz.'"' ;
//             // echo "Added to where statement";
//              //var_dump($select);
//         }
//     }

//     return implode(' AND ', $select);
// }

function sortBy($possible){        
  if (!isset($GLOBALS['data']->sort)) {
      # code...
    return false;
  }
  if (isEmpty($GLOBALS['data']->sort)) {
    # code...
    failure("Error: Empty 'sort' value was entered. Please ensure all attributes have values");
  }
    else
  if (in_array($GLOBALS['data']->sort,$possible)) {
    # code...
    return true;
  } else failure("Error: Invalid 'sort' value was entered. Please recheck your spelling");

}
function orderBy(){        
        
  if (!isset($GLOBALS['data']->order)) {
      # code...
    return false;
  }

  if (isEmpty($GLOBALS['data']->order)) {
    # code...
    failure("Error: Empty 'order' value was entered. Please ensure all attributes have values");
  }else 
      if ($GLOBALS['data']->order == "desc" || $GLOBALS['data']->order == "DESC" || $GLOBALS['data']->order == "asc" || $GLOBALS['data']->order == "ASC") {
      return true;
  }

  failure("Error: Invalid 'order' value was entered. Please recheck your spelling");
}
function limit(){        
        
  if (!isset($GLOBALS['data']->limit)) {
      # code...
    return false;
  }
    else{
        if (!is_int($GLOBALS['data']->limit )) {
          failure("Error: Invalid limit value provided. Please make sure it is an integer.");
        }

        if ($GLOBALS['data']->limit <=0) {
          failure("Error: Invalid limit value provided. Please ensure your limit is a positive integer.");
        }
        else
      return $GLOBALS['data']->limit; 
    }                   
  
}

//Creating and update functions may be added here


// function rateWine(){ //userID must be specified

//     $sql = "Select * from wine_reviews WHERE UserID= '".$GLOBALS['data']->userID."' AND Wine_ID = ".$GLOBALS['data']->rate->Wine_ID;
//     $stmt = $GLOBALS['conn']->prepare($sql); 
//     $stmt->execute();

//     $count = $stmt->rowCount();

//       if ($count == 0) {
//           # code...
//           $sql = "INSERT INTO wine_reviews VALUES ('".$GLOBALS['data']->rate->Wine_ID."', ".$GLOBALS['data']->userID.", ".$GLOBALS['data']->rate->rating.", ".$GLOBALS['data']->rate->comment.")";
//         // var_dump($sql);

//           $stmt = $GLOBALS['conn']->prepare($sql);
//           $stmt->execute();
//       } 
//       else {
//           $sql = "UPDATE wine_reviews SET Rating= ".$GLOBALS['data']->rate->rating.", SET Comment= ".$GLOBALS['data']->rate->comment." WHERE userID='".$GLOBALS['data']->userID."' AND Wine_ID = ".$GLOBALS['data']->rate->Wine_ID;

//           $stmt = $GLOBALS['conn']->prepare($sql);
//           $stmt->execute();
//       }
// }


//A default user who isnt logged in will use the apikey 123456
if (isset($GLOBALS['data']->api_key) && isThere() || $GLOBALS['data']->api_key == $apikey ) {   //validate APIkey
    # code...
   // echo("Test");
    //if (!isset($GLOBALS['data']->return)){
    //    failure("Specify return please.");
    //}

    // if (!isset($GLOBALS['data']->limit)){ //May end up enforcing a limit parameter in SQL queries, to speed up performance
    //     failure("Specify limit please.");
    // }

    if (isset($GLOBALS['data']->type)){

        if ($GLOBALS['data']->type == "GetAllWines"){
          if (isset($GLOBALS['data']->page)){
            //var_dump("Bruh");
            $table = "wine";
            $sql = "SELECT * from wine";  //redundant

            $valid  = array('Body','Alcohol','Tannin','Acidity','Sweetness','Producer','Vintage','Business_ID','WineID','Wine_URL' ,'Volume','Cultivars','Category','Cost_per_bottle','Cost_per_glass','Price_Category','Business_ID','Name');

            if (search($valid ) == false) {
              # code...
              $sql = "SELECT * FROM ".$table;
            }
            else
              {
                $sql = "SELECT * FROM ".$table. " WHERE ". search($valid) ;
                //var_dump($sql);
                // Prepare statement
        
                  if (fuzzy() == false) {
                    # code...
                    $sql = "SELECT ". select($possibleSelect). " FROM ".$table. " WHERE ". search($valid) ;
                    }else{
                        $sql = "SELECT ". select($possibleSelect). " FROM ".$table. " WHERE ". Fuzzysearch($valid) ;
                    }
      
              }
            // $sql = "SELECT ".select($possibleSelect)." FROM ".$table." ";    //Get relevant wine data
            $possibleSort = array('Body','Alcohol','Tannin','Acidity','Sweetness','Producer','Vintage','Business_ID','Wine_URL' ,'Volume','Cultivars','Category','Cost_per_bottle','Cost_per_glass','Price_Category' );

            if (sortBy($possibleSort)) {
              $sql= $sql. " ORDER BY ".$GLOBALS['data']->sort;
    
              if (orderBy()== false) {
                $sql= $sql." ASC";
              } else {
                $sql= $sql." ".$GLOBALS['data']->order;
              }
            }

            if (limit() !==false) {
              $sql= $sql." LIMIT ".$GLOBALS['data']->limit;
            }

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $count = $stmt->rowCount();
            if($count > 0) {
                $post_arr = array();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                  //var_dump($row);  //to use later for testing queries
                    # code...
                    $post_item = array(
                        'WineID' => $row['WineID'],
                        'Name' => $row['Name'],
                        'Body' => $row['Body'],
                        'Alcohol' => $row['Alcohol'],
                        'Tannin' => $row['Tannin'],
                        'Acidity' => $row['Acidity'],
                        'Sweetness' => $row['Sweetness'],
                        'Producer' => $row['Producer'],
                        'Vintage' => $row['Vintage'],
                        'Wine_URL' => $row['Wine_URL'],
                        'Volume' => $row['Volume'],
                        'Cultivars' => $row['Cultivars'],
                        'Category' => $row['Category'],
                        'Description' => $row['Description'],
                        'Cost_per_bottle' => $row['Cost_per_bottle'],
                        'Cost_per_glass' => $row['Cost_per_glass'],
                        'Price_Category' => $row['Price_Category'],
                        'Business_ID' => $row['Business_ID']
                    );

                    array_push($post_arr, $post_item);
                }
                  success($post_arr);
            } 
              else{ 
                failure("No wines with this name found"); 
              }

          } 
          else{
             $table = "wine";

            $possibleSelect = array('Body','Alcohol','Tannin','Acidity','Sweetness','Producer','Vintage','Business_ID','Wine_URL' ,'Volume','Cultivars','Category','Cost_per_bottle','Cost_per_glass','Price_Category','Name');

            $valid  = array('Body','Alcohol','WineID','Tannin','Acidity','Sweetness','Producer','Vintage','Business_ID','Wine_URL' ,'Volume','Cultivars','Category','Cost_per_bottle','Cost_per_glass','Price_Category','Business_ID','Name');

            if (search($valid ) == false) {
              # code...
              $sql = "SELECT ". select($possibleSelect). " FROM ".$table;
            }
            else
              {
                $sql = "SELECT ". select($possibleSelect). " FROM ".$table. " WHERE ". search($valid) ;
                //var_dump($sql);
                // Prepare statement
        
                  if (fuzzy() == false) {
                    # code...
                    $sql = "SELECT ". select($possibleSelect). " FROM ".$table. " WHERE ". search($valid) ;
                    }else{
                        $sql = "SELECT ". select($possibleSelect). " FROM ".$table. " WHERE ". Fuzzysearch($valid) ;
                    }
      
              }
            // $sql = "SELECT ".select($possibleSelect)." FROM ".$table." ";    //Get relevant wine data
            $possibleSort = array('Body','Alcohol','Tannin','Acidity','Sweetness','Producer','Vintage','Business_ID','Wine_URL' ,'Volume','Cultivars','Category','Cost_per_bottle','Cost_per_glass','Price_Category' );

            if (sortBy($possibleSort)) {
              $sql= $sql. " ORDER BY ".$GLOBALS['data']->sort;
    
              if (orderBy()== false) {
                $sql= $sql." ASC";
              } else {
                $sql= $sql." ".$GLOBALS['data']->order;
              }
            }

            if (limit() !==false) {
              $sql= $sql." LIMIT ".$GLOBALS['data']->limit;
            }

            //var_dump($sql);

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $count = $stmt->rowCount();
            if($count > 0) {
                $post_arr = array();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                  //var_dump($row);  //to use later for testing queries
                    # code...
                    $post_item = array(
                        'WineID' => $row['WineID'],
                        'Name' => $row['Name'],
                        'Body' => $row['Body'],
                        'Alcohol' => $row['Alcohol'],
                        'Tannin' => $row['Tannin'],
                        'Acidity' => $row['Acidity'],
                        'Sweetness' => $row['Sweetness'],
                        'Producer' => $row['Producer'],
                        'Vintage' => $row['Vintage'],
                        'Wine_URL' => $row['Wine_URL'],
                        'Volume' => $row['Volume'],
                        'Cultivars' => $row['Cultivars'],
                        'Category' => $row['Category'],
                        'Description' => $row['Description'],
                        'Cost_per_bottle' => $row['Cost_per_bottle'],
                        'Cost_per_glass' => $row['Cost_per_glass'],
                        'Price_Category' => $row['Price_Category'],
                        'Business_ID' => $row['Business_ID']
                    );

                    array_push($post_arr, $post_item);
                }
                  success($post_arr);
            } 
              else{ 
                failure("No wines with this name found"); 
              }
          }
           
        }
        
        else if ($GLOBALS['data']->type == "GetAllWineries"){
          if (isset($GLOBALS['data']->page)){
            //var_dump("Bruh");
            $table = "business";
            $sql = "SELECT * from business";  //SQL
            $valid  = array('Business_ID','BName','Business_URL','Website_URL','Weekday_open_time','Weekday_close_time','Weekend_open_time','Instagram','Twitter' ,'Facebook','Description','User_ID','Region_ID');

            if (search($valid ) == false) {
              # code...
              $sql = "SELECT * FROM ".$table;
            }
            else
              {
                $sql = "SELECT * FROM ".$table. " WHERE ". search($valid) ;
                //var_dump($sql);
                // Prepare statement
        
                  if (fuzzy() == false) {
                    # code...
                    $sql = "SELECT * FROM ".$table. " WHERE ". search($valid) ;
                    }else{
                        $sql = "SELECT * FROM ".$table. " WHERE ". Fuzzysearch($valid) ;
                    }
      
              }

            $possibleSort =array('Business_ID','BName','Business_URL','Website_URL','Weekday_open_time','Weekday_close_time','Weekend_open_time','Instagram','Twitter' ,'Facebook','Description','User_ID','Region_ID');

            if (sortBy($possibleSort)) {
              $sql= $sql. " ORDER BY ".$GLOBALS['data']->sort;
    
              if (orderBy()== false) {
                $sql= $sql." ASC";
              } else {
                $sql= $sql." ".$GLOBALS['data']->order;
              }
            }

            if (limit() !==false) {
              $sql= $sql." LIMIT ".$GLOBALS['data']->limit;
            }

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $count = $stmt->rowCount();
            if($count > 0) {
                $post_arr = array();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                  //var_dump($row);  //to use later for testing queries
                    # code...
                    $post_item = array(
                        'Business_ID' => $row['Business_ID'],
                        'BName' => $row['BName'],
                        'Business_URL' => $row['Business_URL'],
                        'Website_URL' => $row['Website_URL'],
                        'Weekday_open_time' => $row['Weekday_open_time'],
                        'Weekday_close_time' => $row['Weekday_close_time'],
                        'Weekend_open_time' => $row['Weekend_open_time'],
                        'Weekend_close_time' => $row['Weekend_close_time'],
                        'Instagram' => $row['Instagram'],
                        'Twitter' => $row['Twitter'],
                        'Facebook' => $row['Facebook'],
                        'Description' => $row['Description'],
                        'User_ID' => $row['User_ID'],
                        'Region_ID' => $row['Region_ID']
                    );

                    array_push($post_arr, $post_item);
                }
                  success($post_arr);
            } 
              else{ 
                failure("No businesses with this name were found"); 
              }

          } 
          else{
              $table = "business";

            $possibleSelect = array('Business_ID','BName','Business_URL','Website_URL','Weekday_open_time','Weekday_close_time','Weekend_open_time','Instagram','Twitter' ,'Facebook','Description','User_ID','Region_ID');

            $valid  = array('Business_ID','BName','Business_URL','Website_URL','Weekday_open_time','Weekday_close_time','Weekend_open_time','Instagram','Twitter' ,'Facebook','Description','User_ID','Region_ID');

            if (search($valid ) == false) {
              # code...
              $sql = "SELECT ". select($possibleSelect). " FROM ".$table;
            }
            else
              {
                $sql = "SELECT ". select($possibleSelect). " FROM ".$table. " WHERE ". search($valid) ;
                //var_dump($sql);
                // Prepare statement
        
                  if (fuzzy() == false) {
                    # code...
                    $sql = "SELECT ". select($possibleSelect). " FROM ".$table. " WHERE ". search($valid) ;
                    }else{
                        $sql = "SELECT ". select($possibleSelect). " FROM ".$table. " WHERE ". Fuzzysearch($valid) ;
                    }
      
              }
            // $sql = "SELECT ".select($possibleSelect)." FROM ".$table." ";    //Get relevant wine data
            $possibleSort =array('Business_ID','BName','Business_URL','Website_URL','Weekday_open_time','Weekday_close_time','Weekend_open_time','Instagram','Twitter' ,'Facebook','Description','User_ID','Region_ID');

            if (sortBy($possibleSort)) {
              $sql= $sql. " ORDER BY ".$GLOBALS['data']->sort;
    
              if (orderBy()== false) {
                $sql= $sql." ASC";
              } else {
                $sql= $sql." ".$GLOBALS['data']->order;
              }
            }

            if (limit() !==false) {
              $sql= $sql." LIMIT ".$GLOBALS['data']->limit;
            }

            //var_dump($sql);

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $count = $stmt->rowCount();
            if($count > 0) {
                $post_arr = array();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                  //var_dump($row);  //to use later for testing queries
                    # code...
                    $post_item = array(
                        'Business_ID' => $row['Business_ID'],
                        'BName' => $row['BName'],
                        'Business_URL' => $row['Business_URL'],
                        'Website_URL' => $row['Website_URL'],
                        'Weekday_open_time' => $row['Weekday_open_time'],
                        'Weekday_close_time' => $row['Weekday_close_time'],
                        'Weekend_open_time' => $row['Weekend_open_time'],
                        'Weekend_close_time' => $row['Weekend_close_time'],
                        'Instagram' => $row['Instagram'],
                        'Twitter' => $row['Twitter'],
                        'Facebook' => $row['Facebook'],
                        'Description' => $row['Description'],
                        'User_ID' => $row['User_ID'],
                        'Region_ID' => $row['Region_ID']
                    );

                    array_push($post_arr, $post_item);
                }
                  success($post_arr);
            } 
              else{ 
                failure("No businesses with this name were found"); 
              }
          }
        }
        
        else if ($GLOBALS['data']->type == "RateWine"){

          $sql = "Select * from wine_reviews WHERE UserID= ".$GLOBALS['data']->userID." AND Wine_ID = ".$GLOBALS['data']->rate->Wine_ID;
          $stmt = $GLOBALS['conn']->prepare($sql); 
          $stmt->execute();
      
          $count = $stmt->rowCount();
      
            if ($count == 0) {
                # code...
                $sql = "INSERT INTO wine_reviews VALUES (".$GLOBALS['data']->rate->Wine_ID.", ".$GLOBALS['data']->userID.", ".$GLOBALS['data']->rate->rating.", '".$GLOBALS['data']->rate->comment."')";
              // var_dump($sql);
      
                $stmt = $GLOBALS['conn']->prepare($sql);
                $stmt->execute();
            } 
            else {
                $sql = "UPDATE wine_reviews SET Rating= ".$GLOBALS['data']->rate->rating.", Comment= '".$GLOBALS['data']->rate->comment."' WHERE UserID=".$GLOBALS['data']->userID." AND Wine_ID = ".$GLOBALS['data']->rate->Wine_ID;
      
                $stmt = $GLOBALS['conn']->prepare($sql);
                $stmt->execute();
            }
        }
        
        else if ($GLOBALS['data']->type == "RateWinery"){
          $sql = "Select * from business_reviews WHERE UserID= ".$GLOBALS['data']->userID." AND Business_ID = ".$GLOBALS['data']->rate->Business_ID;
          $stmt = $GLOBALS['conn']->prepare($sql); 
          $stmt->execute();
      
          $count = $stmt->rowCount();
      
            if ($count == 0) {
                # code...
                $sql = "INSERT INTO business_reviews VALUES (".$GLOBALS['data']->rate->Business_ID."," .$GLOBALS['data']->userID.", ".$GLOBALS['data']->rate->rating.", '".$GLOBALS['data']->rate->comment."')";
              // var_dump($sql);
      
                $stmt = $GLOBALS['conn']->prepare($sql);
                $stmt->execute();
            } 
            else {
                $sql = "UPDATE business_reviews SET Rating= ".$GLOBALS['data']->rate->rating.", SET Comment= '".$GLOBALS['data']->rate->comment."' WHERE userID=".$GLOBALS['data']->userID." AND Business_ID = ".$GLOBALS['data']->rate->Business_ID;
      
                $stmt = $GLOBALS['conn']->prepare($sql);
                $stmt->execute();
            }
            
        }
        
        else if ($GLOBALS['data']->type == "FavouriteWine"){
          if (isset($GLOBALS['data']->UserID)){
            //var_dump("Bruh");
            $sql = "SELECT fav.WineID, fav.UserID, w.Name, w.Vintage, w.Producer, w.Category, w.Cultivars, w.Description, w.Cost_per_bottle FROM favourite_wine as fav INNER JOIN wine as w ON w.WineID=fav.WineID WHERE fav.UserID=".$GLOBALS['data']->UserID;
            
            $valid  = array("UserID");

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            $count = $stmt->rowCount();
            if($count > 0) {
                $post_arr = array();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                  //var_dump($row);  //to use later for testing queries
                    # code...
                    $post_item = array(
                        'WineID' => $row['WineID'],
                        'UserID' => $row['UserID'],
                        'Name' => $row['Name'],
                        'Vintage' => $row['Vintage'],
                        'Producer' => $row['Producer'],
                        'Category' => $row['Category'],
                        'Cultivars' => $row['Cultivars'],
                        'Description' => $row['Description'],
                        'Cost_per_bottle' => $row['Cost_per_bottle'],
                    );

                    array_push($post_arr, $post_item);
                }
                  success($post_arr);
            } 
              else{ 
                failure("No wines with this name found"); 
              }

          } else{
            failure("Please specify a UserID.");
          }
            
        }

        else if ($GLOBALS['data']->type == "GetWineReviews"){  //returns nothing for now
          if (isset($GLOBALS['data']->return)){
            //var_dump("Bruh");
            $sql = "SELECT wr.Wine_ID, wr.UserID, wr.Rating, wr.Comment ,w.Name, w.Vintage, w.Producer, w.Category, w.Cultivars, w.Description, w.Cost_per_bottle FROM wine_reviews as wr INNER JOIN wine as w ON w.WineID=wr.Wine_ID" ;
            $valid  = array('Body','Alcohol','Tannin','Acidity','Sweetness','Producer','Vintage','Business_ID','Wine_URL' ,'Volume','Cultivars','Category','Cost_per_bottle','Cost_per_glass','Price_Category','Business_ID','Wine_ID','Name','Rating');
            
            if (isset($GLOBALS['data']->search)){
              $sql = "SELECT u.First_name,u.Middle_name,u.Last_name,wr.Wine_ID, wr.UserID, wr.Rating, wr.Comment ,w.Name, w.Vintage, w.Producer, w.Category, w.Cultivars, w.Description, w.Cost_per_bottle FROM user as u ,wine_reviews as wr INNER JOIN wine as w ON w.WineID=wr.Wine_ID WHERE u.UserID =wr.UserID AND ".search($valid) ;
            } 

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            $count = $stmt->rowCount();
            if($count > 0) {
                $post_arr = array();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                  //var_dump($row);  //to use later for testing queries
                    # code...
                    $post_item = array(
                        'Wine_ID' => $row['Wine_ID'],
                        'UserID' => $row['UserID'],
                        'Rating' => $row['Rating'],
                        'Comment' => $row['Comment'],
                        'Name' => $row['Name'],
                        'Vintage' => $row['Vintage'],
                        'Producer' => $row['Producer'],
                        'Category' => $row['Category'],
                        'Cultivars' => $row['Cultivars'],
                        'Description' => $row['Description'],
                        'Cost_per_bottle' => $row['Cost_per_bottle'],
                        'First_name' => $row['First_name'],
                        'Middle_name' => $row['Middle_name'],
                        'Last_name' => $row['Last_name']
                    );

                    array_push($post_arr, $post_item);
                }
                  success($post_arr);
            } 
              else{ 
                failure("No wines with this name found"); 
              }

          }
          else{ 
            failure("Error: please specify a return value (*_*)"); 
          }
            
        }          

    
        else if($GLOBALS['data']->type == "updateUserInfo"){

            //get userID
            $sql = "SELECT UserID FROM user WHERE Email= '{$GLOBALS['data']->userEmail}';";
            
            $stmt = $GLOBALS['conn']->prepare($sql); 
            $stmt->execute();

            //update user
            if($stmt->rowCount() >0){
                $userID =$stmt->fetch(PDO::FETCH_ASSOC)["UserID"];

                $sql = "UPDATE user SET 
                    First_name= '{$GLOBALS['data']->FirstName}',
                    Middle_name= '{$GLOBALS['data']->MiddleName}', 
                    Email= '{$GLOBALS['data']->userEmail}', 
                    PhoneNumber= '{$GLOBALS['data']->Number}' 
                    WHERE UserID= '{$userID}' ;";
                
                $stmt = $GLOBALS['conn']->prepare($sql); 
                $stmt->execute();

                if($stmt->errorCode() == '00000')
                    success(array("status"=>"success"));
                else
                    failure("unsucessful update");
            }else{
                failure("no user with {$GLOBALS['data']->userEmail} exists");
            }
        }

        else if($GLOBALS['data']->type == "updateUserRegion"){

            //get userID
            $sql = "SELECT Region_ID FROM region WHERE Country= '{$GLOBALS['data']->Country}' AND RegionName= '{$GLOBALS['data']->RegionName}';";
            $stmt = $GLOBALS['conn']->prepare($sql); 
            $stmt->execute();

            $RegionID = $stmt->fetch(PDO::FETCH_ASSOC)['Region_ID'];

            //location alredy in DB
            if($stmt->rowCount() > 0){
                $sql = "UPDATE user SET 
                Region_id = '{$RegionID}' 
                WHERE UserID = '{$GLOBALS['data']->userID}';";

                $stmt = $GLOBALS['conn']->prepare($sql); 
                $stmt->execute(); 
            }else{  

                //create location
                $sql = "INSERT INTO region (`Country`,`RegionName`)
                VALUES ( '{$GLOBALS['data']->Country}',
                '{$GLOBALS['data']->RegionName}');";

                $stmt = $GLOBALS['conn']->prepare($sql); 
                $stmt->execute();

                if($stmt->rowCount() > 0){
                    
                    //get location Region_ID
                    $sql = "SELECT Region_ID FROM region WHERE Country= '{$GLOBALS['data']->Country}' AND RegionName= '{$GLOBALS['data']->RegionName}';";
                    $stmt = $GLOBALS['conn']->prepare($sql); 
                    $stmt->execute();
        
                    $RegionID = $stmt->fetch(PDO::FETCH_ASSOC)["Region_ID"];

                    //add location to buisiness
                    $sql = "UPDATE user SET 
                    Region_id = '{$RegionID}'
                    WHERE userID = '{$GLOBALS['data']->userID}' ;";

                    $stmt = $GLOBALS['conn']->prepare($sql); 
                    $stmt->execute();
                }
            }

            success(array("status"=>"success"));
        }

        else if($GLOBALS['data']->type == "getAllBuisinessWines"){
            
            //get businessID
            $sql = "SELECT Business_ID FROM business WHERE BName= '{$GLOBALS['data']->businessName}';";
            $stmt = $GLOBALS['conn']->prepare($sql); 
            $stmt->execute();

            if($stmt->rowCount() == 0)
                failure("no business with BName {$GLOBALS['data']->businessName} in DB");

            //return wines
            if( $stmt->rowCount() >0){
                $businessID =$stmt->fetch(PDO::FETCH_ASSOC)["Business_ID"];
                
                $sql = "SELECT * FROM wine WHERE Business_ID= '{$businessID}';";  
                $stmt = $conn->prepare($sql);
                $stmt->execute();
        
                if($stmt->rowCount() > 0) {
                    $post_arr = array();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        $post_item = array(
                            'WineID' => $row['WineID'],
                            'Name' => $row['Name'],
                            'Body' => $row['Body'],
                            'Alcohol' => $row['Alcohol'],
                            'Tannin' => $row['Tannin'],
                            'Acidity' => $row['Acidity'],
                            'Sweetness' => $row['Sweetness'],
                            'Producer' => $row['Producer'],
                            'Vintage' => $row['Vintage'],
                            'Wine_URL' => $row['Wine_URL'],
                            'Volume' => $row['Volume'],
                            'Cultivars' => $row['Cultivars'],
                            'Category' => $row['Category'],
                            'Description' => $row['Description'],
                            'Cost_per_bottle' => $row['Cost_per_bottle'],
                            'Cost_per_glass' => $row['Cost_per_glass'],
                            'Price_Category' => $row['Price_Category'],
                            'Business_ID' => $row['Business_ID']
                        );

                        array_push($post_arr, $post_item);
                    }
                    success($post_arr);
                }else{
                    failure("No wine associated with business {$GLOBALS['data']->businessName} in DB");
                }
            }
        }

        else if($GLOBALS['data']->type == "updateWine"){
            $sql = "UPDATE wine SET 
                Name= '{$GLOBALS['data']->Name}',
                Body= '{$GLOBALS['data']->Body}',
                Alcohol= '{$GLOBALS['data']->Alcohol}',
                Tannin= '{$GLOBALS['data']->Tannin}',
                Acidity= '{$GLOBALS['data']->Acidity}',
                Sweetness= '{$GLOBALS['data']->Sweetness}',
                Producer= '{$GLOBALS['data']->Producer}',
                Vintage= '{$GLOBALS['data']->Vintage}',
                Volume= '{$GLOBALS['data']->Volume}',
                Cultivars= '{$GLOBALS['data']->Cultivars}',
                Category= '{$GLOBALS['data']->Category}',
                Description= '{$GLOBALS['data']->Description}',
                Cost_per_bottle= '{$GLOBALS['data']->Cost_per_bottle}',
                Cost_per_glass= '{$GLOBALS['data']->Cost_per_glass}',
                Price_Category= '{$GLOBALS['data']->Price_Category}'
                WHERE WineID= '{$GLOBALS['data']->WineID}';";
            $stmt = $GLOBALS['conn']->prepare($sql); 
            $stmt->execute();

            if($stmt->errorCode() != '00000')
                failure("no wine with id {$GLOBALS['data']->WineID} in DB");
            else
                success(array("status"=>"success"));
        }

        else if($GLOBALS['data']->type == "removeWine"){
            $sql ="DELETE FROM wine WHERE WineID= '{$GLOBALS['data']->wineId}';";
            $stmt = $GLOBALS['conn']->prepare($sql); 
            $stmt->execute();
            
            if($stmt->errorCode() != '00000')
                failure("no wine with id {$GLOBALS['data']->wineId} in DB");
            else
                success(array("status"=>"success"));
        }

        else if($GLOBALS['data']->type == "addWine"){
            $sql = "INSERT INTO wine (`Name`, `Wine_URL` ,`Body`,`Alcohol`,`Tannin`,`Acidity`,`Sweetness`,`Producer`,`Vintage`, `Volume`, `Cultivars`, `Category`, `Description`, `Cost_per_bottle`, `Cost_per_glass`, `Price_Category`,`Business_ID`)
                VALUES ( '{$GLOBALS['data']->Name}',
                '{$GLOBALS['data']->Wine_URL}',
                '{$GLOBALS['data']->Body}',
                '{$GLOBALS['data']->Alcohol}',
                '{$GLOBALS['data']->Tannin}',
                '{$GLOBALS['data']->Acidity}',
                '{$GLOBALS['data']->Sweetness}',
                '{$GLOBALS['data']->Producer}',
                '{$GLOBALS['data']->Vintage}',
                '{$GLOBALS['data']->Volume}',
                '{$GLOBALS['data']->Cultivars}',
                '{$GLOBALS['data']->Category}',
                '{$GLOBALS['data']->Description}',
                '{$GLOBALS['data']->Cost_per_bottle}',
                '{$GLOBALS['data']->Cost_per_glass}',
                '{$GLOBALS['data']->Price_Category}',
                '{$GLOBALS['data']->BusinessID}' );";

            $stmt = $GLOBALS['conn']->prepare($sql); 
            $stmt->execute();

            if($stmt->errorCode() != '00000')
                failure("no Business with id {$GLOBALS['data']->BusinessID} in DB");
            else
                success(array("status"=>"success"));
        }
        
        else if($GLOBALS['data']->type == "updateBusinessInfo"){

            $sql = "UPDATE business SET
                BName= '{$GLOBALS['data']->BName}',
                Business_URL= '{$GLOBALS['data']->Business_URL}', 
                Website_URL= '{$GLOBALS['data']->Website_URL}', 
                Weekday_open_time= '{$GLOBALS['data']->Weekday_open_time}',
                Weekday_close_time= '{$GLOBALS['data']->Weekday_close_time}', 
                Weekend_open_time= '{$GLOBALS['data']->Weekend_open_time}', 
                Weekend_close_time= '{$GLOBALS['data']->Weekend_close_time}', 
                Instagram= '{$GLOBALS['data']->Instagram}', 
                Twitter= '{$GLOBALS['data']->Twitter}', 
                Facebook= '{$GLOBALS['data']->Facebook}', 
                Description= '{$GLOBALS['data']->Description}' 
                WHERE Business_ID= {$GLOBALS['data']->BusinessID};";
                
                
            $stmt = $GLOBALS['conn']->prepare($sql); 
            $stmt->execute();
            if($stmt->errorCode() != '00000')
                failure("no Business with id {$GLOBALS['data']->BusinessID} in DB");
            else
                success(array("status"=>"success"));
        }

        else if($GLOBALS['data']->type == "getBusinessInfo"){
            
            //get businessID
            $sql = "SELECT Business_ID, Region_ID FROM business WHERE BName= '{$GLOBALS['data']->businessName}';";
            $stmt = $GLOBALS['conn']->prepare($sql); 
            $stmt->execute();
            
            if($stmt->rowCount() == 0)
                failure("no business with {$GLOBALS['data']->businessName} in DB");

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if($stmt->rowCount() > 0) {
                $businessID =$result['Business_ID'];
                $regionID =$result['Region_ID'];
                
                //get Buisiness numbers
                $sql = "SELECT BNumber FROM bnumber WHERE BusinessID= {$businessID};";
                $stmt = $GLOBALS['conn']->prepare($sql); 
                $stmt->execute();

                $numbers = array();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    array_push($numbers, $row['BNumber']);
                }
                
                //get Buisiness numbers
                $sql = "SELECT BEmail FROM bemail WHERE BusinessID= {$businessID};";
                $stmt = $GLOBALS['conn']->prepare($sql); 
                $stmt->execute();
                
                $emails = array();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    array_push($emails, $row['BEmail']);
                }

                //get region info
                $sql = "SELECT * FROM region WHERE Region_ID= {$regionID};";  
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                if($stmt->rowCount() == 0)
                    failure("no region with Region_ID {$regionID} in DB");

                $regionInfo= $stmt->fetch(PDO::FETCH_ASSOC);

                //get buisiness info
                $sql = "SELECT * FROM business WHERE Business_ID= {$businessID}"; 
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if($stmt->rowCount() == 0)
                    failure("no business with Business_ID {$businessID} in DB");

                $arr = array(
                    'Business_ID' => $row['Business_ID'],
                    'BName' => $row['BName'],
                    'Business_URL' => $row['Business_URL'],
                    'Website_URL' => $row['Website_URL'],
                    'Weekday_open_time' => $row['Weekday_open_time'],
                    'Weekday_close_time' => $row['Weekday_close_time'],
                    'Weekend_open_time' => $row['Weekend_open_time'],
                    'Weekend_close_time' => $row['Weekend_close_time'],
                    'Instagram' => $row['Instagram'],
                    'Twitter' => $row['Twitter'],
                    'Facebook' => $row['Facebook'],
                    'Description' => $row['Description'],
                    'Country' => $regionInfo['Country'],
                    'RegionName' => $regionInfo['RegionName'],
                    'Latitude' => $regionInfo['Latitude'],
                    'Longitude' => $regionInfo['Longitude'],
                    'Emails' => $emails,
                    'Numbers' => $numbers
                );

                success($arr);
            }
        }

        else if($GLOBALS['data']->type == "updateBusinessRegion"){
            
            $sql = "SELECT Region_ID FROM region WHERE Country= '{$GLOBALS['data']->Country}' AND RegionName= '{$GLOBALS['data']->RegionName}';";
            $stmt = $GLOBALS['conn']->prepare($sql); 
            $stmt->execute();

            $RegionID = $stmt->fetch(PDO::FETCH_ASSOC)['Region_ID'];
        
            //location alredy in DB
            if($stmt->rowCount() > 0){
                $sql = "UPDATE business SET 
                Region_ID = $RegionID
                WHERE Business_ID = {$GLOBALS['data']->BusinessID};";

                $stmt = $GLOBALS['conn']->prepare($sql); 
                $stmt->execute();
            }else{  //location not in DB
                
                //create location
                $sql = "INSERT INTO region (`Country`,`RegionName`,`Latitude`,`Longitude`)
                        VALUES ( '{$GLOBALS['data']->Country}',
                        '{$GLOBALS['data']->RegionName}',
                        '{$GLOBALS['data']->Latitude}',
                        '{$GLOBALS['data']->Longitude}');";
                
                $stmt = $GLOBALS['conn']->prepare($sql); 
                $stmt->execute();

                if($stmt->rowCount() > 0){
                    
                    //get location Region_ID
                    $sql = "SELECT Region_ID FROM region WHERE Country= '{$GLOBALS['data']->Country}' AND RegionName= '{$GLOBALS['data']->RegionName}'";
                    $stmt = $GLOBALS['conn']->prepare($sql); 
                    $stmt->execute();
        
                    $RegionID = $stmt->fetch(PDO::FETCH_ASSOC)["Region_ID"];

                    //add location to buisiness
                    $sql = "UPDATE business SET 
                    Region_ID = $RegionID
                    WHERE Business_ID = {$GLOBALS['data']->BusinessID} ;";

                    $stmt = $GLOBALS['conn']->prepare($sql); 
                    $stmt->execute();
                }
    
            }

            success(array("status"=>"success"));
        }

        else if($GLOBALS['data']->type == "getUserInfo"){
            $sql = "SELECT * FROM user WHERE Email= '{$GLOBALS['data']->userEmail}';";
            
            $stmt = $GLOBALS['conn']->prepare($sql); 
            $stmt->execute();
            $result1 = $stmt->fetch(PDO::FETCH_ASSOC);

            if($stmt->rowCount() == 0)
                failure("no user with {$GLOBALS['data']->userEmail} in DB");

            $sql = "SELECT Country, RegionName FROM region WHERE Region_ID= '{$result1['Region_id']}';";
            $stmt = $GLOBALS['conn']->prepare($sql); 
            $stmt->execute();
            
            $result2 = $stmt->fetch(PDO::FETCH_ASSOC);

            if($stmt->rowCount() > 0) {
    
                $arr = array(
                    'UserID' => $result1['UserID'],
                    'First_name' => $result1['First_name'],
                    'Middle_name' => $result1['Middle_name'],
                    'Last_name' => $result1['Last_name'],
                    'Password' => $result1['Password'],
                    'Email' => $result1['Email'],
                    'PhoneNumber' => $result1['PhoneNumber'],
                    'Country' => $result2['Country'],
                    'RegionName' => $result2['RegionName']
                );

                success($arr);
            }else {
                failure("no region with {$result1['Region_id']} exists");
            }
        }
        
        else{
            failure("Error: Invalid Type parameter, please check spelling or ask the API team for assistance");
        }

    } else{
        failure("Type not specified.");
    }
    
    //UNCOMMENT WHEN DONE: error_reporting(E_ERROR | E_PARSE);
  }

?>
