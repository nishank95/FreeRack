<?php

	require("../config/database.php");

	$db = new Database();

	if ($db -> open()) {
		
		// echo "Connected!";

		$db -> retrieve($table, $attributes, $filter);
		

	}
	else {
		echo "Not Connected!";

	}
