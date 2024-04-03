<?php
// Include the database connection file
include ('./database/db.php');

// Retrieve all user data from the database
$stmt = $connection->prepare("SELECT * FROM Users");
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

    <style>
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form {
        display: flex;
        flex-direction: column;
    }

    .form label {
        margin-bottom: 10px;
    }

    .form input,
    .form select,
    .form textarea {
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form button {
        padding: 10px 20px;
        margin-top: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .form button.delete {
        background-color: #ff6961;
        color: #fff;
    }

    .form button.edit {
        background-color: #4682b4;
        color: #fff;
    }

    .form button.update {
        background-color: #32cd32;
        color: #fff;
    }

    .user-details-container {
        width: 80%;
        display: grid;
        grid-template-columns: auto auto auto auto auto;
        /* grid-row-gap: 15px; */
        margin: auto;
    }

    body {
        font-family: Arial, sans-serif;
    }

    h1 {
        text-align: center;
    }

    .user-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .user-box {
        width: 200px;
        height: 200px;
        border: 1px solid #ddd;
        padding: 10px;
        margin: 10px;
        cursor: pointer;
        text-align: center;
        box-shadow: -1px 1px 10px -1px lightgray;
        transition: transform 0.3s ease;
    }

    .transition {
        transform: translateX(300px);
        transition: transform 0.5s ease;
    }

    .user-box:hover {
        transform: scale(1.05);
        background-color: #f5f5f5;
    }

    .user-details {
        display: none;
        padding: 10px;
        border: 1px solid #ddd;
        margin-top: 5px;
        background-color: #f9f9f9;
    }

    .delete-btn {
        background-color: #f44336;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        padding: 8px 12px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    .delete-btn:hover {
        background-color: #d32f2f;
    }
    </style>

</head>

<body>

    <!-- Display user data in a table -->
    <h1>User Management</h1>
    <!-- Display user data in a table -->
    <div class="user-details-container">
        <?php foreach ($users as $user): ?>
        <div class="user-box" data-id="<?php echo $user['id']; ?>">
        <?php echo $user['id']?>
        
            <div><?php echo $user['name']; ?></div>
            <!-- Add more user data as needed -->
        </div>
        <?php endforeach; ?>
        <div><a href="./index.php">Add more Form</a></div>
    </div>

    <!-- JavaScript to toggle visibility of user details form -->
    <script>
        
    document.addEventListener("DOMContentLoaded", function() {
        // Get all user boxes
        const userBoxes = document.querySelectorAll(".user-box");

        // Add click event listener to each user box
        userBoxes.forEach(function(userBox) {
            userBox.addEventListener("click", function() {
                // Get the ID of the clicked user box
                const userId = userBox.getAttribute("data-id");
                // Redirect to form_details.php with the user ID as a query parameter
                window.location.href = "./form_details.php?id=" + userId;
            });
        });
    });

    $(document).ready(function() {
        $('.user-box').on('click', function() {
            $(this).toggleClass('transition');
        });
    });

    // JavaScript to show/hide user details
    // const userBoxes = document.querySelectorAll('.user-box');
    // userBoxes.forEach(userBox => {
    //     userBox.addEventListener('click', () => {
    //         const userId = userBox.getAttribute('data-id');
    //         const userDetails = document.getElementById('user-details-' + userId);
    //         if (userDetails.style.display === 'none') {
    //             userDetails.style.display = 'block';
    //         } else {
    //             userDetails.style.display = 'none';
    //         }
    //     });
    // });

    // JavaScript to handle delete button click
    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(deleteButton => {
        deleteButton.addEventListener('click', (event) => {
            event.stopPropagation(); // Prevent box click event
            const userId = deleteButton.getAttribute('data-id');
            // Make AJAX request to delete user with the specified ID
            // Example AJAX request using Fetch API:
            fetch('delete_user.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        id: userId
                    }),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.text())
                .then(data => {
                    // Handle response from server
                    if (data === 'success') {
                        // User deleted successfully
                        // Remove the user box from the container
                        const userBox = document.querySelector('.user-box[data-id="' + userId +
                            '"]');
                        if (userBox) {
                            userBox.remove();
                        }
                    } else {
                        // Error deleting user
                        console.error('Error: ' + data);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
    </script>
</body>

</html>