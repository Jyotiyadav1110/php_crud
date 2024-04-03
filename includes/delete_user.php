<?php
// Include database connection or necessary files
include('../database/db.php');

// Check if ID is provided
if (isset($_POST['id'])) {
    // Sanitize and validate the ID
    $id = $_POST['id'];
    
    try {
        // Prepare SQL statement to delete user
        $stmt = $connection->prepare("DELETE FROM Users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Send success response to the client
        echo 'success';
    } catch (PDOException $e) {
        // Handle database errors
        echo 'error delete';
    }
} else {
    // Send error response if ID is not provided
    echo 'error dd';
}
?>
