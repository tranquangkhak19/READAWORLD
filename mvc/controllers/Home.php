<?php
class Home extends Controller
{
    public function Show()
    {
        $model = $this->model("BookModel");
        $books = $model->getAllBooks();

        $this->view("GuestLayout", [
            "page" => "HomePage",
            "books" => $books
        ]);
    }

    public function Signup()
    {
        $this->view("GuestLayout", [
            "page" => "SignUp",
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
            $cid = $_SESSION['id'];
            $model = $this->model("BookModel");

            $booksInCart = $model->getAllBooksInCartByCusID($cid);
            $count_books = mysqli_num_rows($booksInCart);
            //echo " ".$count_books." ";

            //Save all books information in cart
            $books = [];
            if($count_books>0)
            {
                while($row=mysqli_fetch_assoc($booksInCart))
                {
                    $isbn = $row['ISBN'];
                    $quantity = $row['QUANTITY'];
                    //echo $isbn;
                    $resbook = $model->getBookByIsbn($isbn);

                    if($resbook)
                    {
                        $bookInfo=mysqli_fetch_assoc($resbook);
                        $isbn = $bookInfo['ISBN'];
                        $title = $bookInfo['TITLE'];
                        $price = $bookInfo['PRICE'];
                        $image = $bookInfo['IMAGE_URL'];

                        $book = array(
                            "isbn" => $isbn,
                            "title" => $title,
                            "image" => $image,
                            "price" => $price,
                            "quantity" => $quantity,
                        );
                        
                        array_push($books, $book);
                    }
                }
            }

            $this->view("GuestLayout", [
                "page" => "Cart",
                "books" => $books
            ]);

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

    public function ApplyFilter()
    {
        //default 0<=price<=1billion (VND)
        $minPrice = $_POST['minPrice']?$_POST['minPrice']:0;
        $maxPrice = $_POST['maxPrice']?$_POST['maxPrice']:1000000000;
        $price = array(
            'min' => $minPrice,
            'max' => $maxPrice,
        );

        $categories = $_POST['categories'];
        //print_r($categories);
        $model = $this->model("BookModel");

        $books = $model->filterByPricesAndCategories($price, $categories);

        $this->view("GuestLayout", [
            "page" => "HomePage",
            "books" => $books
        ]);
    }

}

?>