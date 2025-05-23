<?php
session_start();
require_once './helper.php';
require_once Helper::absPath('routes/Router.php');
// include Helper::absPath('dbconfig.php');
/**
 * Main entry point for the Hive App.
 * 
 * - Starts session and loads required helpers.
 * - Sets up routing for different controllers and actions.
 * - Handles role-based route registration.
 * - Executes the appropriate controller based on the request URI and method.
 */

// Start session and load helper files
// (session_start and require_once already called above)

// Initialize the router
$router  = new Router();
$router->addRoute('home', Helper::absPath('app/controllers/HomeController.php'), 'GET', 'loadView', 'HomeController');
$router->addRoute('about', Helper::absPath('app/controllers/AboutController.php'), 'GET', 'loadView', 'AboutController');
$router->addRoute('property', Helper::absPath('app/controllers/PropertyController.php'), 'GET', 'loadView', 'PropertyController');
$router->addRoute('search_property', Helper::absPath('app/controllers/PropertyController.php'), 'POST', 'loadSearchResults', 'PropertyController');
$router->addRoute('', Helper::absPath('app/controllers/HomeController.php'), 'GET', 'loadView', 'HomeController');
$router->addRoute('signup', Helper::absPath('app/controllers/SignupController.php'), 'GET', 'loadView', 'SignupController');
$router->addRoute('signup', Helper::absPath('app/controllers/SignupController.php'), 'POST', 'addAccount', 'SignupController');
$router->addRoute('login', Helper::absPath('app/controllers/LoginController.php'), 'GET', 'loadView', 'LoginController');
$router->addRoute('login', Helper::absPath('app/controllers/LoginController.php'), 'POST', 'validateAndLogin', 'LoginController');
$router->addRoute('logout', Helper::absPath('app/controllers/LogoutController.php'), 'GET', 'logout', 'LogoutController');

$role = $_SESSION['role'] ?? "";
// Member routes
if ($role == 'member') {
    $router->addRoute('user_profile', Helper::absPath('app/controllers/MemberProfileController.php'), 'GET', 'loadView', 'MemberProfileController');
    $router->addRoute('update_info', Helper::absPath('app/controllers/MemberProfileController.php'), 'POST', 'updateInfo', 'MemberProfileController');
    $router->addRoute('my_ads', Helper::absPath('app/controllers/MemberAdsController.php'), 'GET', 'loadView', 'MemberAdsController');
    $router->addRoute('add_property', Helper::absPath('app/controllers/AddPropertyController.php'), 'GET', 'loadView', 'AddPropertyController');
    $router->addRoute('post_property', Helper::absPath('app/controllers/AddPropertyController.php'), 'POST', 'addProperty', 'AddPropertyController');
    $router->addRoute('update_property', Helper::absPath('app/controllers/UpdatePropertyController.php'), 'POST', 'loadView', 'UpdatePropertyController');
    $router->addRoute('submit_update', Helper::absPath('app/controllers/UpdatePropertyController.php'), 'POST', 'updatePropertyInfo', 'UpdatePropertyController');
    $router->addRoute('delete_property', Helper::absPath('app/controllers/DeletePropertyController.php'), 'POST', 'deleteProperty', 'DeletePropertyController');
    $router->addRoute('request_agent', Helper::absPath('app/controllers/MemberRequestController.php'), 'GET', 'loadView', 'MemberRequestController');
    $router->addRoute('submit_request', Helper::absPath('app/controllers/MemberRequestController.php'), 'POST', 'createRequest', 'MemberRequestController');
} else if ($role == 'agent') {
    // Agent routes
    $router->addRoute('user_profile', Helper::absPath('app/controllers/AgentProfileController.php'), 'GET', 'loadView', 'AgentProfileController');
    $router->addRoute('update_info', Helper::absPath('app/controllers/AgentProfileController.php'), 'POST', 'updateInfo', 'AgentProfileController');
    $router->addRoute('show_req', Helper::absPath('app/controllers/AgentRequestsController.php'), 'GET', 'loadView', 'AgentRequestsController');
    $router->addRoute('delete_req', Helper::absPath('app/controllers/AgentRequestsController.php'), 'POST', 'deleteRequest', 'AgentRequestsController');
} else if ($role == 'admin') {
    // Admin routes
    $router->addRoute('admin_profile', Helper::absPath('app/controllers/AdminDashboardController.php'), 'GET', 'loadView', 'AdminDashboardController');
    $router->addRoute('member_manage', Helper::absPath('app/controllers/AdminMemberManageController.php'), 'GET', 'loadView', 'AdminMemberManageController');
    $router->addRoute('block_user', Helper::absPath('app/controllers/AdminMemberManageController.php'), 'POST', 'blockUser', 'AdminMemberManageController');
    $router->addRoute('unblock_user', Helper::absPath('app/controllers/AdminMemberManageController.php'), 'POST', 'unblockUser', 'AdminMemberManageController');
    $router->addRoute('ads_manage', Helper::absPath('app/controllers/AdminAdsManageController.php'), 'GET', 'loadView', 'AdminAdsManageController');
    $router->addRoute('remove_ad', Helper::absPath('app/controllers/AdminAdsManageController.php'), 'POST', 'removeAd', 'AdminAdsManageController');
}

$serverUri = $_SERVER['REQUEST_URI'];
$serverMethod = $_SERVER['REQUEST_METHOD'];
$uriArray = explode('/', $serverUri);
// var_dump($uriArray);

$router->executeController($uriArray[2], $serverMethod);
