<?php
include 'db_connect.php';

// Define the columns you want to fetch
$columns = array(
    0 => 'id',
    1 => 'name',
    2 => 'email',
    3 => 'type'
);

$sql = "SELECT *, concat(firstname, ' ', lastname) as name FROM users";
$totalData = $conn->query($sql)->num_rows;
$totalFiltered = $totalData;

// Search functionality
if (!empty($_POST['search']['value'])) {
    $searchValue = $_POST['search']['value'];
    $sql .= " WHERE (firstname LIKE '%$searchValue%' ";
    $sql .= " OR lastname LIKE '%$searchValue%' ";
    $sql .= " OR email LIKE '%$searchValue%')";
}

// Order functionality
$columnIndex = $_POST['order'][0]['column']; 
$orderColumn = $columns[$columnIndex];
$orderDir = $_POST['order'][0]['dir'];
$sql .= " ORDER BY " . $orderColumn . " " . $orderDir;

// Pagination
$start = $_POST['start'];
$length = $_POST['length'];
$sql .= " LIMIT " . $start . ", " . $length;

$query = $conn->query($sql);
$data = array();

while ($row = $query->fetch_assoc()) {
    $nestedData = array();
    $nestedData[] = $row['id'];
    $nestedData[] = ucwords($row['name']);
    $nestedData[] = $row['email'];
    $nestedData[] = ($row['type'] == 1) ? 'Admin' : 'Staff';
    $nestedData[] = '<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        Action
                     </button>
                     <div class="dropdown-menu">
                        <a class="dropdown-item view_user" href="javascript:void(0)" data-id="'.$row['id'].'">View</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./index.php?page=edit_user&id='.$row['id'].'">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item delete_user" href="javascript:void(0)" data-id="'.$row['id'].'">Delete</a>
                     </div>';
    $data[] = $nestedData;
}

$json_data = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => intval($totalData),
    "recordsFiltered" => intval($totalFiltered),
    "data" => $data
);

echo json_encode($json_data);
?>
