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

//var_dump("Testing");

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
           var_dump($select);
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
            $fuzz =substr($GLOBALS['data']->search->$column,0,2)."%";
            $select[] = $column . ' LIKE "' . $fuzz.'"' ;
            // echo "Added to where statement";
            //var_dump($select);
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

function rateWine(){ //userID must be specified

    $sql = "Select * from wine_reviews WHERE UserID= '".$GLOBALS['data']->userID."' AND Wine_ID = ".$GLOBALS['data']->rate->Wine_ID;
    $stmt = $GLOBALS['conn']->prepare($sql); 
    $stmt->execute();

    $count = $stmt->rowCount();

      if ($count == 0) {
          # code...
          $sql = "INSERT INTO wine_reviews VALUES ('".$GLOBALS['data']->rate->Wine_ID."', ".$GLOBALS['data']->userID.", ".$GLOBALS['data']->rate->rating.", ".$GLOBALS['data']->rate->comment.")";
        // var_dump($sql);

          $stmt = $GLOBALS['conn']->prepare($sql);
          $stmt->execute();
      } 
      else {
          $sql = "UPDATE wine_reviews SET Rating= ".$GLOBALS['data']->rate->rating.", SET Comment= ".$GLOBALS['data']->rate->comment." WHERE userID='".$GLOBALS['data']->userID."' AND Wine_ID = ".$GLOBALS['data']->rate->Wine_ID;

          $stmt = $GLOBALS['conn']->prepare($sql);
          $stmt->execute();
      }
}


//A default user who isnt logged in will use the apikey 123456
if (isset($GLOBALS['data']->api_key) && isThere() || $GLOBALS['data']->api_key == $apikey ) {   //validate APIkey
    # code...
    echo("Test");
    if (!isset($GLOBALS['data']->return)){
        failure("Specify return please.");
    }

    // if (!isset($GLOBALS['data']->limit)){ //May end up enforcing a limit parameter in SQL queries, to speed up performance
    //     failure("Specify limit please.");
    // }

    if (isset($GLOBALS['data']->type)){
        if ($GLOBALS['data']->type == "GetAllWines"){
          if (isset($GLOBALS['data']->page)){
            //var_dump("Bruh");
            $sql = "SELECT ";  //SQL
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
                        'Bname' => $row['Bname'],
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
            } 
              else{ 
                failure("No wines with this name found"); 
              }

          } 
          else{
             $table = "wine";

            $possibleSelect = array('Body','Alcohol','Tannin','Acidity','Sweetness','Brand_name','Vintage','engine_type','Origin' ,'Volume','Cultivars','Category','Cost_per_bottle','Cost_per_glass','Price_Category' );

            $valid  = array('Body','Alcohol','Tannin','Acidity','Sweetness','Brand_name','Vintage','engine_type','Origin' ,'Volume','Cultivars','Category','Cost_per_bottle','Cost_per_glass','Price_Category','Lot_ID' );
            // $where = whereClause($valid);
            // if (isset($GLOBALS['data']->fuzzy) && $GLOBALS['data']->fuzzy==true){
            //     $where = whereClauseFuzzy($valid);
            // }

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
            $possibleSort = array('Body','Alcohol','Tannin','Acidity','Sweetness','Brand_name','Vintage','engine_type','Origin' ,'Volume','Cultivars','Category','Cost_per_bottle','Cost_per_glass','Price_Category' );

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

            var_dump($sql);

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
                        'Bname' => $row['Bname'],
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
            } 
              else{ 
                failure("No wines with this name found"); 
              }
          }
           
        }

        else 
        
        if ($GLOBALS['data']->type == "getAllWineries"){
          if (isset($GLOBALS['data']->page)){
            //var_dump("Bruh");
            $sql = "SELECT ";  //SQL
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
                        'BusinessID' => $row['BusinessID'],
                        'Bname' => $row['Bname'],
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

            $possibleSelect = array('BusinessID','Bname','Business_URL','Website_URL','Weekday_open_time','Weekday_close_time','Weekend_open_time','Instagram','Twitter' ,'Facebook','Description','User_ID','Region_ID');

            $valid  = array('BusinessID','Bname','Business_URL','Website_URL','Weekday_open_time','Weekday_close_time','Weekend_open_time','Instagram','Twitter' ,'Facebook','Description','User_ID','Region_ID');
            // $where = whereClause($valid);
            // if (isset($GLOBALS['data']->fuzzy) && $GLOBALS['data']->fuzzy==true){
            //     $where = whereClauseFuzzy($valid);
            // }

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
            $possibleSort =array('BusinessID','Bname','Business_URL','Website_URL','Weekday_open_time','Weekday_close_time','Weekend_open_time','Instagram','Twitter' ,'Facebook','Description','User_ID','Region_ID');

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

            var_dump($sql);

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
                        'BusinessID' => $row['BusinessID'],
                        'Bname' => $row['Bname'],
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
        
        else 
        
        if ($GLOBALS['data']->type == "createWinery"){

        }

        else 
        
        if ($GLOBALS['data']->type == "rateWine"){

          $sql = "Select * from wine_reviews WHERE UserID= '".$GLOBALS['data']->userID."' AND Wine_ID = ".$GLOBALS['data']->rate->Wine_ID;
          $stmt = $GLOBALS['conn']->prepare($sql); 
          $stmt->execute();
      
          $count = $stmt->rowCount();
      
            if ($count == 0) {
                # code...
                $sql = "INSERT INTO wine_reviews VALUES ('".$GLOBALS['data']->rate->Wine_ID."', ".$GLOBALS['data']->userID.", ".$GLOBALS['data']->rate->rating.", ".$GLOBALS['data']->rate->comment.")";
              // var_dump($sql);
      
                $stmt = $GLOBALS['conn']->prepare($sql);
                $stmt->execute();
            } 
            else {
                $sql = "UPDATE wine_reviews SET Rating= ".$GLOBALS['data']->rate->rating.", SET Comment= ".$GLOBALS['data']->rate->comment." WHERE userID='".$GLOBALS['data']->userID."' AND Wine_ID = ".$GLOBALS['data']->rate->Wine_ID;
      
                $stmt = $GLOBALS['conn']->prepare($sql);
                $stmt->execute();
            }
        }
        
        else 
        
        if ($GLOBALS['data']->type == "rateWinery"){
          $sql = "Select * from business_reviews WHERE UserID= '".$GLOBALS['data']->userID."' AND Business_ID = ".$GLOBALS['data']->rate->Business_ID;
          $stmt = $GLOBALS['conn']->prepare($sql); 
          $stmt->execute();
      
          $count = $stmt->rowCount();
      
            if ($count == 0) {
                # code...
                $sql = "INSERT INTO business_reviews VALUES ('".$GLOBALS['data']->rate->Business_ID."', ".$GLOBALS['data']->userID.", ".$GLOBALS['data']->rate->rating.", ".$GLOBALS['data']->rate->comment.")";
              // var_dump($sql);
      
                $stmt = $GLOBALS['conn']->prepare($sql);
                $stmt->execute();
            } 
            else {
                $sql = "UPDATE business_reviews SET Rating= ".$GLOBALS['data']->rate->rating.", SET Comment= ".$GLOBALS['data']->rate->comment." WHERE userID='".$GLOBALS['data']->userID."' AND Business_ID = ".$GLOBALS['data']->rate->Business_ID;
      
                $stmt = $GLOBALS['conn']->prepare($sql);
                $stmt->execute();
            }
            
        }
        //Later endpoints to be added here
        else if ($GLOBALS['data']->type == ""){
       
            
        }


    } else{
        failure("Type not specified.");
    }

  }

?>