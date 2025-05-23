<?php
class addPropertyController
{

    function loadView()
    {
        include Helper::absPath('app/views/addProperty.view.php');
    }

    function addProperty()
    {
        require_once Helper::absPath('app/models/Property.php');
        $userID = $_SESSION['ID'];
        $property_type = $_POST['property_type'] ?? '';
        $property_title = $_POST['property_title'] ?? '';
        $measurement = (int)$_POST['measurement'] ?? 1;
        // Get price from POST data, default to 1.00 if not set
        $price = (float)$_POST['price'] ?? 1.00;
        $property_description = $_POST['property_description'] ?? '';
        $location = $_POST['location'] ?? '';
        $country = $_POST['country'] ?? "";

        $property = new Property($property_type, $property_title, $measurement, $price, $userID, $property_description, $country, $location);
        $result = $property->addProperty();
        if ($result) {
            header('location:my_ads');
        } else {
            $_SESSION['Message'] = "Failed to add property.";
            $this->loadView();
        }
    }
}
