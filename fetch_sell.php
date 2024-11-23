<?php
include 'db_connect.php';

$columns = array(
    0 => 'id',
    1 => 'date',
    2 => 'name',
    3 => 'mobile_no',
    4 => 'address',
    5 => 'cash_type',
    6 => 'amount',
    7 => 'gst_amount',
    8 => 'total'
);

// Join sales and clients tables to fetch client's name based on matching ID
$query = "SELECT sales.*, clients.name FROM sales LEFT JOIN clients ON sales.client_id = clients.id";
$query_count = "SELECT COUNT(sales.id) AS total FROM sales LEFT JOIN clients ON sales.client_id = clients.id";
$total_filtered = 0;

// Handle search
if (!empty($_POST['search']['value'])) {
    $search = $conn->real_escape_string($_POST['search']['value']);
    $query .= " WHERE clients.name LIKE '%" . $search . "%' OR sales.mobile_no LIKE '%" . $search . "%' OR sales.address LIKE '%" . $search . "%' OR sales.cash_type LIKE '%" . $search . "%' OR sales.amount LIKE '%" . $search . "%' OR sales.gst_amount LIKE '%" . $search . "%' OR sales.total LIKE '%" . $search . "%'";
    $query_count .= " WHERE clients.name LIKE '%" . $search . "%' OR sales.mobile_no LIKE '%" . $search . "%' OR sales.address LIKE '%" . $search . "%' OR sales.cash_type LIKE '%" . $search . "%' OR sales.amount LIKE '%" . $search . "%' OR sales.gst_amount LIKE '%" . $search . "%' OR sales.total LIKE '%" . $search . "%'";
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
    $row_data['date'] = $row['date'];
    $row_data['name'] = ucwords($row['name']);
    $row_data['mobile_no'] = $row['mobile_no'];
    $row_data['address'] = $row['address'];
    $row_data['cash_type'] = $row['cash_type'];
    $row_data['amount'] = $row['amount'];
    $row_data['gst_amount'] = $row['gst_amount'];
    $row_data['total'] = $row['total'];
    $row_data['action'] = '<a class="dropdown-item view_client" href="javascript:void(0)" data-id="' . $row['id'] . '">View</a>
                          <a class="dropdown-item" href="./index.php?page=edit_sale&id=' . $row['id'] . '">Edit</a>
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
