<?php

	require("../config/database.php");

	$db = new Database();

	if ($db -> open()) {
		
		// echo "Connected!";

		$table = "product";
		$attributes = [
				"prod_name" => "Test Product Name", //$_POST["prod_name"],
				"prod_desc" => "Test Product Description", //$_POST["prod_desc"],
			];
		$filter = [];

		$create_flag = $db -> create($table, $attributes, $filter);

		if ($create_flag){
			echo "Product details saved!";
		}
		else {
			echo "There is some issue. Try Again!";
		}
		

	}
	else {
		echo "Not Connected!";

	}
