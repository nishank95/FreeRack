<?php

	require("../config/database.php");

	$db = new Database();

	if ($db -> open()) {
		
		// echo "Connected!";

		$table = "image";
		$attributes = [
				"img_url" => "testimgurl", //$_POST["loc_lat"],
				"img_thumbnail" => "testimgthumbnail", //$_POST["loc_long"],
			];
		$filter = [];

		$create_flag = $db -> create($table, $attributes, $filter);

		if ($create_flag){
			echo "Image details saved!";
		}
		else {
			echo "There is some issue. Try Again!";
		}
		

	}
	else {
		echo "Not Connected!";

	}
