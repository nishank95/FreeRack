<?php

	require("../config/database.php");

	$db = new Database();

	if ($db -> open()) {
		
		// echo "Connected!";

		$table = "location";
		$attributes = [
				"loc_lat" => "-37.809173", //$_POST["loc_lat"],
				"loc_long" => "144.969801", //$_POST["loc_long"],
			];
		$filter = [];

		$create_flag = $db -> create($table, $attributes, $filter);

		if ($create_flag){
			echo "Location details saved!";
		}
		else {
			echo "There is some issue. Try Again!";
		}
		

	}
	else {
		echo "Not Connected!";

	}
