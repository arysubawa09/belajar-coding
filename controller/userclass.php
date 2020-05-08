<?php

    class userclass
    {

        private $conn;

        public function __construct($conn)
        {
            $this->conn = $conn;
        }

        public function addManual($nama ,$username, $email, $password ,$alamat)
        {
            $cekEmail = $this->conn->query("SELECT * FROM tb_users WHERE email = '$email'");

            if($cekEmail->rowCount() == 0){

                $hashpassword = password_hash($password , PASSWORD_DEFAULT);

                $result = $this->conn->prepare("INSERT INTO tb_users(nama,username,email,password,alamat)
                VALUES(:nama,:username,:email,:password,:alamat)");

                $result->bindParam(':nama', $nama);
                $result->bindParam(':username', $username);
                $result->bindParam(':email', $email);
                $result->bindParam(':password', $hashpassword);
                $result->bindParam(':alamat', $alamat);

                if($result->execute()){

                    return true;
                }
                return false;
            }
        }

        public function cekLogin($username, $password)
        {
            $ceklogin = $this->conn->query("SELECT * FROM tb_users WHERE username = '$username'");
            
            if($ceklogin->rowCount() > 0){

                $user = $ceklogin->fetch(PDO::FETCH_OBJ);

                $passworduser = $user->password;

                if(password_verify($password,$passworduser)){
                    $_SESSION['id_user'] = $user->id_user;
                    return true;
                }
                return false;
            }
        }
    }
?>