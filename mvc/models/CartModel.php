<?php
class CartModel extends DB
{
    public function getAllBooksInCartByCusID($cid)
    {
        $sql = "SELECT * FROM cart WHERE CID='$cid'";
        return mysqli_query($this->conn, $sql);
    }

    public function getBookOnCartByISBN($cusID, $isbn)
    {
        $sql = "SELECT * FROM CART WHERE CID='$cusID' AND ISBN='$isbn';";
        return mysqli_query($this->conn, $sql);
    }

    public function addBookToCart($cusID, $isbn, $quantity)
    {
        $sql = "INSERT INTO CART VALUES ('$cusID', '$isbn', $quantity);";
        return mysqli_query($this->conn, $sql);
    }

    public function updateQuantityBookInCart($cusID, $isbn, $quantity)
    {
        $sql = "UPDATE CART SET QUANTITY = QUANTITY + $quantity WHERE CID='$cusID' AND ISBN='$isbn';";
        return mysqli_query($this->conn, $sql);
    }

    public function replaceQuantityBookInCart($cusID, $isbn, $quantity)
    {
        $sql = "UPDATE CART SET QUANTITY = $quantity WHERE CID='$cusID' AND ISBN='$isbn';";
        return mysqli_query($this->conn, $sql);
    }

    public function deleteBookByCusIDAndISBN($cusID, $isbn)
    {
        $sql = "DELETE FROM CART WHERE CID='$cusID' AND ISBN='$isbn';";
        return mysqli_query($this->conn, $sql);
    }
}


?>