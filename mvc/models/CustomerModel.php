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

    public function getCustomerByAccount($account)
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

    public function addCustomer($data)
    {
        // $sql = "INSERT INTO customer (ID, USERNAME, PWD, PHONE, EMAIL, FNAME, LNAME)
        // VALUES ($data['id'], $data['username'], $data['password'], $data['phone'], $data['email'], $data['fname'], $data['lname'])";
    }
}
?>