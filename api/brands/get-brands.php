<?php 
	include_once("../../connection/dbc.php");

		$query = "SELECT brands.id, brands.name AS brand FROM brands ORDER BY brands.name ASC";

		$result = $mysqli -> query($query);
		
		$rows = array();
		while($row = $result -> fetch_assoc()) {
			$rows[] = $row;
		}
	
    header('Content-Type: application/json');
	echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>