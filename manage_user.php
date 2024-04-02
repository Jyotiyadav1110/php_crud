<?php
// Include the database connection file
include ('./database/db.php');

// Retrieve all user data from the database
$stmt = $conn->prepare("SELECT * FROM Users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="./css/manage_user.css">
</head>

<body>
    <h1>User Management</h1>

    <!-- Display user data in a table -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Birthday</th>
                <th>Gender</th>
                <th>State</th>
                <th>City</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Education</th>
                <th>Year of Completion</th>
                <th>Profession</th>
                <th>Company Name / Business Name</th>
                <th>Location</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['birthday']; ?></td>
                <td><?php echo $user['gender']; ?></td>
                <td><?php echo $user['state']; ?></td>
                <td><?php echo $user['city']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['mobile']; ?></td>
                <td><?php echo $user['education']; ?></td>
                <td><?php echo $user['yearOfCompletion']; ?></td>
                <td><?php echo $user['profession']; ?></td>

                <td>
                    <?php
    if ($user['profession'] === 'salaried') {
        echo $user['companyname'];
    } elseif ($user['profession'] === 'self-employed') {
        echo $user['businessname'];
    }
    ?>
                </td>
                <td><?php echo $user['location']; ?></td>
                <td>
                    <!-- Edit Button -->
                    <!-- <a href="./includes/edit_user.php?id=<?php echo $user['ID']; ?>">Edit</a> -->

                    <!-- Delete Form -->

                    <button class="delete-btn" data-id="<?php echo $user['id']; ?>">Delete</button>

                </td>
                <!-- Add more columns as needed -->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
// Include database connection or necessary files
// include('./database/db.php');

// Check if ID is provided
if (isset($_POST['id'])) {
    // Sanitize and validate the ID
    $id = $_POST['id'];
    
    try {
        // Prepare SQL statement to delete user
        $stmt = $conn->prepare("DELETE FROM Users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Check if any rows were affected
        if ($stmt->rowCount() > 0) {
            // Send success response to the client
            echo 'success';
        } else {
            // Send error response if no rows were affected
            echo 'error: No rows deleted';
        }
    } catch (PDOException $e) {
        // Handle database errors
        echo 'error: ' . $e->getMessage();
        }
    } else {
        // Send error response if ID is not provided
        echo 'error: ID not provided';
    }
?>



</body>

</html>