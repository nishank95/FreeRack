<?php

	require("../config/database.php");

	$db = new Database();

	if ($db -> open()) {
		
		// echo "Connected!";

		$table = "user";
		$attributes = [
				"fname" => $_POST["fname"],
				"lname" => $_POST["lname"],
				"dob" => date('Y-m-d', strtotime("$_POST["dob"]")),
				"email" => $_POST["email"],
				"password" => md5($_POST["password"]),
				"contact_info" => intval($_POST["contat_info"])
			];
		$filter = [];

		$create_flag = $db -> create($table, $attributes, $filter);

		if ($create_flag){
			echo "Account created!";
		}
		else {
			echo "There is some issue. Try Again!";
		}
		

	}
	else {
		echo "Not Connected!";

	}
