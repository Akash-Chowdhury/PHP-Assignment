<?php
$conn = mysqli_connect('localhost','root','','test');
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['delete_all_data'])) {

    $sql = "DELETE FROM ai";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Data deleted Successfully";
    } else {
        echo "Error deleting data: " . $conn->error;
    }
}
?>