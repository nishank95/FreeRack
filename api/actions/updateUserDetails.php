<?php

	require("../config/database.php");

	$db = new Database();

	if ($db -> open()) {
		
		// echo "Connected!";

		$table = "user";
		$attributes = [
				"fname" => "Test FName 1", //$_POST["fname"],
				"lname" => "Test LName 1", //$_POST["lname"],
				"dob" => date('Y-m-d', strtotime("08/12/1991")), //$_POST["dob"],
				"email" => "testfname@testlname.com", //$_POST["email"],
				"password" => md5("pass1234"), //md5($_POST["password"]),
				"contact_info" => 9876543210 //$_POST["contat_info"]
			];
		$filter = [
			"user_id" => 2 //$_POST["user_id"]
		];

		$create_flag = $db -> update($table, $attributes, $filter);

		if ($create_flag){
			echo "Account updated!";
		}
		else {
			echo "There is some issue. Try Again!";
		}
		

	}
	else {
		echo "Not Connected!";

	}
