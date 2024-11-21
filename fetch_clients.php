<?php
include 'db_connect.php';

$columns = array(
    0 => 'id',
    1 => 'name',
    2 => 'birth_date',
    3 => 'mobile_no',
    4 => 'address',
    5 => 'email'
);

$query = "SELECT * FROM clients";
$query_count = "SELECT COUNT(id) AS total FROM clients";
$total_filtered = 0;

// Handle search
if (!empty($_POST['search']['value'])) {
    $search = $conn->real_escape_string($_POST['search']['value']);
    $query .= " WHERE name LIKE '%" . $search . "%' OR birth_date LIKE '%" . $search . "%' OR mobile_no LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%' OR email LIKE '%" . $search . "%'";
    $query_count .= " WHERE name LIKE '%" . $search . "%' OR birth_date LIKE '%" . $search . "%' OR mobile_no LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%' OR email LIKE '%" . $search . "%'";
}

// Get total number of filtered records
$total_filtered_res = $conn->query($query_count);
$total_filtered = $total_filtered_res->fetch_assoc()['total'];

// Order and Limit
$query .= " ORDER BY " . $columns[$_POST['order'][0]['column']] . " " . $_POST['order'][0]['dir'];
$query .= " LIMIT " . $_POST['start'] . ", " . $_POST['length'];

$data = array();
$result = $conn->query($query);
$i = $_POST['start'] + 1;

while ($row = $result->fetch_assoc()) {
    $row_data = array();
    $row_data['id'] = $i++;
    $row_data['name'] = ucwords($row['name']);
    $row_data['birth_date'] = $row['birth_date'];
    $row_data['mobile_no'] = $row['mobile_no'];
    $row_data['address'] = $row['address'];
    $row_data['email'] = $row['email'];
    $row_data['action'] = '<a class="dropdown-item view_client" href="javascript:void(0)" data-id="' . $row['id'] . '">View</a>
                          <a class="dropdown-item" href="./index.php?page=edit_client&id=' . $row['id'] . '">Edit</a>
                          <a class="dropdown-item delete_client" href="javascript:void(0)" data-id="' . $row['id'] . '">Delete</a>';
    $data[] = $row_data;
}

// Prepare response
$response = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => intval($total_filtered),
    "recordsFiltered" => intval($total_filtered),
    "data" => $data
);

echo json_encode($response);
?>
