<?php
class AgentProfileController
{
    function loadView()
    {
        include Helper::absPath('app/views/agentProfile.view.php');
    }
    function updateInfo()
    {
        // Start of updateInfo function
        $user_id = $_SESSION['ID'];
        $username = $this->validateInput($_POST['username'], 'username');
        $email = $this->validateInput($_POST['email'], 'email');
        $gender = $_POST['gender'];
        $phone = $_POST['phoneNo'];
        require_once Helper::absPath('app/models/User.php');
        $result = User::updateUser($user_id, $email, $username, $phone, $gender);
        if ($result) {
            $_SESSION['Message'] = "Update Successsful.";
            header("location:user_profile");
        }
    }


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
