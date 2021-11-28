<?php
class AdminModel extends DB
{
    public function getAdminByAccount($account)//username and password
    {
        if($account)
        {
            $username = $account['username'];
            $password = $password = md5($account['password']);

            $sql = "SELECT * FROM employee WHERE username='$username' AND pwd='$password'";
            return mysqli_query($this->conn, $sql);
        }
        else
        {
            return False;
        }
    }

    public function getAdminById($id)
    {
        $sql = "SELECT * FROM employee where id='$id'";
        return mysqli_query($this->conn, $sql);
    }

    public function updateAdminInfoByID($adminInfo)
    {
        $id = $adminInfo["id"];
        $fname = $adminInfo["fname"];
        $lname = $adminInfo["lname"];
        $email = $adminInfo["email"];
        $phone = $adminInfo["phone"];

        $sql = "UPDATE employee
                SET fname='$fname', lname='$lname', email='$email', phone='$phone'
                WHERE id='$id';";
        return mysqli_query($this->conn, $sql);
    }

    public function updateAdminAccountByID($adminAccount)
    {
        $id = $adminAccount["id"];
        $password = $adminAccount["password"];

        $sql = "UPDATE employee
                SET pwd='$password'
                WHERE id='$id';";
        return mysqli_query($this->conn, $sql);
    }
    
}

?>