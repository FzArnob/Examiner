<?php  class model{
        public function connect(){
            //$c = new mysqli('sql208.epizy.com', 'epiz_25901956', '3DVFk84ev5jtj', 'epiz_25901956_examiner'); 
            // For Hosted use only
            $c = new mysqli('localhost', 'root', '', 'quiz');
            return $c;
        }
        public function select($table,$condition){
        	$sql = "SELECT * FROM ".$table." WHERE ".$condition;
        	return mysqli_query($this->connect(), $sql);
        }
        public function delete($table,$condition){
        	$sql = "DELETE FROM ".$table." WHERE ".$condition;
        	return mysqli_query($this->connect(), $sql);
        }
        public function insert($table,$values){
        	$sql = "INSERT INTO ".$table." SET ".$values;
        	return mysqli_query($this->connect(), $sql);
        }
        public function update($table,$values,$condition){
        	$sql = "UPDATE ".$table." SET ".$values." WHERE ".$condition;
        	return mysqli_query($this->connect(), $sql);
        }
    }
?>