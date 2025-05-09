<?php
include '../include/config.php'; 

header('Content-Type: application/json');

$sql = "SELECT * FROM etudiants"; 
$result = $conn->query($sql);

$students = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

echo json_encode($students);
?>