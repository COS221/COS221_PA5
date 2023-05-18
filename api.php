<?php
// if(!isset($_SESSION)) 
// { 
//     session_start(); 
// } 

function isEmpty($param){
  return $param == "";
}

$json =file_get_contents('php://input');
$data = json_decode($json);

$resultObject = new stdClass();
$resultObject->status = 'success';
$resultObject->timestamp = time();
$resultObject->data = [];


//require_once("COS216/PA4/config.php");
require_once("config.php");

//header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
$GLOBALS['data'];

class Post{
  private $conn;
  private $table = 'Wines';
  public $apikey ='123456';
  public function __construct($db) {
      $this->conn = $db;
    }
//For now I only support two types
    private function checkType(){
      if ( !isset($GLOBALS['data']->type) || $GLOBALS['data']->type!== "GetAllWines")
      { 
          $GLOBALS['resultObject']->status = 'error';
          $GLOBALS['resultObject']->data = "Error. Request 'Type' is invalid, try using GetAllWines,GetAllWineries or checking for empty parameters and incorrect data types.";
          echo json_encode($GLOBALS['resultObject']);
          exit();
      }
      return true;
    }

    private function isThere(){
      if (!isset($GLOBALS['data']->apikey)){
        return false;
      }
            //var_dump($GLOBALS['data']->apikey);
            $stmt = $this->conn->prepare("Select * from users where API_key='".$GLOBALS['data']->apikey."'");
            //$stmt->bind_param("s",$GLOBALS['data']->apikey);
            $stmt->execute();
            $count = $stmt->rowCount();
            //var_dump($count);
            if ($count >0)
            return true;
            else return false;
    }

    private function checkAPIkey(){ //A default user who isnt logged in will use the apikey 123456
      if ($this->isThere() == true || $GLOBALS['data']->apikey == $this->apikey) {
          # code...
          return true;
      }
      $GLOBALS['resultObject']->status = 'error';
      $GLOBALS['resultObject']->data = "Error. Invalid API key used. Ask the admin to provide your valid key.";
      echo json_encode($GLOBALS['resultObject']);
      exit();
    }
    public function checkRate(){
      $this->checkType();
      if ($this->checkAPIkey() == true){  //CHANGE LATER //Technically, you must login to rate a wine
      $sql = "Select * from ratings WHERE apikey= '".$GLOBALS['data']->apikey."' AND wineID = ".$GLOBALS['data']->rate->wineID;
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();

      $count = $stmt->rowCount();
      if ($count == 0) {
        # code...
        $sql = "INSERT INTO ratings VALUES ('".$GLOBALS['data']->apikey."', ".$GLOBALS['data']->rate->wineID.", ".$GLOBALS['data']->rate->wineID.")";
       // var_dump($sql);

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
      } else {
        $sql = "UPDATE ratings SET rating= ".$GLOBALS['data']->rate->rating." WHERE apikey='".$GLOBALS['data']->apikey."' AND wineID = ".$GLOBALS['data']->rate->wineID;

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
      }
    }
  }
    public function checkUpdate(){ //Setting user preferences //CHANGE LATER
      $this->checkType();
      if ($this->checkAPIkey() == true){
      //Example of what I used before, these preferences are loaded when a user logs in.
      //  $sql = "Update users SET default_wine_type ='".$GLOBALS['data']->update->wine."', def_transmission = '".$GLOBALS['data']->update->transmission."',def_body_type = '".$GLOBALS['data']->update->body_type."',def_engine_type= '".$GLOBALS['data']->update->engine_type."' WHERE API_key = '".$GLOBALS['data']->apikey."'";
      $sql = "Update users SET default_wine_type ='".$GLOBALS['data']->update->wine."' WHERE API_key = '".$GLOBALS['data']->apikey."'";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      }

    }
    private function search(){        
      if (!isset($GLOBALS['data']->search)) {
          # code...
        return false;
      }

      if (isEmpty($GLOBALS['data']->search)) {
        # code...
        $GLOBALS['resultObject']->status = 'error';
        $GLOBALS['resultObject']->data = "Error: Empty search parameter was entered. Please ensure all attributes have values";
        echo json_encode($GLOBALS['resultObject']);
        exit();
      }

      if (isset($GLOBALS['data']->search->category)){

      if (isEmpty($GLOBALS['data']->search->category)) {
        # code...
        $GLOBALS['resultObject']->status = 'error';
        $GLOBALS['resultObject']->data = "Error: Empty search parameter was entered for 'make'. Please ensure all attributes have values";
        echo json_encode($GLOBALS['resultObject']);
        exit();
      }

      }

      if (isset($GLOBALS['data']->search->brand)){

        if (isEmpty($GLOBALS['data']->search->brand)) {
          # code...
          $GLOBALS['resultObject']->status = 'error';
          $GLOBALS['resultObject']->data = "Error: Empty search parameter was entered for 'model'. Please ensure all attributes have values";
          echo json_encode($GLOBALS['resultObject']);
          exit();
        }

        }
//and (!isset($GLOBALS['data']->search->make) and !isset($GLOBALS['data']->search->model)
        if (isset($GLOBALS['data']->search)){
          if (isset($GLOBALS['data']->search->brand)){
                      if (isEmpty($GLOBALS['data']->search->brand)) {
            # code...
            $GLOBALS['resultObject']->status = 'error';
            $GLOBALS['resultObject']->data = "Error: Empty search parameter was entered for 'model' or 'model'. Please ensure attributes have values if entered in the request body";
            echo json_encode($GLOBALS['resultObject']);
            exit();
          }  
          }


  
          }

      $possible = array('body', 'sweetness', 'acidity', 'tannin', 'alchohol', 'origin', 'volume', 
      'calivars', 'description', 'cost_per_glass', 'cost_per_bottle');



      $select = array();
      $valid  = array('body', 'sweetness', 'acidity', 'tannin', 'alchohol', 'origin', 'volume', 
      'calivars', 'description', 'cost_per_glass', 'cost_per_bottle');
      $temp =json_encode($GLOBALS['data']->search) ;

      // var_dump($GLOBALS['data']->search);

      // var_dump($temp);
      // var_dump($temp[5]);

      foreach ($valid as $column ) {
          # code...
          if ( isset($GLOBALS['data']->search->$column) ) {
              # code...
              $select[] = $column . ' = "' . $GLOBALS['data']->search->$column.'"' ;
              // echo "Added to where statement";
              // var_dump($select);
          }
      }

      return implode(' AND ', $select);
    }

    private function fuzzySearch(){        
      
      if (!isset($GLOBALS['data']->search)) {
          # code...
        return false;
      }


    if (isEmpty($GLOBALS['data']->search)) {
      # code...
      $GLOBALS['resultObject']->status = 'error';
      $GLOBALS['resultObject']->data = "Error: Empty search parameter was entered. Please ensure all attributes have values";
      echo json_encode($GLOBALS['resultObject']);
      exit();
    }

    if (isset($GLOBALS['data']->search->category)){

    if (isEmpty($GLOBALS['data']->search->category)) {
      # code...
      $GLOBALS['resultObject']->status = 'error';
      $GLOBALS['resultObject']->data = "Error: Empty search parameter was entered for 'make'. Please ensure all attributes have values";
      echo json_encode($GLOBALS['resultObject']);
      exit();
    }

    }

    if (isset($GLOBALS['data']->search->brand)){
      if (isEmpty($GLOBALS['data']->search->brand)) {
        # code...
        $GLOBALS['resultObject']->status = 'error';
        $GLOBALS['resultObject']->data = "Error: Empty search parameter was entered for 'model'. Please ensure all attributes have values";
        echo json_encode($GLOBALS['resultObject']);
        exit();
      }

      }
//and (!isset($GLOBALS['data']->search->make) and !isset($GLOBALS['data']->search->model)) 
      if (isset($GLOBALS['data']->search)){
        if (isset($GLOBALS["data"]->search->brand)){
          if (isEmpty($GLOBALS['data']->search->brand)) {
          # code...
          $GLOBALS['resultObject']->status = 'error';
          $GLOBALS['resultObject']->data = "Error: Empty search parameter was entered for 'model' or 'model'. Please ensure attributes have values if entered in the request body";
          echo json_encode($GLOBALS['resultObject']);
          exit();
        }          
        }



        }

        if (isset($GLOBALS['data']->fuzzy)) {
          # code...
          if ($GLOBALS['data']->fuzzy !== true and $GLOBALS['data']->fuzzy !== false) {
            $GLOBALS['resultObject']->status = 'error';
            $GLOBALS['resultObject']->data = "Error: fuzzy must be true or false";
            echo json_encode($GLOBALS['resultObject']);
            exit();
            
          }

      }


      $select = array();
      $valid  = array('body', 'sweetness', 'acidity', 'tannin', 'alchohol', 'origin', 'volume', 
      'calivars', 'description', 'cost_per_glass', 'cost_per_bottle');
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

  
    public function limit(){        
      
      if (!isset($GLOBALS['data']->limit)) {
          # code...
        return false;
      }
       else  {
        
        if (!is_int($GLOBALS['data']->limit )) {
          # code...
          $GLOBALS['resultObject']->status = 'error';
          $GLOBALS['resultObject']->data ="Error: Invalid limit value provided. Please make sure it is an integer.";
          echo json_encode($GLOBALS['resultObject']);
          exit();
        }

        if ($GLOBALS['data']->limit <=0) {
          # code...

          $GLOBALS['resultObject']->status = 'error';
          $GLOBALS['resultObject']->data ="Error: Invalid limit value provided. Please ensure your limit is a positive integer.";
          echo json_encode($GLOBALS['resultObject']);
          exit();
        }
        else

       return $GLOBALS['data']->limit; 
       }                   
      
    }

    private function sort(){        
      $possible = array('body', 'sweetness', 'acidity', 'tannin', 'alchohol', 'origin', 'volume', 
      'calivars', 'description', 'cost_per_glass', 'cost_per_bottle');
      
      if (!isset($GLOBALS['data']->sort)) {
          # code...
        return false;
      }
                      
      if (isEmpty($GLOBALS['data']->sort)) {
        # code...
        $GLOBALS['resultObject']->status = 'error';
        $GLOBALS['resultObject']->data ="Error: Empty 'sort' value was entered. Please ensure all attributes have values";
        echo json_encode($GLOBALS['resultObject']);

        exit();
      }else
      if (in_array($GLOBALS['data']->sort,$possible)) {
        # code...
        return true;
      } else{
        $GLOBALS['resultObject']->status = 'error';
        $GLOBALS['resultObject']->data ="Error: Invalid 'sort' value was entered. Please recheck your spelling";
        echo json_encode($GLOBALS['resultObject']);
        exit();
    }
    }

    private function order(){        
      
      if (!isset($GLOBALS['data']->order)) {
          # code...
        return false;
      }
      if (isEmpty($GLOBALS['data']->order)) {
        # code...
        $GLOBALS['resultObject']->status = 'error';
        $GLOBALS['resultObject']->data ="Error: Empty 'order' value was entered. Please ensure all attributes have values";
        echo json_encode($GLOBALS['resultObject']);
        exit();
      }else if ($GLOBALS['data']->order == "desc" || $GLOBALS['data']->order == "DESC" || $GLOBALS['data']->order == "asc" || $GLOBALS['data']->order == "ASC") {
        # code...
        return true;
      }

      $GLOBALS['resultObject']->status = 'error';
      $GLOBALS['resultObject']->data ="Error: Invalid 'order' value was entered. Please recheck your spelling";
      echo json_encode($GLOBALS['resultObject']);
      exit();
    }

    private function fuzzy(){        
      
      if (!isset($GLOBALS['data']->fuzzy)) {
          # code...
        return false;
      }
                                  //for size of array to return
      return $GLOBALS['data']->fuzzy;
    }

    private function select(){
      $possible = array('body', 'sweetness', 'acidity', 'tannin', 'alchohol', 'origin', 'volume', 
      'calivars', 'description', 'cost_per_glass', 'cost_per_bottle');

      if (!isset($GLOBALS['data']->return)) {
          # code...
          $GLOBALS['resultObject']->status = 'error';
          $GLOBALS['resultObject']->data ="Error: Return parameters were not provided. In order to return all fields the wildcard * should be used. The fields you can return are ('body', 'sweetness', 'acidity', 'tannin', 'alchohol', 'origin', 'volume', 
          'calivars', 'description', 'cost_per_glass', 'cost_per_bottle')";
          echo json_encode($GLOBALS['resultObject']);
          exit();

      }

      if (isEmpty($GLOBALS['data']->return)) {
        # code...
        $GLOBALS['resultObject']->status = 'error';
        $GLOBALS['resultObject']->data ="Error: Empty 'return' value was entered. Please ensure all attributes have values";
        echo json_encode($GLOBALS['resultObject']);
        exit();
      }

      if ($GLOBALS['data']->return=="*") {
          # code...
          return "*";
      }

      for ($i=0; $i <count($GLOBALS['data']->return) ; $i++) { 
        # code...
        if (in_array($GLOBALS['data']->return[$i],$possible) == false) {
          # code...      
          $GLOBALS['resultObject']->status = 'error';
          $GLOBALS['resultObject']->data ="Error: Invalid 'return' value was entered. Please recheck your spelling";
          echo json_encode($GLOBALS['resultObject']);
          exit();

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

    
    public function look() {
      $this->checkType();
      $this->checkAPIkey();


      // Create query
      $search = array();
  
//." WHERE ". $this->search()

      if ($this->search() == false) {
        # code...
        $query = "SELECT ". $this->select(). " FROM ".$this->table;
      }else{

      $query = "SELECT ". $this->select(). " FROM ".$this->table. " WHERE ". $this->search() ;
       //var_dump($query);
      // Prepare statement

      if ($this->fuzzy() == false) {
        # code...
        $query = "SELECT ". $this->select(). " FROM ".$this->table. " WHERE ". $this->search() ;
      }else{
          $query = "SELECT ". $this->select(). " FROM ".$this->table. " WHERE ". $this->fuzzySearch() ;
      }

    }

      if ($this->sort()) {
        # code...
        $query= $query. " ORDER BY ".$GLOBALS['data']->sort;

        if ($this->order()== false) {
          # code...
          $query= $query." ASC";
        } else {
          $query= $query." ".$GLOBALS['data']->order;
        }
      }

      if ($this->limit() !==false) {
        # code...
        $query= $query." LIMIT ".$GLOBALS['data']->limit;
      }

      $stmt = $this->conn->prepare($query);
      // var_dump($stmt);
      // Execute query
      $stmt->execute();

      // var_dump( $stmt);

      return $stmt;
      
    }

    public function look2() {
      $this->checkType();
      $this->checkAPIkey();


      // Create query
      $search = array();
  
//." WHERE ". $this->search()

      if ($this->search() == false) {
        # code...
        $query = "SELECT make,model FROM ".$this->table;
      }else{

      $query = "SELECT make,model FROM ".$this->table. " WHERE ". $this->search() ;
       //var_dump($query);
      // Prepare statement

      if ($this->fuzzy() == false) {
        # code...
        $query = "SELECT make,model FROM ".$this->table. " WHERE ". $this->search() ;
      }else{
          $query = "SELECT make,model FROM ".$this->table. " WHERE ". $this->fuzzySearch() ;
      }

    }

      if ($this->sort()) {
        # code...
        $query= $query. " ORDER BY ".$GLOBALS['data']->sort;

        if ($this->order()== false) {
          # code...
          $query= $query." ASC";
        } else {
          $query= $query." ".$GLOBALS['data']->order;
        }
      }

      if ($this->limit() !==false) {
        # code...
        $query= $query." LIMIT ".$GLOBALS['data']->limit;
      }

      $stmt = $this->conn->prepare($query);
      // var_dump($stmt);
      // Execute query
      $stmt->execute();

      // var_dump( $stmt);

      return $stmt;
      
    }
}



class img{
  private $ch;
  public $url;
public function __construct($make,$model){

  $this->url =   'https://wheatley.cs.up.ac.za/api/getimage?brand='.urlencode($make).'&model='.urlencode($model);

}
public function getImage(){
  
  $this->ch = curl_init();
  curl_setopt($this->ch,CURLOPT_URL,$this->url);
  curl_setopt($this->ch,CURLOPT_RETURNTRANSFER,true);
  $response = curl_exec($this->ch);

  if ($e=curl_error($this->ch)) {
    # code...
    $GLOBALS['resultObject']->status = 'error';
    $GLOBALS['resultObject']->data ="Error: ".$e;
    echo json_encode($GLOBALS['resultObject']);
    exit();
  }
  
  curl_close($this->ch);
  //var_dump($response);
  return $response;

}

}

$database =Database::instance();
$db = $database->connect();

$post = new Post($db);
if (isset($GLOBALS['data']->update)){

  $post->checkUpdate();
  $GLOBALS['resultObj']->status = 'Success';  //CHANGE
  // $GLOBALS['resultObj']->data ="Message: "."Saved preferences [".$GLOBALS['data']->update->category.",".$GLOBALS['data']->update->transmission.",".$GLOBALS['data']->update->engine_type.",".$GLOBALS['data']->update->body_type."]";
  echo json_encode($GLOBALS['resultObj']);
  exit();
}

if (isset($GLOBALS['data']->rate)){

  $post->checkRate();
  $GLOBALS['resultObj']->status = 'Success';
  $GLOBALS['resultObj']->data ="Message: "."Saved rating of ".$GLOBALS['data']->rate->rating;
  echo json_encode($GLOBALS['resultObj']);
  exit();
}
$rizz = $post->look();

$count = $rizz->rowCount();

  # code...
  if($count > 0) {
    // Post array
    $post_arr = array();
    // $posts_arr['data'] = array();
    if ($GLOBALS['data']->return == "*"){
      while($row = $rizz->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        //var_dump($row);
          # code...
          $post_item = array(
            'id_trim' => $row['id_trim'],
            'make' => $row['make'],
            'model' => $row['model'],
            'series' => $row['series'],
            'generation' => $row['generation'],
            'year_from' => $row['year_from'],
            'year_to' => $row['year_to'],
            'trim' => $row['trim'],
            'number_of_seats' => $row['number_of_seats'],
            'length_mm' => $row['length_mm'],
            'width_mm' => $row['width_mm'],
            'height_mm' => $row['height_mm'],
            'number_of_cylinders' => $row['number_of_cylinders'],
            'engine_type' => $row['engine_type'],
            'transmission' => $row['transmission'],
            'max_speed_km_per_h' => $row['max_speed_km_per_h'],
            'body_type' => $row['body_type'],
            'drive_wheels' => $row['drive_wheels']
          );
        
        $img_array;
        if (isset($row['model']) and isset($row['make'])) {
          # code...
          $image = new img($row['make'],$row['model']);
          //var_dump($row['model']);
          $img_array = array('image'=>$image->getImage());
        } else {
          //var_dump($GLOBALS['search']->model);
          $img_array = array('image'=>"No image available, as model was not specified");
        }
      
        $post_item=array_merge($post_item, $img_array);
        //var_dump($post_item);
        // Push to "data"
        array_push($post_arr, $post_item);
        // array_push($posts_arr['data'], $post_item);
      }

      $resultObj->data=$post_arr;
      
      echo json_encode($resultObj);
    } else{
      $rizz2 = $post->look2();
      while($row = $rizz->fetch(PDO::FETCH_ASSOC) and $row2 = $rizz2->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        extract($row2);
        //var_dump($row);
          $post_item = array();
          foreach ($GLOBALS['data']->return as $val){

            if (in_array($val,$GLOBALS['possible']) == false) {
              # code...      
              $GLOBALS['resultObj']->status = 'error';
              $GLOBALS['resultObj']->data ="Error: Invalid 'return' value was entered. Please recheck your spelling";
              echo json_encode($GLOBALS['resultObj']);
              exit();
            }

            $arr= array($val=> $row[$val]);
            $post_item=array_merge($post_item, $arr);
          }
        

        $img_array;
        if (isset($row2['model']) and isset($row2['make'])) {
          # code...
          $image = new img($row2['make'],$row2['model']);
          //var_dump($row['model']);
          $img_array = array('image'=>$image->getImage());
        } else {
          //var_dump($GLOBALS['search']->model);
          $img_array = array('image'=>"No image available, as model was not specified");
        }
      
        $post_item=array_merge($post_item, $img_array);
        //var_dump($post_item);
        // Push to "data"
        array_push($post_arr, $post_item);
        // array_push($posts_arr['data'], $post_item);
      }

      $resultObj->data=$post_arr;
      
      echo json_encode($resultObj);
    }


  } else {
    // No Posts
    $GLOBALS['resultObj']->status = 'error';
    $GLOBALS['resultObj']->data ="Error: "."No cars meeting your requirements was found.";
    echo json_encode($GLOBALS['resultObj']);
    exit();
  };




?>