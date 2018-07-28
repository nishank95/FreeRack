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

		public function build_retrieve_sql_query($table, $attributes, $filter) {

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
			return $sql_query;

		}

		public function retrieve($table, $attributes, $filter) {
			try {

				$user_list = [];

				$sql_query = $this -> build_retrieve_sql_query($table, $attributes, $filter);

				$stmt = $this -> conn -> prepare($sql_query);

				$stmt -> execute();

				while($user = $stmt -> fetch(PDO::FETCH_ASSOC)){
					array_push($user_list, $user);
				}
			
			} catch(Exception $exp) {
				echo "Connection Error: ".$exp -> getMessage();
			}

			return $user_list;

		}

		public function create($table, $attribute, $filter) {
			try {

				$sql_query = "INSERT INTO user (fname, lname, dob, email, password, contact_info) VALUES (:fname, :lname, :dob, :email, :password, :contact_info);";

				$stmt = $this -> conn -> prepare($sql_query);

				$stmt -> bindParam(":fname", $attribute["fname"]);
				$stmt -> bindParam(":lname", $attribute["lname"]);
				$stmt -> bindParam(":dob",  date('Y-m-d', strtotime($attribute["dob"])));
				$stmt -> bindParam(":email", $attribute["email"]);
				$stmt -> bindParam(":password", md5($attribute["password"]));
				$stmt -> bindParam(":contact_info", $attribute["contact_info"], PDO::PARAM_INT);
			
				$create_flag = $stmt -> execute();
				

			} catch(Exception $exp) {
				echo "Connection Error: ".$exp -> getMessage();
			}
			return $create_flag;
		}

	}
