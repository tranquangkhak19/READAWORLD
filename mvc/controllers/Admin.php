<?php
class Admin extends Controller
{
    public function SayHi(){
        $this->view("AdminLayout", []);
    }

    public function Customer()
    {
        $customer = $this->model("CustomerModel");
        $customers = $customer->getAllCustomers();
        $this->view("AdminLayout", [
            "customers" => $customers,
            "page" => "Customer"
        ]);
    }

    public function UpdateCustomer($id)
    {
        $customer = $this->model("CustomerModel");
        $customer = $customer->getCustomerById($id);
        $this->view("AdminLayout", [
            "customer" => $customer
        ]);
    }

    public function Book()
    {
        $model = $this->model("BookModel");
        $books = $model->getAllBooks();

        //get all author names of this books
        $author_names = [];
        while($row=mysqli_fetch_assoc($books))
        {
            $author_id = $row['AUTHOR_ID'];
            $author = mysqli_fetch_assoc($model->getAuthorById($author_id));
            $author_name = $author['ANAME'];
            array_push($author_names, $author_name);
        }

        $this->view("AdminLayout", [
            "page" => "Book",
            "books" => $model->getAllBooks(),
            "author_names" => $author_names
        ]);
    }

    public function BookDetail($isbn)
    {
        $model = $this->model("BookModel");
        $book = $model->getBookByIsbn($isbn);

        $author_name = "NoName";
        $row=mysqli_fetch_assoc($book);
        $author_id = $row['AUTHOR_ID'];
        $author = mysqli_fetch_assoc($model->getAuthorById($author_id));
        $author_name = $author['ANAME'];

        $this->view("AdminLayout", [
            "page" => "BookDetail",
            "book" => $model->getBookByIsbn($isbn),
            "author_name" => $author_name
        ]);
    }

    public function UpdateBook($isbn)
    {
        $model = $this->model("BookModel");
        $book = $model->getBookByIsbn($isbn);

        $author_name = "NoName";
        $row=mysqli_fetch_assoc($book);
        $author_id = $row['AUTHOR_ID'];
        $author = mysqli_fetch_assoc($model->getAuthorById($author_id));
        $author_name = $author['ANAME'];

        $this->view("AdminLayout", [
            "page" => "UpdateBook",
            "book" => $model->getBookByIsbn($isbn),
            "author_name" => $author_name
        ]);
    }

}

?>