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
        $book = $this->model("BookModel");
        $books = $book->getAllBooks();
        // while($row=mysqli_fetch_assoc($books))
        // {
        //     $author_id = $row['AUTHOR_ID'];
        //     $author = $book->getAuthorById($author_id);
        //     //$row['AUTHOR_NAME'] = $author['ANAME'];
        // }

        $this->view("AdminLayout", [
            "page" => "Book",
            "books" => $books
        ]);
    }

}

?>