<?php
include 'db_connect.php';

if (isset($_POST['action']) && $_POST['action'] == 'get_client_details') {
    $client_id = intval($_POST['client_id']);  // Ensure client_id is an integer

    // Fetch client details from the database
    $query = $conn->query("SELECT address, mobile_no FROM clients WHERE id = $client_id");
    
    if ($query && $query->num_rows > 0) {
        $data = $query->fetch_assoc();
        echo json_encode($data);
    } else {
        echo json_encode(null);
    }
    exit;
}
?>
