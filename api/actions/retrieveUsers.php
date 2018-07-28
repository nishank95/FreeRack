<?php

	require("../config/database.php");

	$db = new Database();

	if ($db -> open()) {
		
		// echo "Connected!";

		$table = "user";
		$attributes = ["fname", "lname", "dob", "email", "contact_info"];
		$filter = [];

		if ($_GET){
			
			$filter["user_id"] = $_GET["id"];
		}
		$db -> retrieve($table, $attributes, $filter);
		

	}
	else {
		echo "Not Connected!";

	}
