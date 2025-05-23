<?php
class AdminDashboardController
{
    function loadView()
    {
        $this->getDashboardInfo();
        include Helper::absPath('app/views/adminOverview.view.php');
    }

    function getDashboardInfo()
    {
        require_once Helper::absPath('app/models/User.php');
        require_once Helper::absPath('app/models/Property.php');
        // Include model files for User and Property
        require_once Helper::absPath('app/models/User.php');
        require_once Helper::absPath('app/models/Property.php');

        // Retrieve the total number of admin users from the database
        $admin_count = User::getUserCount('admin')['count'];

        // Retrieve the total number of member users from the database
        // Retrieve the total number of agent users from the database
        $member_count = User::getUserCount('member')['count'];
        $agent_count = User::getUserCount('agent')['count'];
        $property_count = Property::getPropertyCount()['count'];
        $_SESSION['admin_count'] = $admin_count;
        $_SESSION['member_count'] = $member_count;
        $_SESSION['agent_count'] = $agent_count;
        $_SESSION['property_count'] = $property_count;
    }
}
