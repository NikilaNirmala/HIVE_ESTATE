<?php
class LoginController
{
    // Loads the login view
    function loadView()
    {
        include Helper::absPath('app/views/login.view.php');
    }

    // Validates user input and attempts to log in the user
    function validateAndLogin()
    {
        require_once Helper::absPath('app/models/User.php');

        // Validate username and password inputs
        $uname = $this->validateInput($_POST['username'], 'username');
        $pass = $this->validateInput($_POST['password'], 'password');
        $role = $_POST['role'];

        // Create a new User object and attempt login
        $user = new User($uname, '', $pass, $role);
        $user = $user->login();

        if ($user) {
            // Verify the password hash
            if (password_verify($pass, $user['user_password'])) {
                // Regenerate session ID for security
                session_regenerate_id();

                // Store user information in session
                $_SESSION['ID'] = $user['user_ID'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['user_email'];
                $_SESSION['password'] = $user['user_password'];
                $_SESSION['role'] = $user['user_role'];
                $_SESSION['gender'] = $user['user_gender'] ?? 'none';
                $_SESSION['phoneNo'] = $user['phone_number'] ?? '';

                // Redirect based on user role
                if ($_SESSION['role'] == 'admin') {
                    header("location:admin_profile");
                } else if ($_SESSION['role'] == 'agent') {
                    header("location:user_profile");
                } else {
                    header("location:home");
                }

                exit;
            } else {
                // Invalid password
                $_SESSION['Message'] = "Invalid Password!";
                $this->loadView();
            }
        } else {
            // No user found
            $_SESSION['Message'] = "No such user found!";
            $this->loadView();
        }
    }

    // Validates and sanitizes input based on type
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
                // Sanitize and validate email
                $input = filter_var($input, FILTER_SANITIZE_EMAIL);
                return filter_var($input, FILTER_VALIDATE_EMAIL) ? $input : false;

            case 'password':
                // Sanitize password and check length
                $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
                return strlen($input) >= 8 ? $input : false;

            default:
                return false;
        }
    }
}
