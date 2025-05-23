<?php
require_once Helper::absPath('dbconfig.php');

class Request
{
    private int $request_id;
    private string $requester_name;
    private string $requester_email;
    private string $request_title;
    private string $request_description;

    function __construct($requester_name, $requester_email, $request_title, $request_description)
    {
        $this->requester_name = $requester_name;
        $this->requester_email = $requester_email;
        $this->request_title = $request_title;
        $this->request_description = $request_description;
    }

    static function getRequests()
    {
        $pdo = initDB();
        $stmt = $pdo->prepare('SELECT * FROM requests;');
        $stmt->execute();
        $my_requests = $stmt->fetchAll();
        return $my_requests;
    }

    function addRequest()
    {
        $pdo = initDB();
        $stmt = $pdo->prepare("INSERT INTO requests (requester_name, requester_email, request_title, request_description) VALUES (?, ?, ?, ?)");
        $result = $stmt->execute([$this->requester_name, $this->requester_email, $this->request_title, $this->request_description]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    static function removeRequest($request_id)
    {
        $pdo = initDB();
        $stmt = $pdo->prepare('DELETE FROM requests where request_id = ?');
        $result = $stmt->execute([$request_id]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
