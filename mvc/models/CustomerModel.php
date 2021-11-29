<?php
class CustomerModel extends DB
{
    public function getAllCustomers()
    {
        $sql = "SELECT * FROM customer";
        return mysqli_query($this->conn, $sql);

        // $customers = array();
        // while($row = mysqli_fetch_array($rows))
        // {
        //     $customers[] = $row;
        // }
        // return json_encode($customers);
    }

    public function getCustomeById($id)
    {
        $sql = "SELECT * FROM customer where id='$id'";
        return mysqli_query($this->conn, $sql);
    }

    public function getCustomerByAccount($account)//username and password
    {
        if($account)
        {
            $username = $account['username'];
            $password = $password = md5($account['password']);

            $sql = "SELECT * FROM customer WHERE username='$username' AND pwd='$password'";
            return mysqli_query($this->conn, $sql);
        }
        else
        {
            return False;
        }
        
    }

    public function getMaxCusID()
    {
        $sql = "SELECT MAX(ID) FROM customer;";
        return mysqli_query($this->conn, $sql);
    }

    public function getCustomerByUsername($username)
    {
        $sql = "SELECT * FROM customer WHERE username='$username';";
        return mysqli_query($this->conn, $sql);
    }

    public function addCustomer($data)
    {
        $id = $data['id'];
        $username = $data['username_signup'];
        $password = md5($data['password_signup']);
        $phone = $data['phone_signup'];
        $email = $data['email_signup'];
        $fname = $data['firstname_signup'];
        $lname = $data['lastname_signup'];

        $sql = "INSERT INTO customer (ID, USERNAME, PWD, PHONE, EMAIL, FNAME, LNAME)
        VALUES ('$id', '$username', '$password', '$phone', '$email', '$fname', '$lname');";
        return mysqli_query($this->conn, $sql);
    }

    public function updateCusInfoByID($cusInfo)
    {
        $id = $cusInfo["id"];
        $fname = $cusInfo["fname"];
        $lname = $cusInfo["lname"];
        $email = $cusInfo["email"];
        $phone = $cusInfo["phone"];

        $sql = "UPDATE customer
                SET fname='$fname', lname='$lname', email='$email', phone='$phone'
                WHERE id='$id';";
        return mysqli_query($this->conn, $sql);
    }

    public function updateCusAccountByID($cusAccount)
    {
        $id = $cusAccount["id"];
        $password = $cusAccount["password"];

        $sql = "UPDATE customer
                SET pwd='$password'
                WHERE id='$id';";
        return mysqli_query($this->conn, $sql);
    }

    public function deleteCustomerByID($id)
    {
        $sql = "DELETE FROM customer WHERE id='$id';";
        return mysqli_query($this->conn, $sql);
    }
}
?>