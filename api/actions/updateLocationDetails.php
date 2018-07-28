<?php

	require("../config/database.php");

	$db = new Database();

	if ($db -> open()) {
		
		// echo "Connected!";

		$table = "location";
		$attributes = [
				"loc_lat" => "1234", //$_POST["loc_lang"],
				"loc_long" => "4321", //$_POST["loc_long"],
			];
		$filter = [
			"loc_id" => 2 //$_POST["user_id"]
		];

		$create_flag = $db -> update($table, $attributes, $filter);

		if ($create_flag){
			echo "Location updated!";
		}
		else {
			echo "There is some issue. Try Again!";
		}
		

	}
	else {
		echo "Not Connected!";

	}
