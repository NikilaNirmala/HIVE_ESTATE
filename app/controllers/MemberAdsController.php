<?php
class MemberAdsController
{

    // Loads the member ads view and fetches the user's ads
    function loadView()
    {
        // Fetch the current user's ads and store them in the session
        $this->getMyAds();

        // Include the view file to display the ads
        include Helper::absPath('app/views/memberAds.view.php');
    }

    // Retrieves the properties (ads) for the current user
    function getMyAds()
    {
        // Include the Property model
        require_once Helper::absPath('app/models/Property.php');

        // Get the user's properties using their session ID and store in session
        $_SESSION['myAds'] = Property::getUserProperties($_SESSION['ID']);
    }
}
