<?php
class AdminAdsManageController
{
    function loadView()
    {
        $this->loadAds();
        include Helper::absPath('app/views/adminAdsManage.view.php');
    }

    // Loads all ads and stores them in session
    function loadAds()
    {
        require_once Helper::absPath('app/models/Property.php');
        $properties = Property::getAllProperties();
        $_SESSION['all_properties'] = $properties;
    }

    function removeAd()
    {
        require_once Helper::absPath('app/models/Property.php');

        $result = Property::deleteProperty($_POST['ad_id']);
        if ($result) {
            header("location:ads_manage");
        }
    }
}
