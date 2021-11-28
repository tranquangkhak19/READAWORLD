<?php
class Home extends Controller
{
    public function Show()
    {
        $model = $this->model("BookModel");
        $books = $model->getAllBooks();

        $this->view("HomeLayout", [
            "page" => "HomePage",
            "books" => $books
        ]);
    }

    public function AboutUs()
    {
        $this->view("GuestLayout", [
            "page" => "AboutUs",

        ]);
    }

    public function ContactUs()
    {
        $this->view("GuestLayout", [
            "page" => "ContactUs",

        ]);
    }

    public function Signup()
    {
        $this->view("GuestLayout", [
            "page" => "SignUp",
        ]);
    }

    //Return customerID without repeating with the remaining ones
    public function HandleCustomerID()
    {
        $customerModel = $this->model("CustomerModel");
        $resGetMaxCusID = $customerModel->getMaxCusID();
        if($resGetMaxCusID)
        {
            $maxCusID = mysqli_fetch_assoc($resGetMaxCusID)['MAX(ID)'];
        }
        else
        {
            $maxCusID = "C00000000";
        }
        $lenCusID = strlen($maxCusID);
        //Got the max customer ID
        $headCusID = substr($maxCusID, 0, 1);
        $tailCusID = intval(substr($maxCusID, 1, ($lenCusID-1)));
        $tailNextCusID = $tailCusID + 1;
        //tail string with exact fixed length
        $tailNextCusID = str_pad($tailNextCusID, ($lenCusID-1), '0', STR_PAD_LEFT);

        $nextCusID = $headCusID.$tailNextCusID;
        return $nextCusID;
    }

    public function AddCustomerToDB()
    {
        $customer = array("id", "username_signup", "password_signup", "email_signup", "firstname_signup", "lastname_signup", "phone_signup");
        $customerValues = array();
        foreach($customer as $attribute) {
            $customerValues[] = isset($_POST[$attribute]) ? $_POST[$attribute] : "";
        }
        //all attributes of customer is saved in array $customer
        $customer = array_combine($customer, $customerValues);
        $customer["id"] = $this->HandleCustomerID();
        //print_r($customer);

        if($customer["id"]=="" || $customer["username_signup"]=="" || $customer["password_signup"]=="" || $customer["email_signup"]=="")
        {
            $_SESSION['signup'] = "FAILED TO SIGN UP. PLEASE, FILL IN ALL REQUIRED INFORMATION !";
        }
        else
        {
            $customerModel = $this->model("CustomerModel");
            //check if username is duplicate
            $checkDuplicatedUsername = $customerModel->getCustomerByUsername($customer['username_signup']);
            if(mysqli_num_rows($checkDuplicatedUsername)==0)
            {
                $resAddCustomerToDB = $customerModel->addCustomer($customer);
                if($resAddCustomerToDB)
                {
                    $_SESSION['signup'] = "SIGNED UP SUCCESSFULLY!!!";
                }
                else
                {
                    $_SESSION['signup'] = "FAILED TO SIGN UP. ERROR WHEN INSERT NEW CUSTOMER TO DATABASE!";
                }
            }
            else
            {
                $_SESSION['signup'] = "USERNAME IS DUPLICATED. PLEASE, TRY ANOTHER USERNAME!";
            }
        }
    }

    public function Login()
    {
        $this->view("GuestLayout", [
            "page" => "Login",
        ]);
    }

    public function CheckIsLogin()
    {
        return (isset($_SESSION['id']) && isset($_SESSION['username']));
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
        $cusModel = $this->model("CustomerModel");
        $res = $cusModel->getCustomerByAccount($account);
        //print_r($res);
        $checkCustomer = mysqli_num_rows($res);
        if($checkCustomer==1)
        {
            $customer = mysqli_fetch_assoc($res);
            $_SESSION['login'] = "<div class='text-successs'>LOGIN SUCCESSFULLY!</div>";
            $_SESSION['id'] = $customer['ID'];
            $_SESSION['username'] = $customer['USERNAME'];
            //Number of books in your Cart
            $cartModel = $this->model("CartModel");
            $resBooksInCart = $cartModel->getAllBooksInCartByCusID($customer['ID']);
            $numBooksInCart = mysqli_num_rows($resBooksInCart);
            $_SESSION['numbooks'] = $numBooksInCart;
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

    public function Account()
    {
        if($this->CheckIsLogin())
        {
            $cid = $_SESSION['id'];
            $customerModel = $this->model("CustomerModel");
            $resCustomer = $customerModel->getCustomeById($cid);
            $customer = mysqli_fetch_assoc($resCustomer);
            $this->view("GuestLayout", [
                "page" => "Account",
                "customer" => $customer
            ]);
        }
        else
        {
            $this->Login();
        }
    }

    public function Cart()
    {
        if($this->CheckIsLogin())
        {
            $cid = $_SESSION['id'];
            $model = $this->model("BookModel");
            $cartModel = $this->model("CartModel");

            $booksInCart = $cartModel->getAllBooksInCartByCusID($cid);
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
        else
        {
            $this->Login();
        }
    }

    public function AddToCart()
    {
        if($this->CheckIsLogin())
        {
            $cusID = $_SESSION['id'];
            $isbn = $_POST['isbn'];
            $quantity = $_POST['quantity'];

            //echo $cusID."---".$isbn."---".$quantity."<br>";
            $cartModel = $this->model("CartModel");

            $resGetBook = $cartModel->getBookOnCartByISBN($cusID, $isbn);
            $numBook = mysqli_num_rows($resGetBook);

            if($numBook==1)
            {
                echo "UPDATE <br>";
                $resUpdateQuantity = $cartModel->updateQuantityBookInCart($cusID, $isbn, $quantity);
            }
            elseif($numBook==0)
            {
                echo "INSERT <br>";
                $resAddToCart = $cartModel->addBookToCart($cusID, $isbn, $quantity);
                //Update SESSION to display Cart icon on header
                $_SESSION['numbooks'] += 1;
            }
            else
            {
                echo "ERROR ADD TO CART!!!";
            }
        }
        else
        {
            $this->Login();
        }
    }

    public function UpdateBookQuantityInCart()
    {
        if($this->CheckIsLogin())
        {
            $cusID = $_SESSION['id'];
            $isbn = $_POST['isbn'];
            $quantity = $_POST['quantity'];

            $cartModel = $this->model("CartModel");

            $resGetBook = $cartModel->getBookOnCartByISBN($cusID, $isbn);
            $numBook = mysqli_num_rows($resGetBook);

            if($numBook==1)
            {
                echo "UPDATE <br>";
                $resUpdateQuantity = $cartModel->replaceQuantityBookInCart($cusID, $isbn, $quantity);
            }
            else
            {
                echo "FAILED TO UPDATE QUANTITY OF BOOK IN CART!";
            }
        }
        else
        {
            $this->Login();
        }
    }

    public function DeleteBookInCart()
    {
        if($this->CheckIsLogin())
        {
            $cusID = $_SESSION['id'];
            $isbn = $_POST['isbn'];

            $cartModel = $this->model("CartModel");
            $resDeleteBookInCart = $cartModel->deleteBookByCusIDAndISBN($cusID, $isbn);
        }
        else
        {
            $this->Login();
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

        if(!empty($_POST["categories"]))
        {
            $categories = $_POST['categories'];
        }
        else
        {
            $categories = NULL;
        }
        //print_r($categories);
        $model = $this->model("BookModel");

        $books = $model->filterByPricesAndCategories($price, $categories);

        $this->view("HomeLayout", [
            "page" => "HomePage",
            "books" => $books
        ]);
    }

    public function Search(){
        $search_model = $this->model("BookModel");
        if (isset($_POST["action"])) {
            
            $search_name = $_POST["search_name"];

            $books = $search_model->Search($search_name);
            $this->view("NoLayout", [
                "page" => "HomePage",
                "books" => $books
            ]);
        }
    }

    public function UpdateCustomerInfo()
    {
        if($this->CheckIsLogin())
        {
            $cusID = $_SESSION['id'];
            $cusInfo = array("id", "fname", "lname", "email", "phone");
            $cusInfoValues = array();
            foreach($cusInfo as $attribute) {
                $cusInfoValues[] = isset($_POST[$attribute]) ? $_POST[$attribute] : "";
            }
            //all attributes of book is saved in $cusInfo
            $cusInfo = array_combine($cusInfo, $cusInfoValues);
            $cusInfo["id"] = $cusID;
            //print_r($cusInfo);
            $customerModel = $this->model("CustomerModel");
            $resUpdateCusInfo = $customerModel->updateCusInfoByID($cusInfo);
            if($resUpdateCusInfo)
            {
                $_SESSION['update_cus_info'] = "UPDATED CUSTOMER INFORMATION SUCCESSFULLY!";
            }
            else
            {
                $_SESSION['update_cus_info'] = "FAILED TO UPDATE CUSTOMER INFORMATION!";
            }
        }
        else
        {
            $this->Login();
        }
    }

    public function UpdateCustomerAccount()
    {
        if($this->CheckIsLogin())
        {
            $cusID = $_SESSION['id'];
            $cusAccount = array("id", "password");
            $cusAccountValues = array();
            foreach($cusAccount as $attribute) {
                $cusAccountValues[] = isset($_POST[$attribute]) ? $_POST[$attribute] : "";
            }
            //all attributes of book is saved in $book
            $cusAccount = array_combine($cusAccount, $cusAccountValues);
            $cusAccount["id"] = $cusID;
            //print_r($cusAccount);

            $resUpdateCusAccount = $customerModel->updateCusAccountByID($cusAccount);
            if($resUpdateCusAccount)
            {
                $_SESSION['update_cus_account'] = "UPDATED CUSTOMER ACCOUNT SUCCESSFULLY!";
                return True;
            }
            else
            {
                $_SESSION['update_cus_account'] = "FAILED TO UPDATE CUSTOMER ACCOUNT!";
                return False;
            }
        }
        else
        {
            $this->Login();
        }
    }

    public function checkDuplicateUsername()
    {
        if($this->CheckIsLogin())
        {
            $username = $_GET["username"];
            $customerModel = $this->model("CustomerModel");
            $resCheckDuplicateUsername = $customerModel->getCustomerByUsername($username);
            if(mysqli_num_rows($resCheckDuplicateUsername)==0) return True;
            else return False;
        }
        else
        {
            $this->Show();
        }
    }
}

?>