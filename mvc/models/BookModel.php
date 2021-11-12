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


}
?>