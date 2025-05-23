<?php
class AgentRequestsController
{

    // Loads the agent request view and fetches member requests
    function loadView()
    {
        $this->getMemberRequests();
        // Include the view file for displaying agent requests
        include Helper::absPath('app/views/agentRequest.view.php');
    }

    // Retrieves member requests from the database and stores them in the session
    function getMemberRequests()
    {
        // Include the Request model
        require_once Helper::absPath('app/models/Request.php');
        // Fetch all requests
        $requests = Request::getRequests();
        // Store requests in session for later use
        $_SESSION['requests'] = $requests;
    }

    // Deletes a specific request based on the provided request ID
    function deleteRequest()
    {
        // Include the Request model
        require_once Helper::absPath('app/models/Request.php');
        // Remove the request with the given ID from POST data
        $result = Request::removeRequest($_POST['req_id']);
        // If deletion is successful, redirect to the requests page
        if ($result) {
            header('location:show_req');
        }
    }
}
