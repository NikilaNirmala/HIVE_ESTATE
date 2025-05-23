<?php
class DeletePropertyController
{
    // Controller method to handle property deletion
    function deleteProperty()
    {
        // Include the Property model and database configuration
        require_once Helper::absPath('app/models/Property.php');
        require_once Helper::absPath('dbconfig.php');

        // Get the property ID from the POST request
        $pid = $_POST['property_ID'];

        // Call the model method to delete the property
        Property::deleteProperty($pid);

        // Redirect the user to the 'my_ads' page after deletion
        header('location:my_ads');
    }
}
