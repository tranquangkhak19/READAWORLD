<?php
class BookModel extends DB
{
    public function getAllBooks()
    {
        $sql = "SELECT * FROM book";
        return mysqli_query($this->conn, $sql);
    }

    public function getAllAuthors()
    {
        $sql = "SELECT * FROM author";
        return mysqli_query($this->conn, $sql);
    }

    public function getAllPublishers()
    {
        $sql = "SELECT * FROM publisher";
        return mysqli_query($this->conn, $sql);
    }

    public function getBookByIsbn($isbn)
    {
        $sql = "SELECT * FROM book where isbn='$isbn'";
        return mysqli_query($this->conn, $sql);
    }

    public function getAuthorById($id)
    {
        $sql = "SELECT * FROM author WHERE id='$id'";
        return mysqli_query($this->conn, $sql);
    }

    public function updateBookByIsbn($isbn, $book)
    {
        $title = $book["title"];
        $author_id = $book["author_id"];
        $publisher = $book["publisher"];
        $description = $book["description"];
        $image = $book["image"];
        $price = $book["price"];

        $sql =  "UPDATE book
                SET title='$title',
                    author_id='$author_id',
                    publisher_name='$publisher',
                    description='$description',
                    image_url='$image',
                    price=$price

                WHERE isbn='$isbn' 
                ";
        return mysqli_query($this->conn, $sql);
    }

    public function deleteBookByIsbn($isbn)
    {
        $sql  = "DELETE FROM book WHERE isbn='$isbn'";
        return mysqli_query($this->conn, $sql);
    }

    public function addBook($book)
    {
        $isbn = $book["isbn"];
        $title = $book["title"];
        $author_id = $book["author_id"];
        $publisher = $book["publisher"];
        $description = $book["description"];
        $image = $book["image"];
        $price = $book["price"];
        
        //INSERT INTO BOOK
        //VALUES  ('0000000000001', 'Strawberry Sunday', 100000,'Prentice Hall','AU0000001','https:.jpg', 'OKEOKEOKEOKEOKEOK');
        $sql = "INSERT INTO book 
                VALUES ('$isbn', '$title', $price, '$publisher', '$author_id', '$image', '$description')";

        return mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
    }


}
?>