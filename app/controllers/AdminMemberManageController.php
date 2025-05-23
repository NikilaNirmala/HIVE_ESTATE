<?php
class AdminMemberManageController
{
    // Loads the member management view and member information
    function loadView()
    {
        $this->loadMemberInfo();
        include Helper::absPath('app/views/adminMemberManage.view.php');
    }

    // Loads all user information into the session
    function loadMemberInfo()
    {
        require_once Helper::absPath('app/models/User.php');
        $_SESSION['user_info']  = User::getUsers();
    }

    // Blocks a user by updating their status
    function blockUser()
    {
        require_once Helper::absPath('app/models/User.php');
        $user_id = $_POST['uid'];
        User::updateToBlock($user_id);
        // Redirects back to the member management page
        header("location:member_manage");
    }

    // Unblocks a user by updating their status
    function unblockUser()
    {
        require_once Helper::absPath('app/models/User.php');
        $user_id = $_POST['uid'];
        User::updateToActive($user_id);
        // Redirects back to the member management page
        header("location:member_manage");
    }
}
