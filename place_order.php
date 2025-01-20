<?php

include 'includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = array();

    try {
        $customer_name = $_POST['customerName'];
        $flavor_id = $_POST['flavorId'];
        $quantity = $_POST['quantity'];


        if (empty($customer_name) || empty($flavor_id) || empty($quantity)) {
            throw new Exception("All fields are required");
        }


        $stmt = $pdo->prepare("INSERT INTO orders (customer_name, flavor_id, quantity) VALUES (?, ?, ?)");
        $stmt->execute([$customer_name, $flavor_id, $quantity]);

        $response['status'] = 'success';
        $response['message'] = 'Order placed successfully!';
    } catch (Exception $e) {
        $response['status'] = 'error';
        $response['message'] = $e->getMessage();
    }


    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>