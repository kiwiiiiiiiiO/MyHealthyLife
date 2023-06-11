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
                $result = mysqli_fetch_assoc($result);
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
        public function updatePerson($user_id,$name, $password,$birth, $cellphone, $weight, $height, $weight_goal, $weekly_goal, $activity, $water){
            $this->openDB();
            // $userid, $name_c, $password_c, $birth_c, $cellphone_c, $weight_c, $height_c, $weight_goal_c, $weekly_goal_c, $activity_c, $water_c
            $sql = "UPDATE User SET `name`='".$name."' ,`password`='".$password."',`birth`='".$birth."',`cellphone`='".$cellphone."',`weight`='".$weight."',`height`='".$height."', `weight_goal`='".$weight_goal."',`activity`='".$activity."', `water`='".$water."' WHERE user_id ='".$user_id."';";
            if(!mysqli_query($this->link, $sql)){
                echo "wrong"; 
            }
        }
    }

?>