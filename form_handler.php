<?php
// Include the database connection file
include ('./database/db.php');

// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare SQL statement to insert data into Users table
// Retrieve all form fields
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$state = $_POST['state'];
$city = $_POST['city'];
$profilePhoto = ""; // Placeholder for now, you'll handle file upload separately
$profession = $_POST['profession'];
$companyName = isset($_POST['company_name']) ? $_POST['company_name'] : "";
$jobStartedFrom = isset($_POST['job_started_from']) ? $_POST['job_started_from'] : "";
$businessName = isset($_POST['business_name']) ? $_POST['business_name'] : "";
$location = isset($_POST['location']) ? $_POST['location'] : "";
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$education = isset($_POST['education']) ? implode(',', $_POST['education']) : "";
$yearOfCompletion = isset($_POST['year_of_completion']) ? implode(',', $_POST['year_of_completion']) : "";
$skills = isset($_POST['skills']) ? implode(',', $_POST['skills']) : "";
$certificateFilePath = ""; // Placeholder for now, you'll handle file upload separately

try {
// Prepare SQL statement to insert data into Users table
$stmt = $conn->prepare("INSERT INTO Users (Name, Birthday, Gender, State, City, ProfilePhoto, Profession, CompanyName, JobStartedFrom, BusinessName, Location, Email, Mobile, Education, YearOfCompletion, Skills, CertificateFilePath) VALUES (:name, :birthday, :gender, :state, :city, :profilePhoto, :profession, :companyName, :jobStartedFrom, :businessName, :location, :email, :mobile, :education, :yearOfCompletion, :skills, :certificateFilePath)");

// Bind parameters
$stmt->bindParam(':name', $name);
$stmt->bindParam(':birthday', $birthday);
$stmt->bindParam(':gender', $gender);
$stmt->bindParam(':state', $state);
$stmt->bindParam(':city', $city);
$stmt->bindParam(':profilePhoto', $profilePhoto);
$stmt->bindParam(':profession', $profession);
$stmt->bindParam(':companyName', $companyName);
$stmt->bindParam(':jobStartedFrom', $jobStartedFrom);
$stmt->bindParam(':businessName', $businessName);
$stmt->bindParam(':location', $location);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':mobile', $mobile);
$stmt->bindParam(':education', $education);
$stmt->bindParam(':yearOfCompletion', $yearOfCompletion);
$stmt->bindParam(':skills', $skills);
$stmt->bindParam(':certificateFilePath', $certificateFilePath);


    // Execute the query
    $stmt->execute();


        // Optionally, you can redirect the user to a success page
        header("Location: index.php");
        exit;
 } catch(PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
} else {
    // If the form is not submitted using POST method, redirect the user to the form page
    header("Location: index.php");
    exit;
}
?>