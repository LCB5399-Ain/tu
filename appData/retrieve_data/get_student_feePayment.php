<?php

include '../conf.php';

// Set the studentID
if (isset($_POST['studentID']) && is_numeric($_POST['studentID'])) {
$studentID = intval($_POST['studentID']);

// Code adapted from Yassein, 2020
// Retrieve the fee data with studentID
$result = $connect ->query("SELECT * FROM fees WHERE studentID='".$studentID."'");

// Initialize the empty array
$dataResult = array();

// Fetch the data
while ($row = $result ->fetch_assoc()) {
  $dataResult[] = $row;
}

// Use json to send the data
echo json_encode($dataResult);
// End of adapted code

} else {
  // Handle potential errors with prepared statement
  echo json_encode(['error' => 'Database error, please try again later.']);
}

?>
