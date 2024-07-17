<?php
// Include the database connection file
include 'conn.php';

// Check if PubChem ID is provided via GET request
if(isset($_GET['pubchem_id'])) {
    // Sanitize and store the PubChem ID
    $pubchem_id = $_GET['pubchem_id'];
    
    // Query to retrieve data based on PubChem ID
    $sql = "SELECT * FROM adme_table WHERE `PubChem ID` = '$pubchem_id'";
    
    // Execute the query
    $result = mysqli_query($conn, $sql);
    
    // Check if any rows are returned
    if(mysqli_num_rows($result) > 0) {
        // Fetch the data as an associative array
        $data = mysqli_fetch_assoc($result);
        
        // Display the data
        // You can format this as HTML or JSON depending on how you want to use it
        //echo json_encode($data);
    } else {
        echo "No data found for PubChem ID: $pubchem_id";
    }
} else {
    echo "PubChem ID not provided.";
}

// Close the database connection
mysqli_close($conn);
?>
