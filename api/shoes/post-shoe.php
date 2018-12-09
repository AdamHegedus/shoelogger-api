<?php 
    include_once("../../connection/dbc.php");
    $data = json_decode(file_get_contents('php://input'), true);

    $brandId = $data['brandId'];
    $typeId = $data['typeId'];
    $product = $data['product'];

    $query = "INSERT INTO shoes (`typeId`, `brandId`, `name`) VALUES (?, ?, ?)";
    
    $stmt = $mysqli -> prepare($query);

    $stmt -> bind_param("iis", $typeId, $brandId, $product);
    
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