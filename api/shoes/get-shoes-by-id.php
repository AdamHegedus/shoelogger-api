<?php 
	include_once("../../connection/dbc.php");
		$data = json_decode(file_get_contents('php://input'), true);

		$id = $data['id'];

		$query = "SELECT shoes.id, shoes.brandId, shoes.typeId, shoes.name AS product, shoes.timestamp
		FROM shoes WHERE shoes.id=?";

		$stmt = $mysqli -> prepare($query);

		$stmt -> bind_param("i", $id);

		if ($stmt -> execute()) { 
			$result = (object) [
				'data' => $data
			];
		} else {
			$result = (object) [
				'data' => null,
				'meta' => $stmt -> error
			];
		}

		$stmt -> close();
	
	header('Content-Type: application/json');
	echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>