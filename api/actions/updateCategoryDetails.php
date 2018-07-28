<?php

	require("../config/database.php");

	$db = new Database();

	if ($db -> open()) {
		
		// echo "Connected!";

		$table = "category";
		$attributes = [
				"cat_name" => "Test New Category Name" //$_POST["cat_name"],
			];
		$filter = [
			"cat_id" => 2 //$_POST["prod_id"]
		];

		$create_flag = $db -> update($table, $attributes, $filter);

		if ($create_flag){
			echo "Category updated!";
		}
		else {
			echo "There is some issue. Try Again!";
		}
		

	}
	else {
		echo "Not Connected!";

	}
