<?php  
class modelTest{
		public function connectTest(){
			$c = new mysqli('localhost', 'root', '', 'modeltest');
			return $c;
		}
		public function selectTest($table,$condition){
        	$sql = "SELECT * FROM ".$table." WHERE ".$condition;
        	return mysqli_query($this->connectTest(), $sql);
        }
        public function deleteTest($table,$condition){
        	$sql = "DELETE FROM ".$table." WHERE ".$condition;
        	return mysqli_query($this->connectTest(), $sql);
        }
        public function insertTest($table,$values){
        	$sql = "INSERT INTO ".$table." SET ".$values;
        	return mysqli_query($this->connectTest(), $sql);
        }
        public function updateTest($table,$values,$condition){
        	$sql = "UPDATE ".$table." SET ".$values." WHERE ".$condition;
        	return mysqli_query($this->connectTest(), $sql);
        }
}


//testing models with a Test DB in localhost with xampp
//each method with a suffix 'Test', is exactly implimented in the original app
//phpunit is not used here because each method requires at least a local table to run

function veiw_db_table_data_for_testing($test_db, $test_table){
	$mysqli = new mysqli("localhost", "root", "", $test_db);
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

    //$sql = "SHOW TABLES"; 
    $sql = "select * from ".$test_table;  //edit your table name here
    $res = $mysqli->query($sql);

    while ($row = $res->fetch_assoc()) {
    	print_r($row);
    }
}

echo "<body style='background:black; color:white;'>";
$TestObject = new modelTest();
echo "<span style='color:yellow;'>Testing models with a Test DB in localhost with xampp.<br/>
Each method written in the Test code with a suffix 'Test', is exactly implimented in the original app.<br/>
</span>";
echo '<span style="color:gray;">Testing 5 functions of model class...<br/><br/></span>';
echo 'Test Table Before running functions:<br/>';
veiw_db_table_data_for_testing('modeltest','testtable');
//function1
if ($TestObject->connectTest()->connect_error) {
			echo '<br/><br/>Function 1: '.-1;
		} else {
			echo '<br/><br/>Function 1: '."<span style='color:lime;'>success</span>";
		}
//function2
$array = $TestObject->selectTest('testtable', 'test1=1')->fetch_assoc();
		if($array['test1'] == 1) echo '<br/>Function 2: '."<span style='color:lime;'>success</span>";
		else echo '<br/>Function 2: '.-1;
//function3
if($TestObject->deleteTest('testtable', 'test1=1')) echo '<br/>Function 3: '."<span style='color:lime;'>success</span>";
else echo '<br/>Function 3: '.-1;
//function4
if($TestObject->insertTest('testtable', 'test1=1, test2=2, test3=3')) echo '<br/>Function 4: '."<span style='color:lime;'>success</span>";
else echo '<br/>Function 4: '.-1;
//function5
if($TestObject->updateTest('testtable', 'test3=4', 'test1=1')) echo '<br/>Function 5: '."<span style='color:lime;'>success</span>";
else echo '<br/>Function 5: '.-1;
echo '<br/><br/>Test Table After running functions:<br/>';
veiw_db_table_data_for_testing('modeltest','testtable');
echo '<br/><span style="color:white;background:green;text-align:left;"><br/>Test Completed.</span></body>';
?>