<?php
class MemberRequestController
{
    // Loads the member request agent view
    function loadView()
    {
        // Include the view file for member request agent
        include Helper::absPath('app/views/memberRequestAgent.view.php');
    }

    // Handles the creation of a new member request
    function createRequest()
    {
        // Include the Request model
        require_once Helper::absPath('app/models/Request.php');

        // Retrieve form data from POST request
        $name = $_POST['name'];
        $email = $_POST['email'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        // Create a new Request object with the form data
        $request = new Request($name, $email, $title, $description);

        // Attempt to add the request to the database
        $result = $request->addRequest();

        if ($result) {
            // If successful, set a success message and redirect
            $_SESSION['Message'] = 'Message successfully sent to agents!';
            header('location:request_agent');
        } else {
            // If failed, return false
            return false;
        }
    }
}
