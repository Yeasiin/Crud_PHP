<?php
    class Database{
        public $host = DB_HOST;
        public $name = DB_NAME;
        public $user = DB_USER;
        public $pass = DB_PASS;


        public $link;
        public $error;

        public function __construct(){
            $this->connectDB();
        }


        private function connectDB(){
         $this->link = new mysqli($this->host, $this->user, $this->pass, $this->name);
         if(!$this->link){
             $this->error = "Connection Fail".$this->link->connect_error();
             return false;
             
            }
        }


        //Select Or Read Data
        public function select($sql){
            $result = $this->link->query($sql) or die($this->link->error.__LINE__);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }

        // Insert Data
        public function insert($query){
            $result = $this->link->query($query) or die($this->link->error.__LINE__);
            
            if($result){
                header("Location: index.php?msg=".urlencode("Data Inserted Successfully"));
                exit();
            }else{
                $error = "Something Is Wrong";
                return $error;
            }


        }

        // Update Data 
        public function update($qeury){
            $result = $this->link->query($qeury) or die($this->link->error.__LINE__);

            if($result){
                header("Location: index.php?msg=".urlencode("Data Update Successfully"));
                exit();
            }else{
                $error = "Something Is Wrong";
                return $error;
            }

        }

        public function delete($qeury){
            $result = $this->link->query($qeury) or die($this->link->error.__LINE__);

            if($result){
                header("Location: index.php?msg=".urlencode("Data Delete Successfully"));
                exit();
            }else{
                $error = "Something Is Wrong";
                return $error;
            }
        }


    }

?>