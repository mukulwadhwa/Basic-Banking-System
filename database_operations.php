<?php

	class database{

		//DATABASE DETAILS STORED IN PROPERTIES OF CLASS DATABASE

		public $host='localhost';
		public $user='root';
		public $pass='';
		public $db_name='bank';

		//METHOD TO CONNECT TO DATABASE

		public function connect_db(){
			$con=mysqli_connect($this->host,$this->user,$this->pass,$this->db_name);
			return $con;
		}

		//METHOD TO INSERT DATA INTO DATABASE TABLE

		public function insert_data($table_name,$insert_id,$get_data){
			$con=$this->connect_db();
			if($insert_id==""){
				$insert_id='NULL';
			}
			$query_string="INSERT INTO `" . $table_name . "`";
			$query_string .= " VALUES(". $insert_id .",'" . implode("','",$get_data) . "')";
			$mysql_query=mysqli_query($con,$query_string);
			if(!$mysql_query){
				$status=0;
			} else {
				$status=1;
			}
			return $status;
			mysqli_close($con);
		}

		//METHOD TO UPDATE EXISTING DATA IN DATABASE TABLE

		public function update_data($table_name,$name,$update,$condition_name,$condition,$implode_mark,$manual_condition){
			$con=$this->connect_db();
			$name_update=array();
			for($i=0;$i<count($name);$i++){
				$name_update[$i]= "`" . $name[$i] . "`='" . $update[$i] . "'";
			}
			$condition_input='';
			if($manual_condition=='' && $condition!=''){
				for($i=0;$i<count($condition);$i++){
					$name_condition[$i]= "`" . $condition_name[$i] . "`='" . $condition[$i] . "'";
				}
				if($implode_mark==''){
					$implode_mark=',';
				}
				$condition_input= implode($implode_mark,$name_condition);
			} else if($manual_condition!=''){
				$condition_input= $manual_condition;
			}
			$condition_input_supply='';
			if($condition_input!=''){
				$condition_input_supply=" WHERE " . $condition_input;
			}
			$query_string="UPDATE " . $table_name;
			$query_string .= " SET " . implode(",",$name_update) . $condition_input_supply;
			$mysql_query=mysqli_query($con,$query_string);
			if(!$mysql_query){
				$status=0;
			} else {
				$status=1;
			}
			return $status;
			mysqli_close($con);
		}

	
		//METHOD TO FETCH DATA FROM DATABASE TABLE UNDER CERTAIN CONDITION

		public function fetch_data($table_name,$select_column,$conditions,$sorting){
			$con=$this->connect_db();
			if($select_column==""){
				$select_column = "*";
			}
			$query_string="SELECT ". $select_column ." FROM " . $table_name;
			if($conditions!=''){
				$query_string .= " WHERE " . $conditions ;
			}
			if($sorting!=''){
				$query_string .= " ORDER BY " . $sorting ;
			}
			$received_data=array();
			$mysql_query=mysqli_query($con,$query_string);
			while($each_row=mysqli_fetch_assoc($mysql_query)){
				$received_data[]=$each_row;
			}
			return $received_data;
			mysqli_close($con);
		}


		//FOR UNION AND OTHER COMMANDS

		public function trick_fetch_data($command){
			$con=$this->connect_db();
			$received_data=array();
			$mysql_query=mysqli_query($con,$command);
			while($each_row=mysqli_fetch_assoc($mysql_query)){
				$received_data[]=$each_row;
			}
			return $received_data;
			mysqli_close($con);
		}

	}

?>
