<?php 
	include_once("../../connection/dbc.php");

	$query = "SELECT shoes.id, types.type, brands.name AS brand, shoes.name AS product, SUM(logs.distance) as distance, shoes.timestamp
	FROM shoes INNER JOIN brands
	ON brands.id = shoes.brandId INNER JOIN types
	ON types.id = shoes.typeId LEFT JOIN logs
	ON logs.shoeId = shoes.id
	GROUP BY shoes.id
	ORDER BY brands.name ASC";

	$result = $mysqli -> query($query);
	
	$rows = array();
	while($row = $result -> fetch_assoc()) {
		$rows[] = $row;
	}
		
	
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin: *');
	echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>