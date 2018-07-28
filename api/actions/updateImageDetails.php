<?php

	require("../config/database.php");

	$db = new Database();

	if ($db -> open()) {
		
		// echo "Connected!";

		$table = "image";
		$attributes = [
				"img_url" => "Test URL 1234", //$_POST["img_url"],
				"img_thumbnail" => "Test Thumbnail 1234", //$_POST["img_thumbnail"],
			];
		$filter = [
			"img_id" => 2 //$_POST["img_id"]
		];

		$create_flag = $db -> update($table, $attributes, $filter);

		if ($create_flag){
			echo "Image updated!";
		}
		else {
			echo "There is some issue. Try Again!";
		}
		

	}
	else {
		echo "Not Connected!";

	}
