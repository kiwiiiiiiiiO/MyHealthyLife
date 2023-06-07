<?php
  class Database{
   var $host;
   var $port;
   var $database;
   var $username;
   var $password;

   public $link;
 //  $conn = new mysqli($host, $username, $password, $database, $port);
   function __construct($host, $username, $password, $database , $port){
       $this->host = $host;
       $this->port = $port;
       $this->database = $database;
       $this->username = $username;
       $this->password = $password;
   }

   public function connect(){
      //  $conn = new mysqli($host, $username, $password, $database, $port);
      // $this->host, $this->username, $this->password, $this->database , $this-> port 
       $this-> link = new mysqli($this->host, $this->username, $this->password, $this->database , $this-> port );
       if(mysqli_connect_error()){
           echo " Connection Fail" + mysqli_connect_error();
           exit();
       }
       else{
         //   echo " Connection Success";
           return $this->link;
        
       }
   }
}
?>