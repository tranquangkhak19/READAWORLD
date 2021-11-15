<?php
class Home extends Controller
{
    public function Show()
    {
        $model = $this->model("BookModel");
        $books = $model->getAllBooks();
        $authors = $model->getAllAuthors();

        $this->view("GuestLayout", [
            "page" => "HomePage",
            "books" => $books,
            "authors" => $authors
        ]);
    }

    public function Login()
    {
        $this->view("Login", []);
    }
    
    public function Logout()
    {
        //Destroy the session
        session_destroy(); //Unset $_SESSION['user]
        //Redirect to login page
        header('Location:Login');
    }

    public function Authenticate()
    {
        //get all book atrributes from $_POST[]
        $account = array("username", "password");
        $accountValues = array();
        foreach($account as $attribute) {
            $accountValues[] = isset($_POST[$attribute]) ? $_POST[$attribute] : "";
        }
        //all attributes of book is saved in $book
        $account = array_combine($account, $accountValues);
        print_r($account);

        //call model and update
        $model = $this->model("CustomerModel");
        $res = $model->getCustomerByAccount($account);
        //print_r($res);

        $checkCustomer = mysqli_num_rows($res);

        if($checkCustomer==1)
        {
            $customer = mysqli_fetch_assoc($res);
            $_SESSION['login'] = "<div class='text-successs'>LOGIN SUCCESSFULLY!</div>";
            $_SESSION['id'] = $customer['ID'];
            $_SESSION['username'] = $customer['USERNAME'];

            // $url = 'Show';
            // header("Refresh:0; url=$url");
            header('Location:Show');
        }
        else
        {
            $_SESSION['login'] = "<div class='text-danger'>LOGIN FAILED!</div>";
            header('Location:Login');
        }
    }

    public function Cart()
    {
        if(isset($_SESSION['id']))
        {
            $_SESSION['id'];
            $model = $this->model("BookModel");
            $booksInCart = $model->getAllBooksInCartByCusID($cid);
            $count_books = mysqli_num_rows($booksInCart);

            $books = [];
            if($count_books>0)
            {
                while($row=mysqli_fetch_assoc($booksInCart))
                {
                    $isbn = $row['ISBN'];
                    $book = $model->getBookByIsbn($isbn);
                }
            {
            
        }
        
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

        $this->view("GuestLayout", [
            "page" => "BookDetail",
            "book" => $model->getBookByIsbn($isbn),
            "author_name" => $author_name
        ]);
    }

}

?>