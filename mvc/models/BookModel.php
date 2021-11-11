<?php
class BookModel extends DB
{
    public function getAllBooks()
    {
        $sql = "SELECT * FROM book";
        return mysqli_query($this->conn, $sql);

    }

    public function getBookByIsbn($isbn)
    {
        $sql = "SELECT * FROM book where isbn='$isbn'";
        return mysqli_query($this->conn, $sql);
    }

    public function getAuthorById($id)
    {
        $sql = "SELECT * FROM author WHERE id='$id";
        return mysqli_query($this->conn, $sql);
    }

    public function addCustomer($data)
    {
        // $sql = "INSERT INTO customer (ID, USERNAME, PWD, PHONE, EMAIL, FNAME, LNAME)
        // VALUES ('$data["id"]', '$data["username"]', '$data["password"]', '$data["phone"]', '$data["email"]', '$data["fname"]', '$data["lname"]')";
    }
}
?>