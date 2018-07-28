<?php

	require("../config/database.php");

	$db = new Database();

	if ($db -> open()) {
		
		// echo "Connected!";

		$table = "purchase";
		$attributes = [
				"user_id" => 3, //$_POST["prod_name"],
				"prod_id" => 2 //$_POST["prod_desc"],
			];
		$filter = [
			"pur_id" => 2 //$_POST["prod_id"]
		];

		$create_flag = $db -> update($table, $attributes, $filter);

		if ($create_flag){
			echo "Purchase updated!";
		}
		else {
			echo "There is some issue. Try Again!";
		}
		

	}
	else {
		echo "Not Connected!";

	}
