<?php

    define('DB_SERVER', 'localhost'); // hostname
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'register_oop'); //database name

    class DB_con{
        function  __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if(mysqli_connect_errno()){
                echo "Faild to connect to DATABASE" . mysqli_connect_error();
            }
        }

        public function usernameavailable($uname) {
            $checkuser = mysqli_query($this->dbcon, "SELECT username FROM usertb WHERE username = '$uname'");
            return $checkuser;
        } 

        public function registration($fname , $uname,$uemail,$password){
                $encrypt_password = sha1($password);
                $reg = mysqli_query($this->dbcon,"INSERT INTO usertb(fullname,username,useremail,password)
                VALUES('$fname', '$uname', '$uemail', '$encrypt_password')"); 
                return reg;
        } // fucntion reg
        public function signin($uname, $password) {
            $encrypt_password = sha1($password);
            $signinquery = mysqli_query($this->dbcon, "SELECT id, fullname FROM usertb WHERE username = '$uname' AND password = '$encrypt_password '");
            return $signinquery;
        }  
    }
?>