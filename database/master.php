<?php

    require "db_config.php";
    require "db_connect.php";

    class master{
        public $link;

        public function openDB(){
            //  $conn = new mysqli($host, $username, $password, $database, $port);
            $conn = new Database(HOST, USERNAME , PASSWORD ,DATABASE,PORT);
            $this-> link = $conn->connect();
            if(!$this->link){
                echo "Error connecting database...";
            }
            mysqli_select_db($this->link, DATABASE);
        }

        public function closeDB(){
            $this->link->close();
        }

        public function doRegister($name, $email, $password, $gender, $birth, $cellphone, $weight, $height, $weight_goal, $weekly_goal, $activity){
            $this->openDB();
            $msg = "";
            $sql = "INSERT INTO User(name, email, password, gender,birth, cellphone, weight, height, weight_goal, weekly_goal, activity) Values('$name', '$email', '$password', '$gender', '$birth', '$cellphone', '$weight', '$height', '$weight_goal','$weekly_goal', '$activity');";
            
            if(mysqli_query($this->link, $sql)){
                // link 出錯
                $msg = "done";
            }
            else{
                $msg = "fail";
            }
            $this->closeDB();
            return $msg;
        }

        public function doLogin($email, $password){
            $this->openDB();
        }
    }

?>