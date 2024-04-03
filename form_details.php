<?php
include("./database/db.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }

    .user-details {
        max-width: 600px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .user-details form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 10px;
    }

    .user-details label {
        font-weight: bold;
    }

    .user-details input[type="text"],
    .user-details input[type="date"],
    .user-details input[type="email"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .user-details button {
        padding: 10px 20px;
        background-color: #eb5160;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .user-details button:hover {
        background-color: #c63f4f;
    }
    </style>

</head>

<body>
    <?php
// Assuming you're using PHP and MySQL to fetch user details
if (isset($_GET['id'])) {
    // Database connection parameters
    $dsn = 'mysql:host=localhost;dbname=crud_database';
    $username = 'root';
    $password = '';

    try {
        // Attempt to create a PDO instance
        $pdo = new PDO($dsn, $username, $password);
        // Set PDO to throw exceptions on error
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $userId = $_GET['id'];
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if user exists
        if ($user) {
            echo "User ID: " . $user['id'] . "<br>";
            echo "Name: " . $user['name'] . "<br>";
            // Display more user data as needed
        } else {
            echo "User not found";
        }
    } catch (PDOException $e) {
        // Handle database connection error
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo "No user ID provided";
}
?>





    <div class="user-details">
        <form>
            <label for="user-id">ID:</label>
            <input type="text" id="user-id" value="<?php echo $user['id']; ?>" disabled>

            <label for="user-name">Name:</label>
            <input type="text" id="user-name" value="<?php echo $user['name']; ?>" disabled>

            <label for="user-birthday">Date of Birth:</label>
            <input type="date" id="user-birthday" value="<?php echo $user['birthday']; ?>" disabled>

            <label for="user-gender">Gender:</label>
            <input type="text" id="user-gender" value="<?php echo $user['gender']; ?>" disabled>

            <label for="user-state">State:</label>
            <input type="text" id="user-state" value="<?php echo $user['state']; ?>" disabled>

            <label for="user-education">Education:</label>
            <input type="text" id="user-education" value="<?php echo $user['education']; ?>" disabled>

            <label for="user-business">Business:</label>

            <label for="user-certification">Certification:</label>

            <label for="user-email">Email:</label>
            <input type="email" id="user-email" value="<?php echo $user['email']; ?>" disabled>

            <label for="user-mobile">Mobile:</label>
            <input type="text" id="user-mobile" value="<?php echo $user['mobile']; ?>" disabled>
        </form>
        <!-- Delete Button -->
        <button class="delete-btn" data-id="<?php echo $user['id']; ?>">Delete</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
 $(document).ready(function() {
    $(".delete-btn").click(function() {
        var userId = $(this).data("id");
        console.log("User ID:", userId); // Log the user ID
        
        if (confirm("Are you sure you want to delete this record?")) {
            $.ajax({
                url: "./includes/delete_user.php",
                type: "POST",
                data: {id: userId},
                success: function(response) {
                    console.log("Response:", response); // Log the response
                    alert(response);
                    window.history.back();
                    // Optionally reload the page or update the UI as needed
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});

    </script>


</body>

</html>