<?php
/**
 * Created by PhpStorm.
 * User: Aron
 * Date: 29.2.2016
 * Time: 14:44
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

    public function register($uname,$fname,$umail,$unumber,$upass)
    {
        try
        {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);
            $id = time();

            $stmt = $this->conn->prepare("INSERT INTO users(id, username, fname, email, phonenumber, password)
		                                               VALUES(:id, :uname, :fname, :umail, :unumber, :upass)");

            $stmt->bindParam(":id", $id);
            $stmt->bindparam(":uname", $uname);
            $stmt->bindParam(":fname", $fname);
            $stmt->bindparam(":umail", $umail);
            $stmt->bindParam(":unumber", $unumber);
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
            $stmt = $this->conn->prepare("SELECT id, username, email, password, admin FROM users WHERE username=:uname OR email=:umail ");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1)
            {
                if(password_verify($upass, $userRow['password']))
                {
                    if($userRow['admin'] = 'yes'){
                        $_SESSION['admin'] = $userRow['id'];
                        return true;
                    }else{
                        $_SESSION['user'] = $userRow['id'];
                        return true;
                    }
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

    public function is_loggedin()
    {
        if(isset($_SESSION['user'])){
            return true;
        }elseif(isset($_SESSION['admin'])){
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function doLogout()
    {
        session_destroy();
        unset($_SESSION['user']);
        unset($_SESSION['admin']);
        return true;
    }

}