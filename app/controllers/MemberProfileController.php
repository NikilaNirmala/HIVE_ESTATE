<?php
class MemberProfileController
{
    // Loads the member profile view
    function loadView()
    {
        include Helper::absPath('app/views/memberProfile.view.php');
    }

    // Updates user information based on form submission
    function updateInfo()
    {
        $user_id = $_SESSION['ID']; // Get current user ID from session

        // Validate and sanitize input fields
        $username = $this->validateInput($_POST['username'], 'username');
        $email = $this->validateInput($_POST['email'], 'email');
        $gender = $_POST['gender'];
        $phone = $_POST['phoneNo'];

        // Load User model
        require_once Helper::absPath('app/models/User.php');

        // Update user information in the database
        $result = User::updateUser($user_id, $email, $username, $phone, $gender);

        // If update is successful, set a success message and redirect
        if ($result) {
            $_SESSION['Message'] = "Update Successsful.";
            header("location:user_profile");
        }
    }

    // Validates and sanitizes user input based on type
    function validateInput($input, $type)
    {
        $input = trim($input);

        switch ($type) {
            case 'username':
                // Allow only alphanumeric characters and underscores, 3-20 characters
                if (preg_match('/^[a-zA-Z0-9_]{3,20}$/', $input)) {
                    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
                }
                return false;

            case 'email':
                // Sanitize and validate email address
                $input = filter_var($input, FILTER_SANITIZE_EMAIL);
                return filter_var($input, FILTER_VALIDATE_EMAIL) ? $input : false;

            case 'password':
                // Remove whitespace and sanitize special characters
                $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
                return strlen($input) >= 8 ? $input : false;

            default:
                return false;
        }
    }
}
