<?php

	require("../config/database.php");

	$db = new Database();

	if ($db -> open()) {
		
		// echo "Connected!";

		$table = "product";
		$attributes = [
				"prod_name" => "Test New Prod Name 1234", //$_POST["prod_name"],
				"prod_desc" => "Test New Prod Desc 1234", //$_POST["prod_desc"],
			];
		$filter = [
			"prod_id" => 2 //$_POST["prod_id"]
		];

		$create_flag = $db -> update($table, $attributes, $filter);

		if ($create_flag){
			echo "Product updated!";
		}
		else {
			echo "There is some issue. Try Again!";
		}
		

	}
	else {
		echo "Not Connected!";

	}
