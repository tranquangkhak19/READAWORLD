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
}
?>