<?php 
	include_once("../../connection/dbc.php");

		$query = "SELECT logs.id, logs.distance, logs.date, shoes.name AS product, types.type, brands.name AS brand
        FROM logs INNER JOIN shoes ON shoes.id = logs.shoeId
        INNER JOIN types ON shoes.typeId = types.id
        INNER JOIN brands ON shoes.brandId = brands.id
        ORDER BY logs.date DESC";

		$result = $mysqli -> query($query);
		
		$rows = array();
		while($row = $result -> fetch_assoc()) {
			$rows[] = $row;
		}
		
	
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
	echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>