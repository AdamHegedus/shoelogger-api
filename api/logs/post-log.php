<?php 
    include_once("../../connection/dbc.php");
    $data = json_decode(file_get_contents('php://input'), true);

    $shoeId = $data['shoeId'];
    $distance = $data['distance'];
    $date = $data['date'];

    $query = "INSERT INTO logs (shoeId, distance, `date`) VALUES (?, ?, ?)";
    
    $stmt = $mysqli -> prepare($query);

    $stmt -> bind_param("iis", $shoeId, $distance, $date);

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