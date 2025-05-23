<?php
require_once Helper::absPath("dbconfig.php");
class Property
{

    private string $property_id;
    private string $property_type;
    private string $property_title;
    private int $measurement;
    private float $price;
    private string $user_id;
    private string $property_description;
    private string $location;
    private string $country;

    function __construct(
        string $property_type,
        string $property_title,
        int $measurement,
        float $price,
        string $user_id,
        string $property_description,
        string $country,
        string $location
    ) {
        $this->property_type = $property_type;
        $this->property_title = $property_title;
        $this->measurement = $measurement;
        $this->price = $price;
        $this->user_id = $user_id;
        $this->property_description = $property_description;
        $this->location = $location;
        $this->country = $country;
    }

    static function getUserProperties($uid)
    {
        $pdo = initDB();
        $stmt = $pdo->prepare('SELECT * FROM properties WHERE user_ID = ?');
        $stmt->execute([$uid]);
        $properties = $stmt->fetchAll();
        return $properties;
    }

    function addProperty()
    {
        $pdo = initDB();
        $stmt = $pdo->prepare("INSERT INTO properties (property_type, property_title, measurement, property_price, user_ID, property_description, property_location, property_country) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
        try {
            $result = $stmt->execute([$this->property_type, $this->property_title, $this->measurement, $this->price, $this->user_id, $this->property_description, $this->location, $this->country]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    static function updateProperty($property_title, $measurement, $property_price, $property_id, $property_description)
    {
        $pdo = initDB();
        try {
            $stmt = $pdo->prepare("UPDATE properties set property_title = ?, measurement = ?, property_price = ?, property_description = ? where property_ID = ?");
            $result = $stmt->execute([$property_title, $measurement, $property_price, $property_description, $property_id]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    static function getProperty($pid)
    {
        $pdo = initDB();
        $stmt = $pdo->prepare('SELECT * FROM properties WHERE property_ID = ?');
        $stmt->execute([$pid]);
        $property = $stmt->fetch();
        return $property;
    }

    static function deleteProperty($pid)
    {
        $pdo = initDB();
        $stmt = $pdo->prepare('DELETE from properties where property_ID = ?;');
        $result = $stmt->execute([$pid]);
        if ($result) {
            return true;
        } else {
            false;
        }
    }

    static function getPropertyCount()
    {
        $pdo = initDB();
        $stmt = $pdo->prepare("SELECT COUNT(*) as count from properties;");
        $stmt->execute();
        return $stmt->fetch();
    }

    static function getAllProperties()
    {
        $pdo = initDB();
        $stmt = $pdo->prepare('SELECT * FROM properties;');
        $stmt->execute();
        $property = $stmt->fetchAll();
        return $property;
    }

    static function filterProperties($pattern)
    {
        $pattern = "$pattern%";
        $pdo = initDB();
        $stmt = $pdo->prepare('SELECT * FROM properties where property_title like ? ;');
        $stmt->execute([$pattern]);
        $property = $stmt->fetchAll();
        return $property;
    }
}
