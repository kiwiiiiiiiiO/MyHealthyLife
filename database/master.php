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

            $sql = "SELECT * FROM User WHERE email ='".$email."'";
            $result = mysqli_query($this->link, $sql);
            if(mysqli_num_rows($result)==1 && $password == mysqli_fetch_assoc($result)["password"]){
                session_start();
                $_SESSION["loggedin"] = true;
                // Sesstion 
                if(isset($result['user_id'])){
                    $_SESSION["userid"] = $result['user_id'];    
                } 
                header("location: ../project/home.php"); 
            }else{
                echo "<script>alert('帳號或密碼錯誤');
                window.location.href='../project/signin.php';
                </script>";
            }
        }

        public function findPerson($user_id){
            $this->openDB();
            $sql = "SELECT * FROM User WHERE user_id ='".$user_id."'";
            $result = mysqli_query($this->link, $sql);
            $result = mysqli_fetch_assoc($result);
            return $result;
        }
    }

?>