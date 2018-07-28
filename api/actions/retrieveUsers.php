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

		$user_list = $db -> retrieve($table, $attributes, $filter);
		
		print ("<pre>");
		print_r (json_encode($user_list));
		print ("</pre>");
		
		return json_encode($user_list);

	}
	else {
		echo "Not Connected!";

	}
