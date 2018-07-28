<?php

	require("../config/database.php");

	$db = new Database();

	if ($db -> open()) {
		
		// echo "Connected!";

		$table = "purchase";
		$attributes = [
				"user_id" => 5, //$_POST["user_id"],
				"prod_id" => 2 //$_POST["prod_id"],
			];
		$filter = [];

		$create_flag = $db -> create($table, $attributes, $filter);

		if ($create_flag){
			echo "Purchase details saved!";
		}
		else {
			echo "There is some issue. Try Again!";
		}
		

	}
	else {
		echo "Not Connected!";

	}
