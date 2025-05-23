<?php
require_once Helper::absPath("dbconfig.php");
class User
{
    private string $username;
    private string $email;
    private string $password;
    private string $role;
    private string $phoneNo;
    private string $status;
    private string $gender;
    private static $db;

    function __construct($username, $password, $email, $role)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        self::$db = initDB();
    }


    function addUser()
    {
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt = self::$db->prepare('INSERT into Users (username, user_email, user_password, user_role) values(?, ?, ?, ?)');
        try {
            $stmt->execute([$this->username, $this->email, $hashedPassword, $this->role]);
            // echo "User registered successfully.";
            header('location:home');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function userExists($username)
    {
        $stmt = self::$db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            return true;
        } else {
            return false;
        }
    }

    function login()
    {
        require_once Helper::absPath('dbconfig.php');
        $db = initDB();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ? and user_role = ?");
        $stmt->execute([$this->username, $this->role]);
        $user = $stmt->fetch();
        if ($user) {
            return $user;
        } else {
            return false;
        }
    }

    static function updateUser($id, $email, $username, $phoneNo, $gender)
    {
        $db = initDB();
        $stmt = $db->prepare("UPDATE Users set username = ?, user_email = ?, user_gender = ?, phone_number = ? where user_ID = ?");
        $result = $stmt->execute([$username, $email, $gender, $phoneNo, $id]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    static function getUserCount($role)
    {
        $pdo = initDB();
        $stmt = $pdo->prepare("SELECT COUNT(*) as count from Users where user_role = ? ;");
        $stmt->execute([$role]);
        return $stmt->fetch();
    }

    static function getUsers()
    {
        $pdo = initDB();
        $stmt = $pdo->prepare("SELECT * from Users where user_role = 'agent' or user_role = 'member' ;");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    static function updateToBlock($user_id)
    {

        $pdo = initDB();
        $stmt = $pdo->prepare("UPDATE Users SET user_status = ? where user_ID = ? ;");
        $result = $stmt->execute(['blocked', $user_id]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    static function updateToActive($user_id)
    {
        $pdo = initDB();
        $stmt = $pdo->prepare("UPDATE Users SET user_status = ? where user_ID = ? ;");
        $result = $stmt->execute(['active', $user_id]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
