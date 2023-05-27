<?php
class Database
{
    public static function instance()
    {
    static $instance = null;
    if($instance === null) $instance = new Database();
    return $instance;
    }

    private $host = 'wheatley.cs.up.ac.za';
    private $username="u22575172";
    private $password="JFUE9QR83U0443DUEHU908R43";

    private $db_name = 'u22575172_wine';

    private $conn;

    public function connect() {
  
      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        response("false",$e->getMessage());
        exit();
      }

      return $this->conn;
    }

    private function __construct() {
      $this->conn = null;

    }
    
public function __destruct() {
  if ($this->conn !=null) {
    # code...
    $this->conn =null;
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
}
?>
