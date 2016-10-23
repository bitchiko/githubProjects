<?php
class Connection{
  // $this->debugMode = false;
  public function setNewConnection($username, $password, $database, $address){
    $this->username = $username;   
    $this->password = $password;
    $this->database = $database;
    $this->address = $address;
    return $this;
  }
  public function debugMode($debugMode){
    $this->debugMode = $debugMode;
    return $this;
  }
  public function connect(){
    $conn = mysqli_connect($this->address,$this->username,$this->password,$this->database);
    mysqli_set_charset($conn,'utf8');
    if(!$conn){
      echo "<h1>No Connect :(</h1>";
      die();
    }else{
      echo $this->debugMode?"connected successfully":"";
      return $conn;
    }
  }  
}

class select{
  public $array1 = [];  
  public $array2 = [];
  
  public function __construct($conn,$query,$columnNames){
    $this->conn = $conn; 
    $this->query = $query; 
    $this->columnNames = $columnNames;
        $this->run = mysqli_query($this->conn, $this->query);
        while($this->row = mysqli_fetch_assoc($this->run)){
          for($i=0; $i<count($this->columnNames); $i++){
              $this->array2[$i] = $this->row[$this->columnNames[$i]];
          }
              array_push($this->array1, $this->array2);
              unset($this->array2);
      }
  }
    public function getData(){
      return  $this->array1;
    }
}


/****************************************************************************************************
* 02.06.2016 ბ(ჰ).კოდუა
* დაკავშირების ცვლადი = (new Connection(უსერნეიმი,პაროლი,ბაზის სახელი,ჰოსტი))->connect() 
* ამ ობიექტის შექმნით ხდება ბაზასთან კავშირის დამყარება 
* new select(დაკავშირების ცვლადი, მაგიდის სახელი, დასაბრუნებელი კოლონების სახელების ლისტი) 
* getData() უნდა მიებას იმისთვის რომ მონაცემები დააბრუნოს
* მონაცემებს აბრუნებს 2 განზომილებიანი მასივის სახით
* მაგალითად: 
* $connection = (new Connection("root","","test","localhost"))->connect(); 
* $query = "select * from rame";
* $columnArray =  array("name","sname","age");
* $query = new select($connection,$query,$columnArray); 
* $return2dArray = $query->getData(); 
* foreach ($return2dArray as $oneArray) { პირველი ჩანაწერი
* foreach ($oneArray as $value) {  სათითაოდ სვეტები
*   echo $value."<br>";
* }
* echo "<hr>";
*}
*
****************************************************************************************************/
class insert{
  public function __construct($conn,$query){
    $this->conn = $conn; 
    $this->query = $query;
        $this->run = mysqli_query($this->conn, $this->query);
        echo "200";
  }
}


?>