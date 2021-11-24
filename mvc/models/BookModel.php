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

    public function getISBNsByPrices($min, $max)
    {
        $sql = "SELECT ISBN FROM book WHERE PRICE>=$min AND PRICE<=$max;";
        return mysqli_query($this->conn, $sql);
    }

    public function getBooksByCategory($category)
    {
        $sql = "SELECT ISBN FROM book_field WHERE BFIELD='$category';";
        return mysqli_query($this->conn, $sql);
    }

    public function filterByPricesAndCategories($price, $category)
    {
        $sql="";
        $sql1="";
        $sql2="";

        if($price)
        {
            $min = $price['min'];
            $max = $price['max'];
            $sql1 .= "SELECT ISBN FROM book WHERE PRICE>=$min AND PRICE<=$max";
        }
        if($category)
        {   
            $sql2 .= "SELECT ISBN FROM book_field WHERE";
            for($i=0; $i<count($category); $i++)
            {
                $cate = $category[$i];
                if($i==(count($category)-1))
                {
                    $sql2 .= " BFIELD='$cate'";
                }
                else
                {
                    $sql2 .= " BFIELD='$cate' AND";   
                }
            }
        }
        if($sql1!="" && $sql2!="")
        {
            $sql = "SELECT table1.ISBN FROM (".$sql1.") AS table1 INNER JOIN (".$sql2.") AS table2 ON table1.ISBN=table2.ISBN";   
        }
        elseif($sql1=="")
        {
            $sql = $sql2;
        }
        elseif($sql2=="")
        {
            $sql = $sql1;
        }
        else
        {
            $sql = "";
        }

        //JOIN with book table
        $finalSQL = "SELECT book.* FROM book INNER JOIN (".$sql.") AS table0 ON book.ISBN=table0.ISBN;";
        return mysqli_query($this->conn, $finalSQL);
    }

    public function Search($name){
        #$sql ="SELECT * FROM book WHERE TITLE LIKE '%$name%' order by ISBN DESC";
        $sql ="SELECT * FROM book WHERE TITLE LIKE '%$name%';";
        return mysqli_query($this->conn, $sql);
    }
}

?>