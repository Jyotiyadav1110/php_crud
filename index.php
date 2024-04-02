
<?php
// Establish database connection
include('./database/db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>


    <div class="container">
    <form action="form_handler.php" method="POST" enctype="multipart/form-data" class="form" id="registrationForm">
            <label>Name:</label>
            <input type="text" name="name" required><br><br>

            <label>Birthday:</label>
            <input type="date" name="birthday" required><br><br>

            <label>Gender:</label>
            <input type="radio" name="gender" value="Male" required>Male
            <input type="radio" name="gender" value="Female" required>Female
            <input type="radio" name="gender" value="Other" required>Other<br><br>

            <label for="state">State:</label>
            <select name="state" id="state" required>
                <option value="">Select State</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Delhi">Delhi</option>
                <option value="Puducherry">Puducherry</option>
            </select><br><br>


            <label for="city">City:</label>
            <select name="city" id="city" required>
                <option value="">Select City</option>
            </select>
            <br><br>

            <div id="education_fields">
                <label>Education and Year of Completion:</label>
                <div>
                    <input type="text" name="education[]" placeholder="Education" required>
                    <input type="text" name="year_of_completion[]" placeholder="Year of Completion" required>
                    <button type="button" onclick="addEducationField()">Add More</button>
                </div>
            </div><br>

            <label>Profile Photo:</label>
            <input type="file" name="profile_photo" accept="image/*" required><br><br>

            <label>Skill:</label>
            <select name="skills[]" multiple="multiple" class="select2">
                <!-- Use select2 plugin for better UI and multiple selection -->
            </select><br><br>

            <label>Upload Certificates:</label>
            <input type="file" name="certificates[]" multiple="multiple" required><br><br>

            <label>Profession:</label><br>
            <input type="radio" name="profession" value="Salaried" required onclick="showHideFields()">Salaried
            <input type="radio" name="profession" value="Self-employed" required
                onclick="showHideFields()">Self-employed<br><br>

            <div id="salaried_fields" style="display: none;">
                <label>Company Name:</label>
                <input type="text" name="company_name"><br><br>

                <label>Job Started From:</label>
                <input type="date" name="job_started_from"><br><br>
            </div>

            <div id="self_employed_fields" style="display: none;">
                <label>Business Name:</label>
                <input type="text" name="business_name"><br><br>

                <label>Location:</label>
                <input type="text" name="location"><br><br>
            </div>

            <label>Email ID:</label>
            <input type="email" name="email" required><br><br>

            <label>Mobile No:</label>
            <input type="text" name="mobile" required><br><br>

            <button type="submit" value="Submit" name="submit">Submit</button>
        </form>
    </div>


    <script src="./js/script.js"></script>
</body>
</html>