<?php
/**
 * Created by PhpStorm.
 * User: 0712982139
 * Date: 27.4.2016
 * Time: 08:47
 */
require_once('config.php');
class USER
{
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }
    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }
    public function register($uname,$umail,$upass)
    {
        try
        {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);
            $id = time();
            $stmt = $this->conn->prepare("INSERT INTO users(id, username, email, password)
		                                               VALUES(:id, :uname, :umail, :upass)");
            $stmt->bindParam(":id", $id);
            $stmt->bindparam(":uname", $uname);
            $stmt->bindparam(":umail", $umail);
            $stmt->bindparam(":upass", $new_password);
            $stmt->execute();
            return $stmt;


        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function doLogin($uname,$umail,$upass)
    {
        try
        {
            $stmt = $this->conn->prepare("SELECT id, username, email, password FROM users WHERE username=:uname OR email=:umail ");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1)
            {
                if(password_verify($upass, $userRow['password']))
                {
                    $_SESSION['user_session'] = $userRow['id'];
                    return true;
                }
                else
                {
                    return false;
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function redirect($url)
    {
        header("Location: $url");
    }
    public function doLogout()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

}