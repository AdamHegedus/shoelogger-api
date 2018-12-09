<?php 
    include_once("../../connection/dbc.php");
    $data = json_decode(file_get_contents('php://input'), true);

    $brand = $data['brand'];

    $query = "INSERT INTO brands (name) VALUES (?)";
    
    $stmt = $mysqli -> prepare($query);

    $stmt -> bind_param("s", $brand);
    
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