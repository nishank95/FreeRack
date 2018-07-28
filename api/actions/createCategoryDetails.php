<?php

	require("../config/database.php");

	$db = new Database();

	if ($db -> open()) {
		
		// echo "Connected!";

		$table = "category";
		$attributes = [
				"cat_name" => "Test Category Name" //$_POST["prod_name"]
			];
		$filter = [];

		$create_flag = $db -> create($table, $attributes, $filter);

		if ($create_flag){
			echo "Category details saved!";
		}
		else {
			echo "There is some issue. Try Again!";
		}
		

	}
	else {
		echo "Not Connected!";

	}
