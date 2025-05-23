<?php
class HomeController
{
    function loadView()
    {
        include_once Helper::absPath('app/views/home.view.php');
    }
}
