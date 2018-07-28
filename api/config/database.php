<?php

	require("config.php");

	class Database {

		// Connection resource
		
		public $conn = null;

		public function open(){

			try {
				// $connString = "mysql:host=".DB_HOST."; dbname=".DB_NAME.",".DB_USER.",".DB_PASS;
				$this -> conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME ,DB_USER, DB_PASS);

			}catch (PDOException $exp) {

				echo "Connection error: ".$exp -> getMessage();
			}

			return $this->conn;

		}

		public function retrieve($table, $attributes, $filter) {

			$sql_query = "SELECT ";
			$sql_query .= ($attributes == "*") ? "*" : implode(", ",$attributes);
			$sql_query .= " FROM ".$table;
			
			if(count($filter) != 0) {
				
				$sql_query .= " WHERE ";

				if(count($filter == 1)) {
					$sql_query .= array_keys($filter)[0]." = ".$filter[array_keys($filter)[0]].";";
				}
				else {
					$loop_count = 1;
					foreach($filter as $attr => $val){
						$sql_query .= $attr." = ".$val.($loop_count < count($filter) ? " AND " : "").";";
						$loop_count++;
					}

				}
			}

			echo $sql_query;

		}


	}
