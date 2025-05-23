<?php
class LogoutController
{
    // Logs the user out by clearing all session variables and redirecting to the home page
    function logout()
    {
        // Unset all session variables
        session_unset();

        // Redirect to the home page
        header("location:home");
    }
}
