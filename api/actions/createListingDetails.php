<?php

	require("../config/database.php");

	$db = new Database();

	if ($db -> open()) {
		
		// echo "Connected!";

		$table = "listing";
		$attributes = [
				"user_id" => 4, //$_POST["user_id"],
				"loc_id" => 1, //$_POST["loc_id"],
				"img_id" => 2, //$_POST["img_id"],
				"prod_id" => 2, //$_POST["prod_id"],
				"pur_id" => 1, //$_POST["pur_id"]
			];
		$filter = [];

		$create_flag = $db -> create($table, $attributes, $filter);

		if ($create_flag){
			echo "Listing created!";
		}
		else {
			echo "There is some issue. Try Again!";
		}
		

	}
	else {
		echo "Not Connected!";

	}
