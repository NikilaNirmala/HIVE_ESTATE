<?php
class PropertyController
{
    // Loads all properties and displays the properties view
    function loadView()
    {
        $this->loadProperties();
        include Helper::absPath('app/views/properties.view.php');
    }

    // Loads all properties from the Property model into the session
    function loadProperties()
    {
        require_once Helper::absPath('app/models/Property.php');
        $_SESSION['props'] = Property::getAllProperties();
    }

    // Loads filtered properties based on search input and displays the properties view
    function loadSearchResults()
    {
        require_once Helper::absPath('app/models/Property.php');
        $_SESSION['props'] = Property::filterProperties($_POST['search_word']);
        include Helper::absPath('app/views/properties.view.php');
    }
}
